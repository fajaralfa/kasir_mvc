<?php

session_start();

require 'db.php';
require 'functions.php';
require 'router.php';
require 'middlewares.php';
require 'controllers/auth.php';
require 'controllers/home.php';
require 'controllers/produk.php';


router_add('GET', '/login', $c_halaman_login, $mw_not_logged_in);
router_add('POST', '/login', $c_aksi_login, $mw_not_logged_in);
router_add('POST', '/logout', $c_aksi_logout, $mw_logged_in);

router_add('GET', '/', $c_halaman_utama, $mw_logged_in);

router_add('GET', '/produk', $c_daftar_produk, $mw_logged_in);
router_add('GET', '/produk/detail', $c_detail_produk, $mw_logged_in);
router_add('GET', '/produk/tambah', $c_halaman_tambah_produk, $mw_logged_in);
router_add('POST', '/produk/tambah', $c_aksi_tambah_produk, $mw_logged_in);
router_add('GET', '/produk/ubah', $c_halaman_ubah_produk, $mw_logged_in);
router_add('POST', '/produk/ubah', $c_aksi_ubah_produk, $mw_logged_in);
router_add('GET', '/produk/hapus', $c_aksi_hapus_produk, $mw_logged_in);

router_run();