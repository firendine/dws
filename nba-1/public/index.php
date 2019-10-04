
<?php

$raiz = dirname(__FILE__,2);
//Incluimos el archivo config.php
include $raiz. DIRECTORY_SEPARATOR ."config.php";
//Incluimos el archivo functions.php
require_once $raiz . DS . FUNCTIONS;
//Incluimos el archivo routes.php
$routes = include $raiz . DS . ROUTES;


//Leemos la url del navegador
$uri = trim($_SERVER["REQUEST_URI"], "/");
//Se elimina el subdominio "nba/" de la url recogida del navegador y
$uri = str_replace(SUBDOM,"",$uri);

$page = parseURL($uri, $routes);

//si la página no es null, se incluye la página encontrada, si no se incluye directamente a la página de error
if($page != null){
    include_once($raiz. DS . "public/" .VISTAS . $page);
}else{ 
    include_once($raiz. DS . "public/" .VISTAS . "error.php");
}



//echo "Estamos en el index.php <br>uri:" . $uri . "<br> page:" . $page;// ."<br> keys:". $keys;