<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Bucle saúdo</title>
    <link rel="stylesheet" href="Ex1.css">

</head>
<body>
<?php

/* 1. Fai unha páxina web que saúde 10 veces co saúdo que che guste, empregando un bucle for
nun script PHP. Fai que eses saúdos sexan títulos h2, e define nun ficheiro .css que h2 está
centrado. */

    $saudo="Ola!";

    for ($i=0; $i < 10; $i++) { 
        
        echo "<h2>", $saudo ;
    }
    
?>
</body>
</html>