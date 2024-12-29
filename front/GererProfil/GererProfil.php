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



<!-- SECTION POUR MODIFIER LES INFO DE BASE DE L'UTILISATEUR -->


<section>
    <div class="flex gap-4">
        <img src="https://via.placeholder.com/40" alt="PP Utilisateur" class="rounded-full h-20 w-20">
        <div>
            <h2>
                NOM DE L'UTILISATEUR
            </h2>
            <form action="submit.php" method="POST">
    <textarea id="description" name="description" rows="2" cols="50" placeholder="Écrivez votre description ici..."></textarea><br>
</form>

        </div>
    </div>
    <form action="" method="POST" class="space-y-6">
    <div class="flex flex-wrap gap-4 px-4">
        <div class="w-[48%]">
            <label for="nom" class="block">Nom</label>
            <input type="text" name="nom" id="nom" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
        <div class="w-[48%]">
            <label for="prenom" class="block">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
        <div class="w-[48%]">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
        <div class="w-[48%]">
            <label for="tel" class="block">Téléphone</label>
            <input type="tel" name="tel" id="tel" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
    </div>

    <div class="flex gap-4 px-4">
        <button type="reset" class="w-full sm:w-auto bg-gray-200 text-gray-800 py-2 px-4 rounded-md">Annuler</button>
        <button type="submit" class="w-full sm:w-auto bg-red-300 text-white py-2 px-4 rounded-md">Sauvegarder</button>
    </div>
</form>

</section>



<!-- SECTION POUR MODIFIER LE MDP DE L'UTILISATEUR -->


<section>

<h2 class="text-2xl font-bold bg-[#D9D9D9] py-4 text-center mt-8">
    Changer de mot de passe
</h2>


<form action="" method="POST" class="space-y-6">
    <div class="flex flex-wrap gap-4 p-4">
        <div class="w-[100%]">
            <label for="password" class="block">Votre mot de passe</label>
            <input type="password" name="passwordUtilisateur" id="passwordUtilisateur" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
        <div class="w-[48%]">
            <label for="password" class="block">Votre nouveau mot de passe</label>
            <input type="password" name="newPassword" id="newPassword" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
        <div class="w-[48%]">
            <label for="password" class="block">Confirmation mot de passe</label>
            <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="w-full p-2 border border-gray-300 rounded-md mt-1">
        </div>
        
    </div>

    <div class="flex gap-4 px-4">
        <button type="reset" class="w-full sm:w-auto bg-gray-200 text-gray-800 py-2 px-4 rounded-md">Annuler</button>
        <button type="submit" class="w-full sm:w-auto bg-red-300 text-white py-2 px-4 rounded-md">Sauvegarder</button>
    </div>
</form>

</section>



<?php include_once(__DIR__ . '/../../composant/footer.php'); ?>



</main>


    
</body>
</html>