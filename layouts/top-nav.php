<?php

session_start();

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-blue ">

    <a class="navbar-brand " href="<?= url('index.php') ?>">Taha blog</a>
    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarSupportedContent " aria-controls="navbarSupportedContent " aria-expanded="false " aria-label="Toggle navigation ">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent ">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active ">
                <a class="nav-link" href="">Home <span class="sr-only ">(current)</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href=" "></a>
            </li>

        </ul>
    </div>

    <section class="d-inline ">

        <?php

        
            if(isset($_SESSION['user']) && $_SESSION['user'] !== '')
            {
                ?>

                <a class="text-decoration-none text-white px-2 " href="<?= url('auth/logout.php') ?>">logout</a>

                <?php
            }
            else{
            ?>
            
                <a class="text-decoration-none text-white px-2 " href="<?= url('auth/register.php') ?>">register</a>
                <a class="text-decoration-none text-white " href="<?= url('auth/login.php') ?>">login</a>

                <?php } ?>

    </section>
</nav>