<?php

return array(
    "site" => array(
        "root" => "http://localhost/nba",
    ),
    "DB" => array(
        "CONNECTION" => "mysql",
        //El host es db porque estamos utilizando docker (mirar docker-compose.yml)
        "HOST" => "localhost",
        "PORT" => "3306",
        "NAME" => "nba",
        "USERNAME" => "silvia",
        "PASSWORD" => "6sec120.L",
    )
);