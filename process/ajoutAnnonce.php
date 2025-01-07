<?php
session_start();
require_once '../connect/connectDB.php'; 

// if (!isset($_SESSION['user'])) {
//     header('Location: ../../index.php');
//     exit;
// }


if (!isset($_POST['genre']) || empty(trim($_POST['genre']))
|| !isset($_POST['etat']) || empty(trim($_POST['etat']))
|| !isset($_POST['titre']) || empty(trim($_POST['titre']))
|| !isset($_POST['description_courte']) || empty(trim($_POST['description_courte']))
|| !isset($_POST['description_longue']) || empty(trim($_POST['description_longue']))
|| !isset($_POST['prix']) || empty(trim($_POST['prix']))) {
    echo "Veuillez remplir tous les champs";
    exit;
}




$genre = htmlspecialchars(trim($_POST['genre']));
$etat = htmlspecialchars(trim($_POST['etat']));
$titre = htmlspecialchars(trim($_POST['titre']));
$description_courte = htmlspecialchars(trim($_POST['description_courte']));
$description_longue = htmlspecialchars(trim($_POST['description_longue']));
$prix = htmlspecialchars(trim($_POST['prix']));



var_dump($_SESSION);
var_dump($_POST);

var_dump($_FILES['image']);

die();


if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_FILES['image'])) {
    $user_id = $_SESSION["user"]["id"];
    $photo = $_FILES['image'];

    if ($photo['error'] === UPLOAD_ERR_OK) {
       
        $uploadDir = '../assets/photos/';
        $fileName = uniqid() . basename($photo['name']);
        $uploadPath = $uploadDir . $fileName;

      
        if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {
            $url_photo = $uploadPath;

            
            try {
                $sql = "INSERT INTO livre (id_seller, genre, etat, url_image, titre, description_courte, description_longue, prix) VALUES (:id_seller, :url_image, :genre, :etat, :titre, :description_courte, :description_longue, :prix)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_user', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':url_photo', $url_photo, PDO::PARAM_STR);
                $stmt->bindParam(':texteimage', $texteimage, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo "Image ajoutée avec succès.";
                } else {
                    echo "Erreur lors de l'ajout de l'image.";
                }
            } catch (PDOException $e) {
                echo "Erreur de base de données : " . $e->getMessage();
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Erreur d'upload d'image.";
    }



 

}