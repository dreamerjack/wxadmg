<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends  CommonController {
  
public function admin(){
$AdminModel=D('Admin');
      $user=$_SESSION['name'];
      $result=$AdminModel->where("username='$user'")->find();
if($result['rights']=='超级管理员'){
  
       $list=$AdminModel->order('id')->select();
       $this->assign('adminlist', $list);
        $this->show();
        
}


else{

  $this->show('您无此权限');

}
   
    }


    public function pub_admin(){
       $UserModel=D('Admin');
        $user=$_SESSION['name'];
      // $res=$UserModel->where("username='$user'")->find();
       $this->assign('pub',$UserModel->where("username='$user'")->find());
       $this->show();
        
}


  public function adduser(){
    if(IS_POST){
     $adminModel = D('Admin');
    // $name=$_POST['username'];
    // 
     $name=I('post.username');
     $pwd=I('post.pwd');
     $rights=I('post.rights');

    $salt = substr(uniqid(rand()),6); 


       $data['username']=$name;
      //  $data['pwd']=$pwd;
      $data['pwd']=md5(md5($pwd).$salt);
        $data['rights']=$rights;
        $data['salt']=$salt;
       $data['logtime']=NOW_TIME;


     if($adminModel->where("username='$name'")->find())
     {
      $this->error('用户名已被添加，请更换用户名再次添加',U('home/admin/admin'));
     }
       
     else{

 if($adminModel->add($data)){

  $this->success('添加管理员成功',U('home/admin/admin'));

  exit;
  
     }


     }
    
    }
    
    $this->show();
  }

    public function adduser_edit(){
     
       if(IS_POST){
        $id=I('post.id');
        $Edsave=D('Admin');
         
     $name=I('post.username');
     $pwd=I('post.pwd');
     $rights=I('post.rights');

    $salt = substr(uniqid(rand()),6); 


       $data['username']=$name;
      //  $data['pwd']=$pwd;
        $data['pwd']=md5(md5($pwd).$salt);
        $data['rights']=$rights;
        $data['salt']=$salt;
           
        if($Edsave->where("id=$id")->save($data)){

         $this->success('管理员信息修改成功',U('home/admin/admin'));
               exit;
        }


       }
       
       else{

        $id= I('get.admin_id');
        $Edit=D('Admin');
        $result=$Edit->where("id=$id")->find();
        $this->assign('edit', $Edit->where("id=$id")->find());

       }

        $this->show();
    }

    public function admin_del(){

      $adminModel=D('Admin');

      if($adminModel->delete(I('get.admin_id'))){

        $this->success('删除成功',U('home/admin/admin'));

      }

    }

  
}