<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">

</head>
<body class="">

<?php include_once('../../composant/header.php'); ?>

    <main>
   
    <section id="hero" class="relative w-full h-screen flex items-center justify-center">
        
        <img src="../../assets/images/slogan.jng" alt="Slogan" class="absolute inset-0 w-full h-full object-cover object-center">

        
        <div class="absolute text-center text-black px-6 sm:px-8 lg:px-12 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold"
             style="font-family: 'Caveat', cursive; line-height: 1.2; max-width: 90%;">
            <p class="whitespace-pre-wrap break-words">
                 BookMarket<br>l'occasion devient le <br>neuf
            </p>
        </div>
    </section>
    <h2 class="text-2xl font-semibold text-center mb-6">
    Nos derniers produits
</h2>
<section class="bg-[#FFB703] text-center">



<article class="border-b-2 border-black pb-4 pt-4 flex items-center flex-col">

<img src="https://via.placeholder.com/40" alt="Image d'un livre">
<h3>
    Nom du livre
</h3>
<p>
Etat du livre : Neuf
</p>
<p>
    DESCRIPTION COURTE DU LIVRE
</p>
<h3>
    Nom du vendeur
</h3>

<button class="flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
        <span class="text-lg mr-4">€25.99</span>


        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
        </svg>


    </button>





</article>

<article class="border-b-2 border-black pb-4 pt-4 flex items-center flex-col">

<img src="https://via.placeholder.com/40" alt="Image d'un livre">
<h3>
    Nom du livre  
</h3>
<p>
Etat du livre : Neuf
</p>
<p>
    DESCRIPTION COURTE DU LIVRE
</p>
<h3>
    Nom du vendeur 
</h3>

<button class="flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
        <span class="text-lg mr-4">€25.99</span>


        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
        </svg>


    </button>





</article>

</section>



<?php include_once('../../composant/footer.php'); ?>







</main>


    
</body>
</html>