<?php
class User
{
    private $id_user;
    private $prenom;
    private $nom;
    private $email;
    private $phone;
    private $genre;
    private $naissance;
    private $adresse;
    private $pass;
    private $profil;
    private $type_user;
    private $adhesion;

    public function __construct($id_user, $prenom, $nom, $email, $phone, $genre, $naissance, $adresse, $pass, $profil, $type_user, $adhesion) {
        $this->id_user   = $id_user;
        $this->prenom    = $prenom;
        $this->nom       = $nom;
        $this->email     = $email;
        $this->email     = $email;
        $this->phone     = $phone;
        $this->genre     = $genre;
        $this->naissance = $naissance;
        $this->adresse   = $adresse;
        $this->pass      = $pass;
        $this->profil    = $profil;
        $this->type_user = $type_user;
        $this->adhesion  = $adhesion;
    }

    /**
     * Get the value of id_user
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     * @param mixed $id_user
     * @return self
     */
    public function setIdUser($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     */
    public function setGenre($genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of naissance
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set the value of naissance
     */
    public function setNaissance($naissance): self
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */
    public function setAdresse($adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of profil
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     */
    public function setProfil($profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get the value of type_user
     */
    public function getTypeUser()
    {
        return $this->type_user;
    }

    /**
     * Set the value of type_user
     */
    public function setTypeUser($type_user): self
    {
        $this->type_user = $type_user;

        return $this;
    }

    /**
     * Get the value of adhesion
     */
    public function getAdhesion()
    {
        return $this->adhesion;
    }

    /**
     * Set the value of adhesion
     */
    public function setAdhesion($adhesion): self
    {
        $this->adhesion = $adhesion;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     */
    public function setPass($pass): self
    {
        $this->pass = $pass;

        return $this;
    }
}