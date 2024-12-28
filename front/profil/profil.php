<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
</head>
<body>


<header class="bg-white p-4 flex items-center justify-between shadow-md">
        
        <div class="block md:hidden">
            <button id="menu-button" class="text-gray-700">
                <span class="block w-6 h-1 bg-gray-800 mb-1"></span>
                <span class="block w-6 h-1 bg-gray-800 mb-1"></span>
                <span class="block w-6 h-1 bg-gray-800"></span>
            </button>
        </div>

     
        <div class="flex-1 text-center">
            <span class="text-2xl font-bold text-gray-800" style="font-family: 'Caveat', cursive;">BookMarket</span>
        </div>

        
        <div class="relative">
            <img src="https://via.placeholder.com/40" alt="Photo de profil" class="rounded-full w-10 h-10 object-cover">
        </div>

       
        <div class="relative">
            <img src="https://via.placeholder.com/40" alt="Panier" class="w-8 h-8">
            <!-- <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full px-1">3</span> Nombre d'articles dans le panier -->
        </div>
    </header>


<main>


<!-- PP MODIFIER PROFIL DECO -->


<section class="flex flex-col items-center">

<img src="https://via.placeholder.com/40" alt="Photo de l'utilisateur" class="rounded-full w-20 h-20 object-cover"> 
<button class="bg-[#FFB703] text-white px-6 py-2 rounded-lg hover:bg-[#e7bc52] focus:outline-none focus:ring-2 focus:ring-red-500" onclick="window.location.href='logout_url';">
        Changer le profil
    </button>
<button class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" onclick="window.location.href='logout_url';">
        Déconnexion
    </button>

</section>


<!-- GERER SES ANNONCES -->


<section>

<h2 class="text-center text-2xl font-bold mt-4 bg-gray-400">
    Gérer ses annonces
</h2>

<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 my-4">
    <p>
        Ajouter une annonce 
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 mb-4">
    <p>
        Modifier une annonce
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 mb-4">
    <p>
        Supprimer une annonce
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


</section>


<!-- GERER LES DEMANDES DE CLIENTS -->


<section>

<h2 class="text-center text-2xl font-bold mt-4 bg-gray-400">
    Gérer les demandes des clients
</h2>

<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 my-4">
    <p>
        Reçu
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>


<div class="flex bg-[#FFB703] opacity-65 justify-between px-4 mb-4">
    <p>
        Envoyer
    </p>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m0 0l-5-5m5 5l-5 5"/>
    </svg>
</div>



</section>


<!-- HISTORIQUE D'ACHAT -->

<section>

<h2 class="text-center text-2xl font-bold mt-4 bg-gray-400">
    Historique d'achat
</h2>

</section>





<footer class="bg-gray-800 text-white py-8 mt-14">
<section class="bg-gray-800 text-white py-8 flex flex-wrap gap-8 justify-between">
    

    <article class="w-[45%]">
        <h3 class="text-xl font-semibold mb-4">A propos</h3>
        <ul>
            <li><a href="#" class="hover:text-blue-400">Nos engagements</a></li>
            <li><a href="#" class="hover:text-blue-400">Politique de retour</a></li>
            <li><a href="#" class="hover:text-blue-400">Qui sommes-nous ?</a></li>
        </ul>
    </article>

   
    <article class="w-[45%]">
        <h3 class="text-xl font-semibold mb-4">Informations légales</h3>
        <ul>
            <li><a href="#" class="hover:text-blue-400">Informations de livraison</a></li>
            <li><a href="#" class="hover:text-blue-400">Conditions générales de vente</a></li>
            <li><a href="#" class="hover:text-blue-400">Mentions légales</a></li>
            <li><a href="#" class="hover:text-blue-400">Politique de confidentialité</a></li>
        </ul>
    </article>

  
    <article class="w-[45%]">
        <h3 class="text-xl font-semibold mb-4">BookMarket</h3>
        <p>&copy; 2025 Tout droit réservé à moi</p>
    </article>

   
    <article class="w-[45%]">
        <h3 class="text-xl font-semibold mb-4">Suis-Nous</h3>
        <div class="flex justify-center sm:justify-start space-x-4">
            <a href="#" class="hover:text-blue-400">
                

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M18 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2zm0 18H6V4h12v16z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-blue-400">
                

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M23 3a10.15 10.15 0 01-2.82.77A4.93 4.93 0 0022.4 2.2a9.85 9.85 0 01-3.16 1.2A4.92 4.92 0 0016.9 0a4.93 4.93 0 00-4.92 4.92c0 .39.04.77.12 1.13A14.02 14.02 0 013.3 1.62a4.92 4.92 0 00-.66 2.48c0 1.71.87 3.21 2.18 4.09a4.9 4.9 0 01-2.22-.61v.06a4.91 4.91 0 003.94 4.81A4.9 4.9 0 012 12.9a4.92 4.92 0 004.6 3.4 9.86 9.86 0 01-6.12 2.1c-.4 0-.8-.02-1.2-.07a13.97 13.97 0 007.54 2.21c9.04 0 14-7.49 14-13.98 0-.21 0-.42-.02-.63A9.99 9.99 0 0023 3z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-blue-400">
               

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M7.75 2C5.41 2 3.5 3.91 3.5 6.25v11.5c0 2.34 1.91 4.25 4.25 4.25h8.5c2.34 0 4.25-1.91 4.25-4.25V6.25c0-2.34-1.91-4.25-4.25-4.25h-8.5zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2zm6 3.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm0 5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-blue-400">
               

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M23.498 6.186a2.97 2.97 0 00-2.095-2.095C19.747 3.25 12 3.25 12 3.25S4.253 3.25 2.597 4.09A2.97 2.97 0 000 6.186C0 8.336 0 12 0 12s0 3.664 2.597 5.814c1.656.841 8.403.841 8.403.841s7.747 0 9.403-.841c1.656-.841 2.095-2.095 2.095-5.814 0-2.45 0-6.814-2.095-8.186zM9.5 12V8.5l6 3.5-6 3.5z"/>
                </svg>
            </a>
        </div>
    </article>
</section>

</footer>

</main>

    
</body>
</html>