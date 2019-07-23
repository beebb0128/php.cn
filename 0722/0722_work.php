<?php
// store data
$headline = 'Movie Today';
$movies   = [ 'Strange Things', 'Avengers', 'Star Wars' ];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $headline; ?></title>
</head>
<body>
<h2><?php echo $headline; ?></h2>

<p>using {} to do a foreach </p>
<ul>
	<?php foreach ( $movies as $k => $v ) { ?>
        <li><a href="#"><?php echo $v ?></a></li>
	<?php } ?>
</ul>

<p>using : to do a foreach</p>
<ul>
	<?php foreach ( $movies as $v ): ?>
        <li><a href="#"><?php echo $v ?></a></li>
	<?php endforeach; ?>
</ul>

<p>------------------------------------------------</p>
<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo isset( $_POST['email'] ) ? $_POST['email'] : ''; ?>">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="">

    <button>Login</button>
</form>

<?php echo '<pre>'; ?>
<?php print_r( $_POST ); ?>


</body>
</html>