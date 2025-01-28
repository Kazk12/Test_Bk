<?php 

include_once '../../utils/autoload.php';

session_start();

$validator = new ValidatorService();


$validator->checkMethods('POST');
$validator->addStrategy('genre', new RequiredValidator());
$validator->addStrategy('genre', new IntegerValidator());
$validator->addStrategy('etat', new RequiredValidator());
$validator->addStrategy('etat', new IntegerValidator());
$validator->addStrategy('titre', new RequiredValidator());
$validator->addStrategy('titre', new StringValidator(30));
$validator->addStrategy('descriptionCourte', new RequiredValidator());
$validator->addStrategy('descriptionCourte', new StringValidator(150));
$validator->addStrategy('descriptionLongue', new RequiredValidator());
$validator->addStrategy('descriptionLongue', new StringValidator(500));
$validator->addStrategy('prix', new RequiredValidator());


if (!$validator->validate($_POST)) {

    header('location: ../home.php');
    return;
}
$sanitizedData = $validator->sanitize($_POST);



$genre = $sanitizedData['genre'];
$etat = $sanitizedData['etat'];
$titre = $sanitizedData['titre'];
$descriptionCourte = $sanitizedData['descriptionCourte'];
$descriptionLongue = $sanitizedData['descriptionLongue'];
$prix = $sanitizedData['prix'];




if (!strpos($prix, ',')) {
    header("Location: ./ajout.php?error=price");
    exit;
}

if (!preg_match('/^[0-9]+,[0-9]{2}$/', $prix)) {
    header("Location: ./ajout.php?error=two_decimal_places"); 
    exit;
}

$prix = str_replace(',', '.', $prix);

$prix_float = (float)$prix;

$prix_int = (int)($prix_float * 100);

$photo = $_FILES['image'];


if ($photo['error'] === UPLOAD_ERR_OK) {
       
    $uploadDir = '../assets/imagesAnnonce/';
    $fileName = uniqid() . basename($photo['name']);
    $uploadPath = $uploadDir . $fileName;

  
    if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {
        $url_photo = './assets/imagesAnnonce/' . $fileName;
        $userRepo = new UserRepository();
        $user = $userRepo -> find($_SESSION['user']->getId());
        $etatRepo = new EtatRepository();
        $etat = $etatRepo -> findById($etat);
   
        $livreRepo = new LivreRepository();
        $newLivre = new Livre($user, $etat, $url_photo, $titre, $descriptionCourte, $descriptionLongue, $prix_int);

        $livreRepo -> create($newLivre);

        header('Location: ../ajout.php?sucess=1');
        exit;

    }
}



