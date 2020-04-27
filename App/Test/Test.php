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
        $this->createDb = $app->getCreateDb();

        $this->createDb->createDatabase('animals');
        $this->createDb->createTable('user', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'firstname' => 'VARCHAR(50) NOT NULL',
            'lastname' => 'VARCHAR(50) NOT NULL',
            'address' => 'VARCHAR(255) NOT NULL',
            'city' => 'VARCHAR(100) NOT NULL',
            'postalCode' => 'VARCHAR(10) NOT NULL',
            'email' => 'VARCHAR(255) NOT NULL',
            'telephone' => 'VARCHAR(15) NOT NULL',
            'roles' => 'JSON NOT NULL'
        ]);
        $this->createDb->createTable('animal', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'type' => 'VARCHAR(255) NOT NULL',
            'race' => 'VARCHAR(255) NOT NULL',
            'size' => 'INT NOT NULL',
            'weight' => 'INT NOT NULL',
            'age' => 'INT NOT NULL'
        ]);
        $this->createDb->createTable('product', [
            'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
            'name' => 'VARCHAR(255) NOT NULL',
            'type_animal' => 'VARCHAR(255) NOT NULL',
            'price' => 'DECIMAL(6,2) NOT NULL',
            'stock' => 'INT NOT NULL'
        ]);
        $this->createDb->createTable('donation', 
            [
                'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
                'user_id' => 'INT NOT NULL',
                'amount' => 'DECIMAL(6,2) NOT NULL',
                'datetime' => 'DATETIME NOT NULL'
            ],
            [
                'user_id' => 'user(id)'
            ]
        );
        $this->createDb->createTable('shoppingcart',
            [
                'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
                'user_id' => 'INT NOT NULL',
                'total_amount' => 'DECIMAL(6,2) NOT NULL',
                'datetime' => 'DATETIME NOT NULL',
                'state' => 'TINYINT NOT NULL'
            ],
            [
                'user_id' => 'user(id)'
            ]
        );
        $this->createDb->createTable('shoppingcart_line',
            [
                'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
                'shoppingcart_id' => 'INT NOT NULL',
                'product_id' => 'INT NOT NULL',
                'quantity' => 'INT NOT NULL',
                'amount' => 'DECIMAL(6,2) NOT NULL'
            ],
            [
                'shoppingcart_id' => 'shoppingcart(id)',
                'product_id' => 'product(id)'
            ]
        );
        $this->createDb->createTable('reservation',
            [
                'id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
                'user_id' => 'INT NOT NULL',
                'animal_id' => 'INT NOT NULL',
                'rendezvous' => 'DATETIME NOT NULL',
                'datetime' => 'DATETIME NOT NULL',
            ],
            [
                'user_id' => 'user(id)',
                'animal_id' => 'animal(id)'
            ]
        );
    }
}