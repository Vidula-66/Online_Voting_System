-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2026 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `voterid` varchar(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `address`, `password`, `voterid`, `photo`, `role`, `status`, `votes`) VALUES
(1, 'Admin', '9999999999', 'Admin Office', 'admin123', 'ADMIN12345', '', 0, 0, 0),
(6, 'Bharatiya Janata Party (BJP)', '9000000001', 'Delhi', 'bjp123', 'BJP1234567', 'bjp.jpg', 2, 0, 0),
(7, 'Indian National Congress', '9000000002', 'Delhi', 'inc123', 'INC1234567', 'congress.jpg', 2, 0, 0),
(8, 'Aam Aadmi Party', '9000000003', 'Delhi', 'aap123', 'AAP1234567', 'aap.jpg', 2, 0, 0),
(9, 'Shiv Sena', '9000000004', 'Mumbai', 'shiv123', 'SHV1234567', 'shivsena.jpg', 2, 0, 0),
(10, 'Nationalist Congress Party', '9000000005', 'Mumbai', 'ncp123', 'NCP1234567', 'ncp.jpg', 2, 0, 0),
(11, 'Rahul Sharma', '9876500001', 'Nashik', 'rahul123', 'VTR1234561', 'rahul.jpg', 1, 0, 0),
(12, 'Priya Patil', '9876500002', 'Pune', 'priya123', 'VTR1234562', 'priya.jpg', 1, 0, 0),
(13, 'Amit Verma', '9876500003', 'Mumbai', 'amit123', 'VTR1234563', 'amit.jpg', 1, 0, 0),
(14, 'Sneha Kulkarni', '9876500004', 'Nagpur', 'sneha123', 'VTR1234564', 'sneha.jpg', 1, 0, 0),
(15, 'Rohit Joshi', '9876500005', 'Aurangabad', 'rohit123', 'VTR1234565', 'rohit.jpg', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voterid` (`voterid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
