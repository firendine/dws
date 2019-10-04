<?php

if((isset($_GET["numero1"]) && isset($_GET["numero2"]) && isset($_GET["operacion"]))&& (is_numeric($_GET["numero1"]) && is_numeric($_GET["numero2"]))){
$num1 = $_GET["numero1"];
$num2 = $_GET["numero2"];
$oper = $_GET["operacion"];
$resultado = 0;

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
        if($num2==0){

        }else{
            $resultado = $num1 / $num2;
        }
        
            break;
    }
    echo "Resultado = ". $resultado;
} else{
    echo "ERROR";
}

?>


<form action="/ejercicios2/index.php" method = "GET">
Número 1:<br>
<input type="text" name="numero1" value="0"><br>
Número 2:<br>
<input type="text" name="numero2" value="0"><br><br>

<input type="radio"  name = "operacion" value="suma"> +
<input type="radio"  name = "operacion"value="resta"> -
<input type="radio" name = "operacion" value="mult"> *
<input type="radio" name = "operacion" value="div"> /<br>
<input type="submit" name = "resultado" value="Calcular">
</form>
