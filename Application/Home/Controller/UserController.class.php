<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2017/6/9
 * Time: 10:42
 */

namespace Home\Controller;


use Think\Controller;

class UserController extends Controller {
    public  function index(){
        $id=$_GET['id'];
        if(!empty($id)){
            $user=M('user')->where("id=$id")->find();
            if(!empty($user)){
                $uid=$user['id'];
                $userInfo=M('userinfo')->where("uid=$uid")->find();
                $recommend=M('recommend')->where("uid=$uid")->find();
//                发布中的职位
                $where['is_active']=1;
                $where['status']=0;
                $where['user_id']=$uid;
                $jobNow=M('jobs')->where($where)->order('orders desc,id desc')->limit(0,5)->select();
                $jobCount=M('jobs')->where($where)->order('orders desc,id desc')->select();
//                已完成的职位
                $data['is_active']=1;
                $data['status']=1;
                $data['user_id']=$uid;
                $jobFinish=M('jobs')->where($data)->order('orders desc,id desc')->limit(0,5)->select();
                $finishCount=M('jobs')->where($data)->order('orders desc,id desc')->select();
               
                $this->assign('jobCount',$jobCount);
                $this->assign('finishCount',$finishCount);
                $this->assign('jobNow',$jobNow);
                $this->assign('jobFinish',$jobFinish);
                $this->assign('user',$user);
                $this->assign('userInfo',$userInfo);
                $this->assign('recommend',$recommend);
            }
        }
        $this->display();
    }
    public function getJob(){
        $uid=I('id');
        $status=I('status');
        if(isset($status) && !empty($uid)){
          
            // 最新企业
            $where['jobs.is_active']=1;
            $where['types.status']=0;
            $where['cities.status']=0;
            $where['categories.status']=0;
            $where['jobs.status']=$status;
            $where['jobs.user_id']=$uid;
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
            $names=M('userinfo')->where("uid=$uid")->find();
            $name=$names['name'];
            // 城市
            $city=M('cities')->where('status=0')->select();
            // 标签
            $list=M('welfare')->where('status=0')->select();
            $page->parameter['id'] = $uid;
            $page->parameter['status'] = $status;
            $this->assign('list',$list);
            $this->assign('city',$city);
            $this->assign('name',$name);
            $this->assign('data',$data);
            $this->assign('page', $page->show());
            $this->assign('status',$status);
        }
        $newest=M('jobs')->where('is_active=1')->order('views_count desc')->limit(0,5)->select();
        $this->assign('newest',$newest);
        $this->display();
    }
    
}