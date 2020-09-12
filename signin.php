<?php
require "php/db.php";
include_once 'php/functions.php';

$data = $_POST;
$errors = array();

if (isset($data['do_signin'])) {
    $user = get_user_by_email($data['email']);

    if ($user) {
        console_log($user->password);
        console_log($data['password']);
        // if (password_verify($data['password'], $user->password)) {
        if ($data['password'] == $user->password) {
            $_SESSION['logged_user'] = $user;
            R::store($user);

            header('location: index.php');
        } else {
            $errors[] = "Incorrect password.";
        }
    } else {
        $errors[] = "Incorrect login or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quotty | Sign In</title>

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
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center text-white">
    <!-- Preloader -->
    <?php include_once 'templates/preloader.html'; ?>

    <!-- Page Content -->
    <form class="form form-signin" action="signin.php" method="POST">
        <a href="index.php" class="my-link-no-style">
            <h1 class="header-3 mb-5 text-habibi" href="index.php">“Quotty”</h1>
        </a>
        <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control border-secondary" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control border-secondary" placeholder="Password" required>
        <div class="checkbox text-left text-muted my-2">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg my-btn-outline-yellow btn-block mb-3" type="submit" name="do_signin">Sign In</button>
        <p class="text-habibi">Create new account for free? <a href="signup.php" class="my-link">Sign Up</a></p>

        <!-- Footer -->
        <?php include_once 'templates/footer.php'; ?>

    </form>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Main sctipt -->
    <script src="js/script.js"></script>

</body>

</html>