-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 16 mars 2022 à 11:28
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tica`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `small-content` text NOT NULL,
  `full-content` longtext NOT NULL,
  `img-url` varchar(255) NOT NULL,
  `img-alt` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `ArticlesUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `objet` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `objet`, `message`, `date`) VALUES
(7, 'durand', 'marc', 'marc.durand@hotmail.fr', 'autre test', 'un autre test !', '2022-03-10 14:05:06'),
(9, 'Tranche', 'Marc', 'marc.tranche@gmail.com', 'Bonjour', 'Au revoir !', '2022-03-11 17:17:42'),
(20, 'Blanchard', 'Giselle', 'giselle.blanchard@gmail.fr', 'Bonjour', 'Juste pour dire bonjour !', '2022-03-11 17:23:26'),
(21, 'Martinez ', 'Vivianne', 'vivianne.martinez@yahoo.fr', 'peinture', 'Je veux peindre !', '2022-03-11 17:24:26'),
(22, 'Romichet', 'Robert', 'robert.romichet@hotmail.fr', 'gardien de la paix', 'à fortiori un gardien de la paix avant tout.', '2022-03-11 17:26:02'),
(23, 'Patoulachi', 'marcel', 'marcel.patoulachi@yahoo.fr', 'Gardien', 'Du même avis que mon collègue ! à fortiori !', '2022-03-11 17:27:09');

-- --------------------------------------------------------

--
-- Structure de la table `frames`
--

CREATE TABLE `frames` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `home-introduction`
--

CREATE TABLE `home-introduction` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `home-introduction`
--

INSERT INTO `home-introduction` (`id`, `title`, `content`) VALUES
(1, 'Présentation', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum debitis distinctio, quidem hic dolores atque dolorum fugit quaerat quasi, dolore magni facilis et aliquam reprehenderit, quae laboriosam aperiam officia libero?');

-- --------------------------------------------------------

--
-- Structure de la table `home-slider`
--

CREATE TABLE `home-slider` (
  `id` int(11) NOT NULL,
  `img-alt` varchar(150) NOT NULL,
  `url` varchar(255) NOT NULL,
  `intro-text1` varchar(255) DEFAULT NULL,
  `intro-text2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `home-slider`
--

INSERT INTO `home-slider` (`id`, `img-alt`, `url`, `intro-text1`, `intro-text2`) VALUES
(1, 'tableau de marin', 'app/Public/Front/img/image_fond_header.png', 'TICA vous propose ses meilleures oeuvres ', 'ainsi que celles de plusieurs autres artistes ');

-- --------------------------------------------------------

--
-- Structure de la table `home-tica`
--

CREATE TABLE `home-tica` (
  `id` int(11) NOT NULL,
  `img-alt` varchar(150) NOT NULL,
  `url` varchar(255) NOT NULL,
  `text1` text DEFAULT NULL,
  `text2` text DEFAULT NULL,
  `text3` text DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `home-tica`
--

INSERT INTO `home-tica` (`id`, `img-alt`, `url`, `text1`, `text2`, `text3`, `title`) VALUES
(1, 'Photo de tica', 'app/Public/Front/img/Photo_de_tica.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'It is a long established fact that a reader will be distracted by the readable content of a page', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece', 'tica');

-- --------------------------------------------------------

--
-- Structure de la table `painters`
--

CREATE TABLE `painters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `small-content` text NOT NULL,
  `full-content` longtext NOT NULL,
  `PainterStyle` int(11) NOT NULL,
  `PainterType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paints`
--

CREATE TABLE `paints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img-url` varchar(255) NOT NULL,
  `img-alt` varchar(255) NOT NULL,
  `dimension-H` int(11) NOT NULL,
  `dimension-L` int(11) NOT NULL,
  `price` float NOT NULL,
  `PaintsFrames` int(11) NOT NULL,
  `PaintsPainters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'administrateur'),
(4, 'editeur');

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `UsersRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `mail`, `password`, `UsersRoles`) VALUES
(4, 'maleyran', 'renaud', 'maleyran@hotmail.fr', '$2y$10$VpKwOy5lqtl0XTi3XqVhj.6CFW2WHWd5dl3juYGKF8M1Vor/mGXp2', 1),
(25, 'editeur', 'editeur', 'editeur@hotmail.fr', '$2y$10$pBpm5UucCH4f2tuBtVe/Kehei2jzVWlmpxKLmrHDU51omCWrI8EhW', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Articles_fk0` (`ArticlesUsers`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home-introduction`
--
ALTER TABLE `home-introduction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home-slider`
--
ALTER TABLE `home-slider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home-tica`
--
ALTER TABLE `home-tica`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `painters`
--
ALTER TABLE `painters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Painters_fk0` (`PainterStyle`),
  ADD KEY `Painters_fk1` (`PainterType`);

--
-- Index pour la table `paints`
--
ALTER TABLE `paints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Paints_fk0` (`PaintsFrames`),
  ADD KEY `Paints_fk1` (`PaintsPainters`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Users_fk0` (`UsersRoles`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `frames`
--
ALTER TABLE `frames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `home-introduction`
--
ALTER TABLE `home-introduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `home-slider`
--
ALTER TABLE `home-slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `home-tica`
--
ALTER TABLE `home-tica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paints`
--
ALTER TABLE `paints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_fk0` FOREIGN KEY (`ArticlesUsers`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `painters`
--
ALTER TABLE `painters`
  ADD CONSTRAINT `Painters_fk0` FOREIGN KEY (`PainterStyle`) REFERENCES `styles` (`id`),
  ADD CONSTRAINT `Painters_fk1` FOREIGN KEY (`PainterType`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `paints`
--
ALTER TABLE `paints`
  ADD CONSTRAINT `Paints_fk0` FOREIGN KEY (`PaintsFrames`) REFERENCES `frames` (`id`),
  ADD CONSTRAINT `Paints_fk1` FOREIGN KEY (`PaintsPainters`) REFERENCES `painters` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`UsersRoles`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
