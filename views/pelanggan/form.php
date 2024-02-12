<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<main class="container" style="max-width: 35rem;">
    <form action="<?= url_for("/pelanggan/{$target}") ?>" method="post" class="d-flex flex-column gap-3">
        <?php if ($target == 'ubah') : ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif ?>
        <div>
            <label for="nama">Nama Pelanggan</label>
            <input type="text" name="nama" id="nama" value="<?= $form['nama'] ?? '' ?>" class="form-control">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="3" class="form-control"><?= $form['alamat'] ?? '' ?></textarea>
        </div>
        <div>
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="" value="<?= $form['nomor_telepon'] ?? '' ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary align-self-start">Tambah</button>
    </form>
</main>

<?php view('layout/footer') ?>