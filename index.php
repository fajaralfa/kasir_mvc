<?php

session_start();

require 'db.php';
require 'functions.php';
require 'router.php';
require 'middlewares.php';
require 'controllers/auth.php';
require 'controllers/home.php';
require 'controllers/produk.php';
require 'controllers/pelanggan.php';
require 'controllers/penjualan.php';
require 'controllers/keranjang.php';
require 'controllers/petugas.php';


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

router_add('GET', '/pelanggan', $c_daftar_pelanggan, $mw_logged_in);
router_add('GET', '/pelanggan/detail', $c_detail_pelanggan, $mw_logged_in);
router_add('GET', '/pelanggan/tambah', $c_halaman_tambah_pelanggan, $mw_logged_in);
router_add('POST', '/pelanggan/tambah', $c_aksi_tambah_pelanggan, $mw_logged_in);
router_add('GET', '/pelanggan/ubah', $c_halaman_ubah_pelanggan, $mw_logged_in);
router_add('POST', '/pelanggan/ubah', $c_aksi_ubah_pelanggan, $mw_logged_in);
router_add('GET', '/pelanggan/hapus', $c_aksi_hapus_pelanggan, $mw_logged_in);

router_add('GET', '/keranjang', $c_daftar_produk_di_keranjang, $mw_logged_in);
router_add('POST', '/keranjang/tambah', $c_tambah_produk_ke_keranjang, $mw_logged_in);
router_add('POST', '/keranjang/hapus', $c_hapus_produk_di_keranjang, $mw_logged_in);

router_add('GET', '/penjualan', $c_daftar_penjualan, $mw_logged_in);
router_add('GET', '/penjualan/detail', $c_detail_penjualan, $mw_logged_in);
router_add('GET', '/penjualan/tambah', $c_halaman_tambah_penjualan, $mw_logged_in);
router_add('POST', '/penjualan/tambah', $c_aksi_tambah_penjualan, $mw_logged_in);

router_add('GET', '/petugas', $c_daftar_petugas, $mw_logged_in, $mw_admin_only);
router_add('GET', '/petugas/tambah', $c_halaman_tambah_petugas, $mw_logged_in, $mw_admin_only);
router_add('POST', '/petugas/tambah', $c_aksi_tambah_petugas, $mw_logged_in, $mw_admin_only);
router_add('GET', '/petugas/ubah', $c_halaman_ubah_petugas, $mw_logged_in, $mw_admin_only);
router_add('POST', '/petugas/ubah', $c_aksi_ubah_petugas, $mw_logged_in, $mw_admin_only);
router_add('GET', '/petugas/hapus', $c_aksi_hapus_petugas, $mw_logged_in, $mw_admin_only);

router_run();
