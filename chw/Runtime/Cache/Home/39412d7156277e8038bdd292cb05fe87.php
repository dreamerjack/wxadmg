<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<link rel="stylesheet" href="/wxadmgeedit2/chw/Public/style/css/login.css">

       <link rel="stylesheet" href="/wxadmgeedit2/chw/Public/huazhen2008/www.huazhen2008.com/general/web/css/account/reset.css">
        <link rel="stylesheet" href="/wxadmgeedit2/chw/Public/huazhen2008/www.huazhen2008.com/general/web/css/account/header.css">
        <link rel="stylesheet" href="/wxadmgeedit2/chw/Public/huazhen2008/www.huazhen2008.com/general/web/css/account/footer.css">
        <link rel="stylesheet" href="/wxadmgeedit2/chw/Public/huazhen2008/www.huazhen2008.com/general/web/css/public/swiper-3.3.1.min.css">
        <link rel="stylesheet" href="/wxadmgeedit2/chw/Public/huazhen2008/www.huazhen2008.com/general/web/css/account/public.css">
        <link rel="stylesheet" href="/wxadmgeedit2/chw/Public/huazhen2008/www.huazhen2008.com/general/web/css/account/login.css">


	<script type="text/javascript">
		
      function test(){
        if(document.getElementById('content-name').value==""){
        alert("用户名不能为空");
        return false;
   }
   if(document.getElementById('content-pwd').value.length<6){
    alert('密码不能少于六位');
       return false;
   }
   return true;
    }

	</script>
</head>
<body>


<div class="contain"  style="margin-top:-40px;" >
    <div class="con">
        <div class="main">
            <div class="right_msg">
                <div class="right">
                    <div class="right_text"><i></i><span>没有最好，只有更好</span><i></i></div>
                    <ul>
                        <li>
                            <i class="loginIcon1"></i>
                            <span>&nbsp;个性化</span>
                        </li>
                        <li>
                            <i class="loginIcon2"></i>
                            <span>&nbsp;品质化</span>
                        </li>
                        <li class="nomargin">
                            <i class="loginIcon3"></i>
                            <span>&nbsp;高端化</span>
                        </li>
                    </ul>
                </div>
                
    <div class="tab cut ">
        <div class="list">
            <h2 class="list_left">登录加粉后台管理系统</h2>
<!--
            <span class="list_right"><a href="">立即注册</a></span>
            <span class="list_text">还没有花镇账号？</span>
-->

        </div>

     <!--   <form class="loginForm"  style="border:1px solid red;" >-->


<form action="" method="POST" enctype="multipart/form-data" onsubmit="return test()"; >



            <div class="form-group loginForm">
                <div class="input-group">
                    <i></i>
                    <input type="text" placeholder="用户名" class="form-control" id="content-name" name="username"      />
                </div>

                <div class="input-group register">
                    <i></i>
                    <input type="password" placeholder="密码" class="form-control"       id="content-pwd" name="pwd"   readonly    onfocus="this.removeAttribute('readonly')"     />
                </div>

                <input type="hidden" name="mansel" value='2'> 

    <!--        <div class="login-p" style="display:none;"> 

登录类型：
 <select class="set" name="mansel" id="selectop" >

 <option  value="1">我是管理员</option>       
  </select>    </div> -->


 <div class="input-group" style="">
<!--
<a href="<?php echo U('home/member/register');?>" style="display:block;width:60px;height:30px;line-height:30px;background:#ff5562;color:#fff;text-align:center;border-radius:3px;">    <div > 忘记密码 </div> </a>

-->
             <a href="<?php echo U('home/mlogin/register');?>" style="display:block;width:60px;height:30px;line-height:30px;background:#ff5562;color:#fff;text-align:center;border-radius:3px;margin:0 20px;">    <div > 去注册 </div> </a>




                </div>




           

                <div class="input-group">
                    <input class="btn nomargin" type="submit" value="登录">
                </div>

                


<!--
<div class="content content-btn"><input class="btn" type="submit" name="" value="登录" ></div>

-->

            </div>
        </form>
    </div>
                <img class="yezi" width="96" height="82" title="" alt="" src="http://tgoss.huazhen2008.com/backend/img/images/yezi.png">
            </div>
        </div>
        <div style="clear: both"></div>

    </div>
  <!--  <div class="footer">
        <p>
            <span> Copyright© 2018 OUT OF LOVE All Rights Reserved.</span><br>
            鄂ICP备18022008号 版权所有：武汉满分爱科技有限公司
        </p>
    </div> -->
</div>

</body>
</html>