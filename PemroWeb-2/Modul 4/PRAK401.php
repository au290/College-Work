<!DOCTYPE html>
<html>
<head>
    <title>PRAK401</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="post">
        Panjang : <input type="text" name="panjang"><br>
        Lebar : <input type="text" name="lebar"><br>
        Nilai : <input type="text" name="nilai"><br>
        <input type="submit" name="button" value="Cetak"><br></br>
    </form>

    <?php
    if (isset($_POST['button'])) {
        $panjang = intval($_POST["panjang"]);
        $lebar = intval($_POST["lebar"]);
        $nilaiString = trim($_POST["nilai"]);
        $nilaiArray = explode(" ", $nilaiString);

        if (count($nilaiArray) != $panjang * $lebar) {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        } else {
            $index = 0;
            echo "<table>";
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $nilaiArray[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
