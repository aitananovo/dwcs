<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
        table{
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td, tr{
            border: 1px solid black;
        }
        
    </style>

</head>
<body>
    <?php
        $distancias = array (
            array( "Madrid", "Segovia", 90201),
            array( "Madrid", "A coruña", 596887),
            array( "Barcelona", "Cádiz", 1152669),
            array( "Bilbao", "Valencia", 622233),
            array( "Sevilla", "Santander", 832067),
            array( "Oviedo", "Badajoz", 682429),
        );

        function compararOrixeAsc($a, $b){
            return strcmp($a[0], $b[0]);
        }

        function compararOrixeDesc($a, $b){
            return strcmp($b[0], $a[0]);
        }

        function compararDestinoAsc($a, $b){
            return strcmp($a[1], $b[1]);
        }

        function compararDestinoDesc($a, $b){
            return strcmp($b[1], $a[1]);
        }

        function compararDistanciaAsc($a, $b){
            return $a[2] <=> $b[2];
        }

        function compararDistanciaDesc($a, $b){
            return $b[2] <=> $a[2];
        }

        if (isset($_POST['orden'])) {
           $orden = $_POST['orden'];

           if($orden == 'orixeAsc'){
            usort($distancias, 'compararOrixeAsc');

           } elseif ($orden == 'orixeDesc'){
            usort($distancias, 'compararOrixeDesc');

           } elseif ($orden == 'destinoAsc'){
            usort($distancias, 'compararDestinoAsc');

           } elseif ($orden == 'destinoDesc'){
            usort($distancias, 'compararDestinoDesc');

           } elseif ($orden == 'distanciaAsc'){
            usort($distancias, 'compararDistanciaAsc');

           } elseif ($orden == 'distanciaDesc'){
            usort($distancias, 'compararDistanciaDesc');
           }
        }
    ?>

    <form method="post">
        <input type="submit" name="orden" value="orixeAsc" /><br> Ordenar polo nome da orixe alfabéticamente <br>
        <input type="submit" name="orden" value="orixeDesc" /><br> Ordenar polo nome da orixe NO alfabéticamente <br>
        <input type="submit" name="orden" value="destinoAsc" /> <br>Ordenar polo nome do destino alfabéticamente <br>
        <input type="submit" name="orden" value="destinoDesc" /> <br>Ordenar polo nome do destino NO alfabéticamente <br>
        <input type="submit" name="orden" value="distanciaAsc" /> <br>Ordenar pola distancia alfabéticamente <br>
        <input type="submit" name="orden" value="distanciaDesc" /> <br>Ordenar pola distancia NO alfabéticamente <br>
    </form>

    <h1><u>Distancias ordenadas</u></h1>
        
    <table>
        <thead>
            <tr>
                <th>Orixe</th>
                <th>Destino</th>
                <th>Distancia</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($distancias as $viaxe): ?>
            <tr>
                <td> <?php echo $viaxe[0]; ?> </td>
                <td> <?php echo $viaxe[1]; ?> </td>
                <td> <?php echo $viaxe[2]; ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>