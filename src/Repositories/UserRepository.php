<?php

final class UserRepository extends AbstractRepository
{

    private DetailProfessionnelRepository $detailProRepo;

    public function __construct()
    {
        parent::__construct();
        $this->detailProRepo = new DetailProfessionnelRepository();
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

        $userData = $this->getDetailProOfUser($userData);

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

        $userData = $this->getDetailProOfUser($userData);

        return UserMapper::mapToObject($userData);
    }



    public function findAll(): array
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        $userDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach($userDatas as $userData){
            $userData = $this->getDetailProOfUser($userData);
            $users[] = UserMapper::mapToObject($userData);
        }

        

        return $users;
    }


    public function create(User $user): User
    {
        $sql = "INSERT INTO users (user_email, user_nom, user_prenom, user_tel, user_description, user_password, role, detail_professionnelID) VALUES (:user_email, :user_nom, :user_prenom, :user_tel, :user_description, :user_password, :role, :detail_professionnelID)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(UserMapper::mapToArray($user));

        $id = $this->pdo->lastInsertId();

        $user->setId($id);

        return $user;

    }
  

    private function getDetailProOfUser(array $userData): array
    {
        if($userData['detail_professionnelID']){
            $userData['detail_professionnelID'] = $this->detailProRepo->findById($userData['detail_professionnelID']);
        }

        return $userData;
    }


    public function updateGeneralInfo(User $user): void
    {
        $sql = "UPDATE users SET (user_email = :user_email, user_nom = :user_nom, user_prenom = :user_prenom, user_tel = :user_tel ) WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $user->getId(),
            ':user_email' => $user->getEmail(),
            ':user_nom' => $user->getNom(),
            ':user_prenom' => $user->getPrenom(),
            ':user_tel' => $user->getTel(),
        ]
        );
    }


    

    
}