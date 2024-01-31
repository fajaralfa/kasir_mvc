<?php

$rute = [];

function router_add($method, $path, $controller, ...$middlewares)
{
    global $rute;
    $rute[$path][$method] = [$controller, $middlewares];
}

function router_run()
{
    global $rute;

    $path = $_SERVER['PATH_INFO'] ?? null;
    $method = $_SERVER['REQUEST_METHOD'];

    if(is_null($path)) {
        if (str_ends_with($_SERVER['REQUEST_URI'], 'index.php')) {
            redirect('/');
        } else {
            redirect('index.php/');
        }
    }

    [$controller, $middlewares] = $rute[$path][$method] ?? null;
    
    if(is_null($controller)) {
        echo 'Halaman Tidak Ditemukan';
        die();
    }

    foreach($middlewares as $mw) $mw();

    $controller();
    
    session_clear_flash();
}