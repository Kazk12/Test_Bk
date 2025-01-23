<?php
require_once('../../connect/connectDB.php');

try {
    $sql = "SELECT users.user_nom, users.id, users.user_prenom, detail_professionnel.adresse_entreprise, detail_professionnel.nom_entreprise
FROM `users`
INNER JOIN detail_professionnel ON detail_professionnel.user_id = users.id
WHERE role = 3"
    ;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}  catch (PDOException $e) {
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
        <p class="text-gray-700 font-semibold text-sm">Le nom : <?= $demande['user_nom'] ?></p>
        <p class="text-gray-700 font-semibold text-sm">Le prénom : <?= $demande['user_prenom'] ?></p>
    </div>

    <!-- Informations sur l'entreprise -->
    <div class="flex flex-col w-full sm:w-[30%] mb-4 sm:mb-0">
        <p class="text-gray-700 font-semibold text-sm">L'adresse de l'entreprise : <?= $demande['adresse_entreprise'] ?></p>
        <p class="text-gray-700 font-semibold text-sm">Le nom de l'entreprise : <?= $demande['nom_entreprise'] ?></p>
    </div>

    <!-- Formulaire de validation et refus -->
    <div class="flex flex-col w-full sm:w-[30%] space-y-4">
        <form action="../../process/validerVendeur.php" method="post" class="flex flex-col items-start w-full">
            <input name="user_id" value="<?= $demande['id'] ?>" type="hidden"></input>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition duration-200 w-full sm:w-auto">Valider</button>
        </form>
        
        <form action="../../process/deleteAnnonce.php" method="post" class="flex flex-col items-start w-full">
            <input name="user_id" value="<?= $demande['id'] ?>" type="hidden"></input>
            <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-red-600 transition duration-200 w-full sm:w-auto">Refuser</button>
        </form>
    </div>

</article>

<?php 
}
?>











<?php include_once(__DIR__ . '/../../composant/footer.php'); ?>

</main>



</body>
</html>