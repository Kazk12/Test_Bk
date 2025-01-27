<?php 

include_once '../../utils/autoload.php';




$userRepo = new UserRepository();

$vendeur = $userRepo->find($_POST['user_id']);


$userRepo->updateRoleVendeur($vendeur);
header('Location: ../devenirVendeur.php?success=1');
exit;


