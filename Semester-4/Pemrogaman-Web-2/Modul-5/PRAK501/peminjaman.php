<?php
include "koneksi.php";
include "model.php";
$peminjaman_message = "";
$message_type = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_peminjaman'])) {
        $result = deletePeminjaman($db, $_POST['peminjaman_id']);
        $peminjaman_message = $result ? "Peminjaman berhasil dihapus" : "Gagal menghapus peminjaman";
        $message_type = $result ? "success" : "error";
    }

    if (isset($_POST['update_peminjaman'])) {
        $result = updatePeminjaman(
            $db,
            $_POST['peminjaman_id'],
            $_POST['id_member'],
            $_POST['id_buku'],
            $_POST['tgl_pinjam'],
            $_POST['tgl_kembali']
        );
        $peminjaman_message = $result ? "Peminjaman berhasil diupdate" : "Gagal update peminjaman";
        $message_type = $result ? "success" : "error";
    }
}

$result_peminjaman = getAllPeminjaman($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Peminjaman</h1>
            <a href="formpinjam.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Peminjaman
            </a>
        </div>

        <?php if ($peminjaman_message): ?>
        <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
            <div class="flex items-center">
                <i class="<?php echo $message_type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'; ?> mr-2"></i>
                <?php echo $peminjaman_message; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Peminjaman</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Member</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        if ($result_peminjaman->num_rows > 0) {
                            while ($row = $result_peminjaman->fetch_assoc()) {
                                echo "<tr class='hover:bg-gray-50'>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['id_peminjaman']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['id_member']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['id_buku']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['tgl_pinjam']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['tgl_kembali']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                                        <button onclick=\"showEditPeminjamanForm(
                                            '{$row['id_peminjaman']}',
                                            '{$row['id_member']}',
                                            '{$row['id_buku']}',
                                            '{$row['tgl_pinjam']}',
                                            '{$row['tgl_kembali']}'
                                        )\" class='text-blue-600 hover:text-blue-900 mr-3'>
                                            <i class='fas fa-edit'></i> Edit
                                        </button>
                                        <form method='POST' style='display:inline'>
                                            <input type='hidden' name='peminjaman_id' value='{$row['id_peminjaman']}'>
                                            <button type='submit' name='delete_peminjaman' class='text-red-600 hover:text-red-900' onclick='return confirm(\"Apakah Anda yakin ingin menghapus peminjaman ini?\")'>
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

        <div id="EditPeminjamanForm" class="bg-white rounded-lg shadow-md p-6 mb-8 hidden">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Edit Peminjaman</h2>
            <form method="POST">
                <input type="hidden" name="peminjaman_id" id="edit_peminjaman_id">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="edit_id_member" class="block text-sm font-medium text-gray-700 mb-1">ID Member</label>
                        <input type="text" name="id_member" id="edit_id_member" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="edit_id_buku" class="block text-sm font-medium text-gray-700 mb-1">ID Buku</label>
                        <input type="text" name="id_buku" id="edit_id_buku" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="edit_tgl_pinjam" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-calendar-alt mr-1"></i> Tanggal Pinjam
                        </label>
                        <input type="date" name="tgl_pinjam" id="edit_tgl_pinjam" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="edit_tgl_kembali" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-calendar-check mr-1"></i> Tanggal Kembali
                        </label>
                        <input type="date" name="tgl_kembali" id="edit_tgl_kembali" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="hideEditForm()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" name="update_peminjaman" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function showEditPeminjamanForm(id, id_member, id_buku, tgl_pinjam, tgl_kembali) {
        const form = document.getElementById('EditPeminjamanForm');
        form.classList.remove('hidden');

        document.getElementById('edit_peminjaman_id').value = id;
        document.getElementById('edit_id_member').value = id_member;
        document.getElementById('edit_id_buku').value = id_buku;
        document.getElementById('edit_tgl_pinjam').value = tgl_pinjam;
        document.getElementById('edit_tgl_kembali').value = tgl_kembali;
        
        // Scroll to the form
        form.scrollIntoView({ behavior: 'smooth' });
    }
    
    function hideEditForm() {
        document.getElementById('EditPeminjamanForm').classList.add('hidden');
    }
    </script>
</body>
</html>