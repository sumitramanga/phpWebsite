<?php
	/* include adds the header.php within this file (index.php). Everything will
	 continue like normal if not found */
	// include('templates/header.php');

	// var created before the require to indicate what page we are on
	$page = 'Home';
	$desc = '';
	$bgImage = 'homeBgImage';

	/* This is needed in order to run the website at all. A warning and fatel
	error messages will appear aka like the die method.
	Templates are good for reducing time when making fixes to a certain part
	without going into each file which has consistent code. */

	require('templates/header.php');
?>

	<main role="main" class="inner cover">
	  <h1 class="cover-heading"><?= $page; ?></h1>
	  <p class="lead">This is the <?= $page; ?> page</p>
	  <p class="lead">
		<a href="#" class="btn btn-lg btn-secondary">Learn more</a>
	  </p>
	</main>

	<?php require("templates/footer.php"); ?>
