-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 07:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_admin_user`
--

CREATE TABLE `ad_admin_user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_admin_user`
--

INSERT INTO `ad_admin_user` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'anvisDigital', 'admin@anvisdigital.com', '7892de582af5e3a01ab12edf30452252', 1),
(2, 'kvilpura', 'kavilpura@protonmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 1),
(3, 'GautamTeli', 'GautamV121@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 1),
(4, 'Pooja Teli', 'poojavilpura789@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 1),
(5, 'chotu', 'chotu@new.com', '9072bd19074a30c386a95e260b12a45f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_guest_list`
--

CREATE TABLE `ad_guest_list` (
  `guestId` int(10) NOT NULL,
  `guestName` varchar(100) NOT NULL,
  `guestEmail` varchar(100) NOT NULL,
  `guestContact` varchar(20) NOT NULL,
  `noOfAdults` int(10) NOT NULL,
  `noOfChildren` int(10) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `roomCategory` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_guest_list`
--

INSERT INTO `ad_guest_list` (`guestId`, `guestName`, `guestEmail`, `guestContact`, `noOfAdults`, `noOfChildren`, `checkIn`, `checkOut`, `roomCategory`, `status`) VALUES
(1, 'Kamlesh Teli', 'sahukamlesh625@gmail.com', '9423655626', 2, 1, '2021-12-01', '2021-12-02', 'Double', 1),
(2, 'Pooja', 'Pooja@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(3, 'gautam', 'gautam@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(4, 'Nilesh', 'nilesh@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(5, 'Nilesh', 'nilesh@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(6, 'Nilesh', 'nilesh@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(7, 'Nilesh', 'nilesh@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(8, 'Nilesh', 'nilesh@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(9, 'Nilesh', 'nilesh@gmail.com', '8479256385', 1, 0, '2021-12-10', '2021-12-16', 'Single', 1),
(10, 'Pratik', 'Pratik@gmail.com', '7845125478', 1, 0, '2021-12-31', '2022-01-01', 'Studio', 1),
(11, 'Pratik', 'Pratik@gmail.com', '7845125478', 1, 0, '2021-12-31', '2022-01-01', 'Studio', 1),
(12, 'tushar', 'tushar@gmail.com', '1245784512', 1, 0, '2021-12-02', '2021-12-14', 'Single', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_admin_user`
--
ALTER TABLE `ad_admin_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `ad_guest_list`
--
ALTER TABLE `ad_guest_list`
  ADD PRIMARY KEY (`guestId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_admin_user`
--
ALTER TABLE `ad_admin_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ad_guest_list`
--
ALTER TABLE `ad_guest_list`
  MODIFY `guestId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
