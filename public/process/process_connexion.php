<?php 


include_once '../../utils/autoload.php';



$validator = new ValidatorService();

$validator->checkMethods('POST');
$validator->addStrategy('user_email', new RequiredValidator());
$validator->addStrategy('user_email', new StringValidator(30));
$validator->addStrategy('user_password', new RequiredValidator());
$validator->addStrategy('user_password', new StringValidator(30));


if (!$validator->validate($_POST)) {
    header('location: ../home.php');
    return;
  }


$sanitizedData = $validator->sanitize($_POST);

$userRepository = new UserRepository();

$checkHeros = $userRepository -> findByEmail($sanitizedData['user_email']);


if ($checkHeros && !password_verify($sanitizedData['user_password'], $checkHeros->getPassword())) {
   
    
    header("Location: ../connexion.php?error=Connexion");
    exit;


   } else {
   
    session_start();

     $_SESSION['user'] = $checkHeros;
    
    }

  header('Location: ../accueil.php');
  exit;
