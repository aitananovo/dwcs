<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0 auto;

        }
        table{
            border-collapse:collapse ;
            margin: 0 auto;
            width: 150%;
        }

        th, td{
            border: 1px solid black;
        }

        th{
            background-color: black;
            color: yellow;
        }


    </style>
</head>
<body>
    <?php
        $cadea = "Hoxe estamos nun 'día de outono' chove, chove!!";

        $funciones = [
            [
                "nombre" => "strlen",
                "explicacion" => "devolve o número de caracteres da cadea",
                "exemplo" => strlen($cadea)
            ],
            [
                "nombre" => "substr",
                "explicacion" => ": Devolve unha subcadea, empezando polo comezo e de lonxitude lonxitude.",
                "exemplo" =>  substr($cadea, 0, 10)
            ],
            [
                "nombre" => "strsts",
                "explicacion" => "devolve a cadea desde a primeira aparición da cadea busca",
                "exemplo" =>  strstr($cadea, 'día')
            ],
            [
                "nombre" => "strchr",
                "explicacion" => "idéntica á anterior, pero a primeira aparición da letra",
                "exemplo" =>  strchr($cadea, 'd')
            ],
            [
                "nombre" => "strrchr",
                "explicacion" => "devolve a cadea desde a última aparición do carácter ",
                "exemplo" =>  strrchr($cadea, 'e')
            ],
            [
                "nombre" => "strpos",
                "explicacion" => "devolve a posición numérica da primeira aparición. ",
                "exemplo" =>  strpos($cadea, 'outono')
            ],
            [
                "nombre" => "str_replace",
                "explicacion" => "substitúe as aparicións da cadea buscada na cadea orixinal pola substituída.",
                "exemplo" =>  str_replace('chove', 'sol', $cadea)
            ],
            [
                "nombre" => "trim",
                "explicacion" => "elimina os espazos á esquerda e dereita da cadea.",
                "exemplo" => trim("      $cadea      ")
            ],
            [
                "nombre" => "ucfirst",
                "explicacion" => " a maiúsculas o primeiro carácter da cadea.",
                "exemplo" => ucfirst($cadea)
            ],
            [
                "nombre" => "strcmp",
                "explicacion" => "devolve un enteiro. Devolve < 0 se str1 é vai antes alfabeticamente que str2; >0 se str2 vai antes alfabeticamente que str1, 0 se son iguais.",
                "exemplo" => strcmp($cadea, "cadea de exemplo")
            ],
            [
                "nombre" => "urlencode",
                "explicacion" => "devolve unha cadea codificada para pasar variables a unha páxina php",
                "exemplo" => urlencode($cadea)
            ],
            [
                "nombre" => "urlecode",
                "explicacion" => "decodifica calquera cifrado %## dunha cadea dada (suponse que foi previamente codificada para ser pasada a outra páxina php).",
                "exemplo" => urldecode(urlencode($cadea)),
            ],
            [
                "nombre" => "mb_strlen",
                "explicacion" => "devuleve el número de caracteres de una cadea multibyte",
                "exemplo" => mb_strlen($cadea)
            ]

        ];

        echo "<table>";
        echo "<thead>";
        echo "<tr><th>Nome da función</th>";
        echo "<th>Explicación</th>";
        echo "<th>Exemplo</th></tr>";
        echo "</thead>";
        echo "<tbody";
        foreach ($funciones as $funcion) {
            echo "<tr>
                  <td>{$funcion['nombre']}</td>
                  <td>{$funcion['explicacion']}</td>
                  <td>{$funcion['exemplo']}</td>
                  </tr>";
        }
        echo "<tbody";
        echo  "</table>";
    ?>
</body>
</html>