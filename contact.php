<?php
// If the post array exists
// $_GET is for search queries
	if ($_POST) {
		// var_dump($_POST);
		// $name = $_POST["name"];
		// $email = $_POST['email'];
		// $message = $_POST['message'];
		// $subscribe = $_POST['subscribe'];

		// automaically creates the variables ($name, $message etc.) instead of
		// hard coding them ourselves.
		extract($_POST);

		$errors = array();

		// JS can be deleted via inspector therfore validation can be removed
		// which is why PHP validation is nesescary (PHP can't be deleted via
		// inspector)
		if (!$name) {
			array_push($errors, 'Name is required. Please enter a value');
		} else if (strlen($name) < 3) {
			array_push($errors, 'Please enter at least 2 characters for your name');
		} else if (strlen($name) > 100) {
			array_push($errors, 'Name cannot be more than 100 characters');
		}

		if (!$message) {
			array_push($errors, 'Please enter a message');
		} else if (strlen($message) < 2) {
			array_push($errors, 'Please enter a message that is more than 1 character long');
		} else if (strlen($message) > 390) {
			array_push($errors, 'This message is too long');
		}

		// else if in email is made by PHP instead of using regular expression
		if (!$email) {
			array_push($errors, 'Please enter an valid email address');
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors, 'your email is invalid');
		}

		// mail is a PHP method.
		if (empty($errors)) {
			$to = $email;
			$subject = 'Email enquiry';
			$message = 'You have recieved an email from your PHP website.';
			$emailMessage += $message;
			$headers = array(
				'From' => 'sumitramanga@gmail.com',
				'Reply-To' => 'sumitramanga@gmail.com',
				'X-Mailer' => 'PHP/'.phpversion()
			);
			mail($to,$subject,$emailSubject, $headers);
			header('Location: index.php');
		}
	}


	$page = 'Contact';
	$bgImage = 'contactBgImage';
	require('templates/header.php');
?>

	<?php require('templates/main.php') ?>

	<!--
	enctype="multipart/form-data" is for when uploading videos/images
	-->

	<!-- If the errors aray is not empty and posted, show the error messages -->
	<?php if($_POST && !empty($errors)): ?>
		<div class="alert alert-danger" role="alert">
			<ul>
				<?php foreach($errors as $singleError): ?>
					<li><?= $singleError; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<!-- Form -->
	<!-- It is important to have names in our inputs -->
	<form method="post" action="contact.php" enctype="multipart/form-data">
	  <div class="form-row">
	    <div class="form-group col-md-6">
			<label for="name">Full Name</label>
			<input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])) {echo $_POST ['name']; } ?>">
	    </div>
	    <div class="form-group col-md-6">
			<label for="inputEmail4">Email</label>
			<input type="text" name="email" class="form-control" id="inputEmail4" value="<?php if(isset($_POST['email'])) {echo $_POST ['email']; } ?>">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="message">Message</label>
	    <textarea type="textarea" name="message" rows="5" class="form-control" id="message"><?php if(isset($_POST['message'])) {echo $_POST ['email']; } ?></textarea>
	  </div>

	  <div class="form-group form-check">
	    <input type="checkbox" name="subscribe" class="form-check-input" id="newsletter">
	    <label class="form-check-label" for="newsletter">Subscribe me to Newsletter</label>
	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<?php require('templates/footer.php'); ?>
