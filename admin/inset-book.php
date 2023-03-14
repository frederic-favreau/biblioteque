<?php
include_once '../admin/header-main.php';
require_once '../connexion.php';
?>


<!-- ---------- SECTION DASHBOARD - PAGE ADD BOOK ---------- -->


<section id="dashboard-page-book-add" class="row-limit-size-db">
    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace d'ajout de livres</h1>
        <h2 class="h2-dashboard">Vous pouvez ajouter des livres dans la bibliothèque</h2>
        <div id="box-add-book-info" class="box-dashboard">
            <h3 class="h3-dashboard">Ajout d'un livre dans la base de données</h3>
            <hr>

            <?php
            if (isset($_POST['submit'])) {
                $title = addslashes($_POST['work-title']);
                $authorFirstname = addslashes($_POST['author-firstname']);
                $authorLastname = addslashes($_POST['author-lastname']);
                $genreA = addslashes($_POST['work-genre-A']);
                $genreB = addslashes($_POST['work-genre-B']);
                $category = addslashes($_POST['work-category']);
                $publishDate = addslashes($_POST['work-publish-date']);
                $isbn = addslashes($_POST['work-ISBN']);
                $extract = addslashes($_POST['work-extract']);
                $workPict = addslashes($_POST['work-pict']);


                $sqlAdd = "INSERT INTO work(`title`, `pict`, `extract`, `published_at`, `ISBN`)
                    VALUES ('$title', '$pict', '$extract', '$publishDate', '$isbn')";
                "INSERT INTO author(`lastname`, `firstname`)
                    VALUES ('$authorLastname', '$authorFirstname')";
                "INSERT INTO genre(`name`)
                    VALUES ('$genreA'), ('$genreB')";
                "INSERT INTO category(`name`)
                    VALUES ('$category')";

                "INSERT INTO work_author(`work_id`, `author_id`)
                    VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_author FROM author WHERE lastname = '$authorLastname' AND firstname = '$authorFirstname'))";

                "INSERT INTO work_genre(`work_id`, `genre_id`)
                    VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_genre FROM genre WHERE name = '$genreA'))";

                "INSERT INTO work_genre(`work_id, genre_id`)
                    VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_genre FROM genre WHERE name = '$genreB'))";

                "INSERT INTO work_category(`id_category`, `id_work`)
                    VALUES ((SELECT id_category FROM category WHERE name = '$category'), (SELECT id_work FROM work WHERE title = '$title'))";

                $db->query($sqlAdd);
            }
            ?>

            <form action="#" method="POST" id="form-add-book">
                <div id="form-add-book-left">
                    <div class="add-form-template-label-input">
                        <label for="work-title" class="label-form-add-book">Titre du livre</label>
                        <input type="text" name="work-title" id="work-title" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="author-firstname" class="label-form-add-book">Prénom de l'autheur</label>
                        <input type="text" name="author-firstname" id="author-firstname" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="author-lastname" class="label-form-add-book">Nom de l'autheur</label>
                        <input type="text" name="author-lastname" id="author-lastname" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-genre-A" class="label-form-add-book">Genre A du livre</label>
                        <input type="text" name="work-genre-A" id="work-genre-A" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-genre-B" class="label-form-add-book">Genre B du livre</label>
                        <input type="text" name="work-genre-B" id="work-genre-B" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-category" class="label-form-add-book">Categorie du livre</label>
                        <input type="text" name="work-category" id="work-category" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-publish-date" class="label-form-add-book">Date de publication du livre</label>
                        <input type="date" name="work-publish-date" id="work-publish-date" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-ISBN" class="label-form-add-book">ISBN (ex: ISBN 13 :874-6-2457-6478-8)</label>
                        <input type="text" name="work-ISBN" id="work-ISBN" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                    </div>
                </div>
                <div id="form-add-book-right">
                    <label for="work-extract" class="label-form-add-book">Extrait du livre</label>
                    <textarea name="work-extract" id="work-extract"></textarea>

                    <label for="work-pict" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
                    <input type="text" name="work-pict" id="work-pict" class="input-form-add-book" />
                </div>
                <div id="group-btn-form-add-commun">
                    <button type="reset" id="btn-reset-form-add-book">Reset</button>
                    <button type="submit" id="btn-submit-form-add-book">Ajouter</button>
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