<?php
class PdoConnection {

    /**
     * Instancia de la clase
     *
     * @var PDOConnection
     */
    private static $instance = null;
    /**
     * conexión con la bbdd
     *
     * @var PDO
     */
    public $bbdd;

    public function __construct(){
//En lugar de mysql, coger los valores del config.php
        $dbConfig = $GLOBALS['config']['DB'];

            $conn = $dbConfig["CONNECTION"];
            $host = $dbConfig['HOST'];
            $db = $dbConfig['NAME'];
            $user = $dbConfig['USERNAME'];
            $pass = $dbConfig['PASSWORD'];
        try{
            
        $this->$bbdd= new PDO("$conn:host=$host;dbname=$db,$user,$pass");/*'mysql:host=localhost;dbname=nba','silvia','6sec120.L'*/
            echo "Te has conectado a la base de datos";

        }catch(PDOException $ex){
            echo "No se ha podido conectar a la base de datos";
        }
        
    }

    public static function getInstance() {

        if(self::$instance == null){
            self::$instance == new PdoConnection();
        }
        return self::$instance;


    }

// controller, clase error, modificar un parametro..,
    public function select($query, $params = null){

    }

    public function insert($query, $params){
    }

    public function lastInsertId() {
    }

    public function update($query, $params){
    }


    public function delete($query, $params){

    }

    private function execQuery($query, $params) {
        $st= $this->$bbdd->prepare($query);
        $st->execute();
        return $st->fetchAll();
    }

    private function execQueryNoResult($query, $params) {
    }


};


