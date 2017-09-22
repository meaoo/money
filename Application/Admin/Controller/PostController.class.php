<?php
namespace Admin\Controller;
use Think\Controller;
class PostController extends AuthController {
  public function index(){
       $where['status']=0;
       $count=M('post')->where($where)->count();
       $page = new \Think\Page($count, 9);
       $data=M('post')->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
       $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
       if(!empty($data)){
         $this->assign('page', $page->show());
         $this->assign('data',$data);
       }
       $this->display();
    
  }
  // 添加岗位分类
  public function addpost(){
      if(IS_POST && IS_AJAX){
         $category=htmlspecialchars($_POST['category']);
         if(empty($category)){
           $this->ajaxReturn(1);
         }else{
             $data['postname']=$category;
             $data['status']=0;
             $info=M('post')->where($data)->find();
             if($info){
                 $this->ajaxReturn(3);
             }else{
                 $result=M('post')->add($data);
                 if($result){
                 $this->ajaxreturn(2);
                 }
             }
             
         }
       }
       $this->display();
  }
  public function editpost(){
      if(IS_POST && IS_AJAX){
            $id=$_POST['id'];
            $category=$_POST['category'];
            if(empty($category)){
               $this->ajaxReturn(1);
            }else{
                $data['id']=$id;
                $data['postname']=$category;
                M('post')->save($data);
                $this->ajaxReturn(2);
            }
        }
        $id=$_GET['id'];
        if($id){
            $where['id']=$id;
            $where['status']=0;
            $data=M('post')->where($where)->find();
            if($data){
                $this->assign('data',$data);
            }
        }
    $this->display();
  }
  // 删除岗位
  public function deletepost(){
        $id=$_GET['id'];
        if($id){
            $cat['post_id']=$id;
            $cat['is_active']=1;
            $data=M('jobs')->where($cat)->find();
            if(!empty($data)){
                $this->error('该分类下有职位不能删除');
            }else{
                $where['id']=$id;
                $where['status']=1;
                M('post')->save($where);
                $this->success('删除成功',U('Admin/Post/index'));
            }
            
        }
  }
}
?>