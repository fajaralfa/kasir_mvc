<?php

$c_daftar_pelanggan = function () {
    global $db;

    $sql = "SELECT * FROM pelanggan";
    if (isset($_GET['nama'])) {
        $sql .= " WHERE nama LIKE '%{$_GET['nama']}%'";
    }
    $semua_pelanggan = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

    view('pelanggan/list', [
        'semua_pelanggan' => $semua_pelanggan,
        'pesan' => session_get('pesan'),
    ]);
};

$c_detail_pelanggan = function () {
};

$c_halaman_tambah_pelanggan = function () {
    view('pelanggan/form', ['target' => 'tambah']);
};

$c_aksi_tambah_pelanggan = function () {
    global $db;

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "INSERT INTO pelanggan (nama, alamat, nomor_telepon) VALUES ('$nama', '$alamat', '$nomor_telepon')";

    $db->query($sql);

    session_flash('pesan', [
        'Data pelanggan berhasil ditambahkan',
    ]);

    redirect('/pelanggan');
};

$c_halaman_ubah_pelanggan = function () {
    global $db;

    $id = $_GET['id'];
    $sql = "SELECT * FROM pelanggan WHERE id = $id";
    $pelanggan = $db->query($sql)->fetch_assoc();

    view('pelanggan/form', ['target' => 'ubah', 'form' => $pelanggan]);
};

$c_aksi_ubah_pelanggan = function () {
    global $db;

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $db->query(
        "UPDATE pelanggan SET nama = '{$nama}', alamat = '{$alamat}', nomor_telepon = '{$nomor_telepon}' WHERE id = {$id}"
    );

    session_flash('pesan', [
        'Data pelanggan berhasil diubah',
    ]);

    redirect('/pelanggan');
};

$c_aksi_hapus_pelanggan = function () {
    global $db;

    $id = $_GET['id'];
    $db->query("DELETE FROM pelanggan WHERE id = {$id}");

    redirect('/pelanggan');
};
