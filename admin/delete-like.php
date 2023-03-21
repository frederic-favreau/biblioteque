<?php

session_start();

require_once '../connexion.php';


$idWork = $_GET['id'];
$idUser = $_SESSION['id-user'];



                    

                    $likeSql = $db->prepare("DELETE FROM `like` WHERE `work_id` = :work_id AND user_id = :user_id");

                    $likeSql->bindParam(':work_id', $idWork, PDO::PARAM_INT);
                    $likeSql->bindParam(':user_id', $idUser, PDO::PARAM_INT);

                    $likeSql->execute();
                    header('Location: ../admin/dashboard.php');




