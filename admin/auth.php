<?php
session_start();

require_once '../connexion.php';

$mail= $_POST['mail'];
$password = $_POST['password'];

$req = $db->prepare("SELECT `id_user`, `mail`, `firstname`, `lastname`, `password`, `role` FROM `user` WHERE `mail` = :mail");
$req->bindParam('mail', $mail, PDO::PARAM_STR);
$req->execute();


if ($req->rowCount()==1){
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if($user['mail'] === $mail){
        $_SESSION['id-user'] = $user['id_user'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['connect'] = true;
        $_SESSION['role'] = $user['role'];
        $passwordHash = $user['password'];
        if(password_verify($password, $user['password'])){
            if($_SESSION['role'] == 0){
                header('Location: ./dashboard.php');
                }else{
                    header('Location: ./crud-book.php');   
                }
            
        }else {
            header('Location: ../front/connect.php?err=1');
        }
    
                            
        
        


    } else {
        header('Location: ../front/connect.php?err=1');
    }

} else {
    header('Location: ../front/connect.php?err=1');
}