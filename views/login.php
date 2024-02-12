<?= view('layout/header', ['judul' => 'Login']) ?>

<div class="container py-5" style="max-width: 30rem;">
    <div class="h2">Login | Kasir</div>
    <form action="<?= url_for('/login') ?>" method="post" class="d-flex flex-column gap-3">
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary justify-self-center align-self-start">Login</button>
    </form>
    <?php foreach ($errors as $error) : ?>
        <div><?= $error ?></div>
    <?php endforeach; ?>
</div>

<?= view('layout/footer') ?>