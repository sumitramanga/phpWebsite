<?php
	/* include adds the header.php within this file (index.php). Everything will
	 continue like normal if not found */
	// include('templates/header.php');

	// var created before the require to indicate what page we are on
	$page = 'Home';
	$desc = '';
	$bgImage = 'homeBgImage';

	/* This is needed in order to run the website at all. A warning and fatel
	error messages will appear */
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
    </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
