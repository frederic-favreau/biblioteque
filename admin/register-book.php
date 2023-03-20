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
                                        <li class="btn-option-crud" data-idWork="<?= $crud['id_work'] ?>" data-title="<?= $crud['title'] ?>" data-pict="<?= $crud['pict'] ?>"><img src="../img/picto/magic-wand-02.svg" alt="baguette">
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