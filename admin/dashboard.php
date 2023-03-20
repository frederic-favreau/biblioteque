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
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['Il vous reste x jours']</p>
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['Il vous reste x jours']</p>
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
                     <li class="item-list-book">
                         <div class="format-pict-book">
                             <img src="../img/books/ça.jpg" class="pict-book-standard" alt="['titre']">
                             <ul class="container-description">
                                 <li class="list-title">['title']</li>
                                 <li class="list-author">['author']</li>
                             </ul>
                         </div>
                         <div class="container-info-loan">
                             <p class="info-disponibility">['Il vous reste x jours']</p>
                             <a href="#" class="btn-format-standard">Prolonger l'emprunt</a>
                         </div>
                     </li>
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
                                 <a href="../front/book-detail.php?id=<?= $like['id_work'] ?>" class="btn-format-standard">Emprunter maintenant</a>
                                 <input type="submit" class="delete-favorit-book" value="">
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
                     <li class="empty"><a href="#"></a>Vous n'avez pas encore emprunté de livre</li>
                 </ul>
             </div>
         </div>
     </div>
 </section>

 </main>
 <script src="../js/main-admin.js"></script>
 </body>

 </html>