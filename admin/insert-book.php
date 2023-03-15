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
                        // Livre
                        $title = addslashes($_POST['work-title-add']);
                        $genre = addslashes($_POST['work-genre-add']);
                        $genre2 = addslashes($_POST['work-genre2-add']); // Deuxième genre
                        $category = addslashes($_POST['work-category-add']);
                        $publishedDate = addslashes($_POST['work-publish-date-add']);
                        $ISBN = addslashes($_POST['work-ISBN-add']);
                        $extract = addslashes($_POST['work-extract-add']);
                        $workPict = addslashes($_POST['work-pict-add']);
                        $stock = 1; // Stock initial

                        // Auteurs
                        $authorFirstname = addslashes($_POST['author-firstname-add']);
                        $authorLastname = addslashes($_POST['author-lastname-add']);
                        $authorFirstname2 = addslashes($_POST['author-firstname2-add']); // Deuxième auteur
                        $authorLastname2 = addslashes($_POST['author-lastname2-add']); // Deuxième auteur

                        // Editeur
                        $publisherName = addslashes($_POST['publisher-name-add']);
                        $publisherDate = addslashes($_POST['publisher-date-add']);

                        // Copies
                        $availableCopies = addslashes($_POST['available-copies-add']);
                        $totalCopies = addslashes($_POST['total-copies-add']);

                        // Requête pour insérer le livre
                        $query = "INSERT INTO `work` (`title`, `published_at`, `ISBN`, `extract`, `pict`, `stock`) VALUES ('$title', '$publishedDate', '$ISBN', '$extract', '$workPict', '$stock')";
                        $db->query($query);
                        $workId = $db->lastInsertId();

                        // Requête pour insérer l'auteur 1
                        $query = "INSERT INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname', '$authorLastname')";
                        $db->query($query);
                        $authorId = $db->lastInsertId();

                        // Requête pour insérer l'auteur 2 (si renseigné)
                        if (!empty($authorFirstname2) && !empty($authorLastname2)) {
                            $query = "INSERT INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname2', '$authorLastname2')";
                            $db->query($query);
                            $authorId2 = $db->lastInsertId();
                        }

                        // Requête pour insérer la table work_author (auteur 1)
                        $query = "INSERT INTO `work_author` (`work_id`, `author_id`) VALUES ('$workId', '$authorId')";
                        $db->query($query);

                        // Requête pour insérer la table work_author (auteur 2, si renseigné)
                        if (isset($authorId2)) {
                            $query = "INSERT INTO `work_author` (`work_id`, `author_id`) VALUES ('$workId', '$authorId2')";
                            $db->query($query);
                        }

                        // Requête pour insérer le genre 1
                        $query = "INSERT INTO `genre` (`name`) VALUES ('$genre')";
                        $db->query($query);
                        $genreId = $db->lastInsertId();

                        // Requête pour insérer le genre 2 (si renseigné)
                        if (!empty($genre2)) {
                            $query = "INSERT INTO `genre` (`name`) VALUES ('$genre2')";
                            $db->query($query);
                            $genreId2 = $db->lastInsertId();
                        }

                        // Requête pour insérer la table work_genre (genre 1)
                        $query = "INSERT INTO `work_genre` (`work_id`, `genre_id`) VALUES ('$workId', '$genreId')";
                        $db->query($query);

                        // Requête pour insérer la table work_genre (genre 2, si renseigné)
                        if (isset($genreId2)) {
                            $query = "INSERT INTO `work_genre` (`work_id`, `genre_id`) VALUES ('$workId', '$genreId2')";
                            $db->query($query);
                        }

                        // Requête pour insérer l'éditeur
                        $query = "INSERT INTO `publisher` (`name`, `published_at`) VALUES ('$publisherName', '$publisherDate')";
                        $db->query($query);
                        $publisherId = $db->lastInsertId();

                        // Requête pour insérer la table work_publisher
                        $query = "INSERT INTO `work_publisher` (`work_id`, `publisher_id`) VALUES ('$workId', '$publisherId')";
                        $db->query($query);

                        // Requête pour insérer les copies
                        $query = "INSERT INTO `copies` (`work_id`, `available_copies`, `total_copies`) VALUES ('$workId', '$availableCopies', '$totalCopies')";
                        $db->query($query);

                        $_SESSION["added"] = "Ajout réussit";
                        header("Location: edit-book.php?id=" . $workId);
                        ob_end_flush();
                        exit();
                    }
                } catch (PDOException $e) {
                    $_SESSION["notAdded"] = "Problème lors de l'ajout";
                    header("Location: edit-book.php?id=" . $workId);
                    ob_end_flush();
                    exit();
                }
                ?>


             <form action="#" method="POST" id="form-add-book">
                 <div id="form-add-book-left">
                     <!-- ... autres champs existants ... -->
                     <div class="add-form-template-label-input">
                         <label for="work-title-add" class="label-form-add-book">Titre du livre</label>
                         <input type="text" name="work-title-add" id="work-title-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-firstname-add" class="label-form-add-book">Prénom de l'autheur</label>
                         <input type="text" name="author-firstname-add" id="author-firstname-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-lastname-add" class="label-form-add-book">Nom de l'autheur</label>
                         <input type="text" name="author-lastname-add" id="author-lastname-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-genre-add" class="label-form-add-book">Genre du livre</label>
                         <input type="text" name="work-genre-add" id="work-genre-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-category-add" class="label-form-add-book">Categorie du livre</label>
                         <input type="text" name="work-category-add" id="work-category-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-publish-date-add" class="label-form-add-book">Date de publication du livre</label>
                         <input type="date" name="work-publish-date-add" id="work-publish-date-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-ISBN-add" class="label-form-add-book">ISBN (ex: ISBN 13 :874-6-2457-6478-8)</label>
                         <input type="text" name="work-ISBN-add" id="work-ISBN-add" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                     </div>
                 </div>
                 <div class="add-form-template-label-input">
                     <label for="author-firstname-add-2" class="label-form-add-book">Prénom de l'auteur (optionnel)</label>
                     <input type="text" name="author-firstname-add-2" id="author-firstname-add-2" class="input-form-add-book" />
                 </div>
                 <div class="add-form-template-label-input">
                     <label for="author-lastname-add-2" class="label-form-add-book">Nom de l'auteur (optionnel)</label>
                     <input type="text" name="author-lastname-add-2" id="author-lastname-add-2" class="input-form-add-book" />
                 </div>
                 <div class="add-form-template-label-input">
                     <label for="work-genre-add-2" class="label-form-add-book">Deuxième genre du livre (optionnel)</label>
                     <input type="text" name="work-genre-add-2" id="work-genre-add-2" class="input-form-add-book" />
                 </div>
                 <div class="add-form-template-label-input">
                     <label for="available-copies-add" class="label-form-add-book">Nombre de copies disponibles</label>
                     <input type="number" name="available-copies-add" id="available-copies-add" class="input-form-add-book" />
                 </div>
                 <div class="add-form-template-label-input">
                     <label for="total-copies-add" class="label-form-add-book">Nombre total de copies dans la bibliothèque</label>
                     <input type="number" name="total-copies-add" id="total-copies-add" class="input-form-add-book" />
                 </div>
         </div>
         <div id="form-add-book-right">
             <!-- ... autres champs existants ... -->
             <label for="work-extract-add" class="label-form-add-book">Extrait du livre</label>
             <textarea name="work-extract-add" id="work-extract"></textarea>

             <label for="work-pict" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
             <input type="text" name="work-pict-add" id="work-pict-add" class="input-form-add-book" />
         </div>
         <div class="add-form-template-label-input">
             <label for="publisher-name-add" class="label-form-add-book">Nom de l'éditeur</label>
             <input type="text" name="publisher-name-add" id="publisher-name-add" class="input-form-add-book" />
         </div>
         <div class="add-form-template-label-input">
             <label for="publisher-date-add" class="label-form-add-book">Date d'édition</label>
             <input type="date" name="publisher-date-add" id="publisher-date-add" class="input-form-add-book" />
         </div>
     </div>
     <div id="group-btn-form-add-commun">
         <input type="reset" id="btn-reset-form-add-book" name="reset" value="Reset"></input>
         <input type="submit" id="btn-submit-form-add-book" name="submit" value="Ajouter"></input>
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