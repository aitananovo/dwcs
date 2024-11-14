<?php
    $usuariosValidos = [
        "usuario1" => "contrasinal1",
        "usuario2" => "contrasinal2",
        "usuario3" => "contrasinal3",
        "usuario4" => "contrasinal4"
    ];

    $usuario = $_POST['usuario'];
    $contrasinal = $_POST['contrasinal'];

    if(isset($usuariosValidos[$usuario])){
        if(strcmp($usuariosValidos[$usuario], $contrasinal) == 0){
            echo "Acceso permitido";
        } else {
            echo "Contrasinal inválido";
        }
    } else {
        echo "Usuario non atopado";
    }
?>