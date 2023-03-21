<?php

session_start();

require_once '../connexion.php';


$idWork = $_GET['id'];
$idUser = $_SESSION['id-user'];

if (isset($_POST['delete'])) {
    $delete = $db->prepare('DELETE FROM `like` WHERE `work_id` = :work_id AND user_id = :user_id');
    $delete->bindParam('work_id', $workId, PDO::PARAM_INT);
    $delete->bindParam(':user_id', $idUser, PDO::PARAM_INT);
    $delete->execute();
    //header('Location: ../admin/dashboard.php');
}
