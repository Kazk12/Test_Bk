<?php

include_once '../utils/autoload.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ./index.php');
    exit;
}

$role = $_SESSION['user']->getRole();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
    <script defer type="module" src="./assets/js/changerProfil.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<?php include_once('./assets/composant/header.php'); ?>

<main class="container mx-auto p-4">

    <!-- PP MODIFIER PROFIL DECO -->
    <section class="flex flex-col items-center bg-white p-6 rounded-lg shadow-lg">
        <img src="./assets/images/Tsuna.jpg" alt="Photo de l'utilisateur" class="rounded-full w-20 h-20 object-cover mb-4">
        <button id="changerProfilBtn" class="bg-[#FFB703] text-white px-6 py-2 rounded-lg hover:bg-[#e7bc52] focus:outline-none focus:ring-2 focus:ring-red-500 mb-4">
            Changer le profil
        </button>
        <form action="./process/process_deconnexion.php" method="post">
            <button name="deconnexionBtn" id="deconnexionBtn" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Déconnexion
            </button>
        </form>
    </section>

    <!-- GERER SES ANNONCES -->
    <?php if ($role == 2) : ?>
        <section class="mt-8">
            <h2 class="text-center text-2xl font-bold mb-6">Gérer ses annonces</h2>
            <a href="./ajout.php" class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Ajouter une annonce
            </a>
            <div class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Modifier une annonce
            </div>
            <div class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Supprimer une annonce
            </div>
        </section>

        <!-- GERER LES DEMANDES DE CLIENTS -->
        <section class="mt-8">
            <h2 class="text-center text-2xl font-bold mb-6">Gérer les demandes des clients</h2>
            <div class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Reçu
            </div>
            <div class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Envoyer
            </div>
        </section>
    <?php endif ?>

    <!-- GERER LES DEMANDES -->
    <?php if ($role == 1) : ?>
        <section class="mt-8">
            <h2 class="text-center text-2xl font-bold mb-6">Gérer les demandes</h2>
            <a href="./devenirVendeur.php" class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Demande pour devenir vendeur
            </a>
            <a href="./annoncesDP.php" class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Modérer les annonces
            </a>
            <div class="block bg-[#FFB703] text-white text-center py-4 rounded-lg shadow-md hover:bg-[#e7bc52] transition duration-300 mb-4">
                Modérer les utilisateurs
            </div>
        </section>
    <?php endif ?>

    <!-- HISTORIQUE D'ACHAT -->
    <section class="mt-8">
        <h2 class="text-center text-2xl font-bold mb-6">Historique d'achat</h2>
        <!-- Contenu de l'historique d'achat -->
    </section>

    <?php include_once('./assets/composant/footer.php'); ?>

</main>

</body>

</html>