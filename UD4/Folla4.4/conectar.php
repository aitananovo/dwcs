<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=usuariosTempo', 'usuario', 'contrasinal');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erro de conexión: " . $e->getMessage());
}
?>
