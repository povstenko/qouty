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