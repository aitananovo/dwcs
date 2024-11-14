<!-- Fai unha páxina cun formulario que pida nome, apelidos e idade:deberá quedar centrado e o
ancho das label ser o mesmo. A páxina php que recolle os datos da mesma, fará un distinto saúdo,
dependendo de se a persoa é menor de idade, xubilado (a partir de 65) ou está en idade de
traballar. No saúdo deberán estar o nome e o apelido. -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="Ex22.css">
</head>
<body>
    <form action="Verificar2.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" require><br><br>

        <label for="apelidos">Apelidos:</label>
        <input type="text" id="apelidos" name="apelidos" require><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" require><br><br>

        <input type="submit" value="Enviar">
    </form>


</body>
</html>