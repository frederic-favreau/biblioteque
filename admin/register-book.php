<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>



<!-- ---------- SECTION lOAN BOOK REGISTER ---------- -->

<section id="loan-register" class="row-limit-size-db">

    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace de registre d'emprunts</h1>
        <h2 class="h2-dashboard">Vous pouvez gérer les emprunts des lecteurs de la bibliothèque dans cet espace</h2>
        <div class="container-crud-book-tabs">
            <div id="box-crud-book" class="box-dashboard">
                <div class="search-add-crud-book">
                    <div class="search-crud-input">
                        <form action="" method="post">
                            <p class="title-sticky-crud">Registres des emprunts des livres</p>
                            <div class="group-search-standard">
                                <input type="text" id="input-seach-loan" class="input-search" name="text">
                                <input type="submit" id="btn-search-loan" class="btn-search" name='rechercher' value=" "></input>
                            </div>
                            <div class="group-tool-standard">
                                <button type="button" id="btn-all-detail">Vue détails</button>
                                <a href="#box-loan-register" type="button" id="btn-add-book" class="btn-add">+ Nouvel emprunt</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="container-list-book-crud">
                    <ul class="list-book-crud">

                        <?php

                        if (isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
                            $recheche = $_POST['text'];

                            $reqStock = ("SELECT `work_id`, `stock` FROM `copy`");
                            $resultStock = $db->query($reqStock);


                            while ($row = $resultStock->fetch(PDO::FETCH_ASSOC)) {
                                // Stockage du stock correspondant à chaque work_id
                                $stocks[$row['work_id']][] = $row['stock'];
                            }

                            $date = date('Y-m-d');

                            $registreSql = $db->prepare(
                                'SELECT  `title`,`pict`, `copy`.`id_copy`, `category`.`category`, `editor`.`editor_name`, `id_work`,`LCCN`, `user`.`firstname`,`user`.`lastname`,`user`.`mail`,`user`.`adress`,`user`.`id_user`,
                        DATE_FORMAT(`editor`.`date`,"%d/%m/%Y") AS `editdate`,
                        DATE_FORMAT(`published_at`, "%d/%m/%Y") AS `published`,
                        GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genes`,
                        GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `auhors`,
                        DATEDIFF( `loan`.`theoretical_date`, :date) AS `nbJours`
                        FROM `work`
                        
                        INNER JOIN `work_author`
                        ON `work_author`.`work_id` = `work`.`id_work`
                        
                        INNER JOIN `author`
                        ON `work_author`.`author_id` = `author`.`id_author`
                        
                        INNER JOIN `copy`
                        ON `copy`.`work_id`=`work`.`id_work`
                        
                        INNER JOIN `work_genre`
                        ON `work_genre`.`work_id` = `work`.`id_work`
                        
                        INNER JOIN `genre`
                        ON `genre`.`id_genre` = `work_genre`.`genre_id`
                        
                        INNER JOIN `work_category`
                        ON `work_category`.`work_id` = `work`.`id_work`
                        
                        INNER JOIN `category`
                        ON `category`.`id_category` = `work_category`.`category_id`
                        
                        INNER JOIN `editor`
                        ON `editor`.`id_editor` = `copy`.`editor_id`
                        
                        INNER JOIN `loan`
                        ON `loan`.`copy_id` = `copy`.`id_copy`
                        
                        INNER JOIN `user`
                        ON `user`.`id_user` = `loan`.`user_id`
                        
                        WHERE `loan`.`status` = 1 AND (`title` LIKE "%' . $recheche . '%" OR  `author`.`lastname` LIKE "%' . $recheche . '%"  OR  `author`.`firstname` LIKE "%' . $recheche . '%" OR `genre`.`name` LIKE "%' . $recheche . '%" OR `copy`.`id_copy` LIKE "%' . $recheche . '%")
                    
                        
                        GROUP BY `copy`.`id_copy`
                        ORDER BY `nbJours`'
                            );
                            $registreSql->bindParam('date', $date, PDO::PARAM_STR);
                            $registreSql->execute();
                            while ($registre = $registreSql->fetch(PDO::FETCH_ASSOC)) {
                                $workId = $registre['id_work'];
                        ?>

                                <li class="item-book-crud">
                                    <ul class="detail-item-book-crud">
                                        <li class="item-pict-crud">
                                            <img src="../img/books/<?= $registre['pict'] ?>" alt="<?= $registre['title'] ?>" class="pict-book-crud">
                                        </li>
                                        <li class="id-copy-loan">ID Exemplaire: <?= $registre['id_copy'] ?></li>
                                        <li class="id-user-loan">ID Client: <?= $registre['id_user'] ?></li>
                                        <li class="nb-days-loan">
                                            <?php
                                            if ($registre['nbJours'] > 0) {
                                            ?>
                                                Il reste <?= $registre['nbJours'] ?> jours</p>
                                            <?php
                                            } elseif ($registre['nbJours'] < 0) {
                                            ?>
                                                Retard de <?= $retard = str_replace('-', '', $registre['nbJours']) ?> jours</p>
                                            <?php

                                            } else {
                                            ?>
                                                Emprunt se termine aujourd'hui</p>
                                            <?php
                                            }
                                            ?>



                                        </li>
                                        <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon"></li>
                                        <div class="container-complete-detail-info-book">
                                            <div class="container-flex-crud">
                                                <div class="item-complete-right">
                                                    <h3>Fiche technique du livre</h3>
                                                    <ul class="all-info-book">
                                                        <li>Titre <span class="bdd-var"><?= $registre['title'] ?></span></li>
                                                        <li>Auteur <span class="bdd-var"><?= $registre['auhors'] ?></span></li>
                                                        <li>Genre <span class="bdd-var"><?= $registre['genes'] ?></span></li>
                                                        <li>Catégorie <span class="bdd-var"><?= $registre['category'] ?></span></li>
                                                        <li>Date de publication <span class="bdd-var"><?= $registre['published'] ?></span></li>
                                                        <li>Nom de l'éditeur<span class="bdd-var"><?= $registre['editor_name'] ?></span></li>
                                                        <li>Date de l'édition<span class="bdd-var"><?= $registre['editdate'] ?></span></li>
                                                        <li>Nombre d'exemplaires<span class="bdd-var"><?= count($stocks[$workId]) ?></span></li>
                                                        <li>LCCN<span class="bdd-var"><?= $registre['LCCN'] ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="item-complete-left">
                                                    <h3>Détail du lecteur</h3>
                                                    <ul class="all-info-user">
                                                        <li>Prénom <span class="bdd-var"><?= $registre['firstname'] ?></span></li>
                                                        <li>Nom <span class="bdd-var"><?= $registre['lastname'] ?></span></li>
                                                        <li>Email<span class="bdd-var"><?= $registre['mail'] ?></span></li>
                                                        <li>Adresse <span class="bdd-var"><?= $registre['adress'] ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="container-box-option-crud">
                                    </ul>
                                </li>
                            <?php }
                        } else {

                            $reqStock = ("SELECT `work_id`, `stock` FROM `copy`");
                            $resultStock = $db->query($reqStock);


                            while ($row = $resultStock->fetch(PDO::FETCH_ASSOC)) {
                                // Stockage du stock correspondant à chaque work_id
                                $stocks[$row['work_id']][] = $row['stock'];
                            }

                            $date = date('Y-m-d');

                            $registreSql = $db->prepare(
                                'SELECT  `title`,`pict`, `copy`.`id_copy`, `category`.`category`, `editor`.`editor_name`, `id_work`, `LCCN`, `user`.`firstname`,`user`.`lastname`,`user`.`mail`,`user`.`adress`,`user`.`id_user`,
                                DATE_FORMAT(`editor`.`date`,"%d/%m/%Y") AS `editdate`,
                                DATE_FORMAT(`published_at`, "%d/%m/%Y") AS `published`,
                                GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genes`,
                                GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `auhors`,
                                DATEDIFF( `loan`.`theoretical_date`, :date) AS `nbJours`
                                FROM `work`

                                INNER JOIN `work_author`
                                ON `work_author`.`work_id` = `work`.`id_work`

                                INNER JOIN `author`
                                ON `work_author`.`author_id` = `author`.`id_author`

                                INNER JOIN `copy`
                                ON `copy`.`work_id`=`work`.`id_work`

                                INNER JOIN `work_genre`
                                ON `work_genre`.`work_id` = `work`.`id_work`

                                INNER JOIN `genre`
                                ON `genre`.`id_genre` = `work_genre`.`genre_id`

                                INNER JOIN `work_category`  
                                ON `work_category`.`work_id` = `work`.`id_work`

                                INNER JOIN `category`
                                ON `category`.`id_category` = `work_category`.`category_id`

                                INNER JOIN `editor`
                                ON `editor`.`id_editor` = `copy`.`editor_id`

                                INNER JOIN `loan`
                                ON `loan`.`copy_id` = `copy`.`id_copy`

                                INNER JOIN `user`
                                ON `user`.`id_user` = `loan`.`user_id`

                                WHERE `loan`.`status` = 1 

                                GROUP BY `copy`.`id_copy`
                                ORDER BY `nbJours`'
                            );
                            $registreSql->bindParam('date', $date, PDO::PARAM_STR);
                            $registreSql->execute();
                            while ($registre = $registreSql->fetch(PDO::FETCH_ASSOC)) {
                                $workId = $registre['id_work'];
                            ?>

                                <li class="item-book-crud">
                                    <ul class="detail-item-book-crud">
                                        <li class="item-pict-crud">
                                            <img src="../img/books/<?= $registre['pict'] ?>" alt="<?= $registre['title'] ?>" class="pict-book-crud">
                                        </li>
                                        <li class="id-copy-loan">ID Exemplaire: <?= $registre['id_copy'] ?></li>
                                        <li class="id-user-loan">ID Client: <?= $registre['id_user'] ?></li>
                                        <li class="nb-days-loan">
                                            <?php
                                            if ($registre['nbJours'] > 0) {
                                            ?>
                                                Il reste <?= $registre['nbJours'] ?> jours</p>
                                            <?php
                                            } elseif ($registre['nbJours'] < 0) {
                                            ?>
                                                Retard de <?= $retard = str_replace('-', '', $registre['nbJours']) ?> jours</p>
                                            <?php

                                            } else {
                                            ?>
                                                Emprunt se termine aujourd'hui</p>
                                            <?php
                                            }
                                            ?>

                                        </li>
                                        <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon"></li>
                                        <div class="container-complete-detail-info-book">
                                            <div class="container-flex-crud">
                                                <div class="item-complete-right">
                                                    <h3>Fiche technique du livre</h3>
                                                    <ul class="all-info-book">
                                                        <li>Titre <span class="bdd-var"><?= $registre['title'] ?></span></li>
                                                        <li>Auteur <span class="bdd-var"><?= $registre['auhors'] ?></span></li>
                                                        <li>Genre <span class="bdd-var"><?= $registre['genes'] ?></span></li>
                                                        <li>Catégorie <span class="bdd-var"><?= $registre['category'] ?></span></li>
                                                        <li>Date de publication <span class="bdd-var"><?= $registre['published'] ?></span></li>
                                                        <li>Nom de l'éditeur<span class="bdd-var"><?= $registre['editor_name'] ?></span></li>
                                                        <li>Date de l'édition<span class="bdd-var"><?= $registre['editdate'] ?></span></li>
                                                        <li>Nombre d'exemplaires<span class="bdd-var"><?= count($stocks[$workId]) ?></span></li>
                                                        <li>LCCN<span class="bdd-var"><?= $registre['LCCN'] ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="item-complete-left">
                                                    <h3>Détail du lecteur</h3>
                                                    <ul class="all-info-user">
                                                        <li>Prénom <span class="bdd-var"><?= $registre['firstname'] ?></span></li>
                                                        <li>Nom <span class="bdd-var"><?= $registre['lastname'] ?></span></li>
                                                        <li>Email<span class="bdd-var"><?= $registre['mail'] ?></span></li>
                                                        <li>Adresse <span class="bdd-var"><?= $registre['adress'] ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="container-box-option-crud">
                                    </ul>
                                </li>
                        <?php }
                        } ?>

                    </ul>
                </div>
            </div>
        </div>



        <!-- ----- LOAN BOX OUTBOOK ----- -->
        <div id="box-loan-register" class="box-dashboard">
            <h3 class="h3-dashboard">Nouvel emprunt d'un exemplaire de livre</h3>
            <hr>
            <form action="#" id="form-loan-register" method="POST" action="" enctype="multipart/form-data" name="emrunte">
                <?php
                if (isset($_POST['submit']) && !empty($_POST['submit'])) {
                    $idCopy = addslashes($_POST['copy-id']);
                    $dateEmprunt = date('Y-m-d');
                    $dt = strtotime("$dateEmprunt");

                    $dateRetour = date("Y-m-d", strtotime("+1 month", $dt));

                    $idUser = addslashes($_POST['user-id']);
                    $status = 1;


                    $stmt = $db->prepare("INSERT INTO `loan` (`copy_id`,`release_date`,`theoretical_date`, `status`, `user_id`)
                      VALUES (:idCopy, :dateEmprunt, :dateRetour, :status, :idUser);
                      UPDATE `copy` SET `stock` = 0 WHERE `id_copy` = :idCopy");
                    $stmt->bindParam(':idCopy', $idCopy);
                    $stmt->bindParam(':dateEmprunt', $dateEmprunt);
                    $stmt->bindParam(':dateRetour', $dateRetour);
                    $stmt->bindParam(':status', $status);
                    $stmt->bindParam(':idUser', $idUser);
                    $stmt->execute();
                }

                ?>
                <div id="form-loan-register-left">
                    <div class="add-form-template-label-input">
                        <label for="copy-id" class="label-form-add-book">ID de l'exemplaire</label>
                        <input type="text" name="copy-id" id="copy-id" class="input-form-add-book" value="" />
                    </div>

                    <div id="form-loan-register-right">
                        <label for="user-id" class="label-form-add-book">ID du lecteur</label>
                        <input type="text" name="user-id" id="user-id" class="input-form-add-book" value="" />
                    </div>
                    <div id="group-btn-loan-register-commun">
                        <input type="reset" id="btn-reset-form-loan-register" name="reset" value="Reset" />
                        <input type="submit" id="btn-submit-form-loan-register" name="submit" value="Enregistrer" />
                    </div>
                </div>

            </form>
        </div>
    </div>


    <!-- ----- LOAN BOX INBOOK ----- -->

    <div class="container-dashboard-base">
        <div id="box-loan-in-register" class="box-dashboard">
            <h3 class="h3-dashboard">Retour d'emprunt d'un exemplaire de livre</h3>
            <hr>


            <form action="#" id="form-in-loan-register" method="POST" action="" enctype="multipart/form-data">
                <?php
                if (isset($_POST['submit-in']) && !empty($_POST['submit-in'])) {

                    $idCopy = $_POST['copy-in-id'];
                    $stm = $db->prepare('SELECT `id_loan` FROM `loan` WHERE `copy_id` = :idCopy ORDER BY `release_date` DESC LIMIT 1');
                    $stm->bindParam(':idCopy', $idCopy);
                    $stm->execute();
                    $loan = $stm->fetch(PDO::FETCH_ASSOC);



                    $idLoan = $loan['id_loan'];
                    $dateRetour = date("Y-m-d");
                    $status = 0;



                    $stmt = $db->prepare('UPDATE `loan` SET `date_return_loan` = :dateRetour ,`status` = :status 
                    WHERE `id_loan` = :idLoan;
                      
                    UPDATE `copy` SET `stock` = 1 WHERE `id_copy` = :idCopy');
                    $stmt->bindParam(':idCopy', $idCopy);
                    $stmt->bindParam(':idLoan', $idLoan);
                    $stmt->bindParam(':dateRetour', $dateRetour);
                    $stmt->bindParam(':status', $status);

                    $stmt->execute();
                }
                ?>
                <div id="form-in-loan-register-left">
                    <div class="add-form-in-template-label-input">
                        <label for="copy-in-id" class="label-form-add-book">ID de l'exmplaire</label>
                        <input type="text" name="copy-in-id" id="copy-in-id" class="input-form-add-book" value="" />
                    </div>

                    <div id="group-btn-in-loan-register-commun">
                        <input type="reset" id="btn-reset-form-in-loan-register" name="reset" value="Reset" />
                        <input type="submit" id="btn-submit-form-in-loan-register" name="submit-in" value="Enregistrer" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


</main>
<script src="../js/main-admin.js"></script>
</body>

</html>