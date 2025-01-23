<?php

class detail_professionnel
{
    private int $id;
    private int $user_id;
    private string $adresse_entreprise;
    private string $nom_entreprise;

    public function __construct(int $id, int $user_id, string $adresse_entreprise, string $nom_entreprise)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->adresse_entreprise = $adresse_entreprise;
        $this->nom_entreprise = $nom_entreprise;
    }


    /**
     * Get the value of user_id
     */ 
    public function getUser_id() : int
    {
        return $this->user_id;
    }

    /**
     * Get the value of adresse_entreprise
     */ 
    public function getAdresse_entreprise() : string
    {
        return $this->adresse_entreprise;
    }

    /**
     * Get the value of nom_entreprise
     */ 
    public function getNom_entreprise() : string
    {
        return $this->nom_entreprise;
    }
}