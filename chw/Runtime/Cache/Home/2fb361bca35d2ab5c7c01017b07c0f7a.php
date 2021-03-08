<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<title>加粉管理系统</title>
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/wxadmgeedit2/chw/Public/style/css/index.css">
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/jquery.easyui.min.js"></script>
  <script type="text/javascript" src="/wxadmgeedit2/chw/Public/js/index.js"></script>

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

<script>
$(function(){

//删除所选功能开始
$(".delsel").click(function(){


var arrid=document.getElementsByClassName('box');

var arr_id=[];


for (var i = 0; i < arrid.length; i++) {

if(arrid[i].checked){

arr_id.push(arrid[i].value)

}

}

if(arr_id==''){

console.log('无数据')
alert('请选择删除项')
return false;

}

else{

  if(confirm("删除计划后，此计划包含的所有数据都会被删除，确定要删除吗？")) 
  {
    
  //  return true;

//请求数据结束

  $.ajax({ 

     dataType:'json', 

    // url : 'http://localhost/ordersystem/chw/index.php/Home/Book/booklist?',
     url : "<?php echo U('home/member/userall_del');?>",
     data:{
      
        tradid:arr_id,
     },
     
      type: "POST",

    async:false,//这里选择异步为false，那么这个程序执行到这里的时候会暂停，等待                    //数据加载完成后才继续执行      
  success : function(data){       
    
var  msg=data;

//循环列表开始

if(msg=='删除成功'){
 
alert('删除成功')
window.location.reload()

}

//循环列表结束

         }    

       }); 

//请求数据结束



  }
  else
  {
    return false;
  }



}

})

})

//删除所选功能结束



</script>

<style>
  
  .groupone{
  width:150px;
  text-align:center;
  cursor: pointer;
  
}

</style>

</head>
<body>   
       <div class="adduser"><a href="<?php echo U('home/member/register');?>">添加会员</a></div>

	     <table class="tab" cellspacing="0" cellpadding="0" >
           <thead  >
               <tr >
                <th class="tab-title" width="50">id</th>
                   <th class="tab-title" width="150">用户名</th>
                
                    <th class="tab-title" width="150">最近登录时间</th>
                   <th class="tab-title" width="120">操作</th>
               </tr>
           </thead>
           <tbody  id="groupinsert" >
            <?php if(is_array($splist)): foreach($splist as $key=>$list): ?><tr>
         <!--      <td class="tab-title" ><?php echo ($list["id"]); ?></td> -->
 <td   class="tab-title" ><input name="fid" id="id"  class="box"  type="checkbox" value="<?php echo ($list["id"]); ?>" >   <?php echo ($list["id"]); ?> </td>

                <td class="tab-title" ><?php echo ($list["username"]); ?></td>
                 <td class="tab-title" ><?php echo (date('Y-m-d H:i',$list["logtime"])); ?></td>
                <td class="tab-title  tab-titlehf " >

      <a href="<?php echo U('home/member/member_edit',array('planid'=>$list['id'],'navid'=>1));?>">修改</a> 

                <a  class="delhf" href="<?php echo U('home/member/member_del',array('spot_id'=>$list['id']));?>"  onclick='return del();' >删除</a> 


                </td>
               </tr><?php endforeach; endif; ?>

<!--选择删除结束-->
<!--
<tr>     <td  class="tab-title"  colspan="5" style="padding-left:20px;text-align:left;height:45px;"><input class="checksl"  id="selectAll" type="button"  value="全选" onclick="checkAll()"/>
<input class="checksl"  id="unselectAll" type="button"  value="全不选" onclick="uncheckAll()"/>

<input  class="checksl" id="disSelect" type="button" value="反选" onclick="encheckAll()"/>
                </td>          </tr>


<tr ><td  class="tab-title"  colspan="5"  style="text-align:left;height:45px;padding-left:20px;"><button style="width:120px;height:35px;font-size:18px;" class="delsel"   /> 删除所选</button> </td></tr>  -->

<!--选择删除开始-->

           </tbody>
       </table>	
        


<div class="pagination">
    　　<ul>
            <li><?php echo ($page); ?></li>
        </ul>
</div>

</body>  
</html>