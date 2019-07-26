<?php
// 加载公共头部
include __DIR__ . '/component/header.php';

//get the cate_id to show which pages
$integerId = intval( $_GET['cat_id'] );

echo '<ol>';
foreach ( $cates as $cate ):
	if ( $integerId == $cate['cat_id'] ) {
		echo '<h2>' . $cate['name'] . '</h2>';
		foreach ( $foods as $food ):
			if ( $cate['cat_id'] == $food['cate_id'] ) {
				echo '<li><a href="detail.php?foods_id=' . $food['foods_id'] . '">' . $food['name'] . '</a></li>';
			}
		endforeach;
	}
endforeach;
echo '</ol>';


// 加载公共底部
include __DIR__ . '/component/footer.php';