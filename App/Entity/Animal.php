<?php

namespace App\Entity;

class Animal
{
    /**
     * Id de l'animal
     * 
     * @var int
     */
    private $id;

    /**
     * Nom de l'animal
     * 
     * @var string
     */
    private $name;

    /**
     * Type de l'animal
     * 
     * @var string
     */
    private $type;

    /**
     * Race de l'animal
     * 
     * @var string
     */
    private $race;

    /**
     * Size de l'animal
     * 
     * @var int
     */
    private $size;

    /**
     * Weight de l'animal
     * 
     * @var int
     */
    private $weight;

    /**
     * Age de l'animal
     * 
     * @var int
     */
    private $age;

    /**
     * Récupérer l'id de l'animal
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id de l'animal
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Récupérer le nom de l'animal
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Définir le nom de l'animal
     * 
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Récupérer le type de l'animal
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Définir le type de l'animal
     * 
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Récupérer la race de l'animal
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Définir la race de l'animal
     * 
     * @return self
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Récupérer la taille de l'animal
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Définir la taille de l'animal
     * 
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Récupérer le poids de l'animal
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Définir le poids de l'animal
     * 
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Récupérer l'âge de l'animal
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Définir l'âge de l'animal
     * 
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }
}