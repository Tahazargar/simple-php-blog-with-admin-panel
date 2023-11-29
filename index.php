<?php

    require_once 'functions/helpers.php';
    require_once 'layouts/header.php';
    require_once 'functions/pdo_connection.php';

?>

<section id="app">

    <?php require_once "layouts/top-nav.php"?>

    <section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">

        <?php
        
            global $pdo;

            $query = "SELECT * FROM blog.posts;";
            $statement = $pdo->prepare($query);
            $statement->execute();
            $posts = $statement->fetchAll();
        
        ?>
           
        <?php
        

            foreach($posts as $post)
            { ?>
                
                <section class="col-md-4">
                    <section class="mb-2 overflow-hidden" style="max-height: 15rem;"><img class="img-fluid" width="100%" src="<?= asset($post->image) ?>" alt=""></section>
                    <h2 class="h5 text-truncate"><?= $post->title ?></h2>
                    <p><?= substr($post->body, 0, 40) . ' ...' ?></p>
                    <p><a class="btn btn-primary" href="<?= url('detail.php?post_id=') . $post->post_id ?>" role="button">View details »</a></p>
                </section>

            <?php }
        

        ?>
               
        </section>
    </section>

</section>

<?php require_once 'layouts/footer.php' ?>

