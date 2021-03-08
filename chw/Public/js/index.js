
  
/*
* 全选
*/
function checkAll(){
//var arr = document.getElementsByName('id');

var  arr = document.getElementsByClassName('box');

for (var i=0;i<arr.length;i++) {
arr[i].checked = true;
}
}
/*
* 全不选
*/

 
function uncheckAll(){
//var arr1 = document.getElementsByName('id');
var  arr1 = document.getElementsByClassName('box');

for (var i = 0; i < arr1.length; i++) {
arr1[i].checked = false;
}
}

/*
* 反选
*/
function encheckAll(){
//var ar = document.getElementsByName('id');
var  ar = document.getElementsByClassName('box');

for (var i = 0; i < ar.length; i++) {
ar[i].checked = !ar[i].checked;
}
}


//planlist页面功能开始  暂不使用

$(function(){

/*
$(".groupone").click(function(){

var index = $(this).index();
$(this).addClass("changebgcolor").siblings().removeClass("changebgcolor");

$(".listctn").eq(index).show().siblings().hide()


})

*/


})


//planlist页面功能结束
  
