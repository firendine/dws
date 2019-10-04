<?php

return array(	
	"routes" => array(

		"/" => array(
            "route" => "/",
			"page" => "inicio.php"
		),

		"Historia" => array(
			"route" => "/historia",
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


