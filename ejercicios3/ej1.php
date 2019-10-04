<?php

$numeros = array();


for($i=0; $i<=rand(5,15); $i++){
    $num = (rand(0,10));
    array_push($numeros, $num);
}

var_dump($numeros);
