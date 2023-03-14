<?php
session_start();
try {
    require_once '../connexion.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `work` WHERE `id` = :id");
    $reqdel->bindParam('id', $id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Le livre a bien été supprimé";
    header('Location: ./dashboard.php#dashboard-page-book-crud');
    exit();

} catch (PDOException $e) {
    $_SESSION["error"] = "Le livre n'a pas été supprimé";
    header('Location: ./dashboard.php#dashboard-page-book-crud');
    exit();
}
