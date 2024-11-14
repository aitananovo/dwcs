<?php

    $primeiro = $_POST['primeiro'];
    $segundo = $_POST['segundo'];
    $terceiro = $_POST['terceiro'];

    if (is_numeric($primeiro) && is_numeric($segundo) && is_numeric($terceiro)) {
        $maior = max($primeiro, $segundo, $terceiro);
        $menor = min($primeiro, $segundo, $terceiro);

        echo "<p>O maior número é $maior</p>";
        echo "<p>O menor número é $menor</p>";
    } else {
        echo "ERROR! TEN QUE SER UN NÚMERO";
    }

?>