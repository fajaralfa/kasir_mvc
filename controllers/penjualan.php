<?php

$c_daftar_penjualan = function () {
    view('penjualan/daftar');
};

$c_halaman_tambah_penjualan = function () {
    view('penjualan/form');
};

$c_aksi_tambah_penjualan = function () {
    global $db;

    $waktu = $_POST['waktu'];
    $total_harga = $_POST['total_harga'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_petugas = session_get('user')['id'];

    $db->query("INSERT INTO penjualan (waktu, total_harga, id_pelanggan, id_petugas) VALUES ('$waktu', '$total_harga', '$id_pelanggan', '$id_petugas')");
    $id_penjualan = $db->insert_id;

    redirect("/penjualan/detail?id={$id_penjualan}");
};