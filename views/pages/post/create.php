<?php require APPROOT . "/views/inc/header.php" ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
            
                <h3>Add post</h3>
                <form method="post" action="<?= URLROOT?>/postcontroller/store">

                    <div class="form-group">
                        <input type="text" name="title" class="form-control <?= !empty($data['title_err']) ? 'is-invalid' : ''?>" value="<?= $data['title']?>" id="title" placeholder="Title">
                        <span class="invalid-feedback"><?= $data['title_err']?></span>
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control <?= !empty($data['body_err']) ? 'is-invalid' : ''?>"><?= $data['body']?></textarea>

                        <span class="invalid-feedback"><?= $data['body_err']?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Save">
                    <a href="<?= URLROOT?>/postcontroller/index" class="btn btn-primary pull-right">Back to post</a>
                </form>
                
            </div>
        </div>
    </div>
<?php require APPROOT . "/views/inc/footer.php" ?>      