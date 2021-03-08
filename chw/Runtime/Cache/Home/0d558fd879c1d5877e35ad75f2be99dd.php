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
      
      if(document.getElementById('spot-n').value==""){
        alert('微信号不能为空');
        return false;
      }


   /*   
 if(document.getElementById('spot-p').value==""){
        alert('密码不能为空');
        return false;
      }
*/
   
}
  </script>


</head>
<body class="easyui-layout">   
	

<div class="add-title">添加微信号</div>

<?php if($shownavid == 2 ): ?><div class="add-ctn">
         
         <form action="<?php echo U(home/trade/keywdadd);?>" method="POST" enctype="multipart/form-data" onsubmit="return test()";>
<div class="content">
          微信号: <input type="text" id="spot-n" name="kwd"  oninput="this.value=this.value.replace(/\s+/g,'')"   >
</div>

<div class="content">
           <input  type="hidden"  id="spot-m"   value="<?php echo ($tid); ?>"  name="tid">
           <input  type="hidden"  id="spot-m"   value="<?php echo ($shownavid); ?>"  name="classifyid">

</div>






 <div class="content content-btn"><input class="btn" type="submit" name="" value="提交"></div>
        </form>
</div>
    
<?php else: ?>

       <div class="add-ctn">
         
         <form action="<?php echo U(home/trade/keywdadd);?>" method="POST" enctype="multipart/form-data" onsubmit="return test()";>
<div class="content">
          微信号: <input type="text" id="spot-n" name="wx"  oninput="this.value=this.value.replace(/\s+/g,'')"  >
</div>

<div class="content">
        <input  type="hidden"  id="spot-m"   value="<?php echo ($tid); ?>"  name="tid">
           <input  type="hidden"  id="spot-mn"   value="<?php echo ($shownavid); ?>"  name="classifyid">

</div>

<!--
<div class="content">
          密码: <input type="password" id="spot-p" name="spotpwd"  readonly    onfocus="this.removeAttribute('readonly')"     >
</div>-->

  <div class="content" >
          上传二维码: <input type="file" name="images">
          <span class="content-require">上传图片大小不超过300kb</span>
        </div>





    <input   type="hidden" name="rights"    value='3' >



              <div class="content content-btn"><input class="btn" type="submit" name="" value="提交"></div>
        </form>
</div><?php endif; ?>


      
</body>  
</html>