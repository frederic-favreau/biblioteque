<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>



<!-- ---------- SECTION CRUD USER ---------- -->

<section id="crud-user" class="row-limit-size-db">

    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace de gestion des lecteurs</h1>
        <h2 class="h2-dashboard">Vous pouvez gérer les utilisateurs de la bibliothèque dans cet espace</h2>

        <div class="container-crud-book-tabs">
            <div id="box-crud-user" class="box-dashboard">

                <div class="search-add-crud-book">
                    <div class="search-crud-input">

                        <form action="" method="post">
                            <p class="title-sticky-crud">Base de données des lecteurs</p>
                            <div class="group-search-standard">
                                <input type="text" id="input-seach-user" class="input-search" name="text">
                                <input type="submit" id="btn-search-user" class="btn-search" name='rechercher' value=" "></input>
                            </div>
                            <div class="group-tool-standard">
                                <button type="button" id="btn-all-detail">Vue détails</button>
                                <a href="#box-loan-register" type="button" id="btn-add-book" class="btn-add">+ Nouveau lecteur</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="container-list-book-crud">
                    <ul class="list-book-crud">

                        <?php
                        if (isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
                            $recheche = $_POST['text'];
                            $userSql = $db->prepare('SELECT `id_user`,`firstname`,`lastname`,`mail`,`adress` FROM `user`
                        WHERE `id_user` LIKE "%' . $recheche . '%" OR  `lastname` LIKE "%' . $recheche . '%"');
                            $userSql->execute();
                            while ($user = $userSql->fetch(PDO::FETCH_ASSOC)) {
                                $idUser = $user['id_user'];

                        ?>

                                <li class="item-book-crud">
                                    <ul class="detail-item-book-crud">
                                        <li class="id-crud-user"> ID clien: <?= $user['id_user'] ?></li>
                                        <li class="firstname-crud-user">Nom: <?= $user['lastname'] ?></li>
                                        <li class="lastname-crud-user">Prénom: <?= $user['firstname'] ?></li>
                                        <li class="mail-crud-user">E-mail: <?= $user['mail'] ?></li>
                                        <li class="btn-option-crud" data-idWork="" data-title="" data-pict="">
                                        </li>
                                        <div class="container-complete-detail-info-book">
                                            <div class="container-flex-crud">
                                                <div class="item-complete-center">
                                                    <h3>Emprunts en cour</h3>
                                                    <ul class="all-info-history-loan">


                                                        <?php
                                                        $epuruntEnCour = false;
                                                        $empruntSql = $db->prepare(
                                                            'SELECT `copy_id`, `work`.`title`, `work`.`pict`,
                                            DATE_FORMAT(`release_date`, "%d/%m/%Y") AS `release`,
                                            DATE_FORMAT(`theoretical_date`, "%d/%m/%Y") AS `theoreticaldate`
                                            FROM `loan` 
                                            
                                            INNER JOIN `copy`
                                            ON `copy`.`id_copy` = `loan`.`copy_id`
                                            
                                            INNER JOIN `work`
                                            ON `copy`.`work_id` = `work`.`id_work`
                                            
                                            WHERE `loan`.`status`=1 AND `loan`.`user_id` = :id_user'
                                                        );
                                                        $empruntSql->bindParam('id_user', $idUser, PDO::PARAM_INT);
                                                        $empruntSql->execute();


                                                        while ($emprunt = $empruntSql->fetch(PDO::FETCH_ASSOC)) {
                                                            $epuruntEnCour = true;
                                                        ?>




                                                            <li class="loan-history-row">
                                                                <ul class="item-loan-history-row">
                                                                    <li class="pict-crud-user">
                                                                        <img src="../img/books/<?= $emprunt['pict'] ?>" alt="<?= $emprunt['title'] ?>" class="pict-book-crud">
                                                                    </li>
                                                                    <li class="title-crud-user">Title: <?= $emprunt['title'] ?> </li>
                                                                    <li class="id-copy-crud-user"> Id-copy: <?= $emprunt['copy_id'] ?></li>
                                                                    <li class="date-start-crud-user">Date debut d'emprunt: <?= $emprunt['release'] ?></li>
                                                                    <li class="date-close-crud-user">Date de retour theorerique: <?= $emprunt['theoreticaldate'] ?></li>
                                                                    <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                                    </li>

                                                                </ul>
                                                            </li>
                                                        <?php }
                                                        if ($epuruntEnCour == false) { ?>

                                                            <p>Ce client n'a pas d'emprunt en cour</p>

                                                        <?php }

                                                        ?>


                                                    </ul>

                                                    <h3>Histoirique des emprunts du client</h3>
                                                    <ul class="all-info-history-loan">


                                                        <?php
                                                        $epuruntHistorique = false;
                                                        $empruntSql = $db->prepare(
                                                            'SELECT `copy_id`, `work`.`title`, `work`.`pict`,
                                            DATE_FORMAT(`release_date`, "%d/%m/%Y") AS `release`,
                                            DATE_FORMAT(`date_return_loan`, "%d/%m/%Y") AS `return`
                                            FROM `loan` 
                                            
                                            INNER JOIN `copy`
                                            ON `copy`.`id_copy` = `loan`.`copy_id`
                                            
                                            INNER JOIN `work`
                                            ON `copy`.`work_id` = `work`.`id_work`
                                            
                                            WHERE `loan`.`status`=0 AND `loan`.`user_id` = :id_user'
                                                        );
                                                        $empruntSql->bindParam('id_user', $idUser, PDO::PARAM_INT);
                                                        $empruntSql->execute();


                                                        while ($emprunt = $empruntSql->fetch(PDO::FETCH_ASSOC)) {
                                                            $epuruntHistorique = true;
                                                        ?>




                                                            <li class="loan-history-row">
                                                                <ul class="item-loan-history-row">
                                                                    <li class="pict-crud-user">
                                                                        <img src="../img/books/<?= $emprunt['pict'] ?>" alt="<?= $emprunt['title'] ?>" class="pict-book-crud">
                                                                    </li>
                                                                    <li class="title-crud-user">Title: <?= $emprunt['title'] ?> </li>
                                                                    <li class="id-copy-crud-user"> Id-copy: <?= $emprunt['copy_id'] ?></li>
                                                                    <li class="date-start-crud-user">Date debut d'emprunt: <?= $emprunt['release'] ?></li>
                                                                    <li class="date-close-crud-user">Date de retour theorerique: <?= $emprunt['return'] ?></li>
                                                                    <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        <?php }
                                                        if ($epuruntHistorique == false) { ?>

                                                            <p>Ce client n'a jamais emprunté de livre</p>

                                                        <?php } ?>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="container-box-option-crud">
                                    </ul>
                                </li>
                            <?php }
                        } else {

                            $userSql = $db->prepare('SELECT `id_user`,`firstname`,`lastname`,`mail`,`adress` FROM `user`');
                            $userSql->execute();
                            while ($user = $userSql->fetch(PDO::FETCH_ASSOC)) {
                                $idUser = $user['id_user'];

                            ?>

                                <li class="item-book-crud">
                                    <ul class="detail-item-book-crud">
                                        <li class="id-crud-user"> ID clien: <?= $user['id_user'] ?></li>
                                        <li class="firstname-crud-user">Nom: <?= $user['lastname'] ?></li>
                                        <li class="lastname-crud-user">Prénom: <?= $user['firstname'] ?></li>
                                        <li class="mail-crud-user">E-mail: <?= $user['mail'] ?></li>
                                        <li class="btn-option-crud" data-idWork="" data-title="" data-pict="">
                                        </li>
                                        <div class="container-complete-detail-info-book">
                                            <div class="container-flex-crud">
                                                <div class="item-complete-center">
                                                    <h3>Emprunts en cour</h3>
                                                    <ul class="all-info-history-loan">


                                                        <?php
                                                        $epuruntEnCour = false;

                                                        $empruntSql = $db->prepare(
                                                            'SELECT `copy_id`, `work`.`title`, `work`.`pict`,
                    DATE_FORMAT(`release_date`, "%d/%m/%Y") AS `release`,
                    DATE_FORMAT(`theoretical_date`, "%d/%m/%Y") AS `theoreticaldate`
                    FROM `loan` 
                    
                    INNER JOIN `copy`
                    ON `copy`.`id_copy` = `loan`.`copy_id`
                    
                    INNER JOIN `work`
                    ON `copy`.`work_id` = `work`.`id_work`
                    
                    WHERE `loan`.`status`=1 AND `loan`.`user_id` = :id_user'
                                                        );
                                                        $empruntSql->bindParam('id_user', $idUser, PDO::PARAM_INT);
                                                        $empruntSql->execute();


                                                        while ($emprunt = $empruntSql->fetch(PDO::FETCH_ASSOC)) {
                                                            $epuruntEnCour = true;
                                                        ?>




                                                            <li class="loan-history-row">
                                                                <ul class="item-loan-history-row">
                                                                    <li class="pict-crud-user">
                                                                        <img src="../img/books/<?= $emprunt['pict'] ?>" alt="<?= $emprunt['title'] ?>" class="pict-book-crud">
                                                                    </li>
                                                                    <li class="title-crud-user">Title: <?= $emprunt['title'] ?> </li>
                                                                    <li class="id-copy-crud-user"> Id-copy: <?= $emprunt['copy_id'] ?></li>
                                                                    <li class="date-start-crud-user">Date debut d'emprunt: <?= $emprunt['release'] ?></li>
                                                                    <li class="date-close-crud-user">Date de retour theorerique: <?= $emprunt['theoreticaldate'] ?></li>
                                                                    <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                                    </li>

                                                                </ul>
                                                            </li>
                                                        <?php }
                                                        if ($epuruntEnCour == false) { ?>

                                                            <p>Ce client n'a pas d'emprunt en cour</p>

                                                        <?php }

                                                        ?>


                                                    </ul>

                                                    <h3>Histoire des emprunts du client</h3>
                                                    <ul class="all-info-history-loan">


                                                        <?php
                                                        $epuruntHistorique = false;
                                                        $empruntSql = $db->prepare(
                                                            'SELECT `copy_id`, `work`.`title`, `work`.`pict`,
                    DATE_FORMAT(`release_date`, "%d/%m/%Y") AS `release`,
                    DATE_FORMAT(`date_return_loan`, "%d/%m/%Y") AS `return`
                    FROM `loan` 
                    
                    INNER JOIN `copy`
                    ON `copy`.`id_copy` = `loan`.`copy_id`
                    
                    INNER JOIN `work`
                    ON `copy`.`work_id` = `work`.`id_work`
                    
                    WHERE `loan`.`status`=0 AND `loan`.`user_id` = :id_user'
                                                        );
                                                        $empruntSql->bindParam('id_user', $idUser, PDO::PARAM_INT);
                                                        $empruntSql->execute();


                                                        while ($emprunt = $empruntSql->fetch(PDO::FETCH_ASSOC)) {
                                                            $epuruntHistorique = true;
                                                        ?>




                                                            <li class="loan-history-row">
                                                                <ul class="item-loan-history-row">
                                                                    <li class="pict-crud-user">
                                                                        <img src="../img/books/<?= $emprunt['pict'] ?>" alt="<?= $emprunt['title'] ?>" class="pict-book-crud">
                                                                    </li>
                                                                    <li class="title-crud-user">Title: <?= $emprunt['title'] ?> </li>
                                                                    <li class="id-copy-crud-user"> Id-copy: <?= $emprunt['copy_id'] ?></li>
                                                                    <li class="date-start-crud-user">Date debut d'emprunt: <?= $emprunt['release'] ?></li>
                                                                    <li class="date-close-crud-user">Date de retour theorerique: <?= $emprunt['return'] ?></li>
                                                                    <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        <?php }
                                                        if ($epuruntHistorique == false) { ?>

                                                            <p>Ce client n'a jamais emprunté de livre</p>

                                                        <?php } ?>


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
    </div>
</section>
</main>
<script src="../js/main-admin.js"></script>
</body>

</html>