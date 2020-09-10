<?php
require "php/db.php";
include_once 'php/functions.php';

if (array_key_exists('logged_user', $_SESSION)) {
    $user = $_SESSION['logged_user'];
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

    <title>Profile | Quotty</title>

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

    <!-- Navigation -->
    <?php include_once 'templates/navbar.php'; ?>

    <!-- Header -->
    <div class="jumbotron jumbotron-fluid my-bg-black mt-5 pb-0">
        <div class="container text-left">
            <div class="row">
                <div class="col">
                    <h2 class="">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="vendor/bootstrap-icons.svg#person" />
                        </svg>
                        Profile
                    </h2>
                </div>
            </div>

        </div>
    </div>

    <!-- Page Content -->
    <section class="my-bg-gray text-dark mb-5 py-5">

        <div class="container">
            <div class="card mb-4">
                <div class="card-body">

                    <form class="form" action="profile.php" method="post">
                        <div class="form-group row px-md-3 mt-3">
                            <label class="col-md-3 col-form-label text-right" for="inputEmail">Email</label>
                            <div class="col-md-6">
                                <input name="email" class="form-control" type="email" id="inputEmail" value="<?= $user['email'] ?>" placeholder="example@gmail.com" required>
                            </div>
                            <div class="col-md-3 text-left">
                                <button class="btn my-btn-outline-black btn-block mb-3" type="submit" name="do_change_email">Change email</button>
                            </div>
                        </div>
                    </form>

                    <form class="form" action="profile.php" method="post">
                        <div class="form-group row px-md-3">
                            <label class="col-sm-3 col-form-label text-left text-md-right" for="inputPassword">Old Password</label>
                            <div class="col-sm-6">
                                <input name="password_old" class="form-control" type="password" id="inputPasswordOld" placeholder="Enter your current password" required aria-describedby="passHelp1">
                            </div>
                        </div>
                        <div class="form-group row px-md-3">
                            <label class="col-sm-3 col-form-label text-left text-md-right" for="inputPassword">New Password</label>
                            <div class="col-sm-6">
                                <input name="password_new" class="form-control" type="password" id="inputPasswordNew" placeholder="Enter new password" required aria-describedby="passHelp2">
                            </div>
                        </div>
                        <div class="form-group row px-md-3">
                            <label class="col-sm-3 col-form-label text-left text-md-right" for="inputPasswordConfirm">Repeat Password</label>
                            <div class="col-sm-6">
                                <input name="password_confirmation" class="form-control" type="password" id="inputPasswordConfirm" placeholder="Repeat new password" required aria-describedby="passHelp3">
                            </div>
                            <div class="col-sm-3 text-left">
                                <button class="btn my-btn-outline-black btn-block mb-3" type="submit" name="do_change_pass">Change password</button>
                            </div>
                        </div>

                    </form>
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
</body>

</html>