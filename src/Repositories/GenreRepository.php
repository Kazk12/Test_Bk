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
            $genres[] = EtatMapper::mapToObject($genreData);
        }
        return $genres;
    }

}