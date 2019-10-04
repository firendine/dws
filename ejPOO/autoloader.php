<?php


spl_autoload_register('autocargador');


function autocargador($nombre_clase){
    $directorio = "clases/$nombre_clase.php";

    echo "clases/" . $nombre_clase . ".php" ;

    if(file_exists($directorio)){
        require_once($directorio);
    }else{
        echo "No existe";
    }
    

}

