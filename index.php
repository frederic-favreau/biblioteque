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
        <nav id="main-nav-bar" class="row-limit-size">
            <div id="container-group-logo">
                <img src="./img/logo-seul-biblook-noir.svg" alt="Biblook">
                <span id="nav-logo-text">Biblook</span>
            </div>
            <div id="container-group-search-nav-top">
                <input type="text" id="input-search-nav-top" placeholder="Taper votre recherche">
                <a href="#" id="btn-search-nav-top">Rechercher</a>
            </div>
            <div id="container-group-btn-connexion">
                <a href="./front/connect.php" id="btn-log-in">Log in</a>
                <a href="./front/connect.php" id="btn-sign-up"><span>Sign up</span>
                    <div id="menu-burger">
                        <div class="menu-burger-pipe" id="menu-burger-pipe-top"></div>
                        <div class="menu-burger-pipe" id="menu-burger-pipe-middle"></div>
                        <div class="menu-burger-pipe" id="menu-burger-pipe-bottom"></div>
                    </div>
                </a>
            </div>
        </nav>
    </header>


    <!-- ---------- SECTION - NEWS ---------- -->


    <section id="section-news" class="row-limit-size">
        <div id="container-section-news">
            <div id="item-section-news-left">
                <h1>Les nouveautés chez <br> Biblook</h1>
                <p>Des supers volontaires viennent rejoindre nos rangs <br> pour offrir des moments de lecture ignoubliable !</p>
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
            <p>Nos lecteurs partagent leur coups de coeurs</p>
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
            <div class="card">
                <div class="top-item-card">
                    <img src="./img/top-img-card.png" alt="titre du livre">
                </div>
                <div class="bottom-item-card">
                    <h4>Categorie</h4>
                    <h3>Titre du livre</h4>
                        <p class="description-card">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, atque. Tempora id molestiae nesciunt quos iusto reprehenderit itaque, sit quisquam? Sapiente consectetur sint ab neque maxime nihil unde rerum aliquid itaque voluptatem, repellat ratione maiores provident vitae fugiat aspernatur ex nobis sunt quae esse? Cumque tenetur error nobis quidem ab!</p>
                        <h5>Auteur</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- ---------- SECTION - CTA AVAILABLE ---------- -->


    <section id="section-cta-available">
        <h2>Vous recherchez un livre en particulier ?</h2>
        <p>Faites votre demande dès maintenant auprès de Biblioo</p>
        <a href="#">Demander un livre</a>
    </section>


    <!-- ---------- SECTION - TOP COMMENTS---------- -->


    <section id="section-top-comments" class="row-limit-size">

    </section>

</body>

</html>