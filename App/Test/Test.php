<?php

namespace App\Test;

use Core\Database\CreateDatabase;

class Test
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $db = new createDatabase();
        $db->createDatabase('animals');
        $db->createTable('test', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'name' => 'VARCHAR(50) NOT NULL'
        ]);
    }
}