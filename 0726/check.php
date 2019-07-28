<?php
session_start();
//判斷請求類型
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $email = $_POST[ 'email' ];
    //sha1 加密方法-> 轉換成40位的字符串
    $password = sha1($_POST[ 'password' ]);

    //與database進行驗證
    //SQL語句
    $sql = 'SELECT * FROM `user` WHERE `email`=:email AND `password`=:password LIMIT 1';
    //創建預處理對象
    $preObj = $pdo->prepare($sql);
    //執行 -> 把從$_POST獲得的值,存到SQL語句中進行查詢
    $preObj->execute([ 'email' => $email , 'password' => $password ]);
    //返回數據並存到數組
    $user = $preObj->fetch(PDO::FETCH_ASSOC);

    //判斷結果為失敗
    if ( $user === false ) {
        //database驗證失敗 返回上一頁,重新登錄
        echo '<script>alert("驗證失敗!");history.back();</script>';
        exit();
    }

    //判斷結果為成功,並保存到cookie
//    setcookie('username' , $user[ 'username' ]);

    //判斷結果為成功,並保存到session
    $_SESSION['username'] = $user['username'];

    echo '<script>alert("登錄成功");location.assign("index.php");</script>';
    exit;
} else {
    die('請求類型失敗');
}