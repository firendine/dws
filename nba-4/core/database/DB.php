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
        '>='
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
        return preg_replace('/[^0-9a-zA-Z_-]/', '', $value);
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
        $selectedFields = $this->select($this->fields);

        $params = [];

        $query = "SELECT *";
        /*
        if (empty($selectedFields)) {
            $selectedFields = " * ";
        */
        /*} else {
            foreach ($selectedFields as $key=> $value) {
                echo "key:$key value:";
                var_dump($value);
                $query .= $value;
            }
        */
        //}
        

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

        echo "<br>";
        echo "params:";
        var_dump($params);
        echo '<br>';

        echo $query;



       // $stmt = $conn->prepare($query);
        //$stmt->execute($params);
       // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       //PdoConn::select($query,$params);

       $result=PdoConn::getInstance();
       echo"<br>result:";
       var_dump($result);
       echo "<br>";

     

       $result = $result->select($query, $params); 
       echo"<br>result2:";
       var_dump($result);
       echo"<br>";

            
        foreach ($result as $key => $value) {
            echo "clave: $key <br>";
            $val = implode(",", $value);
            echo "valor: $val <br>";
        }
        

    }

    public function insert($record)
    { }

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
