<?php

final class GenreRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM genre";
        $stmt = $this->pdo->query($sql);
        $genreDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $genres = [];

        foreach($genreDatas as $genreData){
            $genres[] = GenreMapper::mapToObject($genreData);
        }
        return $genres;
    }

  

    public function findById(int $id): ?Genre
    {
        $sql = "SELECT * FROM genre WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $genreData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$genreData) {
            return null;
        }

        return LivreMapper::mapToObject($genreData);
    }

}