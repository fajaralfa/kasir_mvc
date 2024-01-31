<?php foreach ($messages as $msg) : ?>
    <div><?= $msg ?></div>
<?php endforeach ?>
<h1>Halaman Utama</h1>
<h2>User: <?= $user['nama'] ?></h2>
<h2>Level: <?= $user['level'] ?></h2>

<form action="<?= url_for('/logout') ?>" method="post">
    <button type="submit">Logout</button>
</form>