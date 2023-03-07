<?php include_once '../front/header-default.php'; ?>

<main>
    <ul id="Breadcrumb" class="row-limit-size">
        <li><a href="../index.php">Accueil</a></li>
        <li>></li>
        <li><a href="./catalog.php#section-catalog">Catalogue</a></li>
        <li>></li>
        <li><a href="#">livre de ma recherche</a></li>
    </ul>


    <section id="section-detail-book" class="row-limit-size">
        <div id="container-detail-book">
            <div class="item-detail-book-left">
                <div class="book-new">['new']</div>
                <h1 class="title-work">['title work']</h1>
                <p class="author">['author']</p>
                <img src="../img/books/ça.jpg" alt="Titre du livre ici">
                <h2>Extrait du livre</h2>
                <p class="extract-work">['extract']</p>
                <h3>Fiche technique</h3>
                <ul class="all-info-book">
                    <li>Auteur <span class="bdd-var">['author']</span></li>
                    <li>Genre <span class="bdd-var">['genre']</span></li>
                    <li>Catégorie <span class="bdd-var">['category']</span></li>
                    <li>Date de publication <span class="bdd-var">['publish_at']</span></li>
                    <li> Nom de l'éditeur<span class="bdd-var">['editor name']</span></li>
                    <li>Date de l'édition<span class="bdd-var">['editor date']</span></li>
                    <li>ISBN<span class="bdd-var">['isbn']</span></li>
                </ul>
            </div>
            <div id="item-detail-book-right">
                <h4 class="title-work-description">['title work']</h4>
                <ul class="info-work-description">
                    <li>Auteur <span>['author']</span></li>
                    <li>Catégorie <span>['genre']</span></li>
                    <li>Date de publication <span>['publish_at']</span></li>
                </ul>
                <hr>
                <ul class="list-info-revervation">
                    <li>['Livre disponible en bibliothèque']</li>
                    <li>A retirer à Biblook sous 3 heures</li>
                </ul>
                <a href="#" id="btn-reservation">Réserver ce livre</a>
                <hr>
                <div id="service">
                    <div id="item-service-left">
                        <img src="" alt="">
                    </div>
                </div>
            </div>

        </div>

    </section>
</main>
<script src="../main.js"></script>
</body>
<?php include_once '../front/footer-default.php'; ?>

</html>