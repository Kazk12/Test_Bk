<?php

class DetailProfessionnel
{
    private ?int $id;
    private string $adresseEntreprise;
    private string $nomEntreprise;

    public function __construct(string $adresseEntreprise, string $nomEntreprise, ?int $id = null)
    {
        $this->id = $id;
        $this->adresseEntreprise = $adresseEntreprise;
        $this->nomEntreprise = $nomEntreprise;
    }


    /**
     * Get the value of user_id
     */ 
    public function getId() : ?int
    {
        return $this->id;
    }


    /**
     * Set the value of user_id
     */ 
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of adresse_entreprise
     */ 
    public function getAdresseEntreprise() : string
    {
        return $this->adresseEntreprise;
    }

    /**
     * Get the value of nom_entreprise
     */ 
    public function getNomEntreprise() : string
    {
        return $this->nomEntreprise;
    }

    /**
     * Set the value of adresse_entreprise
     *
     * @return  self
     */ 
    public function setAdresse_entreprise($adresseEntreprise)
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }

    /**
     * Set the value of nom_entreprise
     *
     * @return  self
     */ 
    public function setNom_entreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }
}