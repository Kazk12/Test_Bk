<?php 

final class Genre
{
    private int $id;
    private string $genre;


    public function __construct(int $id, string $genre)
    {
        $this->id = $id;
        $this->genre = $genre;

    }


    /**
     * Get the value of id
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre() : string
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }
}