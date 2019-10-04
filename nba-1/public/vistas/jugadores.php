<!DOCTYPE html>
<?php 
include "menu.php";
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type= "text/css" href="<?=ROOT . DIRECTORY_SEPARATOR . SUBDOM. CSS . "jugadores.css"?>">
    <title>Jugadores</title>
</head>
<body>
<br/><br/>
<h1>Jugadores</h1>
            <div class="cont">
                <a href= "jugador/1">
                <img src="<?=ROOT . DIRECTORY_SEPARATOR . SUBDOM . IMG?>jug-1.png" class="jug">
                </a>
                <a href="jugador/2">
                <img src="<?=ROOT . DIRECTORY_SEPARATOR. SUBDOM . IMG?>jug-2.png" class="jug">
                </a>
                <a href="jugador/3">
                <img src="<?=ROOT . DIRECTORY_SEPARATOR . SUBDOM . IMG?>jug-3.png" class="jug">
                </a>
                <a href="jugador/4">
                <img src="<?=ROOT . DIRECTORY_SEPARATOR . SUBDOM . IMG?>jug-4.png" class="jug">
                </a>
            </div>
</body>
</html>