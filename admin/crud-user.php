<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>



<!-- ---------- SECTION CRUD USER ---------- -->

<section id="crud-user" class="row-limit-size-db">

    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace de gestion des lecteurs</h1>
        <h2 class="h2-dashboard">Vous pouvez gérer les utilisateurs de la bibliothèque dans cet espace</h2>

        <div class="container-crud-book-tabs">
            <div id="box-crud-user" class="box-dashboard">

                <div class="search-add-crud-book">
                    <h3 class="h3-dashboard">Base de données des lecteurs</h3>
                    <div class="search-crud-input">
                        <form action="" method="post">
                            <input type="text" id="input-seach-user" class="input-search" name="text">
                            <input type="submit" id="btn-search-user" class="btn-search" name='rechercher' value="Rechercher"></input>
                            <button type="button" id="btn-all-detail">Vue détails</button>
                        </form>
                    </div>
                    <a href="#box-loan-register" type="button" id="btn-add-book" class="btn-add">Nouveau lecteur</a>
                </div>
                <div id="container-list-book-crud">
                    <ul class="list-book-crud">
                        <li class="item-book-crud">
                            <ul class="detail-item-book-crud">
                                <li class="item-pict-crud">
                                    <img src="../img/books/motogp.jpg" alt="['title']" class="pict-book-crud">
                                </li>
                                <li class="id-copy-loan">['id de la copy']</li>
                                <li class="id-user-loan">['id du lecteur']</li>
                                <li class="nb-days-loan">['nb jours restant']</li>
                                <li class="btn-option-crud" data-idWork="" data-title="" data-pict="">
                                </li>
                                <div class="container-complete-detail-info-book">
                                    <div class="container-flex-crud">
                                        <div class="item-complete-right">
                                            <h3>Fiche technique du livre</h3>
                                            <ul class="all-info-book">
                                                <li>Auteur <span class="bdd-var">['author']</span></li>
                                                <li>Genre <span class="bdd-var">['genres']</span></li>
                                                <li>Catégorie <span class="bdd-var">['category']</span></li>
                                                <li>Date de publication <span class="bdd-var">['published']</span></li>
                                                <li> Nom de l'éditeur<span class="bdd-var">['editors']</span></li>
                                                <li>Date de l'édition<span class="bdd-var">['edition_date']</span></li>
                                                <li>Nombre d'exemplaires<span class="bdd-var">['count work id']</span></li>
                                                <li>ISBN<span class="bdd-var">['ISBN']</span></li>
                                            </ul>
                                        </div>
                                        <div class="item-complete-left">
                                            <h3>Détail du lecteur</h3>
                                            <ul class="all-info-user">
                                                <li>Prénom <span class="bdd-var">['firstname']</span></li>
                                                <li>Nom <span class="bdd-var">['lastname']</span></li>
                                                <li>Email<span class="bdd-var">['email']</span></li>
                                                <li>Adresse <span class="bdd-var">['adress']</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <li class="container-box-option-crud">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<script src="../js/main-admin.js"></script>
</body>

</html>