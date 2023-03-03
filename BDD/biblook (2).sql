-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 mars 2023 à 10:18
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblook`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `lastname`, `firstname`) VALUES
(1, 'Dumas', 'Alexandre'),
(2, 'Vernes', 'Jules'),
(3, 'Fischer', 'Jirka'),
(4, 'Exuperie', 'Antoine'),
(5, 'Zahn', 'Thimoty'),
(6, 'Schtroumpfs', 'Papa'),
(7, 'King', 'Stephan');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `copy`
--

DROP TABLE IF EXISTS `copy`;
CREATE TABLE IF NOT EXISTS `copy` (
  `id_copy` int NOT NULL AUTO_INCREMENT,
  `id_editor` int DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_work` int NOT NULL,
  `stock` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_copy`) USING BTREE,
  KEY `WORK` (`id_work`),
  KEY `EDITOR` (`id_editor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id_editor` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `number` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_editor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `name`) VALUES
(1, 'aventure'),
(2, 'horeur'),
(3, 'historique'),
(4, 'enfant'),
(5, 'sci-fi'),
(6, 'education'),
(7, 'romantique'),
(8, 'détective'),
(9, 'jeunesse');

-- --------------------------------------------------------

--
-- Structure de la table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id_loan` int NOT NULL AUTO_INCREMENT,
  `id_copy` int DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `theoretical_date` date DEFAULT NULL,
  `date_return_loan` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_loan`),
  KEY `COPY` (`id_copy`),
  KEY `USER` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lastname` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mail` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `adress` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `avatar` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `mail`, `password`, `adress`, `avatar`, `role`) VALUES
(1, 'Azrael', 'Gargamel', 'mortauxSchtroumpfs@gmail.com', '12345', '55 Rue de la Paix, Paris', NULL, 0),
(2, 'demo', 'demo', 'demo@gmail.com', '12345', 'Rue de Prague, Lyon', NULL, 0),
(3, 'admin', 'admin', 'admin@gmail.com', '12345', 'Place de la Bière, Dijon', NULL, 1),
(7, 'Maya', 'Abeille', 'maya@gmail.com', '$2y$10$HEkwsfLRAs3jJzh4k06jfuPpeKHqNusucEjACwz3AR/sNG/ZZp4iS', NULL, NULL, NULL),
(9, 'Elisa', 'Elisa', 'elisa@google.com', '$2y$10$odqpKdrFFQbyV//dBckZBeOL5kd0jZ3TG2DD8ROjb5cSYiCvQNlS.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `work`
--

DROP TABLE IF EXISTS `work`;
CREATE TABLE IF NOT EXISTS `work` (
  `id_work` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pict` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `extract` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `new` tinyint(1) DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `ISBN` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_work`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `work`
--

INSERT INTO `work` (`id_work`, `title`, `pict`, `extract`, `new`, `published_at`, `ISBN`) VALUES
(1, 'Encyclopédie de biére', 'encyclopedie_de_la_biere.jpg', 'Le monde de la bière, à la fois simple et complexe, universel et local, vit aujourd’hui une effervescence exceptionnelle qui fait revivre d’antiques traditions brassicoles : les brasseries se multiplient aux quatre coins de la France et du monde, les gammes s’élargissent, les styles sont développés et revisités  avec ferveur… Mais comment se retrouver parmi cette offre  orissante ? Comment se repérer sans la connaissance d’un vocabulaire technique encore peu accessible à la plupart des amateurs ? ', 1, '1987-04-25', 'ISBN 13 :978-2-7654-0912-0'),
(2, 'Le Petit Prince', 'petit_price.jpg', '\" J\'ai ainsi vécu seul, sans personne avec qui parler véritablement, jusqu\'à une panne dans le désert du Sahara, il y a six ans. Quelque chose s\'était cassé dans mon moteur. Et comme je n\'avais avec moi ni mécanicien, ni passagers, je me préparai à essayer de réussir, tout seul, une réparation difficile. C\'était pour moi une question de vie ou de mort. J\'avais à peine de l\'eau à boire pour huit jours. Le premier soir je me suis donc endormi sur le sable à mille milles de toute terre habitée. J\'étais bien plus isolé qu\'un naufragé sur un radeau au milieu de l\'océan. Alors vous imaginez ma surprise, au lever du jour, quand une drôle de petite voix m\'a réveillé. Elle disait : ... \"', 0, '1943-05-07', 'ISBN 13 :478-2-7644-9972-0'),
(3, 'Les Trois Mousquetaires', 'trois_mousquetaires.jpg', 'Aux trois gentilshommes mousquetaires Athos, Porthos et Aramis, toujours prêts à en découdre avec les gardes du Cardinal de Richelieu, s\'associe le jeune gascon d\'Artagnan fraîchement débarqué de sa province avec pour ambition de servir le roi Louis XIII. Engagé dans le corps des mousquetaires, d\'Artagnan s\'éprend de l\'angélique Constance Bonacieux. En lutte contre la duplicité et l\'intrigue politique, les quatre compagnons trouveront en face d\'eux une jeune anglaise démoniaque et très belle, Milady, la redoutable espionne du Cardinal. D\'Artagnan seul échappe à ses agents. Mais rapportera-t-il à temps à la Reine de France, Anne d\'Autriche, les ferrets qu\'elle a remis à son amant, le duc de Buckingham ?', 0, '1867-11-15', 'ISBN 13 :458-7-4544-9242-0'),
(4, 'Star Wars - Thrawn', 'star_wars_trawn.jpg', 'Sauvé de l\'exil par des soldats impériaux, Thrawn parvient rapidement à capter l\'attention de l\'Empereur Palpatine par son intelligence impitoyable et son génie tactique qui n\'ont d\'égal que son ambition. Et si ses méthodes anticonformistes exaspèrent ses supérieurs, elles lui assurent nombre de succès retentissants et une fulgurante ascension. Toutefois, bien que Thrawn domine le champ de bataille, il lui reste beaucoup à apprendre dans l\'arène politique où les visages sont doubles et les alliances, fragiles. Devenu amiral, Thrawn devra faire face à une insurrection qui menace non seulement des vies innocentes, mais également la suprématie de l\'Empire sur la galaxie... sans oublier son plan de carrière.', 0, '2014-06-18', 'ISBN 13 :798-7-4814-9642-7'),
(5, 'Gargamel Le Généreux', 'gargamel_le_genereux.jpg', 'Depuis le temps que nous voyons les plans de Gargamel échouer, on se doute bien que sa vie n\'est pas drôle tous les jours ! Si vous saviez ! Ca n\'est probablement que la partie émergée de l\'iceberg. Les histoires courtes, totalement inédites en album, rassemblées dans ce recueil vous permettront de découvrir tous les petits tracas qui composent le quotidien de Gargamel : des ogres un peu trop gourmands au cousin sorcier qui choisit de prendre la défense des Schtroumpfs. Ce « Méchant » qu\'on adore haïr devient une star de l\'écran en 3D cet été.', 0, '2021-02-24', 'ISBN 13 :579-7-4574-9142-7'),
(6, 'Voyage au centre de la Terre', 'voyage_au_centre_de_la_terre.jpg', 'Dans la petite maison du vieux quartier de Hambourg où Axel, jeune homme assez timoré, travaille avec son oncle, l’irascible professeur Lidenbrock, géologue et minéralogiste, dont il aime la pupille, la charmante Graüben, l’ordre des choses est soudain bouleversé.\r\nDans un vieux manuscrit, Lidenbrock trouve un cryptogramme. Arne Saknussemm, célèbre savant islandais du xvie siècle, y révèle que par la cheminée du cratère du Sneffels, volcan éteint d’Islande, il a pénétré jusqu’au centre de la Terre !\r\nLidenbrock s’enflamme aussitôt et part avec Axel pour l’Islande où, accompagnés du guide Hans, aussi flegmatique que son maître est bouillant, ils s’engouffrent dans les mystérieuses profondeurs du volcan…\r\nEn décrivant les prodigieuses aventures qui s’ensuivront, Jules Verne a peut-être atteint le sommet de son talent. La vigueur du récit, la parfaite maîtrise d’un art accordé à la\r\npuissance de l’imagination placent cet ouvrage au tout premier plan dans l’œuvre exceptionnelle du romancier.\r\n\r\nIllustrations de l’édition originale Hetzel.', 0, '1864-11-25', 'ISBN 13 :579-7-5274-1265-7'),
(7, 'Ça', 'ça.jpg', 'Tout avait commencé juste avant les vacances d\'été quand le petit Browers avait gravé ses initiales au couteau sur le ventre de son copain Ben Hascom. Tout s\'était terminé deux mois plus tard dans les égouts par la poursuite infernale d\'une créature étrange, incarnation même du mal. Mais aujourd\'hui tout recommence. Les enfants terrorisés sont devenus des adultes. Le présent retrouve le passé, le destin reprend ses droits, l\'horreur ressurgit. Chacun retrouvera dans ce roman à la construction saisissante ses propres souvenirs, ses angoisses et ses terreurs d\'enfant, la peur de grandir dans un monde de violence.', 0, '1988-11-09', 'ISBN 13 :989-7-5744-1245-7');

-- --------------------------------------------------------

--
-- Structure de la table `work_author`
--

DROP TABLE IF EXISTS `work_author`;
CREATE TABLE IF NOT EXISTS `work_author` (
  `id_author` int DEFAULT NULL,
  `id_work` int DEFAULT NULL,
  KEY `id_author` (`id_author`),
  KEY `id_work` (`id_work`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `work_category`
--

DROP TABLE IF EXISTS `work_category`;
CREATE TABLE IF NOT EXISTS `work_category` (
  `id_category` int DEFAULT NULL,
  `id_work` int DEFAULT NULL,
  KEY `id_category` (`id_category`),
  KEY `id_work` (`id_work`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `work_genre`
--

DROP TABLE IF EXISTS `work_genre`;
CREATE TABLE IF NOT EXISTS `work_genre` (
  `id_genre` int DEFAULT NULL,
  `id_work` int DEFAULT NULL,
  KEY `id_genre` (`id_genre`),
  KEY `id_work` (`id_work`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `copy_ibfk_2` FOREIGN KEY (`id_editor`) REFERENCES `editor` (`id_editor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `copy_ibfk_3` FOREIGN KEY (`id_work`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`id_copy`) REFERENCES `copy` (`id_copy`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_author`
--
ALTER TABLE `work_author`
  ADD CONSTRAINT `work_author_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_author_ibfk_3` FOREIGN KEY (`id_work`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_category`
--
ALTER TABLE `work_category`
  ADD CONSTRAINT `work_category_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_category_ibfk_4` FOREIGN KEY (`id_work`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_genre`
--
ALTER TABLE `work_genre`
  ADD CONSTRAINT `work_genre_ibfk_3` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_genre_ibfk_4` FOREIGN KEY (`id_work`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
