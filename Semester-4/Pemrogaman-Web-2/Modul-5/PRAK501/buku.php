<?php
include "koneksi.php";
include "model.php";
$book_message = "";
$message_type = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_book'])) {
        $result = deleteBook($db, $_POST['book_id']);
        $book_message = $result ? "Buku berhasil dihapus" : "Gagal menghapus buku";
        $message_type = $result ? "success" : "error";
    }

    if (isset($_POST['update_book'])) {
        $result = updateBook(
            $db,
            $_POST['book_id'],
            $_POST['judul_buku'],
            $_POST['penulis'],
            $_POST['penerbit'],
            $_POST['tahun_terbit']
        );
        $book_message = $result ? "Buku berhasil diupdate" : "Gagal update buku";
        $message_type = $result ? "success" : "error";
    }
}

$result_book = getAllBooks($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Buku</h1>
            <a href="formbuku.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Buku
            </a>
        </div>

        <?php if ($book_message): ?>
        <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
            <div class="flex items-center">
                <i class="<?php echo $message_type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'; ?> mr-2"></i>
                <?php echo $book_message; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Buku</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerbit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Terbit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        if ($result_book->num_rows > 0) {
                            while ($row = $result_book->fetch_assoc()) {
                                echo "<tr class='hover:bg-gray-50'>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["id_buku"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $row["judul_buku"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["penulis"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["penerbit"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["tahun_terbit"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                                        <button onclick=\"showEditBookForm(
                                            '{$row['id_buku']}',
                                            '{$row['judul_buku']}',
                                            '{$row['penulis']}',
                                            '{$row['penerbit']}',
                                            '{$row['tahun_terbit']}'
                                        )\" class='text-blue-600 hover:text-blue-900 mr-3'>
                                            <i class='fas fa-edit'></i> Edit
                                        </button>
                                        <form method='POST' style='display:inline'>
                                            <input type='hidden' name='book_id' value='{$row['id_buku']}'>
                                            <button type='submit' name='delete_book' class='text-red-600 hover:text-red-900' onclick='return confirm(\"Apakah Anda yakin ingin menghapus buku ini?\")'>
                                                <i class='fas fa-trash-alt'></i> Delete
                                            </button>
                                        </form>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='px-6 py-4 text-center text-sm text-gray-500'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="EditBookForm" class="bg-white rounded-lg shadow-md p-6 mb-8 hidden">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Edit Buku</h2>
            <form method="POST">
                <input type="hidden" name="book_id" id="edit_book_id">
                
                <div class="mb-4">
                    <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                    <input type="text" name="judul_buku" id="edit_name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="edit_penulis" class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                    <input type="text" name="penulis" id="edit_penulis" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="edit_penerbit" class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
                    <input type="text" name="penerbit" id="edit_penerbit" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="mb-6">
                    <label for="edit_tahun" class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" id="edit_tahun" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="hideEditForm()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" name="update_book" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function showEditBookForm(id, judul, penulis, penerbit, tahun) {
        const form = document.getElementById('EditBookForm');
        form.classList.remove('hidden');

        document.getElementById('edit_book_id').value = id;
        document.getElementById('edit_name').value = judul;
        document.getElementById('edit_penulis').value = penulis;
        document.getElementById('edit_penerbit').value = penerbit;
        document.getElementById('edit_tahun').value = tahun;
        form.scrollIntoView({ behavior: 'smooth' });
    }
    
    function hideEditForm() {
        document.getElementById('EditBookForm').classList.add('hidden');
    }
    </script>
</body>
</html>