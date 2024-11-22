<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";

try { //CONECTAMOS
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    $pdoStatement=$pdo->prepare("SELECT * FROM cliente ");
    $pdoStatement->execute();
    
    echo "<table><tr><th>Nome</th><th>Apelidos</th></tr>";
    
    while($fila=$pdoStatement->fetch(PDO::FETCH_ASSOC))
    echo "<tr><td>".$fila['nome']." </td><td>".$fila['apelido']."</td></tr>";
    echo "<table>";
    
    } catch(PDOException $e) {
        echo "Erro ao conectar co servidor MySQL: ".$e->getMessage();
    
    }

    $pdo=null;

?>





