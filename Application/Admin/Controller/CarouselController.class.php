<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2017/3/30
 * Time: 9:58
 */

namespace Admin\Controller;


class CarouselController extends AuthController {
    public function index(){
        $data=M('play')->where("status=1")->select();
        $this->assign('data',$data);
        $this->display();
    }
//    添加轮播图
    public function addCarousel(){
        if(IS_POST){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      C('UPLOAD_PATH'); // 设置附件上传根目录
            // 上传单个文件
            $info   =   $upload->uploadOne($_FILES['photo']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $data['img']=$info['savepath'].$info['savename'];
                $data['url']=trim($_POST['url']);
                $data['status']=1;
                $result=M('play')->add($data);
                if($result) {
                    $this->success ( '上传成功' , U ( 'Admin/Carousel/index' ) );
                
                
                }
            }
        }else{
            $this->display();
        }
    }
//    编辑轮播图
    public function editCarousel(){
        $id=$_GET['id'];
        if($id){
            $where['id']=$id;
            $where['status']=1;
            $company=M('play')->where($where)->find();
            if(!empty($company)){
                $this->assign('company',$company);
            }
        }
        if(IS_POST){
            if(empty($_FILES['photo']['size'])){
                $data['img']=trim($_POST['photo_hidden']);
                $data['url']=trim($_POST['url']);
                $data['id']=$_POST['companyId'];
                M('play')->save($data);
                $this->success ( '编辑成功' , U ( 'Admin/Carousel/index' ) );
            }else{
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      C('UPLOAD_PATH'); // 设置附件上传根目录
                // 上传单个文件
                $info   =   $upload->uploadOne($_FILES['photo']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $data['img']=$info['savepath'].$info['savename'];
                    $data['url']=trim($_POST['url']);
                    $data['id']=$_POST['companyId'];
                    $result=M('play')->save($data);
                    if($result) {
                        $this->success ( '上传成功' , U ( 'Admin/Carousel/index' ) );
                    
                    
                    }
                }
            }
        }else{
            $this->display();
        }
    }
    //删除轮播图
    public function deleteCarousel(){
        $id=$_GET['id'];
        $info=M(play)->where("id=$id")->find();
        if(!empty($info)){
            $data['id']=$id;
            $data['status']=0;
            M('play')->save($data);
            $this->success ( '删除成功' , U ( 'Admin/Carousel/index' ) );
        }else{
            $this->error ( '公司名称不存在', U ( 'Admin/Carousel/index' ));
        }
    }
}