<?php
namespace clases;

class DB
{
    private $instance;
    private $bbdd;
    private function __construct()
    {
        $dbConfig = $GLOBALS['config']['DB'];
        $connection = $dbConfig['CONNECTION'];
        $dbname = $dbConfig['NAME'];
        $host = $dbConfig['HOST'];
        $port = $dbConfig['PORT'];
        $username = $dbConfig['USERNAME'];
        $password = $dbConfig['PASSWORD'];
        try {
            $this->bbdd = new PDO("$connection:dbname=$dbname;host=$host:$port", "$username", "$password");
            $this->bbdd->exec("set names utf8");
            $this->bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<p>Error: Cannot connect to database server.</p>\n";
            echo $e;
            exit();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new PDOConnection();
        }
        return self::$instance;
    }

    public function execQuery($query, $params = null)
    {
        $stm = $this->bbdd->prepare($query);
        $stm->execute($params);
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    
}
