<?php

namespace Core\Config;

class Config
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->config = [
            'dbHost' => '127.0.0.1',
            'dbPort' => '',
            'dbName' => 'animals',
            'dbUser' => 'root',
            'dbPassword' => ''
        ];
    }

    /**
     * Récupérer la config
     * 
     * @return array
     */
    public function getConfig() {
        return $this->config;
    }
}