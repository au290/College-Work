<?php
$message = "";
function convertEjaan($nilai){
    if($nilai == 0){
        return "Nol";
    } 
    elseif($nilai <10){
        return "Satuan";
    }
    elseif($nilai < 20){
        return "Belasan";
    }
    elseif($nilai < 100){
        return "Puluhan";
    }
    else{
        return "Ratusan";
    }
}
if(isset($_POST['button'])){
    $nilai = $_POST['nilai'];
    $valid = true;
    if($nilai > 1000){
        $message = "<h2>Hasil: Nilai tidak boleh lebih dari 1000 </h2>";
        $valid = false;
    }
    if($nilai < 0){
        $message = "<h2>Hasil: Nilai tidak boleh kurang dari 0 </h2>";
        $valid = false;
    }
    if($valid){
        $message = "<h2>Hasil: ". convertEjaan($nilai) . "</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <LAbel>Nilai</LAbel>
        <input type="text" name="nilai"><br>
        <input type="submit" value="Konversi" name="button"><br>
        <?= $message ?>
    </form>
</body>
</html>