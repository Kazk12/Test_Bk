<?php 


require_once '../connect/connectDB.php';
session_start();



if (!isset($_POST['user_password']) || empty(trim($_POST['user_password']))
    || !isset($_POST['newPassword']) || empty(trim($_POST['newPassword']))
    || !isset($_POST['ConfirmPassword']) || empty(trim($_POST['ConfirmPassword']))) {
    echo "Le pseudo et le mot de passe sont requis.";
    exit;
}

$user_password = trim($_POST['user_password']);
$newPassword = trim($_POST['newPassword']);
$confirmPassword = trim($_POST['ConfirmPassword']);

if ($newPassword !== $confirmPassword) {
    header("Location: ../front/GererProfil/GererProfil.php?error1=empty");
        exit;
}

$user_id = $_SESSION['user']['id'];


try {
    // Vérifier si le pseudo existe
    $stmt = $pdo->prepare('SELECT user_password FROM users WHERE id = :user_id');
    $stmt->execute([':user_id' => $user_id]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($user && password_verify($user_password, $user['user_password'])) {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('UPDATE users SET user_password = :user_password WHERE id = :user_id');
        $stmt->execute([':user_password' => $hash, ':user_id' => $user_id]);
        header("Location: ../front/GererProfil/GererProfil.php?success=Changement");
        exit;


       } else {
        header("Location: ../front/GererProfil/GererProfil.php?error2=empty");
        exit;}
    }
       catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
 }
