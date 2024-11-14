<!DOCTYPE html>
<html>
<head>
 <title>Conexión a bases de datos</title>
 <meta charset=”UTF8”>
</head>
<body>
<?php
//AGORA CREAMOS UN OBXECTO DA CLASE mysqli
// $mysqli= new mysqli("localhost","usuario","Password", "proba"); //En xampp
$mysqli=new mysqli('db','root','root', 'proba'); //Se estou co docker de clase
    if ($mysqli->connect_error) {
        die('Erro de Conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {
        $mysqli->set_charset("utf8");
        $resultado=$mysqli->query("SELECT codCliente,nome,apelidos from cliente");
    
        if ($resultado != FALSE) { 
            while($fila=$resultado->fetch_array())

            echo $fila["codCliente"]," ",$fila["nome"]," ",$fila["apelidos"],"<br>";
        }
    }

$mysqli->close(); // Pechamos a conexion.
?>
</body>
</html>