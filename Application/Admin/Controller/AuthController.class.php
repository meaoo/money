<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function __construct(){
//	      父类有构造函数 子类的同时调用
        parent::__construct();  
        $this->is_login();
	     if( !$_SESSION['username']||!$_SESSION['uid'] ){
          $args = array(
           "referer"=>urlencode(get_url()),
           "lang"=> cookie('think_language')
          );
          $login_url = add_url_args(C('LOGIN_URL'), $args);
          header("location:$login_url");
     
      }
    
	   }
      private function is_login(){
        $username=array();
        $islogin=false;
        $login_token = cookie(cookie("yp_logged_in_key"));
		if(!empty($login_token)){
            $logins = explode('|', $login_token);
            if(count($logins) >= 4){
                $url = C('LOGIN_OAUTH2');
                $url .= "?login=$logins[0]&expiration=$logins[1]&token=$logins[2]";
                //通过wordpress判断是否登录
                $html = file_get_contents($url);
                $html = trim($html,chr(239).chr(187).chr(191));
                $result = json_decode($html);
                if($result && isset($result->login_token)){
                    if($result->login_token == $login_token){
                        //在石油链得到该用户
                        $user = M('user')->where(array('id'=>$result->id))->find();
                        if(!$user){
                            $user['id'] = $result->id;
                            $user['registertime'] = $result->registered;
                            $user['email'] = $result->email;
                            $user['qq'] = '';
                            $user['utype'] = 0;
                            $user['mobile'] = '';
                            $user['username'] = $result->userlogin;
                            $user['status']=0;
                            M('user')->add($user);
                        }
                        
                        $username['id'] = $user['id'];
                        $username['username'] = $user['username'];
                        $username['utype'] = $user['utype'];
                        $islogin = true;
                        $_SESSION['username']= $user['username'];
                        $_SESSION['status']=$user['status'];
                        $_SESSION['uid']=$user['id'];
                        $this -> assign('user', $username);
                        $this -> assign('islogin', $islogin); 
                    }
                }
            }
		}
         $this -> assign('islogin', $islogin); 
    }

}
















?>