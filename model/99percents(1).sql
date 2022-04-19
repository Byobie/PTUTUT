-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 19 avr. 2022 à 15:50
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `99percents`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `reference_category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image_category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `reference_category`, `name_category`, `image_category`) VALUES
(2, 'category_politics', 'POLITICS', '../../view/image/politics.png'),
(3, 'category_animals', 'ANIMALS', '../../view/image/paw.png'),
(4, 'category_satirical', 'SATIRICAL', '../../view/image/pitre.png');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `id_category_news` int(11) NOT NULL,
  `id_user_news` int(11) NOT NULL,
  `date_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content_news` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sourceOneTitle_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sourceOneUrl_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sourceTwoTitle_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sourceTwoUrl_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sourceThreeTitle_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sourceThreeUrl_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `id_category_news`, `id_user_news`, `date_news`, `title_news`, `content_news`, `image_news`, `sourceOneTitle_news`, `sourceOneUrl_news`, `sourceTwoTitle_news`, `sourceTwoUrl_news`, `sourceThreeTitle_news`, `sourceThreeUrl_news`) VALUES
(11, 2, 22, '19/04/2022', 'Elon musk wants to buy twitter', 'Elon Musk seeks to acquire the famous social network Twitter, with an offer of 54,20 dollars per action, for a total of 40 billiards of dollars.\r\n\r\nHe justifies his offer by stating that \"it\'s important that people have the feeling of expressing themselves freely and that it is a reality, within the limits of the law, of course\". Particularly, he plans to cancel a number of restrictions.', '../model/Uploads/elon-musk-twitter-0405221.jpg', 'France info', 'https://www.francetvinfo.fr/internet/reseaux-sociaux/twitter/le-multimilliardaire-elon-musk-s-attaque-au-reseau-social-twitter_5087542.html', 'L\'officiel', 'https://www.lofficiel.com/industry-trends/elon-musk-veut-acheter-twitter-paris-hilton-metaverse', '', ''),
(9, 4, 22, '11/04/2022', 'Men imports chinese version of films to avoid lgbtq stuff', '\"It\'s actually pretty convenient,\" said Sam Hancock to reporters with the Tampa Bay Times. \"The movie has already been professionally cut by the studios so I don\'t have to groan for part of the movie. Sure, six seconds might not sound like much but I don\'t care what you think.\" Hancock later informed reporters the only downside to his consuming censored media was that he kept forgetting Tawain was an independent nation.', '../model/Uploads/article-10909-2.jpg', 'The babylon bee : smart: man imports chinese version of films so he doesn\'t have to see all the lgbtq stuff', 'https://babylonbee.com/news/desantis-signs-bill-mandating-florida-theaters-show-whatever-version-of-each-movie-is-released-in-china', '', '', '', ''),
(12, 3, 26, '19/04/2022', 'The carcinisation : an example of convergent evolution', 'Carcinisation (or carcinization) is an example of convergent evolution in which a crustacean evolves into a crab-like form from a non-crab-like form. \r\n\r\nThe term was introduced into evolutionary biology by L. A. Borradaile, who described it as \"one of the many attempts of Nature to evolve a crab\". It consists essentially in a reduction of the abdomen of a macrurous crustacean, together with a depression and broadening of its cephalothorax, so that the animal assumes the general habit of body of a crab.\r\n\r\nMost carcinised crustaceans belong to the infraorder Anomura.', '../model/Uploads/South_eastern_Pacific_species_of_Petrolisthes,_Allopetrolisthes,_and_Liopetrolisthes_(Porcellanidae).jpg', 'Wikipedia : carcinisation', 'https://en.wikipedia.org/wiki/carcinisation', '', '', '', ''),
(7, 3, 22, '13/04/2022', 'The kakapo, world weirdest parrot !', 'The kākāpō is a large green parrot with a distinctive owl-like face and a waddling gait. They cannot fly, but they climb well. Kākāpō are nocturnal, flightless, the only lek-breeding parrot species in the world, perhaps the longest-lived bird species in the world, estimated to reach 90 years, the heaviest parrot species in the world – smaller females weigh 1.4 kg, and males 2.2 kg. And they can pile on 1 kg of fat prior to a breeding season.', '../model/Uploads/DHFkECgXoAArDG4.jpg', 'New-zealand government\'s website : the kakapo', 'https://www.doc.govt.nz/nature/native-animals/birds/birds-a-z/kakapo/', '', '', '', ''),
(14, 2, 26, '19/04/2022', 'Henry de lesquen, french far right activist, sentenced', 'Six months suspended prison sentence and 15,000 euros fine were requested on Wednesday against Henry de Lesquen, president of Radio Courtoisie and presidential candidate prosecuted by the courts for \"public insults, contestation of crimes against humanity and provocation to racial hatred”.', '../model/Uploads/13256233_1184826784923511_8616962172204950523_n.png', 'Le figaro, \"les num??ros de claquettes d\'henry de lesquen ne font pas rire le tribunal\"', 'https://www.lefigaro.fr/actualite-france/2016/12/08/01016-20161208artfig00158-les-numeros-de-claquettes-d-henry-de-lesquen-ne-font-pas-rire-le-tribunal.php', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id_site` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('image','text','category') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`id_site`, `reference`, `type`, `value`) VALUES
(1, 'main_page', 'text', 'Main page'),
(2, 'logo', 'text', '99%'),
(3, 'button_publish', 'text', 'PUBLISH'),
(4, 'button_sign_in', 'text', 'LOG IN'),
(5, 'button_sign_up', 'text', 'REGISTER'),
(22, 'button_logout', 'text', 'LOGOUT'),
(8, 'bright_mode', 'text', 'BRIGHT MODE'),
(9, 'switch_theme', 'image', '../../view/image/switch_dark.png'),
(10, 'category_fresh', 'category', 'FRESH'),
(11, 'image_category_fresh', 'image', '../../view/image/fresh.png'),
(12, 'category_politics', 'category', 'POLITICS'),
(13, 'image_category_politics', 'image', '../../view/image/politics.png'),
(14, 'info_sitemap', 'text', 'Sitemap'),
(15, 'info_credits', 'text', 'Credits'),
(16, 'info_legal_mentions', 'text', 'Legal mentions'),
(17, 'info_contact', 'text', 'Contact'),
(18, 'menu_tablet_mobile', 'image', '../../view/image/menu.png'),
(23, 'emailAdress', 'text', 'EMAIL ADRESS :'),
(21, 'button_admin', 'text', 'ADMIN'),
(24, 'login', 'text', 'LOGIN :'),
(25, 'password', 'text', 'PASSWORD :'),
(26, 'repeatPassword', 'text', 'REPEAT PASSWORD :'),
(27, 'publishStepOne', 'text', 'STEP 1/3 : REDACTION'),
(28, 'publishTitle', 'text', 'TITLE :'),
(29, 'publishContent', 'text', 'CONTENT :'),
(30, 'button_viewMore', 'text', 'VIEW MORE');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type_user` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login_user`, `password_user`, `email_user`, `type_user`) VALUES
(26, 'ZAZIUM', '$2y$10$eLuENmz4jQv3To2/01etlOF2j33sWleph3/yr4p5uzjOkM0.YQfdm', 'ZAZIUM@mail.com', 'user'),
(22, 'ZOMGZUFALL', '$2y$10$qH42gpqjZw4yac2mz4hd6O5PrYNWpP1vH6dCLg9SkHzrTdt0bdDFe', 'ZOMGZUFALL@mail.com', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
