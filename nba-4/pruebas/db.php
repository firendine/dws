<?php

function conectar()
{
    try {
        $bbdd = new PDO('mysql:host=localhost;dbname=nba', 'silvia', '6sec120.L');
        echo "conectado <br>";
    } catch (Exception $ex) {
        echo "No te has conectado $ex <br>";
    }

    return $bbdd;
}

function insert(/*$record*/){
    $conn = conectar();

    $stmt = "INSERT INTO ";



}

 function select(...$fields){
    foreach ($fields as $field) {
        $this->setField($field);
    }
    return $this;
}

function get()
{
    $conn = conectar();
    $table = "jugadores";
    $fields = ["codigo", "Nombre", "Procedencia"];
    $selectedFields = select($fields);//["codigo,", "Nombre,", "Procedencia"]; // más adelante usar substring -1 para eliminar la ultima "," y no añadirla en las keys del array
    // $selectedFields=[];
    $wheres = [];
    $params = [];

    $query = "SELECT ";
    if (empty($selectedFields)) {
        $selectedFields = " * ";
    } else {
        foreach ($selectedFields as $field) {
            $query .= $field;
        }
    }

    $query .= " FROM $table";

    if (empty(where())) {
        $query .= ";";
    } else {
        var_dump(where());

        array_push($wheres, where());
        $query .= " WHERE ";
        foreach ($wheres as $con) {
            if ($con === end($wheres)) {
                $query .= $con["field"] . " " . $con["operator"] . "?;";
            } else {
                $query .= $con["field"] . " " . $con["operator"] . "? AND ";
            }
            $valor = $con['value'];

            array_push($params, $con['value']);

            // $params$con['value']];
        }
    }
    echo "<br>";
    echo "params:";
    var_dump($params);
    echo '<br>';

    echo $query;



    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $key => $value) {
        echo "clave: $key <br>";
        $val = implode(",", $value);
        echo "valor: $val <br>";
    }
}

function where(/*$field, $operator, $value*/)
{
    $field = "Nombre_equipo";
    $operator = " = ";
    $value = "Trail Blazers";
    $condition = [
        "field" => sanitize($field),
        "operator" => sanitizeOperator($operator),
        "value" => sanitize($value)
    ];

    return $condition;
    //$this->setWhere($condition);
    // return $this;
}

function sanitize($value)
{
    return preg_replace('/[^ 0-9a-zA-Z_-]/', '', $value);
}

function sanitizeOperator($operator)
{
    $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>='
    ];
    if (in_array($operator, $operators))
        return $operator;
    else return '=';
}

get();
