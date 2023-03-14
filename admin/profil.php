<?php
include_once '../admin/header-main.php';
?>

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
                            <label for="firstname" class="label-form-profil">Prénom</label>
                            <input type="text" name="firstname" id="firstname" class="input-fullname" value="<?= $_SESSION['firstname'] ?>" />
                        </div>
                        <div id="laststname">
                            <label for="lastname" class="label-form-profil">Nom</label>
                            <input type="text" name="lastname" id="lastname" class="input-fullname" value="<?= $_SESSION['lastname'] ?>" />
                        </div>
                    </div>
                    <div id="email">
                        <label for="input-mail" class="label-form-profil">Email</label>
                        <input type="email" name="mail" id="input-mail" value="<?= $_SESSION['mail'] ?>" />
                    </div>
                    <div id="location">
                        <label for="input-location" class="label-form-profil">Adresse de votre résidence</label>
                        <input type="text" id="location" id="input-location" name="adress">
                    </div>

                    <div id="password">
                        <label for="password" class="label-form-profil">Votre mot de passe</label>
                        <input type="password" name="password" id="input-password" placeholder="Password" />
                    </div>
                    <?php


                    ?>
                    <div id="group-btn-form">
                        <button type="reset" id="btn-reset">Reset</button>
                        <button type="submit" id="btn-submit" name="modifier">Modifier</button>
                        <?php if (isset($_POST['modifier'])) {
                            $mail = $_POST['mail'];
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

</main>
 <script src="../js/main-admin.js"></script>
 </body>

 </html>