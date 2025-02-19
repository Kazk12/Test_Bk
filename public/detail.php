<?php

include_once '../utils/autoload.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}

$id = $_GET['numéro'];

$livreRepo = new LivreRepository();
$livre = $livreRepo->findById($id);

$prix_en_euros = $livre->getPrix() / 100;
$prix = number_format($prix_en_euros, 2, ',', ' ');

$livres = $livreRepo->findAllLivreBySellerId($livre->getId_seller()->getId(), $id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Détails du Livre</title>
</head>

<body class="bg-gray-100">

<?php include_once('./assets/composant/header.php'); ?>

<main class="container mx-auto p-4">

    <section class="flex flex-col md:flex-row items-center justify-center gap-6 mt-6 px-6">
        <article class="flex flex-col items-center gap-4 w-full md:w-[30%]">
            <img class="w-full h-64 object-cover rounded-lg shadow-lg" src="<?= $livre->getUrl_image() ?>" alt="Image du livre">
            <div class="text-center">
                <p class="text-lg font-semibold">Vendeur : <?= $livre->getId_seller()->getNom() ?></p>
                <p class="text-lg font-semibold">État : <?= $livre->getEtat()->getEtat() ?></p>
            </div>
        </article>

        <article class="bg-white p-6 w-full md:w-[60%] rounded-lg shadow-lg flex flex-col gap-4 items-center">
            <h2 class="text-center text-3xl font-bold"><?= $livre->getTitre() ?></h2>
            <p class="text-center text-gray-700"><?= $livre->getDescription_longue() ?></p>
            <p class="text-center text-2xl font-bold text-blue-600">Prix : <?= $prix ?>€</p>
            <button class="flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
                <span class="text-lg mr-4">Ajouter au panier</span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
                </svg>
            </button>
        </article>
    </section>

    <section class="flex flex-row flex-wrap items-center gap-4 mb-4">
        <h3 class="text-center text-2xl font-semibold mt-8 mb-4 w-full"><?= $livre->getId_seller()->getNom() ?> vend également</h3>
        
        <?php foreach ($livres as $livre) {
            $prixEuros = $livre->getPrix() / 100;
            $prixLivre = number_format($prixEuros, 2, ',', ' '); 
        ?>
            <article class="bg-white p-6 mx-auto max-w-full sm:max-w-[48%] md:max-w-[30%] rounded-lg shadow-lg flex flex-col gap-4 items-center">
                <img src="<?= $livre->getUrl_image() ?>" alt="Image du livre" class="w-full h-48 object-cover rounded-lg">
                <p class="text-lg font-semibold"><?= $livre->getTitre() ?></p>
                <p class="text-xl font-bold">Prix : <?=  $prixLivre ?>€</p>
                <button class="flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
                    <span class="text-lg mr-4">Ajouter au panier</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
                    </svg>
                </button>
            </article>
        <?php } ?>
    </section>

    <?php include_once('./assets/composant/footer.php'); ?>

</main>

</body>

</html>