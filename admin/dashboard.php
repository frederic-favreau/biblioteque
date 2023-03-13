 <?php
    include_once '../admin/header-main.php';
    ?>



 <!-- ---------- SECTION DASHBOARD - PAGE DEFAULT ---------- -->


 <section id="dashboard-page-default" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue <?= $_SESSION['firstname'] ?> dans votre tableau de bord</h1>

         <h2 class="h2-dashboard">Voici le suivi de vos activités</h2>

         <div class="container-home-tabs">



             <!-- ---------- BOX LOAN---------- -->


             <div id="box-loan" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en cours d'emprunt</h3>
                 <hr>
                 <ul class="list-book-box">
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['Il vous reste x jours']</p>
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['Il vous reste x jours']</p>
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['Il vous reste x jours']</p>
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                 </ul>
             </div>



             <!-- ---------- BOX WISH LIST ---------- -->


             <div id="box-whish-list" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en favoris</h3>
                 <hr>
                 <ul class="list-book-box">
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
             </div>



             <!-- ---------- BOX RECO ---------- -->


             <div id="box-reco-list" class="box-dashboard">
                 <h3 class="h3-dashboard">Les livres recommandés par Biblook</h3>
                 <hr>
                 <ul class="list-book-box">
                     <li class="item-list-book">
                         <div class="format-pict-book ">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book ">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book ">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book ">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
             </div>



             <!-- ---------- BOX HISTORY---------- -->


             <div id="box-history" class="box-dashboard">
                 <h3 class="h3-dashboard">Historique de mes emprunts</h3>
                 <hr>
                 <ul>
                     <li class="empty"><a href="#"></a>Vous n'avez pas encore emprunté de livre</li>
                 </ul>
             </div>
         </div>
     </div>
 </section>



 <!-- ---------- SECTION DASHBOARD - PAGE PROFIL ---------- -->


 <section id="dashboard-page-profil" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue ['prenom'] dans votre profil</h1>

         <h2 class="h2-dashboard">Vous pouvez modifier l'ensemble de vos données</h2>

         <div id="container-profil-tabs">

             <div id="box-personal-info" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes informations </h3>
                 <hr>
                 <form action="#" method="post" id="form-personal-info">
                     <div id="container-fullname">
                         <div id="firstname">
                             <label for="firstname" class="label-form-profil">Prénom</label>
                             <input type="text" name="firstname" id="firstname" class="input-fullname" value="<?= $_SESSION['firstname'] ?>" />
                         </div>
                         <div id="laststname">
                             <label for="lastname" class="label-form-profil">Nom</label>
                             <input type="text" name="lastname" id="lastname" class="input-fullname" value="<?= $_SESSION['lastname'] ?>" />
                         </div>
                     </div>
                     <div id="email">
                         <label for="input-mail" class="label-form-profil">Email</label>
                         <input type="email" name="mail" id="input-mail" value="<?= $_SESSION['mail'] ?>" />
                     </div>
                     <div id="location">
                         <label for="input-location" class="label-form-profil">Adresse de votre résidence</label>
                         <input type="text" id="location" id="input-location" name="adress">
                     </div>

                     <div id="password">
                         <label for="password" class="label-form-profil">Votre mot de passe</label>
                         <input type="password" name="password" id="input-password" placeholder="Password" />
                     </div>
                     <?php


                        ?>
                     <div id="group-btn-form">
                         <button type="reset" id="btn-reset">Reset</button>
                         <button type="submit" id="btn-submit" name="modifier">Modifier</button>
                         <?php if (isset($_POST['modifier'])) {
                                $mail = $_POST['mail'];
                                $password = $_POST['password'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                                $adress = $_POST['adress'];

                                $req = $db->prepare('UPDATE `user`SET `firstname` = :firstname, `lastname` = :lastname, `mail` = :mail,`password` = :password, `adress` = :adress
                            WHERE `id_user` = :id');

                                $req->bindParam('firstname', $firstname, PDO::PARAM_STR);
                                $req->bindParam('id', $id, PDO::PARAM_INT);
                                $req->bindParam('mail', $mail, PDO::PARAM_STR);
                                $req->bindParam('lastname', $lastname, PDO::PARAM_STR);
                                $req->bindParam('password', $passwordHashed, PDO::PARAM_STR);
                                $req->bindParam('adress', $adress, PDO::PARAM_STR);
                                $req->execute();
                            }


                            ?>
                     </div>
                 </form>
             </div>
             <div id="box-personal-profil-theme" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes préférences de profil</h3>
                 <hr>
                 <select name="sort-pict-profil" id="sort-pict-profil">
                     <option value="">-- Choisissez une image de profil--</option>
                     <option value="alphabetical">['Choix A']</option>
                     <option value="date">['Choix B']</option>
                     <option value="Disponibility">['Choix C']</option>
                 </select>
                 <select name="sort-theme-profil" id="sort-theme-profil">
                     <option value="">-- Choisissez une image de profil--</option>
                     <option value="alphabetical">['Choix A']</option>
                     <option value="date">['Choix B']</option>
                     <option value="Disponibility">['Choix C']</option>
                 </select>
             </div>
         </div>
     </div>
 </section>



 <!-- ---------- SECTION DASHBOARD - PAGE CRUD BOOK ---------- -->


 <?php
    include_once '../connexion.php';
    ?>

 <section id="dashboard-page-book-crud" class="row-limit-size-db">
     <div class="container-dashboard-base" id="container-dashboard-modified">
         <h1 class="h1-dashboard">Bienvenue ['prenom'] dans votre gestion des livres</h1>

         <h2 class="h2-dashboard">Vous pouvez ajouter, supprimer et modifier l'ensemble des livres de la bibliothèque</h2>

         <div class="container-crud-book-tabs">
             <div id="box-crud-book" class="box-dashboard">
                 <h3 class="h3-dashboard">Les livres de la bibliothèque Biblook</h3>
                 <hr>
                 <div class="search-add-crud-book">
                     <div class="search-crud-input">
                         <input type="text" id="input-seach-book">
                         <button type="submit" id="btn-search-book">Rechercher</button>
                         <button type="button" id="btn-all-detail">Vue détails</button>
                     </div>
                     <a href="#dashboard-page-book-add" type="button" id="btn-add-book">Ajouter un livre</a>
                 </div>
                 <div id="container-list-book-crud">
                     <ul class="list-book-crud">
                         <?php
                            $reqAskCrud = ("SELECT `pict`, `title`, `id_work`, `extract`, `published_at`, `ISBN`, CONCAT(`author`.`firstname`, ' ', `author`.`lastname`) as `author`, `id_work` FROM `work` INNER JOIN `work_author` ON `work_author`.`work_id` = `work`.`id_work` INNER JOIN `author` ON `work_author`.`author_id` = `author`.`id_author` ORDER BY `work`.`title` ASC");
                            $reqCrud = $db->query($reqAskCrud);
                            while ($crud = $reqCrud->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                             <li class="item-book-crud">
                                 <ul class="detail-item-book-crud">
                                     <li class="item-pict-crud">
                                         <img src="../img/books/<?= $crud['pict'] ?>" alt="<?= $crud['title'] ?>" class="pict-book-crud" onclick="centrerImage(this)">
                                     </li>
                                     <li class="item-title-crud"> <?= $crud['title'] ?></li>
                                     <li class="item-author-crud"><?= $crud['author'] ?></li>
                                     <!-- <li class="item-status-crud">['status']</li> -->
                                     <!-- <li class="item-copy-crud">['nb copy']</li> -->
                                     <li class="btn-option-crud" data-idWork="<?= $crud['id_work'] ?>" data-title="<?= $crud['title'] ?>" data-pict="<?= $crud['pict'] ?>">⚙️
                                     </li>
                                     <div class="container-complete-detail-info-book">
                                         <div class="container-flex-crud">
                                             <div class="item-complete-right">
                                                 <h3>Fiche technique</h3>
                                                 <ul class="all-info-book">
                                                     <li>Auteur <span class="bdd-var"><?= $crud['author'] ?></span></li>
                                                     <li>Genre <span class="bdd-var">['genres'] </span></li>
                                                     <li>Catégorie <span class="bdd-var">['category']</span></li>
                                                     <li>Date de publication <span class="bdd-var"><?= $crud['published_at'] ?></span></li>
                                                     <li> Nom de l'éditeur<span class="bdd-var">['editor name']</span></li>
                                                     <li>Date de l'édition<span class="bdd-var">['editor date']</span></li>
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
                                         <div class="box-option-crud">
                                             <h4>Options du livre</h4>
                                             <ul class="list-option-crud">
                                                 <li id="more-detail-book-crud">
                                                 <li>Editer ses données</li>
                                                 <li>Supprimer cet ouvrage</li>
                                             </ul>
                                         </div>
                                     </li>
                                 </ul>

                             </li>
                         <?php
                            }
                            ?>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </section>



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



 <!-- ---------- SECTION DASHBOARD - PAGE EDIT BOOK ---------- -->


 <section id="dashboard-page-book-edit" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue dans l'espace d'ajout de livres</h1>
         <h2 class="h2-dashboard">Vous pouvez modifier des livres dans la bibliothèque</h2>
         <div id="box-edit-book-info" class="box-dashboard">
             <h3 class="h3-dashboard">Modification d'un livre dans la base de données</h3>
             <hr>
             <form action="#" id="form-book-edit">
                 <div id="form-book-edit-left">
                     <div class="add-form-template-label-input">
                         <label for="work-title-edit" class="label-form-add-book">Titre du livre</label>
                         <input type="text" name="work-title" id="work-title-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-firstname-edit" class="label-form-add-book">Prénom de l'autheur</label>
                         <input type="text" name="author-firstname" id="author-firstname-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="author-lastname-edit" class="label-form-add-book">Nom de l'autheur</label>
                         <input type="text" name="author-lastname" id="author-lastname-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-genre-A-edit" class="label-form-add-book">Genre A du livre</label>
                         <input type="text" name="work-genre-A" id="work-genre-A-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-genre-B-edit" class="label-form-add-book">Genre B du livre</label>
                         <input type="text" name="work-genre-B" id="work-genre-B-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-category-edit" class="label-form-add-book">Categorie du livre</label>
                         <input type="text" name="work-category" id="work-category-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-publish-date-edit" class="label-form-add-book">Date de publication du livre</label>
                         <input type="date" name="work-publish-date" id="work-publish-date-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="work-ISBN-edit" class="label-form-add-book">ISBN (ex: ISBN 13 :874-6-2457-6478-8) </label>
                         <input type="text" name="work-ISBN" id="work-ISBN-edit" class="input-form-add-book" />
                     </div>
                     <div class="add-form-template-label-input">
                     </div>
                 </div>
                 <div id="form-book-edit-right">
                     <label for="work-extract-edit" class="label-form-add-book">Extrait du livre</label>
                     <textarea name="work-extract-edit" id="work-extract"></textarea>

                     <label for="work-pict-edit" class="label-form-add-book">Nom de l'image de couverture (ajouter le format au nom)</label>
                     <input type="text" name="work-pict" id="work-pict-edit" class="input-form-add-book" />
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