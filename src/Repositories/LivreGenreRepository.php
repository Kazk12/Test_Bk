<?php

final class LivreGenreRepository extends AbstractRepository
{

    private LivreRepository $livre;
    private GenreRepository $genre;

    public function __construct()
    {
        parent::__construct();
        $this->livre = new LivreRepository();
        $this->genre = new GenreRepository();
    }


    public function find(int $id): ?LivreGenre
    {
        $sql = "SELECT * FROM livre_genre WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $LivreGenreData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$LivreGenreData) {
            return null;
        }

        $LivreGenreData = $this->getLivre($LivreGenreData);
        $LivreGenreData = $this->getGenre($LivreGenreData);

        return LivreGenreMapper::mapToObject($LivreGenreData);
    }


    public function findAll(): array
    {
        $sql = "SELECT * FROM livre_genre";
        $stmt = $this->pdo->query($sql);
        $LivreGenreDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach($LivreGenreDatas as $LivreGenreData){
            $LivreGenreData = $this->getLivre($LivreGenreData);
            $LivreGenreData = $this->getGenre($LivreGenreData);
            $livres[] = LivreGenreMapper::mapToObject($LivreGenreData);
        }
        return $livres;
    }


    private function getLivre(array $LivreData): array
    {
        if($LivreData['id_livre']){
            $LivreData['id_livre'] = $this->livre->findById($LivreData['id_livre']);
        }

        return $LivreData;
    }

    private function getGenre(array $GenreData): array
    {
        if($GenreData['id_genre']){
            $GenreData['id_genre'] = $this->genre->findById($GenreData['id_genre']);
        }

        return $GenreData;
    }

}