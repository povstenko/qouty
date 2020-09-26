<?php
require_once "../vendor/redbeanphp/rb-mysql.php";
require_once "functions.php";

R::setup("mysql:host=localhost;dbname=quotty_db", 'root', '');

session_start();

$user = $_SESSION['logged_user'];
R::store($user);

unset($_SESSION['logged_user']);
if (isset($_COOKIE['user_token']))
    setcookie('user_token', '', 0, "/");
header('location: ../index.php');
