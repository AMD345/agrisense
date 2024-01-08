-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 05:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrisense_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(130) NOT NULL,
  `adminPassword` varchar(130) NOT NULL,
  `contactNumb` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adminID`, `adminName`, `adminPassword`, `contactNumb`) VALUES
(1, 'sopphoLesbos', 'mickeyNiJann', 9168884557);

-- --------------------------------------------------------

--
-- Table structure for table `dbtable`
--

CREATE TABLE `dbtable` (
  `inputID` int(11) NOT NULL,
  `humidity` double NOT NULL,
  `moisture` double NOT NULL,
  `temperature` double NOT NULL,
  `rainfall` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `inputID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `nitrogen` double NOT NULL,
  `phosphorus` double NOT NULL,
  `potassium` double NOT NULL,
  `rainfall` double NOT NULL,
  `temperature` double NOT NULL,
  `humidity` double NOT NULL,
  `pH` double NOT NULL,
  `location` varchar(250) NOT NULL,
  `dateTime` datetime NOT NULL,
  `predictedResult` varchar(50) NOT NULL,
  `certaintyLevel` double NOT NULL,
  `season` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `ml` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`inputID`, `userID`, `nitrogen`, `phosphorus`, `potassium`, `rainfall`, `temperature`, `humidity`, `pH`, `location`, `dateTime`, `predictedResult`, `certaintyLevel`, `season`, `longitude`, `latitude`, `ml`) VALUES
(1, 1, 67, 43, 45, 250, 20, 59, 8, '', '2024-01-06 11:05:04', 'Rice', 0.3, ' Wet Season', -120.09859374999999, 44.73397326425626, ' Random Forest Algorithm\n'),
(2, 1, 10, 10, 10, 50, 34, 20, 7.9, '', '2024-01-06 11:05:51', 'Mothbeans', 0.33, ' Dry Season', 125.80852023704956, 7.324557225463129, ' Random Forest Algorithm\n'),
(3, 1, 45, 21, 12, 67, 15, 34, 8, '', '2024-01-06 13:48:13', 'Mothbeans', 0.38, ' Dry Season', 120.13850294108373, 15.695892389283106, ' Random Forest Algorithm\n'),
(4, 1, 45, 90, 23, 78, 34, 45, 7.88, '', '2024-01-07 04:38:03', 'Blackgram', 0.99999999944816, ' Dry Season', 109.10156250000001, 16.01627358234355, ' Support Vector Machine\n'),
(5, 1, 78, 90, 23, 150, 33, 198, 6.111, '', '2024-01-07 04:38:52', 'Papaya', 1, ' Wet Season', 120.94484630615575, 18.429360364960356, ' K-Nearest Neighbor\n'),
(6, 1, 56, 21, 10, 45, 23, 10, 7.8, '', '2024-01-07 04:39:51', 'Mothbeans', 0.271, ' Dry Season', 112.62102062732001, 22.41119406282581, ' Bagging\n'),
(7, 1, 89, 56, 56, 250, 19, 87, 7.999, '', '2024-01-07 04:43:54', 'Rice', 0.85180200914268, ' Wet Season', 123.32358746912135, 12.116538906117635, ' Logistic Regression\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` bigint(50) NOT NULL,
  `request` tinyint(1) NOT NULL,
  `accType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `number`, `request`, `accType`) VALUES
(1, 'jannFin', 'qwerty123', 'voldy@gmail.com', 9159094557, 0, 'Premium'),
(2, 'cessBonak', 'bonakbonak', 'bonak@gmail.com', 9069089857, 0, 'Basic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `dbtable`
--
ALTER TABLE `dbtable`
  ADD PRIMARY KEY (`inputID`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`inputID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbtable`
--
ALTER TABLE `dbtable`
  MODIFY `inputID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `inputID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
