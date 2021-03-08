<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends  CommonController {

    public function index(){

       $AdminModel=D('Admin');
      $user=$_SESSION['name'];
      $result=$AdminModel->where("username='$user'")->find();
if($result['rights']=='超级管理员'){
  
      $clickModel=D('member');

    $resetres=$clickModel->order("id  desc")->limit(20)->page($_GET['p'].',20')->select();

//分页功能开始

$count   = $clickModel->order("id  desc")->count();// 查询满足要求的总记录数
$Page    = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数

$Page->setConfig('prev','上一页');
$Page->setConfig('next','下一页');
$Page->setConfig('last','末页');
$Page->setConfig('first','首页');
$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');

$show   = $Page->show();// 分页显示输出
$this->assign('page',$show);// 赋值分页输出
#$this->display(); // 输出模板

//分页功能结束

$this->assign('splist',$resetres);


        $this->show();
        
}
else{

$this->show("您无此权限");

 /*   $membername=$_SESSION['name'];
    $map['username']=$membername;
    $memberModel=D('member');
    $res=$memberModel->where($map)->find();
    $memberid= $res['id'];
    $mapid['memberid']=$memberid;
    $clickModel=D('clickpan');

    $resetres=$clickModel->where($mapid)->order("id  desc")->limit(20)->page($_GET['p'].',20')->select();

//分页功能开始

$count   = $clickModel->where($mapid)->order("id  desc")->count();// 查询满足要求的总记录数
$Page    = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数

$Page->setConfig('prev','上一页');
$Page->setConfig('next','下一页');
$Page->setConfig('last','末页');
$Page->setConfig('first','首页');
$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');

$show   = $Page->show();// 分页显示输出
$this->assign('page',$show);// 赋值分页输出
#$this->display(); // 输出模板

//分页功能结束

$this->assign('splist',$resetres);

*/

}

 //   $this->show();

    }



public function member_edit(){

if(IS_POST){

$id=I('post.planid');
$username=I('post.mbername');
$mberpwd=I('post.mberpwd');
$salt = substr(uniqid(rand()),6); 
$rights='会员';


$data['username']=$username;
$data['pwd']=md5(md5($mberpwd).$salt);
$data['rights']=$rights;
$data['salt']=$salt;

$memberModel = D('member');

$rescxrecur=$memberModel->where($data)->select();

if($rescxrecur){

$this->error('信息未做更改',U('home/member/index'));


}

else{

$result= $memberModel->where("id='$id'")->save($data);

if($result){

$this->success('修改成功!',U('home/member/index'));

              exit; 
}

else{

$this->error('修改成败!',U('home/member/index'));

}


}


}

else{

  $planid=I('get.planid');
  $memberModel=D('member');

  $mapuser['id']=$planid;

$resuser=$memberModel->where($mapuser)->find();


$this->assign('spledit',$resuser);

$this->show();

}



}



public function member_del(){

 $id=I('get.spot_id');
 $memberModel=D('member');
 $tradeModel=D('tradeplans');
 $keyModel=D('keywd');
 $WximgModel=D('wxingwd');
 $QqModel=D('qqtradeplans');
  
 $mapusetid['tid']=$id;

$rescxtrade=$tradeModel->where($mapusetid['tid'])->select();

$rescxtradewiimg=$QqModel->where($mapusetid['tid'])->select();


if($rescxtrade || $rescxtradewiimg){

$this->error('删除失败，请先删除该用户名下所有计划，再进行删除',U('home/member/index'));

}

else{


$resmemberdel=$memberModel->delete(I('get.spot_id'));

if($resmemberdel){

$this->success('删除成功',U('home/member/index'));

exit;

}

else{

$this->success('删除失败',U('home/member/index'));

}

}

}




}