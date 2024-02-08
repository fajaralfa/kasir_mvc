<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<div class="m-4 card">
    <div class="card-body">
        <?php foreach ($pesan ?? [] as $p) : ?>
            <div class="alert alert-primary"><?= $p ?></div>
        <?php endforeach ?>
        <?php foreach ($errors ?? [] as $e) : ?>
            <div class="alert alert-danger"><?= $e ?></div>
        <?php endforeach ?>
        <a href="<?= url_for('/pelanggan/tambah') ?>" class="btn btn-primary">Tambah Pelanggan</a>
        <table class="table table-striped" style="width: auto;">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>NAMA</td>
                    <td>ALAMAT</td>
                    <td>NOMOR TELEPON</td>
                    <td colspan="3" class="text-center">AKSI</td>
                </tr>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($semua_pelanggan as $pelanggan) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pelanggan['nama'] ?></td>
                        <td><?= $pelanggan['alamat'] ?></td>
                        <td><?= $pelanggan['nomor_telepon'] ?? 0 ?></td>
                        <td><a href="<?= url_for("/penjualan/tambah?id={$pelanggan['id']}") ?>" class="btn btn-primary">Buat Transaksi</a></td>
                        <td><a href="<?= url_for("/pelanggan/ubah?id={$pelanggan['id']}") ?>" class="btn btn-secondary">Ubah</a></td>
                        <td><a href="<?= url_for("/pelanggan/hapus?id={$pelanggan['id']}") ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </thead>
        </table>
    </div>
</div>

<?php view('layout/footer') ?>