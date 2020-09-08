<?php
require "php/db.php";
include_once 'php/functions.php';

$data = $_POST;
$errors = array();

if (isset($data['do_login'])) {
    $user = $data['email'];

    if ($user) {
        if (password_verify($data['password'], $user->password)) {
            if ($user['token'] == null) {
                $_SESSION['logged_user'] = $user;
                $user->is_online = 1;
                R::store($user);
                
                echo '<script type="text/javascript">location.reload(true);</script>';
            } else {
                $errors[] = "Ваш акаунт не активовано. Перевірте вашу електронну пошту.";
            }
        } else {
            $errors[] = "Ви ввели неправильний пароль.";
        }
    } else {
        $errors[] = "Ви ввели неправильний логін або email.";
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

    <link rel="shortcut icon" href="favicon.ico">

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
    <form class="form-signin">
        <a href="index.php" class="my-link-no-style"><h1 class="header-3 mb-5" href="index.php">Quotty</h1></a>
        <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox text-left my-2">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg my-btn-outline-yellow btn-block mb-3" type="submit" name="do_signin">Sign In</button>
        <p>Create new account for free? <a href="signup.php" class="my-link">Sign Up</a></p>


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