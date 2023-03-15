<?php include_once '../front/header-default.php';

include_once '../connexion.php';
$id = $_GET['id'];

// Requête pour récupérer les stocks
$reqStock = ("SELECT `work_id`, `stock` FROM `copy`");
$resultStock = $db->query($reqStock);


while ($row = $resultStock->fetch(PDO::FETCH_ASSOC)) {
    // Stockage du stock correspondant à chaque work_id
    $stocks[$row['work_id']][] = $row['stock'];
}




$req_book = $db->prepare("SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, `ISBN`, `copy`.`location`, `category`.`category`,`published_at`,
DATE_FORMAT(`published_at`, '%d/%m/%Y') AS `published`,
GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors`,
GROUP_CONCAT(DISTINCT `editor`.`editor_name` ORDER BY `id_editor`)  AS `editors`,
GROUP_CONCAT(DISTINCT DATE_FORMAT(`editor`.`date`, '%d/%m/%Y' )ORDER BY `id_editor`) AS `edition_date`
FROM `work`

INNER JOIN `work_genre` 
ON `work`.`id_work` = `work_genre`.`work_id`

INNER JOIN `genre`
ON `work_genre`.`genre_id` =`genre`.`id_genre`

INNER JOIN `work_author`
ON `work_author`.`work_id` = `work`.`id_work`

INNER JOIN `author`
ON `work_author`.`author_id` = `author`.`id_author`

INNER JOIN `copy` 
ON `work`.`id_work` = `copy`.`work_id`

INNER JOIN `work_category` 
ON `work`.`id_work` = `work_category`.`work_id`

INNER JOIN `category`
ON `work_category`.`category_id` =`category`.`id_category` 

INNER JOIN `editor`
ON `copy`.`editor_id` =`editor`.`id_editor` 

WHERE `id_work` = :id");
$req_book->bindParam('id', $id, PDO::PARAM_INT);
$req_book->execute();

while ($book = $req_book->fetch(PDO::FETCH_ASSOC)) {
    $genre = str_replace(",", "', '", $book['genres']);
    $title = str_replace("'", "\'", $book['title']);
    $workId = $book['id_work'];
    $disponible = 'indisponible';


    if (in_array(1, $stocks[$workId])) {
        $disponible = 'disponible';
    }

    $i = 0;
    foreach ($stocks[$workId] as $value) {
        if ($value == 0)
            $i++;
    }
    $now = date('Y-m-d',  strtotime('-2 month') );
    $date = $book['published_at'];
    

?>


    <main>
        <ul id="Breadcrumb" class="row-limit-size">
            <li><a href="../index.php">Accueil</a></li>
            <li>></li>
            <li><a href="./catalog.php#section-catalog">Catalogue</a></li>
            <li>></li>
            <li><a href="#"><?= $title?></a></li>
        </ul>



        <!-- ---------- SECTION DETAIL BOOK ---------- -->


        <section id="section-detail-book" class="row-limit-size">
            <div id="container-detail-book">
                <div class="item-detail-book-left">
                    
                        <?php
                        
                        if($date > $now){
                            ?>
                            <div class="book-new">New</div>
                        <?php
                        }

                        ?>
                    
                
                
                
                
                
                    <h1 class="title-work"><?= $book['title'] ?></h1>
                    <p class="author"><?= str_replace(',', ', ', $book['authors']) ?></p>
                    <figure><img src="../img/books/<?= $book['pict'] ?>" alt="<?= $book['title'] ?>"></figure>
                    <h2 id="title-extract">Extrait du livre</h2>
                    <p class="extract-work"><?= $book['extract'] ?></p>
                    <h3 id="info-technical">Fiche technique</h3>
                    <ul class="all-info-book">
                        <li>Auteur <span class="bdd-var"><?= str_replace(',', ', ', $book['authors']) ?></span></li>
                        <li>Genre <span class="bdd-var"><?= str_replace(',', ', ', $book['genres']) ?></span></li>
                        <li>Catégorie <span class="bdd-var"></span><?= $book['category'] ?></li>
                        <li>Date de publication <span class="bdd-var"><?= $book['published'] ?></span></li>

                        <li> Nom de l'éditeur<span class="bdd-var"><?= str_replace(',', ', ', $book['editors']) ?></span></li>
                        <li>Date de l'édition<span class="bdd-var"><?= str_replace(',', ', ', $book['edition_date']) ?></span></li>
                        <li>ISBN<span class="bdd-var"><?= $book['ISBN'] ?></span></li>
                    </ul>
                </div>
                <div id="item-detail-book-right">
                    <h4 class="title-work-description"><?= $book['title'] ?></h4>
                    <ul class="info-work-description">
                        <li>Auteur <span><?= str_replace(',', ', ', $book['authors']) ?></span></li>
                        <li>Genre <span><?= str_replace(',', ', ', $book['genres']) ?></span></li>
                        <li>Date de publication <span><?= $book['published'] ?></span></li>
                    </ul>
                    <hr>
                    <ul class="list-info-revervation">
                        <li>Localisation: <?= $book['location'] ?></li>
                        <li>Livre <?=$disponible?> en bibliothèque</li>
                        <li>A retirer à Biblook sous 3 heures</li>
                    </ul>

                    <?php
                    $req_loan = $db->prepare(
                        "SELECT `id_work`, `title`, `pict`, `copy`.`location`
                        FROM `work` 
                        INNER JOIN `copy` 
                        ON `work`.`id_work` = `copy`.`work_id`                     
                        WHERE `id_work` = :id");
                    $req_loan->bindParam('id', $id, PDO::PARAM_INT);
                    $req_loan->execute();
                    $req_book_loan = $req_loan->fetch(PDO::FETCH_ASSOC);

                    ?>
                    <a href="#" id="btn-loan" data-idWork="<?= $req_book_loan['id_work'] ?>" data-title="<?= $req_book_loan['title'] ?>" data-pict="<?= $req_book_loan['pict'] ?>"data-location="<?= $req_book_loan['location'] ?>">Emprunter ce livre</a>

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



        <!-- ---------- SECTION RECOMMANDATION ---------- -->


        <section id="section-recommandation" class="row-limit-size">
            <h3 class="standard-title-section">Biblook vous recommande</h3>
            <div id="container-cards">


                <?php
                $sql =
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
                    WHERE `genre`.`name` IN ('$genre') 
                    AND `title` <> ('$title')

                    GROUP BY `id_work` ORDER BY `id_work` DESC";
                $req_catalog = $db->query($sql);
                while ($card = $req_catalog->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <div class="card">
                        <div class="top-item-card">
                            <img src="../img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>">
                        </div>
                        <div class="bottom-item-card">
                            <h4><?= $card['genres'] ?></h4>
                            <h3 id="title-book-card"><?= $card['title'] ?></h3>
                            <p class="description-card"><?= $card['extract'] ?></p>
                            <h5><?= $card['authors'] ?></h5>
                            <a href="../front/book-detail.php?id=<?= $card['id_work'] ?>" class="link-page">En savoir plus 🡪</a>
                        </div>
                    </div>

                <?php } ?>


            </div>
        </section>
        <hr>



        <!-- ---------- SECTION TAG RECOMMANDATION ---------- -->


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
    <script src="../js/main-front.js"></script>
    <script src="../main.js"></script>
    </body>
<?php include_once '../front/footer-default.php';
}; ?>

</html>