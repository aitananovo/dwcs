<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <title>Táboa viaxes</title>
    <link rel="stylesheet" href="styles24.css">
</head>
<body>
    <?php
        $viaxes = array(
            array("Madrid", "Segovia", 90201),
            array("Madrid", "A Coruña", 596887),
            array("Barcelona", "Cádiz", 1152669),
            array("Bilbao", "Valencia", 622233),
            array("Sevilla", "Santander", 832067),
            array("Oviedo", "Badajoz", 682429)
        );

        $orixe = "";
        $destino = "";
        $distancia = 0;

        for ($i = 0; $i < count($viaxes); $i++) {
            if ($viaxes[$i][2] > $distancia ) {
               $distancia = $viaxes[$i][2];
               $destino = $viaxes[$i][1];
               $orixe = $viaxes[$i][0];
            }
        }
    ?>

    <h2>Viaxe</h2>
    <table>
        <thead>
            <tr>
                <th>Orixe</th>
                <th>Destino</th>
                <th>Distancia(km)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i < count($viaxes) ; $i++) { 
                    echo "<tr>";
                    echo "<td>" . $viaxes[$i][0] . "</td>";
                    echo "<td>" . $viaxes[$i][1] . "</td>";
                    echo "<td>" . $viaxes[$i][2] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php echo "<p> O traxecto mais longo é o de $orixe a $destino con $distancia kms </p>" ?>
</body>
</html>