-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 mars 2023 à 10:54
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

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
(7, 'King', 'Stephan'),
(8, 'Arthur Conan', 'Doyle'),
(9, 'Doyle', 'Arthur Conan'),
(10, 'Irwin', 'Chris'),
(11, 'Weber', 'Bob'),
(12, 'Dumas', 'Frédéric'),
(13, 'Basta', 'Bambou'),
(14, 'Monneret', 'Philippe'),
(15, 'Hill', 'Napoleon'),
(16, 'Schtroumpfs', 'robert'),
(17, 'Obata', 'Takeshi'),
(18, 'Ohba', 'Tsugumi'),
(19, 'Ohba', 'Tsugumi'),
(20, 'Ohba', 'Tsugumi');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'roman'),
(2, 'encyclopedie');

-- --------------------------------------------------------

--
-- Structure de la table `copy`
--

DROP TABLE IF EXISTS `copy`;
CREATE TABLE IF NOT EXISTS `copy` (
  `id_copy` int NOT NULL AUTO_INCREMENT,
  `editor_id` int DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `work_id` int NOT NULL,
  `stock` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_copy`) USING BTREE,
  KEY `WORK` (`work_id`),
  KEY `EDITOR` (`editor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `copy`
--

INSERT INTO `copy` (`id_copy`, `editor_id`, `location`, `work_id`, `stock`) VALUES
(1, 2, 'section education', 1, 1),
(2, 2, 'section education', 1, 1),
(3, 2, 'section education', 1, 1),
(4, 2, 'section education', 1, 1),
(5, 2, 'section education', 1, 0),
(6, 2, 'section education', 1, 0),
(7, 2, 'section enfant', 2, 0),
(8, 2, 'section enfant', 2, 0),
(9, 2, 'section enfant', 2, 1),
(10, 2, 'section enfant', 2, 1),
(11, 2, 'section enfant', 2, 1),
(12, 1, 'section aventure', 3, 0),
(13, 1, 'section aventure', 3, 0),
(14, 3, 'section aventure', 3, 0),
(15, 3, 'section sci-fi', 4, 1),
(16, 3, 'section sci-fi', 4, 1),
(17, 1, 'section enfant', 5, 1),
(18, 1, 'section enfant', 5, 1),
(19, 1, 'section enfant', 5, 0),
(20, 3, 'section aventure', 6, 0),
(21, 3, 'section aventure', 6, 0),
(22, 3, 'section aventure', 6, 1),
(23, 2, 'section horreur', 7, 1),
(24, 2, 'section horreur', 7, 1),
(26, 1, 'section horreur', 7, 0),
(27, 1, 'section horreur', 7, 0),
(28, 2, 'section aventure', 8, 0),
(29, 2, 'section aventure', 8, 0),
(30, 3, 'section aventure', 9, 1),
(31, 3, 'section aventure', 9, 1),
(32, 3, 'section aventure', 9, 0),
(33, 1, 'section détective', 10, 1),
(34, 1, 'section détective', 10, 1),
(35, 1, 'section détective', 10, 1),
(36, 3, 'section détective', 11, 0),
(37, 3, 'section détective', 11, 0),
(38, 2, 'section education', 12, 1),
(39, 2, 'section education', 12, 1),
(40, 2, 'section education', 12, 0),
(41, 2, 'section enfant', 13, 1),
(42, 2, 'section enfant', 13, 1),
(43, 2, 'section enfant', 13, 1),
(44, 2, 'section enfant', 13, 0),
(45, 2, 'section enfant', 13, 0),
(46, 2, 'section education', 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id_editor` int NOT NULL AUTO_INCREMENT,
  `editor_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `number` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_editor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `editor`
--

INSERT INTO `editor` (`id_editor`, `editor_name`, `number`, `date`) VALUES
(1, 'Fred', 5959, '2021-05-31'),
(2, 'Jirka', 5498, '2012-08-08'),
(3, 'Cocotte', 2687, '1987-11-03');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `name`) VALUES
(1, 'aventure'),
(2, 'horreur'),
(3, 'historique'),
(4, 'enfant'),
(5, 'sci-fi'),
(6, 'education'),
(7, 'romantique'),
(8, 'détective'),
(9, 'jeunesse'),
(10, 'enfant'),
(11, 'education'),
(12, 'education'),
(13, 'Manga'),
(14, 'Manga'),
(15, 'Manga'),
(16, 'Manga');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `mail`, `password`, `adress`, `avatar`, `role`) VALUES
(1, 'Azrael', 'Gargamel', 'mortauxSchtroumpfs@gmail.com', '12345', '55 Rue de la Paix, Paris', NULL, 0),
(2, 'demo', 'demo', 'demo@gmail.com', '$2y$10$d45qqoOyOrdYSBHA5E4yYOBsoW/p02O01UJxpC7/tyHJYhRQnPzn6', 'gfyjfyutr', NULL, 0),
(3, 'admin', 'admin', 'admin@gmail.com', '12345', 'Place de la Bière, Dijon', NULL, 1),
(7, 'Maya', 'Abeille', 'maya@gmail.com', '$2y$10$HEkwsfLRAs3jJzh4k06jfuPpeKHqNusucEjACwz3AR/sNG/ZZp4iS', NULL, NULL, NULL),
(9, 'Cocotte', 'Elisa', 'elisa@google.com', '$2y$10$odqpKdrFFQbyV//dBckZBeOL5kd0jZ3TG2DD8ROjb5cSYiCvQNlS.', NULL, NULL, NULL),
(10, 'Papa', 'Papa Schtroumpf', 'papaSchtroumpf@gmail.com', '$2y$10$YU4A1C80dqo1GqSi9muzcun6qVWiIRqAqtXaoYu5a05ivdHN.RFgK', NULL, NULL, NULL),
(11, 'de', 'Schtroumpfette', 'Schtroumpfette@gmail.com', '$2y$10$jJIAm2UDCCQpVLa7SCgan.ltw3LqW9ICG/gAMG3sSZIbIAuYny/ZS', NULL, NULL, NULL),
(22, 'KIng', 'Kong', 'Kong@gmail.com', '$2y$10$oUJ.0jlCzmlAHQ819Pck6O6WiCaAFWIUJG.OYVHxJOGqoCpMTbOfi', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

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
(7, 'Ça', 'ça.jpg', 'Tout avait commencé juste avant les vacances d\'été quand le petit Browers avait gravé ses initiales au couteau sur le ventre de son copain Ben Hascom. Tout s\'était terminé deux mois plus tard dans les égouts par la poursuite infernale d\'une créature étrange, incarnation même du mal. Mais aujourd\'hui tout recommence. Les enfants terrorisés sont devenus des adultes. Le présent retrouve le passé, le destin reprend ses droits, l\'horreur ressurgit. Chacun retrouvera dans ce roman à la construction saisissante ses propres souvenirs, ses angoisses et ses terreurs d\'enfant, la peur de grandir dans un monde de violence.', 0, '1988-11-09', 'ISBN 13 :989-7-5744-1245-7'),
(8, 'Vingt mille lieues sous les Mers', 'vingt_mille_lieus_sous_les_mers.jpg', 'Un monstre marin, « une chose énorme », ayant été signalé par plusieurs navires à travers le monde, une expédition est organisée sur l’Abraham Lincoln, frégate américaine, pour purger les mers de ce monstre inquiétant. A bord se trouvent le Français Pierre Aronnax, professeur au Muséum de Paris, et Conseil, son fidèle domestique.Une fois parvenus en vue du monstre, deux immenses trombes d’eau s’abattent sur le pont de la frégate, précipitant Aronnax, Conseil et le harponneur canadien Ned Land sur le dos du monstre… qui se révèle être un fabuleux sous-marin, le Nautilus, conçu et commandé par un étrange personnage, le capitaine Nemo, qui paraît farouchement hostile à toute l’humanité !Condamnés à ne plus jamais revoir leur patrie, leurs parents, leurs amis, la plus extraordinaire aventure commence pourtant pour les trois hommes...La mer était une passion pour Jules Verne ; c’est elle l’héroïne de Vingt mille lieues sous les mers, l’un de ses meilleurs et plus célèbres romans.', 0, '2023-04-02', 'ISBN 13 :454-7-3544-1224-4'),
(9, 'L\'île mystérieuse', 'L\'ile_mystérieuse.jpg', 'Au cours de la guerre de Sécession, cinq Nordistes : l\'ingénieur Cyrus Smith et son chien Top, le reporter Gédéon Spilett, le Noir Nab, le marin Pencroff et le jeune Harbert, prisonniers des troupes séparatistes, se sont enfuis en balIon. Pris dans la tempête, ils échouent sur une île déserte, en plein océan Pacifique.Ingénieux, persévérants, les cinq compagnons, pourtant privés de tout, ne tardent pas à s\'organiser, à vivre presque normalement. D\'ailleurs, l\'île, qu\'ils baptisent du nom de Lincoln, offre des ressources admirables et tout à fait inattendues. Mais une série de faits inexplicables, des coïncidences troublantes les obligent à croire à la présence d\'une puissance mystérieuse qui les épie sans cesse et conduit leur destinée, leur imposant sa volonté par des voies détournées, intervenant pour les sauver aux moments critiques...L\'Ile mystérieuse, un des très grands romans de Jules Verne, cet enchanteur aux charmes inépuisables.', 0, '1875-04-02', 'ISBN 13 :245-7-3571-1298-3'),
(10, 'Le chien des Baskerville', 'Le_chien_des_Baskerville.jpg', 'Une malédiction pèse sur les Baskerville, qui habitent le vieux manoir de leurs ancêtres, perdu au milieu d\'une lande sauvage : quand un chien-démon, une bête immonde, gigantesque, surgit, c\'est la mort. Le décès subit et tragique de Sir Charles Baskerville et les hurlements lugubres que l\'on entend parfois venant du marais, le grand bourbier de Grimpen, accréditent la sinistre légende. Dès son arrivée à Londres, venant du Canada, Sir Henry Baskerville, seul héritier de Sir Charles, reçoit une lettre anonyme : \" Si vous tenez à votre vie et à votre raison, éloignez-vous de la lande. \" Malgré ces menaces, Sir Henry décide de se rendre à Baskerville Hall, accompagné de Sherlock Holmes et de son fidèle Watson.', 0, '1935-11-12', 'ISBN 13 :245-7-4447-2654-6'),
(11, 'Son dernier coup d\'archet', 'Son_dernier_coup_d\'archet.jpg', 'Chacun sait que lorsque Sir Arthur Conan Doyle voulut faire mourir son héros, de désarroi et la colère de ses admirateurs furent tels qu\'il dut s\'arranger pour le ressusciter... Qu\'on se rassure : le \" drenier coup d\'archet \" que donne ici le plus célèbre violoniste de la littérature Policière - également opiomane, botaniste, criminologue le laisse en parfaite condition pour de nouvelles enquêtes. Dans les huit nouvelles de ce volume, son extraordinaire aptitude à la déduction imprévisible et raisonnée lui permet de faire la lumière - entre autres - sur les menées d\'un dictateur sud-américain, en fuite ou les agissements de la mafia napolitaine à New York, aussi bien que de donner un sérieux coup de main, à la veille de la Première Guerre mondiale, au contre-espionnage britannique. Comme il se doit, la brume londonienne enveloppe ces affaires ténébreuses, contées par l\'indispensable Dr Watson avec l\'art de la mise en scène et le sens du suspense qu\'ils ont fait du Signe des Quatre ou du chien des Baskerville des classiques de la littérature mondiale.', 0, '1938-08-31', 'ISBN 13 :874-6-2457-6478-8'),
(12, 'Les chevaux ne mentent jamais: Le secret des chuchoteurs', 'Les_chevaux_ne_mentent_jamais.jpg', 'Quand nous cherchons à communiquer avec eux, les chevaux nous révèlent des choses sur nous-mêmes. Mêlant réflexions sur la relation humain-cheval, commentaires morphologiques, analyse du langage corporel et explications techniques simples sur le dressage sans résistance, Chris Irwin montre combien assurance intérieure, conscience de soi, honnêteté et confiance sont indispensables dans l\'établissement d\'une bonne relation avec le cheval.\r\n\r\nChris Irwin a sillonné l\'Amérique du Nord et l\'Europe pour porter la parole du dressage sans résistance, une pratique développée en trente années. Ses cours lui ont valu la réputation de meilleur dresseur du Canada et ses livres sont traduits dans le monde entier.', 1, '2022-05-26', 'ISBN 13 :654-4-24752485-1'),
(13, 'Joe Bar team, tome 1', 'joe-bar-team1', 'Ils sont 7 cinglés à moto prêts à tout. Champions des tours chronométrés du pâté de maison, ces rois de l\'arsouille cumulent les gamelles. Quand ils ne sont pas sur leurs motos, on les retrouve au comptoir du Joe Bar en train de commenter leurs derniers exploits avec une mauvaise foi de rigueur ... Cette BD qui pétarade, sent l\'huile bouillie et le radar cramé, est plus qu\'un succès phénoménal. Tous les motards en herbe se sont réveillés à la lecture de ces gags pour, à l\'unisson, chanter la gloire du Joe Bar Team... refrain repris en cœur par les lecteurs de BD du monde entier. Opération lifting pour le Joe Bar Team, la série culte des années 90, qui change la carrosserie de ses 4 bolides : une nouvelle impression et4 nouvelles couvertures, dynamiques et accrocheuses, viennent revitaminer la collection qui s\'apprête, du même coup, à toucher encore plus de nouveaux lecteurs. En attendant l\'arrivée du tome 5, signé Bar2, et le raz de marée qui s\'en suivra, voici les aventures du Joe Bar Team prêtes à gagner tout un tas de nouvelles courses !', 1, '2003-05-14', 'ISBN-13 :978-2749300566'),
(14, '50 pilotes de légende en MotoGP', '50 pilotes de legende en MotoGP.jpg', 'Les 50 meilleurs pilotes moto de l\'histoire classés et portraiturés par deux spécialistes\r\nD\'Agostini à Rossi, de Doohan à Marquez, de Rougerie à Laconi... qui est le meilleur ? Lequel a le plus marqué son époque ?\r\nÀ l\'heure où un Français est champion du monde en titre, deux experts livrent leur classement argumenté des 50 meilleurs pilotes de l\'histoire. Une façon de revisiter, ou de découvrir, une discipline en plein boom avec un Top 50 établi sur des critères précis : talent, palmarès, charisme, popularité.\r\nLe livre permettra aux nostalgiques ou aux fans actuels de voyager dans le temps à travers ces pilotes fédérateurs, avec des histoires uniques. Certains ont connu des destins tragiques ou miraculeux. Chaque parcours est marquant et passionnant.', 1, '2022-05-12', 'ISBN-10 :226317902X'),
(15, 'Réfléchissez et devenez riche: Le grand livre de l’esprit maître', 'Reflechissez et devenez riche.jpg', '«Les principes contenus dans ce livre ont été réunis à partir de l’expérience de plus de 500 hommes qui ont réellement accumulé de grandes richesses. Des gens qui ont d’abord été pauvres, qui n’avaient reçu que peu d’éducation et qui n’ont bénéficié d’aucune relation influente. Ces principes ont bien servi ces hommes. Vous pouvez les mettre à profit vous-même. Et vous trouverez que c’est beaucoup plus facile que difficile.» L’ouvrage Réfléchissez et devenez riche de Napoleon Hill est devenu la bible de la prospérité et du succès pour des millions de lecteurs depuis sa publication initiale en 1937. Les 13 «étapes vers la richesse» que Hill met en lumière sont devenues un tremplin vers une meilleure vie pour des gens de tous les horizons: des gens d’affaires aux étudiants, en passant par tous ceux qui veulent atteindre leur but dans la vie et vivre leurs passions. Remaniée dans ce nouveau format interactif et facile à utiliser, avec plus d’une douzaine d’éléments\r\nexclusifs, cette édition sera la seule édition que tout étudiant sérieux de Réfléchissez et devenez riche voudra utiliser, non seulement pour lire le texte, mais aussi pour le comprendre, le maîtriser et le mettre en action dans sa vie.', NULL, '2014-03-05', ''),
(16, 'Death Note - Tome 1', 'death-notet1.jpg', 'Light Yagami ramasse un étrange carnet oublié dans la cour de son lycée. Selon les instructions du carnet, la personne dont le nom est écrit dans les pages du Death Note mourra dans les 40 secondes !! Quelques jours plus tard, Light fait la connaissance de l\'ancien propriétaire du carnet : Ryûk, un dieu de la mort ! Poussé par l\'ennui, il a fait entrer le carnet sur terre. Ryûk découvre alors que Light a déjà commencé à remplir son carnet...', 1, '2007-01-18', 'ISBN-13 :978-2505000327'),
(17, 'Death Note - Tome 2', 'death-notet2.jpg', 'Light entend bien imposer au monde sa vision de la Justice ! De nombreux criminels sont morts après que leurs noms aient été inscrits dans le Death Note ! Alerté par ces morts étranges, le FBI enquête au Japon. Light fait partie des suspects mais, grâce au Death Note, il parvient à se débarrasser des soupçons qui pèsent sur lui. Malgré cela, L, continue à suivre le jeune homme !', NULL, '2007-02-01', 'ISBN-13 :978-2505000426'),
(18, 'Death Note - Tome 3', 'death-notet3.jpg', 'La résidence de Light est placée sous surveillance vidéo. L et Light se livrent un duel silencieux relayé par les caméras cachées dans la maison du jeune homme. Grâce à un habile stratagème, Light parvient à établir la preuve de son innocence. Cela n\'empêche pas L d\'avoir des soupçons de plus en plus forts et de passer à l\'action. Parviendra-t-il à démasquer le mystérieux Kira ?!!', NULL, '2007-04-05', 'ISBN-13 :978-2505000792'),
(19, 'Death Note - Tome 4', 'death-notet4.jpg', 'Un second Kira, dont les méthodes diffèrent de celles de Light, a fait son apparition. Au quartier général d\'enquête, L contacte Light afin de lui demander sa collaboration. Ce dernier découvre alors le sens caché du message envoyé par l\'autre Kira ! Light décide de préparer une rencontre... !!', NULL, '2023-03-01', 'ISBN-13 :978-2505001065');

-- --------------------------------------------------------

--
-- Structure de la table `work_author`
--

DROP TABLE IF EXISTS `work_author`;
CREATE TABLE IF NOT EXISTS `work_author` (
  `author_id` int DEFAULT NULL,
  `work_id` int DEFAULT NULL,
  KEY `id_author` (`author_id`),
  KEY `id_work` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `work_author`
--

INSERT INTO `work_author` (`author_id`, `work_id`) VALUES
(3, 1),
(4, 2),
(1, 3),
(5, 4),
(6, 5),
(2, 6),
(7, 7),
(2, 4),
(2, 9),
(2, 8),
(9, 10),
(9, 11),
(10, 12),
(11, 12),
(13, 13),
(14, 14),
(15, 15),
(17, 16),
(18, 17),
(19, 18),
(20, 19);

-- --------------------------------------------------------

--
-- Structure de la table `work_category`
--

DROP TABLE IF EXISTS `work_category`;
CREATE TABLE IF NOT EXISTS `work_category` (
  `category_id` int DEFAULT NULL,
  `work_id` int DEFAULT NULL,
  KEY `id_category` (`category_id`),
  KEY `id_work` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `work_category`
--

INSERT INTO `work_category` (`category_id`, `work_id`) VALUES
(2, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Structure de la table `work_genre`
--

DROP TABLE IF EXISTS `work_genre`;
CREATE TABLE IF NOT EXISTS `work_genre` (
  `genre_id` int DEFAULT NULL,
  `work_id` int DEFAULT NULL,
  KEY `id_genre` (`genre_id`),
  KEY `id_work` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `work_genre`
--

INSERT INTO `work_genre` (`genre_id`, `work_id`) VALUES
(6, 1),
(4, 2),
(3, 3),
(3, 3),
(3, 3),
(5, 4),
(4, 5),
(1, 6),
(9, 6),
(2, 7),
(1, 8),
(9, 8),
(9, 9),
(1, 9),
(8, 10),
(8, 11),
(6, 12),
(4, 13),
(11, 14),
(12, 15),
(13, 16),
(14, 17),
(15, 18),
(16, 19);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `copy_ibfk_2` FOREIGN KEY (`editor_id`) REFERENCES `editor` (`id_editor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `copy_ibfk_3` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `work_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id_author`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_author_ibfk_3` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_category`
--
ALTER TABLE `work_category`
  ADD CONSTRAINT `work_category_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_category_ibfk_4` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_genre`
--
ALTER TABLE `work_genre`
  ADD CONSTRAINT `work_genre_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_genre_ibfk_4` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
