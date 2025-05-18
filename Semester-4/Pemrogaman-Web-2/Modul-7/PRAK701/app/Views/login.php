<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<h2>Hello From Login</h2>
<form action="/login/process" method="post">
     <?= csrf_field() ?>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit" name="login">Login</button>
</form>

<?= $this->endSection() ?>
