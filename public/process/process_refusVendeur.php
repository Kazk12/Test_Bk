<?php 

include_once '../../utils/autoload.php';




$userRepo = new UserRepository();

$vendeur = $userRepo->find($_POST['user_id']);


$userRepo->updateRefusVendeur($vendeur);
header('Location: ../devenirVendeur.php?delete=1');

exit;


