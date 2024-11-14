<!-- Modifica o anterior exercicio para que saia unha táboa (dálle un estilo cun estilo.css), con título
para as columnas: Orden, Número:
Orden Impar
1 1
2 3
3 5
...
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
                <th>Orde</th>
                <th>Impar</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $contador = 1;
            for ($i=1; $i <= 50; $i +=2) { 
                echo "<tr>";
                echo "<td> $contador </td>";
                echo "<td> $i </td>";
                echo "</tr>";
                $contador ++;
                
            }
            
        ?>
        </tbody>
    </table>

</body>
</html>