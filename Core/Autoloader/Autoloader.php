<?php

namespace Core\Autoloader;

class Autoloader{

    /**
     * Require les class grâce à leur nom
     * 
     * @return void
     */
    public static function autoload($class)
    {
        $class = str_replace('\\', '/', $class);
        require ROOT . '/' . $class . '.php';
    }

    /**
     * Appeller autoload() pour chaque class
     * 
     * @return void
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

}