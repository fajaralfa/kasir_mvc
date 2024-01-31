<form action="<?= url_for('/login') ?>" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username"><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password"><br>
    <button type="submit">Login</button>
</form>
<?php foreach ($errors as $error) : ?>
    <div><?= $error ?></div>
<?php endforeach; ?>