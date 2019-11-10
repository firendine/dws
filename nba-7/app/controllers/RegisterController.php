<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;

/**
 * Clase para el registro de nuevos usuarios
 */
class RegisterController extends Controller
{
    /**
     * Página donde será redirigido si el registro es correcto
     *
     * @var string
     */
    private $redirect_to = '/';

    /**
     * Registra un nuevo usuario
     *
     * @return boolean
     */


    public function RegisterAction()
    { 
        $userName = Input::str($_POST['user']); //recoge bien 
        $password = Auth::crypt(Input::str($_POST['password'])); //recoge bien

        //$avatar = $_FILES['avatar'];
        echo "<br><br><br>avatar:";
        var_dump($_FILES['avatar']);
        echo "<br><br><br>";
        if (Input::check(['user', 'password'], $_POST)) {
            $idUser = $this->createUser($userName, $password);
            if ($idUser>0) {
                $avatar = 'avatar' . $idUser . '.' . pathinfo($_FILES['avatar']['name'])['extension'];
                echo "<br>avatar2: $avatar<br>";
                $user = new UserModel();
                $userNameField = $user->getUserNameField();
                $avatarField = $user->getAvatarfield();
                $user->$userNameField = $userName;
                $user->$avatarField = $avatar;
                $user->save();
                echo $res;
               $this->uploadAvatar($_FILES['avatar']['name'], $_FILES['avatar']['tmp_name'], $idUser);
                //header('Location: '.$GLOBALS['config']['site']['root'].$this->redirect_to);
            } else echo 'ALGO HA FALLADO';
        } else {
            echo '<br>Usuario o password vacío';
        }
         
    }


    /**
     * guarda los datos en la tabla usuario y devuelve el id 
     *
     * @param [type] $userName
     * @param [type] $password
     * @return int
     */
    private function createUser($userName, $password)
    {
        $user = new UserModel();
        $userNameField = $user->getUserNameField();
        $passwordField = $user->getPasswordField();
        

        $user->$userNameField = $userName;
        $user->$passwordField = $password;
        
        if ($user->save())
            return $user->lastInsertId();
        else return -1;
    }

    /**
     * Sube una imagen a la carpeta /public/images/avatares
     *
     * @param string $fileName
     * @param string $tmpFileName
     * @return boolean
     */
    private function uploadAvatar($fileName, $tmpFileName, $idUser)
    {
        echo "filename: $fileName";
        if (Input::checkImage($fileName)) {
            $avatar = 'avatar' . $idUser . '.' . pathinfo($fileName)['extension'];
            echo "avatar: $avatar";
            $path = $GLOBALS['basedir'] . ds . 'public' . ds . 'images' . ds . 'avatares' . ds . $avatar;
            echo "path4: $path";
            echo "tmp: $tmpFileName";
            if (move_uploaded_file($tmpFileName, $path))
                return true;
            else return false;
        }else{
            echo "fallo con el avatar";
        }
    }
}
