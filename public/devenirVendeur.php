<?php
include_once '../utils/autoload.php';

$userRepo = new UserRepository();

$demandes = $userRepo->findAllDemandePro();


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<body>
    
<?php include_once('./assets/composant/header.php'); ?>

<main>

<?php 

if (isset($_GET['success'])) {
    echo "<p class='text-green-500 text-center'>La demande a bien été validée</p>";

}
if (isset($_GET['delete'])) {
    echo "<p class='text-red-500 text-center'>La demande a bien été refuser</p>";

}
?>


<?php  

foreach ($demandes as $demande) {
?>

<article class="flex flex-col sm:flex-row sm:space-x-6 bg-white p-6 rounded-lg shadow-lg mb-6">

    <!-- Informations Utilisateur -->
    <div class="flex flex-col w-full sm:w-[30%] mb-4 sm:mb-0">
        <p class="text-gray-700 font-semibold text-sm">Le nom : <?= $demande->getNom() ?></p>
        <p class="text-gray-700 font-semibold text-sm">Le prénom : <?= $demande->getPrenom() ?></p>
    </div>

    <!-- Informations sur l'entreprise -->
    <div class="flex flex-col w-full sm:w-[30%] mb-4 sm:mb-0">
        <p class="text-gray-700 font-semibold text-sm">L'adresse de l'entreprise : <?= $demande->getDetailProfessionnel()->getAdresseEntreprise() ?></p>
        <p class="text-gray-700 font-semibold text-sm">Le nom de l'entreprise : <?= $demande->getDetailProfessionnel()->getNomEntreprise() ?></p>
    </div>

    <!-- Formulaire de validation et refus -->
    <div class="flex flex-col w-full sm:w-[30%] space-y-4">
        <form action="./process/process_validerVendeur.php" method="post" class="flex flex-col items-start w-full">
            <input name="user_id" value="<?= $demande->getId() ?>" type="hidden"></input>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition duration-200 w-full sm:w-auto">Valider</button>
        </form>
        
        <form action="./process/process_refusVendeur.php" method="post" class="flex flex-col items-start w-full">
            <input name="user_id" value="<?= $demande->getId() ?>" type="hidden"></input>
            <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-red-600 transition duration-200 w-full sm:w-auto">Refuser</button>
        </form>
    </div>

</article>

<?php 
}
?>











<?php include_once('./assets/composant/footer.php'); ?>

</main>



</body>
</html>