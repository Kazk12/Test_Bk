<?php 

final class Etat
{
    private int $id;
    private string $etat;


    public function __construct(int $id, string $etat)
    {
        $this->id = $id;
        $this->etat = $etat;
    }


    /**
     * Get the value of id
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat() : string
    {
        return $this->etat;
    }
}