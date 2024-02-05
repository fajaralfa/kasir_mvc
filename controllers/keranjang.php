<?php

require_once 'dsa/Keranjang.php';

$c_tambah_produk_ke_keranjang = function () {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    Keranjang::add($id_produk, $jumlah);

    session_flash('pesan', [
        'Produk berhasil ditambahkan ke keranjang'
    ]);
    redirect('/produk');
};

$c_daftar_produk_di_keranjang = function () {
    $data_keranjang = Keranjang::all();

    view('keranjang/list', [
        'data_keranjang' => $data_keranjang,
    ]);
};

$c_hapus_produk_di_keranjang = function () {
    $id_produk = $_POST['id_produk'];

    Keranjang::remove($id_produk);

    redirect('/keranjang');
};
