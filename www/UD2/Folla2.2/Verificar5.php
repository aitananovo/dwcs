<?php

    $primeiro = $_POST['primeiro'];
    $segundo = $_POST['segundo'];
    $operacion = $_POST['operacion'];

    if (is_numeric($primeiro) && is_numeric($segundo)) {
        if (strcmp($operacion, "suma") == 0){
            $resultado = $primeiro + $segundo;
            echo "A suma sería $primeiro + $segundo = $resultado";
        } elseif (strcmp($operacion, "resta") == 0){
            $resultado = $primeiro - $segundo;
            echo "A resta sería $primeiro - $segundo = $resultado";
        } elseif (strcmp($operacion, "multiplicación") == 0){
            $resultado = $primeiro * $segundo;
            echo "A multiplicación sería $primeiro * $segundo = $resultado";    
    } else {
        echo "ERROR! TEN QUE SER UN NÚMERO";
    }
}
   
?>