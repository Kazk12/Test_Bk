<?php

final class livreRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }


    public function find(int $id): ?livre
    {
        $sql = "SELECT * FROM livre WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $livreData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$livreData) {
            return null;
        }

        return livreMapper::mapToObject($livreData);
    }


    public function findAll(): array
    {
        $sql = "SELECT * FROM livre";
        $stmt = $this->pdo->query($sql);
        $livreDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach($livreDatas as $livreData){
            $livres[] = livreMapper::mapToObject($livreData);
        }

        return $livres;
    }







}