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

}