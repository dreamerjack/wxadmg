<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<title>加粉管理系统</title>
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/index.css">
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.easyui.min.js"></script>

<script>
function del()
{
  if(confirm("确定要删除吗？")) 
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>

</head>
<body >  

<div class="adduser"><a href="<?php echo U('home/admin/adduser');?>">添加管理员</a></div>

	 <form >
       <table class="tab" cellspacing="0" cellpadding="0" >
           <thead  >
               <tr >
                   <th class="tab-title" width="50">姓名</th>
                   
                   <th class="tab-title" >管理员类型</th>
                    <th class="tab-title"  >最近登录</th>
                   <th class="tab-title" width="80">操作</th>
               </tr>
           </thead>
           <tbody>
            <?php if(is_array($adminlist)): foreach($adminlist as $key=>$admin): ?><tr>
                <td class="tab-title" width="80" ><?php echo ($admin["username"]); ?></td>

                <td class="tab-title" width="120">
                <?php echo ($admin["rights"]); ?>

              </td>
                <td class="tab-title" width="70"><?php echo (date('Y-m-d',$admin["logtime"])); ?></td>
                <td class="tab-title" width="70"><a href="<?php echo U('Home/admin/adduser_edit',array('admin_id'=>$admin['id']));?>">修改</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/admin/admin_del',array('admin_id'=>$admin['id']));?>"  onclick='return del();'  >删除</a></td>
               </tr><?php endforeach; endif; ?>
           </tbody>
       </table>	
       </form>
</body>  
</html>