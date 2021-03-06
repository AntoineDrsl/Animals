<?php

namespace Core\Model;

use Core\App;

class Model
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

        $app = new App();
        $this->db = $app->getDb();
    }

    /**
     * Créer la partie WHERE d'une requête SQL
     * 
     * @param array $criteria
     * 
     * @return string
     */
    public function createWhere($criteria)
    {
        $where = ' WHERE ';
        foreach ($criteria as $key => $value) {
            $where .= $key . ' = "' . $value . '" AND ';
        }
        return substr($where, 0, -4);
    }

    /**
     * Créer la partie ORDER BY d'une requête SQL
     * 
     * @param array $order
     * 
     * @return string
     */
    public function createOrder($order)
    {
        $orderList = ' ORDER BY ';
        foreach($order as $key => $value) {
            $orderList .= $key . ' ' . $value . ', ';
        }
        return substr($orderList, 0, -2);
    }

    /**
     * Créer la partie LIMIT d'une requête SQL
     * 
     * @param array $criteria
     * 
     * @return string
     */
    public function createLimit($criteria)
    {

        return " LIMIT " . $criteria;
    
    }

    /**
     * Créer le ON d'une requête SQL avec INNER JOIN
     * 
     * 
     */

    public function createOn($criteria){
        
        $on = " ON ";
        foreach($criteria as $key => $value){
            $on .= $key . '.' . $value . " = "; 
        }

        return substr($on, 0, -3);


    }
}