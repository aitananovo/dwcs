<!DOCTYPE html>
<html>
<head>
    <style>
        #contenedor {
            width: 70%;
            margin: 20px auto;
            background-color: white;
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 5px; 
        }
        .tema {
            height: auto;
            background-color: white;
            border: 1px black solid;
            text-align: center;
            padding-top: 10px;
            font-family: Arial;
        }
        img {
            width: 130px;
            height: 130px;
        }
        body {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, tr, td {
            border: 1px solid black;
        }
        th {
            background-color: grey;
            color: white;
        }
    </style>
    <meta charset="utf-8" />
    <title>Gestión de Discos</title>
</head>
<body>

<h1>Listado de Temas</h1>

<!-- Botón para abrir página de añadir disco -->
<a href="formulario.php" target="_blank">
    <button type="button">Añadir Disco</button>
</a>

<form method="post">
    <button type="submit" name="accion" value="todos">Lista todos os temas</button>
    <button type="submit" name="accion" value="Titulo">Lista ordenados polo Título</button>
    <button type="submit" name="accion" value="Autor">Lista ordenados polo autor</button>

    <label for="filtro_autor">Lista por autor seleccionado:</label>
    <select name="filtro_autor" id="filtro_autor">
        <option value="The Beatles" <?= isset($_POST['filtro_autor']) && $_POST['filtro_autor'] == "The Beatles" ? "selected" : "" ?>>The Beatles</option>
        <option value="The Rolling Stones" <?= isset($_POST['filtro_autor']) && $_POST['filtro_autor'] == "The Rolling Stones" ? "selected" : "" ?>>The Rolling Stones</option>
        <option value="Outros" <?= isset($_POST['filtro_autor']) && $_POST['filtro_autor'] == "Outros" ? "selected" : "" ?>>Outros</option>
    </select>
    <button type="submit">Filtrar</button>
</form>

<?php
$conexion = mysqli_connect("dbXdebug", "usuario", "abc123.", "musica"); 

if ($conexion) {
    mysqli_set_charset($conexion, "utf8");

    $query = "SELECT * FROM tema";

    $accion = $_POST['accion'] ?? '';
    $filtroAutor = $_POST['filtro_autor'] ?? '';
    
    $mostrarTodos = false;
    if ($accion == "todos") {
        $filtroAutor = "";
        $mostrarTodos = true; 
    } 
    
    if (!$mostrarTodos) {
        if ($filtroAutor == "The Beatles" || $filtroAutor == "The Rolling Stones") {
            $query .= " WHERE Autor = '$filtroAutor'";
        } elseif ($filtroAutor == "Outros") {
            $query .= " WHERE Autor NOT IN ('The Beatles', 'The Rolling Stones')";
        }
    }

    if ($accion == "Titulo" || $accion == "Autor") {
        $query .= " ORDER BY $accion";
    } else {
        $query .= " ORDER BY Titulo";
    }

    $resultado = mysqli_query($conexion, $query);

    echo '<div id="contenedor">';
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $srcImaxe = $fila['Imaxe'] . ".jpg";
        echo "<div class='tema'>";
        echo "<img src='imaxes/$srcImaxe' alt='{$fila['Titulo']}'><br>"; 
        echo "<h3>{$fila['Titulo']}</h3>"; 
        echo "<p>Autor: {$fila['Autor']}</p>"; 
        echo "<p>Año: {$fila['Ano']}</p>"; 
        echo "<p>Duración: {$fila['Duracion']} segundos</p>"; 
        echo "<form method='post' action='formulario.php' target='_blank'>";
        echo "<input type='hidden' name='titulo' value='{$fila['Titulo']}'>";
        echo "<input type='hidden' name='autor' value='{$fila['Autor']}'>";
        echo "<input type='hidden' name='ano' value='{$fila['Ano']}'>";
        echo "<input type='hidden' name='duracion' value='{$fila['Duracion']}'>";
        echo "<input type='hidden' name='imagen' value='{$fila['Imaxe']}'>";
        echo "<button type='submit' name='editar'>Editar</button>";
        echo "</form>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='titulo' value='{$fila['Titulo']}'>";
        echo "<button type='submit' name='eliminar' value='1'>Eliminar</button>";
        echo "</form>";
        echo "</div>";
    }
    echo '</div>';

    // Manejo de eliminación
    if (isset($_POST['eliminar']) && isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        mysqli_query($conexion, "DELETE FROM tema WHERE Titulo = '$titulo'");
        echo "<p>Registro eliminado con éxito.</p>";
    }

} else {
    echo "Fallou a conexión coa base de datos";
}
mysqli_close($conexion);
?>
</body>
</html>
