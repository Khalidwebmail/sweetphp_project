<?php require APPROOT . "/views/inc/header.php" ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h3>Create account</h3>
                <form method="post" action="<?= URLROOT?>/usercontroller/register">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control <?= !empty($data['name_err']) ? 'is-invalid' : ''?>" value="<?= $data['name']?>" id="name" placeholder="Name">
                        <span class="invalid-feedback"><?= $data['name_err']?></span>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control <?= !empty($data['email_err']) ? 'is-invalid' : ''?>" value="<?= $data['email']?>" id="email" placeholder="Email">
                        <span class="invalid-feedback"><?= $data['email_err']?></span>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control <?= !empty($data['password_err']) ? 'is-invalid' : ''?>" value="<?= $data['password']?>" id="password" placeholder="Password">
                        <span class="invalid-feedback"><?= $data['password_err']?></span>
                    </div>

                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control <?= !empty($data['confirm_password_err']) ? 'is-invalid' : ''?>" value="<?= $data['confirm_password']?>" id="confirm_password" placeholder="Confirm password">
                        <span class="invalid-feedback"><?= $data['confirm_password_err']?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Register">
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . "/views/inc/footer.php" ?>      