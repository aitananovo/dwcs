<?php

    $nome = $_POST['nome'];
    $apelidos = $_POST['apelidos'];
    $idade = $_POST['idade'];

    if ($idade < 18) {
        echo "Ola $nome $apelidos eres menor de idade";
    } elseif ($idade >= 18 && $idade < 65){
        echo "Ola $nome $apelidos eres adulto pero non moito";
    } else {
        echo "Ola $nome $apelidos eres maior de 65";
    }
?>