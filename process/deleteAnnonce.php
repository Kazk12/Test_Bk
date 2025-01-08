<?php 

require_once('../connect/connectDB.php');
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}

$id = $_POST['user_id'];

try {
    $sql = "DELETE FROM detail_professionnel where user_id = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    header('Location: ../front/devenirVendeur/devenirVendeur.php?delete=1');
    exit;
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}