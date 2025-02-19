<?php 

include_once '../utils/autoload.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer Profil</title>
    <link rel="stylesheet" href="../styles/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php include_once('./assets/composant/header.php'); ?>

<main class="container mx-auto p-4">

    <!-- SECTION POUR MODIFIER LES INFO DE BASE DE L'UTILISATEUR -->
    <section class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
            <img src="./assets/images/Tsuna.jpg" alt="PP Utilisateur" class="rounded-full h-20 w-20 object-cover">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-semibold"><?= $_SESSION['user']->getNom(); ?></h2>
                <form action="submit.php" method="POST">
                    <textarea id="description" name="description" rows="2" cols="50" placeholder="Écrivez votre description ici..." class="mt-2 p-2 w-full border border-gray-300 rounded-md"></textarea>
                </form>
            </div>
        </div>
        <form action="./process/process_updateInfo.php" method="POST" class="space-y-6">
            <?php  
                if(isset($_GET['error'])) {
                    echo "<p class='text-red-500 text-center mb-4'>Veuillez à remplir tous les champs.</p>";
                }
                if (isset($_GET['errorTel'])) {
                    echo "<p class='text-red-500 text-center mb-4'>Le format du téléphone est : 00 00 00 00 00.</p>";
                }
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="user_nom" id="nom" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $_SESSION['user']->getNom(); ?>">
                </div>
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="user_prenom" id="prenom" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $_SESSION['user']->getPrenom(); ?>">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="user_email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $_SESSION['user']->getEmail(); ?>">
                </div>
                <div>
                    <label for="tel" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="tel" name="user_tel" id="tel" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $_SESSION['user']->getTel(); ?>">
                </div>
            </div>
            <div class="flex justify-end gap-4">
                <button type="reset" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md">Annuler</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Sauvegarder</button>
            </div>
        </form>
    </section>

    <!-- SECTION POUR MODIFIER LE MDP DE L'UTILISATEUR -->
    <section class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Changer de mot de passe</h2>
        <form action="./process/process_updatePassword.php" method="POST" class="space-y-6">
            <?php  
                if(isset($_GET['error1'])) {
                    echo "<p class='text-red-500 text-center mb-4'>Votre nouveau mot de passe ne correspond pas à la confirmation du mot de passe.</p>";
                }
                if(isset($_GET['success'])) {
                    echo "<p class='text-green-500 text-center mb-4'>Modification bien prise en compte.</p>";
                }
                if(isset($_GET['error2'])) {
                    echo "<p class='text-red-500 text-center mb-4'>Bizarre, ce n'est pas bon.</p>";
                }
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label for="passwordUtilisateur" class="block text-sm font-medium text-gray-700 text-center">Votre mot de passe</label>
                    <input type="password" name="user_password" id="passwordUtilisateur" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="newPassword" class="block text-sm font-medium text-gray-700">Votre nouveau mot de passe</label>
                    <input type="password" name="newPassword" id="newPassword" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="ConfirmPassword" class="block text-sm font-medium text-gray-700">Confirmation mot de passe</label>
                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
            </div>
            <div class="flex justify-end gap-4">
                <button type="reset" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md">Annuler</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Sauvegarder</button>
            </div>
        </form>
    </section>

    <?php include_once('./assets/composant/footer.php'); ?>

</main>

</body>
</html>