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

        // DISTINCT prevent duplication of results, GROUP_CONCAT gathers results on same line 
        //CONCAT(...,SPACE(1),...) gathers result of two colones in one and insert one space between 
        //theese results

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

            <!-- str_replace takes three arguments, first element to replace, 
            seconde element to insert, third target of function -->

            <h4><?= str_replace(',' , ', ',$card['genres']) ?></h4>
            <h3><?= $card['title'] ?></h3>
            <p class="description-card"><?= $card['extract'] ?></p>
            <h5><?= str_replace(',' , ', ',$card['authors']) ?></h5>

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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit.</p>
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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit.</p>
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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit.</p>
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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit.</p>
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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit.</p>
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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam molestias suscipit.</p>
          <a href="">Lire l'article ↗</a>
        </div>
      </div>
    </div>
  </section>
  <script src="./main.js"></script>
</body>

</html>