<?php

    require_once '../connexion.php';
    include_once '../admin/header-main.php';


    ?>


 <section id="dashboard-page-book-add" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard">Bienvenue dans l'espace d'ajout de livres</h1>
         <h2 class="h2-dashboard">Vous pouvez ajouter des livres dans la bibliothèque</h2>
         <div id="box-add-book-info" class="box-dashboard">
             <h3 class="h3-dashboard">Tapez LCCN de la livre</h3>
             <hr>

             <?php
                    if (isset($_POST['submit'])) {
                        
                        $ISBN = addslashes($_POST['work-ISBN-add']);



                        if (isset($_POST['submit'])) {
                        
                            $LCCN = addslashes($_POST['work-ISBN-add']);
                            
                            $query = $db->prepare("SELECT `LCCN` FROM `work`");
                            $query->execute();
                            $LCCNArray = [];
                            while($LCCNExists = $query->fetch(PDO::FETCH_ASSOC)){
                                $LCCNArray[]= $LCCNExists['LCCN'];
                            }
                            
                            
                            if (in_array($LCCN, $LCCNArray)) {
                            $_SESSION["added"] = "Ajouter nouvel copy";
                            header("Location: insert-copy.php?LCCN=" . $LCCN);
                            
                            exit();
                          }else{
                            
                            $_SESSION["notAdded"] = "Ajouter nouvel ouvrage";
                            header("Location: insert-book.php?LCCN=" . $LCCN);
                        
                        exit();
    
    
                          }
                        }



                    }
                ?>


             <form action="#" method="POST" id="form-add-book">
                 <div id="form-add-book-left">
                     
                     
                     <div class="add-form-template-label-input">
                         <label for="work-ISBN-add" class="label-form-add-book">LCCN (exemple: 2001098868)</label>
                         <input type="text" name="work-ISBN-add" id="work-ISBN-add" class="input-form-add-book" value="2001098868" />
                     </div>
                     <div id="group-btn-form-add-commun">
                     <input type="reset" id="btn-reset-form-add-book" name="reset" value="Reset"></input>
                     <input type="submit" id="btn-submit-form-add-book" name="submit" value="Suivent"></input>
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