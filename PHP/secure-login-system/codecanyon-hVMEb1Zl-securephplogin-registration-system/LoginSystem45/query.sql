-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 07:00 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `admin_configured` tinyint(1) NOT NULL DEFAULT '0',
  `admin_logotxt` varchar(50) NOT NULL,
  `admin_email_from` varchar(100) NOT NULL,
  `admin_userid` varchar(50) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_site_url` varchar(300) NOT NULL,
  `admin_twitter_enable` tinyint(1) NOT NULL,
  `admin_twitter_consumer_key` varchar(100) NOT NULL,
  `admin_twitter_consumer_secret` varchar(100) NOT NULL,
  `admin_google_enable` tinyint(1) NOT NULL,
  `admin_google_client_id` varchar(100) NOT NULL,
  `admin_google_email` varchar(200) NOT NULL,
  `admin_google_clientsecret` varchar(200) NOT NULL,
  `admin_google_apikeys` varchar(200) NOT NULL,
  `admin_facebook_enable` tinyint(1) NOT NULL,
  `admin_facebook_appid` varchar(100) NOT NULL,
  `admin_facebook_secret` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activ_status` tinyint(1) DEFAULT '0',
  `activ_key` varchar(1000) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `role_id` int(11) NOT NULL,
  `role_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`role_id`, `role_description`) VALUES
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_social`
--

CREATE TABLE `users_social` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_role` (`role`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users_social`
--
ALTER TABLE `users_social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_social` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_social`
--
ALTER TABLE `users_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role`) REFERENCES `users_role` (`role_id`);

--
-- Constraints for table `users_social`
--
ALTER TABLE `users_social`
  ADD CONSTRAINT `fk_role_social` FOREIGN KEY (`role`) REFERENCES `users_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
