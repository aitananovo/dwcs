<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        body{
            text-align: center;
            background-color: green;
            color: white;
        }
        h1, h2{
            margin: 5%;
        }
        table {
            border-collapse: collapse;
            margin: 0 auto;
        }
        td{
            text-align: left;
        }
        th, td {
            border: 1px solid black;
            padding: 1%;
        }

    </style>
</head>
<body>
    <hr>
    <h1>BIBLIOTECA</h1>
    <h2><u>Operacións cos exemplares</u></h2>
    <form method="post">
        <label for="buscarExemplar">Buscar exemplar</label>
        <input type="text" id="buscarExemplar" name="buscarExemplar" required>

        <button type="submit" name="accion" value="buscar">Buscar</button><br><br>
        <button type="submit" name="accion" value="listadoBiblioteca">Ver listado completo da biblioteca</button><br><br>
        <button type="submit" name="accion" value="listadoTitulo">Ver listado completo ordenador polo título</button>
    </form>
    <hr>
    <?php
        $libros = array(
            "El médico" => array("Noah Gordon", "Time Warner"),
            "Marina" => array( "Carlos Ruíz Zafón", "Edebé"),
            "La hogera de la vanidades" => array( "Tom Wolfie", "RBA ediciones"),
            "El libro de las ilusiones" => array( "Michael Mann" , "Faber"),
            "La muerte en Venecia" => array("Michael Mann", "Anaya"),
            "A sangre fría" =>array ("Truman Capote", "Ilusions"),
            "2001: Odisea en el espacio" => array ("Arthur C.Clarke", "P&J"),
        );
        
        if (isset($_POST['accion'])) {
            $accion = $_POST['accion'];
            $resultados = [];

            if($accion == "buscar" ){
                $buscarExemplar = $_POST['buscarExemplar'];
                foreach ($libros as $titulo => $info) {
                    if (strpos($titulo, $buscarExemplar) !== false 
                    || strpos($info[0], $buscarExemplar) !== false 
                    || strpos($info[1], $buscarExemplar) !== false) {
                        $resultados[$titulo] = $info;
                    }
                }
            }

            elseif ($accion == "listadoBiblioteca") {
               $resultados = $libros;
               
            }

            elseif ($accion == "listadoTitulo") {
                $resultados = $libros;
                ksort($resultados);
            }

            if (!empty($resultados)) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Titulo</th>";
                echo "<th>Autor</th>";
                echo "<th>Editorial</th>";
                echo "</tr>";
                echo "<thead>";
                echo "<tbody>";

                foreach ($resultados as $titulo => $info) {
                    echo "<tr>
                            <td>$titulo</td>
                            <td>$info[0]</td>
                            <td>$info[1]</td>
                         </tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "Non se atoparon libros";
            }
        }
    ?>
</body>
</html>