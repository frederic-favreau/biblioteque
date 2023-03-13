INSERT INTO work(`title`, `pict`, `extract`, `published_at`, `ISBN`)
VALUES ('$title', '$pict', '$extract', 1, '$publishDate', '$isbn');

INSERT INTO author(`lastname`, `firstname`)
VALUES ('$authorLastname', '$authorFirstname');

INSERT INTO genre(`name`)
VALUES ('$genreA'), ('$genreB');

INSERT INTO category(`name`)
VALUES ('$category');

INSERT INTO work_author(`work_id`, `author_id`)
VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_author FROM author WHERE lastname = '$authorLastname' AND firstname = '$authorFirstname'));

INSERT INTO work_genre(`work_id`, `genre_id`)
VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_genre FROM genre WHERE name = '$genreA'));

INSERT INTO work_genre(`work_id, genre_id`)
VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_genre FROM genre WHERE name = '$genreB'));

INSERT INTO work_category(`id_category`, `id_work`)
VALUES ((SELECT id_category FROM category WHERE name = '$category'), (SELECT id_work FROM work WHERE title = '$title'));



$sqlAdd = "INSERT INTO post(`title`, `extract`, `thumbnail`, `content`, `author` )VALUES ('$title','$extract','$thumbnail','$content', $author)";
<?php

                    INSERT INTO work_author(`work_id`, `author_id`)
                    VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_author FROM author WHERE lastname = '$authorLastname' AND firstname = '$authorFirstname'));

                    INSERT INTO work_genre(`work_id`, `genre_id`)
                    VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_genre FROM genre WHERE name = '$genreA'));

                    INSERT INTO work_genre(`work_id, genre_id`)
                    VALUES ((SELECT id_work FROM work WHERE title = '$title'), (SELECT id_genre FROM genre WHERE name = '$genreB'));

                    INSERT INTO work_category(`id_category`, `id_work`)
                    VALUES ((SELECT id_category FROM category WHERE name = '$category'), (SELECT id_work FROM work WHERE title = '$title'))";

?>