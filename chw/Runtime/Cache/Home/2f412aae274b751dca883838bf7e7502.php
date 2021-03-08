<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>加粉管理系统</title>
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/index.css">
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.easyui.min.js"></script>
  <!-- <script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/right-nav.js"> </script>-->
    <script>
        $(function(){ 
        $('#tt').tree(
        {  
            onClick:function(node){  
             var title = node.text  ;  
                if(title=="图片管理"){  
                    var  url = "<?php echo U('home/home/homepage');?>";                  
                     addTab(title, url) ;  
                }
/*
                else if(title=="首页管理"){  
                     return false;
                } */

                else if(title=="系统管理"){  
                     return false;
                }
                 
                   else if(title=="会员管理"){  
                     return false;
                }

                else if(title=="微信管理"){  
                     return false;
                }

              else if(title=="QQ管理"){  
                     return false;
                }



                else if(title=="超级管理员"){  
                     var url = "<?php echo U('home/admin/admin');?>";      
                     addTab(title, url) ;  
                }

                        else if(title=="会员管理详情"){  
                     var url = "<?php echo U('home/member/index');?>" ;      
                     addTab(title, url) ;  
                } 
                 
                  else if(title=="微信管理详情"){  
                     var url = "<?php echo U('home/trade/index');?>" ;      
                     addTab(title, url) ;  
                }       
                  
                    else if(title=="QQ号管理详情"){  
                     var url = "<?php echo U('home/qqtrade/index');?>" ;      
                     addTab(title, url) ;  
                } 
                

                else{  
                    alert("功能模块未开发");
                }                           
            }  
        })



       function addTab(title, url){                  
                content = '<iframe scrolling="auto" frameborder="0"  src="' + url+ '" style="width:100%;height:99%;"></iframe>'; 
                //没有tabs时添加
                if(!$("#tabs").tabs('exists', title)){  
                    
                    $("#tabs").tabs("add", {  
                 title : title,  
                 closable :  true,  
                 content : content,  
                 width: $('#mainPanle').width() ,  
                 height: $('#mainPanle').height(),  
                } ); 
        }


              //有tabs时更新tabs
            else{  
                // $('#tabs').tabs('select', title);

              var current_tab = $('#tabs').tabs('getSelected');  
        $('#tabs').tabs('update',{  
             tab:current_tab,  
             options : {  
                title : title,
                content : content,
             }  
        });  

        }  
}

     })   
    </script>

</head>
<body class="easyui-layout">   
	
    <div data-options="region:'north',split:true" style="height:60px;background-color:#E6F0FF;">
    	<div class="titles">
    <div class="titles-left">欢迎<span style="color:red;"><?php echo ($_SESSION['name']); ?></span>登录后台管理系统</div>
    <div class="titles-right"><a href="<?php echo U('home/login/logout');?>">退出</a></div>
    </div>
</div>   
   
    <div data-options="region:'west',title:'管理',split:true" style="width:200px;">
    	
      <ul id="tt" class="easyui-tree">

  <li>   
        <span>系统管理</span> 
        <ul>
            <li>超级管理员</li>
        </ul>  
    </li>

 <li>   
      <span>会员管理</span> 
        <ul>
            <li id="trade">会员管理详情</li>
        </ul>  
    </li>


 <li>   
      <span>微信管理</span> 
        <ul>
            <li id="trade">微信管理详情</li>
        </ul>  
    </li>

 <li>   
      <span>QQ管理</span> 
        <ul>
            <li id="persontrade">QQ号管理详情</li>
             
        </ul>  
    </li>
     

</ul>  

    </div>  


    <div data-options="region:'center',title:'内容管理'" style="padding:5px;background:#eee;">
    	
        <div id="tabs" class="easyui-tabs" fit="true" border="false"  >  
            <div title="欢迎使用" style="padding:20px;overflow:hidden;" id="home">  
                <h1 >欢迎登录后台管理系统!</h1>  
                
            </div>  
            
        </div>    

    </div>




</body>  
</html>