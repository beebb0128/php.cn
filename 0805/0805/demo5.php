<?php

namespace _0805;

use PDO;

//命名空间的实战小案例

interface iDbparams
{
    const DSN = 'mysql:host=127.0.0.1;dbname=php';
    const USER = 'root';
    const PASS = 'root';
}

$pdo = new PDO(iDbparams::DSN, iDbParams::USER,iDbParams::PASS);


$sql = 'SELECT `staff_id`,`name`,`position`,`hiredate` FROM `staff` LIMIT :num OFFSET :offset';
$stmt = $pdo->prepare($sql);
$stmt->bindValue('num',5, PDO::PARAM_INT);
$stmt->bindValue('offset',0, PDO::PARAM_INT);
$stmt->execute();

foreach ($stmt->fetchAll() as $staff) {
    // date(): 格式化一个时间戳, 以人性的字符串形式输出
    $hiredate = date('Y/m/d', $staff['hiredate']);
    echo "<li>{$staff['staff_id']}--{$staff['name']}--{$staff['position']}--{$hiredate}</li>";
}