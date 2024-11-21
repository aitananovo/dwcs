<?php
include 'config.php';

$id_producto = $_GET['id'] ?? null;

if (!$id_producto || !is_numeric($id_producto)) {
    die('Erro: id producto inválido');
}

$conexion = getBDConnection();
if ($conexion->connect_error) {
    die('Erro na conexión á base de datos: ' . $conexion->connect_error);
}


$sql = "SELECT p.id, p.nombre, p.descripcion, p.pvp, f.nombre as familia
        FROM productos p
        JOIN familias f ON p.familia = f.cod
        WHERE p.id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $id_producto); 
$stmt->execute();
$resultado = $stmt->get_result();

$producto = $resultado->fetch_assoc();
$stmt->close();
$conexion->close();

if (!$producto) {
    die('Erro: Produto non atopado');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del producto</title>
</head>
<body>
    <h1>Detalle del producto</h1>
    <div style="border: 1px solid #000; padding: 20px; max-width: 400px; margin: auto;">
        <h2><?= htmlspecialchars($producto['nombre']) ?></h2>
        <p><strong>Familia:</strong> <?= htmlspecialchars($producto['familia']) ?></p>
        <p><strong>Descripcion:</strong> <?= htmlspecialchars($producto['descripcion']) ?> </p>
        <p><strong>Prezo:</strong> <?= number_format($producto['pvp'], 2) ?> €</p>
    </div>
    <a href="produtos.php">Volver a productos</a>
</body>
</html>
