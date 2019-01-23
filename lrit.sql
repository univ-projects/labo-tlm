-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Janvier 2019 à 16:59
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

--
-- Contenu de la table `actualites`
--

INSERT INTO `actualites` (`id`, `titre`, `contenu`, `photo`, `auteur`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Contrôle de Conformité des Laboratoires et des Unités de Recherche', 'Nous avons l’honneur de vous transmettre le programme de contrôle de conformité des structures de recherche (laboratoires et unités recherche). Une délégation de la GDGRSDT procédera durant la période du dimanche 15 Novembre au jeudi 19 Novembre 2015 au contrôle de conformité de votre laboratoire de recherche. Dans le cadre de la collaboration entre les enseignants chercheurs de l’université de Tlemcen et nos collègues Sud Coréens du ministère de l’agriculture à travers son agence KOPIA- Algérie représentée par son directeur le Dr Park Sang-Gu, la faculté SNV/STU a reçu une délégation d’experts Coréens le Dr Han Jae-Gu et le Dr Lee Chan-jung spécialistes de la valorisation des Champignons comestibles, pour présenter des conférences aux enseignants chercheurs, doctorants, producteurs de champignons en Algérie, ainsi qu’aux représentants de différentes institutions : chambre de commerce, INPV, Ministère de l’agriculture, parc national, conservation des forêts, etc.. le 9 mai 2017 à l’auditorium de la faculté.', 'uploads/photo/actualites/1542753041.jpg', 1, 0, '2018-11-20 21:30:41', '2018-11-20 21:30:41'),
(3, 'Contrôle de Conformité des Laboratoires et des Unités de Recherche', '<i>N</i>ous<b> </b><u><b></b></u><b>avons</b><u></u><b> </b>l’honneur de vous transmettre le programme de contrôle de conformité des structures de recherche (laboratoires et unités recherche). Une délégation de la <b>GDGRSDT</b> procédera durant la période du dimanche 15 Novembre au jeudi 19 Novembre 2015 au contrôle de conformité de votre laboratoire de recherche. Dans le cadre de la collaboration entre les enseignants chercheurs de l’université de Tlemcen et nos collègues Sud Coréens du ministère de l’agriculture à travers son agence KOPIA- Algérie représentée par son directeur le Dr Park Sang-Gu, la faculté SNV/STU a reçu une délégation d’experts Coréens le Dr Han Jae-Gu et le Dr Lee Chan-jung spécialistes de la valorisation des Champignons comestibles, pour présenter des conférences aux enseignants chercheurs, doctorants, producteurs de champignons en Algérie, ainsi qu’aux représentants de différentes institutions : chambre de commerce, INPV, Ministère de l’agriculture, parc national, conservation des forêts, etc.. le 9 mai 2017 à l’auditorium de la faculté.<div><a target="_blank" rel="nofollow" href="https://www.facebook.com">https://www.facebook.com/</a> <br></div>', 'uploads/photo/actualites/1542754325.jpg', 1, 1, '2018-11-20 21:52:05', '2018-11-24 21:44:57');

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
(8, NULL, 24, 4, '2018-11-27 22:49:09', '2018-11-28 13:35:37', '2018-11-27 21:49:27', '2018-11-28 12:35:37'),
(7, NULL, 24, 3, '2018-11-27 22:49:09', '2018-11-27 22:49:27', '2018-11-27 21:49:09', '2018-11-27 21:49:27'),
(9, NULL, 25, 8, '2018-11-28 13:34:55', NULL, '2018-11-28 12:35:20', '2018-11-28 12:35:20'),
(10, NULL, 24, 9, '2018-11-27 22:49:09', '2018-11-28 13:42:24', '2018-11-28 12:35:37', '2018-11-28 12:42:24'),
(11, NULL, 26, 8, '2018-11-28 13:41:49', '2018-11-28 13:42:10', '2018-11-28 12:41:49', '2018-11-28 12:42:10'),
(12, NULL, 24, 10, '2018-11-27 22:49:09', '2018-11-29 22:45:14', '2018-11-28 12:42:24', '2018-11-29 21:45:15'),
(13, NULL, 27, 4, '2018-11-29 15:37:11', NULL, '2018-11-29 14:37:11', '2018-11-29 14:37:11'),
(15, 1, 31, NULL, '2018-11-29 16:48:03', '2018-11-29 18:24:44', '2018-11-29 15:48:03', '2018-11-29 17:24:44'),
(16, NULL, 31, 3, '2018-11-29 16:48:03', '2018-11-29 18:27:47', '2018-11-29 17:21:37', '2018-11-29 17:27:47'),
(17, NULL, 31, 16, '2018-11-29 16:48:03', '2018-11-29 18:22:20', '2018-11-29 17:21:53', '2018-11-29 17:22:20'),
(18, NULL, 31, 1, '2018-11-29 16:48:03', NULL, '2018-11-29 17:22:20', '2018-11-29 17:22:20'),
(19, NULL, 31, 3, '2018-11-29 16:48:03', '2018-11-29 18:27:47', '2018-11-29 17:24:44', '2018-11-29 17:27:47'),
(20, NULL, 31, 16, '2018-11-29 16:48:03', NULL, '2018-11-29 17:27:47', '2018-11-29 17:27:47'),
(21, NULL, 32, 21, '2018-11-29 18:40:19', '2018-11-29 18:42:38', '2018-11-29 17:40:19', '2018-11-29 17:42:38'),
(22, NULL, 32, 18, '2018-11-29 18:40:19', NULL, '2018-11-29 17:42:38', '2018-11-29 17:42:38'),
(23, NULL, 32, 18, '2018-11-29 18:40:19', NULL, '2018-11-29 17:42:38', '2018-11-29 17:42:38'),
(24, NULL, 33, 21, '2018-11-29 18:53:51', NULL, '2018-11-29 17:53:51', '2018-11-29 17:53:51'),
(48, NULL, 39, 18, '2018-11-29 19:29:03', '2018-11-29 20:14:14', '2018-11-29 18:31:08', '2018-11-29 19:14:14'),
(47, NULL, 39, 16, '2018-11-29 19:29:03', '2018-11-29 20:21:43', '2018-11-29 18:29:46', '2018-11-29 19:21:43'),
(46, 4, 39, NULL, '2018-11-29 19:29:03', '2018-11-29 19:29:46', '2018-11-29 18:29:27', '2018-11-29 18:29:46'),
(45, NULL, 39, 20, '2018-11-29 19:29:03', '2018-11-29 19:29:27', '2018-11-29 18:29:12', '2018-11-29 18:29:27'),
(44, NULL, 39, 21, '2018-11-29 19:29:03', '2018-11-29 19:29:12', '2018-11-29 18:29:03', '2018-11-29 18:29:12'),
(49, NULL, 39, 16, '2018-11-29 19:29:03', '2018-11-29 20:21:43', '2018-11-29 19:14:14', '2018-11-29 19:21:43'),
(50, 2, 40, NULL, '2018-11-29 20:16:30', '2018-11-29 20:18:35', '2018-11-29 19:16:50', '2018-11-29 19:18:35'),
(51, 4, 40, NULL, '2018-11-29 20:16:30', '2018-11-29 20:18:35', '2018-11-29 19:18:35', '2018-11-29 19:18:50'),
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
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 1, 'Publication(Revue)', 'Social Recommender Approach for Technology Enhanced Learning', 'Social Recommender Approach for Technology Enhanced Learning, International Journal of Learning Technlogy, In Press, Inderscience', 'paris', 'France', NULL, 'International Journal of Learning Technlogy', NULL, NULL, NULL, NULL, '2018-05-08 09:54:16', '2018-05-08 09:54:16', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(2, 1, 'Chapitre d\'un livre', 'A Reference Model for Educational Adaptive Web Applications', 'A Reference Model for Educational Adaptive Web Applications. in Intelligent and Adaptive Educational-Learning Systems, Springer Berlin Heidelberg', 'Berlin', 'Allemagne', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-08 10:02:48', '2018-05-08 10:37:58', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(3, 1, 'Article long', 'Approche pour la recommandation de ressources pédagogiques basée sur les liens sociaux', 'Approche pour la recommandation de ressources pédagogiques basée sur les liens sociaux, EIAH 2015', 'Agadir', 'Maroc', 'EIAH 2015', NULL, NULL, NULL, NULL, NULL, '2018-05-08 10:09:10', '2018-12-25 14:26:12', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-12'),
(4, 1, 'Article court', 'Recommandation de ressources pédagogiques basée sur les relations sociales', 'Recommandation de ressources pédagogiques basée sur les relations sociales', 'Rochelle', 'France', 'RJCEIAH', NULL, NULL, NULL, NULL, NULL, '2018-05-08 10:13:19', '2018-05-08 10:13:19', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(6, 1, 'Poster', 'Recommandation de ressources pédagogiques dans les réseaux sociaux en ligne,', 'Recommandation de ressources pédagogiques dans les réseaux sociaux en ligne,', 'Chambéry', ', France.', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-09 05:13:27', '2018-05-09 05:13:27', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(7, 1, 'Poster', 'abc', 'aadadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 16:43:37', '2018-12-05 18:05:10', '2018-12-05 19:05:10', 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(8, 1, 'Poster', 'abc', 'test\r\ntesttesttest\r\ntesttest\r\ntest', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 18:01:05', '2018-12-05 18:05:02', '2018-12-05 19:05:02', 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(10, 1, 'Poster', 'abc', 'test\r\ntesttesttest\r\ntesttest\r\ntest', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 18:03:25', '2018-12-05 18:04:46', '2018-12-05 19:04:46', 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(11, 1, 'Poster', 'abc', 'test\r\ntesttesttest\r\ntesttest\r\ntezfzezeeeeefez\r\ntest', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 18:03:43', '2018-12-05 18:04:38', '2018-12-05 19:04:38', 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(12, 1, 'Poster', 'article3', 'article3 resumé', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 18:24:22', '2018-12-05 18:24:22', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(13, 1, 'Poster', 'article2', 'article2 resumé', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 18:26:09', '2018-12-05 18:26:09', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(14, 1, 'Poster', 'article1', 'article1 resumé', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 18:26:18', '2018-12-05 18:26:18', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(15, 1, 'Chapitre d\'un livre', 'Article test1', 'Article test Article test Article test Article testArticle testArticle testArticle testArticle testArticle test', 'Tlemcen', 'a', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-06 08:15:19', '2018-12-06 08:15:52', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(16, 1, 'Poster', 'test article', 'test article resumé', 'tlm', 'alg', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-09 15:48:44', '2018-12-09 15:58:11', NULL, 'uploads/photo/articles/1544374691.jpg', '2018-01-06'),
(17, 1, 'Publication(Revue)', 'titre2', 'resume2', 'paris', 'France', NULL, 'International Journal of Learning Technlogy', NULL, NULL, NULL, NULL, '2018-05-08 09:54:16', '2018-05-08 09:54:16', NULL, 'uploads/photo/articles/articleDefault.png', '2018-01-06'),
(18, 1, 'Poster', 'article test', 'article test article test article testarticle testarticle testarticle test', 'tlm', 'alg', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-25 13:43:46', '2018-12-25 13:43:46', NULL, 'uploads/photo/article/articleDefault.png', '2018-01-06');

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
(1, 1, 1, '2018-12-05 23:00:00', NULL),
(2, 1, 1, '2018-12-03 23:00:00', NULL),
(3, 1, 14, '2018-12-05 18:26:18', '2018-12-05 18:26:18'),
(4, 4, 14, '2018-12-05 18:26:18', '2018-12-05 18:26:18'),
(17, 1, 3, '2018-12-25 14:26:12', '2018-12-25 14:26:12'),
(15, 1, 18, '2018-12-25 13:43:46', '2018-12-25 13:43:46'),
(14, 1, 15, '2018-12-06 08:30:13', '2018-12-06 08:30:13');

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
(1, 10, 1, '2018-05-08 09:54:16', '2018-05-08 09:54:16'),
(8, 10, 2, '2018-05-08 10:38:00', '2018-05-08 10:38:00'),
(11, 22, 6, '2018-05-09 05:13:27', '2018-05-09 05:13:27'),
(12, 7, 7, '2018-12-05 16:43:37', '2018-12-05 16:43:37'),
(13, 5, 8, '2018-12-05 18:01:05', '2018-12-05 18:01:05'),
(15, 5, 10, '2018-12-05 18:03:25', '2018-12-05 18:03:25'),
(16, 5, 11, '2018-12-05 18:03:43', '2018-12-05 18:03:43'),
(17, 1, 12, '2018-12-05 18:24:22', '2018-12-05 18:24:22'),
(18, 1, 13, '2018-12-05 18:26:09', '2018-12-05 18:26:09'),
(19, 1, 14, '2018-12-05 18:26:18', '2018-12-05 18:26:18'),
(36, 4, 15, '2018-12-06 08:30:13', '2018-12-06 08:30:13'),
(42, 5, 16, '2018-12-09 15:58:11', '2018-12-09 15:58:11'),
(44, 3, 4, '2018-12-10 14:20:05', '2018-12-10 14:20:05'),
(45, 5, 18, '2018-12-25 13:43:46', '2018-12-25 13:43:46'),
(47, 2, 3, '2018-12-25 14:26:12', '2018-12-25 14:26:12');

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
(1, 3, 'DELL VOSTRO 3667 i3/4G/500GB/DVD/18.5', 'uploads/photo/materiels/1542666462.jpg', 'Catégorie : PCs de bureau & Unités centrales , Pc Fixe \r\n dell vostro 3667 i3/4g/500gb/18.5" kit clavier & souris intel® core™ i3 6100 3.7ghz processor 6eme generation memoire: ddr4 04gb disque', 4, NULL, '2018-12-25 09:39:09'),
(7, 3, 'Microscope en métal Amscope M150C-I', 'uploads/photo/materiels/1545478384.jpg', 'Lentilles en verre optique - En métal - Sans fil - LED - Microscope pour étudiant en biologie', 4, '2018-12-22 10:33:04', '2018-12-22 13:08:38'),
(4, 3, 'ARDUINO UNO', 'uploads/photo/materiels/1543256676.jpg', 'test', 3, '2018-11-26 17:24:36', '2018-12-03 14:33:42'),
(8, 3, 'onduleur', 'uploads/photo/materiels/1545486970.jpg', 'Trust Onduleur 600 VA - Noir', 3, '2018-12-22 12:56:10', '2018-12-22 12:56:10');

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
(1, NULL, 'a', 'b', 'uploads/photo/contacts/1543947218.png', NULL, 'a@b.com', NULL, 1, NULL, '2018-12-04 17:13:38'),
(4, NULL, 'a', 'b', 'uploads/photo/contacts/1543947218.png', NULL, 'a@b.com', NULL, 1, NULL, '2018-12-04 17:13:38');

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
(3, NULL, 18, 'Réseau, services distribués et systèmes', '• formation sur l\'administration réseau (installation et configuration de tous les serveurs)\r\n• déploiement de réseaux\r\n• développement d\'applications réseaux\r\n• vidéosurveillance via un réseau wifi mesh\r\n• création, hébergement et maintenance de sites web\r\n• sécurisation d\'un réseau wifi avec un serveur d\'authentification radius professionnel pour les entreprises et les facultés\r\n• formation et déploiement d\'une solution de téléphonie sur ip utilisant l\'ipabx asterisk', 'RSDS', NULL, 'uploads/photo/equipes/1543534863.jpg', '2018-05-08 10:48:44', '2018-11-29 22:41:03', NULL),
(4, NULL, 3, 'Ingénierie logicielle sécurisée', 'Omniprésence des systèmes informatiques dans la vie quotidienne\r\nSystèmes critiques : vérification du bon fonctionnement\r\n \r\nComplexité croissante des systèmes:\r\n-Conception et vérification complexes\r\n-Coûts et délais non maîtrisés\r\n \r\nIngénierie des exigences:\r\n-Modèles et langages pour la spécification des exigences\r\n-Méthodes et techniques pour valider et vérifier les exigences\r\n-Outils pour supporter la gestion traçabilité des exigences\r\n\r\nvérification &amp; Validation\r\n-Paradigme de correction par construction  \r\n-Combiner les différentes techniques de vérifications et de tests\r\n-Outils pour (semi-)automatiser le processus de vérification &amp; validation', 'ILS', NULL, 'uploads/photo/equipes/1543534987.jpg', '2018-05-08 11:11:11', '2018-11-29 22:43:07', NULL),
(5, NULL, 21, 'Ingénierie logicielle sécurisée', 'Omniprésence des systèmes informatiques dans la vie quotidienne\r\nSystèmes critiques : vérification du bon fonctionnement\r\nComplexité croissante des systèmes:\r\n-Conception et vérification complexes\r\n-Coûts et délais non maîtrisés\r\nIngénierie des exigences:\r\n-Modèles et langages pour la spécification des exigences\r\n-Méthodes et techniques pour valider et vérifier les exigences\r\n-Outils pour supporter la gestion traçabilité des exigences\r\nvérification &amp; Validation\r\n-Paradigme de correction par construction  \r\n-Combiner les différentes techniques de vérifications et de tests\r\n-Outils pour (semi-)automatiser le processus de vérification &amp; validation', 'ILS', NULL, 'uploads/photo/equipes/1543535117.jpg', '2018-05-09 04:57:25', '2018-11-29 22:45:17', NULL),
(7, NULL, 21, 'Génie Logiciel', '<p>genie <b>logiciel</b></p>', 'GL', '<p><u>axes&nbsp;</u><a target="_blank" rel="nofollow" href="https://www.univ-tlemcen.dz/fr">https://www.univ-tlemcen.dz/fr</a> </p>', 'uploads/photo/equipes/1543533579.jpg', '2018-11-29 22:19:39', '2018-11-29 22:19:39', NULL);

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
(1, NULL, NULL, '1237', NULL, '2018-11-19 16:07:56', '2018-11-20 10:07:07'),
(6, NULL, NULL, '45643', 11, '2018-11-19 21:25:13', '2018-11-20 08:57:07'),
(26, 1, 4, '15432566726', NULL, '2018-11-28 12:41:49', '2018-11-29 21:45:54'),
(24, 2, 4, '198', NULL, '2018-11-27 21:49:09', '2018-11-29 21:45:28'),
(39, NULL, 1, '1', NULL, '2018-11-29 18:29:03', '2018-11-29 19:21:43'),
(40, 4, 1, '2', NULL, '2018-11-29 19:16:30', '2018-11-29 19:18:35'),
(41, NULL, 4, '15432566798', NULL, '2018-12-03 14:33:42', '2018-12-03 14:33:42'),
(51, NULL, 1, '6', 3, '2018-12-25 09:39:09', '2018-12-25 09:39:09'),
(43, NULL, 7, '15454783881', NULL, '2018-12-22 10:33:08', '2018-12-22 10:33:08'),
(44, NULL, 7, '15454783882', NULL, '2018-12-22 10:33:08', '2018-12-22 10:33:08'),
(45, NULL, 7, '15454783883', NULL, '2018-12-22 10:33:08', '2018-12-22 10:33:08'),
(46, NULL, 7, '15454783884', NULL, '2018-12-22 10:33:08', '2018-12-22 10:33:08'),
(47, NULL, 1, '454654', NULL, '2018-12-22 12:23:31', '2018-12-22 12:23:31'),
(48, NULL, 8, '15454869710', NULL, '2018-12-22 12:56:11', '2018-12-22 12:56:11'),
(49, NULL, 8, '15454869711', NULL, '2018-12-22 12:56:11', '2018-12-22 12:56:11'),
(50, NULL, 8, '15454869712', NULL, '2018-12-22 12:56:11', '2018-12-22 12:56:11');

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
(4, NULL, 'Laboratoire de chimie', '/uploads/photo/labos/laboImgDefault.png', '2018-12-15 22:15:15', '2018-12-15 22:15:15', 'LCT', '/uploads/photo/labos/laboLogoDefault.png', 'labo chimie');

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
(7, 1, 1, '2018-12-06 09:33:17', '2018-12-06 09:33:17'),
(8, 4, 1, '2018-12-06 09:33:17', '2018-12-06 09:33:17'),
(3, 4, 6, '2018-12-06 08:59:34', '2018-12-06 08:59:34'),
(11, 1, 7, '2018-12-09 15:37:56', '2018-12-09 15:37:56'),
(9, 1, 8, '2018-12-09 15:23:26', '2018-12-09 15:23:26');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED DEFAULT NULL,
  `intitule` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 2, 'la télésurveillance via un réseau wifi mesh', 'la télésurveillance via un réseau wifi mesh', 'Article long', NULL, 'https://mail.google.com/mail/u/0/#sent/15ca6f0fc20d43f6', '/uploads/projet/1525785953.pdf', '2018-05-08 11:25:53', '2018-05-08 11:25:53', NULL, 'uploads/photo/projets/projetDefault.png', '2018-11-01', NULL),
(2, 18, 'la QOSd\'un lien satellite pour l\'accès internet', 'la QOSd\'un lien satellite pour l\'accès internet\r\n• un projet cnepru déposé au niveau de la dgrsdt et en attente de réponse', 'Livre', 'LRIT', 'https://mail.google.com/mail/u/0/#sent/15ca6f0fc20d43f6', '/uploads/projet/1525786052.pdf', '2018-05-08 11:27:32', '2019-01-22 20:21:19', NULL, 'uploads/photo/projets/projetDefault.png', '2018-12-02', NULL),
(7, 2, 'projet test 1', 'test\r\nte\r\nte\r\nt\r\net\r\net\r\ne\r\nte\r\nte', 'Article court', NULL, NULL, NULL, '2018-12-06 09:08:39', '2018-12-09 15:37:56', NULL, 'uploads/photo/projets/projetDefault.png', '2019-01-01', NULL),
(8, 4, 'projet test', 'projet test résumé', 'Poster', NULL, NULL, NULL, '2018-12-09 15:23:26', '2018-12-09 15:23:26', NULL, 'uploads/photo/projets/projetDefault.png', '2019-01-01', NULL),
(9, 5, 'projettest', 'adadadaacda\r\nafafa', 'Brevet', NULL, NULL, NULL, '2019-01-22 20:10:11', '2019-01-22 20:10:41', NULL, 'uploads/photo/projets/projetDefault.png', '2019-01-22', '2019-01-24');

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
(22, 1, 1, '2018-12-06 09:33:17', '2018-12-06 09:33:17'),
(23, 3, 1, '2018-12-06 09:33:17', '2018-12-06 09:33:17'),
(24, 7, 1, '2018-12-06 09:33:17', '2018-12-06 09:33:17'),
(25, 2, 8, '2018-12-09 15:23:26', '2018-12-09 15:23:26'),
(26, 3, 8, '2018-12-09 15:23:26', '2018-12-09 15:23:26'),
(29, 3, 7, '2018-12-09 15:37:56', '2018-12-09 15:37:56'),
(30, 4, 7, '2018-12-09 15:37:56', '2018-12-09 15:37:56'),
(32, 3, 9, '2019-01-22 20:10:41', '2019-01-22 20:10:41'),
(33, 2, 2, '2019-01-22 20:21:20', '2019-01-22 20:21:20'),
(34, 16, 2, '2019-01-22 20:21:20', '2019-01-22 20:21:20'),
(35, 18, 2, '2019-01-22 20:21:20', '2019-01-22 20:21:20'),
(36, 19, 2, '2019-01-22 20:21:20', '2019-01-22 20:21:20'),
(37, 20, 2, '2019-01-22 20:21:20', '2019-01-22 20:21:20');

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
(1, NULL, NULL, NULL, 22, 'QOS des réseaux mesh', 'QOS des réseaux mesh', NULL, '2015-05-02', NULL, NULL, NULL, '2018-05-03 08:27:39', '2018-05-08 11:32:34', NULL),
(3, NULL, NULL, NULL, 20, 'la QOS dans les réseaux manet', 'la QOS dans les réseaux manet', NULL, '2017-05-02', NULL, '/uploads/these/1525785786.pdf', NULL, '2018-05-08 11:23:06', '2018-05-08 11:23:06', NULL),
(4, 3, 4, 1, 2, 'abc', 'testte sttesttes  ttesttest testtestte st  test', NULL, '2018-08-26', '2019-07-31', NULL, NULL, '2018-12-13 17:55:04', '2018-12-23 20:31:40', NULL),
(5, 7, 2, NULL, 5, 'abc2', 'test2 test2 test2 test2 test2', NULL, '2018-12-23', '2019-01-16', NULL, NULL, '2018-12-23 21:29:35', '2018-12-23 21:29:35', NULL);

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
(1, 1, 'Admin', 'Admin', 'admin@admin.com', 'uploads/photo/users/1544914261.png', '19/09/2060', 'MAA', '$2y$10$1YfcHqiZZhD/UG1SnEsVNOjUDeXE1/1JOFpu46vzur5LuRAZ7Onbi', '(054) 152-6396', NULL, NULL, NULL, NULL, NULL, 'VLyPvS52zV85VFnp2aqBxumZYxubDoONrfNH6cYzD1TtXBkkh9Mi14RsqAdj', '2018-04-30 16:29:22', '2018-12-15 21:51:01', 1),
(2, 1, 'MEKKIOUI', 'Zahera', 'mekkioui@zahera.com', 'uploads/photo/users/userDefault.png', '03/06/1972', 'Professeur', '$2y$10$p1jpG36vYZ4j8u7r.l6b4uM8Oi.dSH6E6LZK.fzoVNK2W2JkFDjZm', '(055) 632-9863', NULL, NULL, NULL, NULL, 'https://fr.linkedin.com/', 'sJmZTNIG0m3w9fcuQEO4kMQHyxjZaRG5aho3ypZjXGQ10hPJG28OTb4zS90q', '2018-05-02 17:37:52', '2018-05-02 18:03:13', 2),
(3, 1, 'SMAHI', 'Ismail', 'smahi@ismail.com', 'uploads/photo/users/userDefault.png', '05/01/1976', 'MAA', '$2y$10$lYKy0vR6ZY5qOijusjBZjuI7cwhE7250U0YOszBst0MMFsumjNYlm', '(077) 961-2855', NULL, NULL, NULL, NULL, NULL, 'YiuxFb54aGEnFODjPbowByKMdOQ1D1LX7ar1SdQcUYEhUCDNaAvoHd7cXeM5', '2018-05-02 17:41:09', '2018-05-03 07:27:08', 1),
(4, 1, 'BRIXI NIGASSA', 'Amine', 'brixinigassa@amine.com', 'uploads/photo/users/userDefault.png', '02/04/1965', 'MAB', '$2y$10$mowWYy77AyLMNotZAPKNQORwjHBQgwiiFyTOdSJBMtZYuhbBLX1GS', '(066) 958-3242', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-02 17:46:25', '2018-05-03 09:05:07', 2),
(5, 1, 'CHAOUCH REMDANE', 'lAMIA', 'chaouchremdane@lamia.com', 'uploads/photo/users/userDefault.png', '08/03/1973', 'MAA', '$2y$10$jQSXvwUd41Ta6R/D9l10z.bh7bCMMgECpW2Er7SoaoGNfXN5Yjs/C', '(055) 219-9635', 0, 0, 0, 'https://www.google.dz/search?q=researchgate&oq=research&aqs=chrome.1.69i57j0j35i39l2j0l2.5052j1j7&sourceid=chrome&ie=UTF-8', 'https://fr.slideshare.net', NULL, '2018-05-03 07:32:24', '2018-05-03 07:32:24', 2),
(7, 1, 'KHITRI', 'Souad', 'khitri@souad.com', 'uploads/photo/users/userDefault.png', '05/08/1970', 'MAA', '$2y$10$3fHbMuf9zawey.H27n4VZuHJ.zRy7iObqQh3tfujmwtU2HkvzzorW', '(012) 365-4789', 0, 0, 0, NULL, NULL, NULL, '2018-05-03 07:35:53', '2018-05-03 07:35:53', 2),
(8, 1, 'MERAD BOUDIA', 'Djalal', 'meradboudia@djalal.com', 'uploads/photo/users/userDefault.png', '05/01/1970', 'MAA', '$2y$10$5wgscXFdZqe12zUi3G83putV2jcIjqYaGaDEjEBBwwTxzYtPNZKJO', '(023) 698-5477', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 07:40:34', '2018-05-03 07:40:34', 2),
(9, 1, 'ETCHIALI', 'Abdelhak', 'etchiali@abdelhak.com', 'uploads/photo/users/img2.jpg', '05/01/1980', 'MAA', '$2y$10$kdv08t1w5luoun9tWWIANOFJUHNpW78xoFQatv1fm8u1MMvOcVoo.', '(012) 365-4789', 0, NULL, 0, NULL, NULL, '3LsCAfnOe4TLpeHuytmkc3tnmbLJtmOgXEDkzutyBT2PYdTw7geTWWsVhDYy', '2018-05-03 07:42:23', '2018-12-17 07:28:12', 3),
(10, 2, 'CHIKH', 'Azeddine', 'chikh@azeddine.com', 'uploads/photo/users/1525341298.jpg', '12/12/1956', 'Professeur', '$2y$10$Wix1gRO/vmmsLXDgc38gKOY9xz9.2r7AzVJVY3uUJqA1DHlORbptK', '(012) 365-4782', 0, NULL, NULL, NULL, NULL, 'V938XvkeN7X6k1SmtpDJALzz7QOKJopMmxpnMy8mbEbo7DQMJ0rS5pbUsVxy', '2018-05-03 07:54:59', '2018-12-17 07:29:38', 3),
(11, 2, 'MAHFOUD', 'Houari', 'mahfouf@houari.com', 'uploads/photo/users/userDefault.png', '05/01/1969', 'MCA', '$2y$10$waXrpjmQAq/igaqOLQHyQu3vU/y1BLCBWx9UEFzzMWEsrWvnDEhyW', '(012) 369-6969', 0, NULL, 0, NULL, NULL, 'ACMkJuBbNjGa6vzCEfDTc48kVUanoq8sSdw427ekqBrS1aEqREn7MSjjUokN', '2018-05-03 08:01:55', '2018-05-03 08:01:55', 2),
(12, 2, 'ELYEBDRI', 'Zeyneb', 'elyebdri@zeyneb.com', 'uploads/photo/users/userDefault.png', '08/03/1973', 'MAA', '$2y$10$2XW.9qkcIsR6a2h2nY68JeFmhXEpYjmDe7mmWXjkX28bCsq0gQdzG', '(012) 587-4936', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 08:03:44', '2018-05-03 08:03:44', 2),
(13, 2, 'ILES', 'Nawel', 'iles@nawel.com', 'uploads/photo/users/userDefault.png', '12/12/1969', 'MAB', '$2y$10$o/L8EjG5jOpii6Ih1vLTme7zuJSuyHzkkT1XGY9I/5eMs9p/LhLv.', '(055) 542-9632', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:05:41', '2018-05-03 08:05:41', 2),
(14, 2, 'KARA TERKI', 'Hadjira', 'karaterki@hadjira.com', 'uploads/photo/users/userDefault.png', '05/01/1970', 'MAA', '$2y$10$BVJvIYSbopKTCh/jy/iDbOwGtTS3aN5jW3TBp5rVuj/Z7iNQwjVEy', '(055) 542-3169', 0, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:07:51', '2018-05-03 08:07:51', 2),
(15, 2, 'MATALLAH', 'Houcine', 'matallah@houcine.com', 'uploads/photo/users/userDefault.png', '05/01/1963', 'MAB', '$2y$10$8/jmqUehqdrG09PX0NTVZu7ZC4o/3JF1.PuGx0qbhYTQRtHmFm9pm', '(054) 226-8256', 0, NULL, 0, NULL, NULL, 'O3R348HoHKzsYqBUAxJnrVDcpqYoKr6yCKPX0oXqWquto04TRRvyYwtCuTnc', '2018-05-03 08:10:58', '2018-05-03 08:10:58', 2),
(16, 1, 'BENMOUSSAT', 'Chems Eddine', 'benmoussat@chemseddine.com', 'uploads/photo/users/userDefault.png', '05/01/1980', 'Doctorant', '$2y$10$Wix1gRO/vmmsLXDgc38gKOY9xz9.2r7AzVJVY3uUJqA1DHlORbptK', '(043) 629-6852', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:24:12', '2018-05-06 08:27:20', 2),
(18, 3, 'DIDI', 'Fedoua', 'didi@fedoua.com', 'uploads/photo/users/1525783964.gif', '05/02/1970', 'MCA', '$2y$10$SK08b5FVriY3ZbmCx3XiU.../hdo1vTHqooXZMpYv9cyIweLhddny', '(055) 543-2698', 0, NULL, 0, NULL, NULL, 'pLhY0STEZPHJBtdGP14Wz8xs1g3cth4tRYkLJuIKNoBt2GNxrajR1pJ6qw1s', '2018-05-08 10:52:44', '2018-05-08 10:52:44', 2),
(19, 3, 'MANA', 'Mohamed', 'mana@mohamed.com', 'uploads/photo/users/userDefault.png', '12/12/1970', 'MCA', '$2y$10$OWUFM23uVs.uPhQ06D5aD.CsABlysk9anrrIveNifbsoLw1kFr6qu', '(055) 582-3164', 0, NULL, 0, NULL, NULL, NULL, '2018-05-08 11:04:32', '2018-05-08 11:04:32', 2),
(20, 4, 'BAMBRIK', 'Ilies', 'bambrik@ilies.com', 'uploads/photo/users/userDefault.png', '09/06/1990', 'Doctorant', '$2y$10$3yzcRfDGE5mk5LczAAfIz.M8eza4ogPlQgCiOS4Z99/DYovbCqxh.', NULL, NULL, NULL, NULL, NULL, NULL, 'YFweYhhEGo3Te6T1briI9rHGb1t9LPuvlVeIPjYhngIiDHFim4zCUZGOty3w', '2018-05-08 11:06:10', '2018-12-17 07:44:20', 2),
(21, 4, 'MESSABIHI', 'Mohamed', 'messabihi@mohamed.com', 'uploads/photo/users/1525785364.png', '09/01/1980', 'Professeur', '$2y$10$JZRRO1Mmsg184Fhgvvd6tuUt9MkDRtkr4pQ9ZFv8.oJhZoaKxADoq', '(077) 014-1363', 0, NULL, 0, NULL, NULL, NULL, '2018-05-08 11:16:04', '2018-05-08 11:16:04', 2),
(22, 2, 'TADLAOUI', 'Mohamed', 'mtadlaoui@hotmail.com', 'uploads/photo/users/1525800390.jpg', '04/08/1985', 'MCA', '$2y$10$X6kwpAgHJ1Q/kNFuYZMhTOd7Wg0pn1Hi0gcQeADy5HW6.AcMGJYge', '(077) 965-3214', NULL, NULL, NULL, NULL, 'https://www.linkedin.com/in/mohammedtadlaoui/', 'hXJXBjHxSxJjv4GTrzcOwKgd1L7EpZNl4BrY8K424YaZFv0ggalwke9pEJUO', '2018-05-08 15:26:30', '2018-05-09 05:02:44', 2),
(23, 3, 'TRARI', 'ahlem', 'ferielbrikci96@gmail.com', 'uploads/photo/users/1525813432.png', NULL, 'Doctorant', '$2y$10$xEFwjzSnjYehdQuTs5cbuuCXG/QY3aE2UrnMX9MiGfIm04rzQHyIC', NULL, NULL, NULL, NULL, NULL, NULL, 'FLCLGujWgX1u2jdlhHeXQua0QBgbgWSzlX0HG8tT0CnebMK18L3Qj5oCFxZt', '2018-05-08 19:03:53', '2018-05-08 19:07:02', 2),
(24, 5, 'Selaadi', 'yasamine', 'seladji@yasmine.com', 'uploads/photo/users/1525849492.jpg', '12/02/1990', 'MCB', '$2y$10$aeeKR3vLo0src3g4GH1pEONn.dUFwA7KQeNdm1VwehczyWRli61Pi', '(012) 579-9335', NULL, NULL, 0, NULL, NULL, 'rsc058CJNDI1A8E7DnktK4SXnLyHFwtdKhUt2cpuami9OoRynRPDvWbXw6QD', '2018-05-09 05:04:52', '2018-05-09 05:04:52', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `article_contact`
--
ALTER TABLE `article_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `article_user`
--
ALTER TABLE `article_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `projet_user`
--
ALTER TABLE `projet_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `theses`
--
ALTER TABLE `theses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `these_contact`
--
ALTER TABLE `these_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
