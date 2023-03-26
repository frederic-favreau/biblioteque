<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>

<!-- ---------- SECTION DASHBOARD - PAGE EDIT BOOK ---------- -->

<section id="dashboard-page-book-edit" class="row-limit-size-db">
    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace d'ajout de livres</h1>
        <h2 class="h2-dashboard">Vous pouvez modifier des livres dans la bibliothèque</h2>
        <div id="box-edit-book-info" class="box-dashboard">
            <h3 class="h3-dashboard">Modification d'un livre dans la base de données</h3>
            <hr>

            <?php
            //try {
                $id = $_GET['id'];
                if (isset($_POST['submit'])) {
                    $title = ($_POST['work-title-edit']);
                    $authorFirstname = ($_POST['author-firstname-edit']);
                    $authorLastname = ($_POST['author-lastname-edit']);
                    $authorFirstname2 = ($_POST['author-firstname-2-edit']);
                    $authorLastname2 = ($_POST['author-2-lastname-edit']);
                    $genre = ($_POST['work-genre-edit']);
                    $genre2 = ($_POST['work-genre-2-edit']);
                    $publishedDate = ($_POST['work-publish-date-edit']);
                    $LCCN = ($_POST['work-LCCN-edit']);
                    $extract = ($_POST['work-extract-edit']);
                    $workPict = ($_POST['work-pict-edit']);

                    // Requête pour mettre à jour le livre
                    $reqBookNewedit = $db->prepare("UPDATE `work` SET `title` = :title, `published_at` = :publishedDate, `LCCN` = :LCCN, `extract` = :extract, `pict` = :workPict WHERE `id_work`= :id");
                    $reqBookNewedit->bindParam(':title', $title);
                    $reqBookNewedit->bindParam(':publishedDate', $publishedDate);
                    $reqBookNewedit->bindParam(':LCCN', $LCCN);
                    $reqBookNewedit->bindParam(':extract', $extract);
                    $reqBookNewedit->bindParam(':workPict', $workPict);
                    $reqBookNewedit->bindParam(':id', $id, PDO::PARAM_INT);
                    $reqBookNewedit->execute();

                    // Vérifie si l'auteur existe déjà
                    $reqAuthorExists = $db->prepare("SELECT `id_author` FROM `author` WHERE `firstname` = :authorFirstname AND `lastname` = :authorLastname");
                    $reqAuthorExists->bindParam(':authorFirstname', $authorFirstname);
                    $reqAuthorExists->bindParam(':authorLastname', $authorLastname);
                    $reqAuthorExists->execute();
                    $authorExists = $reqAuthorExists->fetch(PDO::FETCH_ASSOC);

                    if ($authorExists) {
                        // L'auteur existe déjà, il suffit de mettre à jour la table work_author
                        $authorId = $authorExists['id_author'];
                        $reqUpdateWorkAuthor = $db->prepare("UPDATE `work_author` SET `author_id` = :authorId WHERE `work_id` = :id");
                        $reqUpdateWorkAuthor->bindParam(':authorId', $authorId);
                        $reqUpdateWorkAuthor->bindParam(':id', $id, PDO::PARAM_INT);
                        $reqUpdateWorkAuthor->execute();
                    } else {
                        // L'auteur n'existe pas, insérer le nouvel auteur et mettre à jour la table work_author
                        $reqInsertAuthor = $db->prepare("INSERT INTO `author` (`firstname`, `lastname`) VALUES (:authorFirstname, :authorLastname)");
                        $reqInsertAuthor->bindParam(':authorFirstname', $authorFirstname);
                        $reqInsertAuthor->bindParam(':authorLastname', $authorLastname);
                        $reqInsertAuthor->execute();
                        $newAuthorId = $db->lastInsertId();

                        $reqUpdateWorkAuthor = $db->prepare("UPDATE `work_author` SET `author_id` = :newAuthorId WHERE `work_id` = :id");
                        $reqUpdateWorkAuthor->bindParam(':newAuthorId', $newAuthorId);
                        $reqUpdateWorkAuthor->bindParam(':id', $id, PDO::PARAM_INT);
                        $reqUpdateWorkAuthor->execute();
                    }






                    if(isset($authorFirstname2, $authorLastname2)){

                    // Vérifie si l'auteur 2 existe déjà
                    $reqAuthor2Exists = $db->prepare("SELECT `id_author` FROM `author` WHERE `firstname` = :authorFirstname AND `lastname` = :authorLastname");
                    $reqAuthor2Exists->bindParam(':authorFirstname', $authorFirstname2);
                    $reqAuthor2Exists->bindParam(':authorLastname', $authorLastname2);
                    $reqAuthor2Exists->execute();
                    $author2Exists = $reqAuthor2Exists->fetch(PDO::FETCH_ASSOC);

                    if ($author2Exists) {
                        // L'auteur existe déjà, il suffit de mettre à jour la table work_author
                        $authorId = $author2Exists['id_author'];
                        $reqUpdateWorkAuthor = $db->prepare("UPDATE `work_author` wg
                        JOIN (
                          SELECT `id_work_author`
                          FROM `work_author`
                          WHERE `work_id` = :id
                          ORDER BY `id_work_author` ASC
                          LIMIT 1 OFFSET 1
                        ) t ON wg.`id_work_author` = t.`id_work_author`
                        SET wg.`author_id` = :authorId"
                    
                    );
                        $reqUpdateWorkAuthor->bindParam(':authorId', $authorId);
                        $reqUpdateWorkAuthor->bindParam(':id', $id, PDO::PARAM_INT);
                        $reqUpdateWorkAuthor->execute();
                    } else {
                        // L'auteur n'existe pas, insérer le nouvel auteur et mettre à jour la table work_author
                        $reqInsertAuthor = $db->prepare("INSERT INTO `author` (`firstname`, `lastname`) VALUES (:authorFirstname, :authorLastname)");
                        $reqInsertAuthor->bindParam(':authorFirstname', $authorFirstname2);
                        $reqInsertAuthor->bindParam(':authorLastname', $authorLastname2);
                        $reqInsertAuthor->execute();
                        $newAuthorId = $db->lastInsertId();

                        $reqUpdateWorkAuthor = $db->prepare("UPDATE `work_author` wg
JOIN (
  SELECT `id_work_author`
  FROM `work_author`
  WHERE `work_id` = :id
  ORDER BY `id_work_author` ASC
  LIMIT 1 OFFSET 1
) t ON wg.`id_work_author` = t.`id_work_author`
SET wg.`author_id` = :newAuthorId
                        
                        
                        
                        
                        
                        
                        
                        
                         ");
                        $reqUpdateWorkAuthor->bindParam(':newAuthorId', $newAuthorId);
                        $reqUpdateWorkAuthor->bindParam(':id', $id, PDO::PARAM_INT);
                        $reqUpdateWorkAuthor->execute();
                    }}




                        // Vérifier si le genre existe déjà
                        $reqGenreExists = $db->prepare("SELECT `id_genre` FROM `genre` WHERE `name` = :genre");
                        $reqGenreExists->bindParam(':genre', $genre);
                        $reqGenreExists->execute();
                        $genreExists = $reqGenreExists->fetch(PDO::FETCH_ASSOC);

                    if ($genreExists) {
                        // Le genre existe déjà, il suffit de mettre à jour la table work_genre
                        $genreId = $genreExists['id_genre'];
                        $reqUpdateWorkGenre = $db->prepare("UPDATE `work_genre` SET `genre_id` = :genreId WHERE `work_id` = :id");
                        $reqUpdateWorkGenre->bindParam(':genreId', $genreId);
                        $reqUpdateWorkGenre->bindParam(':id', $id, PDO::PARAM_INT);
                        $reqUpdateWorkGenre->execute();
                    } else {
                        // Le genre n'existe pas, insérer le nouveau genre et mettre à jour la table work_genre
                        $reqInsertGenre = $db->prepare("INSERT INTO `genre` (`name`) VALUES (:genre)");
                        $reqInsertGenre->bindParam(':genre', $genre);
                        $reqInsertGenre->execute();
                        $newGenreId = $db->lastInsertId();

                        $reqUpdateWorkGenre = $db->prepare("UPDATE `work_genre` SET `genre_id` = :newGenreId WHERE `work_id` = :id");
                        $reqUpdateWorkGenre->bindParam(':newGenreId', $newGenreId);
                        $reqUpdateWorkGenre->bindParam(':id', $id, PDO::PARAM_INT);
                        $reqUpdateWorkGenre->execute();
                    }










                    if(isset($genre2)){
                        // Vérifier si le genre2 existe déjà
                        $reqGenre2Exists = $db->prepare("SELECT `id_genre` FROM `genre` WHERE `name` = :genre");
                        $reqGenre2Exists->bindParam(':genre', $genre2);
                        $reqGenre2Exists->execute();
                        $genre2Exists = $reqGenre2Exists->fetch(PDO::FETCH_ASSOC);
                    
                        if ($genre2Exists) {
                            // Le genre existe déjà, vérifier si la relation work_genre existe pour l'œuvre et le genre
                            $genreId = $genre2Exists['id_genre'];
                            $reqWorkGenreExists = $db->prepare("SELECT `id_work_genre` FROM `work_genre` WHERE `work_id` = :work_id AND `genre_id` = :genre_id");
                            $reqWorkGenreExists->bindParam(':work_id', $id, PDO::PARAM_INT);
                            $reqWorkGenreExists->bindParam(':genre_id', $genreId, PDO::PARAM_INT);
                            $reqWorkGenreExists->execute();
                            $workGenreExists = $reqWorkGenreExists->fetch(PDO::FETCH_ASSOC);
                    
                            if ($workGenreExists) {
                                // La relation work_genre existe déjà, mettre à jour la ligne correspondante avec l'id_genre récupéré
                                $reqUpdateWorkGenre = $db->prepare("UPDATE `work_genre` SET `genre_id` = :genre_id WHERE `id_work_genre` = :id_work_genre");
                                $reqUpdateWorkGenre->bindParam(':genre_id', $genreId, PDO::PARAM_INT);
                                $reqUpdateWorkGenre->bindParam(':id_work_genre', $workGenreExists['id_work_genre'], PDO::PARAM_INT);
                                $reqUpdateWorkGenre->execute();
                            } else {
                                // La relation work_genre n'existe pas, insérer une nouvelle ligne dans la table work_genre avec l'œuvre et l'id_genre récupéré
                                $newRelationSql = $db->prepare("INSERT INTO `work_genre`(`work_id`,`genre_id`) VALUES (:work_id, :genre_id)");
                                $newRelationSql->bindParam(':work_id', $id, PDO::PARAM_INT);
                                $newRelationSql->bindParam(':genre_id', $genreId, PDO::PARAM_INT);
                                $newRelationSql->execute();
                            }
                        } else {
                            // Le genre n'existe pas, insérer le nouveau genre et mettre à jour la table work_genre
                            $reqInsertGenre = $db->prepare("INSERT INTO `genre` (`name`) VALUES (:genre)");
                            $reqInsertGenre->bindParam(':genre', $genre2);
                            $reqInsertGenre->execute();
                            $newGenreId = $db->lastInsertId();
                    
                            // Vérifier si la deuxième relation existe déjà
                            $reqGenre_WorkExists = $db->prepare("SELECT * FROM `work_genre` WHERE `work_id` = :id ORDER BY `id_work_genre` DESC LIMIT 1 OFFSET 1");
                            $reqGenre_WorkExists->bindParam(':id', $id, PDO::PARAM_INT);
                            $reqGenre_WorkExists->execute();
                            $Genre_WorkExists = $reqGenre_WorkExists->fetch(PDO::FETCH_ASSOC);
                    
                            if($Genre_WorkExists){
                                // La deuxième relation existe déjà, mettre à jour la table work_genre
                                $genreId = $newGenreId;
                                $reqUpdateWorkGenre = $db->prepare("UPDATE `work_genre` wg
                                    JOIN (
                                        SELECT `id_work_genre`
                                        FROM `work_genre`
                                        WHERE `work_id` = :id
                                        ORDER BY `id_work_genre` ASC
                                        LIMIT 1 OFFSET 1
                                    ) t ON wg.`id_work_genre` = t.`id_work_genre`
                                    SET wg.`genre_id` = :genreId;");
                                $reqUpdateWorkGenre->bindParam(':genreId', $genreId);
                                $reqUpdateWorkGenre->bindParam(':id', $id, PDO::PARAM_INT);
                                $reqUpdateWorkGenre->execute();
                            }else{
                                // La deuxième relation n'existe pas, insérer la nouvelle relation
                                $newRelationSql = $db->prepare("INSERT INTO `work_genre`(`work_id`,`genre_id`) VALUES (:work_id, :genre_id)");
                                $newRelationSql->bindParam(':work_id', $id, PDO::PARAM_INT);
                                $newRelationSql->bindParam(':genre_id', $newGenreId,  PDO::PARAM_INT);
                                $newRelationSql->execute();
                            }
                        }
                    }
























                  /*  $_SESSION["modified"] = "Mise à jour réussie";
                    header("Location: edit-book.php?id=" . $id);
                    exit();
                }
            } catch (PDOException $e) {
                $_SESSION["notModified"] = "Problème lors de la mise à jour";
                header("Location: edit-book.php?id=" . $id);
                exit();*/
            }
            ?>


            <?php
            $id = $_GET['id'];
            $req_book = $db->prepare("SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, `published_at`, `LCCN`, `category`.`category`,
            GROUP_CONCAT(DISTINCT `author`.`lastname`) AS `lastname`,
            GROUP_CONCAT(DISTINCT `author`.`firstname`) AS `firstname`,
            GROUP_CONCAT(DISTINCT `genre`.`name` ORDER BY `id_work_genre`) AS `genre` 
                FROM `work`
                INNER JOIN `work_genre`
                ON `work`.`id_work` = `work_genre`.`work_id`
                INNER JOIN `genre`
                ON `work_genre`.`genre_id` =`genre`.`id_genre`
                INNER JOIN `work_author`
                ON `work_author`.`work_id` = `work`.`id_work`
                INNER JOIN `author`
                ON `work_author`.`author_id` = `author`.`id_author`
                INNER JOIN `work_category` 
                ON `work`.`id_work` = `work_category`.`work_id`

                INNER JOIN `category`
                ON `work_category`.`category_id` =`category`.`id_category` 
                WHERE `id_work` = :id
                ");
            $req_book->bindParam('id', $id, PDO::PARAM_INT);
            $req_book->execute();
            
            
            $book = $req_book->fetch(PDO::FETCH_ASSOC);
            $authorsLastName = explode(',',$book['lastname']);

            $authorsFirstName = explode(',',$book['firstname']);
            $genres = explode(',',$book['genre']);
            
            ?>


            <form action="#" id="form-book-edit" method="POST" action="edit-book.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <div id="form-book-edit-left">
                    <div class="add-form-template-label-input">
                        <label for="work-title-edit" class="label-form-add-book">Titre du livre</label>
                        <input type="text" name="work-title-edit" id="work-title-edit" class="input-form-add-book" value="<?= $book['title'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="author-firstname-edit" class="label-form-add-book">Prénom de l'autheur</label>
                        <input type="text" name="author-firstname-edit" id="author-firstname-edit" class="input-form-add-book" value="<?= $authorsFirstName[0] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="author-lastname-edit" class="label-form-add-book">Nom de l'autheur</label>
                        <input type="text" name="author-lastname-edit" id="author-lastname-edit" class="input-form-add-book" value="<?= $authorsLastName[0] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                         <label for="author-firstname-2-edit" class="label-form-add-book">Prénom de l'auteur (optionnel)</label>
                         <input type="text" name="author-firstname-2-edit" id="author-firstname-2-edit" 
                         <?php if(count($authorsFirstName)<1){?> value="<?=$authorsFirstName[1]?>" 
                         <?php } ?>class="input-form-add-book" />
                     </div>

                     <div class="add-form-template-label-input">
                         <label for="author-2-lastname-edit" class="label-form-add-book">Nom de l'auteur (optionnel)</label>
                         <input type="text" name="author-2-lastname-edit" <?php if(count($authorsLastName)<1){?> value="<?=$authorsLastName[1]?>" <?php } ?>id="author-2-lastname-edit" class="input-form-add-book" />
                     </div>

                    <div class="add-form-template-label-input">
                        <label for="work-genre-edit" class="label-form-add-book">Genre du livre</label>
                        <input type="text" name="work-genre-edit" id="work-genre-edit" class="input-form-add-book" value="<?= $genres[0]?>" />
                    </div>
                    <div class="add-form-template-label-input">
                         <label for="work-genre-2-edit" class="label-form-add-book">Deuxième genre du livre (optionnel)</label>
                         <input type="text" name="work-genre-2-edit" id="work-genre-2-edit" <?php if(isset($genres[1])){?> value="<?=$genres[1]?>" <?php } ?> class="input-form-add-book" />
                     </div>

                    <!-- <div class="add-form-template-label-input">
                         <label for="work-genre-B-edit" class="label-form-add-book">Genre B du livre</label>
                         <input type="text" name="work-genre-B" id="work-genre-B-edit" class="input-form-add-book" />
                     </div> -->

                    <!-- <select name="work-genre" id="work-genre-edit" class="select-form-add-book">
                             <option value="avanture">Aventure</option>
                             <option value="horreur">Horreur</option>
                             <option value="historique">Historique</option>
                             <option value="enfant">Enfant</option>
                             <option value="sci-fi">Sci-fi</option>
                             <option value="éducation">Éducation</option>
                             <option value="romantique">Romantique</option>
                             <option value="détective">Détective</option>
                             <option value="jeunesse">Jeunesse</option>
                         </select> -->

                    <div class="add-form-template-label-input">
                        <label for="work-category-edit" class="label-form-add-book">Catégorie du livre</label>
                        <input type="text" name="work-category-edit" id="work-category-edit" class="input-form-add-book" value="<?= $book['category'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-publish-date-edit" class="label-form-add-book">Date de publication du livre</label>
                        <input type="date" name="work-publish-date-edit" id="work-publish-date-edit" class="input-form-add-book" value="<?= $book['published_at'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-LCCN-edit" class="label-form-add-book">LCCN (ex: LCCN 2001098868)</label>
                        <input type="text" name="work-LCCN-edit" id="work-LCCN-edit" class="input-form-add-book" value="<?= $book['LCCN'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                    </div>
                </div>
                <div id="form-book-edit-right">
                    <label for="work-extract-edit" class="label-form-add-book">Extrait du livre</label>
                    <textarea name="work-extract-edit" id="work-extract-edit"><?= $book['extract'] ?></textarea>

                    <label for="work-pict-edit" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
                    <input type="text" name="work-pict-edit" id="work-pict-edit" class="input-form-add-book" value="<?= $book['pict'] ?>" />
                </div>
                <div id="group-btn-form-edit-commun">
                    <input type="reset" id="btn-reset-form-add-book" name="reset" value="Reset" />
                    <input type="submit" id="btn-submit-form-add-book" name="submit" value="Modifier" />
                </div>
            </form>

            <?php 
             if (isset($_SESSION['modified'])) : ?>
                <div id="confirmed-modified" onclick="hideDivConfirmed('confirmed-modified')">
                    <p><strong><?= $_SESSION["modified"] ?></strong></p>
                    <p class="info-msg-bdd">Les données que vous avez modifié ont bien été enregistré </p>
                </div>
                <?php unset($_SESSION["modified"]); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['notModified'])) : ?>
                <div id="not-modified" onclick="hideDivNotConfirmed('not-modified')">
                    <p><strong><?= $_SESSION["notModified"] ?></strong></p>
                    <p class="info-msg-bdd">Les données que vous avez modifié n'ont pas été enregistré</p>
                </div>
                <?php unset($_SESSION["notModified"]); ?>
            <?php endif; ?>

        </div>
    </div>
</section>


</main>
<script src="../js/main-admin.js"></script>
</body>

</html>