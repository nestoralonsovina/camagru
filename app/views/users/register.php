<?php require APPROOT . '/views/inc/header.php'; ?>
    <link rel="stylesheet" href="/css/login.css">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Create an Account</h5>
                        <form class="form-signin" action="<?php URLROOT ?>/users/register" method="post" >

                            <div class="form-label-group">
                                <input type="text" id="inputName" name="name"
                                       class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Name" value="<?php echo $data['name']; ?>" required>
                                <label for="inputName">Name</label>
                                <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                            </div>

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

                            <div class="form-label-group">
                                <input type="password" id="inputConfirmPassword" name="confirm_password"
                                       class="form-control <?php echo (!empty($data['confirmed_password_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Confirm Password" value="<?php echo $data['confirm_password']; ?>" required>
                                <label for="inputConfirmPassword">Confirm Password</label>
                                <span class="invalid-feedback"><?php echo $data['confirmed_password_error']; ?></span>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Create
                            </button>
                            <a href="<?php URLROOT ?>/users/login"
                               class="btn btn-lg btn-secondary btn-block text-uppercase">Already have an account?</a>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>