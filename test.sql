-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 11:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `Id` int(11) NOT NULL,
  `Picture` varchar(30) DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `Mobile` int(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Role` varchar(11) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`Id`, `Picture`, `Name`, `Mobile`, `Email`, `Password`, `Date`, `Role`) VALUES
(4, '621cca03dee9c5.06106343.jpg', 'jas51', 8880, '1@1.1', '1', '2022-04-16 21:42:24', 'admin'),
(6, '621cc3908fcf35.88054951.jpg', 'Rodes', 777777, 'Rodes@gmail.com', '2', '2022-04-16 21:42:45', 'user'),
(9, '621cc3c7cf3a69.86871364.jpg', 'Emma', 777777, 'emma@gmail.com', '0000', '2022-04-16 21:43:08', 'user'),
(12, '621ccfca1d70e4.73234870.jpg', 'Linus', 444444, 'Linus@outlook.com', '44444', '2022-03-09 15:42:07', 'admin'),
(22, '625b31029b0267.79356708.png', 'w@w.w', 22, 'w@w.w', 'w', '2022-04-16 21:43:01', 'user'),
(30, '6221c8005d2117.88663648.jpg', 'yohana', 1234, 'yohana@yahoo.com', '12345', '2022-04-16 21:42:54', 'user'),
(38, '625b1309191ef3.25152283.jpg', '8', 8, '8@8.8', '8', '2022-04-16 19:03:37', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
