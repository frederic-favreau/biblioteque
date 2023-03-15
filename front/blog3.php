<?php include_once '../front/header-default.php';
include_once '../connexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog biblook</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>

<body>

    <main>
        <section id="section-article" class="row-limit-size">
            <img src="../img/books/bonjour keto.png">
            <h1>Nelly Genisson</h1>
            <h2>Régime Kéto</h2>

            <div id="containeravis">
                <p>Avis</p>
                <img src="../img/photosblog/etoiles.png">    
            </div>

            <div id="date">
                <p>03 janvier 2023</p>
            </div>

            <div id="containernom">
                <img src="../img/photosblog/jane.png">    
                <p>Jane Chevauchet<br>Pont-de-vaux</p>
            </div>

            <div id="texte">
                <p>“Après plusieurs régimes différents, une amie m’ parlé du régime Kéto.<br>
                C’est grâce à se livre que j’ai découvert une nouvelle expérience sur la façon de manger et de cuisiner.<br>
                J’ai  été étonnée de découvrir que ce régime se concentrait sur la réduction des glucides et<br>
                l'augmentation des graisses saines.<br>
                Formidable auteur, les calories en trop restent dans le frigo.”</p>
            </div>

        </section>
        <hr>
        <section id="section-article2" class="row-limit-size">
            <h1>Prix du Club-lecture 2022</h1>
            <img src="../img/photosblog/prix lecture.png">
            <p>
            Le 28 octobre 2022 le Club-lecture de la bibliothèque de Saint-Denis-les-Bourg s’est réuni<br>
            et à décerné le Prix du Club-lecture à : 
            </p>
            <h2>Virginie Grimaldi: “Il nous restera ça”<br>Editions Fayard 2022</h2>
            <div id="photo1">
            <img src="../img/books/il nous restera ca.png">
            </div>
        </section>
        <hr>
    </main>

</body>
<?php 
include_once '../front/footer-default.php';
?>
</html>