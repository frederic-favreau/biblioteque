<?php
    include_once '../admin/header-main.php';
    require_once '../connexion.php';


    ?>


 <section id="dashboard-page-book-add" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue dans l'espace d'ajout de livres</h1>
         <h2 class="h2-dashboard">Vous pouvez ajouter des livres dans la bibliothèque</h2>
         <div id="box-add-book-info" class="box-dashboard">
             <h3 class="h3-dashboard">Ajout d'un livre dans la base de données</h3>
             <hr>

             <?php
             $LCCNLivre = $_GET['LCCN'];

             $idWORKSql = $db->prepare('SELECT `id_work` FROM `work` WHERE `ISBN` = :LCCN');
             $idWORKSql->bindParam('LCCN', $LCCNLivre, PDO::PARAM_STR);
             $idWORKSql->execute();
             $idFetch = $idWORKSql->fetch(PDO::FETCH_ASSOC);
             $id=$idFetch['id_work'];
               try {
                    if (isset($_POST['submit'])) {
                        
                        $publishedDate = addslashes($_POST['publisher-date-add']);
                        $LCCN = addslashes($_POST['work-ISBN-add']);
                        $editor = addslashes($_POST['publisher-name-add']);
                        $Localisaton = addslashes($_POST['Localisaton']);
                        $EditorNumber = addslashes($_POST['NumeroEditor']);





                        //INSERT EDITOR
                        $reqEditorExists = $db->prepare("SELECT `id_editor` FROM `editor` WHERE `editor_name` = :editor");
                        $reqEditorExists->bindParam(':editor', $editor);
                        $reqEditorExists->execute();
                        $EditorExists = $reqEditorExists->fetch(PDO::FETCH_ASSOC);


                        if ($EditorExists == false) {
                            $queryEditor = $db->prepare("INSERT INTO `editor` (`editor_name`,`number`,`date`) VALUES (:editor_name,:number,:date)");
                            $queryEditor->bindParam('editor_name', $editor, PDO::PARAM_STR);
                            $queryEditor->bindParam('number', $EditorNumber, PDO::PARAM_INT);
                            $queryEditor->bindParam('date', $publishedDate);
                            $queryEditor->execute();
                            

                            $queryLastIdEditor = "SELECT `id_editor` FROM `editor` ORDER BY `id_editor` DESC LIMIT 1";
                            $reqLastIdEditor = $db->query($queryLastIdEditor);
                            $fetchLastIdEditor = $reqLastIdEditor->fetch(PDO::FETCH_ASSOC);
                            $IdEdiditor = $fetchLastIdEditor['id_editor'];

                        }else{
                            $IdEdiditor = $EditorExists['id_editor'];
                        }
                       





                        //INSERT COPY

                        $stock = 1;
                        
                        $sqlCopy = $db->prepare('INSERT INTO `copy` (`editor_id`,`location`,`work_id`,`stock`) VALUES(:editor_id,:location,:work_id,:stock)');
                            $sqlCopy->bindParam('editor_id', $IdEdiditor, PDO::PARAM_INT);
                            $sqlCopy->bindParam('location', $Localisaton, PDO::PARAM_STR);
                            $sqlCopy->bindParam('work_id', $id, PDO::PARAM_INT);
                            $sqlCopy->bindParam('stock', $stock, PDO::PARAM_INT);
                            $sqlCopy->execute();
                        
                        
                        



                       

                        




                        $_SESSION["added"] = "Ajout réussit";
                        //header("Location: edit-book.php?id=" . $workId);
                        ob_end_flush();
                        exit();
                    }
                } catch (PDOException $e) {
                    $_SESSION["notAdded"] = "Problème lors de l'ajout";
                    //header("Location: edit-book.php?id=" . $workId);
                    ob_end_flush();
                    exit();
                }
                ?>


             <form action="#" method="POST" id="form-add-book">
                 <div id="form-add-book-left">
                     <!-- ... autres champs existants ... -->
                     
                     <div class="add-form-template-label-input">
                         <label for="work-ISBN-add" class="label-form-add-book">ISBN (ex: ISBN 13 :874-6-2457-6478-8)</label>
                         <input type="text" name="work-ISBN-add" id="work-ISBN-add" class="input-form-add-book" value="hh" />
                     </div>
                     <div class="add-form-template-label-input">
                     </div>
                 </div>
                 <div id="form-add-book-right">
                    

                     
                     <div class="add-form-template-label-input">
                         <label for="publisher-name-add" class="label-form-add-book">Localisaton</label>
                         <input type="text" name="Localisaton" id="Localisaton" class="input-form-add-book" value="hh" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-name-add" class="label-form-add-book">Nom de l'éditeur</label>
                         <input type="text" name="publisher-name-add" id="publisher-name-add" class="input-form-add-book" value="hh" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-name-add" class="label-form-add-book">Numero de l'éditeur</label>
                         <input type="text" name="NumeroEditor" id="NumeroEditor" class="input-form-add-book" value="45864" />
                     </div>
                     <div class="add-form-template-label-input">
                         <label for="publisher-date-add" class="label-form-add-book">Date d'édition</label>
                         <input type="date" name="publisher-date-add" id="publisher-date-add" value="hh" class="input-form-add-book" />
                     </div>
                 </div>
                 <div id="group-btn-form-add-commun">
                     <input type="reset" id="btn-reset-form-add-book" name="reset" value="Reset"></input>
                     <input type="submit" id="btn-submit-form-add-book" name="submit" value="Ajouter"></input>
                 </div>
         </div>
         </form>

         <?php if (isset($_SESSION['added'])) : ?>
             <div id="confirmed-added">
                 <p><strong><?= $_SESSION["added"] ?></strong></p>
                 <p class="info-msg-bdd">Les données que vous avez ajouté ont bien <br> été enregistré </p>
             </div>
             <?php unset($_SESSION["added"]); ?>
         <?php endif; ?>

         <?php if (isset($_SESSION['notAdded'])) : ?>
             <div id="not-added">
                 <p><strong><?= $_SESSION["notAdded"] ?></strong></p>
                 <p class="info-msg-bdd">Les données que vous avez ajouté n'ont pas <br> été enregistré</p>
             </div>
             <?php unset($_SESSION["notAdded"]); ?>
         <?php endif; ?>

     </div>
     </div>
     </div>
     </div>
 </section>

 </main>
 <script src="../js/main-admin.js"></script>
 </body>

 </html>