-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:33063
-- Generation Time: Jun 05, 2021 at 12:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_registar_user_name` (IN `arg_nome` VARCHAR(50), IN `arg_email` VARCHAR(90), IN `arg_pass` VARCHAR(50), IN `arg_token` VARCHAR(50))  BEGIN
INSERT INTO user_name (user_name, user_email) VALUES(arg_nome, arg_email);
SET @user_name_id = LAST_INSERT_ID();
INSERT INTO user_password (user_name_id, user_password) VALUES (@user_name_id, arg_pass);
INSERT INTO user_token (user_name_id, user_token) VALUES (@user_name_id, arg_token);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_validar_user_name` (IN `arg_nome_id` INT, IN `arg_token_id` INT)  BEGIN
DELETE FROM user_token WHERE id = arg_token_id LIMIT 1;
UPDATE user_name SET estado = 1 WHERE id = arg_nome_id;
INSERT INTO user_access_level (user_name_id, access_level_id) VALUES (arg_nome_id,1);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `id` int(11) NOT NULL,
  `access_level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `access_level`) VALUES
(1, 'level_1'),
(2, 'level_2'),
(3, 'level_3');

-- --------------------------------------------------------

--
-- Table structure for table `ficheiro`
--

CREATE TABLE `ficheiro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `nome_ficheiro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_contact`
--

CREATE TABLE `message_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_contact`
--

