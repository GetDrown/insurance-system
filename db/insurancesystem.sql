-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 12:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurancesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_name` varchar(90) NOT NULL,
  `first_name` varchar(90) NOT NULL,
  `middle_ini` varchar(4) NOT NULL,
  `name_ext` varchar(4) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `user_id`, `last_name`, `first_name`, `middle_ini`, `name_ext`, `phone_num`, `email_add`, `customer_address`) VALUES
(1, 2, 'Pacatang', 'Kyle', 'M', 'N/A', '123123123', 'email@email.com', 'test'),
(2, 3, 'Isidoro', 'Elnes Jan', '', '', '123123123', 'email@email.com', 'test'),
(3, 4, 'Duragos', 'Jenny Rose', '', '', '21312312312', 'email@email.com', 'test'),
(4, 5, 'Aldemita', 'Albert', 'C.', 'N/A', '1231231231', 'email@email.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `life_policy`
--

CREATE TABLE `life_policy` (
  `life_id` int(11) NOT NULL,
  `life_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `life_policy`
--

INSERT INTO `life_policy` (`life_id`, `life_desc`) VALUES
(1, 'Personal Accident');

-- --------------------------------------------------------

--
-- Table structure for table `non_life_policy`
--

CREATE TABLE `non_life_policy` (
  `non_life_id` int(11) NOT NULL,
  `non_life_name` varchar(255) NOT NULL,
  `non_life_qty` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_life_policy`
--

INSERT INTO `non_life_policy` (`non_life_id`, `non_life_name`, `non_life_qty`) VALUES
(1, 'Motorcycle Policy', 0),
(2, 'Private Car Policy', 0),
(3, 'Commercial Vehicle Policy', 0),
(4, 'Land Transportation Operators Policy', 0),
(5, 'Own Damage', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`) VALUES
(1, 'owner', '123', 1),
(2, 'customer1', '123', 3),
(3, 'customer2', '123', 3),
(4, 'customer3', '123', 3),
(5, 'customer4', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Owner'),
(2, 'Staff'),
(3, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_log` (`user_id`);

--
-- Indexes for table `life_policy`
--
ALTER TABLE `life_policy`
  ADD PRIMARY KEY (`life_id`);

--
-- Indexes for table `non_life_policy`
--
ALTER TABLE `non_life_policy`
  ADD PRIMARY KEY (`non_life_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `testuser` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `life_policy`
--
ALTER TABLE `life_policy`
  MODIFY `life_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `non_life_policy`
--
ALTER TABLE `non_life_policy`
  MODIFY `non_life_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customer_log` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `testuser` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
