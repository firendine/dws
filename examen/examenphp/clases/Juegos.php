<?php

namespace clases;

use clases\Table as Table;

class Juegos extends Table
{
    public static function getTitle()
    {
        $query = "SELECT id,titulo FROM juegos";
        $conn = DB::getInstance();
        $result = $conn->execQuery($query);

        self::setData($result);
        return self::getData();
    }

    public static function getDataGame($id)
    {
        $query = "SELECT titulo,descripcion FROM juegos WHERE id = $id";
        $conn = DB::getInstance();

        $result = $conn->execQuery($query);

        self::setData($result);
        return self::getData();
    }
}
