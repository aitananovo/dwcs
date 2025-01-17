<?php
$host = "db";
$db = "proba";
$user = "root";
$pass = "root";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

$nome = $_GET['nome'];
$contrasinal = password_hash($_GET['contrasinal'], PASSWORD_DEFAULT);

    try {
        $conPDO = new PDO($dsn, $user, $pass);
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO usuario VALUES(:nome, :contrasinal)";
        $stmt = $conPDO -> prepare($query);
        $stmt -> execute(['nome' => $nome, 'contrasinal' => $contrasinal]);

        echo "O usuario foi creado correctamente";

    } catch (PDOException $ex) {
        die("Erro na conexión mensaxe: " . $ex->getMessage());
    }
    
?>