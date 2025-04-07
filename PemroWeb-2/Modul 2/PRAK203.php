<?php
    $message = "";
    function convertToCelsius($nilai, $dari) {
        switch ($dari) {
            case 'F': return ($nilai - 32) * 5/9;
            case 'Re': return $nilai * 5/4;
            case 'K': return $nilai - 273.15;
            default: return $nilai; 
        }
    }
    function convertFromCelsius($nilai, $ke) {
        switch ($ke) {
            case 'F': return ($nilai * 9/5) + 32;
            case 'Re': return $nilai * 4/5;
            case 'K': return $nilai + 273.15;
            default: return $nilai; 
        }
    }

    if (isset($_POST['convert'])) {
        $nilai = $_POST['nilai'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];

        if ($dari === $ke) {
            $hasil = $nilai;
        } else {
            $celcius = convertToCelsius($nilai, $dari);
            $hasil = convertFromCelsius($celcius, $ke);
        }
        $message = nl2br("<h2>Hasil Konversi: $hasil °$ke</h2>");
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
    <form method = "POST">
        <label>Nilai: </label>
        <input type="text" name="nilai"><br>
        <label>Dari: </label><br>
        <input type="radio" name="dari" value="C">Celsius<br>
        <input type="radio" name="dari" value="F">Fahrenheit<br>
        <input type="radio" name="dari" value="K">Kelvin<br>
        <input type="radio" name="dari" value="Re">Reamur<br>
        <label>Ke: </label><br>
        <input type="radio" name="ke" value="C">Celsius<br>
        <input type="radio" name="ke" value="F">Fahrenheit<br>
        <input type="radio" name="ke" value="K">Kelvin<br>
        <input type="radio" name="ke" value="Re">Reamur<br>
        <input type="submit" name="convert" value="Konversi"><br>
        <?= $message ?>
    </form>
</body>
</html>
