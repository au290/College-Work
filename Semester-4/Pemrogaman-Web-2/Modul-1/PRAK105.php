<?php
    $hp = array(
        array("Name" => "Samsung Galaxy S22"),
        array("Name" => "Samsung Galaxy S22 Plus"),
        array("Name" => "Samsung Galaxy A03"),
        array("Name" => "Samsung Galaxy Xcover5")
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table {
            font-family: 'Times New Roman';
            color: #232323;
        }
        table, th, td {
            border: 1px solid;
        }
        th {
            font-size: x-large;
            background-color: red;
            padding: 20px 0px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php foreach ($hp as $i): ?>
    <tr>
        <td><?= $i['Name']?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>