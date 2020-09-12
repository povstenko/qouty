<?php
require "php/db.php";
include_once 'php/functions.php';

if (array_key_exists('logged_user', $_SESSION)) {
    
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

    <title>Saved | Quotty</title>

    <link rel="shortcut icon" href="favicon.ico">

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
                            <use xlink:href="vendor/bootstrap-icons.svg#bookmarks" />
                        </svg>
                        Saved
                    </h2>
                </div>
            </div>

        </div>
    </div>

    <!-- Page Content -->
    <section class="my-bg-gray text-dark mb-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    content
                </div>
            </div>
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