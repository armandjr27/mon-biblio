-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2024 at 01:14 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblio`
--

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_edition` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `date_edition`, `image`, `created_at`) VALUES
(13, 'One love', 'Bob Marley', '1990-07-04', '1690006543382.jpg', '2024-04-13 09:12:56'),
(23, 'Boom', 'Diplo', '2024-04-05', '1701057056784.jpg', '2024-04-13 09:13:16'),
(25, 'Alala', 'Lala', '1880-12-12', '1687369157807.jpg', '2024-04-06 22:34:41'),
(47, 'My Homes', 'Jrs', '2024-04-10', '1674800584628.jpg', '2024-04-13 09:09:23'),
(48, 'Bentley', 'Post Malone', '2020-05-12', '1699975692992.jpg', '2024-04-13 09:09:18'),
(49, 'Last', 'American Dream', '2024-04-13', '1673519276589.jpg', '2024-04-13 21:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `naissance` date NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `adhesion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom`, `email`, `phone`, `genre`, `naissance`, `adresse`, `pass`, `profil`, `type_user`, `adhesion`) VALUES
(27, 'Armand', 'Ramaroson', 'armandrmrsn@gmail.com', NULL, 'homme', '1997-04-09', '', '$2y$10$NmbxnwT41fI.gFsasXnY5uzbFbblwyXQq3yicmCxu6luaWctJ82Aa', '', 'user', '2024-04-14 19:49:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
