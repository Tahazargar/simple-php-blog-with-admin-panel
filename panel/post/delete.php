<?php

    require_once '../../functions/helpers.php';
    require_once '../layouts/header.php';
    require_once '../../functions/pdo_connection.php';

    if(isset($_GET['post_id']) && $_GET['post_id'] !== '')
    {
        global $pdo;

        $query = "DELETE FROM blog.posts WHERE post_id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
    }

    redirect('panel/post');

?>  
