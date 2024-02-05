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
    global $db;

    $data_keranjang = Keranjang::all();
    
    $db_data_keranjang = [];
    foreach ($data_keranjang as $key => $val) {
        $sql = "SELECT * FROM produk WHERE id = {$key}";
        $res = $db->query($sql)->fetch_assoc();
        if (! is_null($res)) {
            $res['jumlah'] = $val;
            array_push($db_data_keranjang, $res);
        }
    }

    view('keranjang/list', [
        'data_keranjang' => $db_data_keranjang,
    ]);
};

$c_hapus_produk_di_keranjang = function () {
    $id_produk = $_POST['id_produk'];

    Keranjang::remove($id_produk);

    redirect('/keranjang');
};
