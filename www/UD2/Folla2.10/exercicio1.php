<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightblue;
        }
        img{
            width: 100%;
            

        }
    </style>
</head>
<body>

    <img src="imaxe.jpg" alt="imagen cabecera">

    <form method="post">
        <label for="frase">Introduce frase</label><br>
        <input type="text" id="frase" name="frase" require><br>
        <hr>
        <button name="accion" value="mayuscula"> Pasa a maiúscula a primeira letra </button><br>
        <button name="accion" value="minuscula"> Pasa a minúscula a última letra </button><br>
        <button name="accion" value="elimina_espazos"> Elimina os espazos </button><br>
        <button name="accion" value="elimina_e"> Elimina as letras 'e' </button><br>
        <button name="accion" value="cambia_puntos"> Cambia os puntos por comas </button>
        <br>
        <label for="palabra">Introduce palabra</label><br>
        <input type="text" id="palabra" name="palabra" require><br>

        <button name="accion" value="palabra_frase"> A palabra está na frase? </button><br>
        <button name="accion" value="elimina_palabra"> Elimina a palabra </button><br>
        <button name="accion" value="cambia_tardes"> Cambia 'tardes' por 'noites' </button><br>

    </form>
    <?php
        if (isset($_POST["frase"]) && isset($_POST["accion"])) {
           $frase = $_POST["frase"];
           $accion = $_POST["accion"];
           $palabra = isset($_POST["palabra"]);

           switch ($accion) {
            case 'mayuscula':
                $resultado = ucfirst($frase);
                break;

            case 'minuscula':
                $resultado = lcfirst($frase);
                break;

            case 'elimina_espazos':
                $resultado = str_replace(" ", "", $frase);
                break;

            case 'elimina_e':
                $resultado = str_replace("e", "", $frase);
                break;

            case 'cambia_puntos':
                $resultado = str_replace(".", ",", $frase);
                break;

            case 'palabra_frase':
                $resultado = str_contains($frase, $palabra);
                break;

           case 'elimina_palabra':
                $resultado = str_replace($palabra, "", $frase );
                break;

            case 'cambia_tardes':
                $resultado = str_replace("tardes", "noches", $palabra);
                break;
            
            default:
                echo "Opción no válida";
                break;
           }
           echo "<p class='resultado'>Resultado: $resultado </p>";
        }
    ?>
</body>
</html>