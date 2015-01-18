-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Janvier 2015 à 23:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `urgency` tinyint(1) NOT NULL,
  `city` varchar(255) NOT NULL,
  `monney` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `type`, `urgency`, `city`, `monney`, `description`) VALUES
(49, 'Car Porn Design', 'Nothing', 2, 'Mechanics', 'Pau', 'Painting Car, 80''s design'),
(50, 'Reprogram PCM', 'Feasible', 2, 'Mechanics', 'Pau', 'Reprogram puce, increased performance'),
(51, 'My Resume', 'Remunerate', 1, 'IT', 'Bordeaux', 'Create Web App, Cv online ease to use , connect with linkedin'),
(52, 'Projizz', 'Remunerate', 2, 'IT', 'Cenon', 'Recruitment for your projects, Unity makes strength'),
(53, 'Aperitif', 'Nothing', 1, 'Events', 'Margaux', 'Cost of Entry: One sausage');

-- --------------------------------------------------------

--
-- Structure de la table `projects_users`
--

CREATE TABLE IF NOT EXISTS `projects_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leader` tinyint(1) NOT NULL,
  `validation` int(144) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `projects_users`
--

INSERT INTO `projects_users` (`id`, `project_id`, `user_id`, `leader`, `validation`) VALUES
(65, 49, 8, 1, 1),
(66, 50, 8, 1, 1),
(67, 51, 11, 1, 1),
(68, 52, 11, 1, 1),
(69, 53, 12, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'Web developpement'),
(2, 'App developpement'),
(3, 'General developpement'),
(4, 'Network'),
(5, 'Unix'),
(6, 'OSX'),
(7, 'Windows'),
(8, 'Security'),
(9, 'Drawing'),
(10, 'Cinema'),
(11, 'Painting'),
(12, 'Music'),
(13, 'Theatre'),
(14, 'Sculpture'),
(15, 'Photography'),
(16, 'LandArt'),
(17, 'Football'),
(18, 'Rugby'),
(19, 'Basketball'),
(20, 'Handball'),
(21, 'Volleyball'),
(22, 'Tennis'),
(23, 'Work out'),
(24, 'Ping Pong'),
(25, 'Athletics'),
(26, 'Oral communication'),
(27, 'Management'),
(28, 'Marketing'),
(29, 'Car'),
(30, 'Bike'),
(31, 'Truck');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `avaibility` varchar(255) NOT NULL,
  `furnitures` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pass`, `mail`, `last_name`, `first_name`, `city`, `avaibility`, `furnitures`, `interests`) VALUES
(8, 'dodo', 'john.doe@gmail.com', 'doe', 'john', 'Paris', 'Week-End ONLY', 'paint, sticker', 'mecanique'),
(11, 'jd', 'Jeanne.dark@laposte.net', 'Dark', 'Jeanne', 'Bordeaux', 'wednesday, Thursday', 'pc, 1080p camera, pencils', 'data processing'),
(12, 'projizz', 'projizz@y-nov.com', 'Jizz', 'Pro', 'Margaux', 'All Days', 'Pc, switch, fiber optic, Call Of, Wine, Sausage', 'web development, aperitif');

-- --------------------------------------------------------

--
-- Structure de la table `users_skills`
--

CREATE TABLE IF NOT EXISTS `users_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `users_skills`
--

INSERT INTO `users_skills` (`id`, `skill_id`, `user_id`) VALUES
(10, 29, 8),
(11, 1, 11),
(12, 5, 11),
(13, 7, 11),
(14, 1, 12),
(15, 2, 12),
(16, 3, 12),
(17, 4, 12),
(18, 26, 12),
(19, 28, 12);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `projects_users`
--
ALTER TABLE `projects_users`
  ADD CONSTRAINT `projects_users_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `projects_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `users_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
