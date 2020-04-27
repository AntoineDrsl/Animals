<?php

namespace Core;

use Core\Config\Config;
use Core\Database\Database;
use Core\Autoloader\Autoloader;
use Core\Database\CreateDatabase;

class App
{
    private static $_instance;

    private $db_instance;

    private $createDb_instance;

    /**
     * Récupérer l'instance de la classe App, ou la créer
     * 
     * @return App
     */
    public function getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

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

    /**
     * Récupérer l'instance de la classe Database, ou la créer
     * 
     * @return Database
     */
    public function getDb()
    {
        $config = Config::getInstance(ROOT . "/App/Config/ConfigDb.php");

        if(is_null($this->db_instance)) {
            $this->db_instance = new Database(
                $config->get("dbName"),
                $config->get("dbHost"), 
                $config->get("dbPort"), 
                $config->get("dbUser"), 
                $config->get("dbPassword")
            );
        }
        return $this->db_instance;
    }

    /**
     * Récupérer l'instance de la class CreateDatabase, ou la créer
     * 
     * @return CreateDatabase
     */
    public function getCreateDb()
    {
        $config = Config::getInstance(ROOT . "/App/Config/ConfigDb.php");

        if(is_null($this->createDb_instance)) {
            $this->createDb_instance = new CreateDatabase(
                $config->get("dbName"),
                $config->get("dbHost"), 
                $config->get("dbPort"), 
                $config->get("dbUser"), 
                $config->get("dbPassword")
            );
        }
        return $this->createDb_instance;
    }
}