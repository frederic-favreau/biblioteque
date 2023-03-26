 <?php
    include_once '../admin/header-main.php';
    require_once '../connexion.php';


    ?>


 <section id="dashboard-page-book-add" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue dans l'espace d'ajout de livres</h1>
         <h2 class="h2-dashboard">Vous pouvez ajouter des livres dans la bibliothèque</h2>
         <div id="box-add-book-info" class="box-dashboard">
             <h3 class="h3-dashboard">Ajout d'un livre dans la base de données</h3>
             <hr>

             <?php
                try {
                    if (isset($_POST['submit'])) {
                        $title = addslashes($_POST['work-title-add']);
                        $authorFirstname = addslashes($_POST['author-firstname-add']);
                        $authorFirstname2 = addslashes($_POST['author-firstname-2-add']);

                        $authorLastname = addslashes($_POST['author-lastname-add']);
                        $authorLastname2 = addslashes($_POST['author-2-lastname-add']);
                        $author = $authorLastname . ' ' . $authorFirstname;
                        $author2 = $authorLastname2 . ' ' . $authorFirstname2;


                        $genre = addslashes($_POST['work-genre-add']);
                        $genre2 = addslashes($_POST['work-genre-2-add']);


                        $category = addslashes($_POST['work-category-add']);
                        $publishedDate = addslashes($_POST['work-publish-date-add']);
                        $LCCN = addslashes($_POST['work-LCCN-add']);
                        $extract = addslashes($_POST['work-extract-add']);
                        $workPict = addslashes($_POST['work-pict-add']);

                        // Requête pour insérer le livre
                        $query = "INSERT INTO `work` (`title`, `published_at`, `LCCN`, `extract`, `pict`) VALUES ('$title', '$publishedDate', '$LCCN', '$extract', '$workPict');
                        SET @work_id = LAST_INSERT_ID();";
                        $db->query($query);
                        $workId = $db->lastInsertId();

                        $lastIDSql = "SELECT `id_work` FROM `work` ORDER BY `id_work` DESC LIMIT 1";
                        $reqLastId = $db->query($lastIDSql);
                        $lastIdFetch = $reqLastId->fetch(PDO::FETCH_ASSOC);
                        $lastId = $lastIdFetch['id_work'];;

                        // Requête pour insérer l'auteur


                        //First author

                        $reqAuthorExists = $db->prepare("SELECT `id_author`, CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`) AS `authors` FROM `author` WHERE CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`) = :authors");
                        $reqAuthorExists->bindParam(':authors', $author);
                        $reqAuthorExists->execute();
                        $AuthorExists = $reqAuthorExists->fetch(PDO::FETCH_ASSOC);
                        if ($AuthorExists) {
                            //INSERT INTO `aliment_lieu` (`aliment_id`, `lieu_id`) VALUES ('11', '1');
                            $idAuthor = $AuthorExists['id_author'];
                            $query = $db->prepare("INSERT INTO `work_author` (`work_id`,`author_id`) VALUES(:work_id,:author_id)");
                            $query->bindParam('author_id', $idAuthor, PDO::PARAM_INT);
                            $query->bindParam('work_id', $lastId, PDO::PARAM_INT);
                            $query->execute();
                        } else {
                            $query = "INSERT  IGNORE INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname', '$authorLastname');
                            SET @author_id = LAST_INSERT_ID();
                            INSERT INTO work_author (work_id,author_id) VALUES(@work_id, @author_id)";
                            $db->query($query);
                            $authorId = $db->lastInsertId();
                        }



                        //Insert 2nd author
                        if (isset($authorFirstname2, $authorLastname2) && !empty($authorFirstname2 && $authorLastname2)) {
                            $reqAuthorExists = $db->prepare("SELECT `id_author`, CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`) AS `authors` FROM `author` WHERE CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`) = :authors");
                            $reqAuthorExists->bindParam(':authors', $author2);
                            $reqAuthorExists->execute();
                            $AuthorExists = $reqAuthorExists->fetch(PDO::FETCH_ASSOC);

                            if ($AuthorExists) {
                                $idAuthor2 = $AuthorExists['id_author'];

                                $query = $db->prepare("INSERT INTO `work_author` (`work_id`,`author_id`) VALUES(:work_id,:author_id)");
                                $query->bindParam('author_id', $idAuthor2, PDO::PARAM_INT);
                                $query->bindParam('work_id', $lastId, PDO::PARAM_INT);
                                $query->execute();
                            } else {
                                $query = "INSERT  IGNORE INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname', '$authorLastname');
                                SET @author_id = LAST_INSERT_ID();
                                INSERT INTO work_author (work_id,author_id) VALUES(@work_id, @author_id)";
                                $db->query($query);
                                $authorId = $db->lastInsertId();
                            }
                        }







                        // Requête pour insérer le genre


                        //Firs Genre


                        $reqGenreExists = $db->prepare("SELECT `id_genre` FROM `genre` WHERE `name` = :genre");
                        $reqGenreExists->bindParam(':genre', $genre);
                        $reqGenreExists->execute();
                        $genreExists = $reqGenreExists->fetch(PDO::FETCH_ASSOC);
                        if ($genreExists == true) {
                            //INSERT INTO `aliment_lieu` (`aliment_id`, `lieu_id`) VALUES ('11', '1');
                            $idGenre = $genreExists['id_genre'];
                            $query = $db->prepare("INSERT INTO `work_genre` (`work_id`,`genre_id`) VALUES(:work_id,:genre_id)");
                            $query->bindParam('genre_id', $idGenre, PDO::PARAM_INT);
                            $query->bindParam('work_id', $lastId, PDO::PARAM_INT);
                            $query->execute();
                        } else {
                            $query = "INSERT INTO `genre` (`name`) VALUES ('$genre');
                    SET @genre_id = LAST_INSERT_ID();
                    INSERT INTO work_genre (work_id,genre_id) VALUES(@work_id, @genre_id)";
                            $db->query($query);
                            $genreId = $db->lastInsertId();
                        }




                        //SECONDE GENRE
                        if (isset($genre2) && !empty($genre2)) {
                            $reqGenreExists = $db->prepare("SELECT `id_genre` FROM `genre` WHERE `name` = :genre");
                            $reqGenreExists->bindParam(':genre', $genre2);
                            $reqGenreExists->execute();
                            $genreExists = $reqGenreExists->fetch(PDO::FETCH_ASSOC);


                            if ($genreExists == true) {
                                //INSERT INTO `aliment_lieu` (`aliment_id`, `lieu_id`) VALUES ('11', '1');
                                $idGenre = $genreExists['id_genre'];
                                $query = $db->prepare("INSERT INTO `work_genre` (`work_id`,`genre_id`) VALUES(:work_id,:genre_id)");
                                $query->bindParam('genre_id', $idGenre, PDO::PARAM_INT);
                                $query->bindParam('work_id', $lastId, PDO::PARAM_INT);
                                $query->execute();
                            } else {
                                $query = "INSERT INTO `genre` (`name`) VALUES ('$genre2');
                            SET @genre_id = LAST_INSERT_ID();
                            INSERT INTO work_genre (work_id,genre_id) VALUES(@work_id, @genre_id)";
                                $db->query($query);
                                $genreId = $db->lastInsertId();
                            }
                        }





                        //INSERT CATEGORIE



                        $reqCategorieExists = $db->prepare("SELECT `id_category` FROM `category` WHERE `category` = :category");
                        $reqCategorieExists->bindParam(':category', $category);
                        $reqCategorieExists->execute();
                        $CategorieExists = $reqCategorieExists->fetch(PDO::FETCH_ASSOC);


                        if ($CategorieExists) {
                            $idCategory = $CategorieExists['id_category'];

                            $query = $db->prepare("INSERT INTO `work_category` (`work_id`,`category_id`) VALUES(:work_id,:category_id)");
                            $query->bindParam('category_id', $idCategory, PDO::PARAM_INT);
                            $query->bindParam('work_id', $lastId, PDO::PARAM_INT);
                            $query->execute();
                        } else {
                            $query = "INSERT INTO `category` (`category`) VALUES ('$category');
                            SET @category_id = LAST_INSERT_ID();
                            INSERT INTO work_category (work_id,category_id) VALUES(@work_id, @category_id)";
                            $db->query($query);
                            $genreId = $db->lastInsertId();
                        }




                        $_SESSION["added"] = "Ajout réussit";
                        header("Location: insert-copy.php?LCCN=" . $_GET['LCCN']);
                        ob_end_flush();
                        exit();
                    }
                } catch (PDOException $e) {
                    $_SESSION["notAdded"] = "Problème lors de l'ajout";
                    //header("Location: edit-book.php?id=" . $workId);
                    ob_end_flush();
                    exit();
                }
                ?>


             <form action="#" method="POST" id="form-add-book">
                 <div id="form-add-book-left">
                     <!-- ... autres champs existants ... -->
                     <div class="add-form-template-label-input">
                         <label for="work-title-add" class="label-form-add-book">Titre du livre</label>
                         <input type="text" name="work-title-add" id="work-title-add" class="input-form-add-book" value="hh" />
                     </div>
                     <div >
                         <div class="add-form-template-label-input">
                             <label for="author-firstname-add" class="label-form-add-book">Prénom de l'autheur</label>
                             <input type="text" name="author-firstname-add" id="author-firstname-add" value="hh" class="input-form-add-book" />
                         </div>
                         <div class="add-form-template-label-input">
                             <label for="author-lastname-add" class="label-form-add-book">Nom de l'autheur</label>
                             <input type="text" name="author-lastname-add" id="author-lastname-add" value="hh" class="input-form-add-book" />
                         </div>
                         <!--<button class="add-div-btn"> Ajouter un auteur</button>-->

                     </div>

                     <div class="add-form-template-label-input">
                         <label for="author-firstname-2-add" class="label-form-add-book">Prénom de l'auteur (optionnel)</label>
                         <input type="text" name="author-firstname-2-add" id="author-firstname-2-add" value="oo" class="input-form-add-book" />
                     </div>

                     <div class="add-form-template-label-input">
                         <label for="author-2-lastname-add" class="label-form-add-book">Nom de l'auteur (optionnel)</label>
                         <input type="text" name="author-2-lastname-add" id="author-2-lastname-add" value="oo" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-genre-add" class="label-form-add-book">Genre du livre</label>
                         <input type="text" name="work-genre-add" id="work-genre-add" class="input-form-add-book" value="aventure" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-genre-2-add" class="label-form-add-book">Deuxième genre du livre (optionnel)</label>
                         <input type="text" name="work-genre-2-add" id="work-genre-2-add" value="historique" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-category-add" class="label-form-add-book">Categorie du livre</label>
                         <input type="text" name="work-category-add" id="work-category-add" value="hh" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-publish-date-add" class="label-form-add-book">Date de publication du livre</label>
                         <input type="date" name="work-publish-date-add" id="work-publish-date-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-LCCN-add" class="label-form-add-book">LCCN (exemple: 2001098868)</label>
                         <input type="text" name="work-LCCN-add" id="work-LCCN-add" class="input-form-add-book" value="<?= $_GET['LCCN'] ?>" />
                     </div>
                     <div class="add-form-template-label-input">
                     </div>


                 </div>
                 <div id="form-add-book-right">
                     <!-- ... autres champs existants ... -->
                     <label for="work-extract-add" class="label-form-add-book">Extrait du livre</label>
                     <textarea name="work-extract-add" id="work-extract-add" value="hh"></textarea>

                     <label for="work-pict" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
                     <input type="text" name="work-pict-add" id="work-pict-add" class="input-form-add-book" value="encyclopedie_de_la_biere.jpg" />


                 </div>
                 <div id="group-btn-form-add-commun">
                     <input type="reset" id="btn-reset-form-add-book" name="reset" value="Reset"></input>
                     <input type="submit" id="btn-submit-form-add-book" name="submit" value="Ajouter"></input>
                 </div>
         </div>
         </form>

         <?php if (isset($_SESSION['added'])) : ?>
             <div id="confirmed-added">
                 <p><strong><?= $_SESSION["added"] ?></strong></p>
                 <p class="info-msg-bdd">Les données que vous avez ajouté ont bien <br> été enregistré </p>
             </div>
             <?php unset($_SESSION["added"]); ?>
         <?php endif; ?>

         <?php if (isset($_SESSION['notAdded'])) : ?>
             <div id="not-added">
                 <p><strong><?= $_SESSION["notAdded"] ?></strong></p>
                 <p class="info-msg-bdd">Les données que vous avez ajouté n'ont pas <br> été enregistré</p>
             </div>
             <?php unset($_SESSION["notAdded"]); ?>
         <?php endif; ?>

     </div>
     </div>
     </div>
     </div>
 </section>

 </main>
 <script src="../js/main-admin.js"></script>
 </body>

 </html>