<?php
use clases\Auth as Auth;
use clases\Usuarios as Usuarios;


function ValidateAction() {
    $user = $_POST['username'];
    $password = $_POST['password'];

    $resultUser = Usuarios::getUser($user);
        
        $admin= $resultUser['admin'];

        if (Auth::passwordVerify($user, $password)) {
            $jwt = Auth::createToken($user,$admin);
            setcookie($GLOBALS['config']['cookie']['name'], $jwt, time() + (60 * 60));
            //setcookie('examen_DWS_UserName', $user, time() + (60 * 60));
            header('Location: '.$GLOBALS['config']['site']['root']."/");
        }else{
            echo "ERROR";
        }
    
}
