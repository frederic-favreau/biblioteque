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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>


  <!-- ---------- SECTION - HEADER-DEFAULT - NAV - TOP ---------- -->
  <header id="main-header">
    <nav id="main-nav-bar">
      <div id="container-nav-bar" class="row-limit-size">
        <div id="container-group-logo">
          <a href="../index.php" class="link-page-home"><img src="../img/logo-seul-biblook-noir.svg" alt="Biblook">
            <span id="nav-logo-text">Biblook</span></a>
        </div>
        <div id="arrow-container">
          <button id="left-arrow"><img src="../img/picto/chevron-left.svg" alt="Flèche gauche"></button>
        </div>
        <div id="container-group-search-nav-top">
          <form action="../front/catalog.php?placeholde" method="GET">
            <input type="search" name="search" id="input-search-nav-top" placeholder="Taper votre recherche">
            <input type="submit" name="rechercher" value="" id="btn-search-nav-top">
          </form>
        </div>

        <div id="btn-responsive-search">
          <button type="button" id="show-search-bar"><img src="../img/picto/search-lg.svg" alt="Loupe"></button>
        </div>

        <div id="container-group-btn-connexion">
          <div id="container-box-index-logout">

            <!-- SESSION USERS -->
            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == true  && $_SESSION['role'] == 0) { ?>
              <a href="#" id="btn-index-session"><img src="../img/picto/avatar-user.svg" alt="avatar"></a>
              <script src="../js/logout-index.js"></script>

              <!-- SESSION ADMIN -->
            <?php } else if (isset($_SESSION['connect']) && $_SESSION['connect'] == true  && $_SESSION['role'] == 1) { ?>
              <a href="#" id="btn-index-session-admin"><img src="../img/side-bar/Avatar.svg" alt="avatar"></a>
              <script src="../js/logout-all-admin.js"></script>

              <!-- GO TO LOGIN -->
            <?php } else { ?>
              <a href="../front/connect.php" id="btn-sign-up">
                <span id="mobile"><img src="../img/picto/log-in-01.svg" alt="login"></span>
                <span id="desktop">Connexion / inscription</span>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
  </header>