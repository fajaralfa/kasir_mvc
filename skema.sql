-- DROP DATABASE kasir_fajar_xiirpl2;

CREATE DATABASE kasir_fajar_xiirpl2;
USE kasir_fajar_xiirpl2;

CREATE TABLE petugas (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(35) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    level ENUM('admin', 'petugas')
);

CREATE TABLE pelanggan (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT,
    nomor_telepon VARCHAR(15)
);

CREATE TABLE produk (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    harga INTEGER NOT NULL
);

CREATE TABLE stok_produk (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_produk INTEGER NOT NULL,
    stok INTEGER NOT NULL,
    FOREIGN KEY (id_produk) REFERENCES produk(id)
);

CREATE TABLE penjualan (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    waktu DATETIME,
    total_harga INTEGER NOT NULL,
    id_pelanggan INTEGER NOT NULL,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id)
);

CREATE TABLE produk_penjualan_junction (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_produk INTEGER NOT NULL,
    jumlah_produk INTEGER NOT NULL,
    subtotal INTEGER NOT NULL,
    id_penjualan INTEGER NOT NULL,
    FOREIGN KEY (id_produk) REFERENCES produk(id),
    FOREIGN KEY (id_penjualan) REFERENCES produk(id)
);