<?php
// Démarrer la session
session_start();

// Fonction pour déconnecter l'utilisateur
if (isset($_POST['deconnexionBtn'])) {
    // Détruire la session en unset les variables de session et la session elle-même
    session_unset();
    session_destroy();

    // Redirection vers la page de connexion
    header("Location: ../connexion.php");
    exit(); 
}
?>