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


<section>

<article class="flex flex-col items-center gap-4">
    <img src="https://via.placeholder.com/40" alt="PP DU LIVRE">
    <p>
        Nom du vendeur
    </p>
    <p>
        Nom du livre
    </p>
</article>

<article class="bg-[#26B6D9] p-6 mx-auto  max-w-[60%] rounded-lg flex flex-col gap-4 items-center">

<h2>
    TITRE DU livre
</h2>

<p>
    DESCRIPTION LONGUE DU LIVRE <br>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem odit tempora cupiditate aut minima officia eius unde totam est, magnam ratione sapiente commodi sequi? Magnam aut autem illum nulla error.
</p>

<p>
    Prix : 2€
</p>

<button class="flex items-center justify-center bg-[#FFB703] text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
        <span class="text-lg mr-4">Ajouter au panier</span>


        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
        </svg>


    </button>


</article>

</section>


<section>

<h3 class="text-center text-2xl font-semibold mt-8 mb-4">
    
         "VENDEUR" vend également
    
</h3>

<article class="bg-[#D9D9D9] opacity-65 p-6 mx-auto  max-w-[60%] rounded-lg flex flex-col gap-4 items-center">
<img src="https://via.placeholder.com/40" alt="PP DU LIVRE">
<p>
    NOM DU LIVRE
</p>
<p>
    PRIX : 3€
</p>

<button class="flex items-center justify-center bg-[#FFB703] text-white font-semibold py-3 px-6 rounded-full shadow-md hover:bg-blue-600 transition duration-300">
        <span class="text-lg mr-4">Ajouter au panier</span>


        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1 9H4l-1-9zm4 0v0a1 1 0 1 1 2 0v0a1 1 0 1 1-2 0zM9 14h6m2 0h2v2H7v-2h2m10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5-7H6" />
        </svg>


    </button>

</article>


</section>






<?php include_once(__DIR__ . '/../../composant/footer.php'); ?>
    
    </main>
    
</body>
</html>