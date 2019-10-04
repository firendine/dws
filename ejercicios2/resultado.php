<?php

$num1 = $_GET["numero1"];

$num2 = $_GET["numero2"];

$oper = $_GET["operacion"];

$resultado;


if(is_numeric($num1) && is_numeric($num2)){
    switch($oper){
        case "suma":
            $resultado = $num1 + $num2;
            break;
        case "resta":
        $resultado = $num1 - $num2;
            break;
        case "mult":
        $resultado = $num1 * $num2;
            break;
        case "div":
        $resultado = $num1 / $num2;
            break;
    }
    echo "Resultado = ". $resultado;
} else{
    echo "ERROR";
}


