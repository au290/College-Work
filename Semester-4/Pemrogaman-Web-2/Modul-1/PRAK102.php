<?php 
    function volume($jari){
        $phi = 3.14;
        $volume = 4/3 * $phi * $jari * $jari * $jari;
        return $volume;
    }
    $jari = 4.2;
    $result = round(volume($jari),3) . " m3";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=$result ?>
</body>
</html>