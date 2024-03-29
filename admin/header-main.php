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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Nova+Slim&family=Risque&display=swap" rel="stylesheet">
</head>

<body>
    <header id="side-bar-log" class="row-limit-size">
        <nav id="main-sidebar">
            <div id="sidebar-wrapper">
                <nav id="main-sidebar">
                    <div id="container-top-navigation">
                        <a href="../index.php" id="logo-sidebar"><img src="../img/logo-seul-biblook-noir.svg" alt="Bliblook" id="logo-big-sidebar" /><span id="dashbord-title">Tableau de bord</span></a>
                        <ul class="list-btn-side-bar">

                            <!-- SESSION USERS -->
                            <?php
                            if ($_SESSION['role'] == 0) {
                            ?>
                                <li>
                                    <a href="../index.php"><img src="../img/side-bar/picto-home.svg" alt="accueil" id="btn-home">Retour au site</a>
                                </li>
                                <li>
                                    <a href="./dashboard.php"><img src="../img/picto/presentation-chart-01.svg" alt="accueil" id="btn-home">Mon tableau de board</a>
                                </li>
                                <li>
                                    <a href="../index.php#section-news"><img src="../img/picto/zap.svg" alt="nouveauté" id="btn-home">Nouveautés</a>
                                </li>


                                <!-- SESSION ADMIN -->
                            <?php
                            }
                            if ($_SESSION['role'] == 1) {
                            ?>
                                <li>
                                    <a href="./crud-book.php"><img src="../img/side-bar/picto-CRUD.svg" alt="crud">Gérer les livres</a>
                                </li>
                                <li>
                                    <a href="./register-book.php"><img src="../img/picto/bookmark.svg" alt="crud">Registre des emprunts</a>
                                </li>
                                <li>
                                    <a href="./crud-user.php"><img src="../img/side-bar/picto-users.svg" alt="utilisateur">Gérer les utilisateurs</a>
                                </li>
                            <?php
                            }
                            ?>

                            <!-- SESSION COMMON -->
                            <li>
                                <a href="../front/catalog.php"><img src="../img/picto/search-lg.svg" alt="utilisateur">Consulter le catalogue</a>
                            </li>                 
                        </ul>
                    </div>
                    <div id="container-group-profil">
                        <ul>
                            <li>
                                <a href="#" id="settings"><img src="../img/side-bar/picto-settings.svg" alt="Options">Options</a>
                            </li>
                            <li>
                                <a href="./profil.php" id="profil"><img src="../img/side-bar/Avatar.svg" alt="prenom" id="profil-pict"><span>Mon profil</span></a>
                                <a href="./logout.php" id="btn-side-logout"><img src="../img/side-bar/picto-leave.svg" alt="Quitter"></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </nav>
    </header>



<!-- BOTTOM BAR -->
<div id="bottom-bar">
    <!-- SESSION USERS -->
    <?php
    if ($_SESSION['role'] == 0) {
    ?>
        <a href="../index.php"><img src="../img/side-bar/picto-home.svg" alt="accueil" id="btn-home"></a>
        <a href="#box-whish-list"><img src="../img/picto/heart-rounded-sidebar.svg" alt="accueil" id="btn-home"></a>
        <a href="#box-loan"><img src="../img/picto/book-open-02.svg" alt="nouveauté" id="btn-home"></a>
        <a href="../front/catalog.php"><img src="../img/picto/search-lg.svg" alt="utilisateur"></a>
    <?php
    }
    // SESSION ADMIN
    if ($_SESSION['role'] == 1) {
    ?>
        <a href="./crud-book.php"><img src="../img/side-bar/picto-CRUD.svg" alt="Crud book"></a>
        <a href="./register-book.php"><img src="../img/picto/bookmark.svg" alt="Registre des emprunts"></a>
        <a href="./crud-user.php"><img src="../img/side-bar/picto-users.svg" alt="Crud des utilisateurs"></a>
        <a href="../front/catalog.php"><img src="../img/picto/search-lg.svg" alt="Catalogue"></a>
    <?php
    }
    ?>
</div>
<main>