<?php
session_start();

require_once '../connexion.php';


$idWork = $_GET['id'];
var_dump($idWork);
$idUser = $_SESSION['id-user'];
var_dump($idUser);

$likeSql = $db->prepare("INSERT INTO `like` (`work_id`, `user_id`) VALUES  (:work_id, :user_id)");

$likeSql->bindParam(':work_id', $idWork, PDO::PARAM_INT);
$likeSql->bindParam(':user_id', $idUser, PDO::PARAM_INT);

$likeSql->execute();
header('Location: ../index.php');
                