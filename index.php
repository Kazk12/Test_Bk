<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Compte</title>
    <link rel="stylesheet" href="./assets/style/output.css">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<main>

    
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center mb-6">Inscription</h2>
        
       
        <form action="#" method="post">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Votre Email</label>
                <input type="email" name="email" id="email" placeholder="Votre Email" required 
                       class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Votre Mot de Passe</label>
                <input type="password" name="password" id="password" placeholder="Votre Mot de Passe" required 
                       class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <button type="submit" class="w-full p-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Créer le Compte</button>
        </form>

        
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Déjà un compte ? <a href="./connexion.php" class="text-blue-500 hover:underline">Se connecter</a></p>
        </div>
    </div>
    
    </main>

</body>
</html>
