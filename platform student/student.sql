-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 03:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensatloginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `iduser` int(11) NOT NULL,
  `studentname` tinytext NOT NULL,
  `studentLastname` tinytext NOT NULL,
  `studenCNE` tinytext NOT NULL,
  `studenEmail` tinytext NOT NULL,
  `studentPWD` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`iduser`, `studentname`, `studentLastname`, `studenCNE`, `studenEmail`, `studentPWD`) VALUES
(1, 'eleve', 'alpha', 'QSD12Z', 'elevealpha@gmail.com', '$2y$10$jO2SiqhXaCiAf9uRb7AxvOIpsIfdSpU4STAI7rYqTZ.IMFrWjXjGa'),
(2, 'hassan', 'masoudi', 'SZJ12ER', 'elevebeta@gmail.com', '$2y$10$ISN1Xh.HASO08XDndQC2ueqWr1ON9RLTVLctQO77YREZQFICn5cdC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
