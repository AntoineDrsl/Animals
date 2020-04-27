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
    public function __construct($dbName, $dbHost, $dbPort, $dbUser, $dbPassword)
    {
        $this->dbName = $dbName;
        $this->dbHost = $dbHost;
        $this->dbPort = $dbPort;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;

        if(is_null($this->pdo)) {
            try {   
                $this->pdo = new \PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPassword);
            } catch (\Exception $e) {
                echo 'La connexion à la base de données a échoué :(';
            }
        }
        return $this->pdo;
    }


}