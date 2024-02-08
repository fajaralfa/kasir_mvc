<?php

$c_daftar_penjualan = function () {
    global $db;

    $data_penjualan = $db->query(
        "SELECT
        penjualan.id, pelanggan.nama AS nama_pelanggan, penjualan.waktu,
        penjualan.total_harga, petugas.nama AS nama_petugas FROM penjualan
        LEFT JOIN pelanggan ON id_pelanggan = pelanggan.id
        LEFT JOIN petugas ON id_petugas = petugas.id"
    )->fetch_all(MYSQLI_ASSOC);

    view('penjualan/list', [
        'data_penjualan' => $data_penjualan,
    ]);
};

$c_detail_penjualan = function () {
    global $db;

    $id_penjualan = $_GET['id'];

    $penjualan = $db->query("SELECT * FROM penjualan WHERE id = {$id_penjualan}")->fetch_assoc();
    $pelanggan = $db->query("SELECT * FROM pelanggan WHERE id = {$penjualan['id_pelanggan']}")->fetch_assoc();
    $produk_penjualan = $db->query(
        "SELECT produk.nama, produk.harga, produk_penjualan_junction.jumlah_produk AS qty, produk_penjualan_junction.subtotal FROM produk_penjualan_junction LEFT JOIN produk ON produk_penjualan_junction.id_produk = produk.id WHERE id_penjualan = {$id_penjualan}"
    )->fetch_all(MYSQLI_ASSOC);

    view('penjualan/detail', [
        'penjualan' => $penjualan,
        'pelanggan' => $pelanggan,
        'produk_penjualan' => $produk_penjualan,
    ]);
};

$c_halaman_tambah_penjualan = function () {
    global $db;

    $id_pelanggan = $_GET['id'];

    $pelanggan = $db->query("SELECT * FROM pelanggan WHERE id = {$id_pelanggan}")->fetch_assoc();
    $data_keranjang = Keranjang::all();

    $db_data_keranjang = [];
    foreach ($data_keranjang as $key => $val) {
        $sql = "SELECT * FROM produk WHERE id = {$key}";
        $res = $db->query($sql)->fetch_assoc();
        if (!is_null($res)) {
            $res['jumlah'] = $val;
            array_push($db_data_keranjang, $res);
        }
    }

    view('penjualan/form', [
        'pelanggan' => $pelanggan,
        'data_keranjang' => $db_data_keranjang,
    ]);
};

$c_aksi_tambah_penjualan = function () {
    global $db;

    $waktu = date('Y-m-d h:m:s');
    $total_harga = $_POST['total_harga'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_petugas = session_get('user')['id'];
    $db->query("INSERT INTO penjualan (waktu, total_harga, id_pelanggan, id_petugas) VALUES ('$waktu', $total_harga, $id_pelanggan, $id_petugas)");
    $id_penjualan = $db->insert_id;

    $produk_penjualan = Keranjang::all();
    $stmt = $db->prepare("INSERT INTO produk_penjualan_junction (id_produk, jumlah_produk, subtotal, id_penjualan)
        VALUES (?,?,?,?)");

    foreach ($produk_penjualan as $id_produk => $jumlah) {
        $harga = $db->query("SELECT harga FROM produk WHERE id = {$id_produk}")->fetch_assoc()['harga'];
        $subtotal = ($jumlah * $harga);
        $stmt->bind_param('iiii', $id_produk, $jumlah, $subtotal, $id_penjualan);
        $stmt->execute();
    }

    unset($_SESSION['keranjang']);

    redirect("/penjualan/detail?id={$id_penjualan}");
};
