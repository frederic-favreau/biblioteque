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
                 <ul>
                     <li><a href="#"></a>Vous n'avez pas encore ajouté de favoris</li>
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
                             <label for="firstname">Prénom</label>
                             <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" />
                         </div>
                         <div id="laststname">
                             <label for="latstname">Nom</label>
                             <input type="text" name="lastname" id="lastname" placeholder="Votre nom" />
                         </div>
                     </div>
                     <div id="email">
                     <label for="mail">Email</label>
                     <input type="email" name="mail" id="mail" placeholder="Email" />
                     </div>
                     <div id="location">
                        <label for="location">Adresse de votre résidence</label>
                        <input type="text" id="location">
                     </div>
                     <input type="password" name="password" placeholder="Password" />
                     <button type="submit">Se connecter</button>
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