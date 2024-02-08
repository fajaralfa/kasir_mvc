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
        <div>Nama Pelanggan <?= $pelanggan['nama'] ?></div>
        <div>Alamat <?= $pelanggan['alamat'] ?></div>
        <div>Nomor Telepon <?= $pelanggan['nomor_telepon'] ?></div>
        <table class="table table-striped border" style="width: auto;">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>NAMA PRODUK</td>
                    <td>HARGA</td>
                    <td>QTY</td>
                    <td>TOTAL HARGA PRODUK</td>
                    <td colspan="3" class="text-center">AKSI</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                ?>
                <?php foreach ($data_keranjang as $produk) : ?>
                    <?php
                    $total_harga_produk = $produk['harga'] * $produk['jumlah'];
                    $total += $total_harga_produk;
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['nama'] ?></td>
                        <td>Rp. <?= number_format($produk['harga']) ?></td>
                        <td><?= $produk['jumlah'] ?></td>
                        <td>Rp. <?= number_format($total_harga_produk) ?></td>
                        <td>
                            <form action="<?= url_for("/keranjang/hapus") ?>" method="post">
                                <input type="hidden" name="id_produk" value=<?= $produk['id'] ?>>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="fw-bold">Total Harga :</td>
                    <td colspan="5" class="fw-bold text-end">Rp. <?= number_format($total) ?></td>
                </tr>
            </tfoot>
        </table>
        <form action="<?= url_for('/penjualan/tambah') ?>" method="post">
            <input type="hidden" name="total_harga" value="<?= $total ?>">
            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id'] ?>">
            <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
        </form>
    </div>
</div>

<?php view('layout/footer') ?>