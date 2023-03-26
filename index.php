<!DOCTYPE html>
<html lang="en">

<head>
  <?php session_start() ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblook</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Nova+Slim&family=Risque&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <?php require_once './connexion.php'; ?>



  <!-- ---------- SECTION - HEADER - NAV - TOP ---------- -->

  <!-- ---------- SECTION - HEADER - NAV - TOP ---------- -->
  <header id="main-header">
    <nav id="main-nav-bar">
      <div id="container-nav-bar" class="row-limit-size">
        <div id="container-group-logo">
          <a href="#section-main-hero" class="link-page-home slow-return"><img src="./img/logo-seul-biblook-noir.svg" alt="Biblook">
            <span id="nav-logo-text">Biblook</span>
          </a>
        </div>
        <div id="arrow-container">
          <button id="left-arrow"><img src="./img/picto/chevron-left.svg" alt="Flèche gauche"></button>
        </div>
        <div id="container-group-search-nav-top">
          <form action="./front/catalog.php?placeholde" method="GET">
            <input type="search" name="search" id="input-search-nav-top" placeholder="Taper votre recherche">
            <input type="submit" name="rechercher" value="" id="btn-search-nav-top">
          </form>
        </div>
        
        <div id="btn-responsive-search">
          <button type="button" id="show-search-bar"><img src="./img/picto/search-lg.svg" alt="Loupe"></button>
        </div>

        <div id="container-group-btn-connexion">
          <div id="container-box-index-logout">

            <!-- SESSION USERS -->
            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == true  && $_SESSION['role'] == 0) { ?>
              <a href="#" id="btn-index-session"><img src="./img/picto/avatar-user.svg" alt="avatar"></a>
              <script src="./js/logout-index.js"></script>

              <!-- SESSION ADMIN -->
            <?php } else if (isset($_SESSION['connect']) && $_SESSION['connect'] == true  && $_SESSION['role'] == 1) { ?>
              <a href="#" id="btn-index-session-admin"><img src="./img/side-bar/Avatar.svg" alt="avatar"></a>
              <script src="./js/logout-index-admin.js"></script>

              <!-- GO TO LOGIN -->
            <?php } else { ?>
              <a href="./front/connect.php" id="btn-sign-up">
                <span id="mobile"><img src="./img/picto/log-in-01.svg" alt="login"></span>
                <span id="desktop">Connexion / inscription</span>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
  </header>



  <!-- ---------- SECTION - MAIN HERO ---------- -->

  <main>
    <section id="section-main-hero" class="row-limit-size-full">
      <div id="container-section-main-hero" class="row-limit-size-full">
        <div id="item-section-main-hero-left">
          <h1 id="title-hero">Biblook</h1>
          <p id="sub-title-hero">La bibliothèque qui propose <br> des livres pour <span class="animated-word smoke-effect" id="animated-word">Apprendre</span></p>
          <div class="picto-choise-profil">
            <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook" class="pict-hero-commun" id="pict-hero-fille">
            <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook" class="pict-hero-commun" id="pict-hero-ado">
            <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook" class="pict-hero-commun" id="pict-hero-adulte">
          </div>
          <a href="./front/catalog.php" id="discover-space">Découvrir le catalogue</a>
        </div>
        <div id="item-section-main-hero-right">
          <img src="./img/hero/fille-livre-1.jpg" alt="Fille" class="pict-reader-hero">
        </div>
      </div>
    </section>



    <!-- ---------- SECTION - NEWS ---------- -->

    <section id="section-news" class="row-limit-size-full">
      <div id="container-section-news" class="row-limit-size">
        <div id="item-section-news-right">
          <div id="item-news-right-top">
            <div class="flip" data-index="0">
              <div class="front front-item-1" style="background-image: url(./img/lecteurs/elisa.jpg)">
              </div>
              <div class="back front-item-1">
                <p><span>Elisa</span> accueil vos enfants pour des ateliers lecture tous les mercredis après-midi</p>
              </div>
            </div>
            <div class="flip" data-index="1">
              <div class="front front-item-2" style="background-image: url(./img/lecteurs/najia.jpg)">
              </div>
              <div class="back front-item-2">
                <p><span>Najia</span> vous fait découvrir les derniers coups de cœur</p>
              </div>
            </div>
          </div>
          <div id="item-news-right-bottom">
            <div class="flip" data-index="2">
              <div class="front front-item-4" style="background-image: url(./img/lecteurs/fred.HEIC)">
              </div>
              <div class="back front-item-4">
                <p><span>Fred</span> présente les derniers arrivages chaque semaine</p>
              </div>
            </div>
            <div class="flip" data-index="3">
              <div class="front front-item-3" style="background-image: url(./img/lecteurs/IMG_0163.jpg)">
              </div>
              <div class="back front-item-3">
                <p><span>Jirka</span> est à disposition pour l’agenda des évènements</p>
              </div>
            </div>
            <div class="flip" data-index="4">
              <div class="front front-item-5" style="background-image: url(./img/lecteurs/alex.jpg)">
              </div>
              <div class="back front-item-5">
                <p><span>Alex</span> est à votre service pour vos recherches de livres</p>
              </div>
            </div>
          </div>
        </div>
        <div id="item-section-news-left">
          <h1>Les nouveautés chez <br> <span id="font-logo">Biblook</span></h1>
          <p id="sub-title">Des supers volontaires viennent rejoindre nos rangs pour offrir
            des moments de lecture inoubliable !</p>
          <a href="./front/connect.php" id="btn-join-reader">Débuter l'aventure</a>
        </div>
      </div>
    </section>



    <!-- ---------- SECTION - HEART ---------- -->

    <section id="section-heart" class="row-limit-size">
      <h2>Coups de coeur</h2>
      <p class="sub-title-section" id="sub-title-heart">Nos lecteurs partagent leur coups de coeurs</p>
      <ul class="top">
        <?php
        $sql_heart = "SELECT `id_work`,`pict`,`title` FROM `work` ORDER BY `id_work` DESC LIMIT 4";
        $req_heart =  $db->query($sql_heart);
        $i = 1;
        while ($heart = $req_heart->fetch(PDO::FETCH_ASSOC)) {
          $card_class = 'animated-card';
        ?>

          <li class="<?= $card_class ?>"><a href="./front/book-detail.php?id=<?= $heart['id_work'] ?>"><?= $i ?><img src="./img/books/<?= $heart['pict'] ?>" alt="<?= $heart['title'] ?>"></a></li>

        <?php
          $i++;
        } ?>
      </ul>

      <a href="./front/catalog.php" id="btn-show-heart">Voir tous les coups de coeur</a>
    </section>



    <!-- ---------- SECTION - lAST ARRIVAL ---------- -->

    <section id="section-soon-available" class="row-limit-size">

      <h2>Derniers arrivages</h2>
      <h3 id="h3-tag">tout juste disponible</h3>
      <div id="container-cards">

        <!-- find last 9 books in our librarerie -->


        <?php

        $sql =

          // DISTINCT prevent duplication of results, GROUP_CONCAT gathers results on same line 
          //CONCAT(...,SPACE(1),...) gathers result of two colones in one and insert one space between 
          //theese results

          "SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, `published_at`, 
        GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
        GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors` 
        FROM `work`

        INNER JOIN `work_genre` 
        ON `work`.`id_work` = `work_genre`.`work_id`

        INNER JOIN `genre`
        ON `work_genre`.`genre_id` =`genre`.`id_genre`

        INNER JOIN `work_author`
        ON `work_author`.`work_id` = `work`.`id_work`

        INNER JOIN `author`
        ON `work_author`.`author_id` = `author`.`id_author`

        GROUP BY `id_work` ORDER BY `id_work` DESC LIMIT 6";


        $req = $db->query($sql);
        while ($card = $req->fetch(PDO::FETCH_ASSOC)) {

        ?>


          <div class="card" style="--card-index: 1;">
            <div class="top-item-card">
              <?php
              $now = date('Y-m-d',  strtotime('-2 month'));
              $date = $card['published_at'];
              if ($date > $now) {
              ?>
              <?php
              }

              ?>

              <img src="./img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>" class="pict-card-book">
            </div>
            <div class="bottom-item-card">


              <!-- str_replace takes three arguments, first element to replace, 
            seconde element to insert, third target of function -->

              <h4 id="title-genre"><?= str_replace(',', ', ', $card['genres']) ?></h4>
              <h3 class="title-card-index"><?= $card['title'] ?></h3>
              <!-- <p class="description-card"><?= $card['extract'] ?></p> -->
              <h5 id="title-author"><?= str_replace(',', ', ', $card['authors']) ?></h5>
              <a href="./front/book-detail.php?id=<?= $card['id_work'] ?>" class="link-page">En savoir plus 🡪</a>
              <form action="./admin/like.php?id=<?= $card['id_work'] ?>" method="POST">

                <?php


                if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
                  $idUser = $_SESSION['id-user'];
                  $idBook = $card['id_work'];

                  $coeurSql = $db->prepare("SELECT `work_id`,`user_id` FROM `like` WHERE`user_id` = :user_id AND `work_id` = :work_id");

                  $coeurSql->bindParam('user_id', $idUser, PDO::PARAM_INT);
                  $coeurSql->bindParam('work_id', $idBook, PDO::PARAM_INT);
                  $coeurSql->execute();
                  $coeur = $coeurSql->fetch(PDO::FETCH_ASSOC);
                  if ($coeur == true) {
                ?>
                    <input type="submit" value="" name="coeur" class="heart-wishlist input-heart input-heart-red">

                  <?php } else { ?>
                    <input type="submit" value="" name="coeur" class="heart-wishlist input-heart input-fill-blue">
                <?php }
                } ?>

              </form>

            </div>
          </div>
        <?php } ?>
      </div>
    </section>



    <!-- ---------- SECTION - CTA AVAILABLE ---------- -->

    <section id="section-cta-available">
      <h2 class="title-cta">Vous recherchez un livre en particulier ?</h2>
      <p class="sub-title-section" id="sub-title-cta">Faites votre demande dès maintenant auprès de <span id="font-logo">Biblook</span></p>
      <a href="./front/connect.php">Demander un livre</a>
    </section>



    <!-- ---------- SECTION - BLOG ---------- -->

    <section id="section-blog" class="row-limit-size">
      <p class="sub-title-section">En manque d'infos ?</p>
      <h2>Notre blog</h2>
      <div id="container-section-blog">
        <div class="card-blog">
          <div class="card-blog-top">
            <div class="bg-image hover-scale" id="pict-aticle-1"></div>
            <div class="article-infos">Nouveautés</div>
          </div>
          <div class="card-blog-bottom">
            <h4>Journée Portes Ouvertes</h4>
            <p>Biblook vous ouvre ces portes le mercredi 21 juin 2023 et vous propose une visite guidée. Au programme découverte des lieux ...</p>
            <p class="date-article-blog"><i>Mars 2023</i></p>
            <a href="./front/blog.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top">
            <div class="bg-image hover-scale" id="pict-aticle-2"></div>
            <div class="article-infos">Nouveautés</div>
          </div>
          <div class="card-blog-bottom">
            <h4>Les chevaux ne mentent jamais</h4>
            <p>Chercher à communiquer avec les chevaux nous en révèle beaucoup sur soi-même. Un livre dans lequel on apprend le comportement du cheval ...</p>
            <p class="date-article-blog"><i>Mars 2023</i></p>
            <a href="./front/blog2.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top">
            <div class="bg-image hover-scale" id="pict-aticle-3"></div>
            <div class="article-infos">Nouveautés</div>
          </div>
          <div class="card-blog-bottom">
            <h4>Une amie m’a parlé du régime Kéto</h4>
            <p>Après plusieurs régimes différents, une amie m’ parlé du régime Kéto. C’est grâce à ce livre que j’ai découvert une nouvelle expérience sur la façon de manger et de cuisiner ...</p>
            <p class="date-article-blog"><i>Février 2023</i></p>
            <a href="./front/blog3.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top">
            <div class="bg-image hover-scale" id="pict-aticle-4"></div>
            <div class="article-infos">Nouveautés</div>
          </div>
          <div class="card-blog-bottom">
            <h4>Venez troquer des boutures</h4>
            <p>Un évènement à ne pas rater près de chez vous. RDV le 24 avril 2023 à 14h. Journée de partage pour se conseiller, s’entraider autour du thème du jardinage ...</p>
            <p class="date-article-blog"><i>Février 2023</i></p>
            <a href="./front/blog4.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top">
            <div class="bg-image hover-scale" id="pict-aticle-5"></div>
            <div class="article-infos">Nouveautés</div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lettre aux écolos: Comment bien s'informer?</h4>
            <p>Les écolos se sont rassemblés à la bibliothèque afin de partager leurs connaissances et de guider certains lecteurs ...</p>
            <p class="date-article-blog"><i>Janvier 2023</i></p>
            <a href="./front/blog5.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top">
            <div class="bg-image hover-scale" id="pict-aticle-6"></div>
            <div class="article-infos">Nouveautés</div>
          </div>
          <div class="card-blog-bottom">
            <h4>Prix du Club-lecture 2022</h4>
            <p>Le 28 octobre 2022 le Club-lecture de la bibliothèque Bibllok de Saint-Denis-les-Bourg s’est réuni comme chaque années pour élire le prix du Club-lecture ... </p>
            <p class="date-article-blog"><i>Janvier 2023</i></p>
            <a href="./front/blog6.php">Lire l'article ↗</a>
          </div>
        </div>
      </div>
    </section>



    <!-- ---------- SECTION - ZOOM ---------- -->


    <section id="section-zoom" class="row-limit-size">
      <h2>Zoom sur nos Biblookeurs</h2>
      <div id="container-section-zoom">
        <div id="item-top-zoom-1" class="pict-right">
          <div id="item-text" class="item-text-commun">
            <h4>Margot Fleury</h4>
            <h5>Etudiante en droit, adhérente chez Biblook depuis un an</h5>
            <p><span>❝</span> Etudiante en droit, une amie m’a recommandé cette bibliothèque.
              J’apprends beaucoup grâce aux livres, cela m’aide pour mes études.
              Tout est bien organisé, les ouvrages m’aident à m’instruire.
              Bon accueil.<span>❞</span></p>
          </div>
          <div id="item-pict1" class="item-pict-commun">
            <img src="./img/zoom/Margaux-fleury-zoom-2.jpg" alt="Margot Fleury">
          </div>
        </div>
        <div id="item-top-zoom-2" class="pict-left">
          <div id="item-pict" class="item-pict-commun">
            <img src="./img/zoom/Ethan-zoom-4.jpg" alt="Ethan Siou">
          </div>
          <div id="item-text" class="item-text-commun">
            <h4>Ethan Siou</h4>
            <h5>Etudiant en médecine, adhérent depuis deux ans</h5>
            <p><span>❝</span> “Avec des cours intensifs, je me ressource chez Biblook dans un lieu calme et apaisant.
              J’approndis mes connaissance en médecine grâce aux livres que j’emprunte à la bibliothèque.
              Les délais sont respectables, les étudiants sont valorisés avec la carte de fidélité.
              Une bibliothèque chaleureuse ou il fait bon d’étudier ”. <span>❞</span></p>
          </div>
        </div>
        <div id="item-top-zoom-1" class="pict-right">
          <div id="item-text" class="item-text-commun">
            <h4>Marilou Balu</h4>
            <h5>Mère au foyer, maman de deux enfants</h5>
            <p><span>❝</span> J’accompagne mes deux enfants aux ateliers lecture organisé et encadré par une
              bénévole tous les mercredis après-midi, c’est devenu une activité principale, ils se
              régalent. Les bénévoles sont très humains, développe la curiosité des enfants,
              et leur permettent de rencontrer d’autres enfants autour d’une histoire.
              Bbiblook est calme, chaleureux ou l’on passe de bon moments. <span>❞</span></p>
          </div>
          <div id="item-pict1" class="item-pict-commun">
            <img src="./img/zoom/Marilou-zoom-3.jpg" alt="Margot Fleury">
          </div>
        </div>
        <div id="item-top-zoom-2" class="pict-left">
          <div id="item-pict" class="item-pict-commun">
            <img src="./img/zoom/Henri-Burtin-zoom-1.jpg" alt="Henri Burtin">
          </div>
          <div id="item-text" class="item-text-commun">
            <h4>Henri Burtin</h4>
            <h5>Retraité, adhérent chez Biblook depuis 5 ans</h5>
            <p><span>❝</span> Fidèle à Biblook, je trouve ce lieu intéressant dans la diversité des ouvrages.
              Je passe beaucoup de temps à lire, les bénévoles font un travail remarquable.
              Je me suis inscrit il y 5 ans, la carte de fidélité apporte de bons avantages.
              J’accompagne mes petits-enfants pour des ateliers lectures organisé par Biblook;
              tout le monde trouve son bonheur, je recommande cette biblothèque. <span>❞</span></p>
          </div>
        </div>
      </div>

    </section>



    <!-- ---------- SECTION - FAQ ---------- -->

    <section id="section-faq" class="row-limit-size">
      <h2 id="section-title">Foire aux questions</h2>
      <p class="sub-title-section">Toutes les choses que vous devez savoir sont ici.</p>
      <div id="container-faq">
        <div class="item-faq">
          <p class="question">Que faire si j'ai perdu ma carte lecteur ?</p>
          <p class="faq-answer">Vous pouvez quand même emprunter des documents. Nous referons votre carte quand vous serez certain de ne pas la retrouver, la carte étant gratuite pour vous mais représentant un coût pour la collectivité.
          </p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Puis-je emprunter des documents du secteur jeunesse avec un abonnement adulte ?</p>
          <p class="faq-answer">Oui, si vous êtes enseignant.</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Internet est-il gratuit au sein de la bibliothèque ?</p>
          <p class="faq-answer"> Dans les locaux de la bibliothèque les enfants sont sous la responsabilité de leurs parents ; le personnel de la bibliothèque les accueille, les conseille mais ne peut en aucun cas les garder.
          </p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Puis-je prolonger le prêt de mes livres ?</p>
          <p class="faq-answer">Les livres peuvent être prolongés, depuis votre espace client.</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Que puis-je faire si je ne suis pas inscrit à la bibliothèque ?</p>
          <p class="faq-answer">Vous pouvez consulter sur place, participer aux animations.</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Je suis enseignant, puis-je emprunter plus de documents ?</p>
          <p class="faq-answer">Oui, si vous enseignez sur la commune.</p>
          <div class="toggle-symbol"></div>
        </div>
      </div>
      <div id="banner-faq-contact">
        <div id="pict-admin-faq">
          <img src="./img/profil-round/Avatar.png" alt="avatar">
          <img src="./img/profil-round/Avatar (1).png" alt="avatar1">
          <img src="./img/profil-round/Avatar (2).png" alt="avatar2">
        </div>
        <h4>Vous avez une ou des questions ?</h4>
        <p>Alors n'hésitez pas une seconde, contacter nos supers administrateurs</p>
        <a href="#section-location">Nous contacter</a>
      </div>
    </section>



    <!-- ---------- SECTION - LOCATION ---------- -->


    <section id="section-location" class="row-limit-size">
      <p class="sub-title-section">Où nous trouver ?</p>
      <h2 id="title-location">Direction <span id="font-logo">Biblook</span> <br> à Saint-Denis-les-Bourg</h2>
      <div id="iframe-google">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11044.437612948708!2d5.2002043!3d46.2082786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f351d5381cf5a1%3A0xa21cda6ac9796fea!2sOnlineformapro!5e0!3m2!1sfr!2sfr!4v1677963587612!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div id="container-info-location">
          <ul>
            <h5><img src="./img/picto/marker-pin-02.svg" alt="Localisation"></h5>
            <li><span>Nous situer</span></li>
            <li>244b rue du Pont du Jour</li>
            <li>01000 Saint-Denis-lès-Bourg</li>
          </ul>
          <ul>
            <h5><img src="./img/picto/Icon-mail.svg" alt="Email"></h5>
            <li><span>Email</span></li>
            <li><a href="#">contact@biblook.com</a></li>
          </ul>
          <ul>
            <h5><img src="./img/picto/phone.svg" alt="Téléphone"></h5>
            <li><span>Téléphone</span></li>
            <li><a href="#">04 38 38 24 38</a></li>
          </ul>
        </div>
      </div>
    </section>
  </main>


  <!-- ---------- SECTION - FOOTER ---------- -->


  <footer id="footer">
    <div id="container-footer-top">
      <div id="item-footer-left">
        <div id="container-group-logo-botom">
          <a href="#section-main-hero" class="link-page-home slow-return"><img src="./img/logo-seul-biblook-noir.svg" alt="Biblook">
            <span id="nav-logo-text">Biblook</span></a>
        </div>
        <ul>
          <div id="list-left">
            <li><a href="#section-main-hero" class="slow-return">Découvrir</a></li>
            <li><a href="#section-news" class="slow-return">Nouveautés</a></li>
            <li><a href="#section-heart" class="slow-return">Coups de coeur</a></li>
            <li><a href="#section-soon-available" class="slow-return">Derniers arrivages</a></li>
            <li><a href="#section-zoom" class="slow-return">Zoom</a></li>

          </div>
          <div id="list-right">
            <li><a href="#section-blog" class="slow-return">Blog</a></li>
            <li><a href="#section-faq" class="slow-return">FAQ</a></li>
            <li><a href="#section-location" class="slow-return">Contact</a></li>
          </div>
        </ul>
      </div>
      <div id="item-footer-right">
        <form action="#" id="newsletter">
          <input type="mail" name="mail" placeholder="Rejoinez la Newsletter">
          <input type="submit" id="btn-submit-newsletter" value="Souscrire"></input>
        </form>
      </div>
    </div>
    <hr>
    <div id="container-footer-bottom" class="row-limit-size">
      <ul>
        <li><a href="#">Conditions</a></li>
        <li><a href="#">Copyright</a></li>
        <li><a href="#">Cookies</a></li>
      </ul>
      <p>©2023 <span id="font-logo">Biblook</span>. Tous droits réservés.</p>
    </div>
  </footer>

  <script src="./main.js"></script>
  <button id="back-to-top" title="Retour en haut">
    <i class="fas fa-arrow-up"></i>
  </button>
</body>

</html>