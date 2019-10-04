<?php 
require_once dirname(__FILE__,3) . DS . FUNCTIONS;

$key = $keys[0][0];
$idjugador = $params[$key];


switch ($idjugador) {

    case 1:  include_once "jugador1.php";
        break;
    case 2:  include_once "jugador2.php";
        break;
    case 3:  include_once "jugador3.php";
        break;
    case 4:  include_once "jugador4.php";
        break;



}

?>
