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

                
                $genre = addslashes($_POST['work-genre-add']);
                $genre2 = addslashes($_POST['work-genre-2-add']);

                
                $category = addslashes($_POST['work-category-add']);
                $publishedDate = addslashes($_POST['work-publish-date-add']);
                $ISBN = addslashes($_POST['work-ISBN-add']);
                $extract = addslashes($_POST['work-extract-add']);
                $workPict = addslashes($_POST['work-pict-add']);

                // Requête pour insérer le livre
                $query = "INSERT INTO `work` (`title`, `published_at`, `ISBN`, `extract`, `pict`) VALUES ('$title', '$publishedDate', '$ISBN', '$extract', '$workPict');
                SET @work_id = LAST_INSERT_ID();";
                $db->query($query);
                $workId = $db->lastInsertId();

                // Requête pour insérer l'auteur
                $query = "INSERT  IGNORE INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname', '$authorLastname');
                SET @author_id = LAST_INSERT_ID();
                INSERT INTO work_author (work_id,author_id) VALUES(@work_id, @author_id)";
                $db->query($query);
                $authorId = $db->lastInsertId();

                $query = "INSERT  IGNORE INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname2', '$authorLastname2');
                SET @author_id = LAST_INSERT_ID();
                INSERT INTO work_author (work_id,author_id) VALUES(@work_id, @author_id)";
                $db->query($query);
                $authorId = $db->lastInsertId();

                // Requête pour insérer le genre
                $query = "SELECT `genre`.`name` FROM genre"

                
                $query = "INSERT INTO `genre` (`name`) VALUES ('$genre') WHERE NOT EXISTS(SELECT `genre` (`name`) FROM `genres`);
                SET @genre_id = LAST_INSERT_ID();
                INSERT INTO work_genre (work_id,genre_id) VALUES(@work_id, @genre_id)";
                $db->query($query);
                $genreId = $db->lastInsertId();

                $query = "INSERT INTO `genre` (`name`) VALUES ('$genre2') WHERE NOT EXISTS(SELECT `genre` (`name`) FROM `genres`);
                SET @genre_id = LAST_INSERT_ID();
                INSERT INTO work_genre (work_id,genre_id) VALUES(@work_id, @genre_id)";
                $db->query($query);
                $genreId = $db->lastInsertId();


                $_SESSION["added"] = "Ajout réussit";
                //header("Location: edit-book.php?id=" . $workId);
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
                     <div class="add-form-template-label-input">
                         <label for="author-firstname-add" class="label-form-add-book">Prénom de l'autheur</label>
                         <input type="text" name="author-firstname-add" id="author-firstname-add" value="hh" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-firstname-2-add" class="label-form-add-book">Prénom de l'auteur (optionnel)</label>
                         <input type="text" name="author-firstname-2-add" id="author-firstname-2-add" value="oo"class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-lastname-add" class="label-form-add-book">Nom de l'autheur</label>
                         <input type="text" name="author-lastname-add" id="author-lastname-add" value="hh" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-2-lastname-add" class="label-form-add-book">Nom de l'auteur (optionnel)</label>
                         <input type="text" name="author-2-lastname-add" id="author-2-lastname-add" value="oo" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-genre-add" class="label-form-add-book">Genre du livre</label>
                         <input type="text" name="work-genre-add" id="work-genre-add" class="input-form-add-book" value="aventure"/>
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
                         <label for="work-ISBN-add" class="label-form-add-book">ISBN (ex: ISBN 13 :874-6-2457-6478-8)</label>
                         <input type="text" name="work-ISBN-add" id="work-ISBN-add" class="input-form-add-book" value="hh" />
                     </div>
                     <div class="add-form-template-label-input">
                     </div>


                     <div class="add-form-template-label-input">
                         <label for="available-copies-add" class="label-form-add-book">Nombre de copies disponibles</label>
                         <input type="number" name="available-copies-add" id="available-copies-add" class="input-form-add-book" value="4"/>
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="total-copies-add" class="label-form-add-book">Nombre total de copies dans la bibliothèque</label>
                         <input type="number" name="total-copies-add" id="total-copies-add" value="4" class="input-form-add-book" />
                     </div>
                 </div>
                 <div id="form-add-book-right">
                     <!-- ... autres champs existants ... -->
                     <label for="work-extract-add" class="label-form-add-book">Extrait du livre</label>
                     <textarea name="work-extract-add" id="work-extract-add" value="hh"></textarea>

                     <label for="work-pict" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
                     <input type="text" name="work-pict-add" id="work-pict-add" class="input-form-add-book" value="hh"/>

                     <div class="add-form-template-label-input">
                         <label for="publisher-name-add" class="label-form-add-book">Nom de l'éditeur</label>
                         <input type="text" name="publisher-name-add" id="publisher-name-add" class="input-form-add-book" value="hh"/>
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-date-add" class="label-form-add-book">Date d'édition</label>
                         <input type="date" name="publisher-date-add" id="publisher-date-add" value="hh" class="input-form-add-book" />
                     </div>
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