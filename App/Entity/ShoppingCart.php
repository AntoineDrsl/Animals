<?php

namespace App\Entity;

class ShoppingCart
{
    /**
     * Id de la commande
     * 
     * @var int
     */
    private $id;
 
    /**
     * Id de l'utilisateur ayant passé la commande
     * 
     * @var int
     */
    private $user_id;

    /**
     * Montant total de la commande
     * 
     * @var decimal
     */
    private $total_amount;

    /**
     * Date de la commande
     * 
     * @var datetime
     */
    private $datetime;

    /**
     * Etat de la commande (1: Livré, 2: En livraison, 3: Attente de confirmation, 4: Erreur de paiement)
     * 
     * @var smallint
     */
    private $state;

    /**
     * Récupérer l'id de la commande
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id de la commande
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Récupérer l'id de l'utilisateur ayant passé la commande
     */
    public function getUser()
    {
        return $this->user_id;
    }

    /**
     * Définir l'id de l'utilisateur ayant passé la commande
     * 
     * @return self
     */
    public function setUser($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Récupérer le montant total de la commande
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * Définir le montant total de la commande
     * 
     * @return self
     */
    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    /**
     * Récupérer la date de la commande
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Définir la date de la commande
     * 
     * @return self
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Récupérer l'état de la commande
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Définir l'état de la commande
     * 
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}