<?php view('layout/header') ?>
<?php view('layout/nav') ?>

<main class="container" style="max-width: 35rem;">
    <form action="<?= url_for("/petugas/{$target}") ?>" method="post" class="d-flex flex-column gap-3">
        <?php if ($target == 'ubah') : ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif ?>
        <div>
            <label for="nama">Nama Petugas</label>
            <input type="text" name="nama" id="nama" value="<?= $form['nama'] ?? '' ?>" class="form-control">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $form['username'] ?? '' ?>" class="form-control">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?= $form['password'] ?? '' ?>" class="form-control">
        </div>
        <div>
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control">
                <option value="admin" <?= $form['level'] ?? '' == 'admin' ? 'selected' : '' ?>>Administrator</option>
                <option value="petugas" <?= $form['level'] ?? '' == 'petugas' ? 'selected' : '' ?>>Petugas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary align-self-start" style="text-transform: capitalize;"><?= $target ?></button>
    </form>
</main>

<?php view('layout/footer') ?>