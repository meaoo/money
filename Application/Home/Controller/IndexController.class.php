<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
    public  function index(){
        //获取轮播图的数据
        $img=M('play')->where("status=1")->order('id desc')->select();
        if(!empty($img)){
            $this->assign("img",$img);
        }
//        热门职位
        $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,6)->select();
        $this->assign('newest',$newest);
        //热门推荐人
        $personInfo=$person=M('userinfo')->where("status=1")->order('top desc,id desc')->select();
        foreach ( $person as $k => $v ) {
//            已完成的职位
            $where['user_id'] =$v['uid'];
            $where['status']=1;
            $where['is_active']=1;
            $count=M('jobs')->where($where)->count();
            if($count>0){
                $person[$k]['count']=$count;
            }else{
                $person[$k]['count']=0;
            }
//            进行中的职位
            $nowCount['user_id']=$v['uid'];
            $nowCount['status']=0;
            $nowCount['is_active']=1;
            $now=M('jobs')->where($nowCount)->count();
            if($now>0){
                $person[$k]['nowCount']=$now;
            }else{
                $person[$k]['nowCount']=0;
            }
            
        }
    
        $this->assign('person',$person);
        $this->assign('personInfo',$personInfo);
//        成功案例
        $company=M('company')->where("status=1 AND page=0")->order('id desc')->limit(0,20)->select();
        $this->assign('company',$company);
        $this->display();
    }
