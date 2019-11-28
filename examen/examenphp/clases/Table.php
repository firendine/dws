<?php
namespace clases;

class Table 
{
    /**
     * Array asociativo con el resultado de una consulta SQL.
     */
    private $data = array();



    public static function getData() {
        return $this->data;
    }


/**
 * Recibirá el resultado de una consulta SQL, y lo almacenará en
 * $data.
 */
    public static function setData($data) {
        $this->data= $data;
        
    }
}
