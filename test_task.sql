-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 10:24 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `iname` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`_id`, `patient_id`, `iname`, `from_date`, `to_date`) VALUES
(1, 1, 'Medicare', '2017-07-01', '2018-07-01'),
(2, 1, 'Medicare', '2018-06-01', '2022-06-01'),
(3, 2, 'Blue Cross', '2000-03-06', '2010-03-06'),
(4, 2, 'Blue Cross', '2010-10-02', '2028-10-02'),
(5, 3, 'Aetna Group', '2010-06-01', '2018-06-01'),
(6, 3, 'Aetna Group', '2018-06-01', '2020-06-01'),
(7, 4, 'Medicaid', '2010-02-02', '2015-02-02'),
(8, 4, 'Medicaid', '2013-02-03', '2016-02-03'),
(9, 5, 'Highmark Group', '2016-07-23', '2017-07-23'),
(10, 5, 'Highmark Group', '2017-02-02', '2023-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `_id` int(10) UNSIGNED NOT NULL,
  `pn` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`_id`, `pn`, `first`, `last`, `dob`) VALUES
(1, '38701010008', 'Paul', 'liiv', '1987-01-01'),
(2, '47911020013', 'Hanna', 'Mets', '1979-11-02'),
(3, '48112110039', 'Keiti', 'Lepts', '1981-12-11'),
(4, '39503070056', 'Ivar', 'Kuusk', '1995-03-07'),
(5, '49002190013', 'Liina', 'Kivi', '1990-02-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `patient` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD KEY `_id` (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
