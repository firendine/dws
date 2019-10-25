<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;

class IndexController extends Controller {

    public function IndexAction() {
        $this->renderView('portada');
        
    }

    public function HistoriaAction() {
        $this->renderView('historia');
    }

    public function JugadoresAction() {
        $jugadores =  DB::table('jugadores')->select(['Nombre'])->where('Nombre_equipo', 'LIKE', "Lakers")->get();
        $this->renderView('jugadores', ['jugadores'=>$jugadores]);
       // $this->renderView('jugadores');
    }

}