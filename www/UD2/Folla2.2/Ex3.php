<!-- Fai unha páxina cun formulario que pida nome, apelidos e idade:deberá quedar centrado e o
ancho das label ser o mesmo. A páxina php que recolle os datos da mesma, fará un distinto saúdo,
dependendo de se a persoa é menor de idade, xubilado (a partir de 65) ou está en idade de
traballar. No saúdo deberán estar o nome e o apelido. -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Días da semana</title>
</head>
<body>
    <form action="Verificar3.php" method="post">
        <label for="dia">Pon un día da semana en número</label>
        <input type="number" id="dia" name="dia" min="1" max="7" require><br><br>

        <input type="submit" value="Enviar">
    </form>


</body>
</html>