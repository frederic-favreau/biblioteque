<!DOCTYPE html>
<html lang="en">

<head>
  <?php session_start() ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblook</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style-catalogue.css">
  <link rel="stylesheet" href="../css/style-book-detail.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Nova+Slim&family=Risque&display=swap" rel="stylesheet">

</head>

<body>

  <!-- ---------- SECTION - HEADER - NAV - TOP ---------- -->


  <header id="main-header">
    <nav id="main-nav-bar">
      <div id="container-nav-bar" class="row-limit-size">
        <div id="container-group-logo">
          <a href="../index.php" class="link-page-home"><img src="../img/logo-seul-biblook-noir.svg" alt="Biblook">
            <span id="nav-logo-text">Biblook</span></a>
        </div>
        <div id="container-group-search-nav-top">
          <form action="../front/catalog.php?placeholde" method="GET">

            <input type="search" name="search" id="input-search-nav-top" placeholder="🔎 Taper votre recherche">
            <input type="submit" name="rechercher" value="Rechercher" id="btn-search-nav-top">


          </form>
        </div>
        <div id="container-group-btn-connexion">
          <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
            // Afficher le contenu pour les utilisateurs connectés
          ?>
            <div><a href="#">avatar</a></div>

          <?php
          } else { ?>
            <a href="../front/connect.php" id="btn-sign-up"><span>Connexion / inscription</span>
              var_dump
            <?php
          } ?>

            <div id="menu-burger">
              <div class="menu-burger-pipe" id="menu-burger-pipe-top"></div>
              <div class="menu-burger-pipe" id="menu-burger-pipe-middle"></div>
              <div class="menu-burger-pipe" id="menu-burger-pipe-bottom"></div>
            </div>
            </a>
        </div>
      </div>
    </nav>
  </header>