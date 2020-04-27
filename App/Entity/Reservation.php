<?php

namespace App\Entity;

class Reservation
{
    /**
     * Id de la réservation
     * 
     * @var int
     */
    private $id;

    /**
     * Id de l'utilisateur ayant fait la réservation
     * 
     * @var int
     */
    private $user;

    /**
     * Id de l'animal réservé
     * 
     * @var int
     */
    private $animal;

    /**
     * Date du rendez-vous
     * 
     * @var datetime
     */
    private $rendezvous;

    /**
     * Date de la réservation
     * 
     * @var datetime
     */
    private $datetime;

    /**
     * Récupérer l'id de la réservation
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id de a réservation
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Récupérer l'utilisateur ayant fait la réservation
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Définir l'utilisateur ayant fait la réservation
     * 
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Récupérer l'id de l'animal réservé
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Définir l'id de l'animal réservé
     * 
     * @return self
     */
    public function setAnimal($animal)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Récupérer la date du rendez-vous
     */
    public function getRendezVous()
    {
        return $this->rendezvous;
    }

    /**
     * Définir la date du rendez-vous
     * 
     * @return self
     */
    public function setRendezVous($rendezvous)
    {
        $this->rendezvous = $rendezvous;

        return $this;
    }

    /**
     * Récupérer la date de la réservation
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Définir la date de la réservation
     * 
     * @return self
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

}