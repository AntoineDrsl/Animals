<?php

namespace Core;

use Core\Autoloader\Autoloader;

class App
{
    public static function load()
    {
        session_start();
        require ROOT . "/Core/Autoloader/Autoloader.php";
        Autoloader::register();
    }
}