<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";

try { //CONECTAMOS
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
        //1. INSERCIÓN USANDO MARCADORES ANÓNIMOS
        $pdoStatement=$pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (?, ?, ?)");
        $codCliente1 = 201;
        $nome = "Pepe";
        $apelido1 = "Martinez";
        $pdoStatement ->bindParam(1, $codCliente1);
        $pdoStatement ->bindParam(2, $nome);
        $pdoStatement ->bindParam(3, $apelido1);
        $pdoStatement->execute();

        
        //2. INSERCIÓN USANDO MARCADORES COÑECIDOS
        $pdoStatement=$pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (:codCliente,:nome,:apelido)");
        $codCliente2 = 105;
        $nome2 = "Carla";
        $apelido2 = "Vila";
        $pdoStatement->bindParam(':codCliente', $codCliente2, PDO::PARAM_INT);
        $pdoStatement->bindParam(':nome', $nome2, PDO::PARAM_STR, 250);
        $pdoStatement->bindParam(':apelido', $apelido2, PDO::PARAM_STR, 250);
        $pdoStatement->execute();


        //3. INSERCIÓN USANDO ARRAYS
        $pdoStatement=$pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (:codCliente,:nome,:apelido)");
        $datosCliente = array(
            'codCliente' => 203,
            'nome' => 'Sandra',
            'apelido' => 'Fernandez'
        );
        $pdoStatement->execute($datosCliente);

        echo'Insercción completada.';

    } catch(PDOException $e) {
        echo "Erro ao conectar co servidor MySQL: ".$e->getMessage();
    }
    
    $pdo=null;

?>