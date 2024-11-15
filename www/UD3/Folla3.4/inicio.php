<?php
include 'config.php';

$conexion = getBDConnection();

if ($conexion->connect_error) {
    die('Erro na conexión á base de datos: ' . $conexion->connect_error);
}

$stmt = $conexion->prepare("SELECT cod, nombre FROM familias");

$stmt->execute();

$resultado = $stmt->get_result();

$familias = $resultado->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>
    <h1>Benvido á Tenda Informática</h1>
    <form action="produtos.php" method="get">
        <label for="familia">Selecciona unha familia:</label>
        <select name="familia" id="familia">
            <option value="todos">Todos</option>
            <?php foreach ($familias as $familia): ?>
                <option value="<?= $familia['cod'] ?>"><?= htmlspecialchars($familia['nombre']) ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="busqueda">Buscar produtos:</label>
        <input type="text" name="busqueda" id="busqueda">
        
        <button type="submit">Consultar</button>
        <a href="edicion.php">Ir a Edición</a>
    </form>
</body>
</html>