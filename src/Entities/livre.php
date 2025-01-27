<?php 


class livre
{
    private int $id;
    private User $id_seller;
    private Etat $etat;
    private string $url_image;
    private string $titre;
    private string $description_courte;
    private string $description_longue;
    private int $prix;

    private array $genres;

    public function __construct( User $id_seller,  Etat $etat, string $url_image, string $titre, string $description_courte, string $description_longue, int $prix, int $id = 0)
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
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * Get the value of id_seller
     */ 
    public function getId_seller() :User
    {
        return $this->id_seller;
    }


    /**
     * Get the value of etat
     */ 
    public function getEtat() :Etat
    {
        return $this->etat;
    }

    /**
     * Get the value of url_image
     */ 
    public function getUrl_image() :string
    {
        return $this->url_image;
    }

    /**
     * Get the value of description_courte
     */ 
    public function getDescription_courte() :string
    {
        return $this->description_courte;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre() :string
    {
        return $this->titre;
    }

    /**
     * Get the value of description_longue
     */ 
    public function getDescription_longue() :string
    {
        return $this->description_longue;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix() :string
    {
        return $this->prix;
    }

  

    /**
     * Set the value of id_seller
     *
     * @return  self
     */ 
    public function setId_seller($id_seller)
    {
        $this->id_seller = $id_seller;

        return $this;
    }



    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Set the value of url_image
     *
     * @return  self
     */ 
    public function setUrl_image($url_image)
    {
        $this->url_image = $url_image;

        return $this;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Set the value of description_courte
     *
     * @return  self
     */ 
    public function setDescription_courte($description_courte)
    {
        $this->description_courte = $description_courte;

        return $this;
    }

    /**
     * Set the value of description_longue
     *
     * @return  self
     */ 
    public function setDescription_longue($description_longue)
    {
        $this->description_longue = $description_longue;

        return $this;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}