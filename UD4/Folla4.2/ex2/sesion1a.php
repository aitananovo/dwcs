<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <br/>
    <!-- DEFINIMOS UNHA VARIABLE -->
    <?php
        $_SESSION['usuario']="Xan";
    ?>
    <h2>Estou na páxina 1a!! </h2>
  
    <form action="sesion1b.php" method="get">
        <label for="nome">Introduce o nome do usuario:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="contrasinal">Introduce a túa contrasinal:</label>
        <input type="password" id="contrasinal" name="contrasinal" required><br>
        <button type="submit">Enviar</button>
    </form>

    <?php
        if (isset($_SESSION['datos'])) {
            echo "<h3>Datos gardados na sesión:</h3>";
            echo "Nome: " . $_SESSION['datos']['nome'] . "<br>";
            echo "Contrasinal: " . $_SESSION['datos']['contrasinal'] . "<br>";
        }
    ?>

    <br>
    <a href="sesion1b.php">Ir a sesion1b </a>
</body>
</html>
