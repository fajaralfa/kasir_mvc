<?php

$c_daftar_produk = function () {
    global $db;

    $sql = '';
    if(isset($_GET['nama'])) {
        $sql = "SELECT * FROM produk WHERE nama LIKE '%{$_GET['nama']}%'";
    } else {
        $sql = "SELECT * FROM produk";
    }
    $semua_produk = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

    view('daftar_produk', ['semua_produk' => $semua_produk]);
};

$c_detail_produk = function () {};
$c_halaman_tambah_produk = function () {};
$c_aksi_tambah_produk = function () {};
$c_halaman_ubah_produk = function () {};
$c_aksi_ubah_produk = function () {};
$c_aksi_hapus_produk = function () {};