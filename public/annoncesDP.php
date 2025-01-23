<?php



session_start();
require_once('../../connect/connectDB.php');

if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}


try {
    $sql = "SELECT livre.prix,livre.id_seller, livre.id, livre.description_courte, livre.titre, livre.url_image, etat.etat, users.user_nom
     FROM `livre`
    INNER JOIN users ON users.id = livre.id_seller
    INNER JOIN etat ON etat.id = livre.etat
    ORDER BY livre.id DESC
    LIMIT 5";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
</head>
<body>


<?php include_once('../../composant/header.php'); ?>
<main>

<section class="bg-[#FFB703] text-center">

<?php 

if(isset($_GET['delete']) && $_GET['delete'] == 1){
    echo "<p class='text-white text-2xl'>L'annonce a bien été supprimée</p>";
}

?>

<?php 

foreach ($livres as $livre){

    $prix_en_euros = $livre["prix"] / 100;
    $prix = number_format($prix_en_euros, 2, ',', ' ');
    $_SESSION['id_seller'] = $livre['id_seller'];
   
    ?>




<article class="border-b-2 border-black pb-4 pt-4 flex items-center flex-col">
<img src="../<?= $livre["url_image"] ?>" alt="Image d'un livre">
<h3 class="text-xl font-Titre">
   Titre : <?= $livre['titre'] ?>
</h3>
<p class="">
Etat du livre : <?= $livre['etat'] ?>
</p>
<p>
    <?= $livre['description_courte'] ?>
</p>
<h3 class="text-xl font-Titre">
   Vendeur : <?= $livre['user_nom'] ?>
</h3>

<button class="flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
        <span class="text-lg mr-4"><?= $prix  ?>€</span>


        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
        </svg>
        <form action="../../process/deleteDP.php" method="post" >
            <input type="hidden" name="id" value="<?= $livre['id'] ?>">
            <button class="bg-red-600 mt-4 text-white px-6 py-2 rounded-lg hover:bg-[#e7bc52] focus:outline-none focus:ring-2 focus:ring-red-500" type="submit">Supprimer l'annonce</button>
        </form>


    </button>





</article>


<?php } ?>



</section>




<?php include_once(__DIR__ . '/../../composant/footer.php'); ?>


</main>


    
</body>
</html>