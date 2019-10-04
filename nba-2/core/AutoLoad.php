<?php
class AutoLoad {

    public function load($classNameSpace) {
    }
    
    public function registerAutoLoad() {
        spl_autoload_register(array($this, "load"), true, true);
    }
}

$autoLoad = new AutoLoad();
$autoLoad->registerAutoLoad();