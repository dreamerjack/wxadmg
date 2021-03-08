<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){

    	if(IS_POST){

$mansel=I('post.mansel');

//管理员登录开始

if($mansel==1){

         $user=D('admin');
    	$map=array();
        $username=I('post.username');
    	$map['username']=I('post.username');
    	//$map['pwd']=I('post.pwd');
        
       $ressalt= $user->where("username='$username'")->field('salt')->find();

       $salt=$ressalt['salt'];

    $map['pwd']=md5(md5(I('post.pwd')).$salt);
   


    	$res=$user->where($map)->select();
    	if($res==null){
    		$this->error('用户名密码错误',U('home/login/login'));

    	}

    	else{

            $name=I('post.username');
            $result=$user->where("username='$name'")->find();
            $id=$result['id'];
            $user->where("id='$id'")->setField('logtime',NOW_TIME);
    		session("name",I('post.username'));
            $this->success('登陆成功!',U('home/index/index'));
            exit;

    	}


}

//管理员登录结束


if($mansel==2){

$service=D('farminfos');

$map['spotname']=I('post.username');
$map['spotpwd']=I('post.pwd');

$res=$service->where($map)->select();

if($res==null){
            $this->error('用户名密码错误',U('home/login/login'));

        }

   else{


 $name=I('post.username');

 $result=$service->where("spotname='$name'")->find();

 $id=$result['id'];

$service->where("id='$id'")->setField('logtime',NOW_TIME);

 session("name",I('post.username'));

 $this->success('登陆成功!',U('home/index/index'));
     //   exit;

   }     


}

//分析师登录开始

if($mansel==3){

    $analyst=D('spotinfos');

$map['spotname']=I('post.username');
$map['spotpwd']=I('post.pwd');

$res=$analyst->where($map)->select();

if($res==null){
  
 $this->error('用户名密码错误',U('home/login/login'));

        }

   else{


 $name=I('post.username');

 $result=$analyst->where("spotname='$name'")->find();

 $id=$result['id'];

$analyst->where("id='$id'")->setField('logtime',NOW_TIME);

 session("name",I('post.username'));

 $this->success('登陆成功!',U('home/index/index'));
        exit;

   } 



}

//分析师登录结束


    	}
    	
        $this->show();
    }


 public function logout(){
    	//清除所有的session
        $AdminModel=D('Admin');
        $user=$_SESSION['name'];
        $result=$AdminModel->where("username='$user'")->find();
        
        if($result['rights']=='超级管理员'){
  
         session(null);
        redirect(U('home/Login/login'),2,'正在退出登录...');
}
else{
    session(null);
redirect(U('home/Member/mlogin'),2,'正在退出登录...');

}
  	
    }




}