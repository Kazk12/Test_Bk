<?php

final class EtatRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM etat";
        $stmt = $this->pdo->query($sql);
        $etatDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $etats = [];

        foreach($etatDatas as $etatData){
            $etats[] = EtatMapper::mapToObject($etatData);
        }
        return $etats;
    }


    public function findById(int $id): ?Etat
    {
        $sql = "SELECT * FROM etat WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $etatData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$etatData) {
            return null;
        }

        return EtatMapper::mapToObject($etatData);
    }

}