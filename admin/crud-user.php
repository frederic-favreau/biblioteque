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
                                <li class="id-crud-user">['id de l'user']</li>
                                <li class="firstname-crud-user">['firstname-user']</li>
                                <li class="lastname-crud-user">['lastname-user']</li>
                                <li class="mail-crud-user">['Email du user']</li>
                                <li class="btn-option-crud" data-idWork="" data-title="" data-pict="">
                                </li>
                                <div class="container-complete-detail-info-book">
                                    <div class="container-flex-crud">
                                        <div class="item-complete-center">
                                            <h3>Histoire des emprunts du client</h3>
                                            <ul class="all-info-history-loan">
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                        <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                    </ul>
                                                </li>
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <li class="container-box-option-crud">
                            </ul>
                        </li>
                        <li class="item-book-crud">
                            <ul class="detail-item-book-crud">
                                <li class="id-crud-user">['id de l'user']</li>
                                <li class="firstname-crud-user">['firstname-user']</li>
                                <li class="lastname-crud-user">['lastname-user']</li>
                                <li class="mail-crud-user">['Email du user']</li>
                                <li class="btn-option-crud" data-idWork="" data-title="" data-pict="">
                                </li>
                                <div class="container-complete-detail-info-book">
                                    <div class="container-flex-crud">
                                        <div class="item-complete-center">
                                            <h3>Histoire des emprunts du client</h3>
                                            <ul class="all-info-history-loan">
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                        <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                    </ul>
                                                </li>
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <li class="container-box-option-crud">
                            </ul>
                        </li>
                        <li class="item-book-crud">
                            <ul class="detail-item-book-crud">
                                <li class="id-crud-user">['id de l'user']</li>
                                <li class="firstname-crud-user">['firstname-user']</li>
                                <li class="lastname-crud-user">['lastname-user']</li>
                                <li class="mail-crud-user">['Email du user']</li>
                                <li class="btn-option-crud" data-idWork="" data-title="" data-pict="">
                                </li>
                                <div class="container-complete-detail-info-book">
                                    <div class="container-flex-crud">
                                        <div class="item-complete-center">
                                            <h3>Histoire des emprunts du client</h3>
                                            <ul class="all-info-history-loan">
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                        <li class="btn-option-crud" data-idWork="['id_work']" data-title="['title']" data-pict="['pict']"><img src="../img/picto/magic-wand-02.svg" alt="Crayon">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                    </ul>
                                                </li>
                                                <li class="loan-history-row">
                                                    <ul class="item-loan-history-row">
                                                        <li class="pict-crud-user">
                                                            <img src="../img/books/24 Heures du Mans- 1923 -2023.jpg" alt="['title']" class="pict-book-crud">
                                                        </li>
                                                        <li class="title-crud-user"> ['title'] </li>
                                                        <li class="id-copy-crud-user">['id-copy']</li>
                                                        <li class="date-start-crud-user">['date debut d'emprunt']</li>
                                                        <li class="date-close-crud-user">['date de retour']</li>
                                                    </ul>
                                                </li>
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