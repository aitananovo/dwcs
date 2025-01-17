<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasinal = $_POST['contrasinal'];

    try {
        $pdo = new PDO("mysql:host=db;dbname=empesa;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $usuariosValidos = [
            'Ana' => 'abc123.',
            'Xan' => 'abc123.'
        ];

        if (isset($usuariosValidos[$usuario]) && $usuariosValidos[$usuario] === $contrasinal) {
            $_SESSION['usuario'] = $usuario;
            header("Location: datos.php");
            exit;
        } else {
            $erro = "Usuario ou contrasinal incorrectos.";
        }
    } catch (PDOException $e) {
        $erro = "Erro de conexión: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasinal">Contrasinal:</label>
        <input type="password" id="contrasinal" name="contrasinal" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
