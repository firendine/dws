<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;


class JugadorController extends Controller {
    

    public function DatosJugadorAction($params) {
        $idJugador= $params['idJugador'];

        //$this->renderView('jugador');

        //$jugador= jugadorModel::find($idJugador);
        $this->renderView('jugador', ['jugador'=>$idJugador]);


    }

}