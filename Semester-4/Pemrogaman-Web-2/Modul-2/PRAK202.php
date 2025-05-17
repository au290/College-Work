<?php
    $alert_nama = "";
    $alert_nim = "";
    $alert_jenis_kelamin = "";
    $message = "";
    if (isset($_POST['button'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $valid = true;
        if(empty($_POST['nama'])){
            $alert_nama = "nama tidak boleh kosong";
            $valid = false;
        }
        if(empty($_POST['nim'])){
            $alert_nim = "nim tidak boleh kosong"; 
            $valid = false;
        }
        if(empty($_POST['jenis_kelamin'])){
            $alert_jenis_kelamin = "jenis kelamin tidak boleh kosong";
            $valid = false;
        }
        if($valid){         
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $message= nl2br("<h2>Output</h2> <p>$nama\n$nim\n$jenis_kelamin\n</p>");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .alert {
        color: red;
        margin-top: 5px;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Nama: </label>
        <input type="text" name="nama">
        <span class="alert"><label>* </label><?=$alert_nama?></span><br>
        <label>Nim: </label>
        <input type="text" name="nim">
        <span class="alert"><label>* </label><?=$alert_nim?></span><br>
        <label>Jenis Kelamin:</label>
        <span class="alert"><label>* </label><?=$alert_jenis_kelamin?></span><br>
        <input type="radio" name="jenis_kelamin" value="Laki-Laki">
        <label for="jenis_kelamin1">Laki-Laki</label><br>
        <input type="radio" name="jenis_kelamin"value="Perempuan">
        <label for="jenis_kelamin2">Perempuan</label><br>
        <input type="Submit" name="button">
    </form>
    <?= $message ?>
</body>
</html>