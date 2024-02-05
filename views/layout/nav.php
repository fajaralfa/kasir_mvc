<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= url_for('/') ?>">Aplikasi Kasir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_for('/produk') ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_for('/penjualan') ?>">Penjualan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_for('/keranjang') ?>">
                        Keranjang
                        <span class="text-primary">
                            <?php if (isset($_SESSION['keranjang'])) echo '(' .  count($_SESSION['keranjang']) . ')' ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_for('/pelanggan') ?>">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_for('/petugas') ?>">Petugas</a>
                </li>
            </ul>
        </div>
        <form action="<?= url_for('/logout') ?>" method="post">
            <button type="submit" onclick="return confirm('Logout?')" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</nav>