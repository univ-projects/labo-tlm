-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 26 Janvier 2019 à 14:20
-- Version du serveur :  5.7.14
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lrit`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE `affecter` (
  `id` int(11) NOT NULL,
  `proprietaireEquipe` int(10) UNSIGNED DEFAULT NULL,
  `materiel_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `from` datetime NOT NULL,
  `to` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`id`, `proprietaireEquipe`, `materiel_id`, `user_id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(74, NULL, 61, 25, '2019-01-25 22:34:09', NULL, '2019-01-26 13:04:46', '2019-01-26 13:04:46'),
(73, NULL, 76, 26, '2019-01-26 13:54:35', NULL, '2019-01-26 13:02:47', '2019-01-26 13:02:47'),
(72, NULL, 76, 11, '2019-01-26 13:54:35', '2019-01-26 14:02:47', '2019-01-26 12:54:35', '2019-01-26 13:02:47'),
(71, NULL, 61, 11, '2019-01-25 22:34:09', '2019-01-26 14:04:46', '2019-01-26 12:53:23', '2019-01-26 13:04:46'),
(70, 11, 61, NULL, '2019-01-25 22:34:09', '2019-01-26 13:53:23', '2019-01-26 12:53:12', '2019-01-26 12:53:23'),
(69, NULL, 61, 10, '2019-01-25 22:34:09', '2019-01-26 13:53:12', '2019-01-26 12:52:38', '2019-01-26 12:53:12'),
(68, 10, 58, NULL, '2019-01-25 22:34:09', NULL, '2019-01-26 12:52:26', '2019-01-26 12:52:26'),
(67, 2, 73, NULL, '2019-01-26 11:44:46', NULL, '2019-01-26 10:46:15', '2019-01-26 10:46:15'),
(66, 1, 75, NULL, '2019-01-26 11:45:33', NULL, '2019-01-26 10:45:54', '2019-01-26 10:45:54'),
(65, 9, 75, NULL, '2019-01-26 11:45:33', '2019-01-26 11:45:54', '2019-01-26 10:45:33', '2019-01-26 10:45:54'),
(64, NULL, 57, 14, '2019-01-25 22:27:39', NULL, '2019-01-25 21:28:00', '2019-01-25 21:28:00'),
(63, NULL, 57, 2, '2019-01-25 22:27:39', '2019-01-25 22:28:00', '2019-01-25 21:27:39', '2019-01-25 21:28:00'),
(62, NULL, 52, 10, '2019-01-25 21:46:10', NULL, '2019-01-25 21:15:49', '2019-01-25 21:15:49'),
(61, NULL, 52, 2, '2019-01-25 21:46:10', '2019-01-25 22:15:49', '2019-01-25 21:15:35', '2019-01-25 21:15:50'),
(60, 2, 53, NULL, '2019-01-25 21:46:10', NULL, '2019-01-25 21:04:24', '2019-01-25 21:04:24'),
(59, NULL, 53, 22, '2019-01-25 21:46:10', '2019-01-25 22:04:24', '2019-01-25 20:55:22', '2019-01-25 21:04:24'),
(58, NULL, 53, 2, '2019-01-25 21:46:10', '2019-01-25 21:55:22', '2019-01-25 20:54:57', '2019-01-25 20:55:22'),
(57, 1, 52, NULL, '2019-01-25 21:46:10', '2019-01-25 22:15:35', '2019-01-25 20:47:34', '2019-01-25 21:15:35'),
(52, NULL, 24, 16, '2018-11-27 22:49:09', '2018-11-29 22:45:28', '2018-11-29 21:45:14', '2018-11-29 21:45:28'),
(53, 2, 24, NULL, '2018-11-27 22:49:09', NULL, '2018-11-29 21:45:28', '2018-11-29 21:45:28'),
(54, NULL, 26, 20, '2018-11-28 13:41:49', '2018-11-29 22:45:54', '2018-11-29 21:45:40', '2018-11-29 21:45:54'),
(55, 1, 26, NULL, '2018-11-28 13:41:49', NULL, '2018-11-29 21:45:54', '2018-11-29 21:45:54'),
(56, NULL, 51, 3, '2018-12-25 10:39:09', NULL, '2018-12-25 09:39:09', '2018-12-25 09:39:09');

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apropos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `applications`
--

INSERT INTO `applications` (`id`, `titre`, `apropos`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'EasyLab', 'Cette application permet a tous les membres du laboratoire de recherche', 'uploads/photo/parametres/easyLabLogo.png', NULL, '2019-01-23 15:56:29');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `publicateur` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_ville` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_pays` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conference` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journal` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISSN` int(11) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `doi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `publicateur`, `type`, `titre`, `resume`, `lieu_ville`, `lieu_pays`, `conference`, `journal`, `ISSN`, `ISBN`, `doi`, `detail`, `created_at`, `updated_at`, `deleted_at`, `photo`, `date`) VALUES
(19, 1, 'Article long', 'Real-time management of transportation disruptions in forestry, Computers & Industrial Engineering', 'Real-time management of transportation disruptions in forestry, Computers & Industrial Engineering', 'TLM', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 08:51:24', '2019-01-26 09:21:12', NULL, 'uploads/photo/articles/articleDefault.png', '2017-02-15'),
(20, 1, 'Article court', 'A generalized partite-graph method for transportation data association, Transportation Research C: Emerging Technologies', 'A generalized partite-graph method for transportation data association, Transportation Research C: Emerging Technologies', 'ORN', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 09:28:43', '2019-01-26 09:28:43', NULL, 'uploads/photo/article/articleDefault.png', '2016-06-15'),
(21, 1, 'Poster', 'Vehicle software updates distribution with SDN and cloud computing', 'Vehicle software updates distribution with SDN and cloud computing', 'TLM', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 09:50:38', '2019-01-26 09:54:59', NULL, 'uploads/photo/articles/articleDefault.png', '2017-03-08'),
(22, 1, 'Publication(Revue)', 'QOS des réseaux mesh', 'QOS des réseaux mesh', 'ORN', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 09:54:21', '2019-01-26 09:54:21', NULL, 'uploads/photo/article/articleDefault.png', '2017-03-05'),
(23, 1, 'Publication(Revue)', 'QOS dans les réseaux manet', 'QOS des réseaux mesh', 'Alg', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 09:58:43', '2019-01-26 09:58:43', NULL, 'uploads/photo/article/articleDefault.png', '2016-01-12'),
(24, 1, 'Livre', 'Travel demand corridors: Modelling approach and relevance in the planning process', 'Travel demand corridors: Modelling approach and relevance in the planning process', 'TLM', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 10:00:26', '2019-01-26 10:00:26', NULL, 'uploads/photo/article/articleDefault.png', '2018-12-13'),
(25, 1, 'Article court', 'l\'économie d\'énergie dans les réseaux mesh', 'Travel demand corridors: Modelling approach and relevance in the planning process', 'ORN', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 10:02:01', '2019-01-26 10:02:01', NULL, 'uploads/photo/article/articleDefault.png', '2016-03-27'),
(26, 1, 'Brevet', 'Eco-driving training and fuel consumption: Impact, heterogeneity and sustainability,', 'Eco-driving training and fuel consumption: Impact, heterogeneity and sustainability,', 'TLM', 'ALG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 10:04:47', '2019-01-26 10:04:47', NULL, 'uploads/photo/article/articleDefault.png', '2017-10-11');

-- --------------------------------------------------------

--
-- Structure de la table `article_contact`
--

CREATE TABLE `article_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `article_contact`
--

