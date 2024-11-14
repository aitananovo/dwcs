<!DOCTYPE html>
<html>
<head>
 <title>Conexión a bases de datos</title>
 <meta charset=”UTF8”>
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

    th {
        background-color: grey;
        color: white;
    }
 </style>
</head>
<body>

<?php
 
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
        } */

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

        if(isset($_POST['confirmar_eliminacion']) && !empty($_POST['seleccion'])){
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
        }
        
        ?>

            <form method="post">
                <input type="hidden" name="id" value="<?= $id ?? '' ?>">
                Titulo: <input type="text" name="titulo" value="<?= $titulo ?>" required><br>
                Grupo: <input type="text" name="grupo" value="<?= $grupo ?>" required><br>
                Disco: <input type="text" name="disco" value="<?= $disco ?>" required><br>
                Ano: <input type="text" name="ano" value="<?= $ano ?>" required><br>
                Duracion: <input type="text" name="duracion" value="<?= $duracion ?>" required><br>
                <button type="submit" name="gardar" value="<?= $gardarTexto ?>"><?= $gardarTexto ?></button>
            </form>
            <hr>
           
        <?php
        
        ?>

        <h3>Listado de discos</h3>
        <form method="post">
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Grupo</th>
                    <th>Disco</th>
                    <th>Año</th>
                    <th>Duracion</th>
                    <th>Seleccionar</th>
                </tr>

                <?php

                    $resultado = mysqli_query($conexion, "SELECT * FROM disco");
                    while($fila = mysqli_fetch_assoc($resultado)){
                        echo "<tr>
                                <td>{$fila['titulo']}</td>
                                <td>{$fila['grupo']}</td>
                                <td>{$fila['disco']}</td>
                                <td>{$fila['ano']}</td>
                                <td>{$fila['duracion']}</td>
                                <td><input type='checkbox' name='seleccion[]' value='{$fila['id']}'></td>
                              </tr>";
                    }
                ?>
            </table>
            <br>
            <button type="submit" name="confirmar_eliminacion">Eliminar seleccionados</button>
            <button type="submit" name="editar">Modificar seleccionados</button>
            <button type="engadir" name="editar">Engadir disco</button>

        </form>
    <?php                
    } else {
        echo "Fallou a conexión coa base de datos";
    }

    ?>
    <?php
        mysqli_close($conexion); // Pechamos a conexion.
    ?>

</body>
</html>