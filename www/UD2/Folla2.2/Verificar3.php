<?php
    $dia = $_POST['dia'];

    if($dia == 1){
        echo "<p>Hoxe é luns </p>";
    } elseif ($dia == 2){
        echo "<p>Hoxe é martes </p>";
    } elseif ($dia == 3){
        echo "<p>Hoxe é mércores </p>";
    } elseif ($dia == 4){
        echo "<p>Hoxe é xoves </p>";
    } elseif ($dia == 5){
        echo "<p>Hoxe é venres </p>";
    } elseif ($dia == 6){
        echo "<p>Hoxe é śabado </p>";
    } elseif ($dia == 7){
        echo "<p>Hoxe é domingo </p>";
    } else {
        echo "<p>O número introducido non é válido";
    }

?>