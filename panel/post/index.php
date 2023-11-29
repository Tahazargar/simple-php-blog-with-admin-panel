
<?php

    require_once '../../functions/helpers.php';
    require_once '../layouts/header.php';
    require_once '../../functions/pdo_connection.php';

?>

<section id="app">


    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                 <?= require_once '../layouts/sidebar.php'; ?>
            </section>
            <section class="col-md-10 pt-3">

                <section class="mb-2 d-flex justify-content-between align-items-center">
                    <h2 class="h4">Articles</h2>
                    <a href="<?= url('panel/post/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>title</th>
                            <th>category name</th>
                            <th>body</th>
                            <th>status</th>
                            <th>setting</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 

                                global $pdo;
                            
                                $query = "SELECT blog.posts.*, blog.categories.cat_name AS category_name FROM blog.posts LEFT JOIN blog.categories ON blog.categories.cat_id = blog.posts.cat_id;";
                                $statement = $pdo->prepare($query);
                                $statement->execute();
                                $posts = $statement->fetchAll();

                            ?>

                            <?php
                            
                            foreach($posts as $post)
                            { 
                                
                            ?>
                                
                            <tr>
                                <td><?= $post->post_id ?></td>
                                <td>
                                    <img style="width: 90px;" src="<?= asset($post->image) ?>">
                                </td>
                                <td><?= $post->title ?></td>
                                <td><?= $post->category_name ?></td>
                                <td><?= substr($post->body, 0, 20) . '...'; ?></td>
                                <td> 
                                    <?php if($post->status == 1){ ?>
                                     <span class="text-success">enable</span>
                                     <?php } else{ ?> 
                                     <span class="text-danger">disable</span></td>
                                     <?php } ?>
                                <td>
                                    <a href="<?= url('panel/post/change-status.php?post_id=') . $post->post_id ?>" class="btn btn-warning btn-sm">Change status</a>
                                    <a href="<?= url('panel/post/edit.php?post_id=') . $post->post_id ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= url('panel/post/delete.php?post_id=') . $post->post_id ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>

                            <?php

                            } 
                            
                            ?>
                        </tbody>
                    </table>
                </section>


            </section>
        </section>
    </section>





</section>

<?php require_once '../layouts/footer.php' ?>