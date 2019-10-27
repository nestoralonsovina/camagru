<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="/css/login.css">
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <?php flash ('register_success'); ?>
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" action="<?php URLROOT ?>/users/login" method="post" >

                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="email"
                                   class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Email address" value="<?php echo $data['email']; ?>" required>
                            <label for="inputEmail">Email address</label>
                            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password"
                                   class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Password" value="<?php echo $data['password']; ?>" required>
                            <label for="inputPassword">Password</label>
                            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <a href="<?php URLROOT ?>/users/register"
                           class="btn btn-lg btn-secondary btn-block text-uppercase">Create an account</a>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
