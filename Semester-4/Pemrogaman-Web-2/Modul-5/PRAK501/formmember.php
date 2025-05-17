<?php
include 'koneksi.php';
include 'model.php';

$message = "";
$message_type = "";

if (isset($_POST['add_member'])) {
    $result = addMember(
        $db,
        $_POST['nama_member'],
        $_POST['nomor_member'],
        $_POST['alamat'],
        $_POST['tgl_terakhir_bayar']
    );

    $message = $result ? "Member berhasil ditambahkan" : "Gagal menambahkan member";
    $message_type = $result ? "success" : "error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Member Baru</h1>
            <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan member baru</p>
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
                        <label for="nama_member" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-user mr-1"></i> Nama Member
                        </label>
                        <input type="text" name="nama_member" id="nama_member" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama lengkap" required>
                    </div>
                    
                    <div>
                        <label for="nomor_member" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-id-card mr-1"></i> Nomor Member
                        </label>
                        <input type="text" name="nomor_member" id="nomor_member" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nomor member" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-map-marker-alt mr-1"></i> Alamat
                    </label>
                    <textarea name="alamat" id="alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>
                
                <div class="mb-6">
                    <label for="tgl_terakhir_bayar" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="far fa-calendar-check mr-1"></i> Tanggal Terakhir Bayar
                    </label>
                    <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="member.php" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" name="add_member" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-user-plus mr-1"></i> Tambah Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>