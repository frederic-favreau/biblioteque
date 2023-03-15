<?php include_once '../front/header-default.php';

include_once '../connexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog biblook</title>
    <link rel="stylesheet" href="../css/style-blog.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <main>
        <section id="section-article" class="row-limit-size">
            <div id="containerballons">
                <h1>Journée Portes Ouvertes</h1>
            </div>
            <h2>
                Bibliothèque Biblook<br>
                Saint-Denis-les-Bourg
            </h2>
            <h3> Mercredi 21 Juin 2023<br> de 10h à 17h</h3>

            <div id="containerpub1">
                <p>Entrée gratuite</p>
            </div>
            <div id="containerpub2">
                <p>Ouvert à tous</p>
            </div>


            <div id="descriptif">
                <ul>
                    <li>Visite guidée</li>
                    <li>Vente de livres</li>
                    <li>Atelier lecture pour les enfants</li>
                </ul>
            </div>
        </section>
    </main>
</body>
<?php 
include_once '../front/footer-default.php';
?>
</html>