<?php

session_start();

require 'db.php';
require 'functions.php';
require 'router.php';
require 'controllers.php';
require 'middlewares.php';

router_add('GET', '/', $c_halaman_utama, $mw_logged_in);
router_add('GET', '/login', $c_halaman_login, $mw_not_logged_in);
router_add('POST', '/login', $c_aksi_login, $mw_not_logged_in);
router_add('POST', '/logout', $c_aksi_logout, $mw_logged_in);

router_run();