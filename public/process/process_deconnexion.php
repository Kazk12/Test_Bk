<?php


session_start();

if (isset($_POST['deconnexionBtn'])) {


    session_unset();
    session_destroy();

    header("Location: ../connexion.php");
    exit(); 
}
?>