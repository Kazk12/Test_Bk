<?php

session_start();
require_once '../../connect/connectDB.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit;
}

try {
    $sql = "SELECT * FROM etat";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $etats = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
catch (PDOException $error) {
        echo "Erreur lors de la requete : " . $error->getMessage();
    }



    try {
        $sql = "SELECT * FROM genre";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    }
    catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
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
        <section class="bg-gray-100  flex flex-col items-center justify-center h-screen">


            <div class="bg-white p-8 rounded-lg shadow-lg w-96 my-14">
                <h2 class="text-2xl font-semibold text-center mb-6">Création de votre annonce</h2>

                <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'price') {
                        echo "<p class='text-red-500 text-center'>Le format du prix est 10,00, il faut une virgule</p>";
                    }
                } ?>
                <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'two_decimal_places') {
                        echo "<p class='text-red-500 text-center'>Le format du prix est 10,00, il faut deux chiffres après la virgule</p>";
                    }
                } ?>


                <form action="../../process/ajoutAnnonce.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="genre" class="block text-sm font-medium text-gray-700">Le genre du livre</label>
                        <select name="genre" id="genre"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <?php 
                            foreach ($genres as $genre) {
                                echo "<option value='".$genre['id']."'>".$genre['genre']."</option>";
                            }


                            ?>
                            
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="etat" class="block text-sm font-medium text-gray-700">L'état de votre livre</label>
                        <select name="etat" id="etat"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <?php 
                            foreach ($etats as $etat) {
                                echo "<option value='".$etat['id']."'>".$etat['etat']."</option>";
                            }


                            ?>
                            
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="titre" class="block text-sm font-medium text-gray-700">Image de votre livre</label>
                        <input type="file" name="image" id="image" placeholder="Vôtre titre de livre" accept="image/*" required
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>


                    <div class="mb-4">
                        <label for="titre" class="block text-sm font-medium text-gray-700">Titre de votre livre</label>
                        <input type="text" name="titre" id="titre" placeholder="Vôtre titre de livre" required
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="descriptionCourte" class="block text-sm font-medium text-gray-700">Mettez une description courte de votre annonce</label>
                        <input type="text" name="descriptionCourte" id="descriptionCourte" placeholder="Mettez une description courte pour votre annonce" required
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="descriptionLongue" class="block text-sm font-medium text-gray-700">Mettez une description longue pour votre annonce</label>
                        <textarea name="descriptionLongue" id="descriptionLongue" placeholder="Mettez ici la description longue pour votre annonce" required
                             class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>



                    <div class="mb-6">
                        <label for="prix" class="block text-sm font-medium text-gray-700">Mettez le prix du livre</label>
                        <input type="text" name="prix" id="prix" placeholder="20,20" min="0" step="0.01" required
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>


                    <button type="submit" class="w-full p-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ajouter l'annonce</button>
                </form>



            </div>


        </section>




        <?php include_once(__DIR__ . '/../../composant/footer.php'); ?>


    </main>

</body>

</html>