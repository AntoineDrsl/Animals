<?php

namespace Core;

use Core\Autoloader\Autoloader;

class App
{
    /**
     * Lancer la session et appeller Autoloader
     * 
     * @return void
     */
    public static function load()
    {
        session_start();
        require ROOT . "/Core/Autoloader/Autoloader.php";
        Autoloader::register();
    }
}