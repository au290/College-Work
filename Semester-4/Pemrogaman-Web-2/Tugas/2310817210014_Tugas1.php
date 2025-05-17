<?php
$message = "";
function gradeConverter($nilai) {
    if ($nilai >= 80 && $nilai <= 100) {
        return "A";
    } elseif ($nilai >= 70 && $nilai < 80) {
        return "B";
    } elseif ($nilai >= 60 && $nilai < 70) {
        return "C";
    } elseif ($nilai >= 50 && $nilai < 60) {
        return "D";
    } elseif ($nilai >= 0 && $nilai < 50) {
        return "E";
    } else {
        return "Invalid Input";
    }
}
if (isset($_POST['button'])) {
    $nilai = $_POST['nilai'];
    $message = gradeConverter($nilai);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Nilai: </label>
        <input type="text" name="nilai"><br>
        <input type="submit" value="Konversi" name="button"><br>
        <?= $message ?>
</body>
</html>