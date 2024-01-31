<?php

$c_halaman_login = fn () => view('login', [
    'errors' => session_get('errors')
]);

$c_aksi_login = function () {
    global $db;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $user = $db->query($sql)->fetch_assoc();

    if (is_null($user)) {
        session_flash('errors', ['Username atau password salah.']);
        redirect('/login');
    }

    session_set('user', [
        'nama' => $user['nama'],
        'username' => $user['username'],
        'level' => $user['level'],
    ]);

    session_flash('messages', ['Login berhasil.']);
    redirect('/');
};

$c_aksi_logout = function () {
    session_destroy();
    redirect('/login');
};