-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 12 avr. 2022 à 16:58
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
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `reference_category`, `name_category`) VALUES
(1, 'category_fresh', 'FRESH'),
(2, 'category_politics', 'POLITICS');

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
  `content_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sourceOneTitle_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sourceOneUrl_news` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sourceTwoTitle_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sourceTwoUrl_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sourceThreeTitle_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sourceThreeUrl_news` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `id_category_news`, `id_user_news`, `date_news`, `title_news`, `content_news`, `image_news`, `sourceOneTitle_news`, `sourceOneUrl_news`, `sourceTwoTitle_news`, `sourceTwoUrl_news`, `sourceThreeTitle_news`, `sourceThreeUrl_news`) VALUES
(3, 1, 21, '12/04/2022', 'Ddddddddddddddddddd', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '../model/Uploads/image_news.png', '0123456789yyy', 'https://9gag.com/', '', '', '', ''),
(4, 2, 21, '12/04/2022', 'Gggggggggggggggg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '../model/Uploads/', '0123456789', 'https://9gag.com/', '', '', '', ''),
(5, 1, 21, '12/04/2022', 'Sssssssssssssssss', 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '../model/Uploads/', '0123456789', 'https://9gag.com/', '', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(21, 'button_profil', 'text', 'PROFIL'),
(24, 'login', 'text', 'LOGIN :'),
(25, 'password', 'text', 'PASSWORD :'),
(26, 'repeatPassword', 'text', 'REPEAT PASSWORD :'),
(27, 'publishStepOne', 'text', 'STEP 1/3 : REDACTION'),
(28, 'publishTitle', 'text', 'TITLE :'),
(29, 'publishContent', 'text', 'CONTENT :');

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
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login_user`, `password_user`, `email_user`) VALUES
(21, 'xxx', '$2y$10$b29bAnr1WVWkx75uLfdnZuF8EyBgO5x1euTbs8c3iFeln40BmF7kG', 'xxx@gmail.com'),
(20, 'zoz', '$2y$10$65290kATCAtKBqFV.pLkkuhejD3KLxH08w8uVlCwkpkJpgxMoaATu', 'zoz@email.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
