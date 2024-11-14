<?php
// Configuración de conexión
$servidor = 'db';
$usuario = 'root';
$passwd = 'root';
$base = 'proba';

// Conectamos a la base de datos usando la clase mysqli
$conexion = new mysqli($servidor, $usuario, $passwd, $base);

// Verificamos si hubo error en la conexión
if ($conexion->connect_error) {
    die('Non é posible conectar coa BD: ' . $conexion->connect_error);
}

// Establecemos el conjunto de caracteres a UTF-8
$conexion->set_charset('utf8');

// Preparamos la sentencia SQL para insertar datos
$sentenciaPrep = $conexion->prepare('INSERT INTO cliente (codCliente, nome, apelidos) VALUES (?, ?, ?)');
if (!$sentenciaPrep) {
    die('Erro na preparación da consulta: ' . $conexion->error);
}

// Damos valores a los parámetros y ejecutamos la primera inserción
$codCliente = 100;
$nome = 'Xan';
$apelidos = 'Fieito';
$sentenciaPrep->bind_param('iss', $codCliente, $nome, $apelidos);
if (!$sentenciaPrep->execute()) {
    echo 'Houbo un erro na execución da consulta';
}

// Ejecutamos la segunda inserción con nuevos valores
$codCliente = 101;
$nome = 'Eva';
$apelidos = 'Loureiro';
$sentenciaPrep->bind_param('iss', $codCliente, $nome, $apelidos);
if (!$sentenciaPrep->execute()) {
    echo 'Houbo un erro na execución da consulta';
}

// Cerramos la sentencia preparada
$sentenciaPrep->close();

// Preparamos la sentencia para seleccionar datos
$sentencia = $conexion->prepare("SELECT * FROM cliente WHERE nome = ?");
if (!$sentencia) {
    die('Erro na preparación da consulta: ' . $conexion->error);
}

// Asignamos el valor al parámetro de la consulta de selección
$nome = "Xan";
$sentencia->bind_param("s", $nome);
$sentencia->execute();

// Obtenemos los resultados
$resultado = $sentencia->get_result();
while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
    echo $fila['codCliente'] . " " . $fila['nome'] . " " . $fila['apelidos'] . "<br>";
}

// Cerramos la sentencia y la conexión
$sentencia->close();
$conexion->close();

?>
