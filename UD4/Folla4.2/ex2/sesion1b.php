<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<br/>
<?php

    if (isset($_GET['nome']) && isset($_GET['contrasinal'])) {
        $datos = array(
            "nome" => $_GET['nome'],
            "contrasinal" => $_GET['contrasinal']
        );

        $_SESSION['datos'] = $datos;

        echo "<h3>Datos recibidos:</h3>";
        echo "Nome: " .$_SESSION['datos']['nome'] . "<br>";
        echo "Contrasinal: " .$_SESSION['datos']['contrasinal']. "<br>";
    } else {
        echo "<p>Non se recibiron os datos do formulario</p>";
    }
?>
<h2>Estou na páxina 1b!! </h2>
<a href="sesion1a.php">Ir a sesion1a</a>
<br>
</body>
</html>

