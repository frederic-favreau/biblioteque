 <?php
    include_once '../admin/header-main.php';
    ?>

 <section id="dashboard-page-default">
     <div id="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue ['prenom'] dans votre tableau de board</h1>

         <h2 class="h2-dashboard">Voici le suivi de vos activités</h2>

         <div id="container-home-tabs">
             <div id="box-emprunt" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en cours d'emprunt</h3>
                 <hr>
                 <ul>
                     <li><a href="#"></a>Vous n'avez pas encore emprunté de livre</li>
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
             <div id="box-history" class="box-dashboard">
                 <h3 class="h3-dashboard">Historique de mes emprunts</h3>
                 <hr>
                 <ul>
                     <li><a href="#"></a>Vous n'avez pas encore emprunté de livre</li>
                 </ul>
             </div>
         </div>

         <div id="container-profil-tabs">
             <div id="box-personal-info" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes informations </h3>
                 <hr>
                 <form action="#" id="form-personal-info">
                     <div id="container-fullname">
                         <div id="firstname">
                             <label for="firstname" class="label-fullname">Prénom</label>
                             <input type="text" name="firstname" id="firstname" class="input-fullname" placeholder="Votre prénom" />
                         </div>
                         <div id="laststname">
                             <label for="latstname">Nom</label>
                             <input type="text" name="lastname" id="lastname" placeholder="Votre nom" class="input-fullname" />
                         </div>
                     </div>
                     <div id="email">
                         <label for="input-mail" id="label-email">Email</label>
                         <input type="email" name="mail" id="input-mail" placeholder="Email" />
                     </div>
                     <div id="location">
                         <label for="input-location" id="label-location">Adresse de votre résidence</label>
                         <input type="text" id="location" id="input-location">
                     </div>

                     <div id="password">
                         <label for="password" id="label-password">Votre mot de passe</label>
                         <input type="password" name="password" id="input-password" placeholder="Password" />
                     </div>
                     <div id="group-btn-form">
                         <button type="reset" id="btn-reset">Reset</button>
                         <button type="submit" id="btn-submit">Modifier</button>
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
 </main>
 <script src="./main-admin.js"></script>
 </body>

 </html>