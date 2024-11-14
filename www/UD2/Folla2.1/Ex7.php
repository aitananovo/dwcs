<!-- Fai unha páxina que recolla e mostre a información NUNHA TÁBOA con columnas
Nome_Elemento, ValorElemento, enviada desde o formulario da imaxe “formulario
artista.gif”. Envía a información empregando o método $_GET -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
   <form action="Listado.php" method="get">

    <label for="nomeEApelidos">Nome e apelidos:</label>
    <input type="text" id="nomeEApelidos" name="nomeEApelidos"><br><br>

    <label for="email">E-mail:</label>
    <input type="text" id="email" name="email" ><br><br>

    <label for="experiencia">Experiencia:</label>
    <input type="checkbox" id="musico" name="musico" value="musico">
    <label for="musico"> musico</label>
    <input type="checkbox" id="comico" name="comico" value="comico">
    <label for="comico"> comico</label>
    <input type="checkbox" id="actor" name="actor" value="actor">
    <label for="actor"> actor</label><br><br>

    <label for="idade">Indica a túa idade:</label>
    <input type="vinte" id="html" name="fav_language" value="HTML">
    <label for="html">HTML</label><br>
    <input type="cuarenta" id="css" name="fav_language" value="CSS">
    <label for="css">CSS</label><br><br>

    <label for="atopar">Como atopaches a páxina:</label>
    <select id="atopar" name="atopar">
        <option value="casualidade">de casualidade</option>
        <option value="google">polo Google</option>
        <option value="coñecida">é coñecida da familia</option>
    </select><br><br>

    <label for="comentarios">Os teus comentarios:</label><br>
    <textarea name="mensaxe" rows="6" cols="40"></textarea><br><br>

    <input type="submit" value="Enviar">
    <input type="submit" value="Borrar">

   </form>
</body>
</html>