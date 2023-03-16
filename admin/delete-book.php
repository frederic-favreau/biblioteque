<?php
session_start();
try {
    require_once '../connexion.php';
    $id = intval($_GET['id']);
    $reqdel = $db->prepare("DELETE FROM `copy` WHERE `work_id` = :id LIMIT 1");
    $reqdel->bindParam(':id', $id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Le livre a bien été supprimé";
    header('Location: ./crud-book.php');
    exit();

} catch (PDOException $e) {
    $_SESSION["error"] = "Le livre n'a pas été supprimé";
    header('Location: ./crud-book.php');
    exit();
}

