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
            if (isset($_POST['submit'])) {
                $title = addslashes($_POST['work-title-add']);
                $authorFirstname = addslashes($_POST['author-firstname-add']);
                $authorLastname = addslashes($_POST['author-lastname-add']);
                $genre = addslashes($_POST['work-genre-add']);
                $category = addslashes($_POST['work-category-add']);
                $publishedDate = addslashes($_POST['work-publish-date-add']);
                $ISBN = addslashes($_POST['work-ISBN-add']);
                $extract = addslashes($_POST['work-extract-add']);
                $workPict = addslashes($_POST['work-pict-add']);

                // Requête pour insérer le livre
                $query = "INSERT INTO `work` (`title`, `published_at`, `ISBN`, `extract`, `pict`) VALUES ('$title', '$publishedDate', '$ISBN', '$extract', '$workPict')";
                $db->query($query);
                $workId = $db->lastInsertId();

                // Requête pour insérer l'auteur
                $query = "INSERT INTO `author` (`firstname`, `lastname`) VALUES ('$authorFirstname', '$authorLastname')";
                $db->query($query);
                $authorId = $db->lastInsertId();

                // Requête pour insérer la table work_author
                $query = "INSERT INTO `work_author` (`work_id`, `author_id`) VALUES ('$workId', '$authorId')";
                $db->query($query);

                // Requête pour insérer le genre
                $query = "INSERT INTO `genre` (`name`) VALUES ('$genre')";
                $db->query($query);
                $genreId = $db->lastInsertId();

                // Requête pour insérer la table work_genre
                $query = "INSERT INTO `work_genre` (`work_id`, `genre_id`) VALUES ('$workId', '$genreId')";
                $db->query($query);
            }
            ?>


            <form action="#" method="POST" id="form-add-book">
                <div id="form-add-book-left">
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
                        <label for="work-genre-add" class="label-form-add-book">Genre A du livre</label>
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
                <div id="form-add-book-right">
                    <label for="work-extract-add" class="label-form-add-book">Extrait du livre</label>
                    <textarea name="work-extract-add" id="work-extract"></textarea>

                    <label for="work-pict" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
                    <input type="text" name="work-pict-add" id="work-pict-add" class="input-form-add-book" />
                </div>
                <div id="group-btn-form-add-commun">
                    <input type="reset" id="btn-reset-form-add-book" name="reset" value="Reset"></input>
                    <input type="submit" id="btn-submit-form-add-book" name="submit" value="Ajouter"></input>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</section>

</main>
<script src="../js/main-admin.js"></script>
</body>

</html>