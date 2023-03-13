 <?php
    include_once '../admin/header-main.php';
    require_once '../connexion.php';
    $id = $_SESSION['id-user']
    
    
    ?>

 <!-- ---------- SECTION DASHBOARD - PAGE DEFAULT ---------- -->


 <section id="dashboard-page-default" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue <?=$_SESSION['firstname']?> dans votre tableau de bord</h1>

         <h2 class="h2-dashboard">Voici le suivi de vos activités</h2>

         <div class="container-home-tabs">
             <div id="box-loan" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en cours d'emprunt</h3>
                 <hr>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
             </div>
             <div id="box-whish-list" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en favoris</h3>
                 <hr>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
             </div>
             <div id="box-reco-list" class="box-dashboard">
                 <h3 class="h3-dashboard">Les livres recommandés par Biblook</h3>
                 <hr>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
             </div>


             <div id="box-history" class="box-dashboard">
                 <h3 class="h3-dashboard">Historique de mes emprunts</h3>
                 <hr>
                 <ul>
                     <li><a href="#"></a>Vous n'avez pas encore emprunté de livre</li>
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
                             <label for="firstname" class="label-fullname">Prénom</label>
                             <input type="text" name="firstname" id="firstname" class="input-fullname" value="<?=$_SESSION['firstname']?>" />
                         </div>
                         <div id="laststname">
                             <label for="lastname">Nom</label>
                             <input type="text" name="lastname" id="lastname" class="input-fullname" value="<?= $_SESSION['lastname']?>"/>
                         </div>
                     </div>
                     <div id="email">
                         <label for="input-mail" id="label-email">Email</label>
                         <input type="email" name="mail" id="input-mail" value="<?=$_SESSION['mail']?>" />
                     </div>
                     <div id="location">
                         <label for="input-location" id="label-location">Adresse de votre résidence</label>
                         <input type="text" id="location" id="input-location" name="adress">
                     </div>

                     <div id="password">
                         <label for="password" id="label-password">Votre mot de passe</label>
                         <input type="password" name="password" id="input-password" placeholder="Password" />
                     </div>
                     <?php 
                            
                     
                     
                     ?>
                     <div id="group-btn-form">
                         <button type="reset" id="btn-reset">Reset</button>
                         <button type="submit" id="btn-submit" name="modifier">Modifier</button>
                        <?php if(isset($_POST['modifier'])){
                            $mail= $_POST['mail'];
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


 <section id="dashboard-page-crud-book" class="row-limit-size-db">
     <div class="container-dashboard-base" id="container-dashboard-modified">
         <h1 class="h1-dashboard">Bienvenue ['prenom'] dans votre gestion des livres</h1>

         <h2 class="h2-dashboard">Vous pouvez ajouter, supprimer et modifier l'ensemble des livres de la bibliothèque</h2>

         <div class="container-crud-book-tabs">
             <div id="box-crud-book" class="box-dashboard">
                 <h3 class="h3-dashboard">Les livres de la bibliothèque Biblook</h3>
                 <hr>
                 <div class="info-crud-book">
                     <input type="text">
                     <button type="submit">Rechercher</button>
                 </div>
                 <ul id="info-top-crud">
                     <li>Titre du livre</li>
                     <li>Auteur</li>
                     <li>Edition</li>
                     <li>Status</li>
                     <li>Nb d'exemplaire</li>
                 </ul>


                 <ul class="list-book-box">
                     <li class="list-book">
                         <div class="wish-list-book">
                             <img src="../img/books/ça.jpg" class="pict-book-wish" alt="['titre']">
                             <ul class="container-description-wish">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-loan-wish">
                             <p class="info-disponibility-wish">['disponible sous 3 heures']</p>
                             <a href="#" class="btn-loan-wish">Emprunter maintenant</a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
         </main>
         <script src="./main-admin.js"></script>
         </body>

         </html>