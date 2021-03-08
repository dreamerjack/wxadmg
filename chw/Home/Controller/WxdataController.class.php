<?php
namespace Home\Controller;
use Think\Controller;

header('Access-Control-Allow-Origin:*');//允许跨域
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');//允许跨域
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');//允许跨域

class WxdataController extends Controller {


public function wxcxres(){

  if(IS_POST){

  $tradeid=I('post.tid');
  $tradeModel=D('tradeplans');
  $wxnumModel =D('keywd');
  $wximgModel=D('wxingwd');

  $resclassify=$tradeModel->where("id='$tradeid'")->field('medium')->find();

//var_dump($resclassify); //返回数据时，不能有echo var_dump等打印命令

if(  $resclassify['medium']=='1'){

$reswxcx=$wximgModel->where("tid='$tradeid'")->field('wx,wximgurl')->select();



}

else{

$reswxcx=$wxnumModel->where("tid='$tradeid'")->field('kwd')->select();


}


$newreswxcx[]=$reswxcx;

$newreswxcx['classify']=$resclassify['medium'];


 $this->ajaxReturn($newreswxcx);

  }

  else{

    echo "非法请求";
  }


}



public function wxcxresbet(){

	if(IS_POST){


  //$tradeid=64;
  $tradeid=I('post.tid');
  $tradeModel=D('tradeplans');
  $wxnumModel =D('keywd');
  $wximgModel=D('wxingwd');
  
  $resclassify=$tradeModel->where("id='$tradeid'")->field('medium')->find();

// var_dump($resclassify); //返回数据时，不能有echo var_dump等打印命令


if(  $resclassify['medium']=='1'){

$reswxcx=$wximgModel->where("tid='$tradeid'")->field('id,wx,wximgurl,dispalytime')->order("id  asc")->select();

 $reswxcxnum=$wximgModel->where("tid='$tradeid'")->field('id,wx,wximgurl,dispalytime')->count();

 $num=0;

foreach($reswxcx as $k=>$rownowwx){
   

  if($rownowwx['dispalytime']=='0'){

      $num=$num+1;
  }

 else{

  $rowfinal=$rownowwx;
 
   $nowtm=NOW_TIME;
$cvalue=$nowtm-$rowfinal['dispalytime'];

$par=600;

if($cvalue>$par){

if($k==($reswxcxnum-1)){

$rowfinal=$reswxcx[0];

$wxid=$rowfinal['id'];

 $wxid=$reswxcx[0]['id'];
 $wxid2=$reswxcx[$k]['id'];

 $data['dispalytime']=NOW_TIME;
 $data2['dispalytime']=0;
 $wximgModel->where("id='$wxid'")->save($data);  //更新当前页面id时间
$wximgModel->where("id='$wxid2'")->save($data2);  //清零之前的id时间

}

else{

$rowfinal=$reswxcx[$k+1];
$wxid=$rowfinal['id'];
$wxid2=$rownowwx['id'];
 $data['dispalytime']=NOW_TIME;
 
$data2['dispalytime']=0;

  $wximgModel->where("id='$wxid'")->save($data);//更新当前页面id时间
  $wximgModel->where("id='$wxid2'")->save($data2);  //清零之前的id时间


}



}

else{

  //差值小于标准的数据                 

$rowfinal=$rownowwx;

}


 }


}

//foreach 循环结束


if($num==$reswxcxnum){

  $rowfinal=$reswxcx[0];
  $wxid=$rowfinal['id'];
  $data['dispalytime']=NOW_TIME;
  $wximgModel->where("id='$wxid'")->save($data);

}


//var_dump($rowfinal);

}

//有无二维码分割线


else{


$reswxcx=$wxnumModel->where("tid='$tradeid'")->field('id,kwd,dispalytime')->order("id  asc")->select();

 $reswxcxnum=$wxnumModel->where("tid='$tradeid'")->count();

$num2=0;

foreach($reswxcx as $k=>$rownowwx){


  if($rownowwx['dispalytime']=='0'){

      $num2=$num2+1;
  }

 else{

  $rowfinal=$rownowwx;
   $nowtm=NOW_TIME;
  $rowfinal['dispalytime'];

$cvalue=$nowtm-$rowfinal['dispalytime'];
$par=30;

if($cvalue>$par){

if($k==($reswxcxnum-1)){

$rowfinal=$reswxcx[0];

 $wxid=$rowfinal['id'];

 $wxid=$reswxcx[0]['id'];
 $wxid2=$reswxcx[$k]['id'];

 $data['dispalytime']=NOW_TIME;
 $data2['dispalytime']=0;
 $wxnumModel->where("id='$wxid'")->save($data);  //更新当前页面id时间
  $wxnumModel->where("id='$wxid2'")->save($data2);  //清零之前的id时间

}

else{

$rowfinal=$reswxcx[$k+1];

$wxid=$rowfinal['id'];

$wxid2=$rownowwx['id'];

 $data['dispalytime']=NOW_TIME;
 
$data2['dispalytime']=0;

  $wxnumModel->where("id='$wxid'")->save($data);//更新当前页面id时间
  $wxnumModel->where("id='$wxid2'")->save($data2);  //清零之前的id时间


}



}

else{

  //差值小于标准的数据                 

$rowfinal=$rownowwx;



}


 }


}

//foreach 循环结束


if($num2==$reswxcxnum){

  $rowfinal=$reswxcx[0];
  $wxid=$rowfinal['id'];
  $data['dispalytime']=NOW_TIME;
  $wxnumModel->where("id='$wxid'")->save($data);

}


}


//$newreswxcx[]=$reswxcx;

$newreswxcx[]=$rowfinal;

$newreswxcx['classify']=$resclassify['medium'];

$this->ajaxReturn($newreswxcx);

	}

	else{

		echo "非法请求";
	}


}


//QQ号未修改

public function qqcxres(){


	if(IS_POST){

  $tradeid=I('post.tid');
  $tradeModel=D('qqtradeplans');
  $wxnumModel =D('qqnums');
  $wximgModel=D('qqwximg');

  $resclassify=$tradeModel->where("id='$tradeid'")->field('medium')->find();

//var_dump($resclassify); //返回数据时，不能有echo var_dump等打印命令

if(  $resclassify['medium']=='1'){

$reswxcx=$wximgModel->where("tid='$tradeid'")->field('wx,wximgurl')->select();



}

else{

$reswxcx=$wxnumModel->where("tid='$tradeid'")->field('kwd')->select();


}


$newreswxcx[]=$reswxcx;

$newreswxcx['classify']=$resclassify['medium'];


 $this->ajaxReturn($newreswxcx);

	}

	else{

		echo "非法请求";
	}



    }





}