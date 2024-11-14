<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function maiorAmenor($a,$b) {
            if($a>$b){
                return -1;
            } elseif ($a<$b) {
                return 1;
            } else
                return 0;
        }

        $datos=array('f'=>4, 'g'=>8, 'a'=>-1, 'b'=> -10);
        uasort($datos, 'maiorAmenor'); 

        foreach ($datos as $key => $value) {
            echo "$key => $value <br>";
        }
    ?>
</body>
</html>