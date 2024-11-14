<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Xestión de Discos</title>
    <style>
        table { width: 60%; margin: 20px auto; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #333; color: #fff; }
        form { text-align: center; margin: 20px; }
    </style>
</head>
<body>

<h2 style="text-align: center;">Xestión de Discos</h2>

<?php
// Conexión á base de datos
$conexion=mysqli_connect("dbXdebug","usuario","abc123.", "folla1"); 

    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");


      /*   $sql = "CREATE TABLE IF NOT EXISTS disco (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255), 
        grupo VARCHAR(255),
        disco VARCHAR(255),
        ano INT,
        duracion INT
        )";

        if (mysqli_query($conexion, $sql)) {
            echo "Tabla creada correctamente";

        } else{
            echo "Error al crear la tabla";

        }

       $inserir_datos = "
        INSERT INTO disco ( titulo, grupo, disco, ano, duracion ) VALUES
        ('Taxman', 'The Beatles' ,'Revolver' ,1966, 169),
        ('Eleanor Rigby', 'The Beatles', 'Revolver', 1966 ,128),
        ('Doctor Robert', 'The Beatles', 'Revolver', 1966 ,135),
        ('Rocks Off', 'The Rolling Stones' , 'Exile on Main Street', 1972 , 271),
        ('Sweet Black Angel', 'The Rolling Stones', 'Exile on Main Street', 1972, 174),
        ('Rip This Joint', 'The Rolling Stones' , 'Exile on Main Street', 1972, 143)";

        if (mysqli_query($conexion, $inserir_datos)) {
           echo "valores insertados correctamente";
        } else {
            echo " Error ao insertar os valores";
        } 
*/

// Procesar engadir ou modificar disco
if (isset($_POST['gardar'])) {
    $titulo = $_POST['titulo'];
    $grupo = $_POST['grupo'];
    $disco = $_POST['disco'];
    $ano = $_POST['ano'];
    $duracion = $_POST['duracion'];

    if ($_POST['gardar'] == 'Engadir') {
        $sql = "INSERT INTO disco (titulo, grupo, disco, ano, duracion) VALUES ('$titulo', '$grupo', '$disco', $ano, $duracion)";
    } elseif ($_POST['gardar'] == 'Modificar' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE disco SET titulo='$titulo', grupo='$grupo', disco='$disco', ano=$ano, duracion=$duracion WHERE id=$id";
    }
    mysqli_query($conexion, $sql);
}

if(isset($_POST['confirmar'])){
    foreach($_POST['seleccion'] as $id){
        mysqli_query($conexion, "DELETE FROM disco WHERE id = $id" );
    }
}

if(isset($_POST['eliminar']) && !empty($_POST['seleccion'])){
    ?>
    <h3>Estás seguro?  Os rexistros seleccionados serán eliminados </h3>
    <form method="post">

    <?php
        foreach ($_POST['seleccion'] as $id){
            echo "<input type='hidden' name='seleccion[]' value='$id'>"; 
        }
    ?>

    <button type="submit" name="confirmar"> confirmar</button>
    <button type="submit" name="cancelar"> cancelar</button>

    </form>

    <?php
    exit();
}

$mostrarFormulario = isset($_POST['engadir']) || (isset($_POST['modificar']) && count($_POST['seleccion']) == 1);
if ($mostrarFormulario) {
    $titulo = $grupo = $disco = $ano = $duracion = "";
    $gardarTexto = "Engadir";

    if (isset($_POST['modificar']) && count($_POST['seleccion']) == 1) {
        $id = $_POST['seleccion'][0];
        $resultado = mysqli_query($conexion, "SELECT * FROM disco WHERE id = $id");
        $discoModificar = mysqli_fetch_assoc($resultado);
        $titulo = $discoModificar['titulo'];
        $grupo = $discoModificar['grupo'];
        $disco = $discoModificar['disco'];
        $ano = $discoModificar['ano'];
        $duracion = $discoModificar['duracion'];
        $gardarTexto = "Modificar";
    }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?? '' ?>">
        <input type="text" name="titulo" placeholder="Título" value="<?= $titulo ?>" required>
        <input type="text" name="grupo" placeholder="Grupo" value="<?= $grupo ?>" required>
        <input type="text" name="disco" placeholder="Disco" value="<?= $disco ?>" required>
        <input type="number" name="ano" placeholder="Ano" value="<?= $ano ?>" required>
        <input type="number" name="duracion" placeholder="Duración" value="<?= $duracion ?>" required>
        <button type="submit" name="gardar" value="<?= $gardarTexto ?>"><?= $gardarTexto ?></button>
    </form>
    <hr>

    <?php
}

// Listado de discos
?>

<form method="post">
    <table>
        <tr>
            <th>Seleccionar</th>
            <th>Título</th>
            <th>Grupo</th>
            <th>Disco</th>
            <th>Ano</th>
            <th>Duración (seg)</th>
        </tr>

        <?php
        $resultado = mysqli_query($conexion, "SELECT * FROM disco");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='seleccion[]' value='{$fila['id']}'></td>";
            echo "<td>{$fila['titulo']}</td>";
            echo "<td>{$fila['grupo']}</td>";
            echo "<td>{$fila['disco']}</td>";
            echo "<td>{$fila['ano']}</td>";
            echo "<td>{$fila['duracion']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <button type="submit" name="eliminar">Eliminar Seleccionados</button>
    <button type="submit" name="modificar">Modificar Seleccionado</button>
    <button type="submit" name="engadir">Engadir Disco</button>
</form>
  <?php
    } else {
        echo "Fallou a conexión coa base de datos";
    }

  
        mysqli_close($conexion); // Pechamos a conexion.
    ?>

</body>
</html>
