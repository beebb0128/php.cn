<?php
// header
include __DIR__ . "/component/header.php";

//build html template by php
echo '<ol>';
foreach ( $cates as $cate ):
	// echo title
	echo '<h2>' . $cate['name'] . '</h2>';

	//echo list
	foreach ( $foods as $food ):
		//find same id
		if ( $cate['cat_id'] === $food['cate_id'] ) {
			echo '<li><a href="detail.php?foods_id=' . $food['foods_id'] . '">' . $food['name'] . '</a></li>';
		}

	endforeach;
endforeach;
echo '</ol>';

// footer
include __DIR__ . '/component/footer.php';
