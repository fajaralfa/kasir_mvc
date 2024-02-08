<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<main>
    <form action="<?= url_for("/petugas/{$target}") ?>" method="post">
        <?php if ($target == 'ubah') : ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif ?>
        <label for="nama">Nama Petugas</label>
        <input type="text" name="nama" id="nama" value="<?= $form['nama'] ?? '' ?>"><br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $form['username'] ?? '' ?>">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?= $form['password'] ?? '' ?>">
        <label for="level">Level</label>
        <select name="level" id="level">
            <option value="admin" <?= $form['level'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
            <option value="petugas" <?= $form['level'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
        </select>
        <button type="submit" style="text-transform: capitalize;"><?= $target ?></button>
    </form>
</main>

<?php view('layout/footer') ?>