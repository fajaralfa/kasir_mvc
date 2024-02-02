<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<?php foreach($pesan as $p) : ?>
    <div><?= $p ?></div>
<?php endforeach ?>
<a href="<?= url_for('/produk/tambah') ?>">Tambah Produk</a>
<table border="1">
    <thead>
        <tr>
            <td>NO</td>
            <td>NAMA PRODUK</td>
            <td>HARGA</td>
            <td>STOK</td>
            <td colspan="2">AKSI</td>
        </tr>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($semua_produk as $produk) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $produk['nama'] ?></td>
                <td><?= $produk['harga'] ?></td>
                <td><?= $produk['stok'] ?? 0 ?></td>
                <td><a href="<?= url_for("/produk/hapus?id={$produk['id']}") ?>">Hapus</a></td>
                <td><a href="<?= url_for("/produk/ubah?id={$produk['id']}") ?>">Ubah</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </thead>
</table>

<?php view('layout/footer') ?>