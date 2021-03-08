 $(function(){ 
        $('#tt').tree(
        {  
            onClick:function(node){  
             var title = node.text  ;  
                if(title=="图片管理"){  
                    var  url = "{:U('admin/addsuer')}";                  
                     addTab(title, url) ;  
                }

                else if(title=="首页管理"){  
                     return false;
                }
                else if(title=="用户管理"){  
                     return false;
                }

                else if(title=="景区管理"){  
                     return false;
                }

                else if(title=="农家乐管理"){  
                     return false;
                }

                 else if(title=="添加图片"){  
                     var url = "Home/View/Home/homeadd.html" ;      
                     addTab(title, url) ;  
                }
                 else if(title=="文章管理"){  
                     var url = "{:U('home/')}" ;      
                     addTab(title, url) ;  
                }

                  else if(title=="文章修改"){  
                     var url = "ideaadd.html" ;      
                     addTab(title, url) ;  
                }

                else if(title=="管理员管理"){  
                     var url = "{:U('home/')}" ;      
                     addTab(title, url) ;  
                }
                    
                    else if(title=="添加管理员"){  
                     var url = "Home/View/Admin/adduser.html" ;      
                     addTab(title, url) ;  
                }

                else if(title=="会员管理"){  
                     var url = "member.html" ;      
                     addTab(title, url) ;  
                }


                else if(title=="轮播图片管理"){  
                     var url = "spotpic.html" ;      
                     addTab(title, url) ;  
                }
                 
                  else if(title=="景区列表管理"){  
                     var url = "spotlist.html" ;      
                     addTab(title, url) ;  
                }

                 else if(title=="添加景区信息"){  
                     var url = "spotlistadd.html" ;      
                     addTab(title, url) ;  
                }
                    
                    else if(title=="农家乐图片管理"){  
                     var url = "farmpic.html" ;      
                     addTab(title, url) ;  
                }

                else if(title=="农家乐列表管理"){  
                     var url = "farmlist.html" ;      
                     addTab(title, url) ;  
                }

                else if(title=="添加农家乐信息"){  
                     var url = "farmlistadd.html" ;      
                     addTab(title, url) ;  
                }

                else if(title=="基于jsp的文件上传下载"){  
                     var url = "${pageContext.request.contextPath}/easyUIFileM.jsp";     
                     addTab(title, url) ;  
                }                     
                else{  
                    alert("功能模块未开发");  
                }                           
            }  
        }); 

       function addTab(title, url){                  
                content = '<iframe scrolling="auto" frameborder="0"  src="' + url+ '" style="width:100%;height:100%;"></iframe>';  
                if(!$("#tabs").tabs('exists', title)){  
                    $("#tabs").tabs("add", {  
                 title : title,  
                 closable :  true,  
                 content : content,  
                 width: $('#mainPanle').width() ,  
                 height: $('#mainPanle').height(),  
                } );                   
            }else{  
                 $('#tabs').tabs('select', title);  
            }            
        }  


     })   