<?php
require "php/db.php";
include_once 'php/functions.php';

if (array_key_exists('logged_user', $_SESSION)) {

    $quote_collections = get_quote_collections();
    $collections = get_collections();
    console_log($quote_collections);
    console_log($collections);
} else {
    header("location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Collections | Quotty</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="vendor/fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">

    <!--load all styles -->
    <link href="css/main.css" rel="stylesheet">
</head>

<body class="text-center text-white">
    <!-- Preloader -->
    <?php include_once 'templates/preloader.html'; ?>

    <!-- Back to top button -->
    <a id="back-to-top-button"></a>

    <!-- Navigation -->
    <?php include_once 'templates/navbar.php'; ?>

    <!-- Header -->
    <div class="jumbotron jumbotron-fluid my-bg-black mt-5 pb-0">
        <div class="container text-left">
            <div class="row">
                <div class="col">
                    <h2 class="text-habibi">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="vendor/bootstrap-icons.svg#collection" />
                        </svg>
                        Collections
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <section class="my-bg-gray text-dark mb-5 py-5">
        <div class="container">
            <a href="collection.php?saved" class="collection-item">
                <div class="card border-secondary mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <svg class="bi my-5" width="32" height="32" fill="currentColor">
                                    <use xlink:href="vendor/bootstrap-icons.svg#bookmark-fill" />
                                </svg>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h3 class="card-title text-habibi py-5">
                                        Saved
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <?php if ($collections) :
                foreach ($collections as $collection) : ?>
                    <a href="collection.php?id=<?= $collection['id'] ?>" class="collection-item">
                        <div class="card border-secondary mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <svg class="bi my-5" width="32" height="32" fill="currentColor">
                                            <use xlink:href="vendor/bootstrap-icons.svg#collection" />
                                        </svg>
                                    </div>
                                    <div class="col text-left">
                                        <h3 class="card-title text-habibi"><?= $collection['name'] ?></h3>
                                        <p class="card-text"><?= $collection['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
            <a href="collection.php" class="collection-item">
                <div class="card border-secondary mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <h2 class="card-title text-habibi py-5">
                                    <i class="fas fa-plus"></i>
                                </h2>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h3 class="card-title text-habibi py-5">
                                        Create New Collection
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once 'templates/footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Main sctipt -->
    <script src="js/script.js"></script>
    <!-- Back to top button -->
    <script src="js/top.js"></script>

</body>

</html>