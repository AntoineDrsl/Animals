<?php

namespace Core\Database;
use Core\Database\Database;

class CreateDatabase extends Database
{
    /**
     * PDO utilisé pour créer la base de données si elle n'existe pas
     * 
     * @var object
     */
    private $pdoCreate;

    /**
     * Créer une base de données
     * 
     * @param string $name
     * 
     * @return void
     */
    public function createDatabase($name)
    {
        try {   
            $this->pdoCreate = new \PDO('mysql:host=' . $this->dbHost, $this->dbUser, $this->dbPassword);
            $statement = 'CREATE DATABASE IF NOT EXISTS ' . $name;

            $test = $this->pdoCreate->exec($statement);
        } catch (\Exception $e) {
            echo 'Création de la base de données impossible :(';
        }
    }

    /**
     * Créer une table
     * 
     * @param string $table
     * @param array $fields
     * @param array $foreigns
     * 
     * @return void
     */
    public function createTable($table, $fields = [], $foreigns = [])
    {
        try{         
            if($this->pdo) {
                $statement = 'CREATE TABLE IF NOT EXISTS ' . $table . '(';

                foreach ($fields as $key => $value) {
                    $statement .= $key . ' ' . $value . ',';
                }
                $statement = substr($statement, 0, -1);
                $statement .= $this->makeForeignKey($foreigns);
                $statement .= ')';
                $this->pdo->exec($statement);
            }
        } catch (\Exception $e) {
            echo 'Création de la table "' . $table . '" impossible :(';
        }
    }

    /**
     * Ajouter les relations au statement
     * 
     * @param array $foreigns
     * 
     * @return string
     */
    private function makeForeignKey($foreigns)
    {
        if($foreigns) {
            $statement = ', ';

            foreach ($foreigns as $key => $value) {
                $statement .= 'FOREIGN KEY(' . $key . ') REFERENCES ' . $value . ',';
            }
            $statement = substr($statement, 0, -1);
            return $statement;
        }
    }
}