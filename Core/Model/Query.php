<?php

namespace Core\Model;

use Core\Model\Model;

class Query extends Model
{
    /**
     * Rechercher tous les élements d'une table
     * 
     * @param array $order
     * 
     * @return object|null
     */
    public function findAll($order = ['id' => 'ASC'])
    {
        return $this->db->query("SELECT * FROM " . $this->model . $this->createOrder($order),
                                'App\Entity\\' . ucfirst($this->model),
                                false);
    }

    /**
     * Rechercher les derniers éléments d'une table
     * 
     * @param int $limit
     * @param array $order
     * 
     * @return object|null
     */
    public function findLast($limit, $order = ['id' => 'ASC'])
    {
        return $this->db->query("SELECT * FROM " . $this->model . $this->createOrder($order) . $this->createLimit($limit),
                                'App\Entity\\' . ucfirst($this->model),
                                false);
    }

    /**
     * Rechercher un élément d'une table
     * 
     * @param int $id
     * @param array $order
     * 
     * @return object|null
     */
    public function find($id, $order = ['id' => 'ASC']){
        return $this->db->query("SELECT * FROM " . $this->model . " WHERE id=" . $id . $this->createOrder($order),
                                '\App\Entity\\' . ucfirst($this->model),
                                true);
    }

    /**
     * Rechercher tous les élements d'une table en fonction d'un champs
     * 
     * @param array $criteria
     * @param array $order
     * 
     * @return object|null
     */
    public function findBy($criteria = [], $order = ['id' => 'ASC'])
    {
        return $this->db->query('SELECT * FROM ' . $this->model . $this->createWhere($criteria) . $this->createOrder($order),
                                '\App\Entity\\' . ucfirst($this->model),
                                false);
    }

    /**
     * Rechercher tous les élements d'une table en fonction d'un champs
     * 
     * @param array $criteria
     * 
     * @return object|null
     */
    public function findOneBy($criteria = [])
    {
        return $this->db->query('SELECT * FROM '. $this->model . $this->createWhere($criteria),
                            '\App\Entity\\' . ucfirst($this->model),
                            true);
    }



    /**
     * Mise en relation de deux tables en fonction d'un champs 
     * 
     * @param string $class
     * @param array $criteria
     * 
     * @return object|null
     */

    public function findByInnerJoin($class, $criteria = []){

        return $this->db->query('SELECT * FROM ' . $this->model . ' INNER JOIN ' . $class . $this->createOn($criteria),
                                '\App\Entity\\' . ucfirst($this->model),
                                true);

    }

}