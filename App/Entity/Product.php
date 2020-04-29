<?php

namespace App\Entity;

class Product
{
    /**
     * Id du produit
     * 
     * @var int
     */
    private $id;

    /**
     * Nom du produit
     * 
     * @var string
     */
    private $name;

    /**
     * Type du produit
     * 
     * @var string
     */
    private $type_animal;

    /**
     * Prix du produit
     * 
     * @var decimal
     */
    private $price;

    /**
     * Stock du produit
     * 
     * @var int
     */
    private $stock;

    /**
     * Image du produit
     * 
     * @var int
     */
    private $image;

    /**
     * Récupérer l'id du produit
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id du produit
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Récupérer le nom du produit
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Définir le nom du produit
     * 
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Récupérer le type d'animal pour lequel est fait le produit
     */
    public function getTypeAnimal()
    {
        return $this->type_animal;
    }

    /**
     * Définir le type d'animal pour lequel est fait le produit
     * 
     * @return self
     */
    public function setTypeAnimal($type_animal)
    {
        $this->type_animal = $type_animal;

        return $this;
    }

    /**
     * Récupérer le prix du produit
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Définir le prix du produit
     * 
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Récupérer le stock du produit
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Définir le stock du produit
     * 
     * @return self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Récupérer le stock du produit
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Définir le stock du produit
     * 
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

}