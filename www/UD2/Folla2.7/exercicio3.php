<?php
    $cadea = $_POST['cadea'];
    $funcion = $_POST['funcion'];

    switch ($funcion) {
        case 'chop':
            $resultado = chop($cadea);
            break;
        
        case 'ltrim':
            $resultado = ltrim($cadea);
            break;

        case 'urldecode':
            $resultado = trim($cadea);
            break;
        
        case 'nl2br':
            $resultado = strip_tags($cadea);
            break;

    }

    echo "<p>Cadea orixinal '$cadea' </p><br>";
    echo "<p>Funcion aplicada $funcion </p><br>";
    echo "<p>Resultado '$resultado'</p><br>";
?>
