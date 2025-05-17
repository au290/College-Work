<?php
include 'koneksi.php';
include 'model.php';

$message = "";
$message_type = "";

if (isset($_POST['add_peminjaman'])) {
    $result = addPeminjaman(
        $db,
        $_POST['id_member'],
        $_POST['id_buku'],
        $_POST['tgl_pinjam'],
        $_POST['tgl_kembali']
    );

    $message = $result ? "Peminjaman berhasil ditambahkan" : "Gagal menambahkan peminjaman";
    $message_type = $result ? "success" : "error";
}

$members = getAllMembers($db);
$books = getAllBooks($db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Peminjaman Baru</h1>
            <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan data peminjaman baru</p>
        </div>
        
        <?php if ($message): ?>
        <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
            <div class="flex items-center">
                <i class="<?php echo $message_type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'; ?> mr-2"></i>
                <?php echo $message; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="id_member" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-user mr-1"></i> Member
                        </label>
                        <select name="id_member" id="id_member" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Pilih Member</option>
                            <?php 
                            if ($members && $members->num_rows > 0) {
                                while ($row = $members->fetch_assoc()) {
                                    echo "<option value='{$row['id_member']}'>{$row['nama_member']} ({$row['nomor_member']})</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div>
                        <label for="id_buku" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-book mr-1"></i> Buku
                        </label>
                        <select name="id_buku" id="id_buku" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Pilih Buku</option>
                            <?php 
                            if ($books && $books->num_rows > 0) {
                                while ($row = $books->fetch_assoc()) {
                                    echo "<option value='{$row['id_buku']}'>{$row['judul_buku']} ({$row['penulis']})</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="tgl_pinjam" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-calendar-alt mr-1"></i> Tanggal Pinjam
                        </label>
                        <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    
                    <div>
                        <label for="tgl_kembali" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="far fa-calendar-check mr-1"></i> Tanggal Kembali
                        </label>
                        <input type="date" name="tgl_kembali" id="tgl_kembali" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" required>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="peminjaman.php" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" name="add_peminjaman" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-1"></i> Tambah Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
    document.getElementById('tgl_pinjam').addEventListener('change', function() {
        const borrowDate = new Date(this.value);
        const returnDateInput = document.getElementById('tgl_kembali');
        returnDateInput.min = this.value;
        const returnDate = new Date(returnDateInput.value);
        if (returnDate < borrowDate) {
            borrowDate.setDate(borrowDate.getDate() + 7);
            returnDateInput.value = borrowDate.toISOString().split('T')[0];
        }
    });
    </script>
</body>
</html>