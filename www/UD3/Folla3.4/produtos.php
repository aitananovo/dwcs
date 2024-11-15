<?php
include 'config.php';

$filtroFamilia = $_GET['familia'] ?? 'todos';
$busqueda = $_GET['busqueda'] ?? '';

$conexion = getBDConnection();
if ($conexion->connect_error) {
    die('Erro na conexión á base de datos: ' . $conexion->connect_error);
}

$sql = "SELECT id, nombre, LEFT(descripcion, 100) AS descripcion_corta FROM productos";
$conditions = [];
$params = [];
$types = "";

if($filtroFamilia !== 'todos'){
    $conditions[] = "familia = ?";
    $params[] = $filtroFamilia;
    $types .= "i";
}

if($busqueda){
    $conditions[] = "nombre LIKE ?";
    $params[] = "%" . $busqueda . "%";
    $types .= "s";
}

if(!empty($conditions)){
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$stmt = $conexion-> prepare($sql);

if($types) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$resultado = $stmt->get_result();

$productos = $resultado->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conexion->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        text-align: center;
    }

    table {
        border-collapse: collapse;
        margin: 0 auto;
    }

    th, tr, td {
        border: 1px solid black;
    }
    </style>
</head>
<body>
    <h1>Lista de productos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>descripcion</th>
            <th>Detalle</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= htmlspecialchars($producto['nombre']) ?></td>
            <td><?= htmlspecialchars($producto['descripcion_corta']) ?>...</td>
            <td><a href="detalle.php ? id=<?= $producto['id'] ?>">Ver detalle</a></td>
        </tr>  
        <?php endforeach; ?>  
    </table>
    <a href="inicio.php">Volver</a>
</body>
</html>
