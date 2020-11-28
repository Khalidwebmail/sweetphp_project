<?php require APPROOT . "/views/inc/header.php" ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
            
                <h3>Add post</h3>
                <form method="post" action="<?= URLROOT?>/postcontroller/update/<?= $data['post'][0]->id?>">

                    <div class="form-group">
                        <input type="text" name="title" class="form-control <?= !empty($data['title_err']) ? 'is-invalid' : ''?>" value="<?= $data['post'][0]->title?>" id="title" placeholder="Title">
                        <span class="invalid-feedback"><?= $data['title_err']?></span>
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control <?= !empty($data['body_err']) ? 'is-invalid' : ''?>"><?= $data['post'][0]->body?></textarea>

                        <span class="invalid-feedback"><?= $data['body_err']?></span>
                    </div>
                    <?php if($data['post'][0]->user_id === $_SESSION['user_id']): ?>
                        <input type="submit" class="btn btn-primary" value="Update">
                    <?php else:?>
                        <a href="<?= URLROOT?>/postcontroller/index" class="btn btn-info">Back to list</a>
                    <?php endif; ?>
                </form>
                
            </div>
        </div>
    </div>
<?php require APPROOT . "/views/inc/footer.php" ?>      