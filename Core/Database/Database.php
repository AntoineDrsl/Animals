<?php

namespace Core\Database;

use Core\Config\Config;

class Database 
{
    /**
     * Object de connexion à la base de données
     * 
     * @var object
     */
    protected $pdo;

    /**
     * Nom de l'host
     * 
     * @var string
     */
    protected $dbHost;

    /**
     * Numéro de port
     * 
     * @var string
     */
    protected $dbPort;

    /**
     * Nom du user
     * 
     * @var string
     */
    protected $dbUser;

    /**
     * Password de connexion
     * 
     * @var string
     */
    protected $dbPassword;

    /**
     * Nom de la base de données
     * 
     * @var string
     */
    private $dbName;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $config = new Config();
        $config = $config->getConfig();
        $this->dbHost = $config['dbHost'];
        $this->dbPort = $config['dbPort'];
        $this->dbName = $config['dbName'];
        $this->dbUser = $config['dbUser'];
        $this->dbPassword = $config['dbPassword'];

        try {   
            $this->pdo = new \PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPassword);
        } catch (\Exception $e) {
            echo 'La connexion à la base de données a échoué :(';
        }
    }


}