<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listado de datos</title>
</head>
<body>
   <?php
        $_GET['nome'];
        $_GET['apelidos'];
        
        echo "<p>Nome: " . $_GET['nome']. "</p>";
        echo "<p>Apelidos: " . $_GET['apelidos']. "</p>";
   ?>
</body>
</html>