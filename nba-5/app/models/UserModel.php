<?php
namespace app\models;

use core\MVC\Model as Model;

class UserModel extends Model {
    protected $table = 'users'; //'usuarios'
    protected $key = 'idUsuario'; //'codigo'
    protected static $userNameField = 'nombreUsuario'; //'usuario'
    protected static $passwordField = 'contrasenya'; //'password'
    protected static $avatarField = 'avatar';

    
    static function getUserNameField() {
        return self::$userNameField;
    }

    static function getPasswordField() {
        return self::$passwordField;
    }

    static function getAvatarfield(){
        return self::$avatarField;
    }

}