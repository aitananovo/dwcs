<?php

    if(isset($_GET['suma2']) && is_numeric($_GET['n1']) && is_numeric($_GET['n2'])){
        echo suma2($_GET['n1'], $_GET['n2']);

    } elseif(isset($_GET['suma3']) && is_numeric($_GET['n1']) && is_numeric($_GET['n2']) && is_numeric($_GET['n3'])){
        echo suma3($_GET['n1'], $_GET['n2'], $_GET['n3']);

    } elseif(isset($_GET['suma4']) && is_numeric($_GET['n1']) && is_numeric($_GET['n2']) && is_numeric($_GET['n3']) && is_numeric($_GET['n4'])){
        echo suma4($_GET['n1'], $_GET['n2'], $_GET['n3'], $_GET['n4']);
    }

    function suma2($n1, $n2){
        return $n1 + $n2;
    }
    
    function suma3($n1, $n2, $n3){
        return $n1 + $n2 + $n3;
    }

    function suma4($n1, $n2, $n3, $n4){
        return $n1 + $n2 + $n3 + $n4;
    }

  
    
?>