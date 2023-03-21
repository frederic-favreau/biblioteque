 <?php
    include_once '../admin/header-main.php';
    include_once '../connexion.php';

    ?>

 <!-- ---------- SECTION DASHBOARD - PAGE DEFAULT ---------- -->


 <section id="dashboard-page-default" class="row-limit-size-db">
     <div class="container-dashboard-base">
         <h1 class="h1-dashboard"><?= $_SESSION['firstname'] ?>, bienvenue dans votre tableau de bord</h1>

         <h2 class="h2-dashboard">Voici le suivi de vos activités</h2>

         <div class="container-home-tabs">



             <!-- ---------- BOX LOAN---------- -->


             <div id="box-loan" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en cours d'emprunt</h3>
                 <hr>
                 <ul class="list-book-box">
                  <?php 

                $idUser = $_SESSION['id-user'];
                $date = date('Y-m-d');
                  
                  $loanSql = $db->prepare("SELECT `title`,`pict`, `id_work`, `loan`.`id_loan`,
                  GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors`,
                  DATEDIFF( `loan`.`theoretical_date`, :date) AS `nbJours`
                  FROM `work`
                  
                  INNER JOIN `work_author`
                  ON `work_author`.`work_id` = `work`.`id_work`
                                      
                  INNER JOIN `author`
                  ON `work_author`.`author_id` = `author`.`id_author`
                                      
                  INNER JOIN `copy`
                  ON `copy`.`work_id`=`work`.`id_work`
                  
                  INNER JOIN `loan`
                  ON `loan`.`copy_id`=`copy`.`id_copy`
                  
                  WHERE  `loan`.`user_id` = :id_user AND `loan`.`status` = 1
                  GROUP BY `loan`.`id_loan`
                  ORDER BY `nbJours`");

                        $loanSql->bindParam('id_user', $idUser, PDO::PARAM_STR);
                        $loanSql->bindParam('date', $date, PDO::PARAM_STR);

                        $loanSql->execute();
                        while ($loan = $loanSql->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/<?= $loan['pict'] ?>" class="pict-book-standard" alt="<?= $loan['title'] ?>">
                             <ul class="container-description">
                                 <li class="list-title"><?= $loan['title'] ?></li>
                                 <li class="list-author"><?= $authors = str_replace(',',', ',$loan['authors']) ?></li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">
                               <?php 
                               if($loan['nbJours'] > 0){
                                ?>
                                Il vous reste <?= $loan['nbJours'] ?> jours</p>
                                <?php 
                               }elseif($loan['nbJours'] < 0){
                                ?>
                                Attention, vous avez du retard de <?= $retard = str_replace('-','',$loan['nbJours'])?> jours</p>
                                <?php 

                               }else{
                                ?>
                                Votre emprunt se termine aujourd'hui</p>
                                <?php 
                               }
                               ?>
                             
                             
                             
                             
                             
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                     <?php } ?>
                     
                 </ul>
             </div>



             <!-- ---------- BOX WISH LIST ---------- -->


             <div id="box-whish-list" class="box-dashboard">
                 <h3 class="h3-dashboard">Mes livres en favoris</h3>
                 <hr>
                 <ul class="list-book-box">
                     <?php
                        $idUser = $_SESSION['id-user'];

                        // Requête pour récupérer les stocks
                        $reqStock = ("SELECT `work_id`, `stock` FROM `copy`");
                        $resultStock = $db->query($reqStock);


                        while ($row = $resultStock->fetch(PDO::FETCH_ASSOC)) {
                            // Stockage du stock correspondant à chaque work_id
                            $stocks[$row['work_id']][] = $row['stock'];
                        }

                        $likeSql = $db->prepare("SELECT `title`,`pict`, `id_work`,
                    GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors`
                    FROM `work`
                    
                    INNER JOIN `work_author`
                    ON `work_author`.`work_id` = `work`.`id_work`
                    
                    INNER JOIN `author`
                    ON `work_author`.`author_id` = `author`.`id_author`
                    
                    INNER JOIN `like`
                    ON `like`.`work_id` = `work`.`id_work`
                    
                    WHERE `like`.`work_id` = `id_work` AND `like`.`user_id` = :id_user
                    
                    GROUP BY `id_work`");

                        $likeSql->bindParam('id_user', $idUser, PDO::PARAM_STR);

                        $likeSql->execute();
                        while ($like = $likeSql->fetch(PDO::FETCH_ASSOC)) {

                            $workId = $like['id_work'];
                            $disponible = 'indisponible';


                            if (in_array(1, $stocks[$workId])) {
                                $disponible = 'disponible';
                            }

                            $i = 0;
                            foreach ($stocks[$workId] as $value) {
                                if ($value == 0)
                                    $i++;
                            }

                        ?>
                         <li class="item-list-book">
                             <div class="format-pict-book">
                                 <img src="../img/books/<?= $like['pict'] ?>" class="pict-book-standard" alt="<?= $like['title'] ?>">
                                 <ul class="container-description">
                                     <li class="list-title"><?= $like['title'] ?></li>
                                     <li class="list-author"><?= $authors = str_replace(',', ', ', $like['authors']) ?></li>
                                 </ul>
                             </div>
                             <div class="container-info-loan">
                                 <p class="info-disponibility"><?= $disponible ?></p>

                             </div>
                         </li>
                     <?php
                        }

                        ?>
                 </ul>
             </div>



             <!-- ---------- BOX RECO ---------- -->


             <div id="box-reco-list" class="box-dashboard">
                 <h3 class="h3-dashboard">Les livres recommandés par Biblook</h3>
                 <hr>
                 <ul class="list-book-box">
                     <?php
                        $sql_reco =
                            "SELECT `id_work`,`pict`,`title`,
                        CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`) AS `authors`
                        FROM `work`
                        INNER JOIN `work_author`
                        ON `work_author`.`work_id` = `work`.`id_work`
                        INNER JOIN `author`
                        ON `work_author`.`author_id` = `author`.`id_author` 
                        ORDER BY `id_work` DESC LIMIT 4";
                        $req_reco =  $db->query($sql_reco);
                        while ($reco = $req_reco->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                         <li class="item-list-book">
                             <div class="format-pict-book ">
                                 <img src="../img/books/<?= $reco['pict'] ?>" class="pict-book-standard" alt="<?= $reco['title'] ?>">
                                 <ul class="container-description">
                                     <li class="list-title"><?= $reco['title'] ?></li>
                                     <li class="list-author"><?= $reco['authors'] ?></li>
                                 </ul>
                             </div>
                             <div class="container-info-loan">
                                 <p class="info-disponibility">Dispo/indispo</p>
                                 <a href="#" class="btn-format-standard">Emprunter maintenant</a>
                             </div>
                         </li>
                     <?php } ?>
                 </ul>
             </div>



             <!-- ---------- BOX HISTORY---------- -->


             <div id="box-history" class="box-dashboard">
                 <h3 class="h3-dashboard">Historique de mes emprunts</h3>
                 <hr>
                 <ul>

                 <?php

                 $historiqueSql = $db->prepare("SELECT `title`,`pict`, `id_work`, `loan`.`id_loan`,
                 DATE_FORMAT(`loan`.`date_return_loan`, '%d/%m/%Y') AS `retour`,
                  GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors`,
                  DATEDIFF( `loan`.`theoretical_date`, :date) AS `nbJours`
                  FROM `work`
                  
                  INNER JOIN `work_author`
                  ON `work_author`.`work_id` = `work`.`id_work`
                                      
                  INNER JOIN `author`
                  ON `work_author`.`author_id` = `author`.`id_author`
                                      
                  INNER JOIN `copy`
                  ON `copy`.`work_id`=`work`.`id_work`
                  
                  INNER JOIN `loan`
                  ON `loan`.`copy_id`=`copy`.`id_copy`
                  
                  WHERE  `loan`.`user_id` = :id_user AND `loan`.`status` = 0
                  GROUP BY `loan`.`id_loan`
                  ORDER BY `nbJours`");

$historiqueSql->bindParam('id_user', $idUser, PDO::PARAM_STR);
$historiqueSql->bindParam('date', $date, PDO::PARAM_STR);

$historiqueSql->execute();
                        while ($historique = $historiqueSql->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/<?= $historique['pict'] ?>" class="pict-book-standard" alt="<?= $historique['title'] ?>">
                             <ul class="container-description">
                                 <li class="list-title"><?= $historique['title'] ?></li>
                                 <li class="list-author"><?= $authors = str_replace(',',', ',$historique['authors']) ?></li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility"> <?= $historique['retour'] ?></p>
                              
                             
                             
                             
                             
                             
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                     <?php } ?>
                 </ul>
             </div>
         </div>
     </div>
 </section>

 </main>
 <script src="../js/main-admin.js"></script>
 </body>

 </html>