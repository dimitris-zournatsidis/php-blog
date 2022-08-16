<?php require APPROOT . '/views/inc/header.php' ?>
<?php flash('post_message') ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Post
        </a>
    </div>
</div>

<?php foreach ($data['posts'] as $post) : ?>
    <!-- <?php var_dump($post); ?> -->
    <?php
    $date = new DateTime($post->postCreated);
    $dateFormat =  $date->format('d/m/Y - H:i:s');
    ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title ?></h4>
        <div class="bg-light p-2 mb-3">
            Written by <?php echo $post->name ?> on <?php echo $dateFormat ?>
            <!-- This works because we joined users with posts table (in Post.php model) -->
        </div>
        <p class="card-text"><?php echo $post->body ?></p>
        <a href="<?php echo URLROOT ?>/posts/show/<?php echo $post->postId ?>" class="btn btn-dark">More</a>
    </div>
<?php endforeach ?>

<?php require APPROOT . '/views/inc/footer.php' ?>