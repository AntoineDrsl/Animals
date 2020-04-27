<?php

namespace App\Entity;

class Donation
{
    /**
     * Id de la donation
     * 
     * @var int
     */
    private $id;

    /**
     * Id du user lié à la donation
     * 
     * @var int
     */
    private $user;

    /**
     * Montant de la donation
     * 
     * @var decimal
     */
    private $amount;

    /**
     * Date de la donation
     * 
     * @var datetime
     */
    private $datetime;

    /**
     * Récupérer l'id de la donation
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id de la donation
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Récupérer l'id du user lié à la donation
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Définir l'id du user lié à la donation
     * 
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Récupérer le montant de la donation
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Définir le montant de la donation
     * 
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Récupérer la date de la donation
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Définir la date de la donation
     * 
     * @return self
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }
}