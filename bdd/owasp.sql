-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 mars 2023 à 15:17
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `owasp`
--

-- --------------------------------------------------------

--
-- Structure de la table `identifier`
--

DROP TABLE IF EXISTS `identifier`;
CREATE TABLE IF NOT EXISTS `identifier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `identifier`
--

INSERT INTO `identifier` (`id`, `password`, `username`) VALUES
(3, 'Ehv1TA==', 'test'),
(4, 'Bx/8XOth', 'aazdaz'),
(5, 'HBj8Wexhp6P4Aw==', 'zfzafzfzaf'),
(6, 'HBjnQux6u7//', 'zfazzfazfazfffazff'),
(7, 'Bxj8Xuthp7jjAw==', 'afzfazfazf'),
(8, 'AB/rU+11oLX+CxeFqhM=', 'famkgnalgnzakf'),
(9, 'BwTgWfB9u6P+HwqFuxI3Us0kqrQ=', 'azfazfzzgzgazgazgazg'),
(10, 'Ehv1TLs=', 'test1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `lastname`, `firstname`, `address`, `phone`, `pid`, `user_id`) VALUES
(9, 'test', 'test', 'test', NULL, NULL, NULL, NULL),
(10, 'aazdaz', 'aazdaz', 'aazdaz', NULL, NULL, NULL, NULL),
(11, 'zfzafzfzaf', 'zfzafzfzaf', 'zfzafzfzaf', NULL, NULL, NULL, NULL),
(14, 'zfzafazfzafzfaz', 'zfzafazfzafzfaz', 'zfzafazfzafzfaz', NULL, NULL, NULL, NULL),
(15, 'zfzafazfzafzfaz', 'zfzafazfzafzfaz', 'zfzafazfzafzfaz', NULL, NULL, NULL, NULL),
(16, 'zfzafazfzafzfazzfzafazfzafzfaz', 'zfzafazfzafzfazzfzafazfzafzfaz', 'zfzafazfzafzfazzfzafazfzafzfaz', NULL, NULL, NULL, NULL),
(17, 'famkgnalgnzakf', 'famkgnalgnzakf', 'famkgnalgnzakf', NULL, NULL, NULL, NULL),
(19, 'azfazfzzgzgazgazgazg', 'azfazfzzgzgazgazgazg', 'azfazfzzgzgazgazgazg', NULL, NULL, NULL, 9),
(20, 'test1', 'test1', 'test1', NULL, NULL, NULL, 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `identifier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
