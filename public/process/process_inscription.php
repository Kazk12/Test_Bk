<?php

include_once '../../utils/autoload.php';


$validator = new ValidatorService();


$validator->checkMethods('POST');
$validator->addStrategy('user_email', new RequiredValidator());
$validator->addStrategy('user_email', new StringValidator(30));
$validator->addStrategy('user_nom', new RequiredValidator());
$validator->addStrategy('user_nom', new StringValidator(30));
$validator->addStrategy('user_prenom', new RequiredValidator());
$validator->addStrategy('user_prenom', new StringValidator(30));
$validator->addStrategy('user_tel', new RequiredValidator());
$validator->addStrategy('user_tel', new StringValidator(30));

// Pb avec le role, je lui met quoi en stratégie ?
$validator->addStrategy('role', new RequiredValidator());
$validator->addStrategy('role', new IntegerValidator());

$validator->addStrategy('user_password', new RequiredValidator());
$validator->addStrategy('user_password', new StringValidator(30));

if ($_POST['role'] == 2) {
    $validator->addStrategy('adresse_entreprise', new RequiredValidator());
    $validator->addStrategy('adresse_entreprise', new StringValidator(30));
    $validator->addStrategy('nom_entreprise', new RequiredValidator());
    $validator->addStrategy('nom_entreprise', new StringValidator(30));
}

$sanitizedData = $validator->sanitize($_POST);

if (!$validator->validate($_POST)) {

    header('location: ../home.php');
    return;
}

function formatPhoneNumber($phone)
{
    $phone = preg_replace('/\D/', '', $phone);

    if (strlen($phone) == 10) {
        return $phone;
    } else {
        return false;
    }
}



$user_tel = formatPhoneNumber(trim($sanitizedData['user_tel']));




if ($user_tel === false) {
    header('Location: ../index.php?errorTel=1');
    exit;
}




$user_email = $sanitizedData['user_email'];
$user_nom = $sanitizedData['user_nom'];
$user_prenom = $sanitizedData['user_prenom'];
$user_role = $sanitizedData['role'];
$user_password = $sanitizedData['user_password'];
$adresse_entreprise = $sanitizedData['adresse_entreprise'];
$nom_entreprise = $sanitizedData['nom_entreprise'];

$hash = password_hash($user_password, PASSWORD_DEFAULT);

$userRepository = new UserRepository();

$checkUser = $userRepository->findByEmail($sanitizedData['user_email']);

if ($checkUser) {
    header("Location: ../index.php?error=Email");
    exit;
}



$utilisateur = new User($user_nom, $user_prenom, $user_email, $user_tel, $hash);


if ($_POST['role']  == 2) {
    $detailProfessionelRepository = new DetailProfessionnelRepository();

    $newDetailProfessionnel = new DetailProfessionnel($adresse_entreprise, $nom_entreprise);

    $newDetailProfessionnel = $detailProfessionelRepository->create($newDetailProfessionnel);

    $utilisateur->setDetailProfessionnel($newDetailProfessionnel);

}

$utilisateur =  $userRepository->create($utilisateur);

session_start();

$_SESSION['user'] = $utilisateur;



header('Location: ../accueil.php');
exit;
