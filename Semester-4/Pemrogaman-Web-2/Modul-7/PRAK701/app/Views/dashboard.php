<?php
// views/dashboard.php
?>
<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<h2>Hello From Dashboard</h2>

<!-- Users Section -->
<div class="users-section">
    <h3>Users</h3>
    <!-- User Create Form -->
    <form action="/dashboard/create_user" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Add User</button>
    </form>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['username'] ?></td>
                <td><?= $u['email'] ?></td>
                <td>
                    <a href="/dashboard/edit_user/<?= $u['id'] ?>">Edit</a>
                    <form action="/dashboard/delete_user/<?= $u['id'] ?>" method="post" style="display:inline;">
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Books Section -->
<div class="books-section">
    <h3>Books</h3>
    <!-- Book Create Form -->
    <form action="/dashboard/create_book" method="post">
        <input type="text" name="judul" placeholder="Title" required>
        <input type="text" name="penulis" placeholder="Author" required>
        <input type="text" name="penerbit" placeholder="Publisher" required>
        <input type="number" name="tahun_terbit" placeholder="Year" required>
        <button type="submit">Add Book</button>
    </form>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Year</th>
                <th>Actions</th>
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
                <td>
                    <a href="/dashboard/edit_book/<?= $b['id'] ?>">Edit</a>
                    <form action="/dashboard/delete_book/<?= $b['id'] ?>" method="post" style="display:inline;">
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Edit User Modal (hidden by default) -->
<div id="editUserModal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); background:white; padding:20px; border:1px solid #000;">
    <h3>Edit User</h3>
    <form id="editUserForm" method="post">
        <input type="hidden" name="id" id="editUserId">
        <input type="text" name="username" id="editUserUsername" required>
        <input type="email" name="email" id="editUserEmail" required>
        <button type="submit">Update</button>
        <button type="button" onclick="document.getElementById('editUserModal').style.display='none'">Cancel</button>
    </form>
</div>

<!-- Edit Book Modal (hidden by default) -->
<div id="editBookModal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); background:white; padding:20px; border:1px solid #000;">
    <h3>Edit Book</h3>
    <form id="editBookForm" method="post">
        <input type="hidden" name="id" id="editBookId">
        <input type="text" name="judul" id="editBookJudul" required>
        <input type="text" name="penulis" id="editBookPenulis" required>
        <input type="text" name="penerbit" id="editBookPenerbit" required>
        <input type="number" name="tahun_terbit" id="editBookTahun" required>
        <button type="submit">Update</button>
        <button type="button" onclick="document.getElementById('editBookModal').style.display='none'">Cancel</button>
    </form>
</div>

<script>
// Function to show edit user modal and populate form
function showEditUserModal(id, username, email) {
    document.getElementById('editUserId').value = id;
    document.getElementById('editUserUsername').value = username;
    document.getElementById('editUserEmail').value = email;
    document.getElementById('editUserForm').action = '/dashboard/update_user';
    document.getElementById('editUserModal').style.display = 'block';
}

// Function to show edit book modal and populate form
function showEditBookModal(id, judul, penulis, penerbit, tahun_terbit) {
    document.getElementById('editBookId').value = id;
    document.getElementById('editBookJudul').value = judul;
    document.getElementById('editBookPenulis').value = penulis;
    document.getElementById('editBookPenerbit').value = penerbit;
    document.getElementById('editBookTahun').value = tahun_terbit;
    document.getElementById('editBookForm').action = '/dashboard/update_book';
    document.getElementById('editBookModal').style.display = 'block';
}

// Attach click handlers to edit links
document.addEventListener('DOMContentLoaded', function() {
    const userEditLinks = document.querySelectorAll('a[href^="/dashboard/edit_user"]');
    userEditLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('href').split('/').pop();
            const row = this.closest('tr');
            const username = row.querySelector('td:nth-child(2)').textContent;
            const email = row.querySelector('td:nth-child(3)').textContent;
            showEditUserModal(id, username, email);
        });
    });

    const bookEditLinks = document.querySelectorAll('a[href^="/dashboard/edit_book"]');
    bookEditLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('href').split('/').pop();
            const row = this.closest('tr');
            const judul = row.querySelector('td:nth-child(2)').textContent;
            const penulis = row.querySelector('td:nth-child(3)').textContent;
            const penerbit = row.querySelector('td:nth-child(4)').textContent;
            const tahun_terbit = row.querySelector('td:nth-child(5)').textContent;
            showEditBookModal(id, judul, penulis, penerbit, tahun_terbit);
        });
    });
});
</script>

<?= $this->endsection() ?>
