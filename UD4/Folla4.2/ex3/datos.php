<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    header("HTTP/1.1 403 Forbidden");
    echo "Acceso non autorizado. Por favor, <a href='login.php'>inicie sesión</a>.";
    exit();
}

try {
    $pdo = new PDO("mysql:host=db;dbname=empesa;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $orden = $_GET['orden'] ?? null;
    $query = "SELECT * FROM cliente";

    if ($orden === 'nome') {
        $query = "SELECT * FROM cliente ORDER BY nome";
    } elseif ($orden === 'empregado') {
        $query = "SELECT * FROM cliente ORDER BY num_empregado_asignado";
    }

    $pdoStatement = $pdo->prepare($query);
    $pdoStatement->execute();
    $clientes = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $error = "Erro de conexión: " . $e->getMessage();
    die($error); // Mostrar o erro para depuración
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
    <h2>Benvido/a <?php echo htmlspecialchars($usuario); ?></h2>
    <table >
        <thead>
            <tr>
                <th>Numero</th>
                <th>Nome</th>
                <th>Numero empregado asignado</th>
                <th>Limite de crédito</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cliente['numero']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['num_empregado_asignado']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['limite_de_credito']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="" method="get">
        <button type="submit" name="orden" value="nome">Ordenar por Nome</button>
        <button type="submit" name="orden" value="empregado">Ordenar por Empregado</button>
    </form>

    <?php if ($usuario === 'Ana'): ?>
        <form method="GET" action="engadeRexistro.php">
            <button type="submit">Engadir Rexistro</button>
        </form>
    <?php endif; ?>
</body>
</html>
