<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
    
           $this->display();
        
       
     
    }
    public function login(){
           if(IS_POST && IS_AJAX){
            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars(md5($_POST['password']));
            if(empty($password)||empty($username)){
              $this->ajaxReturn(3);
            }else{
            $where['username']=$username;
            $where['delete']=0;
            $user=M('admin')->where($where)->find();
            if($user && $user['password']==$password){
             $_SESSION['username']=$user['username'];
             $_SESSION['uid']=$user['id'];
             $_SESSION['status']=$user['status'];
             $this->ajaxReturn(1);
             }else{
             $this->ajaxReturn(2);  
            }
            }
            
        }
    }
    // 退出登录
    public function out(){
        $_SESSION=array();
        cookie("yp_user", null);
        cookie("yp_utype", null);
		      cookie(cookie("yp_logged_in_key"), null);
        cookie(str_replace('_logged_in_','_', cookie("yp_logged_in_key")), null);
        cookie("yp_logged_in_key", null);
        $this->success('退出登录',U('Home/Index/index'));
    }
}