<?php

$numeros = array();


if(isset($_GET['numMin'] && isset($_GET['numMax']) && isset($_GET['valMin'])&& isset($_GET['valMax']){
    $numMin= $_GET['numMin'];
    $numMax=$_GET['numMax'];
    $valMin= $_GET['valMin'];
    $valMax= $_GET['valMax'];

    for($i=0; $i<=rand($numMin,$numMax); $i++){
        $num = (rand($valMin,$valMax));
        array_push($numeros, $num);
    }
    var_dump($numeros);
    echo 'DONE';
}else{
    echo 'ERROR';
}





