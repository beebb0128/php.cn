<?php
// foods array
$foods = [
	[
		'foods_id' => 1,
		'name'     => 'apple',
		'detail'   => 'apple is good',
		'cate_id'  => 1
	],

	[
		'foods_id' => 2,
		'name'     => 'banana',
		'detail'   => 'banana is good',
		'cate_id'  => 1
	],

	[
		'foods_id' => 3,
		'name'     => 'orange',
		'detail'   => 'orange is good',
		'cate_id'  => 1
	],

	[
		'foods_id' => 4,
		'name'     => 'water',
		'detail'   => 'water is good',
		'cate_id'  => 2
	],

	[
		'foods_id' => 5,
		'name'     => 'cola',
		'detail'   => 'cola is bad',
		'cate_id'  => 2
	],

	[
		'foods_id' => 6,
		'name'     => 'juice',
		'detail'   => 'juice is good',
		'cate_id'  => 2
	],

	[
		'foods_id' => 7,
		'name'     => 'candy',
		'detail'   => 'candy is bad',
		'cate_id'  => 3
	],

	[
		'foods_id' => 8,
		'name'     => 'potato chips',
		'detail'   => 'potato chips is yummy',
		'cate_id'  => 3
	],

	[
		'foods_id' => 9,
		'name'     => 'ice-cream',
		'detail'   => 'ice-cream is yummy',
		'cate_id'  => 3
	],

];


$cates = [
	[ 'cate_id' => 1, 'name' => 'fruit', 'alias' => 'fruit' ],
	[ 'cate_id' => 2, 'name' => 'drink', 'alias' => 'drink' ],
	[ 'cate_id' => 3, 'name' => 'snack', 'alias' => 'snack' ],
];

// web config
$system = [
	'sys_id' => 1,
	'title'  => 'Foods',
	'desc'   => 'Some Foods description',
	'key'    => 'fruit,drink,snack',
	'copy'   => 'Makpipi'
]
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="description" content="<?php echo $system['desc'] ?>">
    <meta name="keywords" content="<?php echo $system['key'] ?>">
    <title><?php echo $system['title'] ?></title>
</head>
<body>

<div class="header">
    <ul class="nav">
        <li><a href="index.php">HomePage</a></li>
		<?php foreach ( $cates as $cate ) : ?>
            <li><a href="list.php?cate_id=<?php echo $cate['cate_id']; ?>"><?php echo $cate['alias'] ?></a></li>
		<?php endforeach; ?>
    </ul>
</div>
