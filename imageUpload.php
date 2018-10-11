<?php

	// include composer autoload
	require 'vendor/autoload.php';

	// import the Intervention Image Manager package
	use Intervention\Image\ImageManager;

	// 1500px is a good banner size for full screen


	// When getting errors about php go to this method. It will show info about
	// php
	// phpinfo();
	// die();


	// validation for errors
	$errors = array();

	// if the files array exist and there is an image
	if (isset($_FILES['image'])) {
		// creating variables
		$fileSize = $_FILES['image']['size'];
		// temporay file name
		$fileTmp = $_FILES['image']['tmp_name'];
		$fileType = $_FILES['image']['type'];

		var_dump($fileSize);
		var_dump($fileTmp);
		var_dump($fileType);

		// if the file is over 5 megabytes
		if ($fileSize > 5000000) {
			array_push($errors, 'This file is too large. Must be under 5MB');
		}

		// check if image is right file type
		$validExtensions = array('jpg', 'jpeg', 'png');
		// Split and find the dot which is added to an array.
		$fileNameArray = explode('.', $_FILES['image']['name']);

		// converts string to lowercase
		$fileExt = strtolower(end($fileNameArray));

		// if not found it equals false
		if (in_array($fileExt, $validExtensions) === false) {
			array_push($errors, 'File not found, can only be a jpg or png');
		}


		if (empty($errors)) {
			// Where the uploaded file will go
			$destination = 'images/uploads';

			// if this destination doesn't exists make the directory
			if (! is_dir($destination)) {
				mkdir('images/uploads/', 0777, true);
			}

			// This is so we can create a unqiue name for the file
			$newFileName = uniqid() .'.'. $fileExt;
			// move_uploaded_file($fileTmp, $destination.'/'.$newFileName);

			$manager = new ImageManager();

			$mainImage = $manager->make($fileTmp);
			$mainImage->save($destination.'/'.$newFileName, 100);


			$thumbDestination = 'images/uploads/thumbnails';

			if (! is_dir($thumbDestination)) {
				mkdir('images/uploads/thumbnails/', 0777, true);
			}

			// calling the make funciton
			$thumbnailImage = $manager->make($fileTmp);

			// Using the resize function
			$thumbnailImage->resize(300, null, function($constraint){
				$constraint->aspectRatio();
				$constraint->upsize();
			});

			// Adds text to image (watermark)
			$thumbnailImage->text('Hello World', 120, 100);

			// Draws a polygon on the image
			// define polygon points
			$points = array(
			    40,  50,  // Point 1 (x, y)
			    20,  240, // Point 2 (x, y)
			    60,  60,  // Point 3 (x, y)
			    240, 20,  // Point 4 (x, y)
			    50,  40,  // Point 5 (x, y)
			    10,  10   // Point 6 (x, y)
			);
			$thumbnailImage->polygon($points, function($draw) {
				$draw->background('#038f80');
				$draw->border(1, '#38fab3');
			});

			// Crops image into a circle
			$thumbnailImage->crop(100, 100, 25, 25);

			$thumbnailImage->opacity(50);

			$thumbnailImage->save($thumbDestination.'/'.$newFileName, 100);

		}
	}

	$page = 'Image Upload';

?>

<?php require('templates/header.php') ?>
	<?php require('templates/main.php') ?>

	<?php if(!empty($errors)): ?>
		<div class="alert alert-danger" role="alert">
			<ul>
				<?php foreach($errors as $singleError): ?>
					<li><?= $singleError; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>


	<!-- Image Uplaod form -->
	<!-- enctype is needed now as we are now dealing with not just strings -->
	<form enctype="multipart/form-data" action="imageUpload.php" method="post">
		<div class="form-group">
			<label for="">Upload an image</label>
			<input type="file" name="image" class="form-control-file">
		</div>
		<button type="submit" class="btn btn-outline-light btn-block">Submit</button>
	</form>

	<?php require('templates/footer.php') ?>
