<?php
session_start();
$y = 0;
function myLoop ($x){
    foreach (range(0, $x) as $i) {
        echo "* ";
    }
}
if (!isset($_SESSION['x'])) {
    $_SESSION['x'] = $y;
}
if (isset($_POST['button'])) {
    $x = $_SESSION['x'] - 1;
}
$x = $_SESSION['x'];
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
        <input type="text" name="input_awal"><br>
        <input type="submit" value="Cetak" name="button"><br></br>
    <?php
    myLoop($x);
    ?>
</body>
</html>