<?php

namespace core\form;

/**
 * Clase para validar los campos de un formulario
 */
class Input
{

    /**
     * Archivos de imagen permitidos
     */
    static $whiteList = array('jpg', 'png', 'bmp');


    /**
     * Comprueba si se han pasado los campos correctos del formulario
     *
     * @param array $fields
     * @param boolean $on
     * @return boolean
     */
    static function check($fields, $on = false)
    {
        $check = false;
        if ($on == false) {
            $on = $_REQUEST; 
        }
        foreach ($fields as $value) {
            if (empty($on[$value])) {
              $check = false;
              break;
            }else{
                $check = true;
            }
        }
        return $check;
    }


    /**
     * Devuelve el valor de un string sanitizado
     * 
     * @param string $value
     * @return string
     */
    static function str($value)
    { //To escape html characters and trim a string

        $value = trim(htmlspecialchars($value));
        return $value;
    }

    /**
     * Comprueba si la extensión de la imagen es valida
     *
     * @param [type] $path
     * @return boolean
     */
    static function checkImage($path)
    { }

}
