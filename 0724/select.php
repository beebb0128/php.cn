<?php
/**
 * Created by beebb.
 * Date: 25/7/2019
 * Time: 9:57
 */
require __DIR__ . '/db/connect.php';

//create SQL statement and prepare Obj
$preObj = $pdo->prepare('SELECT * FROM `userdetail` WHERE `user_id`=:user_id');

//execute SQL
$preObj->execute(['user_id'=>'666']);

$datas = $preObj->fetchAll(PDO::FETCH_ASSOC);
foreach ($datas as $data) {
	echo '<pre>' . print_r($data, true);
}
