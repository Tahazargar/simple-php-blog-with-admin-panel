<?php

    require_once '../../functions/helpers.php';
    require_once '../layouts/header.php';
    require_once '../../functions/pdo_connection.php';

    if(!$_GET['cat_id'])
    {
        redirect('panel/category');
    }

    global $pdo;

    $query = "SELECT * FROM `categories` WHERE `cat_id` = ?;";
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['cat_id']]);
    $category = $statement->fetch();

    if($category === false)
    {
        redirect('panel/category');
    }

    // UPDATE

    if(isset($_POST['name']) && $_POST['name']  !== '')
    {
        $query = "UPDATE `categories` SET `cat_name` = ?, `updated_at` = NOW() WHERE `cat_id` = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['name'], $_GET['cat_id']]);

        redirect('panel/category');
    }

?>

<section id="app">

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?= require_once '../layouts/sidebar.php' ?>
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/category/edit.php?cat_id=') . $category->cat_id ?>" method="POST">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="">
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<?php require_once '../layouts/footer.php' ?>