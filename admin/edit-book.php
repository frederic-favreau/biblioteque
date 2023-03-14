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
            try {
                $id = $_GET['id'];
                if (isset($_POST['submit'])) {
                    $title = addslashes($_POST['work-title-edit']);
                    $authorFirstname = addslashes($_POST['author-firstname-edit']);
                    $authorLastname = addslashes($_POST['author-lastname-edit']);
                    $genre = addslashes($_POST['work-genre-edit']);
                    $publishedDate = addslashes($_POST['work-publish-date-edit']);
                    $ISBN = addslashes($_POST['work-ISBN-edit']);
                    $extract = addslashes($_POST['work-extract-edit']);
                    $workPict = addslashes($_POST['work-pict-edit']);

                    $reqBookNewedit = $db->prepare("UPDATE `work` SET `title` = $title,`author`.`lastname` = $authorLastname, `author`.`firstname` = $authorFirstname, `genre`.`name` = $genre ,`published_at` = $publishedDate, `ISBN` = $ISBN, `pict` = $workPict,`extract` = $extract,
                        JOIN `work_author` ON `work`.`id_work` = `work_author`.`work_id`
                        JOIN `author` ON `work_author`.`author_id` = `author`.`id_author`  
                        JOIN `work_genre` ON `work`.`id_work` = `work_genre`.`work_id`    
                        JOIN `genre` ON `work_genre`.`genre_id` = `genre`.`id_genre`      
                        WHERE `work`.`id_work`= :id");
                    $reqBookNewedit->bindParam('id', $id, PDO::PARAM_INT);
                    $reqBookNewedit->execute();

                    $_SESSION["modified"] = "Votre article a bien été modifié";
                    header("Location: dashboard.php?id=" . $id . '#dashboard-page-book-edit');
                    exit();
                }
            } catch (PDOException $e) {
                $_SESSION["notModified"] = "Votre article n'a pas été modifié";
                header("Location: dashboard.php?id=" . $id . '#dashboard-page-book-edit');
                exit();
            }
            ?>


            <?php
            $id = $_GET['id'];
            $req_book = $db->prepare("SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, `published_at`, `ISBN`,`author`.`lastname`, `author`.`firstname`, `genre`.`name`FROM `work`
                INNER JOIN `work_genre`
                ON `work`.`id_work` = `work_genre`.`work_id`
                INNER JOIN `genre`
                ON `work_genre`.`genre_id` =`genre`.`id_genre`
                INNER JOIN `work_author`
                ON `work_author`.`work_id` = `work`.`id_work`
                INNER JOIN `author`
                ON `work_author`.`author_id` = `author`.`id_author`
                WHERE `id_work` = :id");
            $req_book->bindParam('id', $id, PDO::PARAM_INT);
            $req_book->execute();
            $book = $req_book->fetch(PDO::FETCH_ASSOC);
            ?>


            <form action="#" id="form-book-edit">
                <div id="form-book-edit-left">
                    <div class="add-form-template-label-input">
                        <label for="work-title-edit" class="label-form-add-book">Titre du livre</label>
                        <input type="text" name="work-title" id="work-title-edit" class="input-form-add-book" value="<?= $book['title'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="author-firstname-edit" class="label-form-add-book">Prénom de l'autheur</label>
                        <input type="text" name="author-firstname-edit" id="author-firstname-edit" class="input-form-add-book" value="<?= $book['firstname'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="author-lastname-edit" class="label-form-add-book">Nom de l'autheur</label>
                        <input type="text" name="author-lastname-edit" id="author-lastname-edit" class="input-form-add-book" value="<?= $book['lastname'] ?>" />
                    </div>

                    <div class="add-form-template-label-input">
                        <label for="work-genre-edit" class="label-form-add-book">Genre du livre</label>
                        <input type="text" name="work-genre-edit" id="work-genre-edit" class="input-form-add-book" value="<?= $book['name'] ?>" />
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
                        <label for="work-category-edit" class="label-form-add-book">Categorie du livre</label>
                        <input type="text" name="work-category" id="work-category-edit" class="input-form-add-book" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-publish-date-edit" class="label-form-add-book">Date de publication du livre</label>
                        <input type="date" name="work-publish-date-edit" id="work-publish-date-edit" class="input-form-add-book" value="<?= $book['published_at'] ?>" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="work-ISBN-edit" class="label-form-add-book">ISBN (ex: ISBN 13 :874-6-2457-6478-8) </label>
                        <input type="text" name="work-ISBN-edit" id="work-ISBN-edit" class="input-form-add-book" value="<?= $book['ISBN'] ?>" />
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
                    <button type="reset" id="btn-reset-form-add-book">Reset</button>
                    <button type="submit" id="btn-submit-form-add-book">Modifier</button>
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