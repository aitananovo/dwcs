<?php
require 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nome = $_GET['nome'];
    $passwd = password_hash($_GET['passwd'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM UsuariosTempo WHERE nome = :nome");
    $stmt->execute([':nome' => $nome]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($passwd, $usuario['passwd'])) {
        session_start();
        $_SESSION['nome'] = $nome;
        $_SESSION['rol'] = $usuario['rol'];

        $agora = date("Y-m-d H:i:s");
        $stmt = $pdo->prepare("UPDATE UsuariosTempo SET ultimaconexion = :agora WHERE nome = :nome");
        $stmt->execute([':agora' => $agora, ':nome' => $nome]);

        header('Location: mostra.php');
    } else {
        header('Location: login.php?msg=credenciais_erroneas');
    }
}
?>
