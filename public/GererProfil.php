<?php 

include_once '../utils/autoload.php';


session_start();


var_dump($_SESSION['user']->getId());


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<?php include_once('./assets/composant/header.php'); ?>

<main>



<!-- SECTION POUR MODIFIER LES INFO DE BASE DE L'UTILISATEUR -->


<section class="mt-4">
    <div class="flex gap-4 my-4">
        <img src="./assets/images/Tsuna.jpg" alt="PP Utilisateur" class="rounded-full h-20 w-20">
        <div>
            <h2>
                <?= $_SESSION['user']->getNom(); ?>
            </h2>
            <form action="submit.php" method="POST">
    <textarea id="description" name="description" rows="2" cols="50" placeholder="Écrivez votre description ici..."></textarea><br>
</form>

        </div>
    </div>
    <form action="./process/process_updateInfo.php" method="POST" class="space-y-6">
    <?php  
        if(isset($_GET['error'])) {
            echo "<p class='text-red-500 text-center mb-4'>Veuillez à remplir tous les champs.</p>";
        }
        
        ?>
         <?php
            if (isset($_GET['errorTel'])) {
                echo "<p class='text-red-500 text-center mb-4'>Le format du téléphone est : 00 00 00 00 00.</p>";
            }
?>
    <div class="flex flex-wrap gap-4 px-4">
   
        <div class="w-[48%]">
            <label for="nom" class="block">Nom</label>
            <input type="text" name="user_nom" id="nom" class="w-full p-2 border border-gray-300 rounded-md mt-1" value="<?= $_SESSION['user']->getNom(); ?>">
        </div>
        <div class="w-[48%]">
            <label for="prenom" class="block">Prénom</label>
            <input type="text" name="user_prenom" id="prenom" class="w-full p-2 border border-gray-300 rounded-md mt-1" value="<?= $_SESSION['user']->getPrenom(); ?>">
        </div>
        <div class="w-[48%]">
            <label for="email" class="block">Email</label>
            <input type="email" name="user_email" id="email" class="w-full p-2 border border-gray-300 rounded-md mt-1" value="<?= $_SESSION['user']->getEmail(); ?>">
        </div>
        <div class="w-[48%]">
            <label for="tel" class="block">Téléphone</label>
            <input type="tel" name="user_tel" id="tel" class="w-full p-2 border border-gray-300 rounded-md mt-1" value="<?= $_SESSION['user']->getTel(); ?>">
        </div>
    </div>

    <div class="flex gap-4 px-4">
        <button type="reset" class="w-full sm:w-auto bg-gray-200 text-gray-800 py-2 px-4 rounded-md">Annuler</button>
        <button type="submit" class="w-full sm:w-auto bg-red-300 text-white py-2 px-4 rounded-md">Sauvegarder</button>
    </div>
</form>

</section>



<!-- SECTION POUR MODIFIER LE MDP DE L'UTILISATEUR -->


<section class="mb-4">

<h2 class="text-2xl font-bold bg-[#D9D9D9] py-4 text-center mt-8">
    Changer de mot de passe
</h2>



<form action="../../process/changerPassword.php" method="POST" class="space-y-6">
<?php  
        if(isset($_GET['error1'])) {
            echo "<p class='text-red-500 text-center mb-4'>Vôtre nouveau mot de passe ne correspond pas à la confirmation du mot de passe.</p>";
        }
        if(isset($_GET['success'])) {
            echo "<p class='text-green-500 text-center mb-4'>Modification bien pris en compte.</p>";
        }
        if(isset($_GET['error2'])) {
            echo "<p class='text-red-500 text-center mb-4'>Bizarre c'est pas bon.</p>";
        }
        
        ?>
    <div class="flex flex-wrap gap-4 p-4">
        <div class="w-[100%]">
            <label for="password" class="block text-center">Votre mot de passe</label>
            <input type="password" name="user_password" id="passwordUtilisateur" class="w-full p-2 border border-gray-300 rounded-md mt-1">
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



<?php include_once('./assets/composant/footer.php'); ?>



</main>


    
</body>
</html>