<!-- Fai unha páxina web que conte ata 50, empregando un bucle for nun script PHP. Fai que os
números sexan títulos h2, e define nun ficheiro .css que h2 está aliñado á esquerda. -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Bucle saúdo</title>
    <link rel="stylesheet" href="Ex2.css">

</head>
<body>
<?php


    for ($i=1; $i <= 50; $i++) { 
        
        echo "<h2>", $i ;
    }
    
?>
</body>
</html>