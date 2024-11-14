<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario de Disco</title>
</head>
<body>
    <?php
    $conexion = mysqli_connect("dbXdebug", "usuario", "abc123.", "musica");

    if (!$conexion) {
        echo "Fallou a conexión coa base de datos";
        exit();
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
            $query = "UPDATE tema SET Titulo='$tituloNuevo', Autor='$autorNuevo', Ano=$anoNuevo, Duracion=$duracionNuevo, Imaxe='$imagenNuevo' WHERE Titulo='$titulo'";
        } else {
            $query = "INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) VALUES ('$tituloNuevo', '$autorNuevo', $anoNuevo, $duracionNuevo, '$imagenNuevo')";
        }

        if (mysqli_query($conexion, $query)) {
            echo "<p>Registro guardado con éxito.</p>";
            echo '<form method="get" action="index.php">';
            echo '<button type="submit">Volver al Inicio</button>';
            echo '</form>';
        } else {
            echo "<p>Error al guardar el registro.</p>";
        }

        mysqli_close($conexion);
        exit();
    }
    ?>

    <h2><?= $modo ?> Disco</h2>
    <form method="post">
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" value="<?= $titulo ?>" required><br>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?= $autor ?>" required><br>
        <label for="ano">Año:</label>
        <input type="text" id="ano" name="ano" value="<?= $ano ?>" required><br>
        <label for="duracion">Duración:</label>
        <input type="text" id="duracion" name="duracion" value="<?= $duracion ?>" required><br>
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen" value="<?= $imagen ?>" required><br>
        <button type="submit" name="guardar">Guardar</button>
    </form>
    
    <!-- Botón para volver al inicio fuera del guardado exitoso -->
    <form method="get" action="folla32.php">
        <button type="submit">Volver al Inicio</button>
    </form>
</body>
</html>
