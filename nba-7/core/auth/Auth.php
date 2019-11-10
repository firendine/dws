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
        $cryptedPass = crypt($password);//password_hash($password,PASSWORD_BCRYPT);

        return $cryptedPass;

    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($password, $userName/*$idUser*/) {
        //crear new model y hacer la consulta a la base de datos con getUserNameField(), que devuelve el nombre de la columna
        //del nombre de usuario en la base de datos, y....
        //$user = new UserModel();
        //$res = $user->where(UserModel::getUserNameField(), "=", $POST['user'])->get()[0]);
        //$hash = $res->contrasenya
        //hay que cambiar el userName por idUser para poder hacer el find::, el mismo que hay en jugadorController
        
       //return password_verify($password, $hash);
        $user = new UserModel();
        $res = $user->where(UserModel::getUserNameField(), "=", $userName)->get()[0] ;
        $contrasenya = $res->contrasenya;

        echo "<br> contrasenya: " . $contrasenya . "<br>";
        echo "<br> password: " . $password ."<br>";
        
        return password_verify($password, $contrasenya);


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
