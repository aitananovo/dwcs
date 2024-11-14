<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Seleciona un botón</h1>
    <hr>
    <form method="post">
        <input type="submit" name="ordenar_de_menor_a_maior" value="Ordenar array polos puntos de menor a maior"><br><br>
        <input type="submit" name="ordenar_de_maior_a_menor" value="Ordenar array polos puntos de maior a menor."><br><br>
        <input type="submit" name="ordenar_alfabeticamente" value="Ordenar array polo nome alfabéticamente"><br><br>
        <input type="submit" name="ordenar_polo_tamaño_do_nome" value="Ordenar array polo tamaño do nome."><br><br>
    </form>
    <hr>
    <?php
        $puntos = array("Aitana"=>123, "Belén"=>14,"Feli"=>3,"Moncho"=>245,"Artur"=>10);

        if (isset($_POST['ordenar_de_menor_a_maior'])) {
           asort($puntos);
           echo "<p> Ordenado de menor a maior </p>";
           foreach ($puntos as $nombre => $punto) {
           echo "$nombre => $punto <br>";
           }

        } elseif (isset($_POST['ordenar_de_maior_a_menor'])) {
            arsort($puntos);
            echo "<p> Ordenado de maior a menor </p>";
            foreach ($puntos as $nombre => $punto) {
                echo "$nombre => $punto <br>";
            }

        } elseif (isset($_POST['ordenar_alfabeticamente'])) {
            ksort($puntos);
            echo "<p> Ordenado alfabéticamente </p>";
            foreach ($puntos as $nombre => $punto) {
                echo "$nombre => $punto <br>";
            }

        }elseif (isset($_POST['ordenar_polo_tamaño_do_nome'])) {
            uksort($puntos, function($a, $b) {
                return strlen($a) - strlen($b);
            });
            echo "<p> Ordenado polo tamaño do nome </p>";
            foreach ($puntos as $nombre => $punto) {
                echo "$nombre => $punto <br>";
            }
            
        }

    ?>
</body>
</html>