<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">CAMAGRU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-0">
                <?php if (isLoggedIn() == false): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php URLROOT ?>/users/login">Login</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item active mr-2">
                        <a class="nav-link" href="<?php URLROOT ?>/photos/camera">
                            <i class="fa fa-camera"></i>
                        </a>
                    </li>
                    <li class="nav-item active mr-2">
                        <a class="nav-link" href="<?php URLROOT ?>/users/logout">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                    <li class="nav-item active mr-2">
                        <a class="nav-link" href="<?php URLROOT ?>/users/profile/<?php echo $_SESSION['user_id'] ?>">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
