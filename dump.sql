-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 08:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tica`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
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
-- Table structure for table `contacts`
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
-- Dumping data for table `contacts`
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
-- Table structure for table `frames`
--

CREATE TABLE `frames` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frames`
--

INSERT INTO `frames` (`id`, `name`) VALUES
(1, 'Bois');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
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
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `present-alt`, `present-url`, `present-text1`, `present-text2`, `present-text3`, `present-title`, `slider-alt`, `slider-url`, `slider-text1`, `slider-text2`, `intro-title`, `intro-content`) VALUES
(1, 'Photo de tica', 'app/Public/Front/img/Photo_de_tica.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'It is a long established fact that a reader will be distracted by the readable content of a page', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece', 'tica', 'tableau de marin', 'app/Public/Front/img/image_fond_header.png', 'TICA vous propose ses meilleures oeuvres ', 'ainsi que celles de plusieurs autres artistes ', 'Présentation', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum debitis distinctio, quidem hic dolores atque dolorum fugit quaerat quasi, dolore magni facilis et aliquam reprehenderit, quae laboriosam aperiam officia libero?');

-- --------------------------------------------------------

--
-- Table structure for table `painters`
--

CREATE TABLE `painters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `smallContent` text NOT NULL,
  `fullContent` longtext NOT NULL,
  `style` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `painters`
--

INSERT INTO `painters` (`id`, `name`, `smallContent`, `fullContent`, `style`, `type`) VALUES
(1, 'Tica', 'Lorem ipsum dolor sit amet. Et soluta alias ut unde accusantium qui quidem quaerat.', 'Hic molestiae eligendi et voluptas molestias sit doloribus voluptatum sit ducimus assumenda qui similique facilis ut voluptatum rerum 33 laborum veritatis. Et omnis tempora vel blanditiis eligendi sed fuga maxime sed labore neque 33 ipsa dolores et pariatur consequatur ex velit repudiandae. ', 'Réalisme, Abstrait ', 'Accrylique, Huile');

-- --------------------------------------------------------

--
-- Table structure for table `paints`
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
-- Dumping data for table `paints`
--

INSERT INTO `paints` (`id`, `name`, `description`, `img-url`, `dimensionH`, `dimensionL`, `PaintsFrames`, `PaintsPainters`, `PaintsStyle`, `PaintsType`) VALUES
(6, 'Maison de campagne', '', 'app\\Public\\Front\\img\\maison_de_campagne.jpg', 80, 120, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'administrateur'),
(4, 'editeur');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `name`) VALUES
(1, 'Réalisme'),
(2, 'Abstrait');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Acrylique'),
(2, 'Huile');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `mail`, `password`, `UsersRoles`) VALUES
(4, 'maleyran', 'renaud', 'maleyran@hotmail.fr', '$2y$10$VpKwOy5lqtl0XTi3XqVhj.6CFW2WHWd5dl3juYGKF8M1Vor/mGXp2', 1),
(25, 'editeur', 'editeur', 'editeur@hotmail.fr', '$2y$10$pBpm5UucCH4f2tuBtVe/Kehei2jzVWlmpxKLmrHDU51omCWrI8EhW', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Articles_fk0` (`ArticlesUsers`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `painters`
--
ALTER TABLE `painters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paints`
--
ALTER TABLE `paints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Paints_fk0` (`PaintsFrames`),
  ADD KEY `Paints_fk1` (`PaintsPainters`),
  ADD KEY `PaintsStyle` (`PaintsStyle`),
  ADD KEY `PaintsType` (`PaintsType`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Users_fk0` (`UsersRoles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `frames`
--
ALTER TABLE `frames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paints`
--
ALTER TABLE `paints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_fk0` FOREIGN KEY (`ArticlesUsers`) REFERENCES `users` (`id`);

--
-- Constraints for table `paints`
--
ALTER TABLE `paints`
  ADD CONSTRAINT `FK_paints_styles` FOREIGN KEY (`PaintsStyle`) REFERENCES `styles` (`id`),
  ADD CONSTRAINT `FK_paints_types` FOREIGN KEY (`PaintsType`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `Paints_fk0` FOREIGN KEY (`PaintsFrames`) REFERENCES `frames` (`id`),
  ADD CONSTRAINT `Paints_fk1` FOREIGN KEY (`PaintsPainters`) REFERENCES `painters` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`UsersRoles`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
