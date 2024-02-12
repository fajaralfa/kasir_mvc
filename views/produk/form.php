<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<main class="container py-5" style="max-width: 35rem;">
    <form action="<?= url_for("/produk/{$target}") ?>" method="post" class="d-flex flex-column gap-3">
        <div>
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama" id="nama" value="<?= $form['nama'] ?? '' ?>" class="form-control">
        </div>
        <div>
            <label for="nama_produk">Harga</label>
            <input type="number" name="harga" id="harga" value="<?= $form['harga'] ?? '' ?>" class="form-control">
        </div>
        <input type="hidden" name="id" value="<?= $form['id'] ?>">
        <div>
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" value="<?= $form['stok'] ?? '' ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary align-self-start">Tambah</button>
    </form>
</main>

<?php view('layout/footer') ?>