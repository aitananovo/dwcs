<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";

try { //CONECTAMOS
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    if(!empty($_POST["codCliente"]) && !empty( $_POST["nome"] ) && !empty($_POST["apelido"])) {
        $codCliente = $_POST['codCliente'];
        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];

        $pdoStatement = $pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (:codCliente, :nome, :apelido)");
        $pdoStatement->bindParam(":codCliente", $codCliente, PDO::PARAM_INT);
        $pdoStatement->bindParam(":nome", $nome, PDO::PARAM_STR, 250 );
        $pdoStatement->bindParam(":apelido", $apelido, PDO::PARAM_STR, 250 );
        $pdoStatement->execute();

        echo "Cliente insertado correctamente";
        
    } else {
        echo "Erro: completa todos os campos correctamente";
    }
        
} catch(PDOException $e) {
    echo "Erro ao conectar co servidor MySQL: ".$e->getMessage();
}

$pdo=null;

?>