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
        <a href="<?= url_for('/petugas/tambah') ?>" class="btn btn-primary">Tambah Petugas</a>
        <table class="table table-striped" style="width: auto;">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>NAMA</td>
                    <td>USERNAME</td>
                    <td>PASSWORD</td>
                    <td>LEVEL</td>
                    <td colspan="3" class="text-center">AKSI</td>
                </tr>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($data_petugas as $petugas) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $petugas['nama'] ?></td>
                        <td><?= $petugas['username'] ?></td>
                        <td><?= $petugas['password'] ?></td>
                        <td><?= $petugas['level'] ?></td>
                        <td><a href="<?= url_for("/petugas/ubah?id={$petugas['id']}") ?>" class="btn btn-secondary">Ubah</a></td>
                        <td><a href="<?= url_for("/petugas/hapus?id={$petugas['id']}") ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </thead>
        </table>
    </div>
</div>

<?php view('layout/footer') ?>