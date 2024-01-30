CREATE DATABASE kasir_fajar_xiirpl2;
USE kasir_fajar_xiirpl2;

CREATE TABLE petugas (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(35) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    level ENUM('admin', 'petugas')
);