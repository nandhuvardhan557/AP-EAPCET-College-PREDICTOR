-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 01:47 AM
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
-- Database: `ap_eapcet_predictor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `opening_rank` int(11) NOT NULL,
  `closing_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `branch_name`, `opening_rank`, `closing_rank`) VALUES
(1, 'KITS', 'cse', 40000, 80000),
(24, 'V S M engineering college (A)', 'cse', 71343, 166876),
(25, 'V S M engineering college (A)', 'ece', 120479, 172218),
(28, 'JNTUK college of engineering ', 'cse', 100, 1000),
(30, 'Aditya Engineering college(A)', 'ece', 5000, 15000),
(31, 'Aditya Engineering college(A)', 'civil', 20000, 50000),
(32, 'Aditya Engineering college(A)', 'mech', 50000, 90000),
(33, 'Pragati engineering college (A)', 'cse', 900, 5000),
(34, 'B V Chalamaiah engineering college (A)', 'Aim', 77219, 90531),
(35, 'B V Chalamaiah engineering college (A)', 'Cad', 53821, 170777),
(36, 'B V Chalamaiah engineering college (A)', 'Civl', 146025, 165743),
(37, 'B V Chalamaiah engineering college (A)', 'Cse', 43289, 39208),
(38, 'B V Chalamaiah engineering college (A)', 'csm', 60156, 170611),
(39, 'B V Chalamaiah engineering college (A)', 'csd', 65160, 15370),
(40, 'Chaitanya inst.of sci.and technology engineering college (A)', 'mec', 142904, 142094),
(41, 'Chaitanya inst.of sci.and technology engineering college (A)', 'ece', 144690, 168313),
(42, 'Giet engineering college (A)', 'cse', 34562, 100215),
(43, 'Giet engineering college (A)', 'ece', 57496, 71382),
(44, 'Giet engineering college (A)', 'Inf', 58474, 141240),
(45, 'Ideal Institute engineering college (A)', 'cse', 61034, 164183),
(46, 'Ideal Institute engineering college (A)', 'csm', 74389, 100900),
(47, 'Ideal Institute engineering college (A)', 'ece', 74289, 170854),
(48, 'Ideal Institute engineering college (A)', 'mec', 151937, 151937),
(49, 'V S M engineering college (A)', 'cse', 71343, 166876),
(50, 'V S M engineering college (A)', 'ece', 120479, 172218);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
