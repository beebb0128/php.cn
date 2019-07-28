<?php

// 请求派发器: 前端控制器
// 功能就是获取到用户的请求, 并调用不同的脚本进行处理和响应

require __DIR__ . '/db/connect.php';

//判斷請求的值
$action = isset($_GET[ 'action' ]) ? $_GET[ 'action' ] : 'login';

// htmlentites ->轉換成html實體
//strtolower-> 轉換成小寫
//trim-> 刪除空格
$action = htmlentities(strtolower(trim($action)));

//分發請求

switch ($action) {
    //獲取參數為login -> 跳到login頁面
    case 'login':
        include __DIR__ . '/login.php';
        break;

    //獲取參數為check -> 跳到check頁面
    case 'check':
        include __DIR__ . '/check.php';
        break;

    //獲取參數為logout -> 跳到logout頁面
    case 'logout':
        include __DIR__ . '/logout.php';
        break;

        //默認操作 其他參數->跳到首頁
    default:
        header('Location : index.php');
    //  JS : echo '<script>location.assign("index.php");</script>';
}

