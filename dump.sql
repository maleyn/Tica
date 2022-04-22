-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 avr. 2022 à 16:29
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
  `content` longtext NOT NULL,
  `image-url` varchar(255) NOT NULL,
  `create-date` datetime NOT NULL,
  `mod-date` datetime DEFAULT NULL,
  `ArticlesUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image-url`, `create-date`, `mod-date`, `ArticlesUsers`) VALUES
(5, 'Article 1', 'Lorem ipsum dolor sit amet. Et adipisci omnis aut enim ullam qui assumenda eius nam voluptatem quia qui exercitationem magni ut recusandae modi sit maxime veritatis. test test2', 'app/Public/Front/img/palette_peintre_sd.jpg', '2022-04-04 15:01:27', '2022-04-04 15:07:05', 4);

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
(25, 'Laurent', 'Josianne', 'josianne.laurent@yahoo.fr', 'Bonjour', 'Bonjour,\r\n\r\nAvez vous reçu ce message ?', '2022-03-29 15:02:55');

-- --------------------------------------------------------

--
-- Structure de la table `frames`
--

CREATE TABLE `frames` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `frames`
--

INSERT INTO `frames` (`id`, `name`) VALUES
(1, 'Bois'),
(2, 'Sans câdre');

-- --------------------------------------------------------

--
-- Structure de la table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `present-alt` varchar(150) NOT NULL,
  `present-url` varchar(255) NOT NULL,
  `present-text1` text NOT NULL,
  `present-text2` text NOT NULL,
  `present-text3` text NOT NULL,
  `present-title` varchar(255) NOT NULL,
  `slider-alt` varchar(255) NOT NULL,
  `slider-url` varchar(255) NOT NULL,
  `slider-text1` varchar(255) NOT NULL,
  `slider-text2` varchar(255) NOT NULL,
  `intro-title` varchar(255) NOT NULL,
  `intro-content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `homepage`
--

INSERT INTO `homepage` (`id`, `present-alt`, `present-url`, `present-text1`, `present-text2`, `present-text3`, `present-title`, `slider-alt`, `slider-url`, `slider-text1`, `slider-text2`, `intro-title`, `intro-content`) VALUES
(1, 'Photo de tica', 'app/Public/Front/img/Photo_de_tica.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'It is a long established fact that a reader will be distracted by the readable content of a page', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece', 'tica', 'tableau de marin', 'app/Public/Front/img/image_fond_header.png', 'TICA vous propose ses meilleures oeuvres ', 'ainsi que celles de plusieurs autres artistes ', 'Présentation', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum debitis distinctio, quidem hic dolores atque dolorum fugit quaerat quasi, dolore magni facilis et aliquam reprehenderit, quae laboriosam aperiam officia libero?');

-- --------------------------------------------------------

--
-- Structure de la table `painters`
--

CREATE TABLE `painters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo-url` varchar(255) NOT NULL,
  `Content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `painters`
--

INSERT INTO `painters` (`id`, `name`, `photo-url`, `Content`) VALUES
(1, 'Tica', 'app/Public/Front/img/Photo_de_tica.png', 'Hic molestiae eligendi et voluptas molestias sit doloribus voluptatum sit ducimus assumenda qui similique facilis ut voluptatum rerum 33 laborum veritatis. Et omnis tempora vel blanditiis eligendi sed fuga maxime sed labore neque 33 ipsa dolores et pariatur consequatur ex velit repudiandae.'),
(5, 'Marta', 'app/Public/Front/img/Peintre_marta.png', 'Ea omnis sint et consequatur fugiat est voluptatum expedita ut magni modi et earum nesciunt. Est dolores deserunt eum fugiat quis et odio sint ut rerum quas est quia reprehenderit. Et laborum expedita qui sunt nihil id inventore rerum a temporibus voluptas et eius fugiat. ');

-- --------------------------------------------------------

--
-- Structure de la table `painterstyle`
--

