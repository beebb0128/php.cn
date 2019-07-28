<?php
/**
 * Created by beebb.
 * Date: 25/7/2019
 * Time: 9:58
 */

//connect database

$db = require 'database.php';

// mysql:host=127.0.0.1;dbname=php
$dsn = "{$db['type']}:host={$db['host']};dbname={$db['dbname']}";
$username = $db['username'];
$password = $db['password'];

//test
try {
	$pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	die('连接失败' . $e->getMessage());
}
