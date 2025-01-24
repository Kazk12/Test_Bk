<?php 


class livre
{
    private int $id;
    private int $id_seller;
 
    private int $etat;
    private string $url_image;
    private string $titre;
    private string $description_courte;
    private string $description_longue;
    private int $prix;

    public function __construct(int $id, int $id_seller,  int $etat, string $url_image, string $titre, string $description_courte, string $description_longue, int $prix)
    {
        $this->id = $id;
        $this->id_seller = $id_seller;
       
        $this->etat = $etat;
        $this->url_image = $url_image;
        $this->titre = $titre;
        $this->description_courte = $description_courte;
        $this->description_longue = $description_longue;
        $this->prix = $prix;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of id_seller
     */ 
    public function getId_seller()
    {
        return $this->id_seller;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Get the value of url_image
     */ 
    public function getUrl_image()
    {
        return $this->url_image;
    }

    /**
     * Get the value of description_courte
     */ 
    public function getDescription_courte()
    {
        return $this->description_courte;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Get the value of description_longue
     */ 
    public function getDescription_longue()
    {
        return $this->description_longue;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }
}