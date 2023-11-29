<?php

    require_once '../../functions/helpers.php';
    require_once '../layouts/header.php';
    require_once '../../functions/pdo_connection.php';
    if(
        isset($_POST['title']) && $_POST['title'] !== ''
    && isset($_FILES['image']) && $_FILES['image']['name'] !== ''
    && isset($_POST['cat_id']) && $_POST['cat_id'] !== ''
    && isset($_POST['body']) && $_POST['body'] !== ''
    )
    {
        global $pdo;

        $query = "SELECT * FROM blog.categories WHERE cat_id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['cat_id']]);
        $category = $statement->fetch();


        $allowedMimes = ['png', 'jpg', 'jpeg', 'gif'];
        $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        
        if(!in_array($imageMime, $allowedMimes))
        {
            redirect('panel/post');
        }   

        $basePath = dirname(dirname(__DIR__));
        $image = '/assets/images/posts/' . time() . '.' . $imageMime;
        $image_upload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);

        if($category !== false && $image_upload !== false)
        {
            global $pdo;

            $query = "INSERT INTO blog.posts SET `title` = ?, `body` = ?, `cat_id` = ?, `image` = ?, created_at = NOW(), updated_at = NOW();";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['title'], $_POST['body'], $_POST['cat_id'], $image]);
        }

        redirect('panel/post');
    }
    


?>

<section id="app">

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?= require_once '../layouts/sidebar.php'; ?>
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/post/create.php') ?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <?php
                            
                            global $pdo;
                            
                            $query = "SELECT * FROM blog.categories;";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $posts = $statement->fetchAll();
                            
                            ?>

                            <?php
                            
                                foreach($posts as $post)
                                { ?>

                                    <option value="<?= $post->cat_id ?>"><?= $post->cat_name ?></option>

                               <?php }
                               
                            
                            ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body ..."></textarea>
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