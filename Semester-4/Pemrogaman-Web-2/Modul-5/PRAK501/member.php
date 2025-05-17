<?php
include "koneksi.php";
include "model.php";
$member_message = "";
$message_type = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_member'])) {
        $result = deleteMember($db, $_POST['member_id']);
        $member_message = $result ? "Member berhasil dihapus" : "Gagal menghapus member";
        $message_type = $result ? "success" : "error";
    }

    if (isset($_POST['update_member'])) {
        $result = updateMember(
            $db,
            $_POST['member_id'],
            $_POST['nama_member'],
            $_POST['nomor_member'],
            $_POST['alamat'],
            $_POST['tgl_mendaftar'],
            $_POST['tgl_terakhir_bayar']
        );
        $member_message = $result ? "Member berhasil diupdate" : "Gagal update member";
        $message_type = $result ? "success" : "error";
    }
}

$result_member = getAllMembers($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Member</h1>
            <a href="formmember.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center">
                <i class="fas fa-user-plus mr-2"></i> Tambah Member
            </a>
        </div>

        <?php if ($member_message): ?>
        <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
            <div class="flex items-center">
                <i class="<?php echo $message_type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'; ?> mr-2"></i>
                <?php echo $member_message; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Member</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Daftar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Terakhir Bayar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        if ($result_member->num_rows > 0) {
                            while ($row = $result_member->fetch_assoc()) {
                                echo "<tr class='hover:bg-gray-50'>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['id_member']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>{$row['nama_member']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['nomor_member']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['alamat']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['tgl_mendaftar']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['tgl_terakhir_bayar']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                                        <button onclick=\"showEditMemberForm(
                                            '{$row['id_member']}',
                                            '{$row['nama_member']}',
                                            '{$row['nomor_member']}',
                                            '{$row['alamat']}',
                                            '{$row['tgl_mendaftar']}',
                                            '{$row['tgl_terakhir_bayar']}'
                                        )\" class='text-blue-600 hover:text-blue-900 mr-3'>
                                            <i class='fas fa-edit'></i> Edit
                                        </button>
                                        <form method='POST' style='display:inline'>
                                            <input type='hidden' name='member_id' value='{$row['id_member']}'>
                                            <button type='submit' name='delete_member' class='text-red-600 hover:text-red-900' onclick='return confirm(\"Apakah Anda yakin ingin menghapus member ini?\")'>
                                                <i class='fas fa-trash-alt'></i> Delete
                                            </button>
                                        </form>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='px-6 py-4 text-center text-sm text-gray-500'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="EditMemberForm" class="bg-white rounded-lg shadow-md p-6 mb-8 hidden">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Edit Member</h2>
            <form method="POST">
                <input type="hidden" name="member_id" id="edit_member_id">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="edit_nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Member</label>
                        <input type="text" name="nama_member" id="edit_nama" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="edit_nomor" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                        <input type="text" name="nomor_member" id="edit_nomor" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="edit_alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input type="text" name="alamat" id="edit_alamat" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="edit_tgl_daftar" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mendaftar</label>
                        <input type="date" name="tgl_mendaftar" id="edit_tgl_daftar" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="edit_tgl_bayar" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Terakhir Bayar</label>
                        <input type="date" name="tgl_terakhir_bayar" id="edit_tgl_bayar" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="hideEditForm()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" name="update_member" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function showEditMemberForm(id, nama, nomor, alamat, tgl_daftar, tgl_bayar) {
        const form = document.getElementById('EditMemberForm');
        form.classList.remove('hidden');

        document.getElementById('edit_member_id').value = id;
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_nomor').value = nomor;
        document.getElementById('edit_alamat').value = alamat;
        document.getElementById('edit_tgl_daftar').value = tgl_daftar;
        document.getElementById('edit_tgl_bayar').value = tgl_bayar;
        
        // Scroll to the form
        form.scrollIntoView({ behavior: 'smooth' });
    }
    
    function hideEditForm() {
        document.getElementById('EditMemberForm').classList.add('hidden');
    }
    </script>
</body>
</html>