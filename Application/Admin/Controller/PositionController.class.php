<?php
namespace Admin\Controller;
use Think\Controller;
class PositionController extends AuthController {
    public function index(){
               $search=I('search');
               if($search!=''){
            $where['title']=array('like',"%{$search}%");
            $where['jobs.is_active']=1;
            $where['types.status']=0;
            $where['cities.status']=0;
            $where['categories.status']=0;
            $count=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.id,jobs.title,cities.name,types.name as type,jobs.created_on,categories.name as cat,jobs.top')
             ->order('jobs.id desc')
             ->count();
             $page = new \Think\Page($count, 9);
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('jobs.id,jobs.title,jobs.top,cities.name,types.name as type,jobs.created_on,categories.name as cat,(select count(1) from job_applications  where job_id=jobs.id ) as number')
             ->order('jobs.top desc, jobs.id desc')
             ->select();
             $page -> queryParameter['search'] = $search;
             $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
             $this->assign('data',$data);
             $this->assign('page', $page->show());
             $this->assign('search',$search);
               }else{
               $category=I('category_id');
               $job=I('type_id');
               $userid=I('user_id');
               if($category!=''){
                   $where['jobs.category_id']=$category;
               }
               if($job!=''){
                   $where['jobs.type_id']=$job;
               }
               if($userid!=''){
                   $where['jobs.user_id']=$userid;
               }
            $where['jobs.is_active']=1;
            $where['types.status']=0;
            $where['cities.status']=0;
         
            $count=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.id,jobs.title,jobs.username,jobs.user_id,cities.name,types.name as type,jobs.created_on,categories.name as cat')
             ->order('jobs.id desc')
             ->count();
             $page = new \Think\Page($count, 9);
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('jobs.id,jobs.title,cities.name,jobs.top,jobs.username,jobs.user_id,types.name as type,jobs.created_on,categories.name as cat,(select count(1) from job_applications  where job_id=jobs.id ) as number ')
             ->order('jobs.top desc ,jobs.id desc')
             ->select();
             $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
             $page -> queryParameter['category_id'] =$category;
             $page -> queryParameter['type_id'] =$job;
             $page -> queryParameter['user_id'] =$userid;
             $this->assign('categoryid',$category);
             $this->assign('jobid',$job);
             $this->assign('userid',$userid);
             $this->assign('data',$data);
             $this->assign('page', $page->show());
            }
                 //  业务类型
             $cat=M('categories')->where("status=0")->select();
//               创建人
             $user=M('user')->where("utype=1")->select();
             $this->assign('user',$user);
            //  职位分类
             $job=M('types')->where("status=0")->select();
             $this->assign('cat',$cat);
             $this->assign('job',$job);
               
             $this->display();
    }
    // 添加职位
    public function addpost(){
        if(IS_POST){
         $data['summary']=implode(',',$_POST['summer']) ;
         $data['title']=$_POST['title'];
         $data['request']=$_POST['request'];
         $data['year']=$_POST['year'];
         $data['type_id']=$_POST['job'];
         $data['category_id']=$_POST['cat'];
         $data['city_id']=implode(',', $_POST['city']) ;
        //  获取城市名称
         $city['id']=array('in', $data['city_id']);
         $city['status']=0;
         $cities=M('cities')->where($city)->getField('name',true);
         $data['outside_location']=implode(' ', $cities);
         $data['url']=$_POST['url'];
         $data['description']=$_POST['comment'];
         $data['post_id']=$_POST['post'];
         $data['company']=$_POST['company'];
         $data['poster_email']=$_POST['email'];
         $data['created_on']=date('Y-m-d H:i:s',time());
         $data['user_id']=$_SESSION['uid'];
         $data['username']=$_SESSION['username'];
         $result=M('jobs')->add($data);
       
         if($result){
             $this->success('招聘信息添加成功',U('Admin/Position/index'));
         }
        }else{
             // 分类
        $cat=M('categories')->where('status=0')->select();
        // 职位
        $job=M('types')->where('status=0')->select();
        // 城市
        $city=M('cities')->where('status=0')->select();
        // 标签
        $list=M('welfare')->where('status=0')->select();
        //岗位
        $post=M('post')->where('status=0')->select();
        $this->assign('post',$post);
        $this->assign('list',$list);
        $this->assign('cat',$cat);
        $this->assign('job',$job);
        $this->assign('city',$city);
        $this->display();
        }
       
    }
    // 查看招聘详情
        public function detail(){
             $id=$_GET['id'];
             $where['jobs.id']=$id;
             $where['types.status']=0;
             $where['cities.status']=0;
             $where['categories.status']=0;
             $where['post.status']=0;
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('post ON jobs.post_id= post.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.*,cities.name,types.name as type,categories.name as cat,postname')
             ->order('jobs.id desc')
             ->find();
               // 城市
             $city=M('cities')->where('status=0')->select();
             // 标签
             $list=M('welfare')->where('status=0')->select();
             $this->assign('city',$city);
             $this->assign('list',$list);
             $this->assign('data',$data);
             $this->display();
        }
        // 编辑详情
        public function editpost(){
        if(IS_POST){
                
                $id=$_POST['id'];
                $data['summary']=implode(',',$_POST['summer']);
                $data['title']=$_POST['title'];
                $data['request']=$_POST['request'];
                $data['year']=$_POST['year'];
                $data['type_id']=$_POST['job'];
                $data['post_id']=$_POST['post'];
                $data['category_id']=$_POST['cat'];
                $data['update_time']=date('Y-m-d H:i:s',time());
                $data['city_id']=implode(',', $_POST['city']);
                 //  获取城市名称
                $city['id']=array('in', $data['city_id']);
                $city['status']=0;
                $cities=M('cities')->where($city)->getField('name',true);
                $data['outside_location']=implode(' ', $cities);
                $data['url']=$_POST['url'];
                $data['description']=$_POST['comment'];
                $data['company']=$_POST['company'];
                $data['poster_email']=$_POST['email'];
                $data['created_on']=date('Y-m-d H:i:s',time());
                $data['views_count']=$_POST['count'];
                $data['user_id']=$_SESSION['uid'];
                $data['username']=$_SESSION['username'];
                $data['status']=$_POST['status'];
                $result=M('jobs')->where("id=$id")->save($data);
                $this->success('编辑招聘信息成功',U('Admin/Position/index'));
             
        
        }else{
        $id=$_GET['id'];
        $company=M('jobs')->where("id={$id} AND is_active=1")->find();
        $city_id=explode(',',$company['city_id']);
        $summer=explode(',',$company['summary']);
        $cat=M('categories')->where('status=0')->select();
        // 职位
        $job=M('types')->where('status=0')->select();
        // 城市
          //岗位
//        发布状态
        $status=array('发布进行中','已完成');
        $this->assign('status',$status);
        $post=M('post')->where('status=0')->select();
        $this->assign('post',$post);
        $city=M('cities')->where('status=0')->select();
        $list=M('welfare')->where('status=0')->select();
        $this->assign('summer',$summer);
        $this->assign('city_id',$city_id);
        $this->assign('list',$list);
        $this->assign('cat',$cat);
        $this->assign('job',$job);
        $this->assign('city',$city);
        $this->assign('company',$company);
        $this->display();
        }
        
        }
        // 删除职位
        public function deletepost(){
            $id=$_GET['id'];
            if($id){

                $where['is_active']=0;
                M('jobs')->where("id={$id}")->save($where);
                $this->success('删除成功',U('Admin/Position/index'));
            }
        }
        // 暂停招聘的职位
        public function parsepost(){
           $where['jobs.is_active']=0;
            $where['types.status']=0;
            $where['cities.status']=0;
            $where['categories.status']=0;
            $count=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.id,jobs.title,cities.name,types.name as type,jobs.created_on,categories.name as cat')
             ->order('jobs.id desc')
             ->count();
             $page = new \Think\Page($count, 9);
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('jobs.id,jobs.title,cities.name,types.name as type,jobs.created_on,categories.name as cat')
             ->order('jobs.id desc')
             ->select();
             $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
             $this->assign('data',$data);
             $this->assign('page', $page->show());
          $this->display();
        }
        // 恢复招聘
        public function resetpost(){
            $id=$_GET['id'];
            if($id){
                $where['is_active']=1;
                M('jobs')->where("id={$id}")->save($where);
                $this->success('恢复招聘成功',U('Admin/Position/index'));
                
            }
        }
        // 更新职位信息
        public function newjob(){
           if(IS_POST){
               $box=$_POST['box'];
               if(empty($box)){
                   $this->error('请至少选择一个职位');
               }else{
                   $box=implode(',',$box);
                   $data['id']=array('in',$box);
                   $where['created_on']=date('Y-m-d H:i:s',time());
                   $job=M('jobs');
                   $result= $job->where($data)->save($where);
                   $this->success('更新成功',U('Admin/Position/index'));
               }
           }
        }
        // 置顶职位
        public function gettop(){
            $id=I('id');
            $tid=I('tid');
            if(!empty($tid)){
                $data['top']=1;
                M('jobs')->where("id=$id")->save($data);
                $this->success('置顶成功');
            }else{
                $data['top']=0;
                M('jobs')->where("id=$id")->save($data);
                $this->success('取消置顶成功');
            }
        }
//        获取联系信息
        public function linkuser(){
            $count=M('userlink')->order('id desc')->count();
            $page = new \Think\Page($count, 10);
            $data=M('userlink')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
            $this->assign('data',$data);
            $this->assign('page', $page->show());
            $this->display();
        }
//        顾问置顶
        public function person(){
            $data=M('userinfo')->order('top desc,id desc')->select();
            $this->assign('data',$data);
            $this->display();
        }
//        顾问编辑
        public function editPerson(){
            if(IS_POST){
                if(empty($_POST['top'])){
                    $this->error('请重新输入');
                }else{
                    $data['id']=$_POST['id'];
                    $data['top']=intval($_POST['top']);
                    M('userinfo')->save($data);
                    $this->success('编辑成功',U('Position/person'));
                }
                
            }else{
                $id=$_GET['id'];
                if(!empty($id)){
                    $name=M('userinfo')->where("id=$id")->find();
                    if(!empty($name)){
                        $this->assign('name',$name);
                    }
                }
                $this->display();
            }
           
        }
//        发布中的职位
        public function release(){
            $uid=$_SESSION['uid'];
            $where['status']=0;
            $where['user_id']=$uid;
            $count=M('jobs')->where($where)->count();
            $page = new \Think\Page($count, 9);
            $data=M('jobs')->where($where)->order('orders desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
            if(!empty($data)){
                $this->assign('page', $page->show());
                $this->assign('data',$data);
            }
            $this->display();
          
        }
//        完成职位
        public function finishJob(){
            $uid=$_SESSION['uid'];
            $where['status']=1;
            $where['user_id']=$uid;
            $count=M('jobs')->where($where)->count();
            $page = new \Think\Page($count, 9);
            $data=M('jobs')->where($where)->order('orders desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
            if(!empty($data)){
                $this->assign('page', $page->show());
                $this->assign('data',$data);
            }
            $this->display();
        }
//        编辑发布中的职位
        public function editRelease(){
            if(IS_POST){
                if(empty($_POST['orders'])){
                    $this->error('请重新输入');
                }else{
                    $data['id']=$_POST['id'];
                    $data['orders']=intval($_POST['orders']);
                    M('jobs')->save($data);
                    $this->success('编辑成功',U('Position/release'));
                }
        
            }else{
                $id=$_GET['id'];
                if(!empty($id)){
                    $name=M('jobs')->where("id=$id")->find();
                    if(!empty($name)){
                        $this->assign('name',$name);
                    }
                }
                $this->display();
            }
        
        }
//        编辑完成的职位
        public function editFinish(){
            if(IS_POST){
                if(empty($_POST['orders'])){
                    $this->error('请重新输入');
                }else{
                    $data['id']=$_POST['id'];
                    $data['orders']=intval($_POST['orders']);
                    M('jobs')->save($data);
                    $this->success('编辑成功',U('Position/finishJob'));
                }
        
            }else{
                $id=$_GET['id'];
                if(!empty($id)){
                    $name=M('jobs')->where("id=$id")->find();
                    if(!empty($name)){
                        $this->assign('name',$name);
                    }
                }
                $this->display();
            }
        }
    }
?>