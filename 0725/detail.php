<?php
// 加载公共头部
include __DIR__ . '/component/header.php';

$integerId = intval( $_GET['foods_id'] );

foreach ( $foods as $food ):
	if ( $integerId == $food['foods_id'] ) {
		echo $food['name'] . '<br>';
		echo $food['details'];
	}
endforeach;

// 加载公共底部
include __DIR__ . '/component/footer.php';