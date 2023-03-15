<?php include_once '../front/header-default.php';

include_once '../connexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog biblook</title>
    <link rel="stylesheet" href="../css/style-blog2.css">
</head>

<body>

    <main>
        <section id="section-article" class="row-limit-size">
            <img src="../img/books/Les_chevaux_ne_mentent_jamais.jpg">
            <h1>Chis Irwin</h1>
            <h2>Les chevaux ne mentent jamais</h2>

            <div id="containeravis">
                <p>Avis</p>
                <img src="../img/photosblog/etoiles.png">    
            </div>

            <div id="date">
                <p>29 juillet 2023</p>
            </div>

            <div id="containernom">
                <img src="../img/photosblog/stephanie.png">    
                <p>Stéphanie Bouché<br>Sermoyer</p>
            </div>

            <div id="texte">
                <p>“Chercher à communiquer avec les chevaux nous en révèle beaucoup sur soi-même.<br>
                    Analyse du language corporel, technique simples sur le dressage sans résistances.<br>
                    Je me suis dirigé sur ce livre pour travailler mon cheval, l’auteur étant le meilleur dresseur Canadien et très réputé.<br>
                    Ce livre m’as permise de prendre confiance en moi et de mieux comprendre mon cheval.<br>
                    Un travail bénéfique en duo.<br>
                    Grâce à son livre sur les séances de comportement équin j’ai trouvé une façon de renforcer la relation entre nous deux”.</p>

            </div>

        </section>
        <hr>
        
        <section id="section-article2" class="row-limit-size">
            <h1>Lettre aux écolos: Comment bien s'informer?</h1>
            <img src="../img/photosblog/ecolo.png">
            <p>
                “Le 03 février 2023, <br>
                les écolos se sont rassemblés <br>
à la bibliothèque afin de partager leurs connaissances <br>
et d’aider à choisir sa lecture afin de préserver notre planète.” 
            </p>
            <h2>Voici le choix des ouvrages:</h2>
            <div id="photo1">
            <img src="../img/photosblog/livre_ecolo1.png">
            </div>
            <div id="photo2">
            <img src="../img/photosblog/livre_ecolo2.png">
            </div>
            <div id="photo3">
            <img src="../img/photosblog/livre_ecolo3.png">
            </div>
        </section>
    </main>

</body>
<?php 
include_once '../front/footer-default.php';
?>
</html>