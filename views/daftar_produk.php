<?php $no = 1 ?>
<table border="1">
    <thead>
        <tr>
            <td>NO</td>
            <td>NAMA PRODUK</td>
            <td>HARGA</td>
            <td colspan="2">AKSI</td>
        </tr>
    <tbody>
        <?php foreach ($semua_produk as $produk) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $produk['nama'] ?></td>
                <td><?= $produk['harga'] ?></td>
                <td><a href="<?= url_for("/produk/hapus?id={$produk['id']}") ?>">Hapus</a></td>
                <td><a href="<?= url_for("/produk/ubah?id={$produk['id']}") ?>">Ubah</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </thead>
</table>