<?php
$conexion = new mysqli("dbXdebug", "usuario", "abc123.", "musica");

if ($conexion->connect_error) {
    die("Fallou a conexión coa base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");

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
        $query .= " WHERE Autor = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $filtroAutor);
    } elseif ($filtroAutor == "Outros") {
        $query .= " WHERE Autor NOT IN ('The Beatles', 'The Rolling Stones')";
        $stmt = $conexion->prepare($query);
    } else {
        $stmt = $conexion->prepare($query);
    }
} else {
    $stmt = $conexion->prepare($query);
}

if ($accion == "Titulo" || $accion == "Autor") {
    $query .= " ORDER BY $accion";
}

$stmt->execute();
$resultado = $stmt->get_result();

echo '<div id="contenedor">';
while ($fila = $resultado->fetch_assoc()) {
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

// Manejo de eliminación con consulta preparada
if (isset($_POST['eliminar']) && isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $deleteStmt = $conexion->prepare("DELETE FROM tema WHERE Titulo = ?");
    $deleteStmt->bind_param("s", $titulo);
    $deleteStmt->execute();
    echo "<p>Registro eliminado con éxito.</p>";
    $deleteStmt->close();
}

$stmt->close();
$conexion->close();
?>
