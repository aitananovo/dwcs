<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <title>Táboa periódica dos elementos</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <hr>
    <h1>Táboa Periódica dos Elementos</h1>
    <hr>
    <br>
    <?php
        $elementos = array(
            "alcalinos" => array(
                "Li" => 3,
                "Na" => 11,
                "K" => 19,
                "Rb" => 37,
                "Cs" => 55,
                "Fr" => 87
            ),

            "alcalino-terreos" => array(
                "Be" => 4,
                "Mg" => 12,
                "Ca" => 20,
                "Sr" => 38,
                "Ba" => 56,
                "Ra" => 88
            ),

            "terreos" => array(
                "B" => 5,
                "Al" => 13,
                "Ga" => 31,
                "In" => 49,
                "Tl" => 81
            )
        );


        if (isset($_GET['grupo'])) {
            $grupo_seleccionado = $_GET['grupo'];

            if(isset($grupo_seleccionado, $elementos)){

                echo "O grupo <b>'" . $grupo_seleccionado . "'</b> está formado polos seguintes elementos: ";

                echo "<table>";
                echo "<tr>";
                echo "<th> Nombre </th>";
                echo "<th> Nº atómico </th>";
                echo "</tr>";

                    foreach ($elementos[$grupo_seleccionado] as $nombre => $atomico) {
                        echo "<tr>";
                        echo "<td>" . $nombre . "</td>";
                        echo "<td>" . $atomico . "</td>";
                        echo "</tr>";
                    }

                echo "</table>";
            } else {
                echo "Grupo non válido";
            }
        } else {
            echo "Non seleccionou ningún grupo";
        }
    ?>

   <a href="Exercicio1.html"><-Volver atrás</a> 
</body>
</html>