<?php

$c_daftar_produk = function () {
    global $db;

    $sql = 'SELECT produk.id AS id, produk.nama, produk.harga, stok_produk.stok
    FROM produk LEFT JOIN stok_produk ON produk.id = stok_produk.id_produk';
    if(isset($_GET['nama'])) {
        $sql .= " WHERE nama LIKE '%{$_GET['nama']}%'";
    }
    $semua_produk = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

    view('produk/daftar', [
        'semua_produk' => $semua_produk,
        'pesan' => session_get('pesan'),
    ]);
};

$c_detail_produk = function () {};

$c_halaman_tambah_produk = function () {
    view('produk/form', ['target' => 'tambah']);
};

$c_aksi_tambah_produk = function () {
    global $db;

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO produk (nama, harga) VALUES ('$nama', '$harga')";

    $db->query($sql);

    session_flash('pesan', [
        'Data berhasil ditambahkan',
    ]);

    redirect('/produk');
};

$c_halaman_ubah_produk = function () {
    global $db;

    $id = $_GET['id'];

    $sql = "SELECT produk.id AS id, produk.nama, produk.harga, stok_produk.stok
    FROM produk LEFT JOIN stok_produk ON produk.id = stok_produk.id_produk
    WHERE produk.id = $id";

    $produk = $db->query($sql)->fetch_assoc();

    view('produk/form', ['target' => 'ubah', 'form' => $produk]);
};

$c_aksi_ubah_produk = function () {
    global $db;

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $db->begin_transaction();
    $db->query("UPDATE produk SET nama = '{$nama}', harga = {$harga} WHERE id = {$id}");
    $db->query("UPDATE stok_produk SET stok = {$stok} WHERE id_produk = $id");
    $db->commit();

    session_flash('pesan', [
        'Data berhasil diubah',
    ]);

    redirect('/produk');
};

$c_aksi_hapus_produk = function () {
    global $db;

    $id = $_GET['id'];

    $db->begin_transaction();
    $db->query("DELETE FROM stok_produk WHERE id_produk = {$id}");
    $db->query("DELETE FROM produk WHERE id = {$id}");
    $db->commit();

    redirect('/produk');
};