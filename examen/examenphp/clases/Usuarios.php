<?php
namespace clases;
use clases\Table as Table;
use clases\DB as DB;

class Usuarios extends Table
{ 
    public static function getUser($user) {
        $query = "SELECT * FROM usuarios WHERE usuario = $user";
       $conn = DB::getInstance();

       $result= $conn->execQuery($query);

        self::setData($result);


       return self::getData();

        
    }
}
