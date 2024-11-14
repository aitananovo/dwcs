<!-- 3. Fai unha páxina web que mostre os impares ata 50, indicando o seu número de orden,
empregando un bucle for nun script PHP. Fai que os números sexan títulos h2, e define nun
ficheiro .css que h2 está centrado. Na páxina ten que mostrarse:
O 1º impar é 1
O 2º impar é 3.
O 3º impar é 5.
... -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Bucle impares</title>
    <link rel="stylesheet" href="Ex3.css">

</head>
<body>
<?php

    $contador = 1;
    for ($i=1; $i <= 50; $i +=2) { 
        echo "<h2>", " O ", $contador ,"º impar é ", $i ;
        $contador ++;
        
    }
    
?>
</body>
</html>