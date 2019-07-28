<?php

////  已登錄,顯示訊息及登出按鈕
////cookie
//if (isset($_COOKIE['username']) && $_COOKIE['username'] === 'admin') {
//    echo '用户: ' . $_COOKIE['username'] . '已登录<br>';
//    echo '<a href="dispatch.php?action=logout">退出</a>';
//} else {
//    //  未登錄,跳到登錄頁
//    echo '<a href="dispatch.php?action=login">请登录</a>';
//}

//session part
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
    echo '用户: ' . $_SESSION['username'] . '已登录<br>';
    echo '<a href="dispatch.php?action=logout">退出</a>';
} else {
    //未登錄,跳到登錄頁
    echo '<a href="dispatch.php?action=login">请登录</a>';
}