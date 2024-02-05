<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<?php foreach($pesan as $p) : ?>
    <div><?= $p ?></div>
<?php endforeach ?>
<a href="<?= url_for('/pelanggan/tambah') ?>">Tambah Pelanggan</a>
<table border="1">
    <thead>
        <tr>
            <td>NO</td>
            <td>NAMA</td>
            <td>ALAMAT</td>
            <td>NOMOR TELEPON</td>
            <td colspan="2">AKSI</td>
        </tr>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($semua_pelanggan as $pelanggan) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pelanggan['nama'] ?></td>
                <td><?= $pelanggan['alamat'] ?></td>
                <td><?= $pelanggan['nomor_telepon'] ?? 0 ?></td>
                <td><a href="<?= url_for("/pelanggan/hapus?id={$pelanggan['id']}") ?>">Hapus</a></td>
                <td><a href="<?= url_for("/pelanggan/ubah?id={$pelanggan['id']}") ?>">Ubah</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </thead>
</table>

<?php view('layout/footer') ?>