<?php

final class LivreRepository extends AbstractRepository
{

    private EtatRepository $etat;
    private UserRepository $user;

    public function __construct()
    {
        parent::__construct();
        $this->etat = new EtatRepository();
        $this->user = new UserRepository();
    }

    private function getEtat(array $EtatData): array
    {
        if($EtatData['etat']){
            $EtatData['etat'] = $this->etat->findById($EtatData['etat']);
        }

        return $EtatData;
    }

    private function getUser(array $UserData): array
    {
        if($UserData['id_seller']){
            $UserData['id_seller'] = $this->user->find($UserData['id_seller']);
        }

        return $UserData;
    }


    public function findById(int $id): ?Livre
    {
        $sql = "SELECT * FROM livre WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $livreData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$livreData) {
            return null;
        }

        $livreData = $this->getEtat($livreData);
        $livreData = $this->getUser($livreData);

        // Récupère les genres
        // $arrayOfGenres = $this->findAllByLivreId($livreData["id"]);


        return LivreMapper::mapToObject($livreData);
    }


    public function findAll(): array
    {
        $sql = "SELECT * FROM livre";
        $stmt = $this->pdo->query($sql);
        $livreDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach($livreDatas as $livreData){
            $livreData = $this->getEtat($livreData);
            $livreData = $this->getUser($livreData);
            $livres[] = LivreMapper::mapToObject($livreData);
        }

        return $livres;
    }


    public function findAllByLivreId(int $id): array
    {
        $sql = "SELECT * FROM genre JOIN  livre_genre ON livre_genre.id_genre = genre.id  WHERE livre_genre.id_livre = :id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $genreDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $genres = [];

        foreach($genreDatas as $genreData){
            
            $genres[] = GenreMapper::mapToObject($genreData);
        }
        return $genres;
    }

    public function findAllLivreBySellerId(int $idSeller, int $idAnnonce): array
    {
        $sql = "SELECT livre.id, livre.id_seller, livre.etat, livre.image, livre.titre, livre.description_courte, livre.description_longue, livre.prix
          FROM `livre`
        INNER JOIN users ON users.id = livre.id_seller
        WHERE id_seller = :id_seller
         AND livre.id != :id_livre
         LIMIT 3";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_livre' => $idAnnonce,
            ':id_seller' => $idSeller,

        ]);
        $livresDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach($livresDatas as $livreData){
            $livreData = $this->getUser($livreData);
            $livreData = $this->getEtat($livreData);
            $livres[] = LivreMapper::mapToObject($livreData);
        }
        return $livres;
    }

    public function create(Livre $livre): Livre
    {
        $sql = "INSERT INTO livre (id_seller, etat, image, titre, description_courte, description_longue, prix) VALUES (:id_seller, :etat, :url_image, :titre, :description_courte, :description_longue, :prix)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(LivreMapper::mapToArray($livre));
        return $livre;

    }






}