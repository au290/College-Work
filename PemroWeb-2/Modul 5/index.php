<?php
include "koneksi.php";
include "model.php";

$book_count = 0;
$member_count = 0;
$active_borrowings = 0;
$recent_books = [];

$result = $db->query("SELECT COUNT(*) as total FROM buku");
if ($result && $result->num_rows > 0) {
    $book_count = $result->fetch_assoc()['total'];
}

$result = $db->query("SELECT COUNT(*) as total FROM member");
if ($result && $result->num_rows > 0) {
    $member_count = $result->fetch_assoc()['total'];
}

$result = $db->query("SELECT COUNT(*) as total FROM peminjaman WHERE tgl_kembali >= CURDATE()");
if ($result && $result->num_rows > 0) {
    $active_borrowings = $result->fetch_assoc()['total'];
}

$result = $db->query("SELECT * FROM buku ORDER BY id_buku DESC LIMIT 5");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recent_books[] = $row;
    }
}

$recent_borrowings = [];
$result = $db->query("
    SELECT p.*, m.nama_member, b.judul_buku 
    FROM peminjaman p
    JOIN member m ON p.id_member = m.id_member
    JOIN buku b ON p.id_buku = b.id_buku
    ORDER BY p.id_peminjaman DESC LIMIT 5
");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recent_borrowings[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <?php include "header.html"?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-lg mb-8 overflow-hidden">
            <div class="px-6 py-12 md:py-20 md:px-12 text-center md:text-left">
                <div class="md:max-w-3xl">
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Selamat Datang di Sistem Manajemen Perpustakaan</h1>
                    <p class="text-blue-100 text-lg mb-8">Kelola koleksi buku, anggota, dan peminjaman dengan mudah dan efisien.</p>
                    <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 justify-center md:justify-start">
                        <a href="buku.php" class="bg-white text-blue-700 hover:bg-blue-50 font-medium py-2 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                            <i class="fas fa-book-open mr-2"></i> Kelola Buku
                        </a>
                        <a href="member.php" class="bg-blue-900 text-white hover:bg-blue-950 font-medium py-2 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                            <i class="fas fa-users mr-2"></i> Kelola Member
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 uppercase">Total Buku</p>
                        <p class="text-2xl font-bold text-gray-800"><?php echo $book_count; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-user-friends text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 uppercase">Total Member</p>
                        <p class="text-2xl font-bold text-gray-800"><?php echo $member_count; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-exchange-alt text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 uppercase">Peminjaman Aktif</p>
                        <p class="text-2xl font-bold text-gray-800"><?php echo $active_borrowings; ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <a href="buku.php" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Manajemen Buku</h3>
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Tambah, edit, dan kelola koleksi buku perpustakaan.</p>
                <div class="text-blue-600 group-hover:text-blue-800 font-medium flex items-center">
                    Buka <i class="fas fa-arrow-right ml-2 transition-transform duration-300 transform group-hover:translate-x-1"></i>
                </div>
            </a>
            
            <a href="member.php" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Manajemen Member</h3>
                    <div class="p-2 rounded-full bg-green-100 text-green-600 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Kelola data anggota perpustakaan dengan mudah.</p>
                <div class="text-green-600 group-hover:text-green-800 font-medium flex items-center">
                    Buka <i class="fas fa-arrow-right ml-2 transition-transform duration-300 transform group-hover:translate-x-1"></i>
                </div>
            </a>
            
            <a href="peminjaman.php" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Peminjaman</h3>
                    <div class="p-2 rounded-full bg-purple-100 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition duration-300">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Catat dan kelola peminjaman dan pengembalian buku.</p>
                <div class="text-purple-600 group-hover:text-purple-800 font-medium flex items-center">
                    Buka <i class="fas fa-arrow-right ml-2 transition-transform duration-300 transform group-hover:translate-x-1"></i>
                </div>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Buku Terbaru</h3>
                </div>
                <div class="p-6">
                    <?php if (count($recent_books) > 0): ?>
                        <ul class="divide-y divide-gray-200">
                            <?php foreach ($recent_books as $book): ?>
                                <li class="py-3 flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($book['judul_buku']); ?></p>
                                        <p class="text-sm text-gray-500"><?php echo htmlspecialchars($book['penulis']); ?> • <?php echo htmlspecialchars($book['tahun_terbit']); ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="buku.php" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua Buku</a>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 text-center py-4">Belum ada buku yang ditambahkan</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Peminjaman Terbaru</h3>
                </div>
                <div class="p-6">
                    <?php if (count($recent_borrowings) > 0): ?>
                        <ul class="divide-y divide-gray-200">
                            <?php foreach ($recent_borrowings as $borrowing): ?>
                                <li class="py-3 flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($borrowing['nama_member']); ?></p>
                                        <p class="text-sm text-gray-500">
                                            Meminjam: <?php echo htmlspecialchars($borrowing['judul_buku']); ?> • 
                                            <?php echo date('d M Y', strtotime($borrowing['tgl_pinjam'])); ?> - 
                                            <?php echo date('d M Y', strtotime($borrowing['tgl_kembali'])); ?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="peminjaman.php" class="text-sm text-purple-600 hover:text-purple-800 font-medium">Lihat Semua Peminjaman</a>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 text-center py-4">Belum ada peminjaman yang tercatat</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="bg-white border-t border-gray-200 mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; <?php echo date('Y'); ?> Damar. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
