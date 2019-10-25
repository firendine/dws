<?php

namespace core\database;

use core\database\PdoConnection as PdoConn;


class DB
{

    private static $instance;
    private $table;
    private $fields = [];
    private $wheres = [];
    private $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>=',
        'LIKE' //Añadido LIKE en operators
    ];

    /**
     * Método para devolver una instancia de DB con la tabla que toca
     *
     * @param [type] $table
     * @return void
     */
    public static function table($table)
    {
        self::$instance = new static;
        self::$instance->setTable($table);
        return self::$instance;
    }

    private function setTable($table)
    {
        $this->table = $table;
    }

    private function getTable()
    {
        return $this->table;
    }

    /**
     * selecciona los campos de la tabla para el select
     * ...$fields para que el número de los argumentos pueda ser variable (0,1,2...)
     *
     * @param string ...$fields
     * @return void
     */
    public function select(...$fields)
    {
        foreach ($fields as $field) {
            $this->setField($field);
        }
        return $this;
    }

    private function setField($field)
    {
        array_push($this->fields, $this->sanitize($field));
    }

    private function sanitize($value)
    {
        //Añadido un espacio en blanco a la expresión regular para los nombres de quipo compuestos
        return preg_replace('/[^ 0-9a-zA-Z_-]/', '', $value);
    }

    public function where($field, $operator, $value)
    {
        $condition = [
            "field" => $this->sanitize($field),
            "operator" => $this->sanitizeOperator($operator),
            "value" => $this->sanitize($value) //<--El sanitize quita los espacios en blanco de los nombres compuestos y da error
        ];
        $this->setWhere($condition);
        return $this;
    }

    private function sanitizeOperator($operator)
    {
        if (in_array($operator, $this->operators))
            return $operator;
        else return '=';
    }

    private function setWhere($condition)
    {
        array_push($this->wheres, $condition);
    }

    public function get()
    {
        $tableName = $this->getTable();
        $params = [];
        $query = "SELECT ";

        /** 
         *        echo "fields: ";
         *       var_dump($this->fields);
         */

        if (empty($this->fields)) {
            $query .= " * ";
        } else {
            foreach ($this->fields as $key => $value) {
                // if($field === end($this->fields)){
                $sql = implode(",", $value); //Si pasa un valor fuera de corchetes(un String), el implode da error. Si pasa un empty entre corchetes, también da error.
                $query .= $sql;

                // }else{

                // }

            }
        }

        $query .= " FROM $tableName";

        $query .= " WHERE ";
        foreach ($this->wheres as $condition) {
            if ($condition === end($this->wheres)) {
                $query .= $condition["field"] . " " . $condition["operator"] . "?;";
            } else {
                $query .= $condition["field"] . " " . $condition["operator"] . "? AND ";
            }

            array_push($params, $condition['value']);
        }

        echo "<br><br>params:";
        var_dump($params);
        echo "<br><br>Query: " . $query . "<br>";



        $result = PdoConn::getInstance();
        echo "<br><br>resultado getInstance: ";
        var_dump($result);
        echo "<br><br>";



        $resultado = $result->select($query, $params);
        echo "<br><br>resultado select: ";
        var_dump($resultado);
        echo "<br><br>";


        foreach ($resultado as $key => $value) { //MODIFICAR PARA COGER MÁS DE 1 VALOR e imprimir equipos según nombre
            echo "clave: $key <br><br>";
            //$pruebaVal="";
           // $pruebaVal.= "," . $value;
            $val = implode(",", $value);
            echo "valor: $val <br><br>";
            
        }
       // var_dump($pruebaVal);
        return $val;
    }

    public function insert($record) // En $record van todos los valores. Por ejemplo, quiero insertar nombre:Pau Gasol, 
    { 


    }

    public function lastInsertId()
    {
        $connection = PdoConnection::getInstance();
        return $connection->lastInsertId();
    }

    public function delete()
    { }

    public function update($record)
    { }
}
