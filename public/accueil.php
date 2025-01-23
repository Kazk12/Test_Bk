<?php 

include_once '../utils/autoload.php';
session_start();

// var_dump($_SESSION);

if (!isset($_SESSION['user'])) {
    header('Location: ./index.php');
    exit;
}

var_dump($_SESSION);

$allBooks = new livreRepository();

$livres = $allBooks->findAll();




// try {
//     $sql = "SELECT livre.prix,livre.id_seller, livre.id, livre.description_courte, livre.titre, livre.url_image, etat.etat, users.user_nom
//      FROM `livre`
//     INNER JOIN users ON users.id = livre.id_seller
//     INNER JOIN etat ON etat.id = livre.etat
//     ORDER BY livre.id DESC";

//     $stmt = $pdo->prepare($sql);
//     $stmt->execute();
//     $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    
    
// } catch (PDOException $e) {
//     echo "Erreur de base de données : " . $e->getMessage();
// }




?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="">

<?php include_once('./assets/composant/header.php'); ?>

    <main>
   
    <section id="hero" class="relative w-full h-screen flex items-center justify-center">
        
        <img src="./assets/images/slogan.jng" alt="Slogan" class="absolute inset-0 w-full h-full object-cover object-center">

        
        <div class="absolute text-center text-black px-6 sm:px-8 lg:px-12 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold"
             style="font-family: 'Caveat', cursive; line-height: 1.2; max-width: 90%;">
            <p class="whitespace-pre-wrap break-words font-Titre">
                 BookMarket<br>l'occasion devient le <br>neuf
            </p>
        </div>
    </section>
    <h2 class="text-2xl  text-center mb-6 font-Titre">
    Nos derniers produits
</h2>
<section class="bg-[#FFB703] text-center">

<?php 

foreach ($livres as $livre){

    $prix_en_euros = $livre->getPrix() / 100;
    $prix = number_format($prix_en_euros, 2, ',', ' ');
    $_SESSION['id_seller'] = $livre->getId_seller();
   
    ?>




<article class="border-b-2 border-black pb-4 pt-4 flex items-center flex-col">
<a href="./detail.php?numéro=<?= $livre->getId() ?>">
<img src="./<?= $livre->getUrl_image() ?>" alt="Image d'un livre">
<h3 class="text-xl font-Titre">
   Titre : <?= $livre->getTitre() ?>
</h3>
<p class="">
Etat du livre : <?= $livre->getEtat() ?>
</p>
<p>
    <?= $livre->getDescription_courte() ?>
</p>
<h3 class="text-xl font-Titre">
   Vendeur : <?= $livre->getId_seller() ?>
</h3>
</a>
<button class="flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
        <span class="text-lg mr-4"><?= $prix  ?>€</span>


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