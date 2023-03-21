<?php
session_start();

require_once '../connexion.php';


$idWork = $_GET['id'];
$idWork2 = $_GET['id2'];
$idUser = $_SESSION['id-user'];

$coeurSql = $db->prepare("SELECT `work_id`,`user_id` FROM `like` WHERE`user_id` = :user_id AND `work_id` = :id");

                $coeurSql->bindParam('user_id',$idUser,PDO::PARAM_INT);
                $coeurSql->bindParam('id',$idWork,PDO::PARAM_INT);
                $coeurSql->execute();
                $coeur = $coeurSql->fetch(PDO::FETCH_ASSOC);
                if($coeur == false){

                    

                    $likeSql = $db->prepare("INSERT INTO `like` (`work_id`, `user_id`) VALUES  (:work_id, :user_id)");

                    $likeSql->bindParam(':work_id', $idWork, PDO::PARAM_INT);
                    $likeSql->bindParam(':user_id', $idUser, PDO::PARAM_INT);

                    $likeSql->execute();
                    header('Location: ../front/book-detail.php?id=' . $idWork2);
                }elseif($coeur == true){
                    

                    $likeSql = $db->prepare("DELETE FROM `like` WHERE `work_id` = :work_id AND user_id = :user_id");

                    $likeSql->bindParam(':work_id', $idWork, PDO::PARAM_INT);
                    $likeSql->bindParam(':user_id', $idUser, PDO::PARAM_INT);

                    $likeSql->execute();
                    header('Location: ../front/book-detail.php?id=' . $idWork2);



                       






                }