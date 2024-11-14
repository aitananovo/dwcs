<!--  Mostra a táboa de multiplicar do 7. Fai unha táboa similar á do exercicio anterior que teña
como nome das columnas Número (será sempre o 7), Multiplicando, Resultado.
... -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Bucle impares</title>
    <link rel="stylesheet" href="Ex4.css">

</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Multiplicando</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $numero = 7;
            for ($i=0; $i <= 10; $i++) { 
                $resultado = $numero * $i;
                echo "<tr>";
                echo "<td> $numero </td>";
                echo "<td> $i </td>";
                echo "<td> $resultado </td>";
                echo "</tr>";
            }
            
        ?>
        </tbody>
    </table>

</body>
</html>