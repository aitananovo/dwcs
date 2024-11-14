<?php

$servidor = 'db';
$usuario = 'root';
$passwd = 'root';
$base = 'proba';

$conexion = new mysqli($servidor, $usuario, $passwd, $base);

if ($conexion->connect_error) {
    die('Non é posible conectar coa BD: ' . $conexion->connect_error);
}

$conexion->set_charset('utf8');

if (isset($_POST['nome']) && isset($_POST['apelidos'])) {

    $nome = $_POST['nome'];
    $apelidos = $_POST['apelidos'];

    $sentencia = $conexion->prepare("SELECT * FROM cliente WHERE nome = ? AND apelidos = ?");
    if (!$sentencia) {
        die('Erro na preparación da consulta: ' . $conexion->error);
    }

    $sentencia->bind_param("ss", $nome, $apelidos);
    $sentencia->execute();

    $resultado = $sentencia->get_result();
    while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
        echo $fila['codCliente'] . " " . $fila['nome'] . " " . $fila['apelidos'] . "<br>";
    }

    $sentencia->close();
} else {
    echo "Non se proporcionaron nome e apelidos.";
}

$conexion->close();
?>
