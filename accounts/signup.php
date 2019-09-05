<?php

//First include makes the PDO connection accesible from the variable $dbh.
include_once($_SERVER['DOCUMENT_ROOT'] . "/db_tools/db_connection.php");
//Second include includes all necessary functions to interact with the database.
include_once($_SERVER['DOCUMENT_ROOT'] . "/db_tools/db_functions.php");
//Third include includes some helper functions
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/helper_functions.php");

$errors = array();
$errormsg = "";

if ($_SERVER['REQUEST_METHOD'] === "POST")
{

	if(strlen($_REQUEST['email']) === 0 || filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL) === false)
	{
		$errors[] = "Please, enter a valid email.";
	}

	if(strlen($_REQUEST['name']) === 0)
	{
		$errors[] = "Please, enter a valid name.";
	}

	if(strlen($_REQUEST['username']) <= 0 || strlen($_REQUEST['username']) > 12)
	{
		$errors[] = "Username must be 0-12 characters long.";
	}

	if(strlen($_REQUEST['password']) === 0)
	{
		$errors[] = "Please, enter a valid password.";
	}

	if(check_user_existence($dbh, $_REQUEST['username']) === true)
	{
		$errors[] = "Username already exists.";
	}

}

if($_SERVER['REQUEST_METHOD'] === "POST" && count($errors) === 0)
{
	header('Location: ../index.php');
}else if($_SERVER['REQUEST_METHOD'] === "POST" && count($errors) !== 0)
{
	$errormsg = create_errors($errors);
	echo count($errormsg);
}

$navbar = False; // this blocks the navbar from appearing
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
?>

<section class="hero-body">

	<!-- .container -->
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-5-tablet is-4-desktop is-3-widescreen">
				<!-- .form -->
				<form action="signup.php" method="post" class="box">

					<div class="field center">
						<a href="/" class="field">
							<figure class="image is-128x128">
								<img src="/assets/camagru-logo.svg" alt="logo" title="Return to home page">
							</figure>
						</a>
					</div>

					<div class="field">
						<label for="" class="label">Email</label>
						<div class="control has-icons-left">
							<input type="text" name="email" class="input" placeholder="hello@hello.ru" value="">
							<span class="icon is-small is-left">
								<i class="fa fa-user"></i>
							</span>
						</div>
					</div>

					<div class="field">
						<label for="" class="label">Name</label>
						<div class="control has-icons-left">
							<input type="text" name="name" class="input" placeholder="Pedro" value="">
							<span class="icon is-small is-left">
								<i class="fa fa-user"></i>
							</span>
						</div>
					</div>

					<div class="field">
						<label for="" class="label">Username</label>
						<div class="control has-icons-left">
							<input type="text" name="username" class="input" placeholder="norminette" value="">
							<span class="icon is-small is-left">
								<i class="fa fa-user"></i>
							</span>
						</div>
					</div>

					<div class="field">
						<label for="" class="label">Password</label>
						<div class="control has-icons-left">
							<input type="text" name="password" class="input" placeholder="*******" value="">
							<span class="icon is-small is-left">
								<i class="fa fa-lock"></i>
							</span>
						</div>
					</div>

					<div class="field">
						<div class="columns is-mobile">
							<div class="column">
								<button class="button has-background-black has-text-white heading" type="Submit">Create account</button>
							</div>
							<div class="column">
								<a class="button is-link heading" href="/accounts/login.php">Sign In</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /.form -->
				<div class="errors">
					<?php 
						echo $errormsg;
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->
</section>

	<script src="/js/errors.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php") ?>
