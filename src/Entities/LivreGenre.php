<?php 

abstract class LivreGenre
{
    private int $id;
    private Livre $idLivre;
    private Genre $idGenre;

    public function __construct(int $id, Livre $idLivre, Genre $idGenre)
    {
        $this->id = $id;
        $this->idLivre = $idLivre;
        $this->idGenre = $idGenre;

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of idLivre
     */ 
    public function getIdLivre()
    {
        return $this->idLivre;
    }

    /**
     * Get the value of idGenre
     */ 
    public function getIdGenre()
    {
        return $this->idGenre;
    }

    /**
     * Set the value of idLivre
     *
     * @return  self
     */ 
    public function setIdLivre($idLivre)
    {
        $this->idLivre = $idLivre;

        return $this;
    }

    /**
     * Set the value of idGenre
     *
     * @return  self
     */ 
    public function setIdGenre($idGenre)
    {
        $this->idGenre = $idGenre;

        return $this;
    }
}