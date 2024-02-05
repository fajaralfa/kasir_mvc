<main>
    <form action="<?= url_for("/produk/{$target}") ?>" method="post">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama" id="nama" value="<?= $form['nama'] ?? '' ?>"><br>
        <label for="nama_produk">Harga</label>
        <input type="number" name="harga" id="harga" value="<?= $form['harga'] ?? '' ?>"><br>
        <input type="hidden" name="id" value="<?= $form['id'] ?>">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="<?= $form['stok'] ?? '' ?>"><br>
        <button type="submit">Tambah</button>
    </form>
</main>