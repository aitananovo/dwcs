<!--  Fai un formulario cos seguintes campos: Primeiro número, Segundo número, Terceiro número.
A páxina que recolle os valores deberá mostrar o valor do maior e do menor. Emprega a función
is_numeric( ) de novo para comprobar que os valores son numéricos.. -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario calculadora 2</title>
</head>
<body>
    <form action="Verificar6.php" method="post">
        <label for="primeiro">Primeiro número:</label>
        <input type="number" id="primeiro" name="primeiro" require><br><br>

        <label for="segundo">Segundo número:</label>
        <input type="number" id="segundo" name="segundo" require><br><br>

        <label for="terceiro">Terceiro número:</label>
        <input type="number" id="terceiro" name="terceiro" require><br><br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>