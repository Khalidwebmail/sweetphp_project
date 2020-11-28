<?php require APPROOT . "/views/inc/header.php" ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Post list</h1>
            <table class="table table-responsive table-stripped">
                <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Created by</th>
                    <th>Action</th>
                </tr>
                <?php foreach($data['posts'] as $k=> $post): ?>
                    <tr>
                        <td><?= $k+1 ?></td>
                        <td><?= $post->title?></td>
                        <td><?= $post->created_at?></td>
                        <td><?= $post->name?></td>
                        <td>
                            <a href="<?= URLROOT?>/postcontroller/show/<?= $post->id?>">Show</a>|
                            <a href="<?= URLROOT?>/postcontroller/delete/<?= $post->id?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="col-md-6">
            <a href="<?= URLROOT?>/postcontroller/create" class="btn btn-primary pull-right">Add post</a> <br>
        </div>
    </div>
<?php require APPROOT . "/views/inc/footer.php" ?>      