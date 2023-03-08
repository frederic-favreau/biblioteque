<?php include_once '../front/header-default.php';

include_once '../connexion.php';
$id = $_GET['id'];
$req_book = $db->prepare("SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, `published_at`, `ISBN`,
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

WHERE `id_work` = :id");
$req_book->bindParam('id', $id, PDO::PARAM_INT);
$req_book->execute();
while($book = $req_book->fetch(PDO::FETCH_ASSOC)){

?>

<main>
    <ul id="Breadcrumb" class="row-limit-size">
        <li><a href="../index.php">Accueil</a></li>
        <li>></li>
        <li><a href="./catalog.php#section-catalog">Catalogue</a></li>
        <li>></li>
        <li><a href="#"><?=$book['title']?></a></li>
    </ul>


    <section id="section-detail-book" class="row-limit-size">
        <div id="container-detail-book">
            <div class="item-detail-book-left">
                <div class="book-new">['new']</div>
                <h1 class="title-work"><?=$book['title']?></h1>
                <p class="author"><?=$book['authors']?></p>
                <figure><img src="../img/books/<?=$book['pict']?>" alt="<?=$book['title']?>"></figure>
                <h2>Extrait du livre</h2>
                <p class="extract-work"><?=$book['extract']?></p>
                <h3>Fiche technique</h3>
                <ul class="all-info-book">
                    <li>Auteur <span class="bdd-var"><?=$book['authors']?></span></li>
                    <li>Genre <span class="bdd-var"><?=$book['genres']?></span></li>
                    <li>Catégorie <span class="bdd-var">['category']</span></li>
                    <li>Date de publication <span class="bdd-var"><?=$book['published_at']?></span></li>
                    
                    <li> Nom de l'éditeur<span class="bdd-var">['editor name']</span></li>
                    <li>Date de l'édition<span class="bdd-var">['editor date']</span></li>
                    <li>ISBN<span class="bdd-var"><?=$book['ISBN']?></span></li>
                </ul>
            </div>
            <div id="item-detail-book-right">
                <h4 class="title-work-description"><?=$book['title']?></h4>
                <ul class="info-work-description">
                    <li>Auteur <span><?=$book['authors']?></span></li>
                    <li>Genre <span><?=$book['genres']?></span></li>
                    <li>Date de publication <span><?=$book['published_at']?></span></li>
                </ul>
                <hr>
                <ul class="list-info-revervation">
                    <li>['Livre disponible en bibliothèque']</li>
                    <li>A retirer à Biblook sous 3 heures</li>
                </ul>
                <a href="#" id="btn-reservation">Réserver ce livre</a>
                <hr>
                <ul class="list-advantage">
                    <li>Réservez en ligne & retirer sous 3h</li>
                    <li>Demande gratuite de nouveau livre</li>
                    <li>Redonnez votre livre sous 30 jours</li>
                </ul>
            </div>
        </div>

        </div>
    </section>
    <hr>
    <section id="section-recommandation" class="row-limit-size">
        <h3 class="standard-title-section">Biblook vous recommande</h3>
        <div id="container-cards">
            <div class="card">
                <div class="top-item-card">
                    <img src="../img/books/ça.jpg" alt="['title']">
                </div>
                <div class="bottom-item-card">
                    <h4>['genres']</h4>
                    <h3>['title']</h3>
                    <p class="description-card">['extract']</p>
                    <h5>['authors']</h5>
                    <a href="../front/book-detail.php" class="link-page">En savoir plus ...</a>
                </div>
            </div>
            <div class="card">
                <div class="top-item-card">
                    <img src="../img/books/ça.jpg" alt="['title']">
                </div>
                <div class="bottom-item-card">
                    <h4>['genres']</h4>
                    <h3>['title']</h3>
                    <p class="description-card">['extract']</p>
                    <h5>['authors']</h5>
                    <a href="../front/book-detail.php" class="link-page">En savoir plus ...</a>
                </div>
            </div>
            <div class="card">
                <div class="top-item-card">
                    <img src="../img/books/ça.jpg" alt="['title']">
                </div>
                <div class="bottom-item-card">
                    <h4>['genres']</h4>
                    <h3>['title']</h3>
                    <p class="description-card">['extract']</p>
                    <h5>['authors']</h5>
                    <a href="../front/book-detail.php" class="link-page">En savoir plus ...</a>
                </div>
            </div>
            <div class="card">
                <div class="top-item-card">
                    <img src="../img/books/ça.jpg" alt="['title']">
                </div>
                <div class="bottom-item-card">
                    <h4>['genres']</h4>
                    <h3>['title']</h3>
                    <p class="description-card">['extract']</p>
                    <h5>['authors']</h5>
                    <a href="../front/book-detail.php" class="link-page">En savoir plus ...</a>
                </div>
            </div>
            <div class="card">
                <div class="top-item-card">
                    <img src="../img/books/ça.jpg" alt="['title']">
                </div>
                <div class="bottom-item-card">
                    <h4>['genres']</h4>
                    <h3>['title']</h3>
                    <p class="description-card">['extract']</p>
                    <h5>['authors']</h5>
                    <a href="../front/book-detail.php" class="link-page">En savoir plus ...</a>
                </div>
            </div>
            <div class="card">
                <div class="top-item-card">
                    <img src="../img/books/ça.jpg" alt="['title']">
                </div>
                <div class="bottom-item-card">
                    <h4>['genres']</h4>
                    <h3>['title']</h3>
                    <p class="description-card">['extract']</p>
                    <h5>['authors']</h5>
                    <a href="../front/book-detail.php" class="link-page">En savoir plus ...</a>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="section-tag-recommandation" class="row-limit-size">
        <h3 class="standard-title-section">Découvrez aussi</h3>
        <div id="container-tags">
            <div id="tag-a" class="tag-reco">#les cheveaux</div>
            <div id="tag-b" class="tag-reco">#La bière</div>
            <div id="tag-c" class="tag-reco">#Devenir dev</div>
            <div id="tag-d" class="tag-reco">#MotoGP2023</div>
        </div>
    </section>

</main>
<script src="../main.js"></script>
</body>
<?php include_once '../front/footer-default.php';
}; ?>

</html>