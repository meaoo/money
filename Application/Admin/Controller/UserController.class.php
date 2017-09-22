<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends AuthController {
    public function index(){
       $count=M('user')->where($where)->count();
       $page = new \Think\Page($count, 9);
       $data=M('user')->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
       $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
       $this->assign('page', $page->show());
       $this->assign('data',$data);
       $this->display();
    }
    // 添加用户
    public function adduser(){
         if(IS_POST && IS_AJAX){
            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars(md5($_POST['password']));
            $status=$_POST['status'];
            if(empty($password)||empty($username)){
              $this->ajaxReturn(3);
            }else{
            $user=M('admin')->where("username='{$username}'")->find();
            if($user){
             $this->ajaxReturn(1);
             }else{
             $data['username']=$username;
             $data['password']=$password;
             $data['status']=$status;
             $id=M('admin')->add($data);
             if($id){
                 $this->ajaxReturn(2);
             }
            }
            }
            
        }
        $this->display();
    }
    // 编辑用户
    public function edituser(){
     
     if(IS_POST){
       $username=htmlspecialchars($_POST['username']);
       $id=$_POST['id'];
       $status=$_POST['status'];
       if(empty($username)){
           $this->error('用户名不能为空');
       }
       else{
          $data['username']=$username;
          $data['status']=$status;
          $data['utype']=1;
          M('user')->where("id=$id")->save($data);
          $this->success('修改成功',U('Admin/User/index'));
       }
     }else{
        $id=I('get.id')?I('get.id'):NULL;
        if($id){
         $where['id']=$id;
         $data=M('user')->where($where)->find();
         if(is_array($data)&&!empty($data)){
             $this->assign('data',$data);
         }
        }
        $this->display();
     }
      
    }
    // 删除用户
    public function deleteuser(){
        $id=I('get.id');
       if($id){
           $where['id']=$id;
           $where['delete']=1;
           M('admin')->save($where);
           $this->success('删除成功',U('User/index'));
       }
    }
    // 清楚缓存
    public function clearcache(){
        if( IS_POST && IS_AJAX){
                   //   $path=dirname(THINK_PATH);
        //   $path=dirname(dirname(dirname(dirname(__FILE__))));
          $path=realpath(RUNTIME_PATH);
          $cache=$path.'/Cache';
          $data=$path.'/Data';
          $temp=$path.'/Temp';
          
          $array=array($cache,$data,$temp);
          foreach ($array as $k => $v) {
                delDirAndFile($v);
              }
          if(!is_dir($cache) && !is_dir($data) && !is_dir($temp)){
             $this->ajaxReturn(1);
          }else{
              $this->ajaxReturn(2);
          }
          }else{
          $this->display();
          }
        
    }

}
?>