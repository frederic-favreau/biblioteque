<?php
session_start();

require_once '../connexion.php';


$mail= $_POST['mail'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);


$req = $db->prepare("INSERT INTO `user`(`firstname`, `lastname`, `mail`, `password`) VALUES (:firstname, :lastname,:mail, :password)");
$req->bindParam('mail', $mail, PDO::PARAM_STR);
$req->bindParam('firstname', $firstname, PDO::PARAM_STR);
$req->bindParam('lastname', $lastname, PDO::PARAM_STR);
$req->bindParam('password', $passwordHashed, PDO::PARAM_STR);
$req->execute();


$_SESSION['firstname'] = $firstname;
header('Location: ./dashboard.php');
