<?php

final class UserRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }



    public function find(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$userData) {
            return null;
        }

        return UserMapper::mapToObject($userData);
    }



    public function findByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE user_email = :user_email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$userData) {
            return null;
        }

        return UserMapper::mapToObject($userData);
    }



    public function findAll(): array
    {
        $sql = "SELECT * FROM heros";
        $stmt = $this->pdo->query($sql);
        $heroDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $heroes = [];

        foreach($heroDatas as $heroData){
            $heroes[] = HerosMapper::mapToObject($heroData);
        }

        return $heroes;
    }


    public function create(Heros $hero): void
    {
        $sql = "INSERT INTO heros (pseudo, pv, attaque, level) VALUES (:pseudo, :pv, :attaque, :level)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(
            HerosMapper::mapToArray($hero)
        );
    }


    public function updateHp(Heros $hero): void
    {
        $sql = "UPDATE heros SET pv = :pv WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $hero->getId(),
            'pv' => $hero->getPv()
        ]
        );
    }


    public function updateLevel(Heros $hero): void
    {
        $sql = "UPDATE heros SET pv = :pv, attaque = :attaque, level = :level WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $hero->getId(),
            'pv' => $hero->getPv(),
            'attaque' => $hero->getAttaque(),
            'level' => $hero->getLevel(),
        ]
        );
    }
}