INSERT INTO `article_contact` (`id`, `contact_id`, `article_id`, `created_at`, `updated_at`) VALUES
(24, 8, 24, '2019-01-26 10:00:26', '2019-01-26 10:00:26'),
(23, 6, 21, '2019-01-26 09:55:00', '2019-01-26 09:55:00'),
(22, 8, 21, '2019-01-26 09:55:00', '2019-01-26 09:55:00'),
(19, 6, 19, '2019-01-26 09:21:12', '2019-01-26 09:21:12');

-- --------------------------------------------------------

--
-- Structure de la table `article_user`
--

CREATE TABLE `article_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `article_user`
--

INSERT INTO `article_user` (`id`, `user_id`, `article_id`, `created_at`, `updated_at`) VALUES
(50, 4, 19, '2019-01-26 09:21:12', '2019-01-26 09:21:12'),
(51, 10, 19, '2019-01-26 09:21:12', '2019-01-26 09:21:12'),
(52, 3, 19, '2019-01-26 09:21:12', '2019-01-26 09:21:12'),
(53, 2, 20, '2019-01-26 09:28:43', '2019-01-26 09:28:43'),
(57, 20, 22, '2019-01-26 09:54:21', '2019-01-26 09:54:21'),
(58, 2, 21, '2019-01-26 09:55:00', '2019-01-26 09:55:00'),
(59, 10, 21, '2019-01-26 09:55:00', '2019-01-26 09:55:00'),
(60, 18, 21, '2019-01-26 09:55:00', '2019-01-26 09:55:00'),
(61, 3, 23, '2019-01-26 09:58:43', '2019-01-26 09:58:43'),
(62, 7, 23, '2019-01-26 09:58:44', '2019-01-26 09:58:44'),
(63, 8, 24, '2019-01-26 10:00:26', '2019-01-26 10:00:26'),
(64, 11, 24, '2019-01-26 10:00:26', '2019-01-26 10:00:26'),
(65, 19, 24, '2019-01-26 10:00:26', '2019-01-26 10:00:26'),
(66, 7, 25, '2019-01-26 10:02:02', '2019-01-26 10:02:02'),
(67, 9, 25, '2019-01-26 10:02:02', '2019-01-26 10:02:02'),
(68, 21, 25, '2019-01-26 10:02:02', '2019-01-26 10:02:02'),
(69, 18, 26, '2019-01-26 10:04:47', '2019-01-26 10:04:47');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `laboratoire` int(10) UNSIGNED DEFAULT NULL,
  `libelle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `laboratoire`, `libelle`, `photo`, `description`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 4, 'Lampes en verre flacons, béchers, esprit', 'uploads/photo/materiels/1548455649.jpg', 'Lampes en verre flacons, béchers, esprit', 9, '2019-01-25 21:34:09', '2019-01-26 12:54:35'),
(11, 3, 'Onduleur line-interactive 700 VA / 230 V', 'uploads/photo/materiels/1548503086.jpg', 'L\'onduleur line-interactive APC Back-UPS 700VA fournit une alimentation par batterie temporaire, en cas de panne de courant. En plus de cela, il dispose d\'une fonction d\'analyse des pannes de batteries avec alerte précoce, permettant ainsi d\'effectuer à temps une maintenance préventive.', 10, '2019-01-26 10:44:46', '2019-01-26 10:45:33'),
(9, 3, 'Arduino Uno SMD R3', 'uploads/photo/materiels/1548452770.jpg', 'The Arduino UNO is an open-source microcontroller board based on the Microchip ATmega328P microcontroller and developed by Arduino.cc.[2][3] The board is equipped with sets of digital and analog input/output (I/O)', 6, '2019-01-25 20:46:10', '2019-01-25 21:27:39');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partenaire_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `created_by`, `nom`, `prenom`, `photo`, `fonction`, `email`, `num_tel`, `partenaire_id`, `created_at`, `updated_at`) VALUES
(6, 1, 'Potvin', 'Alexis', 'uploads/photo/contacts/1548495185.jpg', NULL, 'Alexis@potvin.com', NULL, 1, '2019-01-26 08:33:05', '2019-01-26 08:33:05'),
(7, 1, 'Rhéaume', 'Parfait', 'uploads/photo/contacts/1548495688.jpg', NULL, 'Rheaume@parfait.com', '(555) 555-555-555', 1, '2019-01-26 08:41:28', '2019-01-26 08:41:28'),
(8, 1, 'Mohammed', 'Chaouchi', 'uploads/photo/contacts/1548495785.jpg', NULL, 'chaouchi@mohammed', NULL, 2, '2019-01-26 08:43:05', '2019-01-26 08:43:05');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `labo_id` int(10) UNSIGNED DEFAULT NULL,
  `chef_id` int(10) UNSIGNED DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achronymes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `axes_recherche` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `equipes`
--

