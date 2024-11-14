<!--  Fai un formulario cos seguintes campos: Primeiro número, Segundo número e Operación (unha
desplegable co select con suma, resta e multiplicación). A páxina que recolle os valores do
formulario deberá mostrar un ha liña cos dous números e o resultado da operación. Por exemplo,
se se teclean 2, 5, e “suma”, sairá por pantalla:
A suma sería: 2 + 5 = 7
Debes comprobar que os valores son números. Emprega a función is_numeric(), e se non son
números mostra un erro, en vez do cálculo. -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario calculadora</title>
</head>
<body>
    <form action="Verificar5.php" method="post">
        <label for="primeiro">Primeiro número:</label>
        <input type="number" id="primeiro" name="primeiro" require><br><br>

        <label for="segundo">Segundo número:</label>
        <input type="number" id="segundo" name="segundo" require><br><br>

        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion" require>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicación">Multiplicación</option>
        </select>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>