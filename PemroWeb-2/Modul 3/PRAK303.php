<?php
function myLoop ($x,$y){
    foreach (range($x,$y) as $i) {
        $lastDigit = substr((string)$i, -1);
        if ($lastDigit === '3' || $lastDigit === '8'){
            echo '<img src=star-images-9441.png class="gambar">';
        } else {
            echo "$i ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .gambar{
      width: 20px;
      height: 20px;
    }
  </style>
</head>
<body>
    <form method="POST">
        <label>Batas Bawah:</label>
        <input type="text" name="input_awal"><br>
        <label>Batas Atas: </label>
        <input type="text" name="input_akhir"><br>
        <input type="submit" value="Cetak" name="button"><br></br>
    <?php
    if (isset($_POST['button'])) {
        $awal = $_POST['input_awal'];
        $akhir = $_POST['input_akhir'];
        myLoop($awal, $akhir);
    } 
    ?>
</body>
</html>