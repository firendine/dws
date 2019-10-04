<?php

return array(
   

    "routes" => array(
        "/" => array(
            "route" => "/",
            "page" => "inicio.php"
        ),
        
        "Inicio" => array(
            "route" => "/inicio",
            "page" => "inicio.php"
        ),

        "Equipo" => array(
            "route" => "/equipo",
            "page" => "equipo.php"
        ),
        "Jugadores" => array(
            "route" => "/jugadores",
            "page" => "jugadores.php"
        ),
        "Jugador" => array(
            "route" => "/jugador/:idjugador",
            "page" => "jugador.php"
        ),
    ),
    "error" => "error.php"
);