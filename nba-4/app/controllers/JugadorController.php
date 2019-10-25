<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\database\DB as DB;


class JugadorController extends Controller {
    

    public function DatosJugadorAction($params) {
        $idJugador= $params['idJugador'];  //$jugador= jugadorModel::find($idJugador);
        $jugador =  DB::table('jugadores')->select(['Nombre'])->where('codigo', '=', $idJugador)->get();


        echo "Jugador:" .$jugador;

        $this->renderView('jugador', ['jugador'=>$jugador]);

    }

}