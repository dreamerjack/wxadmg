<?php
namespace Home\Controller;
use Think\Controller;
class QqtradeController extends  CommonController {

public function index(){

$AdminModel=D('Admin');
      $user=$_SESSION['name'];
      $result=$AdminModel->where("username='$user'")->find();
      
if($result['rights']=='超级管理员'){
  

$tradeModel=D('qqtradeplans');
 $memberModel=D('member');
// $username=$_SESSION['name'];
//$mapuser['username']=$username;  
//$userid= $memberModel->where($mapuser)->field('id')->find();

//$maptrade['useid']=$userid['id'];

$res=$tradeModel->order('id desc')->limit(20)->page($_GET['p'].',20')->select();

foreach($res as $rowtradde){

  if($rowtradde['medium']=='1'){

    $rowtradde['mediuminfo']='有二维码';

  }

  else{

    $rowtradde['mediuminfo']='无二维码';
  }

$resreplace[]=$rowtradde;


}



//分页功能开始

$count   = $tradeModel->where($maptrade)->order("id  desc")->count();// 查询满足要求的总记录数
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

$power='0';
$this->assign('competence', $power);

$this->assign('splist',$resreplace);


$this->show();
        
}

else{

 $tradeModel=D('qqtradeplans');
 $memberModel=D('member');
 $username=$_SESSION['name'];
$mapuser['username']=$username;  
$userid= $memberModel->where($mapuser)->field('id')->find();

$maptrade['useid']=$userid['id'];

$res=$tradeModel->where($maptrade)->order('id desc')->limit(20)->page($_GET['p'].',20')->select();

foreach($res as $rowtradde){

  if($rowtradde['medium']=='1'){

    $rowtradde['mediuminfo']='有二维码';

  }

  else{

    $rowtradde['mediuminfo']='无二维码';
  }

$resreplace[]=$rowtradde;


}




//分页功能开始

$count   = $tradeModel->where($maptrade)->order("id  desc")->count();// 查询满足要求的总记录数
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

$power=1;
$this->assign('competence', $power);


$this->assign('splist',$resreplace);

  $this->show();

}


}

public function wxadd(){

     if(IS_POST){

     $planname=I('post.planname');
     $medium=I('post.medium');
     $username=$_SESSION['name'];
     

     $data['planname']=$planname;
     $data['medium']=$medium;
    
     $tradeModel=D('qqtradeplans');
     $memberModel=D('member');

     $map['planname']=$planname;
     $map['medium']=$medium;
     $mapuser['username']=$username;  
     $userid= $memberModel->where($mapuser)->field('id')->find();
      $data['useid']=$userid['id'];

      $data['ordertime']=NOW_TIME; 
     $map['useid']=$userid['id'];
     $res=$tradeModel->where($map)->select();
     
     if($res){

      $this->error('计划已存在，请重新添加',U('home/qqtrade/index'));

     }

        else{
                    
            $resadd= $tradeModel->add($data);
        
        if($resadd){
          $this->success('新建计划成功',U('home/qqtrade/index'));
                  exit;
        }

        else{

        $this->error('新建计划失败',U('home/qqtrade/index'));

        }

   }

 }
     
  $this->show();

  }




