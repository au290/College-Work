<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<h2>Hello From Dashboard</h2>

<!-- Users Section -->
<div class="users-section">
    <h3>Users</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['username'] ?></td>
                <td><?= $u['email'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Books Section -->
<div class="books-section">
    <h3>Books</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $b): ?>
            <tr>
                <td><?= $b['id'] ?></td>
                <td><?= $b['judul'] ?></td>
                <td><?= $b['penulis'] ?></td>
                <td><?= $b['penerbit'] ?></td>
                <td><?= $b['tahun_terbit'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endsection() ?>