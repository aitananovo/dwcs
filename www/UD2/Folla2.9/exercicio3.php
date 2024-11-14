<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function compararClaves($a, $b){
            return strcmp($a, $b);
        }

        $datos=array('f'=>4, 'g'=>8, 'a'=>-1, 'b'=>-10);
        uksort($datos, 'compararClaves');

        foreach ($datos as $key => $value) {
            echo "$key => $value <br>";
        }
    ?>
</body>
</html>