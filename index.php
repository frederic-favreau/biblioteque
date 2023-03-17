<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblook</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Nova+Slim&family=Risque&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>
  <?php
  require_once './connexion.php';



  ?>

  <!-- ---------- SECTION - HEADER - NAV - TOP ---------- -->


  <header id="main-header">
    <nav id="main-nav-bar">
      <div id="container-nav-bar" class="row-limit-size">
        <div id="container-group-logo">
          <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook">
          <span id="nav-logo-text">Biblook</span>
        </div>
        <div id="container-group-search-nav-top">
          <form action="./front/catalog.php?placeholde" method="GET">

            <input type="search" name="search" id="input-search-nav-top" placeholder="🔎 Taper votre recherche">
            <input type="submit" name="rechercher" value="Rechercher" id="btn-search-nav-top">


          </form>
        </div>
        <div id="container-group-btn-connexion">
          <a href="./front/connect.php" id="btn-sign-up"><span>Connexion / inscription</span>
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


  <!-- ---------- SECTION - NEWS ---------- -->

  <main>
    <section id="section-news" class="row-limit-size-full">
      <canvas></canvas>
      <div id="container-section-news">
        <div id="item-section-news-left">
          <h1>Les nouveautés chez <br> <span id="font-logo">Biblook</span></h1>
          <p id="sub-title">Des supers volontaires viennent rejoindre nos rangs pour offrir des moments de lecture inoubliable !</p>
          <a href="#" id="btn-join-reader">Débuter l'aventure maintenant</a>
        </div>
        <div id="item-section-news-right">
          <div id="item-news-right-top">
            <div class="flip">
              <div class="front front-item-1" style="background-image: url(./img/news-3.png)">
              </div>
              <div class="back front-item-1">
                <p><span>Lorem</span> ipsum dolor sit amet consectetur adipisicing elit. Voluptas nulla minima perferendis ipsum ab...</p>
              </div>
            </div>
            <div class="flip">
              <div class="front front-item-2" style="background-image: url(./img/news-2.png)">
              </div>
              <div class="back front-item-2">
                <p><span>Lorem</span> ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis..</p>
              </div>
            </div>
          </div>
          <div id="item-news-right-bottom">
            <div class="flip">
              <div class="front front-item-4" style="background-image: url(./img/news-1.png)">
              </div>
              <div class="back front-item-4">
                <p><span>Lorem</span> ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis..</p>
              </div>
            </div>
            <div class="flip">
              <div class="front front-item-3" style="background-image: url(./img/news-1.png)">
              </div>
              <div class="back front-item-3">
                <p><span>Lorem</span> tools make application development quicker and easier to maintain than if you did everything by hand..</p>
              </div>
            </div>
            <div class="flip">
              <div class="front front-item-5" style="background-image: url(./img/news-1.png)">
              </div>
              <div class="back front-item-5">
                <p><span>Lorem</span> ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis..</p>
              </div>
            </div>
          </div>
    </section>


    <!-- ---------- SECTION - HEART ---------- -->


    <section id="section-heart" class="row-limit-size">
      <h2>Coups de coeur</h1>
        <p class="sub-title-section">Nos lecteurs partagent leur coups de coeurs</p>
        <ul class="top">
          <?php
          $sql_heart = "SELECT `id_work`,`pict`,`title` FROM `work` ORDER BY `id_work` DESC LIMIT 4";
          $req_heart =  $db->query($sql_heart);
          $i = 1;
          while ($heart = $req_heart->fetch(PDO::FETCH_ASSOC)) {
            $card_class = ($i <= 2) ? 'left-card' : 'right-card';
          ?>

            <li class="<?= $card_class ?>"><a href="./front/book-detail.php?id=<?= $heart['id_work'] ?>"><?= $i ?><img src="./img/books/<?= $heart['pict'] ?>" alt=""></a></li>

          <?php
            $i++;
          } ?>
        </ul>

        <a href="#" id="btn-show-heart">Voir tous les coups de coeur</a>
    </section>


    <!-- ---------- SECTION - lAST ARRIVAL ---------- -->


    <section id="section-soon-available" class="row-limit-size">

      <h2>Derniers arrivages</h2>
      <h3 id="h3-tag"># tout juste disponible</h3>
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

        GROUP BY `id_work` ORDER BY `id_work` DESC LIMIT 9";


        $req = $db->query($sql);
        while ($card = $req->fetch(PDO::FETCH_ASSOC)) {

        ?>


          <div class="card">
            <div class="top-item-card">
              <?php
              $now = date('Y-m-d',  strtotime('-2 month'));
              $date = $card['published_at'];
              if ($date > $now) {
              ?>
                <span class="tag-new-index">Nouveau</span>
              <?php
              }

              ?>

              <img src="./img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>">
            </div>
            <div class="bottom-item-card">


              <!-- str_replace takes three arguments, first element to replace, 
            seconde element to insert, third target of function -->

              <h4><?= str_replace(',', ', ', $card['genres']) ?></h4>
              <h3 class="title-card-index"><?= $card['title'] ?></h3>
              <!-- <p class="description-card"><?= $card['extract'] ?></p> -->
              <h5><?= str_replace(',', ', ', $card['authors']) ?></h5>
              <a href="./front/book-detail.php?id=<?= $card['id_work'] ?>" class="link-page">En savoir plus 🡪</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>

    <!-- ---------- SECTION - CTA AVAILABLE ---------- -->


    <section id="section-cta-available">
      <h2>Vous recherchez un livre en particulier ?</h2>
      <p id="sub-title">Faites votre demande dès maintenant auprès de <span id="font-logo">Biblook</span></p>
      <a href="#">Demander un livre</a>
    </section>


    <!-- ---------- SECTION - BLOG ---------- -->


    <section id="section-blog" class="row-limit-size">
      <h3 id="h3-tag">En manque d'infos ?</h3>
      <h2>Notre blog</h2>
      <div id="container-section-blog">
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-1">
            <div class="article-infos">
              <div>Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Journée Portes Ouvertes</h4>
            <p>Visite guidée à Biblook, vente de livres atelier et lecture pour les enfants...</p>
            <a href="./front/blog.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-2">
            <div class="article-infos">
              <div>Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Les chevaux ne mentent jamais</h4>
            <p>Chercher à communiquer avec les chevaux nous en révèle beaucoup sur soi-même...</p>
            <a href="./front/blog2.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-3">
            <div class="article-infos">
              <div>Février 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Une amie m’a parlé du régime Kéto</h4>
            <p>Après plusieurs régimes différents, une amie m’ parlé du régime Kéto..</p>
            <a href="./front/blog3.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-4">
            <div class="article-infos">
              <div>Février 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Venez troquer des boutures</h4>
            <p>Un super évenement à ne pas rater près de chez vous..</p>
            <a href="./front/blog4.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-5">
            <div class="article-infos">
              <div>Janvier 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lettre aux écolos: Comment bien s'informer?</h4>
            <p>Les écolos se sont rassemblés
              à la bibliothèque afin de partager leurs connaissances..</p>
            <a href="./front/blog5.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-6">
            <div class="article-infos">
              <div>Janvier 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Prix du Club-lecture 2022</h4>
            <p>Le 28 octobre 2022 le Club-lecture de la bibliothèque de Saint-Denis-les-Bourg..</p>
            <a href="./front/blog6.php">Lire l'article ↗</a>
          </div>
        </div>
      </div>
    </section>



    <!-- ---------- SECTION - ZOOM ---------- -->


    <section id="section-zoom" class="row-limit-size">
      <h3 id="h3-tag"></h3>
      <h2>Zoom sur nos Biblookeurs</h2>
      <div id="container-section-zoom">
        <div id="item-top-zoom-1" class="pict-right">
          <div id="item-text" class="item-text-commun">
            <h4>Margot Fleury</h4>
            <h5>Etudiante en droit, adhérente chez Biblook depuis un an</h5>
            <p>“Etudiante en droit, une amie m’a recommandé cette bibliothèque.
              J’apprends beaucoup grâce aux livres, cela m’aide pour mes études.
              Tout est bien organisé, les ouvrages m’aident à m’instruire.
              Bon accueil ”.</p>
          </div>
          <div id="item-pict1" class="item-pict-commun">
            <img src="./img/zoom/Margaux-fleury-zoom-2.png" alt="Margot Fleury">
          </div>
        </div>
        <div id="item-top-zoom-2" class="pict-left">
          <div id="item-pict" class="item-pict-commun">
            <img src="./img/zoom/Ethan-zoom-4.png" alt="Ethan Siou">
          </div>
          <div id="item-text" class="item-text-commun">
            <h4>Ethan Siou</h4>
            <h5>Etudiant en médecine, adhérent depuis deux ans</h5>
            <p>“Etudiante en droit, une amie m’a recommandé cette bibliothèque.
              J’apprends beaucoup grâce aux livres, cela m’aide pour mes études.
              Tout est bien organisé, les ouvrages m’aident à m’instruire.
              Bon accueil ”.</p>
          </div>
        </div>
        <div id="item-top-zoom-1" class="pict-right">
          <div id="item-text" class="item-text-commun">
            <h4>Marilou Balu</h4>
            <h5>Retraité, adhérent chez Biblook depuis 5 ans</h5>
            <p>J’accompagne mes deux enfants aux ateliers lecture organisé et encadré par une
              bénévole tous les mercredis après-midi, c’est devenu une activité principale, ils se
              régalent. Les bénévoles sont très humains, développe la curiosité des enfants,
              et leur permettent de rencontrer d’autres enfants autour d’une histoire.
              Bbiblook est calme, chaleureux ou l’on passe de bon moments”.</p>
          </div>
          <div id="item-pict1" class="item-pict-commun">
            <img src="./img/zoom/Marilou-zoom-3.png" alt="Margot Fleury">
          </div>
        </div>
        <div id="item-top-zoom-2" class="pict-left">
          <div id="item-pict" class="item-pict-commun">
            <img src="./img/zoom/Henri-Burtin-zoom-1.png" alt="Henri Burtin">
          </div>
          <div id="item-text" class="item-text-commun">
            <h4>Henri Burtin</h4>
            <h5>Retraité, adhérent chez Biblook depuis 5 ans</h5>
            <p>“Fidèle à Biblook, je trouve ce lieu intéressant dans la diversité des ouvrages.
              Je passe beaucoup de temps à lire, les bénévoles font un travail remarquable.
              Je me suis inscrit il y 5 ans, la carte de fidélité apporte de bons avantages.
              J’accompagne mes petits-enfants pour des ateliers lectures organisé par Biblook;
              tout le monde trouve son bonheur, je recommande cette biblothèque ”.</p>
          </div>
        </div>
      </div>

    </section>



    <!-- ---------- SECTION - FAQ ---------- -->

    <section id="section-faq" class="row-limit-size">
      <h2 id="section-title">Foire aux questions</h2>
      <h3 class="h3-faq">Toutes les choses que vous devez savoir sont ici.</h3>
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
          <p class="question">Puis-je prolonger le prêt de mes  livres ?</p>
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
        <p>Et vous n'avez pas toruvé sur notre site ? Alors n'hésitez pas une seconde, contacter nos supers administrateurs.</p>
        <a href="#">Nous contacter</a>
      </div>
    </section>


    <!-- ---------- SECTION - LOCATION ---------- -->


    <section id="section-location" class="row-limit-size">
      <h3 class="h3-location">Où nous trouver ?</h3>
      <h2>Direction <span id="font-logo">Biblook</span> à Saint-Denis-les-Bourg</h2>
      <p>On vous attend avec de nombreuses histoires à vous racontrer</p>
      <div id="iframe-google">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11044.437612948708!2d5.2002043!3d46.2082786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f351d5381cf5a1%3A0xa21cda6ac9796fea!2sOnlineformapro!5e0!3m2!1sfr!2sfr!4v1677963587612!5m2!1sfr!2sfr" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div id="container-info-location">
        <ul>
          <li><span>Infos pratiques :</span></li>
          <li>📫 244B Rue du Point du Jour, <br> 01000 Saint-Denis-lès-Bourg</li>
          <li>🌐 onlineformationpro.com</li>
          <li>☏ 04 28 36 06 93</li>
        </ul>
        <ul>
          <li><span>Nos horaires :</span></li>
          <li>Du lundi au vendredi 08:30-12:00</li>
          <li>Du lundi au vendredi 13:30-17:00</li>
          <li>Du samedi au dimanche fermé</li>
        </ul>
      </div>
    </section>
  </main>


  <!-- ---------- SECTION - FOOTER ---------- -->


  <footer id="footer">
    <div id="container-footer-top">
      <div id="item-footer-left">
        <div id="group-logo">
          <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook">
          <span id="font-logo">Biblook</span>
        </div>
        <ul>
          <div id="list-left">
            <li><a href="#main-header">Nouveautés</a></li>
            <li><a href="#section-heart">Coups de coeur</a></li>
            <li><a href="#section-soon-available">Derniers arrivages</a></li>
          </div>
          <div id="list-right">
            <li><a href="#section-blog">Blog</a></li>
            <li><a href="#section-faq">FAQ</a></li>
            <li><a href="#section-location">Contact</a></li>
          </div>
        </ul>
      </div>
      <div id="item-footer-right">
        <p>Newsletter</p>
        <form action="#">
          <input type="mail">
          <button type="submit">Souscrire</button>
        </form>
      </div>
    </div>
    <hr>
    <div id="container-footer-bottom" class="row-limit-size">
      <ul>
        <li><a href="#">Conditions</a></li>
        <li><a href="#">Copyright</a></li>
        <li><a href="#">Cokkies</a></li>
      </ul>
      <p>©2023 <span id="font-logo">Biblook</span>. Tous droits réservés.</p>
    </div>
  </footer>

  <script src="./js/hero.js"></script>
  <script src="./main.js"></script>
</body>

</html>