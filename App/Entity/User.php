<?php

namespace App\Entity;

class User
{
    /**
     * Id de l'utilisateur
     * 
     * @var int
     */
    private $id;

    /**
     * Prénom de l'utilisateur
     * 
     * @var string
     */
    private $firstname;

    /**
     * Nom de l'utilisateur
     * 
     * @var string
     */
    private $lastname;

    /**
     * Adresse de l'utilisateur
     * 
     * @var string
     */
    private $address;

    /**
     * Ville de l'utilisateur
     * 
     * @var string
     */
    private $city;

    /**
     * Code postal de l'utilisateur
     * 
     * @var string
     */
    private $postalCode;

    /**
     * Email de l'utilisateur
     * 
     * @var string
     */
    private $email;

    /**
     * Téléphone de l'utilisateur
     * 
     * @var string
     */
    private $telephone;

    /**
     * Rôles de l'utilisateur
     * 
     * @var json
     */
    private $roles = [];

    /**
     * Récupérer l'id de l'utilisateur
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définir l'id de l'utilisateur
     * 
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        // Tous les utilisateurs ont le rôle ROLE_USER, comme dans Symfony
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Définir les rôles de l'utilisateur
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Récupérer le prénom de l'utilisateur
     */
    public function getFirstname()
    {
        return $this->id;
    }

    /**
     * Définir le prénom de l'utilisateur
     * 
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Récupérer le nom de l'utilisateur
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Définir le nom de l'utilisateur
     * 
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Récupérer l'adresse de l'utilisateur
     */
    public function getAddress()
    {
        return $this->id;
    }

    /**
     * Définir l'adresse de l'utilisateur
     * 
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Récupérer la ville de l'utilisateur
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Définir la ville de l'utilisateur
     * 
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Récupérer le code postal de l'utilisateur
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Définir le code postal de l'utilisateur
     * 
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Récupérer l'email de l'utilisateur
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Définir l'email de l'utilisateur
     * 
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Récupérer le téléphone de l'utilisateur
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Définir le téléphone de l'utilisateur
     * 
     * @return self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

}