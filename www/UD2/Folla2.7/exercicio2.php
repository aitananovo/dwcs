<?php
    $cadea = $_POST['cadea'];
    $funcion = $_POST['funcion'];

    switch ($funcion) {
        case 'stripSlashes':
            $resultado = stripslashes($cadea);
            break;
        
        case 'urlencode':
            $resultado = urlencode($cadea);
            break;

        case 'urldecode':
            $resultado = urldecode($cadea);
            break;
        
        case 'nl2br':
            $resultado = nl2br($cadea);
            break;

    }

    echo "<p>Cadea orixinal '$cadea' </p><br>";
    echo "<p>Funcion aplicada $funcion </p><br>";
    echo "<p>Resultado '$resultado'</p><br>";
?>