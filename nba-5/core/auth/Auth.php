<?php
namespace core\auth;
use app\models\UserModel;

/**
 * Clase para validar usuarios
 */
class Auth {

    /**
     * Devuelve la contraseña encriptada
     *
     * @param string $password
     * @return string
     */
    static function crypt($password) {
        $cryptedPass = password_hash($password,PASSWORD_BCRYPT);

        return $cryptedPass;

    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($password, $idUser) {
       
    }

    /**
     * Comprueba si el usuario está logeado
     *
     * @return boolean
     */
    static function check() {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
            return true;
        }else{
            return false;
        }
    }

}
