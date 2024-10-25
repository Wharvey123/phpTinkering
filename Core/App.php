<?php
//Fitxer per crear el contenidor de dependencies per gestionar i accedir a les dependencies de l'aplicació de forma centralitzada
namespace Core;

use Exception;

class App
{
    //array per al contenidor de dependencies
    private static $container;

    //creem funcio enllaçar la dependencia al contenidor
    public static function bind($key, $value)
    {
        static::$container[$key] = $value;
    }

    //creem funcio per recuperar la dependencia
    public static function get($key)
    {
        if (!array_key_exists($key, static::$container)) {
            throw new Exception("No key '{$key}' is bound in container.");
        }
        return static::$container[$key];
    }

}
