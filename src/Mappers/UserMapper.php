<?php

class UserMapper {

    public static function mapToObject(array $data): User {

        $id = $data["id"];
        $nom = $data["user_nom"];
        $prenom = $data["user_prenom"];
        $email = $data["user_email"];
        $tel = $data["user_tel"];
        $description = $data["user_description"];
        $password = $data["user_password"];
        $role = $data["role"];


        $user = new User($nom, $prenom, $email, $tel, $description, $role, $password, $id );

    
        return $user;
    }


    public static function mapToArray(User $user)
    {
        return [
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'tel' => $user->getTel(),
            'description' => $user->getDescription(),
            'role' => $user->getRole(),
            'password' => $user->getPassword(),
        ];
    }

    
}