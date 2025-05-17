<?php
function automaticYapping($nilai) {
    $output = "";
    $i = 1;
    while ($i <= $nilai) {
        if ($i % 2 == 0) {
            $output .= "<h2><span style='color:green'>Peserta ke-" . $i . "</span></h2>";
        } else {
            $output .= "<h2><span style='color:red'>Peserta ke-" . $i . "</span></h2>";
        }
        $i++;
    }
    return $output;
}
$value = 0;
if (isset($_POST['button'])) {
    $value = $_POST['input'];
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
        <label>Jumlah Peserta : </label>
        <input type="text" name="input"><br>
        <input type="submit" value="Cetak" name="button"><br>
    </form>
    <?= automaticYapping($value); ?>
</body>
</html>