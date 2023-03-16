<?php
include_once '../connexion.php';
include_once '../admin/header-main.php';
?>

<!-- ---------- SECTION DASHBOARD - PAGE CRUD BOOK ---------- -->
<section id="dashboard-page-book-crud" class="row-limit-size-db">
    <div class="container-dashboard-base" id="container-dashboard-modified">
        <h1 class="h1-dashboard">Bienvenue ['prenom'] dans votre gestion des livres</h1>

        <h2 class="h2-dashboard">Vous pouvez ajouter, supprimer et modifier l'ensemble des livres de la bibliothèque</h2>

        <div class="container-crud-book-tabs">
            <div id="box-crud-book" class="box-dashboard">

                <div class="search-add-crud-book">
                    <h3 class="h3-dashboard">Les livres de la bibliothèque Biblook</h3>
                    <div class="search-crud-input">
                        <form action="" method="post">
                            <input type="text" id="input-seach-book" name="text">
                            <input type="submit" id="btn-search-book" name='rechercher' value="Rechercher"></input>
                            <button type="button" id="btn-all-detail">Vue détails</button>
                        </form>
                    </div>
                    <a href="./insert-book.php" type="button" id="btn-add-book">Ajouter un livre</a>
                </div>
                <div id="container-list-book-crud">
                    <ul class="list-book-crud">
                        <?php


                        if (isset($_POST['rechercher']) and !empty($_POST['rechercher'])) {
                            $recheche = $_POST['text'];

                            // Requête pour récupérer les stocks
                            $reqStock = ("SELECT `work_id`, `stock` FROM `copy`");
                            $resultStock = $db->query($reqStock);


                            while ($row = $resultStock->fetch(PDO::FETCH_ASSOC)) {
                                // Stockage du stock correspondant à chaque work_id
                                $stocks[$row['work_id']][] = $row['stock'];
                            }


                            $reqAskCrud = 'SELECT `id_work`,`title`,`pict`,`extract`,`category`.`category`, `copy`.`location`,
                            DATE_FORMAT(`published_at`, "%d/%m/%Y") AS `published`, `ISBN`,
                            GROUP_CONCAT(DISTINCT DATE_FORMAT(`editor`.`date`, "%d/%m/%Y" )ORDER BY `id_editor`) AS `edition_date`,
                            GROUP_CONCAT(DISTINCT `editor`.`editor_name` ORDER BY `id_editor`)  AS `editors`, 
                            GROUP_CONCAT(`copy`.`stock`) AS `stock`,
                            GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
                            GROUP_CONCAT( DISTINCT CONCAT (`author`.`lastname`, " " , `author`.`firstname`)) AS `author` 
                            
                            FROM `work` 
    
                            INNER JOIN `work_author` ON `work_author`.`work_id` = `work`.`id_work` 
                            
                            INNER JOIN `author` ON `work_author`.`author_id` = `author`.`id_author`

                            INNER JOIN `work_genre` 
                            ON `work`.`id_work` = `work_genre`.`work_id`

                            INNER JOIN `genre`
                            ON `work_genre`.`genre_id` =`genre`.`id_genre` 

                            INNER JOIN `work_category` 
                            ON `work`.`id_work` = `work_category`.`work_id`

                            INNER JOIN `category`
                            ON `work_category`.`category_id` =`category`.`id_category` 

                            INNER JOIN `copy` 
                            ON `work`.`id_work` = `copy`.`work_id`

                            INNER JOIN `editor`
                            ON `copy`.`editor_id` =`editor`.`id_editor` 
                            
                            WHERE `title` LIKE "%' . $recheche . '%" OR  `author`.`lastname` LIKE "%' . $recheche . '%"  OR  `author`.`firstname` LIKE "%' . $recheche . '%" OR `genre`.`name` LIKE "%' . $recheche . '%"
                            GROUP BY `id_work` ORDER BY `id_work` DESC';


                            $reqCrud = $db->query($reqAskCrud);


                            while ($crud = $reqCrud->fetch(PDO::FETCH_ASSOC)) {
                                $workId = $crud['id_work'];
                                $disponible = 'indisponible';


                                if (in_array(1, $stocks[$workId])) {
                                    $disponible = 'disponible';
                                }

                                $i = 0;
                                foreach ($stocks[$workId] as $value) {
                                    if ($value == 0)
                                        $i++;
                                }

                        ?>

                                <li class="item-book-crud">
                                    <ul class="detail-item-book-crud">
                                        <li class="item-pict-crud">
                                            <img src="../img/books/<?= $crud['pict'] ?>" alt="<?= $crud['title'] ?>" class="pict-book-crud" onclick="centrerImage(this)">
                                        </li>
                                        <li class="item-title-crud"> <?= $crud['title'] ?></li>
                                        <li class="item-author-crud"><?= str_replace(',', ', ', $crud['author']) ?></li>
                                        <li class="item-status-crud"><?= $crud['location'] ?></li>
                                        <li class="item-copy-crud"><?= $disponible ?></li>
                                        <li class="btn-option-crud" data-idWork="<?= $crud['id_work'] ?>" data-title="<?= $crud['title'] ?>" data-pict="<?= $crud['pict'] ?>">⚙️
                                        </li>
                                        <div class="container-complete-detail-info-book">
                                            <div class="container-flex-crud">
                                                <div class="item-complete-right">
                                                    <h3>Fiche technique</h3>
                                                    <ul class="all-info-book">
                                                        <li>Auteur <span class="bdd-var"><?= str_replace(',', ', ', $crud['author']) ?></span></li>
                                                        <li>Genre <span class="bdd-var">
                                                                <?= str_replace(',', ', ', $crud['genres']) ?> </span></li>
                                                        <li>Catégorie <span class="bdd-var"><?= $crud['category'] ?>
                                                            </span></li>
                                                        <li>Date de publication <span class="bdd-var"><?= $crud['published'] ?></span></li>
                                                        <li> Nom de l'éditeur<span class="bdd-var"><?= str_replace(',', ', ', $crud['editors']) ?>
                                                            </span></li>
                                                        <li>Date de l'édition<span class="bdd-var"><?= str_replace(',', ', ', $crud['edition_date']) ?></span></li>
                                                        <li>Nombre d'exemplaires<span class="bdd-var"><?= count($stocks[$workId]) ?></span></li>
                                                        <li>Nombre d'exemplaires empruntés<span class="bdd-var"><?= $i ?></span></li>
                                                        <li>ISBN<span class="bdd-var"><?= $crud['ISBN'] ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="item-complete-left">
                                                    <h3>Extrait du livre</h3>
                                                    <p class="extract-work"><?= $crud['extract'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="container-box-option-crud">
                                    </ul>

                                </li>
                            <?php
                            }
                        } else {

                            // Requête pour récupérer les stocks
                            $reqStock = ("SELECT `work_id`, `stock` FROM `copy`");
                            $resultStock = $db->query($reqStock);


                            while ($row = $resultStock->fetch(PDO::FETCH_ASSOC)) {
                                // Stockage du stock correspondant à chaque work_id
                                $stocks[$row['work_id']][] = $row['stock'];
                            }


                            $reqAskCrud = 'SELECT `id_work`,`title`,`pict`,`extract`,`category`.`category`, `copy`.`location`,
                            DATE_FORMAT(`published_at`, "%d/%m/%Y") AS `published`, `ISBN`,
                            GROUP_CONCAT(DISTINCT DATE_FORMAT(`editor`.`date`, "%d/%m/%Y" )ORDER BY `id_editor`) AS `edition_date`,
                            GROUP_CONCAT(DISTINCT `editor`.`editor_name` ORDER BY `id_editor`)  AS `editors`, 
                            GROUP_CONCAT(`copy`.`stock`) AS `stock`,
                            GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
                            GROUP_CONCAT( DISTINCT CONCAT (`author`.`lastname`, " " , `author`.`firstname`)) AS `author` 
                            
                            FROM `work` 
                            
                            INNER JOIN `work_author` ON `work_author`.`work_id` = `work`.`id_work` 
                            
                            INNER JOIN `author` ON `work_author`.`author_id` = `author`.`id_author`

                            INNER JOIN `work_genre` 
                            ON `work`.`id_work` = `work_genre`.`work_id`

                            INNER JOIN `genre`
                            ON `work_genre`.`genre_id` =`genre`.`id_genre` 

                            INNER JOIN `work_category` 
                            ON `work`.`id_work` = `work_category`.`work_id`

                            INNER JOIN `category`
                            ON `work_category`.`category_id` =`category`.`id_category` 

                            INNER JOIN `copy` 
                            ON `work`.`id_work` = `copy`.`work_id`

                            INNER JOIN `editor`
                            ON `copy`.`editor_id` =`editor`.`id_editor` 
                            
                            GROUP BY `id_work` ORDER BY `id_work` DESC';

                            $reqCrud = $db->query($reqAskCrud);

                            while ($crud = $reqCrud->fetch(PDO::FETCH_ASSOC)) {
                                $workId = $crud['id_work'];
                                $disponible = 'indisponible';


                                if (in_array(1, $stocks[$workId])) {
                                    $disponible = 'disponible';
                                }

                                $i = 0;
                                foreach ($stocks[$workId] as $value) {
                                    if ($value == 0)
                                        $i++;
                                }

                            ?>

                                <li class="item-book-crud">
                                    <ul class="detail-item-book-crud">
                                        <li class="item-pict-crud">
                                            <img src="../img/books/<?= $crud['pict'] ?>" alt="<?= $crud['title'] ?>" class="pict-book-crud" onclick="centrerImage(this)">
                                        </li>
                                        <li class="item-title-crud"> <?= $crud['title'] ?></li>
                                        <li class="item-author-crud"><?= str_replace(',', ', ', $crud['author']) ?></li>
                                        <li class="item-status-crud"><?= $crud['location'] ?></li>
                                        <li class="item-copy-crud"><?= $disponible ?></li>
                                        <li class="btn-option-crud" data-idWork="<?= $crud['id_work'] ?>" data-title="<?= $crud['title'] ?>" data-pict="<?= $crud['pict'] ?>">⚙️
                                        </li>
                                        <div class="container-complete-detail-info-book">
                                            <div class="container-flex-crud">
                                                <div class="item-complete-right">
                                                    <h3>Fiche technique</h3>
                                                    <ul class="all-info-book">
                                                        <li>Auteur <span class="bdd-var"><?= str_replace(',', ', ', $crud['author']) ?></span></li>
                                                        <li>Genre <span class="bdd-var">
                                                                <?= str_replace(',', ', ', $crud['genres']) ?> </span></li>
                                                        <li>Catégorie <span class="bdd-var"><?= $crud['category'] ?>
                                                            </span></li>
                                                        <li>Date de publication <span class="bdd-var"><?= $crud['published'] ?></span></li>
                                                        <li> Nom de l'éditeur<span class="bdd-var"><?= str_replace(',', ', ', $crud['editors']) ?>
                                                            </span></li>
                                                        <li>Date de l'édition<span class="bdd-var"><?= str_replace(',', ', ', $crud['edition_date']) ?></span></li>
                                                        <li>Nombre d'exemplaires<span class="bdd-var"><?= count($stocks[$workId]) ?></span></li>
                                                        <li>Nombre d'exemplaires empruntés<span class="bdd-var"><?= $i ?></span></li>
                                                        <li>ISBN<span class="bdd-var"><?= $crud['ISBN'] ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="item-complete-left">
                                                    <h3>Extrait du livre</h3>
                                                    <p class="extract-work"><?= $crud['extract'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="container-box-option-crud">
                                    </ul>

                                </li>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['success'])) : ?>
        <div id="confirmed-delete">
            <p class="info-succes-notif"><strong> <?= $_SESSION["success"] ?> </strong></p>
            <p class="info-msg-bdd-delete">Les données que vous avez supprimé ont bien été retiré </p>
        </div>
        <?php unset($_SESSION["success"]); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <div id="confirmed-error">
            <p <strong class="info-succes-notif"><?= $_SESSION["error"] ?></strong></p>
            <p class="info-msg-bdd-delete">Les données que vous tentez de supprimé n'ont <br> pas été retiré</p>
        </div>
        <?php unset($_SESSION["error"]); ?>
    <?php endif; ?>

</section>

</main>
<script src="../js/main-admin.js"></script>
</body>

</html>