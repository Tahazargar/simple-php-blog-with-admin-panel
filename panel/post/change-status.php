<?php

    require_once '../../functions/helpers.php';
    require_once '../../functions/pdo_connection.php';

    if(isset($_GET['post_id']) && $_GET['post_id'] !== '')
    {
        $query = "SELECT * FROM blog.posts WHERE `post_id` = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
        $post = $statement->fetch();

        if($post !== false)
        {
            $status = ($post->status == 1) ? 0 : 1;
            $query = "UPDATE blog.posts SET `status` = ? WHERE `post_id` = ?;";
            $statement = $pdo->prepare($query);
            $statement->execute([$status, $_GET['post_id']]);
        }
    }

    redirect('panel/post');


