-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 03:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`id`, `categoryName`, `entryDate`) VALUES
(1, 'Packers & movers', '2019-03-12 13:58:07'),
(2, 'Carpentry', '2019-03-12 13:58:10'),
(3, 'House Keeping', '2019-03-12 13:58:13'),
(4, 'Mechanics', '2019-03-12 13:58:15'),
(5, 'Electricians', '2019-03-12 13:58:18'),
(6, 'Paint Service', '2019-03-12 13:58:21'),
(7, 'Pest Control', '2019-03-12 13:58:24'),
(8, 'Plumbing', '2019-03-12 13:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `listingmaster`
--

CREATE TABLE `listingmaster` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `listingName` varchar(255) NOT NULL,
  `ownerName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `websiteLink` varchar(255) NOT NULL,
  `description` varchar(600) NOT NULL,
  `ammenities` varchar(255) NOT NULL,
  `workingTime` varchar(255) NOT NULL,
  `photoName` varchar(500) NOT NULL DEFAULT 'service.jpg',
  `rates` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL DEFAULT 'NA',
  `registered` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listingmaster`
--

INSERT INTO `listingmaster` (`id`, `userID`, `listingName`, `ownerName`, `category`, `address`, `phoneNumber`, `email`, `websiteLink`, `description`, `ammenities`, `workingTime`, `photoName`, `rates`, `others`, `registered`, `status`, `views`, `entryDate`) VALUES
(1, 2, 'WWWNew Name', 'Nw Owner', 'Packers & movers', 'new Address', '9999999999', 'ewemail@email.com', 'newwww.google.com', 'New Description', 'New Amenities', 'New Working Hours', 'service.jpg', 'SNew Rates', '', '21-01-2019 09:58:04 PM', 1, 0, '2019-03-12 13:58:40'),
(3, 2, 'Company Name', 'Owner Name', 'Carpentry', 'Address', '9876543210', 'email@email.com', 'www.google.com', 'Description', 'Ammenities', 'Working Hours', 'service.jpg', 'Rates', '', '21-01-2019 09:59:22 PM', 1, 0, '2019-03-12 13:58:55'),
(4, 2, 'Service Company', 'Owner myself', 'House Keeping', 'Address', '7895463210', 'em@em.com', 'website.com', 'Desc', 'Amenities,  Free Visit for First time', 'Mon-Sat 10Am-5Pm', 'service.jpg', '150 Per visit', '', '30-01-2019 11:43:48 PM', 0, 0, '2019-03-12 13:59:03'),
(5, 2, 'Test Cmpany', 'Test Owner', 'Mechanics', 'Test Address', '8888888888', 'test@test.com', 'website.com', 'Hello Customers you will get world class service from our company', 'Basically we have well trained employees,', 'We work round the clock 24*7', 'service.jpg', 'Pay for what we serve', 'NA', '31-01-2019 07:48:22 PM', 0, 0, '2019-02-12 04:19:46'),
(6, 2, 'Test Cmpany', 'Test Owner', 'Electricians', 'Test Address', '8888888888', 'test@test.com', 'website.com', 'Hello Customers you will get world class service from our company', 'Basically we have well trained employees,', 'We work round the clock 24*7', 'service.jpg', 'Pay for what we serve', 'NA', '31-01-2019 07:48:56 PM', 1, 0, '2019-03-12 13:59:24'),
(7, 3, 'Abhi Mule Group', 'Abhi Mule', 'Paint Service', 'Jaysingpur', '7777777777', 'abhi@gmail.com', 'www.abhimule.com', 'We are well renowned packer & movers in our locality. We serve the finest service to our valuable  customers.', 'Good Staff, Friendly Environment', 'Mon-Sat 10AM-5PM', 'service.jpg', '10000 per service', 'NA', '12-02-2019 09:58:30 AM', 1, 0, '2019-03-12 13:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'USER',
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`id`, `username`, `email`, `password`, `role`, `entryDate`) VALUES
(1, 'admin', 'email@email.com', 'admin', 'ADMIN', '2019-01-15 18:43:09'),
(2, 'user', 'user@user.com', 'user', 'USER', '2019-01-20 18:24:08'),
(3, 'Abhi Mule', 'abhi@gmail.com', 'admin', 'USER', '2019-02-12 04:23:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listingmaster`
--
ALTER TABLE `listingmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `listingmaster`
--
ALTER TABLE `listingmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
