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
    id_petugas VARCHAR(35) NOT NULL,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id),
    FOREIGN KEY (id_petugas) REFERENCES petugas(id)
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

DELIMITER $$

CREATE TRIGGER trigger_after_insert_produk
AFTER INSERT ON produk FOR EACH ROW
BEGIN
    INSERT INTO stok_produk (id_produk, stok) VALUES
    (NEW.id, 0);
END$$

CREATE TRIGGER trigger_before_delete_produk
BEFORE DELETE ON produk FOR EACH ROW
BEGIN
    DELETE FROM stok_produk WHERE id_produk = OLD.id;
END$$

DELIMITER ;

-- SAMPLE DATA
INSERT INTO petugas (nama, username, password, level) VALUES
('Administrator', 'admin', 'admin', 'admin'),
('Petugas', 'petugas', 'petugas', 'petugas');

INSERT INTO produk (id, nama, harga) VALUES (1, 'Mobil', 100000000), (2, 'Motor', 20000000);

INSERT INTO stok_produk (id_produk, stok) VALUES (1, 10), (2, 20);

INSERT INTO pelanggan (id, nama, alamat, nomor_telepon) VALUES
(1, 'Fajar', 'Cisempur', '086252726'),
(2, 'Ilham', 'Bantarkalong', '029292823');

INSERT INTO penjualan (id, waktu, total_harga, id_pelanggan, username_petugas) VALUES 
(1, "2022-04-01 07:00:00", 100000000, 1, 'petugas'),
(2, "2022-04-02 02:43:32", 40000000, 1, 'petugas');

INSERT INTO produk_penjualan_junction (id_produk, jumlah_produk, subtotal, id_penjualan) VALUES
(1, 1, 100000000, 1),
(2, 2, 40000000, 2);

-- QUERY produk dan stoknya
-- SELECT produk.id AS id_produk, produk.nama, produk.harga, stok_produk.stok
--     FROM produk LEFT JOIN stok_produk ON produk.id = stok_produk.id_produk;

-- QUERY 