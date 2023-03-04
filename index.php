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

  <!-- ---------- SECTION - HEADER - NAV - TOP ---------- -->


  <header id="main-header">
    <nav id="main-nav-bar">
      <div id="container-nav-bar" class="row-limit-size">
        <div id="container-group-logo">
          <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook">
          <span id="nav-logo-text">Biblook</span>
        </div>
        <div id="container-group-search-nav-top">
          <input type="text" id="input-search-nav-top" placeholder="🔎 Taper votre recherche">
          <a href="#" id="btn-search-nav-top">Rechercher</a>
        </div>
        <div id="container-group-btn-connexion">
          <a href="./front/connect.php" id="btn-log-in">Connexion</a>
          <a href="./front/connect.php" id="btn-sign-up"><span>S'enregistrer</span>
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
          <p id="sub-title">Des supers volontaires viennent rejoindre nos rangs <br> pour offrir des moments de lecture ignoubliable !</p>
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
        <p id="sub-title">Nos lecteurs partagent leur coups de coeurs</p>
        <ul>
          <li><a href="#">1<img src="./img/top-img-card.png" alt=""></a></li>
          <li><a href="#">2<img src="./img/top-img-card.png" alt=""></a></li>
          <li><a href="#">3<img src="./img/top-img-card.png" alt=""></a></li>
          <li><a href="#">4<img src="./img/top-img-card.png" alt=""></a></li>
        </ul>
        <a href="#" id="btn-show-heart">Voir tous les coups de coeur</a>
    </section>


    <!-- ---------- SECTION - SOON AVAILABLE ---------- -->


    <section id="section-soon-available" class="row-limit-size">


      <h3 id="h3-tag">Nos ouvrages</h3>
      <h2>Bientôt disponible</h2>
      <div id="container-cards">

        <!-- find last 6 books in our librarerie -->


        <?php
        require_once './connexion.php';


        $sql =
          "SELECT DISTINCT `title`,`pict`,`extract`, 
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


          <div class="card">
            <div class="top-item-card">
              <img src="./img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>">
            </div>
            <div class="bottom-item-card">
              <h4><?= implode(' ', explode(',', $card['genres'])) ?></h4>
              <h3><?= $card['title'] ?></h3>
              <p class="description-card"><?= $card['extract'] ?></p>
              <h5><?= str_replace(',', ', ', preg_replace('/,([^,]*)$/', ', $1', $card['authors'])) ?></h5>

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
          <div class="card-blog-top">
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
          <div class="card-blog-top">
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
          <div class="card-blog-top">
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
          <div class="card-blog-top">
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
          <div class="card-blog-top">
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
          <div class="card-blog-top">
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
      <h3>Toutes les choses que vous devez savoir sont ici.</h3>
      <div id="container-faq">
        <div class="item-faq">
          <p class="question">Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur ?</p>
          <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga non debitis quasi qui porro temporibus numquam ?</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Lorem ipsum dolor sit amet consectetur ?</p>
          <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga non debitis quasi qui porro temporibus numquam ?</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Lorem ipsum dolor sit amet consectetur Lorem, ipsum. ?</p>
          <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga non debitis quasi qui porro temporibus numquam ?</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Lorem ipsum dolor sit amet consectetur Lorem, ipsum dolor. ?</p>
          <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga non debitis quasi qui porro temporibus numquam ?</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Lorem ipsum dolor sit amet consectetur ?</p>
          <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga non debitis quasi qui porro temporibus numquam ?</p>
          <div class="toggle-symbol"></div>
        </div>
        <hr>
        <div class="item-faq">
          <p class="question">Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit, amet consectetur adipisicing elit. ?</p>
          <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga non qui porro temporibus numquam ?</p>
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
        <p>Et vous n'avez pas toruvé sur notre site ? Alors n'hésitez pas une seconde, contacter nos super administrateurs.</p>
        <a href="#">Nous contacter</a>
      </div>
    </section>


    <!-- ---------- SECTION - LOCATION ---------- -->


    <section id="section-location" class="row-limit-size">
      <h3>Où nous trouver ?</h3>
      <h2>Direction <span id="font-logo">Biblook</span> à Saint-Denis-les-Bourgs</h2>
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
          <li><span>Nos horraires</span></li>
          <li>Du lundi au vendredi 08:30-12:00</li>
          <li>Du lundi au vendredi 13:30-17:00</li>
          <li>Du samedi au dimanche fermé</li>
        </ul>
      </div>
    </section>
  </main>


  <!-- ---------- SECTION - FOOTER ---------- -->


  <footer id="footer">
    <div id="container-footer"></div>
  </footer>
  <script src="./main.js"></script>
</body>

</html>