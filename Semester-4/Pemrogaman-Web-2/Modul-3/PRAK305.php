<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="input_awal">
        <input type="submit" value="Submit" name="button2"><br>
        <?php
        if (isset($_POST['button2'])) {
            $panjang_text = strlen($_POST['input_awal']);
            $array_text = str_split($_POST['input_awal']);
            echo "<h3> Input:</h3>";
            echo $_POST['button2'];
            echo "<h3>Output:</h3>";
            foreach ($array_text as $x){
                for ($i = 0; $i < $panjang_text; $i++){
                    if ($i== 0) {
                        echo strtoupper ($x);
                    }else {
                            echo strtolower($x);
                        }
                    }
                }
            }
        ?>
    </form>
</body>
</html>