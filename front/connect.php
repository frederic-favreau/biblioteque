<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="../css/style-connect.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Nova+Slim&family=Risque&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <section id="section-authentication" class="row-limit-size">
            <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form action="../admin/singup.php" method="POST">
                        <h1>S'enregistrer sur Biblook</h1>
                        <input type="email" name="mail" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="firstname" name="firstname" placeholder="Your firstname" />
                        <input type="lastname" name="lastname" placeholder="Your lastname" />
                        <button>Sign Up</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">

                    <?php
                    if (isset($_GET['err'])) {
                    ?>
                        <p style="color: red;"> Ehhh Mec! Pseudo ou mot de passe incorrect </p>
                    <?php
                    }
                    ?>

                    <form action="../admin/auth.php" method="POST">
                        <h1>Connexion à Biblook</h1>
                        <input type="email" name="mail" id="mail" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <a href="#">Mot de passe oublié?</a>
                        <button type="submit">Se connecter</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Content de vous revoir !</h1>
                            <p>
                                Hâte de vous présenter nos nouveautés
                            </p>
                            <button class="ghost" id="signIn">Se connecter</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, Lecteur !</h1>
                            <p>Rejoins nos lecteurs pour leurs raconter ton histoire</p>
                            <button class="ghost" id="signUp">s'enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="../connect.js"></script>
</body>

</html>