<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Camagru</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/style/main.css" type="text/css">
	<link rel="stylesheet" href="/style/helpers.css" type="text/css">
	<!-- <link rel="stylesheet" href="/style/debug.css" type="text/css"> -->
</head>

<body>

<section class="hero is-fullheight">

<?php if (isset($navbar) == False || $navbar == True) { ?>
<!-- .hero-head -->
<section class="hero-head">
	<div class="columns is-mobile is-marginless heading has-text-weight-bold">
		<div class="column left">
			<figure class="image is-128x128">
				<img src="/assets/camagru-logo.svg" alt="Logo">
			</figure>
			<p class="navbar-item"> | Camagru</p>
		</div>
		<div class="column right">
			<?php if (isset($_SESSION['username'])) {?>
				<a class="navbar-item has-text-black" href="profile.php">My account</a>
				<a class="navbar-item has-text-black" href="logout.php">Logout</a>
			<?php } else { ?>
				<a class="navbar-item has-text-black" href="/accounts/login.php">Sign In</a>
			<?php } ?>
		</div>
	</div>
</section>
<!-- /.hero-head -->
<?php } ?>
