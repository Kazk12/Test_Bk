<?php

class UserMapper {

    public static function mapToObject(array $data): User {

        $id = $data["id"];
        $nom = $data["user_nom"];
        $prenom = $data["user_prenom"];
        $email = $data["user_email"];
        $tel = $data["user_tel"];
        $detailProfessionnel = $data["detail_professionnelID"];
        $description = $data["user_description"];
        $password = $data["user_password"];
        $role = $data["role"];


        $user = new User($nom, $prenom, $email, $tel, $password,  $detailProfessionnel, $description,  $role, $id );

    
        return $user;
    }


    public static function mapToArray(User $user): array
    {
        return [
            'user_nom' => $user->getNom(),
            'user_prenom' => $user->getPrenom(),
            'user_email' => $user->getEmail(),
            'user_tel' => $user->getTel(),
            'user_description' => $user->getDescription(),
            'user_password' => $user->getPassword(),
            'role' => $user->getRole(),
            'detail_professionnelID' => $user->getDetailProfessionnel() ? $user->getDetailProfessionnel()->getId() : null,
        ];
    }
}