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


var_dump($_POST);
die();


function formatPhoneNumber($phone) {
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
    echo "Le numéro de téléphone doit être au format 00 00 00 00 00.";
    exit;
}


var_dump($user_tel);