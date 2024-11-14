<?php
    $dia = $_POST['dia'];

    switch ($dia)
    {
    case 1: echo "<p>Hoxe é luns </p>";
    break;
    case 2: echo "<p>Hoxe é martes </p>";
    break;
    case 3: echo "<p>Hoxe é mércores </p>";
    break;
    case 4: echo "<p>Hoxe é xoves </p>";
    break;
    case 5: echo "<p>Hoxe é venres </p>";
    break;
    case 6: echo "<p>Hoxe é śabado </p>";
    break;
    case 7: echo "<p>Hoxe é domingo </p>";
    break;
    default: echo "<p>O número introducido non é válido</p>";
    }


?>