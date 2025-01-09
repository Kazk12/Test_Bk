<?php


require_once('../../connect/connectDB.php');
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}

$id = $_GET['numéro'];


try {
    $sql = "SELECT livre.prix, livre.description_longue, livre.titre, livre.url_image, etat.etat, users.user_nom
     FROM `livre`
    INNER JOIN users ON users.id = livre.id_seller
    INNER JOIN etat ON etat.id = livre.etat
    WHERE livre.id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}


$prix_en_euros = $livre["prix"] / 100;
$prix = number_format($prix_en_euros, 2, ',', ' ');





try {
    $sql = "SELECT livre.prix, livre.titre, livre.url_image
         FROM `livre`
        INNER JOIN users ON users.id = livre.id_seller
        WHERE id_seller = :id_seller
         AND livre.id != :id_livre
         LIMIT 3";
         

    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id_seller" => $_SESSION['id_seller'],
        ":id_livre" => $id]);
    $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}




?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style/output.css">
    <title>Document</title>
</head>

<body>



    <?php include_once('../../composant/header.php'); ?>

    <main>

        <section class="flex flex-col md:flex-row items-center justify-center gap-4 mt-6 pl-6 pr-6">

            <article class="flex flex-col items-center gap-4 w-full md:w-[30%]">
                <img class="w-full" src="../<?= $livre["url_image"] ?>" alt="PP DU LIVRE">
                <p>
                    Vendeur : <?= $livre["user_nom"] ?>
                </p>
                <p>
                    Etat du livre : <?= $livre["etat"] ?>
                </p>
            </article>

            <article class="bg-[#26B6D9] p-6 w-full md:w-[60%] rounded-lg flex flex-col gap-4 items-center">

                <h2 class="text-center">
                    Titre : <?= $livre["titre"] ?>
                </h2>

                <p class="text-center">
                    <?= $livre["description_longue"] ?>
                </p>

                <p class="text-center">
                    Prix : <?= $prix ?>€
                </p>

                <button class="flex items-center justify-center bg-[#FFB703] text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
                    <span class="text-lg mr-4">Ajouter au panier</span>

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
                    </svg>

                </button>

            </article>
        </section>

        </section>


        <section class="flex flex-col items-center gap-4 mb-4">

            <h3 class="text-center text-2xl font-semibold mt-8 mb-4">

                <?= $livre["user_nom"] ?> vend également

            </h3>
<?php  foreach ($livres as $livre ) {

$prixEuros = $livre["prix"] / 100;
$prixLivre = number_format($prixEuros, 2, ',', ' ');
  
 ?>
            <article class="bg-[#D9D9D9] opacity-65 p-6 mx-auto  max-w-[60%] rounded-lg flex flex-col gap-4 items-center">
                <img src="../<?= $livre["url_image"] ?>" alt="PP DU LIVRE">
                <p>
                    Titre : <?= $livre["titre"] ?>
                </p>
                <p>
                    PRIX : <?=  $prixLivre ?>€
                </p>

                <button class="flex items-center justify-center bg-[#FFB703] text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
                    <span class="text-lg mr-4">Ajouter au panier</span>


                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
                    </svg>


                </button>

            </article>
<?php } ?>

        </section>






        <?php include_once(__DIR__ . '/../../composant/footer.php'); ?>

    </main>

</body>

</html>