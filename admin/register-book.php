<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>

<!-- ---------- SECTION lOAN BOOK REGISTER ---------- -->

<section id="loan-register" class="row-limit-size-db">
    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace de registre d'emprunts</h1>
        <h2 class="h2-dashboard">Vous pouvez gérer les emprunts des lecteurs de la bibliothèque dans cet espace</h2>
        <div id="box-loan-register" class="box-dashboard">
            <h3 class="h3-dashboard">Nouvel emprunt d'un exemplaire de livre</h3>
            <hr>


            <form action="#" id="form-loan-register" method="POST" action="" enctype="multipart/form-data">
                <div id="form-loan-register-left">
                    <div class="add-form-template-label-input">
                        <label for="copy-id" class="label-form-add-book">ID de l'exemplaire</label>
                        <input type="text" name="copy-id" id="copy-id" class="input-form-add-book" value="" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="loan-date-start" class="label-form-add-book">Date de l'emprunt</label>
                        <input type="date" name="loan-date-start" id="loan-date-start" class="input-form-add-book" value="" />
                    </div>
                    <div class="add-form-template-label-input">
                        <label for="loan-date-return" class="label-form-add-book">Date théorique du retour</label>
                        <input type="date" name="loan-date-return" id="loan-date-return" class="input-form-add-book" value="" />
                    </div>
                    <div id="form-loan-register-right">
                        <label for="user-id" class="label-form-add-book">ID du lecteur</label>
                        <input type="text" name="user-id" id="user-id" class="input-form-add-book" value="" />
                    </div>
                    <div id="group-btn-loan-register-commun">
                        <input type="reset" id="btn-reset-form-loan-register" name="reset" value="Reset" />
                        <input type="submit" id="btn-submit-form-loan-register" name="submit" value="Enregistrer" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


</main>
<script src="../js/main-admin.js"></script>
</body>

</html>