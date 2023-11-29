<?php

    require_once '../functions/helpers.php';
    require_once '../layouts/header.php';
    require_once '../functions/pdo_connection.php';

    $error = '';

    if(
    isset($_POST['email']) && $_POST['email'] !== ''
    && isset($_POST['first_name']) && $_POST['first_name'] !== ''
    && isset($_POST['last_name']) && $_POST['last_name'] !== ''
    && isset($_POST['password']) && $_POST['password'] !== ''
    && isset($_POST['confirm']) && $_POST['confirm'] !== ''
    )
    {
        global $pdo;

        if($_POST['password'] === $_POST['confirm'])
        {
            if(strlen($_POST['password']) >= 8)
            {
                $query = "SELECT * FROM blog.users WHERE email = ?;";
                $statement = $pdo->prepare($query);
                $statement->execute([$_POST['email']]);
                $user = $statement->fetch();

                if($user === false)
                {
                    $query = "INSERT INTO blog.users SET `fname` = ?, `lname` = ?, `email` = ?, `password` = ?, created_at = NOW()";
                    $statement = $pdo->prepare($query);
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $statement->execute([$_POST['first_name'], $_POST['last_name'], $_POST['email'], $password]);

                    redirect('auth/login.php');
                }
                else
                {
                    $error = 'Duplicate email address';
                }
            }
            else
            {
                $error = 'Password must be more than 8 characters';
            }
        }
        else
        {
            $error = 'Password doesnt match with confirm password';
        }
    }
    else
    {
        if($_POST)
        $error = 'All fields are rquired!';
    }

?>

<section id="app">

<section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
    <section style="width: 20rem;">
        <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">register</h1>
        <section class="bg-light my-0 px-2">
            <small class="text-danger">
                <?php if($error !== '') echo $error; ?>
            </small>
        </section>
        <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="<?= url('auth/register.php') ?>" method="post">
            <section class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
            </section>
            <section class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name ...">
            </section>
            <section class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name ...">
            </section>
            <section class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
            </section>
            <section class="form-group">
                <label for="confirm">Confirm</label>
                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm ...">
            </section>
            <section class="mt-4 mb-2 d-flex justify-content-between">
                <input type="submit" class="btn btn-success btn-sm" value="register">
                <a href="<?= url('auth/login.php') ?>">login</a>
            </section>
        </form>
    </section>
</section>

</section>

<script src="<?= url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= url('assets/js/jquery.min.js') ?>"></script>