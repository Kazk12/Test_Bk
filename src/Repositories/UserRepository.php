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
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        $userDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach($userDatas as $userData){
            $users[] = UserMapper::mapToObject($userData);
        }

        return $users;
    }


    public function create(User $user): void
    {
        $sql = "INSERT INTO users (user_email, user_nom, user_prenom, user_tel, user_description, user_password, role) VALUES (:user_email, :user_nom, :user_prenom, :user_tel, :user_description, :user_password, :role)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(UserMapper::mapToArray($user)
        );
    }
  


    public function updateGeneralInfo(User $user): void
    {
        $sql = "UPDATE users SET (user_email = :user_email, user_nom = :user_nom, user_prenom = :user_prenom, user_tel = :user_tel ) WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $user->getId(),
            'user_email' => $user->getEmail(),
            'user_nom' => $user->getNom(),
            'user_prenom' => $user->getPrenom(),
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