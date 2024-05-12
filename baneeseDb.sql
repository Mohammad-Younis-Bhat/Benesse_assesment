-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2024 at 05:37 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baneeseDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `Question_Id` int NOT NULL,
  `Question_Text` text,
  `Option_A` varchar(255) DEFAULT NULL,
  `Option_B` varchar(255) DEFAULT NULL,
  `Option_C` varchar(255) DEFAULT NULL,
  `Option_D` varchar(255) DEFAULT NULL,
  `Correct_Option` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`Question_Id`, `Question_Text`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Correct_Option`) VALUES
(1, 'What is the meaning of HTML?', 'Hyper Markup Language', 'Hyper Text Markup Language', ' HyperText Markup Language', 'None of the above', 'B'),
(2, 'What is the extension for the stylesheets external file?', '.html', '.jsx', '.css', '.xml', 'C'),
(3, 'Who created Linux?', 'Linus Torvalds', 'Scott HanselMan', 'Wes Bos', 'Nelson BradHog', 'A'),
(4, 'All variables in PHP start with which symbol?', '%', '&', '$', 'Var', 'C'),
(5, 'How do you get information from a form that is submitted using the \"get\" method?', '$_GET[]', 'Request.Form', '$_REQUEST[\'Form\']', 'REQUEST.QueryString', 'A'),
(6, 'What is the correct command to create a new React project?', 'npx create-react-app appname', 'npm install create-react-app', 'npx install create-react-app -g', '\r\ninstall - l create-react-app', 'A'),
(7, 'Which of the following is a way to handle data in React.js ?', 'Components and Class', 'Services & Components', 'State & Services', 'Props and States', 'D'),
(8, 'Which of the following function is true about changing the state in React.js ?', 'this.State{}', 'this.setState\r\n', 'this.setChangeState', 'All OF The Above', 'B'),
(9, 'Which of the following commands should be used to create a database named \"student\" ?', 'DATABASE Student', 'Create Students|?', 'CREATE  Database Students', 'Struct DB Name = \"students\"', 'C'),
(10, 'MySQL is a? Choose the Most Correct one.', 'RDBMS', 'DATA Consistency Technique ', 'Data Manipulation method', 'File Storage', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Test User', 'admin@gmail.com', '7006252723', '$2y$10$bGmUD/pv5wFFxS5yUI8/zuwGNmuwpQ3lo3dd5Lc9DIMJdMVJjj.ha', '2024-05-07 19:56:16'),
(2, 'Aalim Khan', 'hdhshsdj', '9906889967', '$2y$10$0i4jP4m3jco1l.XGhuCAU.8oi7W7bpwyOTLIasC7YuJ4cgMkOzvfS', '2024-05-12 17:06:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`Question_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD UNIQUE KEY `phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `Question_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
