-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2024 at 06:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `response_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `designation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(100) NOT NULL,
  `desp` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `designation`, `name`, `desp`, `image`) VALUES
(1, 'Professional Web Development', 'MD TOMAS UDDIN', 'Hello I am  MD TOMAS UDDIN ,I am interested learn to professional web development . PHP (Hypertext Preprocessor) and Laravel framework studying . Recently i have completed diploma in computer science and technology .  ', '66c0b236206b3.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `desgination` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `desgination`, `image`, `feedback`) VALUES
(1, 'MD TOMAS UDDIN', 'WEB DEVELOPER', '66c38a7c4fcd9png', 'i am interested learning html,css,php ,laravel framework.'),
(2, 'MD PARVAZ ROHMAN', 'Networking Engineering', '66c38c3e18d1apng', 'Ea rerum error deser'),
(3, 'Rifat ', 'Web developer', '66c38cad21359png', 'php ,laravel framework '),
(4, 'Leila Fulton', 'Tempore et repudian', '66d4a6226b509jpg', 'Sunt qui do libero a');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int NOT NULL,
  `header_logo` varchar(100) NOT NULL,
  `footer_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `header_logo`, `footer_logo`) VALUES
(1, '66c049579c35d.png', '66d4a350f2751.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`) VALUES
(1, 'Kennan Mcdaniel', 'fapu@mailinator.com', 'Cum aut et velit no', 'Nihil consectetur i', 1),
(2, 'Chadwick May', 'xyqajira@mailinator.com', 'Quam est in irure un', 'Repellendus Neque n', 1),
(5, 'Clayton Riggs', 'fyfykide@mailinator.com', 'In cumque nisi sint ', 'Architecto officia m', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `image`, `status`) VALUES
(1, 'Professional Web Development', 'PHP,(hypertext prepocessor )LARAVEL', '66c31445e8a35.png', 1),
(2, 'WED DESIGN', 'HTML,CSS,Bootstrap-5 ,JAVASCRIPT,REACT JS', '66c3147bb10cb.png', 1),
(3, 'Programing', 'data science', '66c315a22f864.png', 0),
(4, 'Video editing', '3D Animation', '66c315f76aa4f.png', 0),
(7, 'digital marketing ', 'SEO', 'Array', 0),
(8, 'php', 'language', 'Array', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` varchar(250) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `desp`, `status`) VALUES
(1, 'Professional Web Development', 'It can change the way we feel about a company and the products & services they offer.', 0),
(2, 'Professional Web Development', 'It can change the way we feel about a company and the products & services they offer.', 0),
(3, 'web design', 'It can change the way we feel about a company and the products & services they offer.\r\n', 0),
(4, 'Professional Web Development', 'It can change the way we feel about a company and the products & services they offer.', 1),
(6, 'Professional Web Development', 'It can change the way we feel about a company and the products & services they offer.', 0),
(7, 'Professional web development', 'i ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `percentage` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `percentage`, `status`) VALUES
(1, 'HTML', 90, 1),
(2, 'CSS', 80, 1),
(3, 'Javascript', 50, 1),
(4, 'Bootstrap', 99, 1),
(5, 'Tailwind Css', 20, 0),
(6, 'PHP ', 95, 1),
(7, 'Laravel ', 70, 1),
(8, 'java', 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(130) NOT NULL,
  `country` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `gender`, `photo`, `role`) VALUES
(1, 'MD TOMAS UDDIN', 'mdtomasuddin1@gmail.com', '$2y$10$1fu4B26JfIPBVgMfikbboe1WErUHv3VpKrta5dwJiJbXM.n0yK1LW', 'BAN', 'male', '66bd618a5cfa9.jpg', 1),
(3, 'MD TOMAS UDDIN', 'tomas@gmail.com', '$2y$10$t/2qZWT61ahvOq5zGMTOd.XdB/E0t441Al7hvbkN6DAKI0EPME0S.', 'AUS', 'female', '66bb8be78903b.jpg', 2),
(4, 'tomas uddin', 'mdtomasuddin@gmail.com', '$2y$10$5ofGX6bElhpqraORThVW9O/o/qC0IFi09AtBpC7fuWK3fyZFwjYka', 'BAN', 'male', NULL, NULL),
(5, 'tomas uddin', 'mdtomasuddin@gmail.com', '$2y$10$ok7NWPU.Pr4DLFKcHRIkJO8CsKwSXqBPHTxD0jbZuM.fSEzNQ/lAS', 'BAN', 'male', NULL, NULL),
(6, 'Priscilla Wagner', 'feriwazyd@mailinator.com', '$2y$10$lOPoSWQ7cXh94VNh6/ELsOwFCHltNbI71VrErOhFJxIVUxHSktmeC', 'AUS', 'male', NULL, 3),
(7, 'Maia Lowery', 'zorize@mailinator.com', '$2y$10$EYbuDz5Gy/sqxVoS7io1Vus8Osvv.fS7zaPAMkSAD65Oa6IbTNnne', 'AUS', 'female', '66bcb7ab53683.jpg', 4),
(9, 'haxotoduxu@mailinator.com', 'toxiwitaj@mailinator.com', '$2y$10$sllWecdLxBPqUfZBUNKF9ejKrGO/Gt7/DAoi5CluRCdLOeBYwntdS', 'BAN', 'female', NULL, NULL),
(10, 'nokupila@mailinator.com', 'visamyfuw@mailinator.com', '$2y$10$/U3EYjqT0Lxgs3wwi6Xgd.KxIHMNNgG51Ni5Je6mdZgGt4/QIcyFq', 'USA', 'male', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
