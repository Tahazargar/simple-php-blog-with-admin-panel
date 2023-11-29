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
                    <h2 class="h4">Categories</h2>
                    <a href="create.php" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                            <?php
                            
                            global $pdo;

                            $query = "SELECT * FROM blog.categories";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $categories = $statement->fetchAll();
                            
                            ?>
                           
                            <?php
                            
                            foreach($categories as $category)
                            { 
                                
                            ?>

                             <tr>
                             <td><?= $category -> cat_id ?></td>
                                <td><?= $category -> cat_name ?></td>
                                <td>
                                    <a href="<?= url('panel/category/edit.php?cat_id=') . $category -> cat_id ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= url('panel/category/delete.php?cat_id=') . $category -> cat_id?>" class="btn btn-danger btn-sm">Delete</a>
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