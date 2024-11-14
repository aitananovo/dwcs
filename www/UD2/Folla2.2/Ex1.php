<!-- Fai unha páxina que mostre un formulario de inicio de sesión (usuario e contrasinal), e outra
páxina php que recolla os datos da mesma, e diga se o acceso é permitido ou non (simplemente
con unha mensaxe: Acceso Permitido ou Acceso Non Permitido). Haberá 4 posibles usuarios,
inventados por ti, con un contrasinal diferente cada un. Emprega a función strcmp( ) para
comparar as cadeas: devolve 0 se son iguais, un valor negativo se a primeira cadea vai antes
alfabeticamente que a segunda, e un valor positivo se vai despois.
if (strcmp ($cadea1 , $caden2 ) == 0) { ... //Serán iguais } -->

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="Verificar.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" require><br><br>

        <label for="contrasinal">Contrasinal:</label>
        <input type="text" id="contrasinal" name="contrasinal" require><br><br>

        <input type="submit" value="iniciar sesión">
    </form>


</body>
</html>