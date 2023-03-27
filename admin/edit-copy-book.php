<?php
require_once '../connexion.php';
include_once '../admin/header-main.php';
?>

<!-- ---------- SECTION DASHBOARD - PAGE EDIT BOOK ---------- -->

<section id="dashboard-page-book-edit" class="row-limit-size-db">
    <div class="container-dashboard-base">
        <h1 class="h1-dashboard">Bienvenue de modification d'exemplaires</h1>
        <h2 class="h2-dashboard">Vous pouvez modifier les exemplaire de l'ouvrage dans la bibliothèque</h2>
        

        <?php
try {
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        $Localisaton = ($_POST['Localisaton']);
        $copyID = ($_POST['custId']);
        $editor = ($_POST['publisher-name-edit']);
        $NumeroEditor = ($_POST['NumeroEditor']);
        $DateEdition = ($_POST['publisher-date-edit']);

        // Requête pour mettre à jour la copy
        $reqCopy = $db->prepare("UPDATE `copy` SET `location` = :location WHERE `id_copy`= :id_copy");
        $reqCopy->bindParam(':id_copy', $copyID);
        $reqCopy->bindParam('location', $Localisaton, PDO::PARAM_STR);
        $reqCopy->execute();

        // Vérifie si l'editeur existe déjà
        $reqEditorExists = $db->prepare("SELECT `id_editor` FROM `editor` WHERE `editor_name` = :editor_name");
        $reqEditorExists->bindParam(':editor_name', $editor);
        $reqEditorExists->execute();
        $editorExists = $reqEditorExists->fetch(PDO::FETCH_ASSOC);

        if ($editorExists) {
            // L'aediteur existe déjà, il suffit de mettre à jour la table copy
            $editorId = $editorExists['id_editor'];
            $reqUpdateCopyEditor = $db->prepare("UPDATE `copy` SET `editor_id` = :editorId WHERE `id_copy` = :id");
            $reqUpdateCopyEditor->bindParam(':editorId', $editorId);
            $reqUpdateCopyEditor->bindParam(':id', $copyID, PDO::PARAM_INT);
            $reqUpdateCopyEditor->execute();
        } else {
            // L'auteur n'existe pas, insérer le nouvel editeur et mettre à jour la table copy
            $reqInsertEditor = $db->prepare("INSERT INTO `editor` (`editor_name`,`number`,`date`) VALUES (:editor_name, :number, :date)");
            $reqInsertEditor->bindParam(':editor_name', $editor);
            $reqInsertEditor->bindParam(':number', $NumeroEditor);
            $reqInsertEditor->bindParam(':date', $DateEdition);
            $reqInsertEditor->execute();
            $newEditorId = $db->lastInsertId();

            $reqUpdateCopy = $db->prepare("UPDATE `copy` SET `editor_id` = :newEditorId WHERE `id_copy` = :id");
            $reqUpdateCopy->bindParam(':newEditorId', $newEditorId);
            $reqUpdateCopy->bindParam(':id', $copyID, PDO::PARAM_INT);
            $reqUpdateCopy->execute();
        }

            

        $_SESSION["modified"] = "Mise à jour réussie";
       header("Location: ../admin/edit-copy-book.php?id=" . $id);
        exit();
    }
} catch (PDOException $e) {
    $_SESSION["notModified"] = "Problème lors de la mise à jour";
    header("Location: ../admin/edit-copy-book.php?id=" . $id);
    exit();
}



        $reqExemplaire = $db ->prepare(
    
            'SELECT `title`, `copy`.`id_copy`,  `copy`.`location`, `editor`.`editor_name`, `editor`.`number`,`editor`.`date`   
            FROM `work`
            
            INNER JOIN `copy`
            ON `copy`.`work_id` = `work`.`id_work`

            INNER JOIN `editor`
            ON `editor`.`id_editor` = `copy`.`editor_id`
            
            
            WHERE `id_work` = :id');
            
                     
            
            $reqExemplaire->bindParam('id', $id, PDO::PARAM_INT);
            $reqExemplaire->execute();
            while($Exemplaire = $reqExemplaire->fetch(PDO::FETCH_ASSOC)){
                
            $copyID = $Exemplaire['id_copy'];

?>
       
        <div id="box-edit-book-info" class="box-dashboard">
        
            <h3 class="h3-dashboard">Modification de Exemplaire "<?= $Exemplaire['id_copy'] ?>" dans la base de données</h3>
            <hr>

            <form action="#" id="form-book-edit" method="POST" action="edit-book.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <div id="form-add-book-left">
                     <!-- ... autres champs existants ... -->
                     
                     <input type="hidden" name="custId" value="<?= $Exemplaire['id_copy'] ?>">
                     <div class="add-form-template-label-input">
                     </div>
                 </div>
                 <div id="form-add-book-right">              
                     <div class="add-form-template-label-input">
                         <label for="publisher-name-add" class="label-form-add-book">Localisaton</label>
                         <input type="text" name="Localisaton" class="input-form-add-book" value="<?= $Exemplaire['location'] ?>" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-name-edit" class="label-form-add-book">Nom de l'éditeur</label>
                         <input type="text" name="publisher-name-edit" class="input-form-add-book" value="<?= $Exemplaire['editor_name'] ?>" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-name-add" class="label-form-add-book">Numero de l'éditeur</label>
                         <input type="text" name="NumeroEditor" class="input-form-add-book" value="<?= $Exemplaire['number'] ?>" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-date-edit" class="label-form-add-book">Date d'édition</label>
                         <input type="date" name="publisher-date-edit" value="<?= $Exemplaire['date'] ?>" class="input-form-add-book" />
                     </div>
                 </div>
                <div id="group-btn-form-edit-commun">
                    <input type="reset" class="btn-reset-form-add-book" name="reset" value="Reset" />
                    <input type="submit" class="btn-submit-form-add-book" name="submit" value="Modifier" />
                </div>
            </form>

            <?php 
             if (isset($_SESSION['modified'])) : ?>
                <div id="confirmed-modified" onclick="hideDivConfirmed('confirmed-modified')">
                    <p><strong><?= $_SESSION["modified"] ?></strong></p>
                    <p class="info-msg-bdd">Les données que vous avez modifié ont bien été enregistré </p>
                </div>
                <?php unset($_SESSION["modified"]); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['notModified'])) : ?>
                <div id="not-modified" onclick="hideDivNotConfirmed('not-modified')">
                    <p><strong><?= $_SESSION["notModified"] ?></strong></p>
                    <p class="info-msg-bdd">Les données que vous avez modifié n'ont pas été enregistré</p>
                </div>
                <?php unset($_SESSION["notModified"]); ?>
            <?php endif; ?>

        </div>
        <?php
        
     } ?>
    </div>
</section>


</main>
<script src="../js/main-admin.js"></script>
</body>

</html>