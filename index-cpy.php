 <!-- ---------- SECTION - HEART ---------- -->


    <section id="section-heart" class="row-limit-size">
      <h2>Coups de coeur</h2>
      <p class="sub-title-section" id="sub-title-heart">Nos lecteurs partagent leur coups de coeurs</p>
      <ul class="top">
      <?php
        $sql_heart = "SELECT `id_work`,`pict`,`title` FROM `work` ORDER BY `id_work` DESC LIMIT 4";
        $req_heart =  $db->query($sql_heart);
        $i = 1;
        while ($heart = $req_heart->fetch(PDO::FETCH_ASSOC)) {
          $card_class = 'animated-card';
        ?>

          <li class="<?= $card_class ?>"><a href="./front/book-detail.php?id=<?= $heart['id_work'] ?>"><?= $i ?><img src="./img/books/<?= $heart['pict'] ?>" alt="<?= $heart['title'] ?>"></a></li>

        <?php
          $i++;
        } ?>
      </ul>

      <a href="#" id="btn-show-heart">Voir tous les coups de coeur</a>
    </section>


    <!-- ---------- SECTION - lAST ARRIVAL ---------- -->


    <!-- <section id="section-soon-available" class="row-limit-size">

      <h2>Derniers arrivages</h2>
      <h3 id="h3-tag">tout juste disponible</h3>
      <div id="container-cards">

        <!-- find last 9 books in our librarerie -->


        <?php

        $sql =

          // DISTINCT prevent duplication of results, GROUP_CONCAT gathers results on same line 
          //CONCAT(...,SPACE(1),...) gathers result of two colones in one and insert one space between 
          //theese results

          "SELECT DISTINCT `id_work`,`title`,`pict`,`extract`, `published_at`, 
        GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
        GROUP_CONCAT(DISTINCT CONCAT(`author`.`lastname`, SPACE(1), `author`.`firstname`)) AS `authors` 
        FROM `work`

        INNER JOIN `work_genre` 
        ON `work`.`id_work` = `work_genre`.`work_id`

        INNER JOIN `genre`
        ON `work_genre`.`genre_id` =`genre`.`id_genre`

        INNER JOIN `work_author`
        ON `work_author`.`work_id` = `work`.`id_work`

        INNER JOIN `author`
        ON `work_author`.`author_id` = `author`.`id_author`

        GROUP BY `id_work` ORDER BY `id_work` DESC LIMIT 6";


        $req = $db->query($sql);
        while ($card = $req->fetch(PDO::FETCH_ASSOC)) {

        ?>


          <div class="card" style="--card-index: 1;">
            <div class="top-item-card">
              <?php
              $now = date('Y-m-d',  strtotime('-2 month'));
              $date = $card['published_at'];
              if ($date > $now) {
              ?>
              <?php
              }

              ?>

              <img src="./img/books/<?= $card['pict'] ?>" alt="<?= $card['title'] ?>" class="pict-card-book">
            </div>
            <div class="bottom-item-card">


              <!-- str_replace takes three arguments, first element to replace, 
            seconde element to insert, third target of function -->

              <h4 id="title-genre"><?= str_replace(',', ', ', $card['genres']) ?></h4>
              <h3 class="title-card-index"><?= $card['title'] ?></h3>
              <!-- <p class="description-card"><?= $card['extract'] ?></p> -->
              <h5 id="title-author"><?= str_replace(',', ', ', $card['authors']) ?></h5>
              <a href="./front/book-detail.php?id=<?= $card['id_work'] ?>" class="link-page">En savoir plus 🡪</a>
              <form action="./admin/like.php?id=<?= $card['id_work'] ?>" method="POST">

                <?php
                $idUser = $_SESSION['id-user'];
                $idBook = $card['id_work'];


                if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
                  $coeurSql = $db->prepare("SELECT `work_id`,`user_id` FROM `like` WHERE`user_id` = :user_id AND `work_id` = :work_id");

                  $coeurSql->bindParam('user_id', $idUser, PDO::PARAM_INT);
                  $coeurSql->bindParam('work_id', $idBook, PDO::PARAM_INT);
                  $coeurSql->execute();
                  $coeur = $coeurSql->fetch(PDO::FETCH_ASSOC);
                  if ($coeur == true) {
                ?>
                    <input type="submit" value="" name="coeur" class="heart-wishlist input-heart input-heart-red">

                  <?php } else { ?>
                    <input type="submit" value="" name="coeur" class="heart-wishlist input-heart input-fill-blue">
                <?php }
                } ?>

              </form>


            </div>
          </div>
        <?php } ?>
      </div>
    </section>

