<?php
/**
 * Created by beebb.
 * Date: 17/7/2019
 * Time: 10:05
 */


$userData = [
	'username' => 'admin',
	'password' => '123456',
	'email'    => 'admin@gmail.com'
];

//transfer array to json
$jsonPost = json_encode( $_POST );
echo $jsonPost.'<br>';

//if($_POST['username'] == $userData['username']){
//	echo '1';
//}else{
//	echo '2';
//}

//echo $jsonFormat;

