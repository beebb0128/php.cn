<?php
/**
 * Created by beebb.
 * Date: 25/7/2019
 * Time: 9:57
 */
require __DIR__ . '/db/connect.php';

//create SQL statement and prepare Obj
$preObj = $pdo->prepare('UPDATE `userdetail` SET `username`=:username, `password`=:password,`user_id`=:user_id');

//execute SQL
$preObj->execute(['username'=>'user1','password'=>'000000','user_id'=>'666']);

echo '成功的添加' . $preObj->rowCount(). '条记录, 主键:'. $pdo->lastInsertId();
