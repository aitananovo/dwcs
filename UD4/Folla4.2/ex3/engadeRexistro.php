<?php
session_start();

if ($_SESSION['usuario'] !== 'Ana') {
    die("Acceso non autorizado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO("mysql:host=db;dbname=empesa;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $numero = $_POST['numero'];
        $nome = $_POST['nome'];
        $empregado = $_POST['empregado'];
        $credito = $_POST['credito'];

        $query = "INSERT INTO cliente (numero, nome, num_empregado_asignado, limite_de_credito) VALUES (?, ?, ?, ?)";
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->execute([$numero, $nome, $empregado, $credito]);

        header("Location: datos.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao engadir rexistro: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Engadir Rexistro</title>
</head>
<body>
    <h2>Engadir Rexistro</h2>
    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST" action="">
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="empregado">Empregado Asignado:</label>
        <input type="text" id="empregado" name="empregado"><br>
        <label for="credito">Limite de Crédito:</label>
        <input type="text" id="credito" name="credito"><br>
        <button type="submit">Engadir</button>
    </form>
</body>
</html>