INSERT INTO `message_contact` (`id`, `name`, `email`, `telephone`, `message`, `creation_date`) VALUES
(2, 'hungabunga', 'hunga@hunga.hug', 'hhhuuuummmm', 'hungabunga bunga hunga', '2021-04-20 18:35:40'),
(3, 'hungabunga', 'hunga@hunga.hug', 'hhhuuuummmm', 'hunga hunga', '2021-04-20 18:36:46'),
(4, 'ajk', 'asdj', 'dak', 'dsa', '2021-04-21 16:51:54'),
(5, 'khash', 'ojasoj', 'bibiu', 'ijiojmd', '2021-04-21 16:56:06'),
(6, 'haskjk', 'dfhasn', 'hoidasoih', 'ljdaiojdsanudha', '2021-04-21 17:23:54'),
(7, 'jknk', 'kldsaklnl', 'lknlskanm', 'kashkhdkahdsna', '2021-04-21 17:26:39'),
(8, 'jknk', 'kldsaklnl', 'lknlskanm', 'kashkhdkahdsna', '2021-04-21 17:28:23'),
(9, 'jksadkj', 'kjhfkh', 'kjckjk', 'kjkdkjn', '2021-04-21 17:29:21'),
(10, 'nbakj', 'jkashjdn', 'kkjkjnsdknkj', 'nskjnkansn', '2021-04-21 17:32:43'),
(11, 'shadkjhhk', 'khdskajhk', 'hhikhuh', 'uhikhasuisadnsda', '2021-04-21 17:33:20'),
(12, 'sakghk', 'askjkj', 'kjhajkd', '', '2021-04-21 17:34:44'),
(13, 'jkakd', 'kjhasjk', 'kjhdaskjh', 'kjhkjsajkdjakns', '2021-04-21 17:35:34'),
(14, 'jkuhnk', 'jljinkslajks', 'jishaskj', 'iojsajjjskajijsnj', '2021-04-21 17:37:25'),
(15, 'jkadjk', 'jkasdjkasjk', 'kjasdjkskjkj', 'kjsadkskjajksdjka', '2021-04-21 17:39:47'),
(16, 'jkshn', 'sansj ', 'jkshowo', 'ojoisjaosdan', '2021-04-21 17:40:17'),
(17, '$message_name', '$message_email', '$message_phone', '$message_content', '2021-06-01 23:07:02'),
(18, 'jasd', 'jhkas', 'asg', 'kajshd', '2021-06-01 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `message_processing`
--

CREATE TABLE `message_processing` (
  `id` int(11) NOT NULL,
  `id_message` int(11) DEFAULT NULL,
  `id_user_name` int(11) DEFAULT NULL,
  `process_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_processing`
--

INSERT INTO `message_processing` (`id`, `id_message`, `id_user_name`, `process_date`) VALUES
(1, 1, 32, '2021-06-03 21:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `page_brand`
--

CREATE TABLE `page_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(90) DEFAULT NULL,
  `brand_logo` varchar(90) DEFAULT NULL,
  `brand_update` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_brand`
--

INSERT INTO `page_brand` (`id`, `brand_name`, `brand_logo`, `brand_update`) VALUES
(1, 'Brand Name', 'brand.png', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `page_header`
--

CREATE TABLE `page_header` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `header_title` varchar(90) DEFAULT NULL,
  `header_subtitle` varchar(255) DEFAULT NULL,
  `body` varchar(4096) DEFAULT NULL,
  `header_background` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_header`
--

INSERT INTO `page_header` (`id`, `page_id`, `header_title`, `header_subtitle`, `body`, `header_background`) VALUES
(1, 1, 'Blog Title', 'Blog subtitle', NULL, 'home_bg.jpg'),
(2, 2, 'About Us', 'This is what we do.', '<div class=\"container\"><div class=\"row\"><div class=\"col-md-10 col-lg-8 mx-auto\"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p></div></div></div><hr>', 'about_bg.jpg'),
(3, 3, 'Contact Us', 'Have questions? I have answers.', NULL, 'contact_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE `page_info` (
  `id` int(11) NOT NULL,
  `page_title` varchar(90) DEFAULT NULL,
  `page_file_name` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `page_title`, `page_file_name`) VALUES
(1, 'Home Page', 'index.php'),
(2, 'About Us', 'page_about.php'),
(3, 'Contact Us', 'page_contact.php'),
(4, 'Blog', 'page_blog.php'),
(5, 'Post', 'page_post.php');

-- --------------------------------------------------------

--
-- Table structure for table `page_nav_menu`
--

CREATE TABLE `page_nav_menu` (
  `id` int(11) NOT NULL,
  `nav_menu_name` varchar(90) DEFAULT NULL,
  `nav_target_path` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_nav_menu`
--

INSERT INTO `page_nav_menu` (`id`, `nav_menu_name`, `nav_target_path`) VALUES
(1, 'Home', 'index.php'),
(2, 'About us', 'page_about.php'),
(3, 'Contact us', 'page_contact.php'),
(4, 'Blog posts', 'page_blog.php');

-- --------------------------------------------------------

--
-- Table structure for table `page_post`
--

CREATE TABLE `page_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(90) DEFAULT NULL,
  `post_subtitle` varchar(255) DEFAULT NULL,
  `post_body` varchar(4096) DEFAULT NULL,
  `post_image` varchar(126) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_post`
--

INSERT INTO `page_post` (`id`, `user_id`, `post_title`, `post_subtitle`, `post_body`, `post_image`, `reg_date`) VALUES
(4, 27, 'Mankind must explore, and this is exploration at its greatest', 'Problems look mighty small from 150 miles up', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><figure><blockquote class=\"blockquote\"><p class=\"mb-0\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></blockquote></figure><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><a href=\"#\"><img class=\"img-fluid\" src=\"assets/img/post_sample_image.jpg\"></a><span class=\"text-muted caption\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p><span>Placeholder text by&nbsp;</span><a href=\"http://spaceipsum.com\">Ipsum</a><span>&nbsp;Photographs by&nbsp;</span><a href=\"https://www.flickr.com/photos/nasacommons/\">Lorem</a>.</p>', 'post_bg_id_4.jpg', '2021-05-31 19:52:19'),
(5, 27, 'I believe every human has a finite number of heartbeats.', 'I don\'t intend to waste any of mine.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><figure><blockquote class=\"blockquote\"><p class=\"mb-0\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></blockquote></figure><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><a href=\"#\"><img class=\"img-fluid\" src=\"assets/img/post_sample_image.jpg\"></a><span class=\"text-muted caption\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p><span>Placeholder text by&nbsp;</span><a href=\"http://spaceipsum.com\">Ipsum</a><span>&nbsp;Photographs by&nbsp;</span><a href=\"https://www.flickr.com/photos/nasacommons/\">Lorem</a>.</p>', 'post_bg_id_5.jpg', '2021-05-31 19:52:19'),
(6, 27, 'Science has not yet mastered prophecy', 'We predict too much for the next year and yet far too little for the next ten.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><figure><blockquote class=\"blockquote\"><p class=\"mb-0\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></blockquote></figure><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><a href=\"#\"><img class=\"img-fluid\" src=\"assets/img/post_sample_image.jpg\"></a><span class=\"text-muted caption\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p><span>Placeholder text by&nbsp;</span><a href=\"http://spaceipsum.com\">Ipsum</a><span>&nbsp;Photographs by&nbsp;</span><a href=\"https://www.flickr.com/photos/nasacommons/\">Lorem</a>.</p>', 'post_bg_id_6.jpg', '2021-05-31 19:52:19'),
(7, 27, 'Failure is not an option', '\"Many say exploration is part of our destiny.\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><figure><blockquote class=\"blockquote\"><p class=\"mb-0\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></blockquote></figure><h2 class=\"section-heading\">Heading</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><a href=\"#\"><img class=\"img-fluid\" src=\"assets/img/post_sample_image.jpg\"></a><span class=\"text-muted caption\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p><span>Placeholder text by&nbsp;</span><a href=\"http://spaceipsum.com\">Ipsum</a><span>&nbsp;Photographs by&nbsp;</span><a href=\"https://www.flickr.com/photos/nasacommons/\">Lorem</a>.</p>', 'post_bg_id_7.jpg', '2021-06-01 16:16:50'),
(11, 32, 'title', 'subtitle', 'body', 'imagem', '2021-06-04 20:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `system_status`
--

CREATE TABLE `system_status` (
  `id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_level`
--

CREATE TABLE `user_access_level` (
  `id` int(11) NOT NULL,
  `user_name_id` int(11) NOT NULL,
  `access_level_id` int(11) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_level`
--

INSERT INTO `user_access_level` (`id`, `user_name_id`, `access_level_id`, `date_reg`) VALUES
(12, 27, 1, '2021-05-11 21:34:17'),
(14, 32, 1, '2021-06-02 23:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_name`
--

CREATE TABLE `user_name` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `data_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_name`
--

INSERT INTO `user_name` (`id`, `user_name`, `user_email`, `data_reg`, `estado`) VALUES
(27, 'Abc', 'abc@gmail.com', '2021-05-31 23:03:30', 1),
(32, 'pirocas', 'pirocas@gmail.com', '2021-06-02 23:59:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_password`
--

CREATE TABLE `user_password` (
  `id` int(11) NOT NULL,
  `user_name_id` int(11) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_password`
--

INSERT INTO `user_password` (`id`, `user_name_id`, `user_password`, `date_reg`) VALUES
(26, 27, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-06-02 20:11:33'),
(31, 32, '9b09f9c2c8bbee46ff62e7bf1e988ae5f00196d3', '2021-06-02 23:59:47'),
(32, 32, 'f438cae0d9248a1b9142b8073525e958253c9630', '2021-06-03 00:47:22'),
(33, 32, 'a86e566ca3ce75673d105a1fdc0c7bbd3a4a0106', '2021-06-03 00:50:00'),
(34, 32, 'a86e566ca3ce75673d105a1fdc0c7bbd3a4a0106', '2021-06-03 00:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_name_id` int(11) NOT NULL,
  `user_token` varchar(50) NOT NULL,
  `data_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `user_name_id`, `user_token`, `data_reg`) VALUES
(26, 32, 'Rj6GKEiF1b1U8GKFlb2T71eNHhWIQEr1Xf2K31Az', '2021-06-03 00:17:41'),
(29, 32, 'esA1uNwNAmrxle4eG9UWDWOAH7Z7rm78DlE1MxFH', '2021-06-03 01:17:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1_psw`
-- (See below for the actual view)
--
CREATE TABLE `v1_psw` (
`id` int(11)
,`user_name_id` int(11)
,`user_password` varchar(50)
,`date_reg` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1_user_token`
-- (See below for the actual view)
--
CREATE TABLE `v1_user_token` (
`Token ID` int(11)
,`User ID` int(11)
,`User Token` varchar(50)
,`User Name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v1_psw`
--
DROP TABLE IF EXISTS `v1_psw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1_psw`  AS SELECT `user_password`.`id` AS `id`, `user_password`.`user_name_id` AS `user_name_id`, `user_password`.`user_password` AS `user_password`, `user_password`.`date_reg` AS `date_reg` FROM `user_password` WHERE `user_password`.`id` in (select max(`user_password`.`id`) from `user_password` group by `user_password`.`user_name_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v1_user_token`
--
DROP TABLE IF EXISTS `v1_user_token`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1_user_token`  AS SELECT `user_token`.`id` AS `Token ID`, `user_name`.`id` AS `User ID`, `user_token`.`user_token` AS `User Token`, `user_name`.`user_name` AS `User Name` FROM (`user_token` join `user_name` on(`user_name`.`id` = `user_token`.`user_name_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ficheiro`
--
ALTER TABLE `ficheiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_contact`
--
ALTER TABLE `message_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_processing`
--
ALTER TABLE `message_processing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_brand`
--
ALTER TABLE `page_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_header`
--
ALTER TABLE `page_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `page_info`
--
ALTER TABLE `page_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_nav_menu`
--
ALTER TABLE `page_nav_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_post`
--
ALTER TABLE `page_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `system_status`
--
ALTER TABLE `system_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_access_level`
--
ALTER TABLE `user_access_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name_id` (`user_name_id`),
  ADD KEY `access_level_id` (`access_level_id`);

--
-- Indexes for table `user_name`
--
ALTER TABLE `user_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_password`
--
ALTER TABLE `user_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name_id` (`user_name_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name_id` (`user_name_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ficheiro`
--
ALTER TABLE `ficheiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `message_contact`
--
ALTER TABLE `message_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `message_processing`
--
ALTER TABLE `message_processing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_brand`
--
ALTER TABLE `page_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_header`
--
ALTER TABLE `page_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_info`
--
ALTER TABLE `page_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_nav_menu`
--
ALTER TABLE `page_nav_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_post`
--
ALTER TABLE `page_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_status`
--
ALTER TABLE `system_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_level`
--
ALTER TABLE `user_access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_name`
--
ALTER TABLE `user_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_password`
--
ALTER TABLE `user_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `page_header`
--
ALTER TABLE `page_header`
  ADD CONSTRAINT `page_header_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_post`
--
ALTER TABLE `page_post`
  ADD CONSTRAINT `page_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_status`
--
ALTER TABLE `system_status`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_level`
--
ALTER TABLE `user_access_level`
  ADD CONSTRAINT `user_access_level_ibfk_1` FOREIGN KEY (`user_name_id`) REFERENCES `user_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_level_ibfk_2` FOREIGN KEY (`access_level_id`) REFERENCES `access_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_password`
--
ALTER TABLE `user_password`
  ADD CONSTRAINT `user_password_ibfk_1` FOREIGN KEY (`user_name_id`) REFERENCES `user_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`user_name_id`) REFERENCES `user_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
