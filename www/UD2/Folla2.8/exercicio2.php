<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenamento de arrays en PHP</title>
    <style>
        body{
            text-align: center;
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
        th{
            background-color: black;
            color: yellow;
        }
        h2 {
           text-align: center;
        }
    </style>
</head>
<body>
    <h2><u>Ordenamento de arrays en PHP</u></h2>
    <?php
        $puntos = array("Ana"=>123, "Belén"=>14, "Felipe"=>3, "Moncho"=>245, "Artur"=>10);

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Explicación do que fai</th>";
        echo "<th>Exemplo</th>";
        echo "<th>Mostra por pantalla</th>";
        echo "</tr>";
        echo "<thead>";
        echo "<tbody>";
        
        $copia = $puntos;
        sort($copia);
        echo "<tr><td>sort()</td> 
                  <td>Ordena os valores do array sen manter a asociación de índices:</td>
                  <td>";
        foreach ($copia as $valor) {
            echo $valor . " ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        rsort($copia);
        echo "<tr><td>rsort()</td> 
                  <td>Ordena os valores inversamente o array sen manter a asociación de índices:</td>
                  <td>";
        foreach ($copia as $valor) {
            echo $valor . " ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        asort($copia);
        echo "<tr><td>asort()</td> 
                  <td>Ordena os valores do array mantendo a asociación de índices. O array quedará:</td>
                  <td>";
        foreach ($copia as $clave => $valor) {
            echo "$clave => $valor, ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        arsort($copia);
        echo "<tr><td>arsort()</td> 
                  <td>Ordena os valores do array inversamente mantendo a asociación de índices:</td>
                  <td>";
        foreach ($copia as $clave => $valor) {
            echo "$clave => $valor, ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        ksort($copia);
        echo "<tr><td>ksort()</td> 
                  <td>Ordena o array polas claves mantendo a asociación de índices:</td>
                  <td>";
        foreach ($copia as $clave => $valor) {
            echo "$clave => $valor, ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        krsort($copia);
        echo "<tr><td>ksort()</td> 
                  <td>: Ordena polas claves en orde inversa mantendo a asociación de índices:</td>
                  <td>";
        foreach ($copia as $clave => $valor) {
            echo "$clave => $valor, ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        shuffle($copia);
        echo "<tr><td>shuffle()</td> 
                  <td>Desordena de xeito aleatorio o array sen manter a asociación de índices</td>
                  <td>";
        foreach ($copia as $valor) {
            echo $valor . " ";
        }
        echo "</td></tr>";

        $copia = $puntos;
        array_reverse($copia);
        echo "<tr><td>array_reverse()</td> 
                  <td>Devolve un NOVO array a partir do orixinal mantendo a asociación de claves:</td>
                  <td>";
        foreach ($copia as $clave => $valor) {
            echo "$clave => $valor, ";
        }
        echo "</td></tr>";

        echo "</tbody>";
        echo "</table>";

    ?>
</body>
</html>