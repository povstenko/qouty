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

function get_all_quotes()
{
    return R::getAll("SELECT * FROM quotes");
}

function get_quotes_limit($sort_by, $sort_asc, $start, $qty)
{
    return R::getAll("SELECT * FROM quotes ORDER BY " . $sort_by . " " . $sort_asc . " LIMIT " . $start . ", " . $qty);
}

function get_quotes_limit_from_collection($collection_id, $sort_by, $sort_asc, $start, $qty)
{
    return R::getAll("SELECT * FROM `quote_collections` INNER JOIN quotes ON quote_collections.quote_id = quotes.id WHERE collection_id = " . $collection_id . " ORDER BY " . $sort_by . " " . $sort_asc . " LIMIT " . $start . ", " . $qty);
}
function get_likes_by_quote($quote_id)
{
    return R::getAll("SELECT likes FROM quotes WHERE id = " . $quote_id);
}

function get_quote_collections()
{
    return R::getAll("SELECT * FROM quote_collections");
}

function get_collections()
{
    return R::getAll("SELECT * FROM collections");
}

function get_collection_by_id($collection_id)
{
    return R::getAll("SELECT * FROM collections WHERE id = " . $collection_id);
}


//------------------------------------------
// COUNT
//------------------------------------------

// COUNT likes
function count_likes_by_quote_id($id)
{
    return R::count('likes', 'quote_id = ?', array($id));
}

function count_likes_by_user_and_quote($user_id, $quote_id)
{
    return R::count('likes', "user_id = :user AND quote_id = :quote", [":user" => $user_id, ":quote" => $quote_id]);
}

function count_saves_by_user_and_quote($user_id, $quote_id)
{
    return R::count('saves', "user_id = :user AND quote_id = :quote", [":user" => $user_id, ":quote" => $quote_id]);
}

function count_quotes()
{
    return R::count('quotes');
}

function count_quote_collection_by_collection_id($collection_id)
{
    return R::count('quote_collection', "collection_id = ?", array($collection_id));
}


//------------------------------------------
// INSERT
//------------------------------------------
function insert_likes($user_id, $quote_id)
{
    R::exec("INSERT INTO likes (userid, postid) VALUES ($user_id, $quote_id)");
}


//------------------------------------------
// UPDATE
//------------------------------------------
function update_quote_likes($likes_num, $quote_id)
{
    R::exec("UPDATE quotes
            SET likes = $likes_num
            WHERE id = $quote_id");
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
