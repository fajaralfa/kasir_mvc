<?php

$c_daftar_petugas = function () {
    global $db;

    $sql = "SELECT * FROM petugas";
    if (isset($_GET['nama'])) {
        $sql .= " WHERE nama LIKE '%{$_GET['nama']}%'";
    }
    $semua_petugas = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

    view('petugas/list', [
        'data_petugas' => $semua_petugas,
        'pesan' => session_get('pesan'),
    ]);
};

$c_halaman_tambah_petugas = function () {
    view('petugas/form', ['target' => 'tambah']);
};

$c_aksi_tambah_petugas = function () {
    global $db;

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = "INSERT INTO petugas (nama, username, password, level) VALUE
        ('$nama', '$username', '$password', '$level')";
    $db->query($sql);

    session_flash('pesan', [
        'Data petugas berhasil ditambahkan',
    ]);

    redirect('/petugas');
};

$c_halaman_ubah_petugas = function () {
    global $db;

    $id = $_GET['id'];
    $sql = "SELECT * FROM petugas WHERE id = $id";
    $petugas = $db->query($sql)->fetch_assoc();

    view('petugas/form', ['target' => 'ubah', 'form' => $petugas]);
};

$c_aksi_ubah_petugas = function () {
    global $db;

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $db->query(
        "UPDATE petugas SET
        nama = '{$nama}', username = '{$username}', password = '{$password}', level = '{$level}'
        WHERE id = {$id}"
    );

    session_flash('pesan', [
        'Data petugas berhasil diubah',
    ]);

    redirect('/petugas');
};

$c_aksi_hapus_petugas = function () {
    global $db;

    $id = $_GET['id'];
    $db->query("DELETE FROM petugas WHERE id = {$id}");

    redirect('/petugas');
};
