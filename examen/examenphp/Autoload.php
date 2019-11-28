<?php
class AutoLoad {

    public function load($className) {
        echo $className;

       if(strpos($className, "JWT")!==false || strpos($className, "JWT")!== 0){
           require_once("clases/$className.php");
           //echo"no hay JWT";

       }else if ((strpos($className, "JWT")===false)){
           require_once("clases/JWT/$className.php");
           //echo "hay JWT";
       }else{
           //echo "algo no funciona";
       }
    }
    
    public function registerAutoLoad() {
        spl_autoload_register(array($this, "load"), true, true);
    }
}

$autoLoad = new AutoLoad();
$autoLoad->registerAutoLoad();

//$autoLoad->load("DB");