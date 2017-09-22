<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2017/3/28
 * Time: 14:01
 */

namespace Admin\Controller;
use Think\Controller;


class PersonController extends AuthController {
//    个人资料
    public function index(){
        $uid=$_SESSION['uid'];
        $userInfo=M('user')->where("id=$uid")->find();
        $userDetail=M('userinfo')->where("uid=$uid")->find();
        if(!empty($userInfo)){
           $this->assign('userInfo',$userInfo);
        }
        $this->assign('userDetail',$userDetail);
        $this->display();
    }
    
    public function addPerson(){;
        if(IS_POST){
            if(empty($_FILES['photo']['size'])){
                $data['photo']=$_POST['photoOne'];
                $data['detail']=$_POST['detail'];
                $data['name']=$_POST['name'];
                $data['perfect']=$_POST['perfect'];
                $data['weixin']=$_POST['weixin'];
                $data['tel']=$_POST['tel'];
                $data['linkin']=$_POST['linkin'];
                $uid=$data['uid']=$_SESSION['uid'];
                $data['status']=intval($_POST['status']);
                $data['id']=intval($_POST['id']);
                M('userinfo')->save($data);
                $this->success('上传成功',U('Admin/Person/index'));
            }else{
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  = C('UPLOAD_PATH')     ; // 设置附件上传根目录
                // 上传单个文件
                $info   =   $upload->uploadOne($_FILES['photo']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $data['photo']=$info['savepath'].$info['savename'];
                    $data['detail']=$_POST['detail'];
                    $data['name']=$_POST['name'];
                    $data['weixin']=$_POST['weixin'];
                    $data['tel']=$_POST['tel'];
                    $data['linkin']=$_POST['linkin'];
                    $data['perfect']=$_POST['perfect'];
                    $uid=$data['uid']=$_SESSION['uid'];
                    $data['status']=intval($_POST['status']);
                    $userInfo=M('userinfo')->where("uid=$uid")->find();
                    if(empty($userInfo)){
                        $result=M('userinfo')->add($data);
                        if($result){
                            $this->success('上传成功',U('Admin/Person/index'));
                        }
                    }else{
                        $data['id']=$userInfo['id'];
                        M('userinfo')->save($data);
                        $this->success('上传成功',U('Admin/Person/index'));
                    }
        
        
                }
            }
           
        }else{
            $uid=$data['uid']=$_SESSION['uid'];
            $userInfo=M('userinfo')->where("uid=$uid")->find();
            if(!empty($userInfo)){
                $this->assign('user',$userInfo);
            }
            $this->display();
        }
        
        
       
       
    }
//    上传二维码
    public function logo(){
        if(IS_POST){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  = C('UPLOAD_PATH')     ; // 设置附件上传根目录
            // 上传单个文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $data['logo']=$info['logo']['savepath'].$info['logo']['savename'];
                $data['person']=$info['person']['savepath'].$info['person']['savename'];
                $data['personLogo']=$info['personLogo']['savepath'].$info['personLogo']['savename'];
                $uid=$data['uid']=$_SESSION['uid'];
                $userInfo=M('userinfo')->where("uid=$uid")->find();
                if(empty($userInfo)){
                    $result=M('userinfo')->add($data);
                    if($result){
                        $this->success('上传成功',U('Admin/Person/index'));
                    }
                }else{
                    $data['id']=$userInfo['id'];
                    M('userinfo')->save($data);
                    $this->success('上传成功',U('Admin/Person/index'));
                }
        
        
            }
        }else{
            $this->display();
        }
        
    }
//    我的业绩
    public function recommend(){
        if(IS_POST){
            $uid=$_SESSION['uid'];
            $info=M('recommend')->where("uid=$uid")->find();
            if(empty($info)){
                $data['uid']=$_SESSION['uid'];
                $data['job']=intval($_POST['job']);
                $data['job-p']=intval($_POST['job-p']);
                $data['customer']=intval($_POST['customer']);
                $data['customer-p']=intval($_POST['customer-p']);
                $data['interview']=intval($_POST['interview']);
                $data['interview-p']=intval($_POST['interview-p']);
                $data['referee']=intval($_POST['referee']);
                $data['referee-p']=intval($_POST['referee-p']);
                $id=M('recommend')->add($data);
                if($id){
                    $this->success('添加成功');
                }
            }else{
                $data['id']=$info['id'];
                $data['uid']=$_SESSION['uid'];
                $data['job']=intval($_POST['job']);
                $data['job-p']=intval($_POST['job-p']);
                $data['customer']=intval($_POST['customer']);
                $data['customer-p']=intval($_POST['customer-p']);
                $data['interview']=intval($_POST['interview']);
                $data['interview-p']=intval($_POST['interview-p']);
                $data['referee']=intval($_POST['referee']);
                $data['referee-p']=intval($_POST['referee-p']);
                M('recommend')->save($data);
                $this->success('编辑成功');
            }
                
            
        }else{
            $uid=$_SESSION['uid'];
            $data=M('recommend')->where("uid=$uid")->find();
            if(!empty($data)){
                $this->assign('data',$data);
            }
            $this->display();
        }
        
    }
}