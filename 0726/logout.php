<?php
// 必须在用户已经登录的情况下再退出

//cookie有值 = 已登入

//cookie part
//if ( isset($_COOKIE[ 'username' ]) && $_COOKIE[ 'username' ] === 'admin' ) {
//    //清空cookie -> logout
//    setcookie('username' , null , time() - 3600);
//    echo '<script>alert("退出成功");location.assign("index.php");</script>';
//} else {
//    // 要求用户先登录
//    echo '<script>alert("請先登录");location.assign("login.php");</script>';
//}

//session part
session_start();
if ( isset($_SESSION[ 'username' ]) && $_SESSION[ 'username' ] === 'admin' ) {
    //unset session => logout
    session_unset();
    setcookie('PHPSESSID' , null , time() - 3600);
    echo '<script>alert("退出成功");location.assign("index.php");</script>';
} else {
    // 要求用户先登录
    echo '<script>alert("請先登录");location.assign("login.php");</script>';
}
