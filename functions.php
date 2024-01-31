<?php

function view($file, $data = [])
{
    extract($data);
    require "views/{$file}.php";
}

function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
    die();
}

function absolute_path($path)
{
    $current_uri = $_SERVER['REQUEST_URI'];
    $current_path = $_SERVER['PATH_INFO'] ?? '';
    return rtrim($current_uri, $current_path) . $path;
}

function redirect($path)
{
    $target = absolute_path($path);
    header("location: {$target}");
    die();
}

function session_set($key, $val)
{
    $_SESSION[$key] = $val;
}

function session_remove($key)
{
    unset($_SERVER[$key]);
}

function session_get($key, $default = [])
{
    return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
}

function session_exist($key)
{
    return isset($_SESSION[$key]);
}

function session_flash($key, $val)
{
    $_SESSION['_flash'][$key] = $val;
}

function session_clear_flash()
{
    unset($_SESSION['_flash']);
}