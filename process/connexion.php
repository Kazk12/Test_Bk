<?php 


require_once '../connect/connectDB.php';
session_start();

if (!isset($_POST['user_email']) || empty(trim($_POST['user_email'])) || !isset($_POST['user_password']) || empty(trim($_POST['user_password']))) {
    echo "Le pseudo et le mot de passe sont requis.";
    exit;
}

$user_email = htmlspecialchars(trim($_POST['user_email']));
$user_password = trim($_POST['user_password']);

try {
    // Vérifier si le pseudo existe
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user_email = :user_email');
    $stmt->execute([':user_email' => $user_email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($user && !password_verify($user_password, $user['user_password'])) {
        
        header("Location: ../connexion.php?error=Connexion");
        exit;


       } else {
        
         $_SESSION['user'] = [
            'id' => $user['id'],
            'nom' => $user['user_nom'],
            'prenom' => $user['user_prenom'],
            'email' => $user['user_email'],
            'tel' => $user['user_tel'],
            'role' => $user['role'],
        ];
        
        }


     } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
     }


     header("Location: ../front/accueil/accueil.php");
exit;




