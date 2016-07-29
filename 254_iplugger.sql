-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 09:00 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `254_iplugger`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `passwd`) VALUES
(1, 'superadmin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artist_signup`
--

CREATE TABLE `artist_signup` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `verify` varchar(50) NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `stage_name` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist_signup`
--

INSERT INTO `artist_signup` (`id`, `uname`, `passwd`, `verify`, `artist_name`, `stage_name`, `genre`, `county`, `website`, `email`, `phone_no`) VALUES
(1, 'qwerty', '12', '34', 'nelson yonde', 'ne-yo', 'Gospel', 'Meru', 'neyo.com', 'info@neyo.com', 1234567873),
(2, 'khaligraph', 'jones', 'jones', 'khaligraph jones', 'k jones', 'Hiphop', 'Nairobi', 'kjonesmdundo.com', 'info@kjonesmdundo.com', 2547483647),
(3, 'Fridah', '1234', '1234', 'fridah owiti', 'fridah_ule mbaya', 'Rythmn & Blues', 'Kisumu', 'fridahulembaya.com', 'info@fridah.com', 2547483647),


-- --------------------------------------------------------

--
-- Table structure for table `radio_signup`
--

CREATE TABLE `radio_signup` (
  `id` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `verify` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `county` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `freq` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radio_signup`
--

INSERT INTO `radio_signup` (`id`, `rname`, `passwd`, `verify`, `genre`, `county`, `website`, `email`, `phone_no`, `freq`) VALUES
(1, '', '', '', 'Gospel', '', '', '', 0, 0),
(2, 'Radio Maisha', '12', '12', 'All', 'Nairobi', 'radiomaisha.com', 'radiomaisha@gmail.com', 2147483647, 89),
(3, 'HBR', '1234', '1234', 'All', 'Thika', 'hbr.com', 'info@hbr.com', 2147483647, 107),
(4, 'inoro fm', 'qwerty', 'qwerty', 'Local', 'Central', 'inoro.com', 'info@inoro.com', 2147483647, 1098.2),
(5, '', '', '', 'Gospel', '', '', '', 0, 0),
(6, 'Imani Fm', 'asd', 'asd', 'Gospel', 'Kitale', 'imanifm.co.ke', 'info@imani.co.ke', 2147483647, 88.8),
(7, 'Classic fm', 'zxc', 'zxc', 'Gospel', 'Nairobi', 'classicfm.co.ke', 'info@classicfm.co.ke', 2147483647, 97.7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `artist_signup`
--
ALTER TABLE `artist_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio_signup`
--
ALTER TABLE `radio_signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `artist_signup`
--
ALTER TABLE `artist_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `radio_signup`
--
ALTER TABLE `radio_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
