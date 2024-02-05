<?php

class Keranjang
{
    private const session_key = 'keranjang';

    public static function add(int $id_produk, int $jumlah = 1)
    {
        if(isset($_SESSION[static::session_key][$id_produk])) {
            $_SESSION[static::session_key][$id_produk] += $jumlah;
        } else {
            $_SESSION[static::session_key][$id_produk] = $jumlah;
        }
    }

    public static function edit(int $id_produk, int $jumlah)
    {
            $_SESSION[static::session_key][$id_produk] = $jumlah;
    }

    public static function remove(int $id_produk)
    {
        unset($_SESSION[static::session_key][$id_produk]);
    }

    public static function empty()
    {
        unset($_SESSION[static::session_key]);
    }

    public static function all()
    {
        return $_SESSION[static::session_key] ?? [];
    }
}