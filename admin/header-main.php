<?php
session_start();

if (!isset($_SESSION['id-user'])) {
    header('Location: ../front/connect.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace</title>
    <link rel="stylesheet" href="../css/style-admin.css">

</head>

<body>
    <header>
        <nav id="main-sidebar">
            <div id="container-top-navigation">
                <img src="../img/logo-biblook (3).svg" alt="Bliblook" id="logo-sidebar">
                <ul>
                    <li><a href="#">A</a></li>
                    <li><a href="#">B</a></li>
                    <li><a href="#">C</a></li>
                    <li><a href="#">D</a></li>
                    <li><a href="#">E</a></li>
                </ul>
            </div>
            <div id="container-group-profil">
                <ul>
                    <li><a href="#" id="settings">S</a></li>
                    <li><a href="#" id="profil">P</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>