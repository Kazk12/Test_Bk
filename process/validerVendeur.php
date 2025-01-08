<?php 

require_once('../connect/connectDB.php');
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}

$id = $_POST['user_id'];

try {
    $sql = "UPDATE users SET role = 2 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    header('Location: ../front/devenirVendeur/devenirVendeur.php?success=1');
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}