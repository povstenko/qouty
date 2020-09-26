<?php
require "./vendor/redbeanphp/rb-mysql.php";
require "functions.php";

R::setup("mysql:host=localhost;dbname=quotty_db", 'root', '');

session_start();