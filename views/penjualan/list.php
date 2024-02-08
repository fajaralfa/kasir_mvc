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
        <table class="table table-striped" style="width: auto;">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>PELANGGAN</td>
                    <td>WAKTU</td>
                    <td>TOTAL HARGA</td>
                    <td>PETUGAS</td>
                    <td colspan="3" class="text-center">AKSI</td>
                </tr>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($data_penjualan as $penjualan) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $penjualan['nama_pelanggan'] ?></td>
                        <td><?= $penjualan['waktu'] ?></td>
                        <td><?= $penjualan['total_harga'] ?></td>
                        <td><?= $penjualan['nama_petugas'] ?></td>
                        <td><a href="<?= url_for("/penjualan/detail?id={$penjualan['id']}") ?>" class="btn btn-primary">Detail</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </thead>
        </table>
    </div>
</div>

<?php view('layout/footer') ?>