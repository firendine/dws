<?php

include "autoloader.php";


$claseuno = new ClaseUno();
$calsedos = new ClaseDos();

$mos = $claseuno->mostrar();
$mas = $calsedos->mostrar();
echo $mos;
echo $mas;