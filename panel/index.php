<?php

    require_once '../functions/helpers.php';
    require_once './layouts/header.php';

?>

<section id="app">

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php require_once './layouts/sidebar.php' ?>
            </section>
            <section class="col-md-10 pb-3">

                <section style="min-height: 80vh;" class="d-flex justify-content-center align-items-center">
                    <section>
                        <h1>Zargar Blog</h1>
                    </section>
                </section>

            </section>
        </section>
    </section>


</section>

<?php require_once './layouts/footer.php' ?>
