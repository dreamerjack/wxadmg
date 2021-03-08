<?php

return array(
    //'配置项'=>'配置值'

    'DB_TYPE'               =>  'mysql',     // 数据库类型
   // 'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'adpowder',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    
     //'DB_USER'               =>  'chw',      // 用户名
     //'DB_PWD'                =>  'ZBdJ8XPWXZc66RiG',          // 密码

    /*地址替换*/
    'TMPL_PARSE_STRING'=>array(
        '__UPLOAD__'=>__ROOT__.'/Uploads',
    ),
);