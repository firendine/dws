<?php
class Kernel extends Router{

    public function __construct() {	
		$routes= include "../routes/web.php";
		
		addRoutesFromFile($routes);
	}

	public function run() {
	}

}

