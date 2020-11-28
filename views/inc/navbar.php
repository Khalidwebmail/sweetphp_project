<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= URLROOT?>/homecontroller/index">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= URLROOT?>/homecontroller/about">About</a>
            </li>
            <?php if(!isset($_SESSION['user_id'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= URLROOT?>/usercontroller/login">Login</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= URLROOT?>/usercontroller/register">Register</a>
                </li>
            <?php } ?>

            <?php if(isset($_SESSION['user_id'])) { ?>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['user_name']?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URLROOT?>/usercontroller/logout">Signout</a>
                    </div>
                </li>
            <?php }?>
        </ul>
    </div>
</nav>