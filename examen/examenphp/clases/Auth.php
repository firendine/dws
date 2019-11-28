<?php
namespace clases;

use clases\Usuarios as Usuarios;

class Auth {

    private $secret_key= 'examen_DWS';
    private $encrypt = 'HS256';
    private $aud = 'DWS_DAW';


    static function passwordVerify($user, $password) {
        $resultUser = Usuarios::getUser($user);
        
        $hash = $resultUser['password'];

        return (password_verify($password, $hash));
    }

    

    static function createToken($userName, $admin) {
        $time = time();
        
        $token = array(
            'iat' => $time, // Tiempo que inició el token
            'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
            'aud' => self::$aud,
            'data' => [ // información del usuario
                'userName' => $userName,
                'admin' => $admin
            ]
        );
        
        $jwt = JWT::encode($token, self::$secret_key, self::$encrypt);

        return $jwt;
    }

    static function check() {
        if (isset($_COOKIE['examen_DWS'])) {
            $userName = $_COOKIE['examen_DWS_userName'];
            $token = JWT::decode($_COOKIE['examen_DWS'], self::$secret_key, array(self::$encrypt));        
            if ($token->data->userName == $userName) { //quitar
                return true; //quitar
            } else return false;//quitar
        } else return false;
    }

}

Auth::passwordVerify('user1','aaaa');
