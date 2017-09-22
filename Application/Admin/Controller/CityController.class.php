<?php
namespace Admin\Controller;
use Think\Controller;
class CityController extends AuthController {
    public function index(){
       $where['status']=0;
       $count=M('cities')->where($where)->order('id desc')->count();
       $page = new \Think\Page($count, 9);
       $data=M('cities')->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
       $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li class="disabled"><a> 共 %TOTAL_ROW% 条记录。</a></li>');
       if($data){
           $this->assign('page', $page->show());
           $this->assign('data',$data);
       }
       $this->display();
    }
    // 添加城市
    public function addcity(){
        if(IS_POST && IS_AJAX){
            $city=htmlspecialchars($_POST['city']);
            if(empty($city)){
                $this->ajaxReturn(1);
            }else{
                $where['name']=$city;
                $where['status']=0;
                $data=M('cities')->where($where)->find();
                if($data){
                    $this->ajaxReturn(3);
                }else{
                    $result=M('cities')->add($where);
                    if($result){
                        $this->ajaxReturn(2);
                    }
                }
            }
        }
        $this->display();
    }
    // 编辑城市
    public function editcity(){
        if(IS_POST && IS_AJAX){
            $id=$_POST['id'];
            $city=$_POST['city'];
            if(empty($city)){
                $this->ajaxReturn(1);
            }else{
                $where['id']=$id;
                $where['name']=$city;
                M('cities')->save($where);
                $this->ajaxReturn(2);
            }
        }else{
              $id=$_GET['id'];
             if($id){
            $where['id']=$id;
            $where['status']=0;
            $data=M('cities')->where($where)->find();
            if($data){
                $this->assign('data',$data);
            }
        }
        $this->display();
        }
       
    }
    // 删除城市
    public function deletecity(){
        $id=$_GET['id'];
        if($id){
            $Model = M();
            $data= $Model->query("select * from jobs where city_id like '%{$id}%' AND is_active=1");
            if(count($data)>0){
                $this->error('该城市下有招聘信息不能删除');
            }else{
            $where['id']=$id;
            $where['status']=1;
            M('cities')->save($where);
            $this->success('删除城市成功',U('Admin/City/index'));
            }
           

        }
    }
}
?>