//    案例详情
    public function company(){
        $id=$_GET['id'];
        if($id){
            $where['id']=$id;
            $where['status']=1;
            $company=M('company')->where($where)->find();
            if(empty($company)){
                $this->error('公司不存在');
            }else{
                $this->assign('company',$company);
            }
        }
        $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,5)->select();
        $this->assign('newest',$newest);
        $this->display();
    }
    public function job ($ctype = '') {
        
        // 分类
        $cate = M ( 'Categories' )->order('id desc')->where('status=0')->select();
        // 最新企业
       $where['jobs.is_active']=1;
       $where['types.status']=0;
       $where['cities.status']=0;
       $where['categories.status']=0;
       $count=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.id,jobs.title,cities.name,types.name as type,jobs.created_on,categories.name as cat')
             ->order('jobs.created_on desc')
             ->count();
             $page = new \Think\Page($count, 10);
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('jobs.*,cities.name as city,types.name as type,categories.name as cat')
             ->order('jobs.top desc ,jobs.created_on desc')
             ->select();
             $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
            //  最近浏览企业
             $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,5)->select();
              // 城市
             $city=M('cities')->where('status=0')->select();
             // 标签
             $list=M('welfare')->where('status=0')->select();
            //  获取职位类型列表
             $type=M('types')->where('status=0')->select();
             //岗位
             $post=M('post')->where('status=0')->select();
             $this->assign('post',$post);
             $this->assign('type',$type);
             $this->assign('city',$city);
             $this->assign('list',$list);
             $this->assign('newest',$newest);
             $this->assign('data',$data);
             $this->assign('page', $page->show());
             $this->assign('cate',$cate);
             $this->assign('ctype',$ctype);
             $this->assign('count',$count);
             $this->display ( 'job' );
    }


    // 获取分类
    public function getcat(){
        $keyword= I('k');
        if($keyword){
            $where['_string']="(categories.name  like '%$keyword%') or (jobs.outside_location like '%$keyword%') or (jobs.title like '%$keyword%') or (jobs.company like '%$keyword%')";
        }
        $id=empty($_GET['id'])?NULL:$_GET['id'];
        $cid=empty($_GET['cid'])?NULL:$_GET['cid'];
        $pid=empty($_GET['pid'])?NULL:$_GET['pid'];
       if($id){
           // 获取传值分类名称
            $category=M ( 'Categories' )->where("id={$id} AND status=0")->find();
             $where['jobs.category_id']=$id;
             }
        if($cid){
             $where['jobs.type_id']=$cid;
             $typelist=M( 'types' )->where("id={$cid} AND status=0")->find();
        }
        if($pid){
             $where['jobs.post_id']=$pid;
             $postlist=M( 'post' )->where("id={$pid} AND status=0")->find();
        }
            // 分类企业
            $cate = M ( 'Categories' )->order('id desc')->where('status=0')->select();

        // 最新企业

            $where['jobs.is_active']=1;
            $where['types.status']=0;
            $where['cities.status']=0;
            $where['categories.status']=0;
            $count=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.id,jobs.title,cities.name,types.name as type,jobs.created_on,categories.name as cat')
             ->order('jobs.created_on desc')
             ->count();
             $page = new \Think\Page($count, 10);
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('jobs.*,cities.name as city,types.name as type,categories.name as cat')
             ->order('jobs.top desc ,jobs.created_on desc')
             ->select();
             $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
             //  最近浏览企业
             $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,5)->select();
              // 城市
             $city=M('cities')->where('status=0')->select();
             // 标签
             $list=M('welfare')->where('status=0')->select();
            //  工作类型
            //  获取职位类型列表
             $type=M('types')->where('status=0')->select();
               $page->parameter['id'] = $id;
               $page->parameter['cid'] = $cid;
               $page->parameter['pid'] = $pid;
               if(!empty($keyword)){
               $page->queryParameter['k'] = $keyword;
                }
                   //岗位
             $post=M('post')->where('status=0')->select();
             $this->assign('post',$post);
             $this->assign('type',$type);
             $this->assign('city',$city);
             $this->assign('list',$list);
             $this->assign('newest',$newest);
             $this->assign('data',$data);
             $this->assign('page', $page->show());
             $this->assign('cate',$cate);
             $this->assign('id',$id);
             $this->assign('category',$category);
             $this->assign('typelist',$typelist);
             $this->assign('cid',$cid);
             $this->assign('count',$count);
             $this->assign('pid',$pid);
             $this->assign('postlist',$postlist);
             $this->display();

    }
    // 搜索业务
    public function search(){

            $keyword=trim(I('k'));
            if(!empty($keyword)){
            //  添加搜索关键词
             $key['keywords']=$keyword;
             $key['created_on']=date("Y-m-d H:i:s",time());
             M('searches')->add($key);
            //  搜索
             $where['_string']="(categories.name  like '%$keyword%') or (jobs.outside_location like '%$keyword%') or (jobs.title like '%$keyword%') or (jobs.company like '%$keyword%')";
             $where['jobs.is_active']=1;
             $where['post.status']=0;
             $where['types.status']=0;
             $where['cities.status']=0;
             $where['categories.status']=0;
             $count=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('post ON jobs.post_id= post.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.id,jobs.title,cities.name,types.name as type,jobs.created_on,categories.name as cat')
             ->order('jobs.created_on desc')
             ->count();
             $page = new \Think\Page($count, 10);
             $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('post ON jobs.post_id= post.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('jobs.*,cities.name as city,types.name as type,categories.name as cat')
             ->order('jobs.top desc ,jobs.created_on desc')
             ->select();
            //  foreach ($data as $k => $v) {
            //      $in['id']=array('in',$v['city_id']);
            //      $in['status']=0;
            //      $p= M('cities')->where($in)->getField('name',true);
            //       $str=implode(' ',$p);
            //      $data[$k]['city']=$p;
            //  }

             $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
              //  最近浏览企业
             $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,5)->select();
              // 城市
             $city=M('cities')->where('status=0')->select();
             // 标签
             $post=M('post')->where('status=0')->select();
             $this->assign('post',$post);
             $list=M('welfare')->where('status=0')->select();
              $page->queryParameter['k'] = $keyword;
                $this->assign('count',$count);
             $this->assign('city',$city);
             $this->assign('list',$list);
             $this->assign('newest',$newest);
             $this->assign('keyword',$keyword);
             $this->assign('data',$data);
             $this->assign('count',$count);
             $this->assign('page', $page->show());
            }else{
                $this->redirect('Home/Index/index' );
            }

         //  获取职位类型列表
        $type=M('types')->where('status=0')->select();
        $this->assign('type',$type);
        $cate = M ( 'Categories' )->order('id desc')->where('status=0')->select();
        $this->assign('cate',$cate);
        $this->display();
    }
    // 招聘信息详情
    public function detail(){
        $id=$_GET['id'];
        if($id){
             $where['jobs.is_active']=1;
             $where['types.status']=0;
             $where['cities.status']=0;
             $where['categories.status']=0;
             $where['jobs.id']=$id;
              $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($where)
             ->field('jobs.*,cities.name as city,types.name as type,categories.name as cat')
             ->order('jobs.id desc')
             ->find();
            if(count($data)!=0){
                // 分类
                $cate = M ( 'Categories' )->order('id desc')->where('status=0')->select();
                $this->assign('cate',$cate);
                //记录浏览次数
                M('jobs')->where("is_active=1 AND id={$id}")->setInc('views_count');
                $this->assign('data',$data);
            }else{
                $this->error('参数错误');
            }
        }
        // 城市
             $city=M('cities')->where('status=0')->select();
             // 标签
             $list=M('welfare')->where('status=0')->select();
             $this->assign('city',$city);
             $this->assign('list',$list);
        $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,5)->select();
        $this->assign('newest',$newest);
        $this->display();
    }
    // 上传简历
    public function upload(){
        if(IS_POST && IS_AJAX){
            $job['job_id']     = I('id');
            $job['name']       = I('username');
            $job['email']      = I('email');
            $job['cv_path']    = I('license');
            $job['telephone']  = I('telephone');
            $job['message']    = I('message');
            $job['created_on'] = date('Y-m-d H:i:s');

            $result = M('Job_applications')->add($job);
            if($result){
                $msg['status'] = true;
                $msg['msg']    = '申请成功';
            }else{
                $msg['status'] = false;
                $msg['msg']    = '申请失败';
            }
            $this->ajaxReturn($msg);
        }
    }
//    pc端联系信息
    public function getPc(){
        if(IS_POST　&& IS_AJAX){
            $data['username']=$_POST['name'];
            $data['telephone']=$_POST['phone'];
            $data['time']=date('Y-m-d H:i:s',time());
            $result=M('userlink')->add($data);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
//    手机端联系信息
    public function getPhone(){
        if(IS_POST　&& IS_AJAX){
            $data['username']=$_POST['phone-name'];
            $data['telephone']=$_POST['phone-phone'];
            $data['time']=date('Y-m-d H:i:s',time());
            $result=M('userlink')->add($data);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(2);
            }
        }
    }
//    解决方案
    public function solve(){
        $this->display();
     }
}
/**
 * Ajax请求返回类
 */
class AjaxResult{
    /**
     * 返回结果，bool
     * @var mixed
     */
    public $Result;
    /**
     * 返回数据,object
     * @var mixed
     */
    public $Data;
    /**
     * 返回信息，string
     * @var mixed
     */
    public $Message;
    /**
     * 返回原文件名，string
     */
    public $Name;
}