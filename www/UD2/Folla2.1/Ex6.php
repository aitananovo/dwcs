<!--   Fai un formulario simple que pide o nome e apelidos, que chame a outra páxina chamada
listado.php, na que se mostre os valores do nome e apelidos introducidos no formulario GET.
Lembra que para acceder ás variables pasadas desde un formulario empregamos a variable
$_GET[“nomeDoElemento”]. Por exemplo, se temos un formulario cunha caixa de texto
chamada “direccion”, o seu valor estará na variable $_GET[“direccion”]. -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
   <form action="Listado.php" method="get">

    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" require><br><br>

    <label for="apelido">Apelidos:</label><br>
    <input type="text" id="apelidos" name="apelidos" require><br><br>

    <input type="submit" value="enviar">

   </form>
</body>
</html>