INSERT INTO `equipes` (`id`, `labo_id`, `chef_id`, `intitule`, `resume`, `achronymes`, `axes_recherche`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 'EQUIPE SYSTÈMES COMMUNICANTS', 'La maitrise des systèmes d’informations, peut servir à développer certains services des réseaux comme le <b><i>e-learning</i></b>, la vente en ligne et la pertinence dans la recherche d’informations sur le web, entre autre la composition de services web, L\'équipe travaille aussi sur les antennes et leur performance qui va améliorer les performances en termes de débits des réseaux sans fil en optimisant la couche transmission.', 'ESC', NULL, 'uploads/photo/equipes/1544867465.png', '2018-05-02 17:24:49', '2018-12-15 08:51:05', NULL),
(2, 3, 10, 'Système d\'information et connaissance', 'Dans les nouveaux contextes de traitement de l’information les données numériques sont devenues souvent:\r\n \r\n \r\nhétérogènes\r\nnon ou partiellement structurées\r\nvolumineuses\r\ndistribuées/réparties\r\ncréées en flux continue et rapide\r\n \r\n\r\n \r\nIl est devenu impératif de disposer de nouveaux modèles de:\r\n \r\nreprésentation,\r\ntransformation,\r\nrecherche,\r\nrecommandation,\r\néchange,\r\nsécurité,\r\nvisualisation\r\ninterprétation des données,\r\nqui soient appropriés à ces spécificités.', 'sidk', NULL, 'uploads/photo/equipes/1544867720.png', '2018-05-03 07:50:13', '2018-12-15 08:55:20', NULL),
(9, 3, 18, 'RESEAU,SERVICES ET SYSTÈMES DISTRIBUÉS', '<p>\r\n\r\n• formation sur l\'administration réseau (installation et configuration de tous les serveurs)<br>• déploiement de réseaux<br>• développement d\'applications réseaux<br>• vidéosurveillance via un réseau wifi mesh<br>• création, hébergement et maintenance de sites web<br>• sécurisation d\'un réseau wifi avec un serveur d\'authentification radius professionnel pour les entreprises et les facultés<br>• formation et déploiement d\'une solution de téléphonie sur ip utilisant l\'ipabx asterisk\r\n\r\n<br></p>', 'RSD', '<p>\r\n\r\n• qualité de service, économie d\'énergie et sécurité des réseaux sans fil (ghiloubi, belhocine)<br>• les réseaux véhiculaires (hamza cherif, sedjelmaci)<br>• la radio cognitive (bendaouad, belhabi)<br>• les réseaux de capteurs (benaissa, bengheni, benmansour)<br>• le cloud computing (settouti, bouizem, younsi) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\n\r\n<br></p>', 'uploads/photo/equipes/materielDefault.png', '2019-01-25 20:05:22', '2019-01-25 20:05:22', NULL),
(10, 4, 25, 'Chimie organique, substances naturelles et analyse', '<p>Chimie organique, substances naturelles et analyse<br></p>', 'LRC', '<p>\r\n\r\nLa chimie analytique et de l’environnement sont des domaines de recherche importants au département de chimie. La métabolomique est au cœur des projets de recherche de la <a target="_blank" rel="nofollow" href="https://chimie.uqam.ca/corps-professoral/professeurs/professeur/sleno.lekha/">Pr Sleno</a>&nbsp;grâce à des techniques de chromatographie liquide et spectrométrie de masse de pointe, tandis que le <a target="_blank" rel="nofollow" href="https://chimie.uqam.ca/corps-professoral/professeurs/professeur/tra.huu/">Pr Van Tra</a>&nbsp;s’intéresse à l’analyse des contaminants de l’environnement et en milieu de travail. Pour sa part, le <a target="_blank" rel="nofollow" href="https://chimie.uqam.ca/corps-professoral/professeurs/professeur/belanger.daniel/">Pr. Bélanger</a>&nbsp;développe des outils électrochimiques pour le traitement de l’ammoniaque et du CO2. La <a target="_blank" rel="nofollow" href="https://chimie.uqam.ca/corps-professoral/professeurs/professeur/marcotte.isabelle/">Pr. Marcotte</a>&nbsp;s’intéresse à caractériser au niveau moléculaire l’interaction des contaminants avec les microalgues. Enfin, le <a target="_blank" rel="nofollow" href="https://chimie.uqam.ca/corps-professoral/professeurs/professeur/dewez.david/">Pr. Dewez</a>, étudie l’impact des contaminants organiques et métalliques sur le phytoplancton. Il s’intéresse non seulement à l’absorption et aux effets toxicologiques, mais également à la bioaccumulation et au potentiel d’utilisation des microalgues en phytoremédiation.\r\n\r\n<br></p>', 'uploads/photo/equipes/1548509337.jpg', '2019-01-26 12:15:18', '2019-01-26 12:33:49', NULL),
(11, 4, NULL, 'Physique théorique', '<p>Physique théorique<br></p>', 'LRP', '<p>\n\ncollisions atomiques, principe variationnel de Schwinger, excitation atomique, sections efficaces, collisions ions multichargés-atomes, saturation des sections efficaces.\n\n<br></p>', 'uploads/photo/equipes/1548508631.jpg', '2019-01-26 12:17:11', '2019-01-26 12:17:11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `contenu`, `photo`, `auteur`, `status`, `from`, `to`, `created_at`, `updated_at`, `lieu`) VALUES
(1, 'Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède', 'abc', 'uploads/photo/evenements/evenementDefault.jpg', 1, 0, '2018-11-22 12:00:00', '2018-11-23 08:00:00', '2018-11-21 22:39:30', '2018-11-21 22:39:30', NULL),
(2, 'Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède', 'test', 'uploads/photo/evenements/1542899082.jpg', 1, 1, '2018-11-10 09:00:00', '2018-11-15 05:00:00', '2018-11-22 10:08:56', '2018-11-22 14:04:42', NULL),
(3, 'gdg study jams', '<b>Study Jams</b> are community-run study groups for developers covering a range of Google Developers content. Typically, Study Jams focus on completing a course, and we focused on mobile Site Certification training.', 'uploads/photo/evenements/1542968245.jpg', 1, 1, '2018-11-01 09:00:00', '2018-11-03 16:00:00', '2018-11-23 09:17:25', '2018-12-15 16:10:11', 'Faculté des sciences ,Tlemcen');

-- --------------------------------------------------------

--
-- Structure de la table `evenement_user`
--

CREATE TABLE `evenement_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `evenement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `evenement_user`
--

INSERT INTO `evenement_user` (`id`, `user_id`, `evenement_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2018-11-22 21:44:12', '2018-11-22 21:44:12'),
(3, 20, 2, '2018-11-22 21:44:30', '2018-11-22 21:44:30'),
(4, 2, 2, '2018-11-22 21:47:39', '2018-11-22 21:47:39'),
(5, 9, 2, '2018-11-22 21:48:22', '2018-11-22 21:48:22'),
(7, 11, 2, '2018-11-22 21:49:13', '2018-11-22 21:49:13'),
(8, 18, 2, '2018-11-22 21:50:35', '2018-11-22 21:50:35'),
(9, 22, 2, '2018-11-22 21:51:19', '2018-11-22 21:51:19'),
(10, 23, 2, '2018-11-22 21:52:05', '2018-11-22 21:52:05'),
(11, 24, 2, '2018-11-22 21:52:35', '2018-11-22 21:52:35'),
(12, 15, 2, '2018-11-22 21:53:19', '2018-11-22 21:53:19'),
(15, 19, 2, '2018-11-22 21:58:50', '2018-11-22 21:58:50'),
(16, 20, 1, '2018-11-23 09:10:15', '2018-11-23 09:10:15');

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE `materiels` (
  `id` int(10) UNSIGNED NOT NULL,
  `proprietaireEquipe` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proprietaire` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `materiels`
--

INSERT INTO `materiels` (`id`, `proprietaireEquipe`, `category_id`, `numero`, `proprietaire`, `created_at`, `updated_at`) VALUES
(60, NULL, 10, '15484556492', NULL, '2019-01-25 21:34:09', '2019-01-25 21:34:09'),
(59, NULL, 10, '15484556491', NULL, '2019-01-25 21:34:09', '2019-01-25 21:34:09'),
(58, 10, 10, '15484556490', NULL, '2019-01-25 21:34:09', '2019-01-26 12:52:26'),
(57, NULL, 9, '1234', 14, '2019-01-25 21:27:39', '2019-01-25 21:28:00'),
(56, NULL, 9, '15484527704', NULL, '2019-01-25 20:46:10', '2019-01-25 20:46:10'),
(55, NULL, 9, '15484527703', NULL, '2019-01-25 20:46:10', '2019-01-25 20:46:10'),
(54, NULL, 9, '15484527702', NULL, '2019-01-25 20:46:10', '2019-01-25 20:46:10'),
(53, 2, 9, '15484527701', NULL, '2019-01-25 20:46:10', '2019-01-25 21:04:24'),
(52, NULL, 9, '15484527700', 10, '2019-01-25 20:46:10', '2019-01-25 21:15:49'),
(61, NULL, 10, '15484556493', 25, '2019-01-25 21:34:09', '2019-01-26 13:04:46'),
(62, NULL, 10, '15484556494', NULL, '2019-01-25 21:34:09', '2019-01-25 21:34:09'),
(63, NULL, 10, '15484556495', NULL, '2019-01-25 21:34:09', '2019-01-25 21:34:09'),
(64, NULL, 10, '15484556496', NULL, '2019-01-25 21:34:09', '2019-01-25 21:34:09'),
(65, NULL, 10, '15484556497', NULL, '2019-01-25 21:34:09', '2019-01-25 21:34:09'),
(66, NULL, 11, '15485030860', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(67, NULL, 11, '15485030861', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(68, NULL, 11, '15485030862', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(69, NULL, 11, '15485030863', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(70, NULL, 11, '15485030864', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(71, NULL, 11, '15485030865', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(72, NULL, 11, '15485030866', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(73, 2, 11, '15485030867', NULL, '2019-01-26 10:44:46', '2019-01-26 10:46:15'),
(74, NULL, 11, '15485030868', NULL, '2019-01-26 10:44:46', '2019-01-26 10:44:46'),
(75, 1, 11, '123456', NULL, '2019-01-26 10:45:33', '2019-01-26 10:45:54'),
(76, NULL, 10, '1234123', 26, '2019-01-26 12:54:35', '2019-01-26 13:02:47');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2018_04_08_211322_create_theses_table', 1),
(52, '2018_04_09_204533_add_column_deleted_at_theses', 1),
(53, '2018_04_09_210401_create_articles_table', 1),
(54, '2018_04_10_085223_add_column_deleted_at_articles', 1),
(55, '2018_04_13_163654_add_column_user_id', 1),
(56, '2018_04_14_084232_create_equipes_table', 1),
(57, '2018_04_14_084802_add_column_chef_id_equipes', 1),
(58, '2018_04_14_111044_create_projets_table', 1),
(59, '2018_04_14_111310_add_column_chef_id_projets', 1),
(60, '2018_04_15_092724_add_column_deleted_at_projets', 1),
(61, '2018_04_17_174505_add_column_equipe_id', 1),
(62, '2018_04_17_193937_add_column_deleted_at_equipes', 1),
(63, '2018_04_18_181942_create_article_user_table', 1),
(64, '2018_04_19_103337_create_roles_table', 1),
(65, '2018_04_19_103507_create_addcolumn_roleid_to_users_table', 1),
(66, '2018_04_21_111858_create_projet_users_table', 1),
(67, '2018_04_23_200122_create_paremetres_table', 1),
(68, '2018_11_18_203923_create_actualites_table', 2),
(69, '2018_11_18_210607_create_materiels_table', 3),
(70, '2018_11_18_211546_create_partenaires_table', 4),
(71, '2018_11_20_222644_create_actualites_table', 5),
(72, '2018_11_21_163854_create_evenements_table', 6),
(73, '2018_11_21_164703_create_evenement_users_table', 6),
(74, '2018_11_25_171450_modify_parametres_table', 7),
(75, '2018_11_25_204225_add_labo_equipes_table', 8),
(76, '2018_11_26_125359_create_partenaires_projets_table', 9),
(77, '2018_11_26_145258_create_category_table', 10),
(78, '2018_11_26_150202_create_affecter_table', 10),
(79, '2018_11_26_150657_add_column_category_id_materiel_table', 11),
(80, '2018_11_26_170735_add_column_category_id_table', 12),
(81, '2018_11_28_172003_create_contact_table', 13),
(82, '2018_11_28_172659_create_project_contact_table', 13),
(83, '2018_11_28_172720_create_article_contact_table', 13),
(84, '2018_11_28_172746_create_these_contact_table', 13),
(85, '2018_11_29_145950_add_column_proprietaire_equipe_materiels_table', 14),
(86, '2018_11_29_150154_add_column_proprietaire_equipe_affecter_table', 14),
(87, '2018_12_03_162634_update_partenaires_table', 15),
(88, '2018_12_09_160959_add_photo_projets_table', 16),
(89, '2018_12_09_161152_add_photo_articles_table', 16),
(90, '2018_12_13_221455_modify_contact_ext_theses_table', 17),
(91, '2018_12_15_164053_add_created_by_partenaires_table', 18),
(92, '2018_12_15_165328_add_created_by_contacts_table', 19),
(93, '2018_12_15_170653_add_lieu_evenements_table', 20),
(94, '2018_12_22_134329_add_column_laboratoire_categories_table', 21),
(95, '2018_12_23_211517_modify_encadreur_theses_table', 22),
(96, '2018_12_25_145330_add_foreign_articles_table', 23),
(97, '2019_01_12_163503_create_stages_table', 24),
(98, '2019_01_22_205610_add_delay_projet_table', 24),
(99, '2019_01_23_163142_create_applications_table', 25);

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id` int(10) UNSIGNED NOT NULL,
  `directeur` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `achronymes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apropos` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `parametres`
--

INSERT INTO `parametres` (`id`, `directeur`, `nom`, `logo`, `created_at`, `updated_at`, `achronymes`, `photo`, `apropos`) VALUES
(3, 10, 'Labo de recherche d\'informatique', '/uploads/photo/labos/1548259215.png', '2018-11-25 21:34:18', '2019-01-23 15:00:34', 'LRIT', '/uploads/photo/labos/laboImgDefault.png', 'La recherche <u>scientifique</u> constitue un enjeu déterminant au 21éme siècle eu égard aux défis technologiques et à la mondialisation qui sera le champ de confrontation entre les nations industrialisées et modernes, confrontation qui risque de reléguer au second plan les sociétés qui ne se donnent pas les moyens de se développer. Pour redynamiser les secteurs de la recherche, l\'Algérie a promulgué un ensemble de textes réglementaires et notamment la Loi n°98/11 du 22 Août 1998 portant loi d\'orientation et de programme à projection quinquennale 1998/2000, établi un plan national de la recherche scientifique (PNR) et institué un fonds national de la recherche scientifique et du développement technologique (FNR) chargé du financement de la recherche. En application de la Loi n° 98/11 sus-citée et du Décret exécutif n° 99/244 du 31/10/1999 fixant les règles de création, d\'organisation et de fonctionnement du laboratoire de recherche, tout enseignant chercheur ou chercheur associé peut introduire un dossier de proposition de création d\'un laboratoire de recherche. Le laboratoire de recherche est chargé de l\'exécution d\'un ou plusieurs thèmes de recherche scientifique et de développement technologique relatifs aux programmes nationaux de recherche (Art. 10 de la Loi 98/11). La proposition doit recevoir l\'aval du conseil scientifique de l\'établissement du rattachement.\r\n\r\nLe laboratoire de recherche a pour mission de réaliser des objectifs de recherche et de développement, exécuter des études et travaux de recherche et contribuer à l`acquisition du savoir, à l\'amélioration des connaissances, la formation pour et par la recherche et à la diffusion de l\'information scientifique et des résultats obtenus. Dirigé par un Directeur élu, il doit être constitué d\'au moins quatre équipes de recherche, chacune dirigée par un chercheur qualifié et constituée d\'au moins trois chercheurs. Le laboratoire de recherche est doté d\'un conseil de laboratoire chargé d`élaborer des programmes et d\'établir des états prévisionnels des recettes et des dépenses présentés par le directeur du laboratoire. Il est doté de l\'autonomie de gestion et soumis au contrôle financier à posteriori. Il est financé par les subventions du FNRSDT. Le laboratoire de recherche peut trouver ses propres sources de financement, dans le respect de la réglementation, en rapport avec ses activités de recherche par la conclusion de contrats de prestation de service avec des tiers. L`Université Abou Bekr Belkaid de Tlemcen contribué de manière concrète à la promotion de la recherche scientifique par le lancement de plusieurs projets de recherche et notamment la création de vingt laboratoires de recherche (créés durant l\'année 2000 par l\'arrêté n° 88 du 25/07/2000 -annexe1) et sept autres (créés durant l\'année 2001 par l\'arrêté n° 42 du 05/02/2001-annexe2) et cela dans divers thèmes de recherche scientifique tels que fixés par les programmes nationaux de recherche (PNR).'),
(4, 25, 'Laboratoire de chimie', '/uploads/photo/labos/1548510200.png', '2018-12-15 22:15:15', '2019-01-26 12:43:20', 'LCT', '/uploads/photo/labos/laboLogoDefault.png', 'labo chimie');

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `created_by`, `nom`, `type`, `pays`, `ville`, `logo`, `created_at`, `updated_at`, `description`, `lien`) VALUES
(1, NULL, 'laboratoire Paris', 'laboratoire', 'FR', 'Paris', 'uploads/photo/partenaires/1543877083.jpg', '2018-12-03 16:58:21', '2018-12-03 21:44:43', '<p><b><i>P</i>aris</b></p>', NULL),
(2, NULL, 'hopital Tlemcen', 'organisme', 'DZ', 'Tlemcen', 'uploads/photo/partenaires/materielDefault.png', '2018-12-05 16:13:05', '2018-12-05 16:13:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$9BjBqBK1Tb0Uad9vgLsvO.1a0et51bw9ChxbrT8NKiXWLveuJZtaS', '2018-05-02 16:46:19'),
('chikh@azeddine.com', '$2y$10$EgrKUNHokdw.jLFcYJ2vPuGJ1PNaoW8m4bjMsQAioDhZaUhA5mCnu', '2018-05-06 16:01:06'),
('mtadlaoui@hotmail.com', '$2y$10$O5nVLBhfFN.fCyzwWU3o..e8etmTIAsNmoOvuPPBENRYhvnaLf636', '2018-05-08 15:21:07'),
('trari.ahlem@gmail.com', '$2y$10$z10WdTsO4CbWc8MFuHyFJeg0wDqkeR8eK/v3/cdj.vciiR8yRWUIi', '2018-05-08 19:04:40'),
('ferielbrikci96@gmail.com', '$2y$10$qsel97ukIybaU8NIWnXdH.ZJDpdO1SfaLmLEigCWWX4rIm4jAeKNW', '2018-05-08 19:07:31');

-- --------------------------------------------------------

--
-- Structure de la table `project_contact`
--

CREATE TABLE `project_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `project_contact`
--

INSERT INTO `project_contact` (`id`, `contact_id`, `project_id`, `created_at`, `updated_at`) VALUES
(14, 8, 14, '2019-01-26 13:17:41', '2019-01-26 13:17:41'),
(13, 8, 11, '2019-01-26 10:18:31', '2019-01-26 10:18:31'),
(12, 7, 10, '2019-01-26 10:14:36', '2019-01-26 10:14:36');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partenaires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `chef_id`, `intitule`, `resume`, `type`, `partenaires`, `lien`, `detail`, `created_at`, `updated_at`, `deleted_at`, `photo`, `date_debut`, `date_fin`) VALUES
(10, 2, 'Investigating the impact of quality management systems on business performance ,', 'Investigating the impact of quality management systems on business performance ,', 'Projet type', NULL, NULL, NULL, '2019-01-26 10:14:36', '2019-01-26 10:14:36', NULL, 'uploads/photo/projets/projetDefault.png', '2017-01-04', '2019-02-03'),
(11, 4, 'Multi-commodity location-routing: Flow intercepting formulation and branch-and-cut algorithm', 'Multi-commodity location-routing: Flow intercepting formulation and branch-and-cut algorithm', 'projet type', NULL, NULL, NULL, '2019-01-26 10:18:31', '2019-01-26 10:18:31', NULL, 'uploads/photo/projets/projetDefault.png', '2016-01-13', '2018-12-20'),
(12, 15, 'Erratum to: Approximating the length of Chinese postman tours,', 'Erratum to: Approximating the length of Chinese postman tours,', 'projet Type', NULL, NULL, NULL, '2019-01-26 10:20:39', '2019-01-26 10:20:39', NULL, 'uploads/photo/projets/projetDefault.png', '2019-01-26', '2019-01-31'),
(13, 2, 'Node stability-based routing in wireless mesh networks', 'Node stability-based routing in wireless mesh networks', 'projet type', NULL, NULL, NULL, '2019-01-26 10:33:38', '2019-01-26 10:33:38', NULL, 'uploads/photo/projets/projetDefault.png', '2015-01-01', '2018-02-15'),
(14, 25, 'Microscopie à contraste de phase', 'Microscopie à\r\ncontraste de\r\nphase', 'projet type', NULL, NULL, NULL, '2019-01-26 13:17:40', '2019-01-26 13:17:40', NULL, 'uploads/photo/projets/projetDefault.png', '2015-01-28', '2019-01-17');

-- --------------------------------------------------------

--
-- Structure de la table `projet_user`
--

CREATE TABLE `projet_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `projet_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `projet_user`
--

INSERT INTO `projet_user` (`id`, `user_id`, `projet_id`, `created_at`, `updated_at`) VALUES
(38, 4, 10, '2019-01-26 10:14:36', '2019-01-26 10:14:36'),
(39, 7, 10, '2019-01-26 10:14:36', '2019-01-26 10:14:36'),
(40, 11, 11, '2019-01-26 10:18:31', '2019-01-26 10:18:31'),
(41, 15, 11, '2019-01-26 10:18:31', '2019-01-26 10:18:31'),
(42, 20, 11, '2019-01-26 10:18:31', '2019-01-26 10:18:31'),
(43, 20, 12, '2019-01-26 10:20:39', '2019-01-26 10:20:39'),
(44, 3, 13, '2019-01-26 10:33:38', '2019-01-26 10:33:38'),
(45, 4, 13, '2019-01-26 10:33:38', '2019-01-26 10:33:38'),
(46, 24, 14, '2019-01-26 13:17:40', '2019-01-26 13:17:40'),
(47, 26, 14, '2019-01-26 13:17:40', '2019-01-26 13:17:40');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'membre', NULL, NULL),
(3, 'directeur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stages`
--

CREATE TABLE `stages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `partenaire_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `stages`
--

INSERT INTO `stages` (`id`, `user_id`, `partenaire_id`, `description`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 24, 1, 'stage description 1 (laboratoire de paris)', '2019-01-26', '2019-02-04', '2019-01-26 10:38:03', '2019-01-26 10:38:03'),
(2, 23, 2, 'Stage description 2 (hopital tlemcen)', '2019-01-03', '2019-01-10', '2019-01-26 10:38:41', '2019-01-26 10:38:41'),
(3, 22, 1, 'Stage desciption 2 (laboratoire de paris)', '2019-02-06', '2019-02-20', '2019-01-26 10:39:18', '2019-01-26 10:39:18');

-- --------------------------------------------------------

--
-- Structure de la table `theses`
--

CREATE TABLE `theses` (
  `id` int(10) UNSIGNED NOT NULL,
  `coencadreur_int` int(10) UNSIGNED DEFAULT NULL,
  `encadreur_int` int(10) UNSIGNED DEFAULT NULL,
  `coencadreur_ext` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sujet` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mots_cle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_soutenance` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membre` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `theses`
--

INSERT INTO `theses` (`id`, `coencadreur_int`, `encadreur_int`, `coencadreur_ext`, `user_id`, `titre`, `sujet`, `mots_cle`, `date_debut`, `date_soutenance`, `detail`, `membre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, NULL, 4, NULL, 16, 'QOS des réseaux mesh', 'QOS des réseaux mesh', NULL, '2014-01-05', '2017-02-16', NULL, NULL, '2019-01-25 22:14:15', '2019-01-25 22:14:15', NULL),
(7, NULL, 8, NULL, 7, 'QOS dans les réseaux manet', 'QOS dans les réseaux manet', NULL, '2015-03-08', '2018-04-15', NULL, NULL, '2019-01-26 08:13:39', '2019-01-26 08:13:39', NULL),
(8, 3, 4, 6, 20, 'l\'économie d\'énergie dans les réseaux mesh', 'l\'économie d\'énergie dans les réseaux mesh', NULL, '2013-05-11', '2018-01-18', NULL, NULL, '2019-01-26 08:17:21', '2019-01-26 08:44:12', NULL),
(9, NULL, NULL, NULL, 14, 'l\'économie d\'énergie dans les réseaux mesh', 'l\'économie d\'énergie dans les réseaux mesh', NULL, '2015-01-07', '2018-01-09', NULL, NULL, '2019-01-26 10:08:44', '2019-01-26 10:08:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `these_contact`
--

CREATE TABLE `these_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `these_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipe_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autorisation_public_num_tel` tinyint(1) DEFAULT '0',
  `autorisation_public_photo` tinyint(1) DEFAULT '0',
  `autorisation_public_date_naiss` tinyint(1) DEFAULT '0',
  `lien_rg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `equipe_id`, `name`, `prenom`, `email`, `photo`, `date_naissance`, `grade`, `password`, `num_tel`, `autorisation_public_num_tel`, `autorisation_public_photo`, `autorisation_public_date_naiss`, `lien_rg`, `lien_linkedin`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 1, 'Admin', 'Admin', 'admin@admin.com', 'uploads/photo/users/1544914261.png', '19/09/2060', 'MCA', '$2y$10$o/L8EjG5jOpii6Ih1vLTme7zuJSuyHzkkT1XGY9I/5eMs9p/LhLv.', '(054) 152-6396', NULL, NULL, NULL, NULL, NULL, '5r83HtvQRI2jhIg6putJr2E27xNkR3gkjMByAmMOG27m4hsgTsOu6GXQDqxO', '2018-04-30 16:29:22', '2019-01-25 21:56:39', 1),
(2, 1, 'MEKKIOUI', 'Zahera', 'mekkioui@zahera.com', 'uploads/photo/users/userDefault.png', '03/06/1972', 'Professeur', '$2y$10$p1jpG36vYZ4j8u7r.l6b4uM8Oi.dSH6E6LZK.fzoVNK2W2JkFDjZm', '(055) 632-9863', NULL, NULL, NULL, NULL, 'https://fr.linkedin.com/', 'sJmZTNIG0m3w9fcuQEO4kMQHyxjZaRG5aho3ypZjXGQ10hPJG28OTb4zS90q', '2018-05-02 17:37:52', '2018-05-02 18:03:13', 2),
(3, 1, 'SMAHI', 'Ismail', 'smahi@ismail.com', 'uploads/photo/users/userDefault.png', '05/01/1976', 'MAA', '$2y$10$lYKy0vR6ZY5qOijusjBZjuI7cwhE7250U0YOszBst0MMFsumjNYlm', '(077) 961-2855', NULL, NULL, NULL, NULL, NULL, 'YiuxFb54aGEnFODjPbowByKMdOQ1D1LX7ar1SdQcUYEhUCDNaAvoHd7cXeM5', '2018-05-02 17:41:09', '2018-05-03 07:27:08', 1),
(4, 1, 'BRIXI NIGASSA', 'Amine', 'brixinigassa@amine.com', 'uploads/photo/users/userDefault.png', '02/04/1965', 'MAB', '$2y$10$mowWYy77AyLMNotZAPKNQORwjHBQgwiiFyTOdSJBMtZYuhbBLX1GS', '(066) 958-3242', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-02 17:46:25', '2018-05-03 09:05:07', 2),
(7, 1, 'KHITRI', 'Souad', 'khitri@souad.com', 'uploads/photo/users/userDefault.png', '05/08/1970', 'MAA', '$2y$10$3fHbMuf9zawey.H27n4VZuHJ.zRy7iObqQh3tfujmwtU2HkvzzorW', '(012) 365-4789', 0, 0, 0, NULL, NULL, NULL, '2018-05-03 07:35:53', '2018-05-03 07:35:53', 2),
(8, 1, 'MERAD BOUDIA', 'Djalal', 'meradboudia@djalal.com', 'uploads/photo/users/userDefault.png', '05/01/1970', 'MAA', '$2y$10$5wgscXFdZqe12zUi3G83putV2jcIjqYaGaDEjEBBwwTxzYtPNZKJO', '(023) 698-5477', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 07:40:34', '2018-05-03 07:40:34', 2),
(9, 1, 'ETCHIALI', 'Abdelhak', 'etchiali@abdelhak.com', 'uploads/photo/users/img2.jpg', '05/01/1980', 'MCA', '$2y$10$kdv08t1w5luoun9tWWIANOFJUHNpW78xoFQatv1fm8u1MMvOcVoo.', '(012) 365-4789', NULL, NULL, NULL, NULL, NULL, '3LsCAfnOe4TLpeHuytmkc3tnmbLJtmOgXEDkzutyBT2PYdTw7geTWWsVhDYy', '2018-05-03 07:42:23', '2019-01-25 21:58:28', 3),
(10, 2, 'CHIKH', 'Azeddine', 'chikh@azeddine.com', 'uploads/photo/users/1525341298.jpg', '12/12/1956', 'Professeur', '$2y$10$Wix1gRO/vmmsLXDgc38gKOY9xz9.2r7AzVJVY3uUJqA1DHlORbptK', '(012) 365-4782', 0, NULL, NULL, NULL, NULL, '1VdqGNpZZSOkuiPnsWoFGGcusBfLCGaOaUOvx42hENmOaslsANiI6Bclydoc', '2018-05-03 07:54:59', '2018-12-17 07:29:38', 3),
(11, 2, 'MAHFOUD', 'Houari', 'mahfouf@houari.com', 'uploads/photo/users/userDefault.png', '05/01/1969', 'MCA', '$2y$10$waXrpjmQAq/igaqOLQHyQu3vU/y1BLCBWx9UEFzzMWEsrWvnDEhyW', '(012) 369-6969', 0, NULL, 0, NULL, NULL, 'ACMkJuBbNjGa6vzCEfDTc48kVUanoq8sSdw427ekqBrS1aEqREn7MSjjUokN', '2018-05-03 08:01:55', '2018-05-03 08:01:55', 2),
(12, 2, 'ELYEBDRI', 'Zeyneb', 'elyebdri@zeyneb.com', 'uploads/photo/users/userDefault.png', '08/03/1973', 'MAA', '$2y$10$2XW.9qkcIsR6a2h2nY68JeFmhXEpYjmDe7mmWXjkX28bCsq0gQdzG', '(012) 587-4936', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 08:03:44', '2018-05-03 08:03:44', 2),
(14, 2, 'KARA TERKI', 'Hadjira', 'karaterki@hadjira.com', 'uploads/photo/users/userDefault.png', '05/01/1970', 'MAA', '$2y$10$BVJvIYSbopKTCh/jy/iDbOwGtTS3aN5jW3TBp5rVuj/Z7iNQwjVEy', '(055) 542-3169', 0, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:07:51', '2018-05-03 08:07:51', 2),
(15, 2, 'MATALLAH', 'Houcine', 'matallah@houcine.com', 'uploads/photo/users/userDefault.png', '05/01/1963', 'Doctorant', '$2y$10$8/jmqUehqdrG09PX0NTVZu7ZC4o/3JF1.PuGx0qbhYTQRtHmFm9pm', '(054) 226-8256', NULL, NULL, NULL, NULL, NULL, 'O3R348HoHKzsYqBUAxJnrVDcpqYoKr6yCKPX0oXqWquto04TRRvyYwtCuTnc', '2018-05-03 08:10:58', '2019-01-25 21:53:45', 2),
(16, 1, 'BENMOUSSAT', 'Chems Eddine', 'benmoussat@chemseddine.com', 'uploads/photo/users/userDefault.png', '05/01/1980', 'Doctorant', '$2y$10$Wix1gRO/vmmsLXDgc38gKOY9xz9.2r7AzVJVY3uUJqA1DHlORbptK', '(043) 629-6852', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:24:12', '2018-05-06 08:27:20', 2),
(18, 9, 'DIDI', 'Fedoua', 'didi@fedoua.com', 'uploads/photo/users/userDefault.png', '05/02/1970', 'MAA', '$2y$10$SK08b5FVriY3ZbmCx3XiU.../hdo1vTHqooXZMpYv9cyIweLhddny', '(055) 543-2698', NULL, NULL, NULL, NULL, NULL, 'pLhY0STEZPHJBtdGP14Wz8xs1g3cth4tRYkLJuIKNoBt2GNxrajR1pJ6qw1s', '2018-05-08 10:52:44', '2019-01-25 20:10:23', 2),
(19, 9, 'MANA', 'Mohamed', 'mana@mohamed.com', 'uploads/photo/users/userDefault.png', '12/12/1970', 'MCA', '$2y$10$OWUFM23uVs.uPhQ06D5aD.CsABlysk9anrrIveNifbsoLw1kFr6qu', '(055) 582-3164', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-08 11:04:32', '2019-01-25 21:49:25', 2),
(20, 9, 'BAMBRIK', 'Ilies', 'bambrik@ilies.com', 'uploads/photo/users/userDefault.png', '09/06/1990', 'Doctorant', '$2y$10$3yzcRfDGE5mk5LczAAfIz.M8eza4ogPlQgCiOS4Z99/DYovbCqxh.', NULL, NULL, NULL, NULL, NULL, NULL, 'YFweYhhEGo3Te6T1briI9rHGb1t9LPuvlVeIPjYhngIiDHFim4zCUZGOty3w', '2018-05-08 11:06:10', '2019-01-25 21:49:00', 2),
(21, 9, 'MESSABIHI', 'Mohamed', 'messabihi@mohamed.com', 'uploads/photo/users/1548455999.png', '09/01/1980', 'Professeur', '$2y$10$JZRRO1Mmsg184Fhgvvd6tuUt9MkDRtkr4pQ9ZFv8.oJhZoaKxADoq', '(077) 014-1363', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-08 11:16:04', '2019-01-25 21:39:59', 2),
(22, 2, 'TADLAOUI', 'Mohamed', 'mtadlaoui@hotmail.com', 'uploads/photo/users/1525800390.jpg', '04/08/1985', 'MCA', '$2y$10$X6kwpAgHJ1Q/kNFuYZMhTOd7Wg0pn1Hi0gcQeADy5HW6.AcMGJYge', '(077) 965-3214', NULL, NULL, NULL, NULL, 'https://www.linkedin.com/in/mohammedtadlaoui/', 'hXJXBjHxSxJjv4GTrzcOwKgd1L7EpZNl4BrY8K424YaZFv0ggalwke9pEJUO', '2018-05-08 15:26:30', '2018-05-09 05:02:44', 2),
(23, 9, 'TRARI', 'ahlem', 'ferielbrikci96@gmail.com', 'uploads/photo/users/1525813432.png', NULL, 'Doctorant', '$2y$10$xEFwjzSnjYehdQuTs5cbuuCXG/QY3aE2UrnMX9MiGfIm04rzQHyIC', NULL, NULL, NULL, NULL, NULL, NULL, 'FLCLGujWgX1u2jdlhHeXQua0QBgbgWSzlX0HG8tT0CnebMK18L3Qj5oCFxZt', '2018-05-08 19:03:53', '2019-01-25 21:48:10', 2),
(24, 9, 'Selaadi', 'yasamine', 'seladji@yasmine.com', 'uploads/photo/users/1548456343.jpg', '12/02/1990', 'MCB', '$2y$10$aeeKR3vLo0src3g4GH1pEONn.dUFwA7KQeNdm1VwehczyWRli61Pi', '(012) 579-9335', NULL, NULL, NULL, NULL, NULL, 'rsc058CJNDI1A8E7DnktK4SXnLyHFwtdKhUt2cpuami9OoRynRPDvWbXw6QD', '2018-05-09 05:04:52', '2019-01-25 21:45:43', 2),
(25, 10, 'Frank', 'Smith', 'Frank@Smith.com', 'uploads/photo/users/1548508779.jpg', NULL, 'Professeur', '$2y$10$vFD2gL1H6./dsQhA7T5OcOHS8B9w0BjVH.nN11eYFepval22GJcK.', NULL, NULL, NULL, NULL, NULL, NULL, 'eWf6sdKciy1IwP2eaGlkZFVEDIQNbltW7guQAYagqtKWkQuQJKXBSbDkSqkg', '2019-01-26 12:18:05', '2019-01-26 12:38:47', 3),
(26, 11, 'Ariel', 'Flory', 'Ariel@Flory.com', 'uploads/photo/users/1548508864.jpg', NULL, 'Professeur', '$2y$10$oxadzi4c.1YDSrVArfPmx.tLGLroLbUfeWHcsddknpbsVVG3TGQsG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-26 12:21:04', '2019-01-26 12:21:04', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actualites_auteur_foreign` (`auteur`);

--
-- Index pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affecter_user_id_foreign` (`user_id`),
  ADD KEY `affecter_materiel_id_foreign` (`materiel_id`),
  ADD KEY `affecter_proprietaireequipe_foreign` (`proprietaireEquipe`);

--
-- Index pour la table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_publicateur_foreign` (`publicateur`);

--
-- Index pour la table `article_contact`
--
ALTER TABLE `article_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_contact_contact_id_foreign` (`contact_id`),
  ADD KEY `article_contact_article_id_foreign` (`article_id`);

--
-- Index pour la table `article_user`
--
ALTER TABLE `article_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_user_user_id_foreign` (`user_id`),
  ADD KEY `article_user_article_id_foreign` (`article_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_laboratoire_foreign` (`laboratoire`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_partenaire_id_foreign` (`partenaire_id`),
  ADD KEY `contacts_created_by_foreign` (`created_by`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipes_chef_id_foreign` (`chef_id`),
  ADD KEY `equipes_labo_id_foreign` (`labo_id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement_user`
--
ALTER TABLE `evenement_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenement_users_user_id_foreign` (`user_id`),
  ADD KEY `evenement_users_evenement_id_foreign` (`evenement_id`);

--
-- Index pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materiels_proprietaire_foreign` (`proprietaire`),
  ADD KEY `materiels_category_id_foreign` (`category_id`),
  ADD KEY `materiels_proprietaireequipe_foreign` (`proprietaireEquipe`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parametres_directeur_foreign` (`directeur`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partenaires_created_by_foreign` (`created_by`);

--
-- Index pour la table `project_contact`
--
ALTER TABLE `project_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_contact_contact_id_foreign` (`contact_id`),
  ADD KEY `project_contact_project_id_foreign` (`project_id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projets_chef_id_foreign` (`chef_id`);

--
-- Index pour la table `projet_user`
--
ALTER TABLE `projet_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projet_user_user_id_foreign` (`user_id`),
  ADD KEY `projet_user_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_user_id_foreign` (`user_id`),
  ADD KEY `stages_partenaire_id_foreign` (`partenaire_id`);

--
-- Index pour la table `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theses_user_id_foreign` (`user_id`),
  ADD KEY `coencadreur_ext` (`coencadreur_ext`),
  ADD KEY `theses_encadreur_int_foreign` (`encadreur_int`),
  ADD KEY `theses_coencadreur_int_foreign` (`coencadreur_int`);

--
-- Index pour la table `these_contact`
--
ALTER TABLE `these_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `these_contact_contact_id_foreign` (`contact_id`),
  ADD KEY `these_contact_these_id_foreign` (`these_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_equipe_id_foreign` (`equipe_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `affecter`
--
ALTER TABLE `affecter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT pour la table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `article_contact`
--
ALTER TABLE `article_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `article_user`
--
ALTER TABLE `article_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `evenement_user`
--
ALTER TABLE `evenement_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `project_contact`
--
ALTER TABLE `project_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `projet_user`
--
ALTER TABLE `projet_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `theses`
--
ALTER TABLE `theses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `these_contact`
--
ALTER TABLE `these_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_publicateur_foreign` FOREIGN KEY (`publicateur`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `article_user`
--
ALTER TABLE `article_user`
  ADD CONSTRAINT `article_user_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `equipes_labo_id_foreign` FOREIGN KEY (`labo_id`) REFERENCES `parametres` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD CONSTRAINT `parametres_directeur_foreign` FOREIGN KEY (`directeur`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `projet_user`
--
ALTER TABLE `projet_user`
  ADD CONSTRAINT `projet_user_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projet_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `theses`
--
ALTER TABLE `theses`
  ADD CONSTRAINT `these_contact` FOREIGN KEY (`coencadreur_ext`) REFERENCES `theses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `theses_coencadreur_int_foreign` FOREIGN KEY (`coencadreur_int`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `theses_encadreur_int_foreign` FOREIGN KEY (`encadreur_int`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `theses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
