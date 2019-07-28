<?php
////cookie part
////防止用户重複登錄
//if (isset($_COOKIE['username']) && $_COOKIE['username'] === 'admin') {
//    echo '<script>alert("你已登錄");location.assign("index.php");</script>';
//}

//session part
session_start();
 //防止用户重複登錄
if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
    echo '<script>alert("你已登錄");location.assign("index.php");</script>';
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
</head>
<body>
<h3>用户登录</h3>
<!--action=check: 跳轉登錄時先進行驗證-->
<!--return isEmpty(): 利用function獲取狀態 true:提交成功 / false:提交失敗-->
<form action="dispatch.php?action=check" method="post" onsubmit="return isEmpty();"
<p>
    <label for="email">邮箱:</label>
    <input type="email" name="email" id="email">
</p>
<p>
    <label for="password">密码:</label>
    <input type="password" name="password" id="password">
</p>
<p>
    <button>提交</button>
</p>
</form>

<script>
    //檢查用戶輸入的數據是否為空
    function isEmpty() {
        var emailValue = document.querySelector('#email').value;
        var passwordValue = document.querySelector('#password').value;

        if(emailValue.length === 0 || passwordValue.length === 0){
            alert('郵箱及密碼不能為空!');
            //返回值為false 表單提交事件失敗
            return false;
        }
    }
</script>
</body>
</html>
