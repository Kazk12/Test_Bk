<?php
session_start();
require_once '../connect/connectDB.php'; 


if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}




if (!isset($_POST['genre']) || empty(trim($_POST['genre']))
|| !isset($_POST['etat']) || empty(trim($_POST['etat']))
|| !isset($_POST['titre']) || empty(trim($_POST['titre']))
|| !isset($_POST['descriptionCourte']) || empty(trim($_POST['descriptionCourte']))
|| !isset($_POST['descriptionLongue']) || empty(trim($_POST['descriptionLongue']))
|| !isset($_POST['prix']) || empty(trim($_POST['prix']))) {
    echo "Test";
    exit;
}







$genre = htmlspecialchars(trim($_POST['genre']));
$etat = htmlspecialchars(trim($_POST['etat']));
$titre = htmlspecialchars(trim($_POST['titre']));
$description_courte = htmlspecialchars(trim($_POST['descriptionCourte']));
$description_longue = htmlspecialchars(trim($_POST['descriptionLongue']));
$prix = htmlspecialchars(trim($_POST['prix']));


if (!strpos($prix, ',')) {
    header("Location: ../front/ajoutAnnonce/ajout.php?error=price");
    exit;
}

if (!preg_match('/^[0-9]+,[0-9]{2}$/', $prix)) {
    header("Location: ../front/ajoutAnnonce/ajout.php?error=two_decimal_places"); 
    exit;
}

$prix = str_replace(',', '.', $prix);

$prix_float = (float)$prix;

$prix_int = (int)($prix_float * 100);



    $user_id = $_SESSION["user"]["id"];
    $photo = $_FILES['image'];

  

    if ($photo['error'] === UPLOAD_ERR_OK) {
       
        $uploadDir = '../assets/imagesAnnonce/';
        $fileName = uniqid() . basename($photo['name']);
        $uploadPath = $uploadDir . $fileName;

      
        if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {
            $url_photo = $uploadPath;

            
            try {
                $sql = "INSERT INTO livre (id_seller, genre, etat, url_image, titre, description_courte, description_longue, prix) VALUES (:id_seller, :genre, :etat, :url_image, :titre, :description_courte, :description_longue, :prix)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_seller', $_SESSION["user"]["id"], PDO::PARAM_INT);
                $stmt->bindParam(':url_image', $url_photo, PDO::PARAM_STR);
                $stmt->bindParam(':genre', $genre, PDO::PARAM_INT);
                $stmt->bindParam(':etat', $etat, PDO::PARAM_INT);
                $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
                $stmt->bindParam(':description_courte', $description_courte, PDO::PARAM_STR);
                $stmt->bindParam(':description_longue', $description_longue, PDO::PARAM_STR);
                $stmt->bindParam(':prix', $prix_int, PDO::PARAM_INT);

              

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



    try {
        $sql = "INSERT INTO livre_genre (id_livre, id_genre) VALUES (:id_livre, :id_genre)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_livre', $pdo->lastInsertId(), PDO::PARAM_INT);
        $stmt->bindParam(':id_genre', $genre, PDO::PARAM_INT);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }

    
header("Location: ../front/profil/profil.php");
 



