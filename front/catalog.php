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
        <h1>"Saisie de la recherche"</h1>
        <div id="container-catalog">
            <div id="container-filter">
                <p id="filter-title">Filtres  </p>
                <hr>
                <div class="item-filter" id="item-filter-category">
                    <p>Categorie</p>
                    <ul>
                        <?php
                        $sql_genre =
                        "SELECT `title`,`pict`,`extract`, `genre`.`name`, COUNT(*) AS `nblivre`  
                        FROM `work`

                        INNER JOIN `work_genre`
                        ON `work`.`id_work` = `work_genre`.`work_id`

                        INNER JOIN `genre`
                        ON `work_genre`.`genre_id` =`genre`.`id_genre`

						GROUP BY `genre`.`name`
                        ORDER BY `genre`.`name` ASC;";
                        $req_genre = $db->query($sql_genre);
                        while($genre = $req_genre->fetch(PDO::FETCH_ASSOC)){

                        ?>
                        <li><a href="#"><?=$genre['name'] . ' '?>(<?=$genre['nblivre']?>)</a></li>
                        

                        <?php }?>
                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-avalaibility">
                    <p>Disponibilité</p>
                    <ul>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>

                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-opinion">
                    <p>Avis</p>
                    <ul>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-editor">
                    <p>Editeur</p>
                    <ul>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
                <hr>
                <div class="item-filter" id="item-filter-autor">
                    <p>Autheur</p>
                    <ul>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>
                        <li><a href="#">Lorem (22)</a></li>

                    </ul>
                    <div class="toggle-symbol"></div>
                </div>
            </div>
            <div id="container-cards">
                    <?php
                $sql_catalog = 
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

                    GROUP BY `id_work` ORDER BY `id_work` DESC";
                $req_catalog = $db->query($sql_catalog);
                while($card = $req_catalog->fetch(PDO::FETCH_ASSOC)){
                ?>



                <div class="card">
                    <div class="top-item-card">
                        <img src="../img/books/<?=$card['pict']?>" alt="<?=$card['title']?>>
                    </div>
                    <div class="bottom-item-card">
                        <h4><?=str_replace(',' , ', ',$card['genres'])?></h4>
                        <h3><?=$card['title']?></h3>
                        <p class="description-card"><?=$card['extract']?></p>
                        <h5><?=str_replace(',' , ', ' , $card['authors'])?></h5>
                    </div>
                </div>

                <?php }?>
                
            </div>
        </div>
    </section>
</main>
<script src="../main.js"></script>
</body>
<?php include_once '../front/footer-default.php'; ?>

</html>