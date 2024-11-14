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
 //$conexion=mysqli_connect("localhost","usuario","Password", "proba"); //Co xampp
$conexion=mysqli_connect("dbXdebug","usuario","abc123.", "folla1"); //Co docker de
// clase
    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");

        /*  $inserir_datos = "
        INSERT INTO traxecto (orixe, destino, distancia) VALUES
        ('Barcelona',	'Cádiz',	1152669),
        ('Bilbao',	'Valencia'	,622233),
        ('Madrid',	'Segovia',	90201),
        ('Madrid',	'A Coruña'	,596887),
        ('Oviedo'	,'Badajoz',	682429),
        ('Sevilla',	'Santander'	,832067)";

        if (mysqli_query($conexion, $inserir_datos)) {
           echo "valores insertados correctamente";
        }*/

        $orden = "orixe asc";
        $tipo_orden = "alfabeticamente polo nome da orixe";

        if(isset($_POST['ordenar_orixe_asc'])){
            $orden = "orixe asc";
            $tipo_orden = "alfabeticamente polo nome da orixe";
        } elseif (isset($_POST['ordenar_orixe_desc'])) {
            $orden = "orixe desc";
            $tipo_orden = "alfabeticamente de forma descendente polo nome da orixe";
        } elseif (isset($_POST['ordenar_destino_asc'])) {
            $orden = "destino asc";
            $tipo_orden = "alfabeticamente polo nome do destino";
        } elseif (isset($_POST['ordenar_destino_desc'])) {
            $orden = "destino desc";
            $tipo_orden = "alfabeticamente de forma descendente polo nome do destino";
        } elseif (isset($_POST['ordenar_distancia_asc'])) {
            $orden = "distancia asc";
            $tipo_orden = "pola distancia de menor a maior";
        } elseif (isset($_POST['ordenar_distancia_desc'])) {
            $orden = "distancia desc";
            $tipo_orden = "pola distancia de  maior a menor ";
        } 


        $resultado=mysqli_query($conexion,"SELECT orixe, destino, distancia from traxecto order by $orden");

        echo "<h3>Ordenador por tipo de orden</h3>";
        $traxectos_array = [];

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $traxectos_array[] = $fila;
        }

            echo "<table>
                    <tr>
                        <th>orixe</th>
                        <th>destino</th>
                        <th>distancia (en metros)</th>
                    </tr>";

            foreach ($traxectos_array as $traxecto) {
                echo "<tr>
                        <td>" . $traxecto["orixe"] . "</td>
                        <td>" . $traxecto["destino"] . "</td>
                        <td>" . $traxecto["distancia"] . "</td>
                    </tr>";

            }
        

        echo "</table>";

    } else {
        echo "Fallou a conexión coa base de datos";
    }

    mysqli_close($conexion); // Pechamos a conexion.
?>

    <form method="post" action="exercicio2.php">
    <br><button type="submit" name="ordenar_orixe_asc">ordenar_orixe_asc</button>
        <button type="submit" name="ordenar_orixe_desc">ordenar_orixe_desc</button>
        <button type="submit" name="ordenar_destino_asc">ordenar_destino_asc</button>
        <button type="submit" name="ordenar_destino_desc">ordenar_destino_desc</button>
        <button type="submit" name="ordenar_distancia_asc">ordenar_distancia_asc</button>
        <button type="submit" name="ordenar_distancia_desc">ordenar_distancia_desc</button>
    </form>

</body>
</html>