-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : mar. 14 mai 2024 à 04:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `domiciles_services`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `icon`, `color`) VALUES
(1, 'plomberie', 'plomberie.png', '#60D7FB'),
(2, 'jardinage', 'jardinage.png', '#4FBA6F'),
(3, 'ménage', 'menage.png', '#EA9D2D');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `ville` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `id_user`, `nom`, `prenom`, `age`, `email`, `telephone`, `ville`, `image`) VALUES
(5, 14, 'El Metni', 'Mohamed Amin', 21, 'amin@gmail.com', '0670234684', 'Tetouan', 'amin.jpg'),
(10, 31, 'Salmi', 'Rihab', 21, 'rihab@gmail.com', '0670824364', 'Tetouan', 'rihab.jpg'),
(18, 65, 'Karmoun', 'Adam', 24, 'adam@gmail.com', '0670824364', 'Tetouan', 'adam.jpg'),
(19, 66, 'Mamouni', 'Hakim', 32, 'hakim@gmail.com', '067532456598', 'Agadir', 'hakim.jpg'),
(21, 68, 'test', 'test', 22, 'test@test', '0604654', 'Tanger', 'default_user.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `date_commentaire` date DEFAULT current_timestamp(),
  `rating` float DEFAULT NULL,
  `emetteur` varchar(50) DEFAULT NULL,
  `like` varchar(255) NOT NULL DEFAULT '0',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_client`, `id_service`, `commentaire`, `date_commentaire`, `rating`, `emetteur`, `like`, `id_user`) VALUES
(13, 5, 13, '\"Je suis très satisfait du service de nettoyage à domicile ! Mon appartement n\'a jamais été aussi propre. Les équipes étaient ponctuelles, efficaces et attentionnées. Je recommande vivement.\"', '2024-05-09', 4.1, 'client', '0', 59),
(14, 5, 16, '\"Grâce à l\'assistance personnelle à domicile, j\'ai pu gérer mes courses et mes tâches quotidiennes sans stress. C\'était un soulagement d\'avoir une aide fiable et sympathique. Je referai appel à eux sans hésiter.\"', '2024-05-09', 3.7, 'client', '0', 60),
(15, 5, 12, '\"Mon jardin est magnifique grâce au service de jardinage à domicile. Les professionnels ont fait un travail exceptionnel et ont su transformer mon espace extérieur. Je les recommande à tous mes voisins et mes copins.\"', '2024-05-09', 4.7, 'client', '0', 59),
(17, 18, 12, '\"Je suis reconnaissant pour les soins à domicile prodigués à mes parents. Les aides étaient attentionnées et compétentes, offrant un soutien précieux. Cela a vraiment facilité leur vie quotidienne.\"', '2024-05-09', 2.8, 'client', '0', 59),
(18, 19, 12, '\"Les cours à domicile ont été une excellente expérience pour mes enfants. Les enseignants étaient patients et compétents, adaptant les leçons à leurs besoins. Leurs progrès sont remarquables.\"', '2024-05-09', 4.7, 'client', '0', 59),
(19, 10, 15, '\"Mes animaux étaient entre de bonnes mains avec le service de garde à domicile. Je suis parti en toute confiance, sachant qu\'ils recevaient l\'attention et les soins nécessaires. Merci pour ce service exceptionnel.\"', '2024-05-09', 2.2, 'client', '0', 60),
(20, 10, 18, '\"Mon ordinateur fonctionne à nouveau parfaitement grâce au service de maintenance à domicile. Le technicien a résolu tous les problèmes rapidement. Un service précieux pour ceux qui travaillent à domicile comme moi.\"', '2024-05-09', 4.8, 'client', '0', 55),
(21, 10, 26, '\"Je suis ravie de ma nouvelle coupe de cheveux grâce au service de coiffure à domicile. C\'était tellement pratique et le résultat était exactement ce que je voulais. Je recommande cette option à tous.\"', '2024-05-09', 4.5, 'client', '0', 64),
(22, 18, 26, '\"La livraison de courses et de repas à domicile a été un véritable gain de temps pour moi. Les produits étaient frais et la livraison était ponctuelle. Un service indispensable pour les semaines chargées.\"', '2024-05-09', 4.5, 'client', '0', 64),
(23, 5, 16, 'C\"est un très bon client.', '2024-05-09', 3, 'partenaire', 'like', 60);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_partenaire` int(11) DEFAULT NULL,
  `id_service` int(11) NOT NULL,
  `date_reservation` datetime DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `prix_total` double DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_demande`, `id_client`, `id_partenaire`, `id_service`, `date_reservation`, `duree`, `etat`, `completed_at`, `prix_total`, `id_user`) VALUES
(23, 5, 14, 12, '2024-05-09 15:50:00', 10, 'refused', NULL, 655, 59),
(25, 5, 10, 23, '2024-05-24 16:10:00', 2, NULL, NULL, 131.94, 54),
(26, 5, 12, 20, '2024-05-24 16:20:00', 9, 'refused', NULL, 707.85, 56),
(27, 5, 14, 13, '2024-05-18 22:30:00', 21, 'refused', NULL, 944.79, 59),
(28, 5, 16, 25, '2024-05-24 16:25:00', 4, 'accepted', NULL, 263.96, 61),
(29, 5, 15, 16, '2024-05-23 19:45:00', 3, 'terminer', '2024-05-09 09:20:59', 197.25, 60),
(30, 5, 15, 17, '2024-05-16 15:15:00', 4, NULL, NULL, 338, 60),
(31, 10, 14, 12, '2024-05-16 19:20:00', 6, 'completed', NULL, 393, 59),
(32, 18, 14, 12, '2024-05-16 17:15:00', 1, 'accepted', NULL, 327.5, 59),
(33, 18, 14, 12, '2024-05-22 16:20:00', 6, 'completed', NULL, 393, 59),
(34, 19, 14, 12, '2024-05-18 17:10:00', 2, 'accepted', NULL, 131, 59),
(35, 19, 14, 12, '2024-05-15 13:00:00', 6, 'terminer', '2024-05-09 02:35:36', 393, 59),
(36, 19, 14, 12, '2024-05-13 17:05:00', 3, 'completed', NULL, 196.5, 59),
(37, 10, 15, 15, '2024-05-17 12:25:00', 5, NULL, NULL, 344.95, 60),
(38, 10, 15, 15, '2024-05-24 16:00:00', 11, NULL, NULL, 758.89, 60),
(39, 10, 15, 15, '2024-05-18 13:25:00', 3, NULL, NULL, 206.97, 60),
(40, 10, 15, 15, '2024-05-21 16:20:00', 4, NULL, NULL, 275.96, 60),
(41, 10, 15, 15, '2024-05-30 15:15:00', 3, NULL, NULL, 206.97, 60),
(42, 10, 15, 15, '2024-05-30 22:15:00', 2, NULL, NULL, 137.98, 60),
(43, 10, 15, 15, '2024-05-25 14:25:00', 2, NULL, NULL, 137.98, 60),
(44, 10, 15, 15, '2024-05-15 16:20:00', 3, NULL, NULL, 206.97, 60),
(45, 10, 15, 15, '2024-05-23 16:15:00', 3, 'terminer', '2024-05-09 09:20:40', 206.97, 60),
(46, 10, 15, 15, '2024-05-18 15:20:00', 4, 'terminer', '2024-05-09 09:20:37', 275.96, 60),
(47, 10, 11, 18, '2024-05-16 15:20:00', 3, 'completed', NULL, 200.97, 55),
(48, 10, 11, 18, '2024-05-24 19:30:00', 3, NULL, NULL, 200.97, 55),
(49, 10, 17, 26, '2024-05-23 15:25:00', 3, NULL, NULL, 163.98, 64),
(50, 10, 17, 26, '2024-05-21 15:10:00', 4, 'completed', NULL, 218.64, 64),
(51, 10, 17, 26, '2024-05-29 14:10:00', 3, NULL, NULL, 163.98, 64),
(52, 18, 17, 26, '2024-05-24 12:20:00', 5, 'completed', NULL, 273.3, 64),
(53, 5, 14, 12, '2024-05-30 17:15:00', 4, 'terminer', '2024-05-09 10:02:10', 262, 59);

-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

CREATE TABLE `interventions` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `interventions`
--

INSERT INTO `interventions` (`id`, `id_categorie`, `nom`, `description`, `image`) VALUES
(1, 3, 'Nettoyage Sanitaire', 'Découvrez la magie d\'un intérieur impeccable avec notre service de nettoyage.', 'nettoyage_sanitaire.jpg'),
(2, 3, 'Lavage Linge', 'Laissez-nous prendre soin de votre linge avec notre service de blanchisserie.', 'lavage_linge.jpg'),
(4, 1, 'Installation Robinetterie ', 'Profitez de notre service professionnel pour l\'installation et réparation de votre robinetterie. ', 'installation_robinetterie.jpg'),
(5, 2, 'Plantation Fleurs', 'Notre service de plantation et entretien des fleurs ajoute couleur et beauté à votre jardin.', 'plantation_fleurs.jpg'),
(7, 1, 'Réparation Fuite', 'Stoppez les fuites d\'eau avec notre service professionnel de réparation des fuites d\'eau. ', 'reparation_fuite.jpg'),
(8, 2, 'Désherbage', 'Notre service de désherbage assure des espaces extérieurs propres et dégagés.', 'desherbage.jpg'),
(9, 3, 'Lavage Vaisselle', 'Notre service de lavage de vaisselle vous libère du fardeau des tâches après les repas.', 'lavage_vaisselle.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `id_user`, `nom`, `prenom`, `email`, `telephone`, `ville`, `age`, `image`) VALUES
(9, 53, 'Bouchtawi', 'Salma', 'salma@gmail.com', '0643546598', 'Tetouan', 26, 'salma.jpg'),
(10, 54, 'Bakkali', 'Yassin', 'yassin.bakkali@gmail.com', '0645326578', 'Tanger', 22, 'yassin.jpg'),
(11, 55, 'Alliti', 'Ayoub', 'ayoub.alliti@gmail.com', '0645783565', 'Casablanca', 23, 'ayoub.jpg'),
(12, 56, 'Doukali', 'Hind', 'hind@gmail.com', '0671245678', 'Rabat', 24, 'hind.jpg'),
(13, 58, 'Chairi', 'Ilyas', 'ilias@gmail.com', '0712453565', 'Agadir', 30, 'ilias.jpg'),
(14, 59, 'Roubakhi', 'Hayat', 'amin.elmetni@gmail.com', '07683245', 'Tetouan', 21, 'hayat.jpg'),
(15, 60, 'Houdi', 'Wiam', 'wiam@gmail.com', '0798653242', 'Tetouan', 21, 'wiam.jpg'),
(16, 61, 'Chairi', 'Chaimae', 'chaimae@gmail.com', '0745986532', 'Tetouan', 23, 'chaimae.jpg'),
(17, 64, 'Mirani', 'Youssef', 'youssef@gmail.com', '0732659865', 'Rabat', 33, 'youssef.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `id_partenaire` int(11) DEFAULT NULL,
  `id_intervention` int(11) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `prix_intervention` decimal(10,2) DEFAULT NULL,
  `rating` float NOT NULL,
  `nb_commentaires` int(11) NOT NULL,
  `nb_demandes` int(11) NOT NULL,
  `is_available` tinyint(1) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `id_partenaire`, `id_intervention`, `ville`, `description`, `prix_intervention`, `rating`, `nb_commentaires`, `nb_demandes`, `is_available`, `id_user`) VALUES
(12, 14, 2, 'Tetouan', '\"Profitez d\'un intérieur impeccable sans lever le petit doigt ! Nous proposons un service de nettoyage complet, adapté à vos besoins. Du dépoussiérage des surfaces au nettoyage des sols, nous prenons soin de chaque détail.\"', 65.50, 4.06667, 3, 8, 1, 59),
(13, 14, 5, 'Tetouan', '\"Besoin d\'un coup de main pour vos tâches quotidiennes ? Notre service d\'assistance personnelle vous offre une aide précieuse. Que ce soit pour les courses, la préparation des repas ou d\'autres besoins, nous sommes là pour vous faciliter la vie.\"', 44.99, 4.1, 1, 1, 1, 59),
(14, 14, 8, 'Tetouan', '\"Donnez un nouvel éclat à votre espace extérieur avec notre service de jardinage professionnel. Taille des haies, tonte de pelouse, plantation de fleurs : confiez-nous l\'entretien de votre jardin et profitez d\'un extérieur accueillant.\"', 78.40, 0, 0, 0, 1, 59),
(15, 15, 2, 'Tetouan', '\"Ne laissez pas les petits problèmes s\'accumuler ! Nos experts en réparations et bricolage sont à votre service. De la plomberie à l\'électricité en passant par les petites rénovations, nous résolvons vos soucis domestiques rapidement et efficacement.\"', 68.99, 2.2, 1, 10, 1, 60),
(16, 15, 9, 'Tetouan', '\"Offrez à vos proches le confort et l\'assistance dont ils ont besoin avec nos soins à domicile pour personnes âgées. Des professionnels attentionnés veillent sur leur bien-être, offrant un soutien personnalisé dans le confort de leur foyer.\"', 65.75, 3.35, 2, 1, 1, 60),
(17, 15, 1, 'Tetouan', '\"Maximisez le potentiel de votre enfant avec nos cours et tutorats à domicile. Nos enseignants qualifiés proposent un soutien scolaire sur mesure, adapté aux besoins individuels de chaque élève.\"', 84.50, 0, 0, 1, 1, 60),
(18, 11, 2, 'Rabat', 'Partez l\'esprit tranquille en confiant vos animaux de compagnie à nos soins. Nous proposons des services de garde d\'animaux à domicile, assurant leur bien-être et leur bonheur pendant votre absence.', 66.99, 4.8, 1, 2, 1, 55),
(19, 12, 2, 'Rabat', '\"Profitez d\'une coupe de cheveux ou d\'une mise en beauté sans quitter votre domicile. Nos coiffeurs professionnels apportent leur expertise directement chez vous, pour un look impeccable et pratique.\"', 86.99, 0, 0, 0, 1, 56),
(20, 12, 5, 'Rabat', '\"Gagnez du temps avec notre service de livraison de courses et de repas à domicile. Commandez en ligne et recevez vos achats ou repas préférés directement à votre porte, sans les tracas de faire les magasins ou de cuisiner.\"', 78.65, 0, 0, 1, 1, 56),
(21, 12, 8, 'Rabat', '\"Détendez-vous et revitalisez-vous avec nos services de massage à domicile. Nos thérapeutes certifiés apportent une atmosphère apaisante chez vous, offrant des massages thérapeutiques pour soulager le stress et les tensions.\"', 45.86, 0, 0, 0, 1, 56),
(22, 10, 2, 'Casablanca', '\"Protégez votre maison et votre famille avec nos solutions de sécurité à domicile. De l\'installation de systèmes d\'alarme à la surveillance vidéo, nous assurons votre tranquillité d\'esprit en veillant sur votre propriété.\"', 32.65, 0, 0, 0, 1, 54),
(23, 10, 4, 'Casablanca', '\"Protégez votre maison et votre famille avec nos solutions de sécurité à domicile. De l\'installation de systèmes d\'alarme à la surveillance vidéo, nous assurons votre tranquillité d\'esprit en veillant sur votre propriété.\"', 65.97, 0, 0, 1, 1, 54),
(24, 16, 2, 'Agadir', '\"Transformez votre espace avec notre expertise en décoration intérieure. Nos designers travaillent avec vous pour créer un intérieur qui reflète votre style et répond à vos besoins, sans que vous ayez à quitter votre foyer.\"', 77.99, 0, 0, 0, 1, 61),
(25, 16, 9, 'Agadir', '\"Transformez votre espace avec notre expertise en décoration intérieure. Nos designers travaillent avec vous pour créer un intérieur qui reflète votre style et répond à vos besoins, sans que vous ayez à quitter votre foyer.\"', 65.99, 0, 0, 1, 1, 61),
(26, 17, 2, 'Tetouan', '\"Apportez de la verdure dans votre maison avec notre service de plantes d\'intérieur. Nous livrons et entretenons des plantes adaptées à votre espace, ajoutant une touche de nature et de fraîcheur à votre environnement.\"', 54.66, 4.5, 2, 4, 1, 64),
(27, 17, 7, 'Tetouan', '\"Apportez de la verdure dans votre maison avec notre service de plantes d\'intérieur. Nous livrons et entretenons des plantes adaptées à votre espace, ajoutant une touche de nature et de fraîcheur à votre environnement.\"', 99.99, 0, 0, 0, 1, 64),
(28, 13, 2, 'Tetouan', '\"Faites progresser vos compétences musicales avec nos cours de tutorat à domicile. Nos professeurs expérimentés enseignent le piano, la guitare, le violon et d\'autres instruments, adaptés à tous les niveaux et tous les âges.\"', 98.99, 0, 0, 0, 1, 58);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C9TJDUFPZaAzJhAfH2BMlQCVrzLI6g8zAyBDgyxj', 68, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicUJMMjdPdDIzM2FHRkVXU1pCN3o2QTk5ekVqWHN1MnV5bk1ZRUQzeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NzoidXNlcl9pZCI7aTo1OTtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njg7fQ==', 1715625086),
('sfUJc4vjj35sDLDLccZKDqklzOYOJpswlsUdVmsT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGo3ZnBGU2hraTMyb1Zxa2hjMUNlbXNMUjlCbnU5dmFybENvM3FBdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1715652961),
('zU4qogljHVsLEd66IilcAiHilarw2aISdd70pnqz', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidFQ1cFBnQTV3b1ZrU3ZGeVh1STBibFhuUHVJS3h1ckdPUEJGOWxkayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2gvbSVDMyVBOW5hZ2UvTGF2YWdlJTIwTGluZ2UvMTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDtzOjc6InVzZXJfaWQiO2k6MTQ7fQ==', 1715625333);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
(14, 'amin', '$2y$12$gvoEHA1DhTu/snwxlTqzX.3zAmAmx7KiYA7a9Gvaunr/feEIgPd.2', 'client', '2024-04-24 14:13:11', '2024-05-08 22:17:44'),
(31, 'rihab', '$2y$12$.I6FN4yMOxpyLYQ19LFYhuggLPRasrC5wDGJJhlfWTIgYBipzUKBq', 'client', '2024-04-24 21:19:50', '2024-04-24 21:19:50'),
(53, 'salma', '$2y$12$oTyawvuHiDVDoPjOuCEYt.SY9rjFyrxII/BhmwmqiGFGsqhlBcMwC', 'partenaire', '2024-05-08 23:39:26', '2024-05-08 23:39:26'),
(54, 'yassin', '$2y$12$.T7nAozLa9n73dpJEWC0zu6l/UNS995g3HBGhidoMKr74owLvTbz.', 'partenaire', '2024-05-08 23:40:45', '2024-05-08 23:40:45'),
(55, 'ayoub', '$2y$12$J6JmEMPpAziPZPhWXU.JM.zirF/GVMvJZA6VWZFRwBUJymLzLGgVO', 'partenaire', '2024-05-08 23:41:40', '2024-05-08 23:41:40'),
(56, 'hind', '$2y$12$.XjDy2WJIcy2njjsxtB2ZefhJf9dD6f8bYBAGIuGJLqRXa9KsPu7W', 'partenaire', '2024-05-08 23:43:58', '2024-05-08 23:43:58'),
(58, 'ilias', '$2y$12$omig78p.P6qAPX466abQtucoJ0XpWTzikejTcTVNrVliDKjzl/DT2', 'partenaire', '2024-05-08 23:46:15', '2024-05-08 23:46:15'),
(59, 'hayat', '$2y$12$yJXg1bY09lEyOEmTwJ3hOe4aVe5/ZMYl4BNmCpvBDYE7NcuPU3mY6', 'partenaire', '2024-05-08 23:49:20', '2024-05-08 23:49:20'),
(60, 'wiam', '$2y$12$ulXvWg9jFhFCMIIj3mz7Ie2K99wAisnJe86qia7fGQY21uEi1NHSu', 'partenaire', '2024-05-08 23:53:12', '2024-05-08 23:53:12'),
(61, 'chaimae', '$2y$12$yrVEPojv4cmwxwhtJVe.4OMkNjRE4M8BCnbFm6AZt3WWzvqcQ/ka.', 'partenaire', '2024-05-08 23:55:08', '2024-05-08 23:55:08'),
(64, 'youssef', '$2y$12$k7U5dxzCYnM2pqDe5GvRjeMQccsx4NxxUqraoWuKoUweLkqCP308u', 'partenaire', '2024-05-08 23:59:17', '2024-05-08 23:59:17'),
(65, 'adam', '$2y$12$hrEBzzsaObGbc1Zw8BAMV.V26p25L2Z.O8jAosRNz8mj.d/wGqoHy', 'client', '2024-05-09 00:01:11', '2024-05-09 00:01:11'),
(66, 'hakim', '$2y$12$5L6ETGbv1URWnK9vP4J.8esFU3QyFbzEClqlyTFynd.Ax5hCPDrLS', 'client', '2024-05-09 00:01:55', '2024-05-09 00:01:55'),
(68, 'test', '$2y$12$B4ZsXdQWL8NOUadc8E1KQ.t8lqD3f6zrJgIser6Hm8QCHzh7P7oUK', 'client', '2024-05-13 14:24:19', '2024-05-13 14:24:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `client_user_fk` (`id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_partenaire` (`id_partenaire`),
  ADD KEY `demande_service_fk` (`id_service`);

--
-- Index pour la table `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_categories_fk` (`id_categorie`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`),
  ADD KEY `partenaire_user_fk` (`id_user`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_partenaire` (`id_partenaire`),
  ADD KEY `service_interventions_fk` (`id_intervention`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_client_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_service_fk` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_client_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demande_partenaire_fk` FOREIGN KEY (`id_partenaire`) REFERENCES `partenaire` (`id_partenaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demande_service_fk` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `interventions`
--
ALTER TABLE `interventions`
  ADD CONSTRAINT `services_categories_fk` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD CONSTRAINT `partenaire_user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_interventions_fk` FOREIGN KEY (`id_intervention`) REFERENCES `interventions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_partenaire_fk` FOREIGN KEY (`id_partenaire`) REFERENCES `partenaire` (`id_partenaire`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