CREATE TABLE `painterstyle` (
  `idstyle` int(11) NOT NULL,
  `idpainter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `painterstyle`
--

INSERT INTO `painterstyle` (`idstyle`, `idpainter`) VALUES
(2, 1),
(3, 1),
(3, 5),
(4, 5),
(5, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `paints`
--

CREATE TABLE `paints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img-url` varchar(255) NOT NULL,
  `dimensionH` int(11) NOT NULL,
  `dimensionL` int(11) NOT NULL,
  `PaintsFrames` int(11) NOT NULL,
  `PaintsPainters` int(11) NOT NULL,
  `PaintsStyle` int(11) NOT NULL,
  `PaintsType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paints`
--

INSERT INTO `paints` (`id`, `name`, `description`, `img-url`, `dimensionH`, `dimensionL`, `PaintsFrames`, `PaintsPainters`, `PaintsStyle`, `PaintsType`) VALUES
(13, 'Village français', 'Lorem ipsum dolor sit amet. Est expedita accusamus in perferendis nemo facere distinctio eum impedit culpa et galisum veniam.', 'app/Public/Front/img/120332-80X120.jpg', 130, 90, 1, 1, 1, 4),
(14, 'Tableau de voilier et planche à voile', 'Qui vitae atque ut voluptates aliquid aut minus excepturi qui aperiam galisum rem excepturi debitis et omnis inventore.', 'app/Public/Front/img/André-Hambourg-tableau-estimation-prix-1024x810.jpg', 90, 100, 1, 5, 1, 1),
(15, 'Tableau d\'éléphant coloré', 'Id distinctio delectus quo voluptas tempore ex sunt molestias! Quo nihil labore aperiam voluptas et culpa omnis aut dolores reiciendis in voluptate nesciunt non voluptate doloremque non unde repellat.', 'app/Public/Front/img/BO671-119.jpg', 120, 120, 2, 5, 5, 2),
(16, 'Tableau de lion coloré', 'd quibusdam tempora sit nulla dolor in quis itaque 33 officiis officiis sed eligendi corrupti.', 'app/Public/Front/img/BO671-140.jpg', 90, 110, 1, 1, 5, 2),
(19, 'Tableau de maison de campagne', 'Lorem ipsum dolor sit amet. Ea voluptatum magnam est dicta deleniti sed quibusdam neque aut deserunt delectus ea dolorem vitae hic nemo quisquam qui veniam nobis.', 'app/Public/Front/img/maison_de_campagne.JPG', 100, 80, 1, 1, 1, 1),
(20, 'Tableau de pérroquets et toucans', 'Lorem ipsum dolor sit amet. Ea voluptatum magnam est dicta deleniti sed quibusdam neque aut deserunt delectus ea dolorem vitae hic nemo quisquam qui veniam nobis.', 'app/Public/Front/img/tableau-animaux-perroquets-toucans-et-fleurs-5fe2360f0570a.jpg', 130, 110, 2, 1, 1, 3),
(21, 'Tableau de couple qui s\'embrasse', 'Lorem ipsum dolor sit amet. Ea voluptatum magnam est dicta deleniti sed quibusdam neque aut deserunt delectus ea dolorem vitae hic nemo quisquam qui veniam nobis.', 'app/Public/Front/img/tableau_couple_embrassage.jpg', 140, 180, 1, 5, 5, 3),
(22, 'Grand tableau coloré', 'Lorem ipsum dolor sit amet. Ea voluptatum magnam est dicta deleniti sed quibusdam neque aut deserunt delectus ea dolorem vitae hic nemo quisquam qui veniam nobis.', 'app/Public/Front/img/grand_tableau_colore.jpg', 180, 110, 1, 1, 2, 3),
(23, 'Grand arbre rose', 'Lorem ipsum dolor sit amet. Ea voluptatum magnam est dicta deleniti sed quibusdam neque aut deserunt delectus ea dolorem vitae hic nemo quisquam qui veniam nobis.', 'app/Public/Front/img/tableau_arbre_rose.jpg', 120, 80, 1, 1, 6, 2);

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
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `styles`
--

INSERT INTO `styles` (`id`, `name`) VALUES
(1, 'Réalisme'),
(2, 'Abstrait'),
(3, 'Contemporain'),
(4, 'Expressionnisme'),
(5, 'Pop-art'),
(6, 'Surréalisme');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Acrylique'),
(2, 'Huile'),
(3, 'Aquarelle'),
(4, 'Gouache'),
(5, 'Crayons');

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
(4, 'renaud', 'maleyran', 'maleyran@hotmail.fr', '$2y$10$VpKwOy5lqtl0XTi3XqVhj.6CFW2WHWd5dl3juYGKF8M1Vor/mGXp2', 1),
(40, 'editeur', 'editeur', 'editeur@editeur.fr', '$2y$10$b9zjY7AJ51UoNM5Rq5MR2eRk7.zIFpsTv4Dw0/vbjt4W062opUXXK', 4);

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
-- Index pour la table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `painters`
--
ALTER TABLE `painters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `painterstyle`
--
ALTER TABLE `painterstyle`
  ADD KEY `FK__styles` (`idstyle`),
  ADD KEY `FK__painters` (`idpainter`);

--
-- Index pour la table `paints`
--
ALTER TABLE `paints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Paints_fk0` (`PaintsFrames`),
  ADD KEY `Paints_fk1` (`PaintsPainters`),
  ADD KEY `PaintsStyle` (`PaintsStyle`),
  ADD KEY `PaintsType` (`PaintsType`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `frames`
--
ALTER TABLE `frames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `paints`
--
ALTER TABLE `paints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_fk0` FOREIGN KEY (`ArticlesUsers`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `painterstyle`
--
ALTER TABLE `painterstyle`
  ADD CONSTRAINT `FK__painters` FOREIGN KEY (`idpainter`) REFERENCES `painters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK__styles` FOREIGN KEY (`idstyle`) REFERENCES `styles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `paints`
--
ALTER TABLE `paints`
  ADD CONSTRAINT `FK_paints_styles` FOREIGN KEY (`PaintsStyle`) REFERENCES `styles` (`id`),
  ADD CONSTRAINT `FK_paints_types` FOREIGN KEY (`PaintsType`) REFERENCES `types` (`id`),
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
