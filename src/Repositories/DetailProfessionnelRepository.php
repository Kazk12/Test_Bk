<?php

final class DetailProfessionnelRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }



    public function findById(int $id): ?DetailProfessionnel
    {
        $sql = "SELECT * FROM detail_professionnel WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $detailProData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$detailProData) {
            return null;
        }

        return DetailProfessionnelMapper::mapToObject($detailProData);
    }

    // public function findAll(): array
    // {
    //     $sql = "SELECT * FROM users";
    //     $stmt = $this->pdo->query($sql);
    //     $userDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     $users = [];

    //     foreach($userDatas as $userData){
    //         $users[] = UserMapper::mapToObject($userData);
    //     }

    //     return $users;
    // }


    public function create(DetailProfessionnel $DetailProfessionnel): DetailProfessionnel
    {
        $sql = "INSERT INTO detail_professionnel (adresse_entreprise, nom_entreprise) VALUES (:adresse_entreprise, :nom_entreprise)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(DetailProfessionnelMapper::mapToArray($DetailProfessionnel)
        );
        $id = $this->pdo->lastInsertId();

        $DetailProfessionnel->setId($id);

        return $DetailProfessionnel;
    }
  


    // public function updateGeneralInfo(User $user): void
    // {
    //     $sql = "UPDATE users SET (user_email = :user_email, user_nom = :user_nom, user_prenom = :user_prenom, user_tel = :user_tel ) WHERE id = :id";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([
    //         'id' => $user->getId(),
    //         'user_email' => $user->getEmail(),
    //         'user_nom' => $user->getNom(),
    //         'user_prenom' => $user->getPrenom(),
    //         'user_tel' => $user->getTel(),
    //     ]
    //     );
    // }


    // public function updateLevel(Heros $hero): void
    // {
    //     $sql = "UPDATE heros SET pv = :pv, attaque = :attaque, level = :level WHERE id = :id";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([
    //         'id' => $hero->getId(),
    //         'pv' => $hero->getPv(),
    //         'attaque' => $hero->getAttaque(),
    //         'level' => $hero->getLevel(),
    //     ]
    //     );
    // }
}