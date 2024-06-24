c<?php include "views/includes/header.php";?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Create a new post</h1>
        <hr class="my-4">
        <form method="post" action="<?php Router::url("post/create");?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input id="title" class="form-control" type="text" name="title" placeholder="Title of your post...">
            </div>
            <div class="form-group">
                <label for="body">Post Body</label>
                <textarea id="body" class="form-control" name="body" rows=5></textarea>
            </div>
            <div class="form-group">
                <label for="blog_img">Blog Image</label>
                <input id="my-input" class="form-control" type="file" name="blog_img">
            </div>
            <?php CSRF::outputToken(); ?>
            <button type="submit" name="create" id="" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus-circle"></i> Create Post</button>
        </form>
    </div>
</div>

<?php include "views/includes/footer.php"; ?>
