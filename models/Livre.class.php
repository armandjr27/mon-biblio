<?php
class Livre
{
    private $id;
    private $titre;
    private $auteur;
    private $date_edition;
    private $image;
    private $created_at;

    public function __construct($id, $titre, $auteur, $date_edition, $image, $created_at = null)
    {
        $this->id           = $id;
        $this->titre        = $titre;
        $this->auteur       = $auteur;
        $this->date_edition = $date_edition;
        $this->image        = $image;
        $this->created_at   = $created_at;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre($titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     */
    public function setAuteur($auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of date_edition
     */
    public function getDateEdition()
    {
        return $this->date_edition;
    }

    /**
     * Set the value of date_edition
     */
    public function setDateEdition($date_edition): self
    {
        $this->date_edition = $date_edition;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}