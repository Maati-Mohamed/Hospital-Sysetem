-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2021 at 04:29 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `pations`
--

CREATE TABLE `pations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pations`
--

INSERT INTO `pations` (`id`, `name`, `email`, `date`) VALUES
(2, 'Maati Mohamed', 'mohamedhost20@gmail.com', '2021-07-02'),
(3, 'ali ali', 'maati4455@gmail.com', '2021-06-19'),
(5, 'موسى', 'mohamed@gmail.com', '2021-06-16'),
(8, 'معاطي محمد عمر', 'dddddddddddddd@gmail.com', '2021-06-25'),
(9, 'فيصل عبدالرحيم', 'dddddddddddddd@gmail.com', '2021-06-26'),
(10, 'محمد حامد حمودة', 'hamodaDev@yahoo.com', '2021-06-19'),
(11, 'معاطي محمد', '0924236035', '2021-06-15'),
(12, 'عبدالرحيم سلامة', '0912300000', '2021-06-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pations`
--
ALTER TABLE `pations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pations`
--
ALTER TABLE `pations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
