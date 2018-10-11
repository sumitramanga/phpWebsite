<?php
	$page = 'Contact Form Task';
	$bgImage = 'formTaskBgImage';
	require('templates/header.php');

 ?>

<?php require('templates/main.php'); ?>

  <form class="contactFormTask" action="index.html" method="post">
	<label for="name">Name</label>
	<input type="text" name="name">

	<label for="imageUpload"></label>
	<input type="file" class="form-control-file" name="" value="">

	<label for="textarea">Enter a description about your upload</label>
	<textarea name="textarea" rows="5" cols="70"></textarea>
  </form>

<?php require('templates/footer.php'); ?>
