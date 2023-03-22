<?php include_once '../front/header-default.php';
include_once '../connexion.php';

?>
<main>
    <ul id="Breadcrumb" class="row-limit-size">
        <li><a href="../index.php">Accueil</a></li>
        <li>></li>
        <li><a href="#section-catalog">Catalogue</a></li>
    </ul>


    <section id="section-catalog" class="row-limit-size">
        <?php
        if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
            <h1 id="value-search">"<?= $_GET['search'] ?>"</h1>
        <?php } else { ?>

            <h1>"Catalog"</h1>

        <?php

        } ?>
        <div id="container-catalog">
            <div id="container-filter">
                <p id="filter-title">Filtres</p>
                <hr>
                <div class="item-filter" id="item-filter-category">
                    <p class="show-filter">Categories<span class="toggle-symbol">+</span></p>
                    <ul class="list-filter">
                        <?php
                        $sql_genre =
                            "SELECT `genre`.`id_genre`,`genre`.`name`, COUNT(*) AS `nblivre`  
                        FROM `work`

                        INNER JOIN `work_genre`
                        ON `work`.`id_work` = `work_genre`.`work_id`

                        INNER JOIN `genre`
                        ON `work_genre`.`genre_id` =`genre`.`id_genre`

						GROUP BY `genre`.`name`
                        ORDER BY `genre`.`name` ASC;";
                        $req_genre = $db->query($sql_genre);
                        while ($genre = $req_genre->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                            <li><a href="./catalog.php?id=<?= $genre['id_genre'] ?>"><?= $genre['name'] . ' ' ?>(<?= $genre['nblivre'] ?>)</a></li>


                        <?php } ?>
                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-opinion">
                    <p class="show-filter">Avis <span class="toggle-symbol">+</span></p>
                    <ul class="list-filter">
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-editor">
                    <p class="show-filter">Editeurs <span class="toggle-symbol">+</span></p>
                    <ul class="list-filter">
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-autor">
                    <p class="show-filter">Auteurs <span class="toggle-symbol">+</span></p>
                    <ul class="list-filter">


                        <?php
                        $sql_author =
                            "SELECT `author`.`id_author`, CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`) AS `authors`, 
                        COUNT(*) AS `nbpublications`  
                        FROM `work`

                        INNER JOIN `work_author`
                        ON `work`.`id_work` = `work_author`.`work_id`

                        LEFT JOIN `author`
                        ON `work_author`.`author_id` =`author`.`id_author`

						GROUP BY `authors`
                        ORDER BY `authors` ASC;";
                        $req_author = $db->query($sql_author);
                        while ($author = $req_author->fetch(PDO::FETCH_ASSOC)) {

                        ?>

                            <li><a href="#"><?= $author['authors'] . ' ' ?>(<?= $author['nbpublications'] ?>)</a></li>
                        <?php } ?>

                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
            </div>
            <div id="container-cards">
                <div class="container-sort">
                    <select name="sort" id="sort">
                        <option value="">Choisir un tri</option>
                        <option value="alphabetical">Alphabétique</option>
                        <option value="date">Date de parution</option>
                        <option value="Disponibility">Disponibilité</option>
                    </select>
                    <a href="#" id="help-choise">🔎 Me laisser guider </a>
                </div>
                <?php


                if (isset($_GET['search']) and !empty($_GET['search'])) {
                    $recheche = htmlspecialchars($_GET['search']);


                    $sql =
                        'SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, 
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
                    WHERE `title` LIKE "%' . $recheche . '%" OR  `author`.`lastname` LIKE "%' . $recheche . '%"  OR  `author`.`firstname` LIKE "%' . $recheche . '%" OR `genre`.`name` LIKE "%' . $recheche . '%"
                    GROUP BY `id_work` ORDER BY `id_work` DESC';
                    $req_catalog = $db->query($sql);
                    if ($req_catalog->rowCount() > 0) {
                        while ($card = $req_catalog->fetch(PDO::FETCH_ASSOC)) {
                ?>


                            <div class="card">
                                <div class="top-item-card">
                                    <img src="../img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>">
                                </div>
                                <div class="bottom-item-card">
                                    <h4><?= str_replace(',', ', ', $card['genres']) ?></h4>
                                    <h3 class="title-book-catalog"><?= $card['title'] ?></h3>
                                    <p class="description-card"><?= $card['extract'] ?></p>
                                    <h5><?= str_replace(',', ', ', $card['authors']) ?></h5>
                                    <a href="./book-detail.php?id=<?= $card['id_work'] ?>" class="link-page">En savoir plus 🡪</a>
                                </div>
                            </div>
                        <?php }
                    } else {

                        ?>
                        <p> Aucun livre trouvé</p>
                    <?php
                    }

                    ?>

                    <?php
                } else {
                    $sql =
                    'SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, 
                    GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
                    GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors`,
                    COUNT(`like`.`work_id`) AS like_count 
                    FROM `work`
                
                    INNER JOIN `work_genre` 
                    ON `work`.`id_work` = `work_genre`.`work_id`
                
                    INNER JOIN `genre`
                    ON `work_genre`.`genre_id` =`genre`.`id_genre`
                
                    INNER JOIN `work_author`
                    ON `work_author`.`work_id` = `work`.`id_work`
                
                    INNER JOIN `author`
                    ON `work_author`.`author_id` = `author`.`id_author`
                    
                    INNER JOIN `like`
                    ON `like`.`work_id` = `work`.`id_work`
                    
                    GROUP BY `id_work` ORDER BY like_count DESC';
                    $req_catalog = $db->query($sql);

                    while ($card = $req_catalog->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                        <div class="card">
                            <div class="top-item-card">
                                <img src="../img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>">
                            </div>
                            <div class="bottom-item-card">
                                <h4><?= str_replace(',', ', ', $card['genres']) ?></h4>
                                <h3 class="title-book-catalog"><?= $card['title'] ?></h3>
                                <p class="description-card"><?= $card['extract'] ?></p>
                                <h5><?= str_replace(',', ', ', $card['authors']) ?></h5>
                                <a href="./book-detail.php?id=<?= $card['id_work'] ?>" class="link-page">En savoir plus 🡪</a>
                                <form action="../admin/like-catalog.php?id=<?= $card['id_work'] ?>" method="POST">

                                    <?php
                                    $idUser = $_SESSION['id-user'];
                                    $idBook = $card['id_work'];


                                    if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
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
                <?php }
                } ?>

            </div>
        </div>
    </section>
</main>
<script src="../js/logout-all.js"></script>
<script src="../main.js"></script>
<button id="back-to-top" title="Retour en haut">
    <i class="fas fa-arrow-up"></i>
</button>
</body>
<?php include_once '../front/footer-default.php'; ?>

</html>