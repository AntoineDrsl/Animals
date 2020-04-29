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
     * 
     * @return object|null
     */
    public function find($id){
        return $this->db->query("SELECT * FROM " . $this->model . " WHERE id=" . $id,
                                '\App\Entity\\' . ucfirst($this->model),
                                true);
    }

    /**
     * Rechercher tous les élements d'une table en fonction d'un champs
     * 
     * @param string $field
     * @param string $value
     * 
     * @return object|null
     */
    public function findBy($field, $value) {
        return $this->db->query("SELECT * FROM " . $this->model . " WHERE " . $field . "= '" . $value . "'",
                                '\App\Entity\\' . ucfirst($this->model),
                                true);
    }
}