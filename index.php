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
                <p>Des supers volontaires viennent rejoindre <br> nos rangs pour offrir des moments <br> de lecture ignoubliable !</p>
            </div>
            <div id="item-section-news-right">
                <div id="item-news-right-top">
                    <img src="./img/news-2.png" alt="">
                    <img src="./img/news-3.png" alt="">
                </div>
                <img src="./img/news-1.png" alt="">
            </div>
        </div>
    </section>


    <!-- ---------- SECTION - HEART ---------- -->


    <section id="section-heart" class="row-limit-size">
        <h2>Coups de coeur</h1>
            <p>Nos lecteurs partagent leur coups de coeurs</p>
            <ul>
                <li><a href="#"><img src="./img/fake-livre1.png" alt=""></a></li>
                <li><a href="#"><img src="./img/fake-livre2.png" alt=""></a></li>
                <li><a href="#"><img src="./img/fake-livre3.png" alt=""></a></li>
                <li><a href="#"><img src="./img/fake-livre4.png" alt=""></a></li>
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
        "SELECT `title`,`pict`,`extract`, `genre`.`name` FROM `work`
        INNER JOIN `work_genre` 
        ON `work`.`id_work` = `work_genre`.`work_id`
        INNER JOIN `genre`
        ON `work_genre`.`genre_id` =`genre`.`id_genre`
        GROUP BY `id_work` ORDER BY `id_work` DESC LIMIT 6";
        $req = $db->query($sql);
        while($card = $req->fetch(PDO::FETCH_ASSOC)){

        ?>



            <div class="card">
                <div class="top-item-card">
                    <img src="" alt="<?= $card['title']?>">
                </div>
                <div class="bottom-item-card">
                    <h4><?= $card['name'][1]?></h4>
                    <h3><?= $card['title']?></h3>
                        <p class="description-card"><?= $card['extract']?></p>
                        <h5>Auteur</h5>
                </div>
            </div> 
            <?php } ?>         
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