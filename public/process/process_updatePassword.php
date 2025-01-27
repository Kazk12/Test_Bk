<?php 

include_once '../../utils/autoload.php';

session_start();




if (!isset($_POST['user_password']) || empty(trim($_POST['user_password']))
    || !isset($_POST['newPassword']) || empty(trim($_POST['newPassword']))
    || !isset($_POST['ConfirmPassword']) || empty(trim($_POST['ConfirmPassword']))) {
    echo "Le pseudo et le mot de passe sont requis.";
    exit;
}

$user_password = trim($_POST['user_password']);
$newPassword = trim($_POST['newPassword']);
$confirmPassword = trim($_POST['ConfirmPassword']);

if ($newPassword !== $confirmPassword) {
    header("Location: ../GererProfil.php?error1=empty");
        exit;
}


if((password_verify($user_password, $_SESSION['user']->getPassword()))){
    $userRepo = new UserRepository();
    $user = $userRepo -> find($_SESSION['user']->getId());
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);

    $user->setPassword($hash);
    $userRepo -> updatePasswordInfo($user);
    $_SESSION['user'] = $user;
    
    header("Location: ../GererProfil.php?success=Changement");
    exit;
    
} else {
    header("Location: ../GererProfil.php?error2=empty");
    exit;
}