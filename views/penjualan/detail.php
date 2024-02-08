<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<div class="card">
    <div class="card-header">
        <h1>Detail Penjualan</h1>
    </div>
    <div class="card-body">
        <div>Waktu Penjualan : <?= $penjualan['waktu'] ?></div>
        <div>Nama Pelanggan : <?= $pelanggan['nama'] ?></div>
        <div>Alamat : <?= $pelanggan['alamat'] ?></div>
        <div>Nomor Telepon : <?= $pelanggan['nomor_telepon'] ?></div>
        <table class="table table-striped border" style="width: auto;">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>NAMA PRODUK</td>
                    <td>HARGA</td>
                    <td>QTY</td>
                    <td>TOTAL HARGA PRODUK</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                ?>
                <?php foreach ($produk_penjualan as $produk) : ?>
                    <?php
                    $total_harga_produk = $produk['harga'] * $produk['qty'];
                    $total += $total_harga_produk;
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['nama'] ?></td>
                        <td>Rp. <?= number_format($produk['harga']) ?></td>
                        <td><?= $produk['qty'] ?></td>
                        <td>Rp. <?= number_format($total_harga_produk) ?></td>
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
    </div>
</div>

<?php view('layout/footer') ?>