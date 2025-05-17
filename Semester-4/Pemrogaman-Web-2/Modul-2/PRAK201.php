<?php

if (isset($_POST['button'])) {
    $data =[
        $input1 = trim($_POST['input1']),
        $input2 = trim($_POST['input2']),
        $input3 = trim($_POST['input3'])
    ];
    $data = array_filter($data);
    sort($data);
    $dlength = count($data);

    for($x = 0; $x < $dlength; $x++) {
    echo $data[$x];
    echo "<br>";
    }
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
        <label>Nama: 1</label>
        <input type="text" name="input1" > <br>
        <label>Nama: 2</label>
        <input type="text" name="input2" > <br>
        <label>Nama: 3</label>   
        <input type="text" name="input3" > <br>
        <input type="submit" value="Urutkan" name="button"> <br>
    </form>
</body>
</html>