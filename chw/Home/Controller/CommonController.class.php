<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
                // 判断用户是否登陆
        $user = isset($_SESSION['name']) ? $_SESSION['name'] :null;
        if(!$user){
          //  $this->success('未登录，请登录',U('home/login/login'));
           $this->success('未登录，请登录',U('home/mlogin/mlogin'));
           exit;
        }

        
    }
}