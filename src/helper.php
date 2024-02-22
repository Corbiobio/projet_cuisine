<?php

//not forget htmlspecialchars

function error($field)
{
    return isset($_SESSION["error"][$field]) ? $_SESSION["error"][$field] : "";
}

function old($field)
{
    return isset($_SESSION["old"][$field]) ? $_SESSION["old"][$field] : "";
}

function escape($data)
{
    return stripslashes(trim(htmlspecialchars($data)));
}

function slugify($str)
{
    // replace non letter or digits by -
    $str = preg_replace('~[^\pL\d]+~u', '_', $str);
    // transliterate
    $str = iconv('utf-8', 'us-ascii//TRANSLIT', $str);
    // remove unwanted characters
    $str = preg_replace('~[^-\w]+~', '', $str);
    // trim
    $str = trim($str, '_');
    // remove duplicate -
    $str = preg_replace('~-+~', '_', $str);
    // lowercase
    $str = strtolower($str);
    if (empty($str)) {
        return 'n-a';
    }
    return $str;
}

//if login
function is_login()
{
    //if connect true
    if (isset($_SESSION["id"]) && $_SESSION["id"]) {
        return true;
    } else {
        return false;
    }
}
function is_admin()
{
    //if connect true
    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1) {
        return true;
    } else {
        return false;
    }
}
