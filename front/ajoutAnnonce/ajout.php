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


                <form action="#" method="post">
                    <div class="mb-4">
                        <label for="genre" class="block text-sm font-medium text-gray-700">Le genre du livre</label>
                        <select name="genre" id="genre"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">Homme</option>
                            <option value="1">Femme</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="etat" class="block text-sm font-medium text-gray-700">L'état de votre livre</label>
                        <select name="etat" id="etat"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">Neuf</option>
                            <option value="1">Moyen</option>
                            <option value="1">Mauvais</option>
                        </select>
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
                        <label for="password" class="block text-sm font-medium text-gray-700">Vôtre mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Vôtre Mot de Passe" required
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