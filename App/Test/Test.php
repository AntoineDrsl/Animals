<?php

namespace App\Test;

use Core\App;
use Core\Database\CreateDatabase;

class Test
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $app = new App();
        $this->createdb = $app->getCreateDb();
        
        $this->createdb->createDatabase('animals');
        $this->createdb->createTable('test', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'name' => 'VARCHAR(50) NOT NULL'
        ]);
    }
}