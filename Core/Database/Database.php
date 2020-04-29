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

    /**
     * Lancer une recherche dans la database en SQL, pouvant être lié avec une entité
     * 
     * @param string $statement
     * @param string $class
     * @param boolean $one
     * 
     * @return object
     */
    public function query($statement, $class = null, $one = false) 
    {
        try {
            $query = $this->pdo->query($statement);

            if($query != false) {    
                if(!is_null($class)){
                    $query->setFetchMode(\PDO::FETCH_CLASS, $class);
                } else {
                    $query->setFetchMode(\PDO::FETCH_OBJ);
                }

                if($one){
                    return $query->fetch();
                } else {
                    return $query->fetchAll();
                }
            }
        } catch(\Exception $e) {
            echo 'Une erreur est survenue lors de la requête';
        }
    }

    /**
     * Lancer une requête préparée en SQL
     * 
     * @param string $statement
     * @param array $data
     * 
     * @return void
     */
    public function prepare ($statement, $data)
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);

        return $prepare;
    }

    /**
     * Lancer une requête non préparée en SQL
     * 
     * @param string $statement
     * 
     * @return void
     */
    public function exec ($statement)
    {
        return $this->pdo->exec($statement);
    }

}