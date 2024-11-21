<?php
    include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edicion de productos e familias</h1>
    <h2>Productos</h2>
    <form action="" method="post">
        <input type="hidden" name="accion" value="crearProducto">
        <input type="text" name="nombre" placeholder="Nome do producto" required>
        <textarea name="descripcion" placeholder="Descripcion" required></textarea>
        <input type="number" name="precio" placeholder="Prezo" required>
        <select name="familia">
            <?php foreach($familias as $familia): ?>
                <option value=" <?= $familia['cod'] ?>"><?= htmlspecialchars($familia['nombre']) ?></option>
            <?php endforeach; ?>    
        </select>
        <button type="submit"> Crear producto</button>
    </form>

    <h2>Familias</h2>
    <form action="" method="post">
        <input type="hidden" name="accion" value="crearFamilia">
        <input type="text" name="nombre" placeholder="Nome da familia" required>
        <button type="submit"> Crear familia</button>
    </form>

    <a href="inicio.php">volver ao inicio</a>
</body>
</html>