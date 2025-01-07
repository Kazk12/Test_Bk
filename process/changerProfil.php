<?php

require_once '../connect/connectDB.php';
session_start();

if (!isset($_POST['user_nom']) || empty(trim($_POST['user_nom'])) || !isset($_POST['user_prenom']) || empty(trim($_POST['user_prenom'])) || !isset($_POST['user_email']) || empty(trim($_POST['user_email']))) {
    header("Location: ../front/GererProfil/GererProfil.php?error=empty");
    exit;
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

var_dump($_POST);
var_dump($_SESSION);

$user_id = $_SESSION['user']['id'];
$user_nom = $_POST['user_nom'];
$user_prenom = $_POST['user_prenom'];
$user_email = $_POST['user_email'];
$user_tel = $_POST['user_tel'];
$role = $_SESSION['user']['role'];


try {
    $sql = "SELECT * FROM `users` ;
UPDATE users SET user_nom = :user_nom, user_prenom = :user_prenom, user_email = :user_email, user_tel = :user_tel 
WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':user_nom' => $user_nom, ':user_prenom' => $user_prenom, ':user_email' => $user_email, ':user_tel' => $user_tel, ':user_id' => $user_id]);

    
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion : " . $e->getMessage();
}



$_SESSION['user'] = [
    'id' => $user_id,
    'nom' => $user_nom,
    'prenom' => $user_prenom,
    'email' => $user_email,
    'tel' => $user_tel,
    'role' => $role,

];

header("Location: ../front/GererProfil/GererProfil.php");
exit;