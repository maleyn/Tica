-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 15 mai 2022 à 12:56
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

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
(5, 'La peinture, c&#039;est super !', '<p>Lorem ipsum dolor sit amet.</p>\r\n<p>&nbsp;</p>\r\n<p>A distinctio maiores in <em>facere dolorem</em> ut consequatur aliquid cum soluta delectus sit placeat rerum qui labore necessitatibus. Et amet dolores est magni neque et accusantium commodi in velit consequatur non blanditiis voluptate sed dolor ipsam. 33 cupiditate voluptatum id laudantium nobis ex possimus quibusdam.</p>\r\n<p>&nbsp;</p>\r\n<p>Sit voluptatem consequuntur ut aperiam ipsa aut voluptas veniam sit culpa dignissimos est porro dolorem. A eveniet expedita ut obcaecati incidunt ea ipsa quidem sed autem enim sit voluptatem deleniti aut omnis libero ad distinctio cumque? Qui enim voluptatem quo internos galisum aut laboriosam consequatur in voluptatem unde ut quia dolorem quo neque omnis eum incidunt iusto. <strong>Est molestiae</strong> dolores ab aliquid iste qui perspiciatis reprehenderit non facilis adipisci.</p>\r\n<p>&nbsp;</p>\r\n<p>Eum dolores aliquid At internos ipsam ut <em>facilis earum</em> est sequi numquam qui pariatur consequatur.</p>', 'app/Public/Front/img/palette_peintre_sd.jpg', '2022-04-04 15:01:27', '2022-05-13 13:16:48', 4),
(7, 'Nouveau livre de Tica', '<p>Lorem ipsum dolor sit amet.</p>\r\n<p>Aut impedit expedita sed repudiandae labore aut officia magni eum omnis dolorem et animi aut fugiat explicabo eos magni vitae! Sed officia accusamus ut harum mollitia eum quis autem. Aut adipisci harum <strong>At corporis</strong> explicabo ut consequuntur impedit. <em>Qui animi</em> magni ut quisquam dolore et tempora tempore et architecto odit ex animi consequatur. Ea molestias molestiae eum odio praesentium eos <em>consequuntur qui</em> quibusdam aliquam At error voluptas id nobis labore sit placeat voluptatibus! Hic nostrum debitis ut harum aperiam ea <strong>autem</strong> molestias sit sunt tempora qui voluptas perspiciatis est voluptatibus sunt.</p>\r\n<p>&nbsp;</p>\r\n<p>Et voluptatem voluptatibus qui minima animi sit molestiae possimus vel <strong>voluptatem</strong> voluptatem. Et repellendus fugiat ut nobis exercitationem ut molestiae consequatur qui ullam galisum quo omnis molestias.</p>', 'app/Public/Front/img/La-peinture-a-l-huile.jpg', '2022-04-25 14:46:40', '2022-05-13 13:15:58', 4),
(8, 'Apprendre les bases', '<p>Lorem ipsum dolor sit amet. <strong>Aut impedit</strong> expedita sed repudiandae labore aut officia magni eum omnis dolorem et animi aut fugiat explicabo eos magni vitae!</p>\r\n<p>&nbsp;</p>\r\n<p>Sed officia accusamus ut harum mollitia eum quis autem. Aut adipisci <em>harum At corporis</em> explicabo ut consequuntur impedit. Qui animi magni ut quisquam dolore et tempora tempore et architecto <em>odit ex animi consequatur</em>. Ea molestias molestiae eum odio praesentium eos consequuntur qui quibusdam aliquam At error voluptas id nobis labore sit placeat voluptatibus!</p>\r\n<p>&nbsp;</p>\r\n<p>Hic nostrum debitis ut harum <strong>aperiam</strong> ea autem molestias sit sunt tempora qui voluptas perspiciatis est voluptatibus sunt.</p>', 'app/Public/Front/img/394313_813122.jpg', '2022-04-25 14:49:13', '2022-05-13 13:14:57', 4),
(9, 'Ou acheter ses tubes de peinture', '<p>Lorem ipsum dolor sit amet. <strong>Aut impedit</strong> expedita sed repudiandae labore aut officia magni eum omnis <em>dolorem</em> et animi aut fugiat explicabo eos magni vitae! Sed officia accusamus ut harum mollitia eum quis autem. Aut adipisci harum <em>At corporis explicabo ut consequuntur impedit</em>.</p>\r\n<p>&nbsp;</p>\r\n<p>Qui animi magni ut quisquam dolore et tempora tempore et architecto odit ex animi consequatur. <em>Ea molestias molestiae</em> eum odio praesentium eos consequuntur qui quibusdam aliquam At error voluptas id nobis labore sit placeat voluptatibus! Hic nostrum debitis ut harum aperiam ea autem molestias sit sunt tempora qui voluptas perspiciatis est voluptatibus sunt.</p>', 'app/Public/Front/img/tubes-of-acrylic-paint-in-different-colors-close-up-min.jpg', '2022-04-25 14:53:17', '2022-05-13 13:14:18', 4),
(10, 'Comment peindre des visages', '<p>Lorem ipsum dolor sit amet. <strong>Aut impedit </strong>expedita sed repudiandae labore aut officia magni eum omnis dolorem et <strong>animi </strong>aut fugiat explicabo eos magni vitae! Sed officia accusamus ut harum mollitia eum quis autem. <em>Aut adipisci</em> harum At corporis explicabo ut consequuntur impedit.</p>\r\n<p>&nbsp;</p>\r\n<p>Qui animi magni ut quisquam dolore et tempora tempore et architecto odit ex animi consequatur. Ea molestias molestiae eum odio praesentium eos consequuntur qui quibusdam aliquam At error voluptas id nobis labore sit placeat voluptatibus! Hic <strong>nostrum</strong> debitis ut harum aperiam ea autem molestias sit sunt tempora qui voluptas perspiciatis est voluptatibus sunt.</p>', 'app/Public/Front/img/peindre-un-portrait 1.jpg', '2022-04-25 14:54:06', '2022-05-13 11:56:56', 4),
(11, 'Tout le matériel indispensable !', '<p>Lorem ipsum dolor sit amet. Aut impedit expedita sed <strong>repudiandae</strong> labore aut officia magni eum omnis dolorem et animi aut fugiat explicabo eos magni vitae! Sed officia accusamus ut harum mollitia eum quis autem. Aut adipisci harum At corporis explicabo ut <em>consequuntur impedit</em>. Qui animi magni ut quisquam dolore et tempora tempore et architecto odit ex animi consequatur.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Ea molestias</strong> molestiae eum odio praesentium eos consequuntur qui quibusdam aliquam At error voluptas id nobis labore sit placeat voluptatibus! Hic nostrum debitis ut harum aperiam ea autem molestias sit sunt tempora qui voluptas perspiciatis est voluptatibus sunt.</p>', 'app/Public/Front/img/dirty-coloured-palette-and-paint.jpg', '2022-04-25 14:56:12', '2022-05-13 11:44:09', 4),
(12, 'Introduction au Pop art', '<p><strong>Lorem ipsum dolor sit amet</strong>. Aut impedit expedita sed repudiandae labore aut officia magni eum omnis dolorem et animi aut fugiat explicabo eos magni vitae! Sed officia accusamus ut harum mollitia eum quis autem.</p>\r\n<p>&nbsp;</p>\r\n<p>Aut adipisci harum At corporis explicabo ut <strong>consequuntur impedit</strong>. Qui animi magni ut quisquam dolore et tempora tempore et architecto odit ex animi consequatur. Ea molestias molestiae eum odio praesentium eos consequuntur qui quibusdam aliquam <em>At error</em> voluptas id nobis labore sit placeat voluptatibus! Hic nostrum debitis ut harum aperiam ea autem molestias sit sunt tempora qui voluptas perspiciatis est voluptatibus sunt.</p>', 'app/Public/Front/img/Marilyn-diptych-1009x1024.jpg', '2022-04-25 15:04:26', '2022-05-13 11:57:29', 4),
(13, 'Le livre indispensable pour apprendre', '<p><strong>Lorem ipsum dolor sit amet</strong>. Eum quas vero ut ipsa cumque ut itaque omnis ab aperiam beatae. Rem voluptatem illum aut ducimus quis ut accusamus beatae et sunt quos. Et aliquam dolores aut dolore temporibus qui minus repudiandae. <em>Non nostrum fugiat</em> ex earum enim qui quia incidunt At aliquam dignissimos cum unde maiores et omnis corrupti. Ut galisum omnis et molestiae nesciunt sed omnis voluptate et repellendus provident aut quod voluptatem et velit voluptatem?</p>\r\n<p>&nbsp;</p>\r\n<p>Est modi assumenda sed voluptatem galisum id voluptatem iure quo doloribus galisum sit ipsam sint.</p>', 'app/Public/Front/img/4faec5e96fd846c5eac5e7ef00e14ba58b7dc90c.jpg', '2022-04-26 09:56:22', '2022-05-13 11:42:24', 4);

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
(2, 'Sans câdre'),
(9, 'Aluminium');

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
(1, 'Photo de tica', 'app/Public/Front/img/Photo_de_tica.png', '<p>Lorem Ipsum is simply dummy text of the printing and <strong>typesetting</strong> industry. Lorem Ipsum has been the industry\'s <em>standard dummy</em> text ever since the 1500s</p>', '<p>It is a long <strong>established</strong> fact that a reader will be distracted by the <em>readable</em> content of a page</p>', '<p>Contrary to <strong>popular belief</strong>, Lorem Ipsum is not <em>simply random</em> text. It has roots in a piece</p>', 'tica', 'tableau de marin', 'app/Public/Front/img/image_fond_header.png', 'TICA vous propose ses meilleures oeuvres ', 'ainsi que celles de plusieurs autres artistes ', 'Présentation', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. <strong>Earum</strong> debitis distinctio, quidem hic dolores atque dolorum fugit quaerat quasi, dolore magni facilis et aliquam reprehenderit, quae <em>laboriosam aperiam</em> officia libero?</p>');

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
(1, 'Tica', 'app/Public/Front/img/Photo_de_tica.png', '<p>Hic molestiae eligendi et <em>voluptas molestias</em> sit doloribus voluptatum sit ducimus assumenda qui similique facilis ut voluptatum rerum 33 laborum veritatis. Et omnis tempora vel blanditiis eligendi sed fuga maxime sed labore neque 33 <strong>ipsa dolores et pariatur consequatur</strong> ex velit repudiandae.</p>'),
(5, 'Marta', 'app/Public/Front/img/Peintre_marta.png', '<p><strong>Ea omnis sint et consequatur</strong> fugiat est voluptatum expedita ut magni modi et earum nesciunt. <em>Est dolores deserunt</em> eum fugiat quis et odio sint ut rerum quas est quia reprehenderit. Et laborum expedita qui <em>sunt nihil id inventore</em> rerum a temporibus voluptas et eius fugiat.</p>'),
(6, 'Garasa', 'app/Public/Front/img/Garasa.jpg', '<p>Lorem ipsum dolor sit amet. In natus iste quo alias fugiat <em>qui temporibus voluptatum At nobis voluptas</em>. Et officiis quia nam harum suscipit aut tempore nulla et accusantium enim. <strong>Non sint neque</strong> non rerum odio eos quaerat molestias voluptatum debitis eum distinctio iusto vel officia sint. <strong>Est alias quia</strong> vel voluptatem quia 33 explicabo molestiae non mollitia fugit et dolorem error.</p>'),
(7, 'Vettese', 'app/Public/Front/img/Vettese.jpg', '<p>Lorem ipsum dolor sit amet. <strong>Aut laborum maiores</strong> est molestiae rerum ab cumque veniam. <em>Eum magni rerum</em> aut sunt ipsa id aliquid quia. Ut recusandae omnis qui exercitationem magnam et esse autem aut <strong>consectetur consequatur</strong>. Et tenetur consequatur vel aliquid nisi et nihil vero ea deserunt debitis eum culpa explicabo est numquam dolorum.</p>'),
(17, 'Paulo', 'app/Public/Front/img/Paulo-min.jpg', '<p>Lorem ipsum dolor sit amet. Eos galisum cupiditate hic quos vitae 33 neque <strong>praesentium</strong> et ipsa consequatur et repellendus tempore dolorem sint. Id Quis reiciendis ab deleniti nisi in perferendis <em>reiciendis eos voluptatum</em> optio qui fugit natus et illum vitae. Quo consequuntur tenetur eum aspernatur voluptas sed quia doloribus hic sint possimus ea ipsa beatae quo doloremque obcaecati et autem quod.</p>'),
(18, 'Marco', 'app/Public/Front/img/artiste-jean-marc.jpg', '<p>Ut dolorem aliquid nam quas <strong>amet 33</strong> velit aperiam ad exercitationem quia. Id adipisci tempore sed tempora atque nam cumque iure. At consequuntur cupiditate qui sapiente adipisci et <strong>molestiae</strong> recusandae id praesentium rerum et <em>dolorem</em> incidunt et nemo dolores aut facere nostrum.</p>');

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
(5, 5),
(3, 1),
(4, 1),
(1, 5),
(6, 5),
(1, 1),
(2, 6),
(3, 6),
(6, 6),
(1, 17),
(2, 17),
(2, 7),
(5, 7),
(5, 17),
(4, 7),
(5, 1),
(3, 7),
(5, 6),
(6, 1),
(3, 18),
(6, 18);

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
  `PaintsFrames` int(11) NOT NULL DEFAULT 2,
  `PaintsPainters` int(11) NOT NULL,
  `PaintsStyle` int(11) NOT NULL,
  `PaintsType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paints`
--

INSERT INTO `paints` (`id`, `name`, `description`, `img-url`, `dimensionH`, `dimensionL`, `PaintsFrames`, `PaintsPainters`, `PaintsStyle`, `PaintsType`) VALUES
(13, 'Village français', '<p><strong>Lorem ipsum</strong> dolor sit amet. Est expedita accusamus <em>in perferendis</em> nemo facere distinctio eum impedit culpa et galisum veniam.</p>', 'app/Public/Front/img/120332-80X120.jpg', 130, 90, 1, 1, 1, 4),
(14, 'Tableau de voilier et planche à voile', '<p><strong>Rem dolorem saepe ut voluptate</strong> laboriosam ex blanditiis eius! <em>Est quibusdam</em> unde aut deserunt ratione qui repellat ipsa non necessitatibus vitae non dolorem quia et molestiae dolor. <em>In praesentium nihil</em> et perferendis rerum At optio dolores in optio sint At doloribus omnis ut debitis reprehenderit ad eaque reprehenderit.</p>', 'app/Public/Front/img/André-Hambourg-tableau-estimation-prix-1024x810.jpg', 90, 100, 1, 17, 1, 1),
(15, 'Tableau d&#039;éléphant coloré', '<p><strong>Qui molestias nostrum id dolor quod</strong> qui accusamus nemo in totam quas. <em>Rem reiciendis neque</em> eos autem aliquam qui natus labore est enim laudantium et rerum sed officia quibusdam. <em>Vel molestiae expedita</em> et minima quos quo autem quis non harum quidem.</p>', 'app/Public/Front/img/BO671-119.jpg', 120, 120, 2, 5, 5, 2),
(16, 'Tableau de lion coloré', '<p><strong>Lorem ipsum dolor sit amet</strong>. Aut voluptas nostrum qui porro consequuntur ut excepturi corporis et aspernatur quam non laboriosam quod. Ut sint omnis et consequuntur repudiandae non soluta doloribus non architecto <em>facere est inventore</em> voluptatem eos quos tenetur non aliquid neque. Aut reiciendis dolores qui <strong>sapiente deleniti sed totam magnam</strong> ea dolorem error sed laudantium minus ut nulla totam est numquam voluptatem.</p>', 'app/Public/Front/img/BO671-140.jpg', 90, 110, 1, 1, 5, 2),
(19, 'Tableau de maison de campagne', '<p><strong>Est nihil omnis qui sequi</strong> enim ut distinctio aliquam vel omnis porro? Ut iure quae non <em>perferendis nisi sed</em> natus quia qui facilis eveniet vel earum illum! Cum amet asperiores qui quia dolorem eos corrupti <strong>ducimus sunt laboriosam</strong>. Ut tempora aspernatur a nihil magni nam reiciendis neque ut repellendus labore At suscipit omnis sed temporibus ipsam.</p>', 'app/Public/Front/img/maison_de_campagne.JPG', 100, 80, 1, 7, 1, 1),
(20, 'Tableau de pérroquets et toucans', '<p>Est nihil omnis qui sequi enim ut <strong>distinctio aliquam</strong> vel omnis porro? Ut iure quae <em>non perferendis</em> nisi sed natus quia qui facilis eveniet vel earum illum! Cum amet <strong>asperiores qui quia dolorem</strong> eos corrupti ducimus sunt laboriosam. Ut tempora aspernatur a nihil magni nam reiciendis neque ut repellendus labore At suscipit omnis sed temporibus ipsam.</p>', 'app/Public/Front/img/tableau-animaux-perroquets-toucans-et-fleurs-5fe2360f0570a.jpg', 130, 110, 2, 1, 1, 3),
(21, 'Tableau de couple qui s&#039;embrasse', '<p>Quo natus eveniet non velit voluptatem aut incidunt <strong>nulla aut commodi</strong> laborum sit omnis tempore ab consequuntur dolores. Sit nisi repellendus aut placeat quos qui autem fuga est nostrum impedit maiores dolores. Vel iusto iusto aut nemo nemo est <strong>voluptatem</strong> internos non quasi internos. Ex eaque quas eum excepturi quasi ut obcaecati <em>necessitatibus</em> est eveniet sapiente ut dolores aperiam.</p>', 'app/Public/Front/img/tableau_couple_embrassage.jpg', 140, 180, 1, 5, 5, 3),
(22, 'Grand tableau coloré', '<p><strong>Aut quia dolorem</strong> id eveniet sunt aut nihil nulla ab quaerat illum. <strong>Quo doloremque</strong> enim ut esse harum et reprehenderit consequatur ea odio voluptates id quos temporibus. Hic tempora animi ea dicta excepturi est debitis illum ut <em>consequatur galisum</em> et recusandae atque dicta internos. Vel nostrum provident sed officiis eius ea veniam dolore qui commodi delectus <strong>non accusantium</strong> nisi rem porro facere.</p>', 'app/Public/Front/img/grand_tableau_colore.jpg', 180, 110, 1, 18, 2, 3),
(23, 'Grand arbre rose', '<p><strong>Lorem ipsum</strong> dolor sit amet. Sit veritatis corporis et ullam veritatis sit asperiores officiis et cupiditate saepe in suscipit numquam. Et beatae nesciunt vel animi alias ab voluptas enim qui laudantium fuga <em>cum odio numquam</em>. Id ullam omnis est magnam sunt sit nobis vitae.</p>', 'app/Public/Front/img/tableau_arbre_rose.jpg', 120, 80, 9, 6, 6, 2),
(27, 'Campagne Aveyronnaise', '<p><strong>Lorem ipsum dolor sit amet</strong>. Aut illum voluptatibus ea galisum quidem vel laborum fugiat. Sit sint voluptatum est tempora architecto eum magnam placeat id provident pariatur et enim debitis. <em>Qui laboriosam voluptatem</em> eum explicabo rerum et tenetur eveniet est unde culpa in odio voluptates et obcaecati quia aut quia distinctio. <strong>Et nihil recusandae</strong> cum quae quaerat eos aperiam dolorem vel animi omnis ut sint error ut iure impedit.</p>', 'app/Public/Front/img/images.jpg', 130, 120, 9, 6, 1, 4);

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
(40, 'editeur', 'editeur', 'editeur@editeur.fr', '$2y$10$b9zjY7AJ51UoNM5Rq5MR2eRk7.zIFpsTv4Dw0/vbjt4W062opUXXK', 4),
(41, 'admin', 'admin', 'admin@admin.fr', '$2y$10$F3iOYqgB0V3JqjHHM4xgUeGE2lwBoSIzb543LsRhhCotqja2A2shG', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `frames`
--
ALTER TABLE `frames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `paints`
--
ALTER TABLE `paints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  ADD CONSTRAINT `FK__painters` FOREIGN KEY (`idpainter`) REFERENCES `painters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__styles` FOREIGN KEY (`idstyle`) REFERENCES `styles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `paints`
--
ALTER TABLE `paints`
  ADD CONSTRAINT `FK_paints_frames` FOREIGN KEY (`PaintsFrames`) REFERENCES `frames` (`id`),
  ADD CONSTRAINT `FK_paints_styles` FOREIGN KEY (`PaintsStyle`) REFERENCES `styles` (`id`),
  ADD CONSTRAINT `FK_paints_types` FOREIGN KEY (`PaintsType`) REFERENCES `types` (`id`),
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
