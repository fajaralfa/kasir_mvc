<main>
    <form action="<?= url_for("/pelanggan/{$target}") ?>" method="post">
        <?php if ($target == 'ubah') : ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif ?>
        <label for="nama">Nama Pelanggan</label>
        <input type="text" name="nama" id="nama" value="<?= $form['nama'] ?? '' ?>"><br>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="3"><?= $form['alamat'] ?? '' ?></textarea><br>
        <label for="nomor_telepon">Nomor Telepon</label>
        <input type="text" name="nomor_telepon" id="" value=<?= $form['nomor_telepon'] ?? '' ?>><br>
        <button type="submit">Tambah</button>
    </form>
</main>