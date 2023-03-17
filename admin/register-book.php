<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>

<!-- ---------- SECTION lOAN BOOK REGISTER ---------- -->

<section id="loan-register" class="row-limit-size-db">


    <!-- ----- LOAN BOX OUTBOOK ----- -->

    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue dans l'espace de registre d'emprunts</h1>
        <h2 class="h2-dashboard">Vous pouvez gérer les emprunts des lecteurs de la bibliothèque dans cet espace</h2>
        <div id="box-loan-register" class="box-dashboard">
            <h3 class="h3-dashboard">Nouvel emprunt d'un exemplaire de livre</h3>
            <hr>


            <form action="#" id="form-loan-register" method="POST" action="" enctype="multipart/form-data" name="emrunte">
                <?php
                if (isset($_POST['submit']) && !empty($_POST['submit'])) {
                    $idCopy = addslashes($_POST['copy-id']);
                    $dateEmprunt = date('Y-m-d');
                    $dt = strtotime("$dateEmprunt");
                    
                    $dateRetour = date("Y-m-d", strtotime("+1 month", $dt));
                    
                    $idUser = addslashes($_POST['user-id']);
                    $status = 1;


                    $stmt = $db->prepare("INSERT INTO `loan` (`copy_id`,`release_date`,`theoretical_date`, `status`, `user_id`)
                      VALUES (:idCopy, :dateEmprunt, :dateRetour, :status, :idUser);
                      UPDATE `copy` SET `stock` = 0 WHERE `id_copy` = :idCopy");
                    $stmt->bindParam(':idCopy', $idCopy);
                    $stmt->bindParam(':dateEmprunt', $dateEmprunt);
                    $stmt->bindParam(':dateRetour', $dateRetour);
                    $stmt->bindParam(':status', $status);
                    $stmt->bindParam(':idUser', $idUser);
                    $stmt->execute();
                    
                }

                ?>
                <div id="form-loan-register-left">
                    <div class="add-form-template-label-input">
                        <label for="copy-id" class="label-form-add-book">ID de l'exemplaire</label>
                        <input type="text" name="copy-id" id="copy-id" class="input-form-add-book" value="" />
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


    <!-- ----- LOAN BOX INBOOK ----- -->

    <div class="container-dashboard-base">
        <div id="box-loan-in-register" class="box-dashboard">
            <h3 class="h3-dashboard">Retour d'emprunt d'un exemplaire de livre</h3>
            <hr>


            <form action="#" id="form-in-loan-register" method="POST" action="" enctype="multipart/form-data">
                <?php
                if(isset($_POST['submit-in']) && !empty($_POST['submit-in'])){
                    
                    $idCopy = $_POST['copy-in-id'];
                    $stm = $db->prepare('SELECT `id_loan` FROM `loan` WHERE `copy_id` = :idCopy ORDER BY `release_date` DESC LIMIT 1');
                    $stm->bindParam(':idCopy', $idCopy);
                    $stm->execute();
                    $loan = $stm->fetch(PDO::FETCH_ASSOC);




                    
                    $idLoan = $loan['id_loan'];
                    $dateRetour = date("Y-m-d");                    
                    $status = 0;



                    $stmt = $db->prepare('UPDATE `loan` SET `date_return_loan` = :dateRetour ,`status` = :status 
                    WHERE `id_loan` = :idLoan;
                      
                    UPDATE `copy` SET `stock` = 1 WHERE `id_copy` = :idCopy');
                    $stmt->bindParam(':idCopy', $idCopy);
                    $stmt->bindParam(':idLoan', $idLoan );
                    $stmt->bindParam(':dateRetour', $dateRetour);
                    $stmt->bindParam(':status', $status);
                    
                    $stmt->execute();
                    



                }
                ?>
                <div id="form-in-loan-register-left">
                    <div class="add-form-in-template-label-input">
                        <label for="copy-in-id" class="label-form-add-book">ID de l'exmplaire</label>
                        <input type="text" name="copy-in-id" id="copy-in-id" class="input-form-add-book" value="" />
                    </div>
                    
                    <div id="group-btn-in-loan-register-commun">
                        <input type="reset" id="btn-reset-form-in-loan-register" name="reset" value="Reset" />
                        <input type="submit" id="btn-submit-form-in-loan-register" name="submit-in" value="Enregistrer" />
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