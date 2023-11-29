<?php

    require_once 'functions/helpers.php';
    require_once 'layouts/header.php';
    require_once 'functions/pdo_connection.php';
    require_once 'layouts/top-nav.php';


    global $pdo;

    $query = "SELECT * FROM blog.posts WHERE `status` = 1 AND `post_id` = ?;";
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch();

?>

<section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">
            <section class="col-md-12">
                
            <?php if($post != false){ ?>
            
                <h1><?= $post->title ?></h1>
                <h5 class="d-flex justify-content-between align-items-center">
                    <a href="">name</a>
                    <span class="date-time"><?= $post->created_at ?></span>
                </h5>
                <article class="bg-article p-3"><img class="float-right mb-2 ml-2" style="width: 18rem;" src="" alt="">
                    <p class="detail-text"><?= $post->body ?></p>
                </article>

                <?php }
                else{ ?>

                    <section>post not found!</section>

                    <?php } ?>
             
            </section>
        </section>
    </section>