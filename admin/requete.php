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



UPDATE work
JOIN work_author ON work.id_work = work_author.work_id
JOIN author ON work_author.author_id = author.id_author
JOIN work_genre ON work.id_work = work_genre.id_work
JOIN genre ON work_genre.genre_id = genre.id_genre
SET
work.title = 'new_title',
author.lastname = 'new_lastname',
author.firstname = 'new_firstname',
genre.name = 'new_genre',
work.published_at = 'new_published_date',
work.ISBN = 'new_ISBN',
work.pict = 'new_pict',
work.extract = 'new_extract'
WHERE work.id_work = 'selected_work_id';