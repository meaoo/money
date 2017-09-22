<?php
namespace Admin\Controller;
use Think\Controller;
class AppliyController extends AuthController {
    public function index(){
       $job_id=$_GET['job_id'];
       if($job_id){
           $where['job_applications.job_id']=$job_id;
           $where['jobs.is_active']=1;
           $count=M('job_applications')
             ->join('jobs ON job_applications.job_id=jobs.id')
             ->where($where)
             ->field('job_applications.*,jobs.title')
             ->order('job_applications.id desc')
             ->count();
       $page = new \Think\Page($count, 9);
       $where['jobs.is_active']=1;
       $data=M('job_applications')
             ->join('jobs ON job_applications.job_id=jobs.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('job_applications.*,jobs.title')
             ->order('job_applications.id desc')
             ->select();
        $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
       }else{
         $where['jobs.is_active']=1;
       $count=M('job_applications')
             ->join('jobs ON job_applications.job_id=jobs.id')
             ->where($where)
             ->field('job_applications.*,jobs.title')
             ->order('job_applications.id desc')
             ->count();
       $page = new \Think\Page($count, 9);
       $where['jobs.is_active']=1;
       $data=M('job_applications')
             ->join('jobs ON job_applications.job_id=jobs.id')
             ->where($where)
             ->limit($page->firstRow.','.$page->listRows)
             ->field('job_applications.*,jobs.title')
             ->order('job_applications.id desc')
             ->select();
       $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
       }
     
       $this->assign('data',$data);
       $this->assign('page', $page->show());
       $this->display();
    }
    // 申请详情
    public function detail(){
         if($_GET['id']){
           $where['job_applications.id']=$_GET['id'];
           $where['jobs.is_active']=1;
           $data=M('job_applications')
             ->join('jobs ON job_applications.job_id=jobs.id')
             ->where($where)
             ->field('job_applications.*,jobs.title')
             ->find();
           $this->assign('data',$data);
         }
 
        $this->display();
    }
}