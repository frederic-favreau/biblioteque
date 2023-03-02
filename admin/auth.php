<?php
session_start();

require_once '../connexion.php';

$mail= $_POST['mail'];
$password = $_POST['password'];

$req = $db->prepare("SELECT `id_user`, `mail`, `firstname`, 'lastname', `password` FROM `user` WHERE `mail` = :mail");
$req->bindParam('mail', $mail, PDO::PARAM_STR);
$req->execute();


if ($req->rowCount()==1){
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if($user['password'] === $password){
        $_SESSION['id-user'] = $user['id_user'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        header('Location: ./dashboard.php');

    } else {
        header('Location: ../front/connect.php?err=1');
    }

} else {
    header('Location: ../front/connect.php?err=1');
}