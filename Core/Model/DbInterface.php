<?php

namespace Core\Model;

use Core\Model\Model;

class DbInterface extends Model
{
    /**
     * Enregistrer en base de données
     * 
     * @param array $data
     * @param string $class
     * 
     * @return void
     */
    public function save($data, $class) {

        $statement = "INSERT INTO " . $class . "(";

        foreach($data as $key => $value) {
            $statement .= $key . ', ';
        }
        $statement = substr($statement, 0, -2) . ") VALUES (";

        foreach($data as $key => $value) {
            $statement .= ':' . $key . ', ';
        }
        $statement = substr($statement, 0, -2) . ")";

        foreach($data as $key => $value) {
            $key = ':' . $key;
            $value = htmlspecialchars($value);
        }

        $this->db->prepare($statement, $data);
    }

    /**
     * Modifier un élément en base de données
     * 
     * @param string $class
     * @param array $data
     * @param int $id
     * 
     * @return void
     */
    public function update($class, $data, $id)
    {       
        $statement = "UPDATE " . $class . " SET ";

        foreach ($data as $key => $value) {
            if(empty($value)) {
                $statement .= $key . " = null, " ;
            }
            elseif (is_string($value)) {
                $statement .= $key . ' = "' . $value . '", ';
            }
        }
        $statement = substr($statement, 0, -2);
        $statement .= " WHERE id=" . $id;
        
        $this->db->exec($statement);
    }

    /**
     * Supprimer un élément en base de données
     * 
     * @param string $class
     * @param int $id
     * 
     * @return void
     */
    public function delete($class, $id)
    {
        $this->db->exec('DELETE FROM ' . $class . ' WHERE id=' . $id);
    }
}