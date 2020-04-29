<?php

namespace Core\Model;

use Core\Model\Model;

class Query extends Model
{
    public function findAll($order = ['id' => 'ASC'])
    {
        return $this->db->query("SELECT * FROM " . $this->model . $this->createOrder($order),
                                'App\Entity\\' . ucfirst($this->model),
                                false);
    }

    public function findLast($limit, $order = ['id' => 'ASC'])
    {
        return $this->db->query("SELECT * FROM " . $this->model . $this->createOrder($order) . $this->createLimit($limit),
                                'App\Entity\\' . ucfirst($this->model),
                                false);
    }

    public function find($id){
        return $this->db->query("SELECT * FROM " . $this->model . " WHERE id=" . $id,
                                '\App\Entity\\' . ucfirst($this->model),
                                true);
    }
}