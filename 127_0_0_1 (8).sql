-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 07:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pw2`
--
CREATE DATABASE IF NOT EXISTS `db_pw2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_pw2`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(4) NOT NULL,
  `date` varchar(30) NOT NULL,
  `entry` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `date`, `entry`) VALUES
(1, '10/09/2019', 'hai'),
(2, '10/09/2019', 'hai'),
(3, '10/09/2019', 'hai'),
(4, '10/09/2019', 'hai'),
(5, '10/09/2019', 'hai');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(6) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `firstname`, `lastname`) VALUES
(1, '0906001', 'titi', 'hartati'),
(2, '0906002', 'ali', 'iman'),
(3, '0906003', 'usman', 'karim'),
(4, '0906004', 'susi', 'susanti');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `nama_mk` varchar(250) NOT NULL,
  `nilai_mk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama_mk`, `nilai_mk`) VALUES
(25, 'alpro', 0),
(26, 'pemweb', 0),
(27, 'struktur data', 0),
(28, 'diskrit', 0),
(29, 'basis data', 0),
(30, 'PTI', 0),
(31, 'orkom', 0),
(32, 'komdat', 0),
(33, 'SI', 0),
(34, 'matvek', 0),
(35, 'fisika', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ipk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `ipk`) VALUES
('00112233', 'putri', 3),
('09021381823106', 'Yohana Margaretha', 0),
('09021381823118', 'anjelina', 0),
('09021381823127', 'Nurul Izzah', 0),
('09021381823145', 'Nabila Isyraq', 0),
('090909', 'mei', 3),
('1111', 'bagus', 0),
('123456789', 'feron', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `no` int(3) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_matakuliah` varchar(30) NOT NULL,
  `nilai_mk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`no`, `nim`, `id_matakuliah`, `nilai_mk`) VALUES
(2490, '00112233', '1', 80),
(2491, '00112233', '2', 80),
(2492, '00112233', '3', 80),
(2493, '00112233', '4', 80),
(2494, '00112233', '5', 80),
(2495, '00112233', '6', 80),
(2496, '00112233', '7', 80),
(2497, '00112233', '8', 80),
(2512, '09021381823127', '25', 0),
(2513, '09021381823127', '26', 0),
(2514, '09021381823127', '27', 0),
(2515, '09021381823127', '28', 0),
(2516, '09021381823127', '29', 0),
(2517, '09021381823127', '30', 0),
(2518, '09021381823127', '31', 0),
(2519, '09021381823127', '32', 0),
(2520, '09021381823127', '33', 0),
(2521, '09021381823127', '34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`nim`, `nama`, `password`, `status`) VALUES
('00112233', 'putri', '123', 1),
('009988', 'Nurul', '098', 1),
('0902138123456', 'farshab salsabil', '0987654', 1),
('09021381823106', 'Yohana Margaretha', '1234567', 1),
('09021381823118', 'anjelina', '9988', 1),
('09021381823127', 'Nurul Izzah', '313131', 1),
('09021381823145', 'Nabila Isyraq', '123456', 1),
('090909', 'mei', '0000', 1),
('1111', 'bagus', '0000', 1),
('112233', 'bagus', '123', 1),
('123456', 'cobacoba', '123456', 1),
('123456789', 'feron', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2523;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
