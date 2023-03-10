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
          <a href="./front/connect.php" id="btn-sign-up"><span>Connexion</span>
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
    <section id="section-news" class="row-limit-size">
      <div id="container-section-news">
        <div id="item-section-news-left">
          <h1>Les nouveautés chez <br> <span id="font-logo">Biblook</span></h1>
          <p id="sub-title">Des supers volontaires viennent rejoindre nos rangs <br> pour offrir des moments de lecture inoubliable !</p>
          <a href="#" id="btn-join-reader">Rejoins-nous dans l'aventure</a>
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
        <p class="sub-title">Nos lecteurs partagent leur coups de coeurs</p>
        <ul class="top">
          <?php
          $sql_heart = "SELECT `id_work`,`pict`,`title` FROM `work` ORDER BY `id_work` DESC LIMIT 4";
          $req_heart =  $db->query($sql_heart);
          $i = 1;
          while ($heart = $req_heart->fetch(PDO::FETCH_ASSOC)) {

          ?>
            <li><a href="./front/book-detail.php?id=<?= $heart['id_work'] ?>"><?= $i ?><img src="./img/books/<?= $heart['pict'] ?>" alt="<?= $heart['title'] ?>"></a></li>

          <?php
            $i++;
          } ?>
        </ul>
        <a href="#" id="btn-show-heart">Voir tous les coups de coeur</a>
    </section>


    <!-- ---------- SECTION - lAST ARRIVAL ---------- -->


    <section id="section-soon-available" class="row-limit-size">

      <h2>Derniers arrivages</h2>
      <h3 id="h3-tag">#tout juste disponible</h3>
      <div id="container-cards">

        <!-- find last 6 books in our librarerie -->


        <?php

        $sql =

          // DISTINCT prevent duplication of results, GROUP_CONCAT gathers results on same line 
          //CONCAT(...,SPACE(1),...) gathers result of two colones in one and insert one space between 
          //theese results

          "SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, 
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
              <span class="tag-new-index">Nouveau</span>
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
              <div>Lorem ipsum <br> Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lorem, ipsum dolor.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit Lorem ipsum dolor..</p>
            <a href="./blog.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-2">
            <div class="article-infos">
              <div>Lorem ipsum <br> Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lorem, ipsum dolor.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit Lorem ipsum dolor..</p>
            <a href="./blog2.php">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-3">
            <div class="article-infos">
              <div>Lorem ipsum <br> Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lorem, ipsum dolor.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit Lorem ipsum dolor..</p>
            <a href="">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-4">
            <div class="article-infos">
              <div>Lorem ipsum <br> Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lorem, ipsum dolor.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit Lorem ipsum dolor..</p>
            <a href="">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-5">
            <div class="article-infos">
              <div>Lorem ipsum <br> Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lorem, ipsum dolor.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit Lorem ipsum dolor..</p>
            <a href="">Lire l'article ↗</a>
          </div>
        </div>
        <div class="card-blog">
          <div class="card-blog-top" id="pict-aticle-6">
            <div class="article-infos">
              <div>Lorem ipsum <br> Mars 2023</div>
              <div class="category">Nouveautés</div>
            </div>
          </div>
          <div class="card-blog-bottom">
            <h4>Lorem, ipsum dolor.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit Lorem ipsum dolor..</p>
            <a href="">Lire l'article ↗</a>
          </div>
        </div>
      </div>
    </section>


    <!-- ---------- SECTION - FAQ ---------- -->

    <section id="section-faq" class="row-limit-size">
      <h2>Foire aux questions</h2>
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
            <li><a href="#section-soon-available">Bientôt disponible</a></li>
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

  <script src="./main.js"></script>
</body>

</html>