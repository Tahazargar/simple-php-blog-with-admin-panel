<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/assets/css/style.css') ?>">
    <title>Admin Panel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-red">
    <a class="navbar-brand" href="">Taha Zargar Panel</a>
    <section class="collapse navbar-collapse" id="navbarSupportedContent"></section>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="text-decoration-none text-white" href="<?= url('auth/logout.php') ?>">logout</a>
</nav>
    