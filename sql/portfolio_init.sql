-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 25 mars 2022 à 08:52
-- Version du serveur : 10.2.43-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `admfuta_bouisr`
--

--
-- Déchargement des données de la table `PF_MESSAGE_SUBJECTS`
--

INSERT INTO `PF_MESSAGE_SUBJECTS` (`id_subject`, `label_subject`, `created_at`, `updated_at`) VALUES
(1, 'Emploi', '2022-03-18 11:37:54', '2022-03-18 11:37:54'),
(2, 'Stage', '2022-03-18 17:10:36', '2022-03-18 17:10:36'),
(3, 'Autre', '2022-03-18 17:10:36', '2022-03-18 17:10:36');

--
-- Déchargement des données de la table `PF_ROLES`
--

INSERT INTO `PF_ROLES` (`id_role`, `label_role`, `created_at`, `updated_at`) VALUES
(1, 'unknown', '2022-03-18 18:18:48', '2022-03-18 18:18:48'),
(100, 'jury', '2022-03-18 18:18:48', '2022-03-18 18:18:48'),
(999, 'admin', '2022-03-18 18:18:48', '2022-03-18 18:18:48');

--
-- Déchargement des données de la table `PF_USERS`
--

INSERT INTO `PF_USERS` (`id_user`, `email_user`, `password_user`, `firstname_user`, `lastname_user`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'r.bouis14@protonmail.com', '$2y$10$pMkEdiaPmIG7oVQT5AhZ7.qyB4HZI.zR/Pj4.Nvz31Pzm.1b4PqfG', 'Romain', 'Bouis', 999, '2022-03-18 18:29:29', '2022-03-18 18:29:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
