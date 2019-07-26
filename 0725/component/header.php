<?php

//connect to database first
require __DIR__ . '/../db/connect.php';

//get foods data from database
$sql = 'SELECT * FROM `foods`';
//prepare
$preObj = $pdo->prepare( $sql );
//execute
$preObj->execute();
//input to array
$foods = $preObj->fetchAll( PDO::FETCH_ASSOC );

//get category data from database
$sql    = 'SELECT * FROM `category`';
$preObj = $pdo->prepare( $sql );
$preObj->execute();
$cates = $preObj->fetchAll( PDO::FETCH_ASSOC );
//count array length
$cate_count = count( $cates );

$sql    = 'SELECT *  FROM `system` LIMIT 1';
$preObj = $pdo->prepare( $sql );
$preObj->execute();
$system = $preObj->fetch( PDO::FETCH_ASSOC );

//fetchAll ->using in 多維數組, fetch->using in 1維數組
//fetch + LIMIT = fetch
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
            <li><a href="list.php?cat_id=<?php echo $cate['cat_id']; ?>"><?php echo $cate['alias'] ?></a></li>
		<?php endforeach; ?>
    </ul>
</div>
