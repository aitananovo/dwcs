<!--  Fai unha páxina web con unha táboa na que se mostre a seguinte táboa, ata 100 rexistros. Cada
rexistro impar terá un fondo distinto. Emprega clases para darlle formato con CSS: -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTable</title>
    <link rel="stylesheet" href="Ex72.css">
</head>
<body>
    <table>
        <thead>
            <tr><link rel="stylesheet" href="Ex22.css">
                <th>Día</th>
                <th>Saúdo</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for($dia = 1; $dia <= 100; $dia++){
                    if($dia % 2 == 0){
                        $clase = 'par';
                        $saudo = 'Boas tardes';
                    } else {
                        $clase = 'impar';
                        $saudo = 'Bos dias';
                    }

                    echo "<tr class= $clase>";
                    echo "<td>$dia</td>";
                    echo "<td>$saudo</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        <tbody>

        </tbody>
    </table>
</body>
</html>