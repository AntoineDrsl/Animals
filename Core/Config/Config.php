<?php

namespace Core\Config;

class Config
{
    private static $_instance = null;

    private $settings = [];

    /**
     * Constructeur
     */
    private function __construct($file)
    {
        $this->settings = require $file;
    }

    /**
     * Récupérer l'instance de la classe Config, ou la créer
     * 
     * @return Config
     */
    public static function getInstance($file)
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /**
     * Récupérer un paramètre de la configuration (définie dans App/Config/ConfigDb.php)
     * 
     * @return string
     */
    public function get($key) {
        return $this->settings[$key];
    }
}