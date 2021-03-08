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
	

<div class="add-title">微信号修改</div>

<?php if($shownavid == 2 ): ?><div class="add-ctn">
         
         <form action="<?php echo U(home/trade/keywd_edit,array('navid'=>$shownavid));?>" method="POST" enctype="multipart/form-data" onsubmit="return test()";>
<div class="content">
 <input type="hidden" name="id" value="<?php echo ($kwdinfo["id"]); ?>">


          微信号: <input  oninput="this.value=this.value.replace(/\s+/g,'')" type="text" id="spot-n" name="kwd" value="<?php echo ($kwdinfo["kwd"]); ?>"  >
</div>

<div class="content">
         <input  type="hidden"  id="spot-m"   value="<?php echo ($kwdinfo["tid"]); ?>"  name="tid">
</div>

 <div class="content content-btn"><input class="btn" type="submit" name="" value="提交"></div>
        </form>
</div>

<?php else: ?>


       <div class="add-ctn">
         <form action="<?php echo U(home/trade/keywd_edit,array('navid'=>$shownavid));?>" method="POST" enctype="multipart/form-data" onsubmit="return test()";>


          <div class="content"  >
             <input type="hidden" name="id" value="<?php echo ($kwdinfo["id"]); ?>">

          微信号: <input  oninput="this.value=this.value.replace(/\s+/g,'')"     type="text" id="spot-n" name="wx"  autocomplete="off"  value="<?php echo ($kwdinfo["wx"]); ?>"   >
</div>

 

 <div class="content" id="ptn">
              <ul class="ptn-u">
           
                <li class="pic-list">
             
             <p class="pic-top"><img src="/wxadmge/chw/Uploads/<?php echo ($kwdinfo["wximgurl"]); ?>" ></p>

              
              <p class="edit"><span class="content-require">修改:</span>  <input type="file" name="images[]"></p>
              
              </li>

            

               </ul>

        </div> 

<div class="content">
         <input  type="hidden"  id="spot-m"   value="<?php echo ($kwdinfo["tid"]); ?>"  name="tid">
</div>




<div class="content content-btn"><input class="btn" type="submit" name="" value="提交修改"></div>

             














        </form>
</div><?php endif; ?>

      
</body>  
</html>