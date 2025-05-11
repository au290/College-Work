<?php
include 'koneksi.php';
include 'model.php';

$message = "";
$message_type = "";

if (isset($_POST['add_book'])) {
    $result = addBook(
        $db,
        $_POST['judul_buku'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit']
    );
    $message = $result ? "Buku berhasil ditambahkan" : "Gagal menambahkan buku";
    $message_type = $result ? "success" : "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Buku Baru</h1>
            <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan buku baru ke perpustakaan</p>
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
                <div class="mb-6">
                    <label for="judul_buku" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-book mr-1"></i> Judul Buku
                    </label>
                    <input type="text" name="judul_buku" id="judul_buku" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan judul buku" required>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="penulis" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-pen-nib mr-1"></i> Penulis
                        </label>
                        <input type="text" name="penulis" id="penulis" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Nama penulis" required>
                    </div>
                    
                    <div>
                        <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-building mr-1"></i> Penerbit
                        </label>
                        <input type="text" name="penerbit" id="penerbit" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Nama penerbit" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="far fa-calendar-alt mr-1"></i> Tahun Terbit
                    </label>
                    <input type="number" name="tahun_terbit" id="tahun_terbit" min="1900" max="<?php echo date('Y'); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Tahun terbit" required>
                    <p class="mt-1 text-sm text-gray-500">Masukkan tahun antara 1900 dan <?php echo date('Y'); ?></p>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="buku.php" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" name="add_book" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-1"></i> Tambah Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentYear = new Date().getFullYear();
        document.getElementById('tahun_terbit').setAttribute('max', currentYear);
        document.getElementById('tahun_terbit').setAttribute('placeholder', `Tahun terbit (1900-${currentYear})`);
    });
    </script>
</body>
</html>