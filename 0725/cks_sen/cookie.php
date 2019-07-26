<?php

// 1. 设置cookie

//setcookie('username', 'admin');
//echo time(); // 返回当前的时间戳
//setcookie('user_id', 20, time()+20);

// 2. 读取cookie
//setcookie('email', 'admin@php.cn');
//echo $_COOKIE['email'];

// 3. 更新cookie
//$_COOKIE['username'] = 'peter zhu';
//echo $_COOKIE['username'];

// 4. 销毁cookie
//unset($_COOKIE['username']);
//setcookie('username', 'jack', time()-360000);

setcookie('user[name]', 'admin');
setcookie('user[id]', 100);
setcookie('user[email]', 'admin@php.cn');

if (isset($_COOKIE['user'])) {
    foreach ($_COOKIE['user'] as $key=>$value) {
        echo "{$key}=> {$value}<br>";
    }
}
