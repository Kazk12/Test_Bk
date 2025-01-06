<?php

require_once '../connect/connectDB.php';
session_start();

if (!isset($_POST['user_email']) || empty(trim($_POST['user_email']))
|| !isset($_POST['user_nom']) || empty(trim($_POST['user_nom']))
|| !isset($_POST['user_prenom']) || empty(trim($_POST['user_prenom']))
|| !isset($_POST['user_tel']) || empty(trim($_POST['user_tel']))
|| !isset($_POST['role']) || empty(trim($_POST['role']))
|| !isset($_POST['user_password']) || empty(trim($_POST['user_password']))) {
    echo "Veuillez remplir tous les champs";
    exit;
}

if ($_POST['role'] == 2) {
    if (!isset($_POST['adresse_entreprise']) || empty(trim($_POST['adresse_entreprise']))
    || !isset($_POST['nom_entreprise']) || empty(trim($_POST['nom_entreprise']))) {
        echo "L'adresse et le nom de l'entreprise sont requis.";
        exit;
    }
}


// Fonction pour valider et formater le numéro de téléphone
function formatPhoneNumber($phone) {
    // Enlever tous les caractères non numériques (y compris les espaces)
    $phone = preg_replace('/\D/', '', $phone);

    // Vérifier si le numéro a bien 10 chiffres
    if (strlen($phone) == 10) {
        // Retourner le numéro sans formatage (on le formatera plus tard pour l'affichage)
        return $phone;
    } else {
        return false; // Si le numéro n'a pas 10 chiffres, renvoyer false
    }
}

if (!isset($_POST['user_tel']) || empty(trim($_POST['user_tel']))) {
    echo "Le numéro de téléphone est requis.";
    exit;
}

// Valider et formater le numéro de téléphone
$user_tel = formatPhoneNumber(trim($_POST['user_tel']));

if ($user_tel === false) {
    echo "Le numéro de téléphone doit être au format 00 00 00 00 00.";
    exit;
}



$user_email = htmlspecialchars(trim($_POST['user_email']));
$user_nom = htmlspecialchars(trim($_POST['user_nom']));
$user_prenom = htmlspecialchars(trim($_POST['user_prenom']));
$role = htmlspecialchars(trim($_POST['role']));
$user_password = trim($_POST['user_password']);





try {
    // Vérifier si le pseudo existe
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user_email = :user_email');
    $stmt->execute([':user_email' => $user_email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user) {
        header("Location: ../index.php?error=Email");
        exit;
    }
   
    if (!$user) {

        $hash = password_hash($user_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user_email, user_nom, user_prenom, user_tel, user_password, role) VALUES (:user_email, :user_nom, :user_prenom, :user_tel, :user_password, :role)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':user_email' => $user_email,
        ':user_nom' => $user_nom,
        ':user_prenom' => $user_prenom,
        ':user_tel' => $user_tel,
        ':role' => 3,
         ':user_password' => $hash]);

        $_SESSION['user'] = [
            'id' => $pdo->lastInsertId(),
            'nom' => $user_nom,
            'prenom' => $user_prenom,
            'email' => $user_email,
            'tel' => $user_tel,
        ];
    } 

  
    if ($role == 2) {
        $adresse_entreprise = htmlspecialchars(trim($_POST['adresse_entreprise']));
        $nom_entreprise = htmlspecialchars(trim($_POST['nom_entreprise']));

        $sql = "INSERT INTO detail_professionnel (user_id, adresse_entreprise, nom_entreprise) VALUES (:user_id, :adresse_entreprise, :nom_entreprise)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':user_id' => $pdo->lastInsertId(),
        ':adresse_entreprise' => $adresse_entreprise,
        ':nom_entreprise' => $nom_entreprise]);
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion : " . $e->getMessage();
}

var_dump($user_tel);
die();








?>