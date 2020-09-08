<?php
date_default_timezone_set('Europe/Kiev');


// ==============================================================
//
// DEBUG
//
// ==============================================================

ini_set("display_errors", 1);
error_reporting(-1);

function show_apache_owner()
{
    echo exec('whoami');
}

function script($script)
{
    echo "<script>" . $script . "</script>";
}
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
function alert($data)
{
    echo '<script>';
    echo 'alert(' . json_encode($data) . ')';
    echo '</script>';
}

function show_array($a)
{
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

// ==============================================================
//
// SQL QUERIES TO DB
//
// ==============================================================

//------------------------------------------
// SELECT
//------------------------------------------

function get_user_by_email($email)
{
    return R::findOne('users', 'email = ?', array($email));
}

// ==============================================================
//
// FUNCTIONS
//
// ==============================================================

function generate_random_string($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}