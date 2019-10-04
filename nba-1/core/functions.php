<?php

//Funcion que compara rutas
function parseURL($uri, $routes)
{
    //Incluimos el archivo routes.php e inicializamos la página a error.php
    $page = ["error"];
    
    //Recorremos el array $routes y vemos si alguna coincide con la ruta actual
    foreach ($routes["routes"] as $currentRoute) {
        $route = trim($currentRoute["route"], "/");
        $routePattern = "#^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)',  preg_quote($route)) . "$#D";
        $matchesParams = array();


        //Se comparan las rutas con la ruta actual, si es así, guardamos en $page la página .php correspondiente
        if ($route == $uri) {
            $page = $currentRoute["page"];
            break;
        }


        if (preg_match_all($routePattern, $uri, $matchesParams)) {

            $keys = array();
            $params = array();

            //Elimina el primer elemento
            array_shift($matchesParams);

            //Se obtienen los nombres de las keys
            preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $route, $keys); //recoge las key

            //Elimina el primer elemento si no es necesario
            array_shift($keys);

            for ($i = 0; $i < count($keys[0]); $i++) {
                //asigna los valores a las key
                $params[$keys[0][$i]] = $matchesParams[$i][0];
            }
            $page = $currentRoute["page"];
            
        }

        
    }
    return $page;
}
