<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";

try { //CONECTAMOS
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
        //PREPARAMOS A SENTENCIA:
        $pdoStatement=$pdo->prepare("SELECT * FROM cliente ");
        $pdoStatement->execute();

        // SE NON TEMOS PARÁMETROS PODERÍAMOS RESUMIR AS 2 LIÑAS ANTERIORES EN:
        // $pdoStatement=$pdo->query("SELECT * FROM cliente ");
        echo "<table><tr><th>Nome</th><th>Apelidos</th></tr>";

    while($fila=$pdoStatement->fetch(PDO::FETCH_ASSOC) )
        echo "<tr><td>".$fila['nome']." </td><td>".$fila['apelido']."</td></tr>";
        echo "<table>";

    } catch(PDOException $e) {
        echo "Erro ao conectar co servidor MySQL: ".$e->getMessage();
    }
    
    $pdo=null;

?>