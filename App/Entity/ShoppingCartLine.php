<?php

namespace App\Entity;

class ShoppingCartLine
{
    /**
     * Id de la ligne de commande
     * 
     * @var int
     */
    private $id;
    
    /**
     * Commande à laquelle appartient la ligne de commande
     * 
     * @var int
     */
    private $shoppingCart;

    /**
     * Produit contenu dans la ligne de commande
     * 
     * @var int
     */
    private $product;

    /**
     * Quantité du produit contenu dans la ligne de commande
     * 
     * @var int
     */
    private $quantity;

    /**
     * Montant de la ligne de commande
     * 
     * @var decimal
     */
    private $amount;

    /**
     * Récupérer l'id de la ligne de commande
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id de la ligne de commande
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Récupérer la commande à laquelle appartient la ligne de commande
     */
    public function getShoppingCart()
    {
        return $this->shoppingCart;
    }

    /**
     * Définir la commande à laquelle appartient la ligne de commande
     * 
     * @return self
     */
    public function setShoppingCart($shoppingCart)
    {
        $this->shoppingCart = $shoppingCart;

        return $this;
    }

    /**
     * Récupérer le produit contenu dans de la ligne de commande
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Définir le produit contenu dans la ligne de commande
     * 
     * @return self
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Récupérer la quantité du produit contenu dans la ligne de commande
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Définir la quantité du produit contenu dans la ligne de commande
     * 
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Récupérer le montant de la ligne de commande
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Définir le montant de la ligne de commande
     * 
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}