<?php
require "php/db.php";
include_once 'php/functions.php';

if (array_key_exists('logged_user', $_SESSION)) {
    $data = $_POST;
    $errors = array();

    if (isset($data['do_create'])) {
        if (trim($data['text']) == '') {
            $errors[] = 'Quote is empthy';
        }
        if (trim($data['author'] == '')) {
            $errors[] = 'Author is empthy';
        }

        if (empty($errors)) {
            $quote = R::dispense('quotes');
            $quote->text = $data['text'];
            $quote->author = $data['author'];
            $quote->user_id = $_SESSION['logged_user']['id'];
            $quote->creation_date = time();
            R::store($quote);

            header("location: index.php");
        }
    }
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

    <title>Create | Quotty</title>

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
                            <use xlink:href="vendor/bootstrap-icons.svg#chat-square-quote" />
                        </svg>
                        Create New
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
                    <div class="card mb-4">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class="form-group mb-0" action="create.php" method="POST">
                                <div class="row">
                                    <div class="col-1 p-0">
                                        <img src="img/quote_left.png" class="float-right" alt="quote">
                                    </div>
                                    <div class="col pt-2">
                                        <textarea name="text" cols="30" rows="10" class="form-control border-0 text-habibi" value="<?= @$data['details'] ?>" placeholder="Write quote text there"></textarea>
                                    </div>
                                    <div class="col-1 align-self-end p-0">
                                        <img src="img/quote_right.png" class="float-left mb-3" alt="quote">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col pt-2 text-left">
                                        <div class="row">
                                            <label class="card-text text-muted mr-2 mt-1" for="deadline_time">━</label>
                                            <p class="card-text text-muted small mb-2 mr-0">
                                                <input type="text" name="author" class="form-control border-0 text-habibi" placeholder="Author of this quote">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="row float-right mr-3">
                                    <button class="btn my-btn-outline-black btn-block mb-3" type="submit" name="do_create">Create new quote</button>
                                </div>
                            </form>
                        </div>
                    </div>
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