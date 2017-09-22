<?php
namespace Admin\Controller;
use Think\Controller;
class WelfareController extends AuthController {
    public function index(){
       $data=M('welfare')->where('status=0')->select();
       if($data){
           $this->assign('data',$data);
       }
       $this->display();
    }
    // 添加标签
    public function addlist(){
        if(IS_POST && IS_AJAX){
            $list=$_POST['list'];
            if(empty($list)){
                $this->ajaxReturn(1);
            }else{
                $where['content']=$list;
                $where['status']=0;
                $data=M('welfare')->where($where)->find();
                if(count($data)!=0){
                    $this->ajaxReturn(3);
                }else{
                    $result=M('welfare')->add($where);
                    if($result){
                        $this->ajaxReturn(2);
                    }
                }
            }
        }
        $this->display();
}
//  编辑标签
  public function editlist(){
      if(IS_POST && IS_AJAX){
          $id=$_POST['id'];
          $list=$_POST['list'];
          if(empty($list)){
              $this->ajaxReturn(1);
          }else{
             $where['content']=$list;
             M('welfare')->where("id={$id}")->save($where);
             $this->ajaxReturn(2);
          }
      }
      $id=$_GET['id'];
      if($id){
          $where['id']=$id;
          $where['status']=0;
          $data=M('welfare')->where($where)->find();
          if($data){
              $this->assign('data',$data);
          }
      }
      $this->display();
  }
//   删除标签
  public function deletelist(){
      $id=$_GET['id'];
      if($id){
          $Model = M();
          $data= $Model->query("select * from jobs where summary like '%{$id}%' AND is_active=1");
          if(count($data)>0){
              $this->error('该福利下有招聘信息，不能删除！');
          }else{
          $where['status']=1;
          M('welfare')->where("id={$id}")->save($where);
          $this->success('删除标签成功',U('Welfare/index'));
          }
          
      }
  }
}
?>
