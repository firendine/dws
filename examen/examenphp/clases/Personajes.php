<?php
namespace clases;
use clases\Table as Table;
use clases\DB as DB;

class Personajes extends Table
{
    public static function getCharacters() {
       
       $query = 'SELECT nombre FROM personajes';
       $conn = DB::getInstance();

       $result= $conn->execQuery($query);
       self::setData($result);


       return self::getData();
   }


        


    

}
