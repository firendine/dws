<?php

try{
$pdo= new PDO('mysql:host=localhost','silvia','6sec120.L');
echo "conectado";
}catch(PDOException $ex){
    echo $ex;
    echo "<br>no conectado";

}

