<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <title>Formulario</title>
</head>
<body>
    <?php
        $vector = array(
            $_POST['num1'],
            $_POST['num2'],
            $_POST['num3'],
            $_POST['num4'],
            $_POST['num5']
        );

        for ($i=0; $i < 5; $i++) { 
            echo "vector[$i] = ". $vector[$i]."<br>";
        }

        $suma = 0;
        $producto = 1;
        $maximo = $vector[0];
        $minimo = $vector[0];

        for ($i=0; $i < 5; $i++) { 
            $suma += $vector[$i];
            $producto *= $vector[$i];
            if ($vector[$i] > $maximo) {
               $maximo = $vector[$i];
            }
            if ($vector[$i] < $minimo) {
                $minimo = $vector[$i];
            }
        }

        echo "<p>Suma: ". $suma . "</p>";
        echo "<p>Producto: ". $producto . "</p>";
        echo "<p>Máximo: ". $maximo . "</p>";
        echo "<p>Mínimo: ". $minimo . "</p>";
    ?>
</body>
</html>