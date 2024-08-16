-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2024 at 07:13 PM
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
-- Database: `ucattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `mobile`) VALUES
(1, 'athira', '$2y$10$DJsPcNS8Pf9oiQZ7uIRRm.4SgBqrjYJ1sFvRyR9VZsnYcCive0j7O', '', ''),
(2, 'admin', '$2y$10$ns8f2Kz6r57Xfu4ZAEfdcO902oXk8wcuHiLg0iKP5L4BflOWVDgfe', '', ''),
(3, 'athi', '$2y$10$b4BIXJW2PAbPRUI39o49Ae8gTYM6/f5rujkK76UJb275sRpyRUyIm', '', ''),
(5, 'arun', '$2y$10$M50cvhFRn3SmECBftVdzXO6/g3vh0RYIwjeAMTFHf1bhbp3fiiq8u', '', ''),
(7, 'ancy', '$2y$10$k39nmx7Q/oRli2qLer8l8OxEoGvruPWujv1gfnoIO55BoOLTbiuEW', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student` varchar(10) NOT NULL,
  `subject` int(11) NOT NULL,
  `date` date NOT NULL,
  `absent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student`, `subject`, `date`, `absent`) VALUES
(1307, '7', 4, '2023-12-17', 0),
(1308, '8', 4, '2023-12-17', 0),
(1309, '7', 5, '2023-12-17', 1),
(1310, '8', 5, '2023-12-17', 0),
(1311, '8', 5, '2023-12-18', 1),
(1312, '10', 5, '2023-12-18', 0),
(1313, '8', 4, '2023-12-20', 1),
(1314, '10', 4, '2023-12-20', 0),
(1315, '8', 4, '2023-12-19', 0),
(1316, '10', 4, '2023-12-19', 0),
(1317, '8', 4, '2023-12-21', 1),
(1318, '10', 4, '2023-12-21', 0),
(1319, '9', 4, '2023-12-18', 0),
(1320, '11', 4, '2023-12-18', 0),
(1321, '8', 5, '2023-12-19', 0),
(1322, '10', 5, '2023-12-19', 0),
(1323, '12', 5, '2023-12-19', 0),
(1324, '8', 6, '2023-12-19', 0),
(1325, '10', 6, '2023-12-19', 0),
(1326, '12', 6, '2023-12-19', 0),
(1327, '8', 4, '2023-12-28', 0),
(1328, '10', 4, '2023-12-28', 0),
(1329, '12', 4, '2023-12-28', 0),
(1330, '15', 4, '2023-12-28', 0),
(1331, '8', 6, '2023-12-28', 0),
(1332, '10', 6, '2023-12-28', 0),
(1333, '12', 6, '2023-12-28', 0),
(1334, '15', 6, '2023-12-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(7, '1 MCA A'),
(8, '2 MCA B'),
(9, '2 MCA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `yearOfAdmission` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `class`, `roll`, `email`, `phone`, `yearOfAdmission`) VALUES
(8, 'Anjana pj', 7, 11, 'anjanapj343@gmail.com', '9445632178', '2022-10-13'),
(9, 'Arun p', 8, 10, 'arun@gmail.com', '9567043511', '2022-10-17'),
(10, 'Athira', 7, 16, 'abh@gmail.com', '7012179796', '2023-12-12'),
(11, 'Akshaya', 8, 1, 'akshay@gmail.com,', '8547961231', '2023-12-13'),
(12, 'Avril', 7, 17, 'avrilscorreya@gmail.com', '7894586321', '2023-12-19'),
(13, 'Anagha B R', 8, 17, 'anaghabrnair@gmail.com', '7785496325', '2023-12-20'),
(14, 'Aswani T p', 8, 18, 'aswanitp123@gmail.com', '7896548214', '2023-12-18'),
(15, 'Mariya Heizal Paul', 7, 32, 'heizalpaul7@gmail.com', '+917012179', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `class` int(11) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `code`, `sem`, `class`, `teacher`) VALUES
(4, 'S.E', 'CT104', '1', 7, 5),
(5, 'Mathematical & Statistical foundation for Computer Applications', 'CT101', '1', 7, 6),
(6, 'CLoud', 'CT202', '2', 8, 7),
(7, 'Tcp Ip', 'CT204', '2', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `password`, `email`) VALUES
(5, 'Ms.Lee  Juliet.', '$2y$10$Bf/hrqQbHwRiwZ7VmkDByO5Nco/4O502GG6BVyNBH.1g6LQwkOQ1G', 'leejuliet@gmail.com'),
(6, 'Ms.Thanu Sudheesh.', '$2y$10$/NA5bl97iSR18jw8WofS4OGlZfRLVYLr/ITPCsjiuv9dCIXNW9OZG', 'thanu@gmail.com'),
(7, 'Ms.Surabhi', '$2y$10$dMpESM5DB11JxAzhKi.wUudYCSQY2Kvw2lYpQoHcd.LMqQu3d.JwG', 'surabhi@gmail.com'),
(8, 'Ms.Ancy K Paul', '$2y$10$z8Vf2FgTB8G82OoMagjlaODtCI32ifZGUH.qsR8IVQ.3ntinAxEUa', 'ancy@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1335;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
