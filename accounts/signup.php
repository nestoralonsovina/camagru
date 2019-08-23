<?php

$navbar = False; // this blocks the navbar from appearing
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php");
?>

<section class="hero-body">

	<!-- .container -->
	<div class="container">
		<div class="columns is-centered">
			<div class="column is-5-tablet is-4-desktop is-3-widescreen">
				<!-- .form -->
				<form action="" method="post" class="box">

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
							<input type="text" name="username" class="input" placeholder="hello@hello.ru" value="">
							<span class="icon is-small is-left">
								<i class="fa fa-user"></i>
							</span>
						</div>
					</div>

					<div class="field">
						<label for="" class="label">Name</label>
						<div class="control has-icons-left">
							<input type="text" name="username" class="input" placeholder="Pedro" value="">
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
			</div>
		</div>
	</div>
	<!-- /.container -->
</section>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php") ?>
