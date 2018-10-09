<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $page; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
  </head>

  <body class="text-center bgImageSettings <?= $bgImage; ?>">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">PHP Website - <?= $page; ?> </h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link <?php if($page === 'Home'):?>active <?php endif; ?>" href="index.php">Home</a>
			<a class="nav-link <?php if($page === 'Features'): ?>active <?php endif; ?>" href="features.php">Features</a>
            <a class="nav-link <?php if($page === 'About'): ?>active <?php endif; ?>" href="about.php">About</a>
            <a class="nav-link <?php if($page === 'Contact'): ?>active <?php endif; ?>" href="contact.php">Contact</a>
			<a class="nav-link <?php if($page === 'Image Upload'): ?>active <?php endif; ?>" href="imageUpload.php">Image Upload</a>
          </nav>
        </div>
      </header>
