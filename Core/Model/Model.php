<?php

namespace Core\Model;

use Core\Database\Database;

class Model extends Database
{
    /**
     * Classe ciblée
     * 
     * @var string
     */
    protected $model;

    /**
     * Constructeur
     */
    public function __construct()
    {
        if(is_null($this->model)) {
            $class = explode('\\', get_class($this));
            $class = end($class);
            $this->model = strtolower(str_replace('Model', '', $class));
        }

        parent::__construct();
    }
}