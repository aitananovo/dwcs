<!DOCTYPE html>
<html>
<head>
<style>
	#contenedor
	{
		width:70%;
		margin:20px auto;
		background-color:white;
			
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
	}

	.tema
	{
		/* width:200px; */
		height:210px;
		background-color:white;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-family:Arial;
			
	}
	img
	{
	width:130px;
	height:130px;
		
	}
</style>


<meta charset="utf-8" />
<title></title>
</head>
<body>
<article id="contenedor">
<?php

	/* DENTRO DUN BUCLE E DESPOIS DE LER AS VARIABLES DA BASE DE DATOS:
	
	echo "<div class='tema'><img src='imaxes/$srcImaxe'><br>...<br/>
	</div>";
	
	*/

	$conexion=mysqli_connect("dbXdebug","usuario","abc123.", "musica"); 

    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");

		$orden = "titulo";
		$filtroAutor = "";

		if(isset($_POST['ordenar'])){
			$orden = $_POST['ordenar'];
		}

		if(isset($_POST['filtro_autor'])){
			$filtroAutor = $_POST['filtro_autor'];
			if($filtroAutor == "The Beatles" || $filtroAutor == "The Rolling Stones"){
				$query = "SELECT * FROM tema WHERE Autor = '$filtroAutor' ORDER BY $orden";
			} elseif ($filtroAutor == "Outros"){
				$query = "SELECT * FROM tema ORDER BY $orden";
			}
		} else {
			$query = "SELECT * FROM tema ORDER BY $orden";
		}

		$resultado = mysqli_query($conexion, $query);
	
	?>

	<h1>Listado de Temas</h1>
	<form method="post">
		<button type="submit" name="ordenar" value="titulo">Lista todos os temas</button>
		<button type="submit" name="ordenar" value="titulo">Lista ordenados polo Título</button>
		<button type="submit" name="ordenar" value="autor">Lista ordenados polo autor</button>

		<label for="filtro_autor">Lista por autor seleccionado:</label>
		<select name="filtro_autor" id="filtro_autor">
			<option value="The Beatles" <? $filtroAutor == "The Beatles" ? "selected" : "" ?> > The Beatles </option>
			<option value="The Rolling Stones" <? $filtroAutor == "The Rolling Stones" ? "selected" : "" ?> > The Rolling Stones </option>
			<option value="Outros" <? $filtroAutor == "Outros" ? "selected" : "" ?> > Outros </option>
		</select>
		<button type="submit">Filtrar</button>
	</form>
	
	<div id="contenedor">
		<?php
			while($fila = mysqli_fetch_assoc($resultado)){
				$srcImaxe = $fila['imaxes'] . ".jpg";
				echo "<div class='tema'>";
				echo "<img src='imaxes/$scrImaxes' alt='{$fila['Titulo']}'><br>";
				echo "<h3>{$fila['Titulo']}</h3>";
				echo "<p>{$fila['Autor']}</p>";
				echo "<p>{$fila['Ano']}</p>";
				echo "<p>{$fila['Duracion']}</p>";
				echo "</div>";
			}
		?>
	</div>

	<?php

      /*  if (isset($_POST['gardar'])) {
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
    <?php             */   
    } else {
        echo "Fallou a conexión coa base de datos";
    }

    ?>
    <?php
        mysqli_close($conexion); // Pechamos a conexion.
    ?>


?>

<article>
</body>
</html>