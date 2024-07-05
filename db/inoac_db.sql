-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 10:15 AM
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
-- Database: `inoac_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`userid`, `username`, `fullname`, `email`, `userpassword`) VALUES
(4, 'den01', 'Dennis Astejada', 'dennis.astejada@inoac.com.ph', '$2y$10$PPGQ4whx3SZ.Md355.A/v.fTDRaqQ2mJFre6B/d/c1zaxER1GhzDa');

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `computer_id` varchar(255) NOT NULL,
  `os_version` varchar(255) DEFAULT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `date_aquired` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`computer_id`, `os_version`, `processor`, `date_aquired`, `ip_address`) VALUES
('ENGG-001', 'Windows 10 Pro', 'Intel Core i5', '2017-05-16', '10.0.11.114'),
('MIS-001', 'Window 7 Pro', 'Intel Core i3', '2015-03-13', '10.0.11.65');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `laptop_id` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `os_version_l` varchar(255) DEFAULT NULL,
  `processor_l` varchar(255) DEFAULT NULL,
  `date_aquired_l` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`laptop_id`, `model`, `os_version_l`, `processor_l`, `date_aquired_l`) VALUES
('LT-001', 'Dell', 'Windows 11 Pro', 'Intel Core i5', '2024-06-12'),
('LT-002', 'Lenove', 'Windows 7 Pro', 'Intel Core i3', '2024-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `computer_id` varchar(255) DEFAULT NULL,
  `laptop_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `department`, `computer_id`, `laptop_id`) VALUES
(1001, 'Dennis', 'Astejada', 'Male', 'MIS', 'MIS-001', 'LT-001'),
(1002, 'Ashley', 'Buenafe', 'Male', 'Product Development', 'ENGG-001', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`computer_id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`laptop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_computer_id` (`computer_id`),
  ADD KEY `fk_laptop_id` (`laptop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_computer_id` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`computer_id`),
  ADD CONSTRAINT `fk_laptop_id` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`laptop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
