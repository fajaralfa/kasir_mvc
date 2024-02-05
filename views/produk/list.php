<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<div class="m-4 card">
    <div class="card-body">
        <?php foreach ($pesan as $p) : ?>
            <div class="alert alert-primary"><?= $p ?></div>
        <?php endforeach ?>
        <?php foreach ($errors as $e) : ?>
            <div class="alert alert-danger"><?= $e ?></div>
        <?php endforeach ?>
        <div class="d-flex gap-5">
            <a href="<?= url_for('/produk/tambah') ?>" class="btn btn-primary">Tambah Produk</a>
            <form action="<?= url_for('/produk') ?>" method="get">
                <div class="d-flex gap-3">
                    <input type="text" name="nama" id="nama" placeholder="Nama Produk" class="form-control">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>
        </div>
        <table class="table table-striped mt-4" style="width: auto;">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>NAMA PRODUK</td>
                    <td>HARGA</td>
                    <td>STOK</td>
                    <td colspan="3" class="text-center">AKSI</td>
                </tr>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($data_produk as $produk) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['nama'] ?></td>
                        <td><?= $produk['harga'] ?></td>
                        <td><?= $produk['stok'] ?? 0 ?></td>
                        <td><a href="<?= url_for("/produk/hapus?id={$produk['id']}") ?>" class="btn btn-danger">Hapus</a></td>
                        <td><a href="<?= url_for("/produk/ubah?id={$produk['id']}") ?>" class="btn btn-secondary">Ubah</a></td>
                        <td class="">
                            <form action="<?= url_for("/keranjang/tambah") ?>" method="post">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="text" name="id_produk" id="" value="<?= $produk['id'] ?>" hidden>
                                    <input type="number" name="jumlah" id="" value="1" class="form-control d-inline" style="width: 4em;">
                                    <button type="submit" class="btn btn-warning">Tambah ke Keranjang</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </thead>
        </table>

        <?php view('layout/footer') ?>
    </div>
</div>