 public function planlist(){

$navid=I('get.navid');

$tid=I('get.planid');

$tradeModel=D('qqtradeplans');

$planid['id']=$tid;

$planname=$tradeModel->where($planid)->field('planname')->find();

$this->assign('projectname',$planname['planname']);

$this->assign('tid',$tid);

$this->assign('shownavid',$navid);

if($navid==2){

$keyModel=D('qqnums');
$map['tid']=$tid;
// $res=$keyModel->where($map)->order('id desc')->select();
 $res=$keyModel->where($map)->order('id desc')->limit(20)->page($_GET['p'].',20')->select();

//分页功能开始

$count   = $keyModel->where($map)->order("id  desc")->count();// 查询满足要求的总记录数
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

$this->assign('splist',$res);

}

else{

$WximgModel=D('qqwximg');
$map['tid']=$tid;
// $res=$keyModel->where($map)->order('id desc')->select();
 $res=$WximgModel->where($map)->order('id desc')->limit(20)->page($_GET['p'].',20')->select();

//分页功能开始

$count   = $WximgModel->where($map)->order("id  desc")->count();// 查询满足要求的总记录数
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

$this->assign('splist',$res);



}




 
 $this->show();

      
    }

public function keywdadd(){

if(IS_POST){

$flid=I('post.classifyid');

$tid=I('post.tid');

if($flid==2){


  $data['kwd']=I('post.kwd');

$data['tid']=I('post.tid');
$data['ordertime']=NOW_TIME; 

$keyModel=D('qqnums');

$map['kwd']=$data['kwd'];
$map['tid']=$data['tid'];

$res=$keyModel->where($map)->select();

     if($res){

      $this->error('微信号已存在，请重新添加',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

     }

        else{
                    
            $resadd= $keyModel->add($data);
        
        if($resadd){

          $this->success('微信号添加成功',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));
                  exit;
        }

        else{

        $this->error('微信号添加失败',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

        }
   }

}

else{


$upload = new \Think\Upload();// 实例化上传类
$upload->maxSize = 3145728 ;// 设置附件上传大小
$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
$upload->rootPath = './Uploads/'; // 设置附件上传根目录
$upload->savePath = 'wximg/'; // 设置附件上传（子）目录
$upload->replace=false; //不覆盖存在同名文件
// 上传文件
$info = $upload->upload();

if(!$info) {// 上传错误提示错误信息

$this->error('微信号添加失败,请上传二维码',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

}

else{  //上传成功




foreach($info as $file){

              //$FilePath = $file['svaePath'].$file['savename'];

$img_url=$file['savepath'].$info['savename'];
              
 $data['img_url']=$img_url.$file['savename'];
             
                   
               }


$data['wx']=I('post.wx');
$data['wximgurl']=$data['img_url'];
$data['tid']=I('post.tid');
$data['ordertime']=NOW_TIME; 

$mapwximg['wx']=$data['wx'];
$mapwximg['tid']=$data['tid'];

$WximgModel=D('qqwximg');

$res=$WximgModel->where($mapwximg)->select();

     if($res){

      $this->error('微信号已存在，请重新添加',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

     }

        else{
                    
            $resadd= $WximgModel->add($data);
        
        if($resadd){

          $this->success('微信号添加成功',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));
                  exit;
        }

        else{

        $this->error('微信号添加失败',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

        }
   }



}

//二维码上传功能结束


}


}

$hid=I('get.tid');
$swnid=I('get.navid');

$this->assign('tid',$hid);
$this->assign('shownavid',$swnid);

$this->show();

}

public function keywd_edit(){

 $keyid=I('get.keyid');
 $keytid=I('get.keytid');
 $flid=I('get.navid');
 $tid=I('post.tid');
 $map['id']=$keyid;
 #$map['tid']=$keytid;


$keyModel=D('qqnums');

$WximgModel=D('qqwximg');

if(IS_POST){

if($flid==2){

$id=I('post.id');
$data['kwd']=I('post.kwd');

$map['kwd']=$data['kwd'];
$map['id']=$id;
$res=$keyModel->where($map)->select();
// $result= $LocalMode->where("id='$localid'")->save($data);

if($res){

 $this->error('信息未做更改',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

}

else{

$result= $keyModel->where("id='$id'")->save($data);

if($result){

$this->success('修改成功!',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

              exit; 
}

else{

$this->error('修改成败!',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

}

}

}

else{

//含二维码修改开始

$upload = new \Think\Upload();// 实例化上传类
$upload->maxSize = 3145728 ;// 设置附件上传大小
$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
$upload->rootPath = './Uploads/'; // 设置附件上传根目录
$upload->savePath = 'wximg/'; // 设置附件上传（子）目录
$upload->replace=false; //不覆盖存在同名文件
// 上传文件
$info = $upload->upload();

if(!$info) {// 上传错误提示错误信息





$this->error('微信号修改失败,请上传新二维码',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

}

else{   //上传成功

foreach($info as $file){

              //$FilePath = $file['svaePath'].$file['savename'];

$img_url=$file['savepath'].$info['savename'];
              
 $data['img_url']=$img_url.$file['savename'];
             
                   
               }


$id=I('post.id');

$data['wx']=I('post.wx');
$data['wximgurl']=$data['img_url'];


$mapwximg['wx']=$data['wx'];
$mapwximg['id']=$id;

$WximgModel=D('qqwximg');

$res=$WximgModel->where($mapwximg)->select();
// $result= $LocalMode->where("id='$localid'")->save($data);

if($res){

 $this->error('信息未做更改',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

}

else{

$result= $WximgModel->where("id='$id'")->save($data);

if($result){

$this->success('修改成功!',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

              exit; 
}

else{

$this->error('修改成败!',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

}

}





}



//含二维码修改结束

}




}

//有无post提交分割线


else{

$this->assign('shownavid',$flid);

if($flid==2){



$reskeywd=$keyModel->where($map)->find();
$this->assign('kwdinfo',$reskeywd);

}

else{

$reskeywd=$WximgModel->where($map)->find();
$this->assign('kwdinfo',$reskeywd);

}


  }

$this->show();


}


public function keywd_del(){

//$keyid=I('get.keyid');

 $tid=I('get.keytid');



$flid=I('get.navid');

$WximgModel=D('qqwximg');

$keyModel=D('qqnums');

if($flid==2){

  if($keyModel->delete(I('get.keyid'))){
   // $this->redirect('home/spot/spotlist');

$this->success('删除成功',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

//exit;

  }

else{

$this->error('删除失败',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>2)));

}


}

else{


  if($WximgModel->delete(I('get.keyid'))){
   // $this->redirect('home/spot/spotlist');

$this->success('删除成功',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

//exit;

  }

else{

$this->error('删除失败',U('home/qqtrade/planlist',array('planid'=>$tid,'navid'=>1)));

}

}





}

public function keywd_alldel(){

   $tradid=I('post.tradid');
   $flid=I('post.flid');

   if($flid==2){

       $keyModel=D('qqnums');
   
   foreach ($tradid as $rowid) {

    $resdel=  $keyModel->delete($rowid);

   }

if($resdel){

$msg='删除成功';

}

else{

$msg='删除失败';

}

   } 

else{

  $WximgModel=D('qqwximg');
   
   foreach ($tradid as $rowid) {

    $resdel= $WximgModel->delete($rowid);

   }

if($resdel){

$msg='删除成功';

}

else{

$msg='删除失败';

}


}




$this->ajaxReturn($msg);

}

//计划删除功能开始


public function qqtrade_del(){
   
   $id=I('get.spot_id');
   $flid=I('get.navid');
  $tradeModel=D('qqtradeplans');

 $keyModel=D('qqnums');
 $WximgModel=D('qqwximg');

if($flid==2){

$rescxkwd= $keyModel->where("tid='$id'")->select();

if($rescxkwd){

$resdelkd=  $keyModel->where("tid='$id'")->delete();
if($resdelkd){

$restrade=$tradeModel->delete(I('get.spot_id'));

if($restrade){

$this->success('删除成功',U('home/qqtrade/index'));

exit;

}
else{
$this->success('删除失败',U('home/qqtrade/index'));

}

}

else{


  $this->success('删除失败',U('home/qqtrade/index'));
}

}

else{

$restrade=$tradeModel->delete(I('get.spot_id'));

if($restrade){

$this->success('删除成功',U('home/qqtrade/index'));

exit;

}
else{
$this->success('删除失败',U('home/qqtrade/index'));

}


}


} 

//有无二维码分类分割线
else{



$rescxkwd= $WximgModel->where("tid='$id'")->select();

if($rescxkwd){

$resdelkd= $WximgModel->where("tid='$id'")->delete();

if($resdelkd){

$restrade=$tradeModel->delete(I('get.spot_id'));

if($restrade){

$this->success('删除成功',U('home/qqtrade/index'));

exit;

}
else{
$this->success('删除失败',U('home/qqtrade/index'));

}

}

else{


  $this->success('删除失败',U('home/qqtrade/index'));
}

}

else{

$restrade=$tradeModel->delete(I('get.spot_id'));

if($restrade){

$this->success('删除成功6',U('home/qqtrade/index'));

//exit;

}

else{
$this->success('删除失败',U('home/qqtrade/index'));

}

}

}

}


public function all_del(){
   
   $tradid=I('post.tradid');

   $tradeModel=D('qqtradeplans');
   
    $keyModel=D('qqnums');
    $WximgModel=D('qqwximg');

   foreach ($tradid as $rowid) {

  $rescxkwd= $keyModel->where("tid='$rowid'")->select();

  $rescxkimg= $WximgModel->where("tid='$rowid'")->select();

  if($rescxkwd||$rescxkimg){

$resdelkd=  $keyModel->where("tid='$rowid'")->delete();
$resdelimg=  $WximgModel->where("tid='$rowid'")->delete();

if($resdelkd|| $rescxkimg){

 $resalldel =$tradeModel->delete($rowid);

if($resalldel){

$msg="删除成功";

}

else{

 $msg="删除失败";

  }

}

else{

   $msg="删除失败";
}


}

else{

 $resalldel =$tradeModel->delete($rowid);

if($resalldel){

$msg="删除成功";

}

else{

 $msg="删除失败";

  }

}

   }


$this->ajaxReturn($msg);

}

//计划删除功能结束







}