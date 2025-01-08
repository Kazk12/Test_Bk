<?php 


session_start();
require_once('../connect/connectDB.php');


if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}





try {
    $sql = "DELETE FROM livre where id = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $_POST['id']]);
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}
try {
    $sql = "DELETE FROM livre_genre where id_livre = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $_POST['id']]);
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}




header('Location: ../front/annoncesDP/annoncesDP.php?delete=1');
exit;