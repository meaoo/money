<?php
namespace Admin\Controller;
use Think\Controller;
class JobController extends AuthController {
    public function index(){
       $where['status']=0;
       $count=M('types')->where($where)->order('id desc')->count();
       $page = new \Think\Page($count, 9);
       $data=M('types')->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
       $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
       if($data){
           $this->assign('page', $page->show());
           $this->assign('data',$data);
       }
       $this->display();
    }
    // 添加职位分类
    public function addjob(){
        if(IS_AJAX && IS_POST){
            $job=htmlspecialchars($_POST['job']) ;
            if(empty($job)){
                $this->ajaxReturn(1);
            }else{
                $where['status']=0;
                $where['name']=$job;
                $data=M('types')->where($where)->find();
                if($data){
                    $this->ajaxReturn(3);
                }else{
                    $result=M('types')->add($where);
                    if($result){
                        $this->ajaxReturn(2);
                    }
                }
            }
        }
        $this->display();
    }
    // 编辑职位分类
    public function editjob(){
    if(IS_POST && IS_AJAX){
        $id=$_POST['id'];
        $job=$_POST['job'];
        if(empty($job)){
            $this->ajaxReturn(1);
        }else{
            $where['id']=$id;
            $where['name']=$job;
            M('types')->save($where);
            $this->ajaxReturn(2);
        }
    }else{
       $id=$_GET['id'];
       if($id){
       $where['id']=$id;
       $where['status']=0;
       $data=M('types')->where($where)->find();
       if($data){
           $this->assign('data',$data);
       }
    }
     $this->display();
    }
  
    }
    // 删除职位分类
    public function deletejob(){
        $id=$_GET['id'];
        if($id){
            $job['is_active']=1;
            $job['type_id']=$id;
            $data=M('jobs')->where($job)->find();
            if(!empty($data)){
                $this->error('该职位类型下有招聘信息不能删除');
            }else{
                $where['id']=$id;
                $where['status']=1;
                M('types')->save($where);
                $this->success('删除成功',U('Admin/Job/index'));
            }
           
            
        }
    }
}



?>