<?php

    require_once '../../functions/helpers.php';
    require_once '../layouts/header.php';
    require_once '../../functions/pdo_connection.php';

    if(isset($_POST['name']) && $_POST['name'] !== '')
    {
        global $pdo;

        $query = "INSERT INTO categories SET cat_name = ?, created_at = NOW();";
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['name']]);

        redirect('panel/category');
    }

?>

<section id="app">

<section class="container-fluid">
    <section class="row">
        <section class="col-md-2 p-0">
            <?php require_once '../layouts/sidebar.php' ?>
        </section>
        <section class="col-md-10 pt-3">
            <form action="create.php" method="POST">
                <section class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
                </section>
                <section class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </section>
            </form>
        </section>
    </section>
</section>

</section>

<?php require_once '../layouts/footer.php' ?>