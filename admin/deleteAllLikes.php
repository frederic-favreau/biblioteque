<?php

session_start();

require_once '../connexion.php';



$idUser = $_SESSION['id-user'];



                    

                    $likeSql = $db->prepare("DELETE FROM `like` WHERE user_id = :user_id");

                    
                    $likeSql->bindParam(':user_id', $idUser, PDO::PARAM_INT);

                    $likeSql->execute();
                    header('Location: ../admin/dashboard.php');