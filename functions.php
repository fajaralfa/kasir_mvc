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

function url_for($path)
{
    $current_uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $current_path = $_SERVER['PATH_INFO'] ?? null;

    $root = '';
    if (is_null($current_path)) {
        $root = $current_uri;
    } else {
        $current_path_len = strlen($current_path);
        $root = substr($current_uri, 0, -$current_path_len);
    }

    return $root . $path;
}

function redirect($path)
{
    $target = url_for($path);
    redirect_root($target);
}

function redirect_root($path)
{
    header("location: {$path}");
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
