<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
</head>
<body>


<?php include_once('../../composant/header.php'); ?>



<main>


<!-- PP MODIFIER PROFIL DECO -->


<section class="flex flex-col items-center">

<img src="https://via.placeholder.com/40" alt="Photo de l'utilisateur" class="rounded-full w-20 h-20 object-cover"> 
<button class="bg-[#FFB703] text-white px-6 py-2 rounded-lg hover:bg-[#e7bc52] focus:outline-none focus:ring-2 focus:ring-red-500" onclick="window.location.href='logout_url';">
        Changer le profil
    </button>
<button class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" onclick="window.location.href='logout_url';">
        Déconnexion
    </button>

</section>


<!-- GERER SES ANNONCES -->


<section>

<h2 class="text-center text-2xl font-bold mt-4 bg-gray-400">
    Gérer ses annonces
</h2>

<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 my-4">
    <p>
        Ajouter une annonce 
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 mb-4">
    <p>
        Modifier une annonce
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 mb-4">
    <p>
        Supprimer une annonce
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


</section>


<!-- GERER LES DEMANDES DE CLIENTS -->


<section>

<h2 class="text-center text-2xl font-bold mt-4 bg-gray-400">
    Gérer les demandes des clients
</h2>

<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 my-4">
    <p>
        Reçu
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 mb-4">
    <p>
        Envoyer
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>



</section>


<!-- HISTORIQUE D'ACHAT -->

<section>

<h2 class="text-center text-2xl font-bold mt-4 bg-gray-400">
    Historique d'achat
</h2>

</section>





<?php include_once(__DIR__ . '/../../composant/footer.php'); ?>


</main>

    
</body>
</html>