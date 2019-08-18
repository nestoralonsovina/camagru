<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Camagru</title>
</head>
<body>

<div id="header">
	<div class="logo">
		Camagru
	</div>
	<div class="user">
		<?php if (isset($_SESSION['username'])) {?>
			<a class="login" href="profile.php">My account</a>
			<a class="login" href="logout.php">Logout</a>
		<?php } else { ?>
			<a class="login" href="login.php">Login</a>
		<?php } ?>
	</div>
</div>