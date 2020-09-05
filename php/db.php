<?php
require "./vendor/redbeanphp/rb-mysql.php";
require "functions.php";

R::setup("mysql:host=host;dbname=db", 'username', 'password');

session_start();