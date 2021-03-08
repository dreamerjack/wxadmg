<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<title>满分爱预约管理系统</title>
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/icon.css">

  <link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/index.css">

	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/adduser.css">
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.easyui.min.js"></script>

  <script>

    function test(){
      
       if(document.getElementById('spot-ad').value==""){
        alert('账户名称不能为空');
        return false;
      }

      if(document.getElementById('spot-n').value==""){
        alert('计划名称不能为空');
        return false;
      }

var  myselect=document.getElementById("selectop");

var index =myselect.selectedIndex;

var selvalue=myselect.options[index].value;

console.log(selvalue);

if(selvalue=='请选择类型'){

alert('请选择类型');
        return false;

}


 
   
}
  </script>


</head>
<body class="easyui-layout">   
	

<div class="add-title">计划基本信息</div>

       <div class="add-ctn">
         
         <form action="<?php echo U(home/trade/tradeadd);?>" method="POST" enctype="multipart/form-data" onsubmit="return test()";>
<div class="content">
          账户名称: <input type="text" id="spot-ad" name="adname">
</div>


<div class="content">
          计划名称: <input type="text" id="spot-n" name="planname">
</div>

<div class="content">
          媒体: <select name="medium" id="selectop">
                   <option value="请选择类型">请选择类型</option>
                  <option value="1"> 有二维码</option>
                  <option value="2">无二维码</option>
                 

                </select>
                
              </div>


 

    <input   type="hidden" name="rights"    value='3' >



              <div class="content content-btn"><input class="btn" type="submit" name="" value="提交"></div>
        </form>
</div>
    


      
</body>  
</html>