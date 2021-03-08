<?php
namespace Home\Controller;
use Think\Controller;
class MloginController extends Controller {

public function mlogin(){

        if(IS_POST){

$mansel=I('post.mansel');

//管理员登录开始
         $user=D('member');
        $map=array();
        $username=I('post.username');
        $map['username']=I('post.username');
        //$map['pwd']=I('post.pwd');
        
       $ressalt= $user->where("username='$username'")->field('salt')->find();

       $salt=$ressalt['salt'];

    $map['pwd']=md5(md5(I('post.pwd')).$salt);
   
        $res=$user->where($map)->select();
        if($res==null){
            $this->error('用户名密码错误',U('home/mlogin/mlogin'));

        }

        else{

            $name=I('post.username');
            $result=$user->where("username='$name'")->find();
            $id=$result['id'];
            $user->where("id='$id'")->setField('logtime',NOW_TIME);
            session("name",I('post.username'));
            $this->success('登陆成功',U('home/index/index'));
            exit;

        }

}


$this->show();

}


public function register(){

if(IS_POST){
     $adminModel = D('member');
    // $name=$_POST['username'];
    // 
     $name=I('post.mbername');
  //   $tel=I('post.mberphone');
     $pwd=I('post.mberpwd');
     #$rights=I('post.rights');
     $rights='会员';

    $salt = substr(uniqid(rand()),6); 

       $data['username']=$name;
     // $data['tel']=$tel;
      $data['pwd']=md5(md5($pwd).$salt);
        $data['rights']=$rights;
        $data['salt']=$salt;
       $data['logtime']=NOW_TIME;


     if($adminModel->where("username='$name'")->find())
     {
      $this->error('用户名已被注册，请更换用户名注册',U('home/mlogin/register'));
     }
       
     else{

 if($adminModel->add($data)){

  $this->success('注册成功,请登录',U('home/mlogin/mlogin'));

  exit;
  
     }


     }
    
    }

$this->show();

    }





}