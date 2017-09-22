<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2017/3/28
 * Time: 16:36
 */

namespace Admin\Controller;
use Think\Controller;

class CompanyController extends AuthController {
//    公司列表
    public function index(){
       
   
       
        $where['status']=1;
        $count=M('company')->where($where)->order('id desc')->count();
        $page = new \Think\Page($count, 9);
        $data=M('company')->where($where)->order('id desc')->select();
        $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
        $this->assign('page', $page->show());
        $this->assign('data',$data);
        $this->display();
    }
    //添加公司logo
    public function addCompany(){
        if(IS_POST){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     C('UPLOAD_PATH'); // 设置附件上传根目录
            // 上传单个文件
            $info   =   $upload->uploadOne($_FILES['photo']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $data['logo']=$info['savepath'].$info['savename'];
                $data['detail']=trim($_POST['detail']);
                $data['company_detail']=trim($_POST['text']);
                $data['company']=trim($_POST['company']);
                $data['status']=1;
                $data['page']=(int)$_POST['page'];
                    $result=M('company')->add($data);
                    if($result) {
                        $this->success ( '上传成功' , U ( 'Admin/Company/index' ) );
    
    
                    }
            }
        }else{
            $this->display();
        }
    }
    //    编辑公司详情
    public function editCompany(){
        $id=$_GET['id'];
        if($id){
            $where['id']=$id;
            $where['status']=1;
            $company=M('company')->where($where)->find();
            $page=array('成功案例','管理页面');
            $this->assign('page',$page);
            if(!empty($company)){
                $this->assign('company',$company);
            }
        }
        if(IS_POST){
            if(empty($_FILES['photo']['size'])){
                $data['logo']=trim($_POST['photo_hidden']);
                $data['detail']=trim($_POST['detail']);
                $data['company_detail']=trim($_POST['text']);
                $data['company']=trim($_POST['company']);
                $data['id']=$_POST['companyId'];
                $data['page']=(int)$_POST['page'];
                M('company')->save($data);
                $this->success ( '编辑成功' , U ( 'Admin/Company/index' ) );
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
                    $data['logo']=$info['savepath'].$info['savename'];
                    $data['detail']=trim($_POST['detail']);
                    $data['company_detail']=trim($_POST['text']);
                    $data['company']=trim($_POST['company']);
                    $data['id']=$_POST['companyId'];
                    $data['page']=(int)$_POST['page'];
                    $result=M('company')->save($data);
                    if($result) {
                        $this->success ( '上传成功' , U ( 'Admin/Company/index' ) );
            
            
                    }
                }
            }
        }else{
            $this->display();
        }
        
    }
//    删除营销公司
    public function deleteCompany(){
        $id=$_GET['id'];
        $info=M(company)->where("id=$id")->find();
        if(!empty($info)){
            $data['id']=$id;
            $data['status']=0;
            M('company')->save($data);
            $this->success ( '删除成功' , U ( 'Admin/Company/index' ) );
        }else{
            $this->error ( '公司名称不存在', U ( 'Admin/Company/index' )  );
        }
    }
}