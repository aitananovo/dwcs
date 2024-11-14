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
 </style>
</head>
<body>

<?php
 //$conexion=mysqli_connect("localhost","usuario","Password", "proba"); //Co xampp
$conexion=mysqli_connect("dbXdebug","usuario","abc123.", "folla1"); //Co docker de
// clase
    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");
        echo "<h1> RESULTADOS </h1>";
        $resultado=mysqli_query($conexion,"SELECT id, DNI, nome, apelidos, idade from xogador");

        if ($resultado != FALSE) {
            echo "<table>
                    <tr>
                        <th>id</th>
                        <th>DNI</th>
                        <th>nome</th>
                        <th>apelidos</th>
                        <th>idade</th>
                    </tr>";
            while($fila=mysqli_fetch_array($resultado))
                echo "<tr>
                        <td>" . $fila["id"] . "</td>
                        <td>" . $fila["DNI"] . "</td>
                        <td>" . $fila["nome"] . "</td>
                        <td>" . $fila["apelidos"] . "</td>
                        <td>" . $fila["idade"] . "</td>
                    </tr>";
        }
        echo "</table>";

        // SEGUNDA QUERY

        echo "<h3> Os xogadores con apelidos maiores que “García” </h3>";
        $resultado1=mysqli_query($conexion,"SELECT id, DNI, nome, apelidos, idade from xogador where apelidos > 'garcía'");
        
        if ($resultado1 != FALSE) {
            echo "<table>
                    <tr>
                        <th>id</th>
                        <th>DNI</th>
                        <th>nome</th>
                        <th>apelidos</th>
                        <th>idade</th>
                    </tr>";
            while($fila=mysqli_fetch_array($resultado1))
                echo "<tr>
                        <td>" . $fila["id"] . "</td>
                        <td>" . $fila["DNI"] . "</td>
                        <td>" . $fila["nome"] . "</td>
                        <td>" . $fila["apelidos"] . "</td>
                        <td>" . $fila["idade"] . "</td>
                        </tr>";
        }
        echo "</table>";

        // TERCERA QUERY
        echo "<h3> Os xogadores con idade < 30 </h3>";
        $resultado2=mysqli_query($conexion,"SELECT id, DNI, nome, apelidos, idade from xogador where idade < 30");
        
        if ($resultado2 != FALSE) {
            echo "<table>
                    <tr>
                        <th>id</th>
                        <th>DNI</th>
                        <th>nome</th>
                        <th>apelidos</th>
                        <th>idade</th>
                    </tr>";
            while($fila=mysqli_fetch_array($resultado2))
                echo "<tr>
                        <td>" . $fila["id"] . "</td>
                        <td>" . $fila["DNI"] . "</td>
                        <td>" . $fila["nome"] . "</td>
                        <td>" . $fila["apelidos"] . "</td>
                        <td>" . $fila["idade"] . "</td>
                        </tr>";
        }
        echo "</table>";

        // CUARTA QUERY
        echo "<h3> Conta cantos xogadores teñen máis de 22 anos </h3>";
        $resultado3=mysqli_query($conexion,"SELECT COUNT(*) AS total from xogador where idade > 22");
        
        if ($resultado3 != FALSE) {
            echo "<table>
                    <tr>
                        <th>total</th>
                    </tr>";
            while($fila=mysqli_fetch_array($resultado3))
                echo "<tr>
                        <td>" . $fila["total"] . "</td>
                      </tr>";
        }
        echo "</table>";

    } else {
        echo "Fallou a conexión coa base de datos";
    }

    mysqli_close($conexion); // Pechamos a conexion.
?>
</body>
</html>