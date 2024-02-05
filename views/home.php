<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<?php foreach ($messages as $msg) : ?>
    <div><?= $msg ?></div>
<?php endforeach ?>
<h1>Halaman Utama</h1>
<h2>User: <?= $user['nama'] ?></h2>
<h2>Level: <?= $user['level'] ?></h2>

<?php view('layout/footer') ?>