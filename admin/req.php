<?php

$reqAskCrud = ("SELECT pict, title, id_work, CONCAT(author.firstname, ' ', author.lastname) as author, id_work FROM work INNER JOIN work_author ON work_author.work_id = work.id_work INNER JOIN author ON work_author.author_id = author.id_author ORDER BY work.title ASC");

$reqCrud = $db->query($reqAskCrud);

while ($crud = $reqCrud->fetch(PDO::FETCH_ASSOC)) {

?>


<?php } ?>



<?php
                            $reqAskCrud = ("SELECT `id_work`,`title`,`pict`,`extract`, `published_at`, `ISBN`,
                                GROUP_CONCAT(DISTINCT `genre`.`name`) AS `genres`, 
                                GROUP_CONCAT(DISTINCT CONCAT(author.firstname, ' ', author.lastname) as author` 
                                FROM `work`
                                
                                INNER JOIN `work_genre` 
                                ON `work`.`id_work` = `work_genre`.`work_id`
                                
                                INNER JOIN `genre`
                                ON `work_genre`.`genre_id` =`genre`.`id_genre`
                                
                                INNER JOIN `work_author`
                                ON `work_author`.`work_id` = `work`.`id_work`
                                
                                INNER JOIN `author`
                                ON `work_author`.`author_id` = `author`.`id_author`
                                
                                ORDER BY work.title ASC");
                                $reqCrud = $db->query($reqAskCrud);

                                while ($crud = $reqCrud->fetch(PDO::FETCH_ASSOC)) {

                            ?>

<?php } ?>
