<?php
$conexion = new mysqli("dbXdebug", "usuario", "abc123.", "musica");

if ($conexion->connect_error) {
    die("Fallou a conexión coa base de datos: " . $conexion->connect_error);
}

$titulo = $_POST['titulo'] ?? '';
$autor = $_POST['autor'] ?? '';
$ano = $_POST['ano'] ?? '';
$duracion = $_POST['duracion'] ?? '';
$imagen = $_POST['imagen'] ?? '';
$modo = isset($_POST['editar']) ? 'Editar' : 'Añadir';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $tituloNuevo = $_POST['titulo'];
    $autorNuevo = $_POST['autor'];
    $anoNuevo = $_POST['ano'];
    $duracionNuevo = $_POST['duracion'];
    $imagenNuevo = $_POST['imagen'];

    if ($modo === 'Editar' && !empty($titulo)) {
        // Consulta preparada para actualizar
        $stmt = $conexion->prepare("UPDATE tema SET Titulo = ?, Autor = ?, Ano = ?, Duracion = ?, Imaxe = ? WHERE Titulo = ?");
        $stmt->bind_param("ssis", $tituloNuevo, $autorNuevo, $anoNuevo, $duracionNuevo, $imagenNuevo, $titulo);
    } else {
        // Consulta preparada para insertar
        $stmt = $conexion->prepare("INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $tituloNuevo, $autorNuevo, $anoNuevo, $duracionNuevo, $imagenNuevo);
    }

    if ($stmt->execute()) {
        echo "<p>Registro guardado con éxito.</p>";
        echo '<form method="get" action="index.php">';
        echo '<button type="submit">Volver al Inicio</button>';
        echo '</form>';
    } else {
        echo "<p>Error al guardar el registro.</p>";
    }

    $stmt->close();
    $conexion->close();
    exit();
}
?>
