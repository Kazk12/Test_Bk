<?php

include_once '../../utils/autoload.php';

session_start();



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
    header('Location: ../GererProfil.php?errorTel=1');
    exit;
}

$user_email = $sanitizedData['user_email'];
$user_nom = $sanitizedData['user_nom'];
$user_prenom = $sanitizedData['user_prenom'];

$userRepo = new UserRepository();

$user = $userRepo -> find($_SESSION['user']->getId());

$user->setEmail($user_email);
$user->setNom($user_nom);
$user->setPrenom($user_prenom);
$user->setTel($user_tel);

$userRepo -> updateGeneralInfo($user);


var_dump($user);
die();

