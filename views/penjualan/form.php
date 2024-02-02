<main>
    <form action="<?= url_for("/penjualan/tambah") ?>" method="post">
        <label for="waktu">Waktu</label>
        <input type="date" name="waktu" id="waktu" value="<?= $form['waktu'] ?? '' ?>"><br>
        <label for="total_harga">Total Harga</label>
        <input type="text" name="total_harga" id="total_harga" value="<?= $form['total_harga'] ?? '' ?>"><br>
        <input type="hidden" name="id_pelanggan" <?= $_GET['id_pelanggan'] ?>><br>
        <button type="submit">Tambah</button>
    </form>
</main>