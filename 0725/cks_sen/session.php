<?php

// 1. 启动会话
session_start();

// 2. 设置session
$_SESSION['username'] = 'Peter Zhu';
$_SESSION['user_id'] = 150;
$_SESSION['email'] = 'peter@php.cn';

// 3 读取session
echo $_SESSION['username'],'<br>',$_SESSION['user_id'],'<br>',$_SESSION['email'];

// 4.销毁session
// 4.1. 只是清空服务器上的session文件内容
//session_unset();

// 4.2.将服务器保存的session文件删除(内容当然是清空的)
//session_destroy();

// 4.3. 将浏览器上保存到cookie中的PHPSESSID删除
setcookie('PHPSESSID','', time()-3600);






