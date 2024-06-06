-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

-- --------------------------------------------------------

--
-- Table structure for table `life_policy`
--

CREATE TABLE `life_policy` (
  `life_id` int(11) NOT NULL,
  `life_desc` varchar(50) NOT NULL,
  `life_policy_type` varchar(25) NOT NULL,
  `life_qty` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `life_policy`
--

INSERT INTO `life_policy` (`life_id`, `life_desc`, `life_policy_type`, `life_qty`) VALUES
(1, 'Personal Accident', 'Life Policy', 10);

-- --------------------------------------------------------

--
-- Table structure for table `non_life_policy`
--

CREATE TABLE `non_life_policy` (
  `non_life_id` int(11) NOT NULL,
  `non_life_name` varchar(255) NOT NULL,
  `policy_type` varchar(25) NOT NULL,
  `non_life_qty` mediumint(9) NOT NULL,
  `non_life_premium` float NOT NULL,
  `non_life_docstamp` float NOT NULL,
  `non_life_govtax` float NOT NULL,
  `non_life_others` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_life_policy`
--

INSERT INTO `non_life_policy` (`non_life_id`, `non_life_name`, `policy_type`, `non_life_qty`, `non_life_premium`, `non_life_docstamp`, `non_life_govtax`, `non_life_others`) VALUES
(1, 'Motorcycle Policy', 'Non-Life', 10, 250, 156, 130, 64),
(2, 'Private Car Policy', 'Non-Life', 10, 560, 325, 290, 75),
(3, 'Commercial Vehicle Policy', 'Non-Life', 10, 1200, 471, 320, 159),
(4, 'Land Transportation Operators Policy', 'Non-Life', 10, 250, 182, 150, 118),
(5, 'Own Damage', 'Non-Life', 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `non_life_id` int(11) NOT NULL,
  `name_and_address` varchar(255) NOT NULL,
  `date_of_issuance` date NOT NULL,
  `from_issuance` date NOT NULL,
  `to_issuance` date NOT NULL,
  `vehicle_model` varchar(10) NOT NULL,
  `vehicle_plate` varchar(25) NOT NULL,
  `vehicle_make` varchar(50) NOT NULL,
  `vehicle_serialchassis` varchar(255) NOT NULL,
  `vehicle_typeofbody` varchar(50) NOT NULL,
  `vehicle_motornum` varchar(90) NOT NULL,
  `vehicle_color` varchar(90) NOT NULL,
  `vehicle_bltnum` varchar(90) NOT NULL,
  `vehicle_paid` mediumint(9) NOT NULL,
  `form_endorsement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`, `name`) VALUES
(1, 'owner', 'test', 1, 'Frans Lloyd');

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_constTransact` (`customer_id`),
  ADD KEY `transacPolicy` (`non_life_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `customer_constTransact` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transacPolicy` FOREIGN KEY (`non_life_id`) REFERENCES `non_life_policy` (`non_life_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `testuser` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
