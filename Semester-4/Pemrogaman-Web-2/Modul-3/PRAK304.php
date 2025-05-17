<?php
session_start();

// Fungsi untuk menampilkan bintang
function myLoop($x) {
    for ($i = 0; $i < $x; $i++) {
        echo "<img src='star-images-9441.png' width=80 alt=''>";
    }
}

// Inisialisasi sesi jika belum ada
// Inisialisasi sesi jika belum ada
if (!isset($_SESSION['x'])) {
    $_SESSION['x'] = 0;
}

$show_result = false;

// Tangani tombol submit jumlah awal
if (isset($_POST['button2'])) {
    $awal = isset($_POST['input_awal']) ? intval($_POST['input_awal']) : 0;
    $_SESSION['x'] = max(0, $awal);
    $show_result = true;
}

// Tambah bintang
if (isset($_POST['button1'])) {
    $_SESSION['x']++;
    $show_result = true;
}

// Kurangi bintang
if (isset($_POST['button'])) {
    $_SESSION['x'] = max(0, $_SESSION['x'] - 1);
    $show_result = true;
}

// Selalu set pesan jika hasil akan ditampilkan
if ($show_result) {
    $x = $_SESSION['x'];
    $message = "Jumlah bintang: " . $x;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Star Loop</title>
</head>
<body>
    <?php if (!$show_result): ?>
    <div class="awal">
        <form method="POST">
            <label>Jumlah bintang:</label>
            <input type="text" name="input_awal"><br>
            <input type="submit" value="Submit" name="button2">
        </form>
    </div>
    <?php endif; ?>

    <?php if ($show_result): ?>
    <?= $message ?>
    <div class="result">
        <p><?php myLoop($x); ?></p>
        <form method="POST">
            <input type="submit" value="Tambah" name="button1">
            <input type="submit" value="Kurang" name="button">
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
