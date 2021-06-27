-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 08:40 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `StudentId` int(10) NOT NULL,
  `StudentName` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `ClassName` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Section` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `AdmissionNo` int(5) DEFAULT NULL,
  `RollNo` int(10) DEFAULT NULL,
  `FathersName` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `MothersName` varchar(24) CHARACTER SET utf8 DEFAULT NULL,
  `Dob` date DEFAULT NULL,
  `MobileNo` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`StudentId`, `StudentName`, `ClassName`, `Section`, `AdmissionNo`, `RollNo`, `FathersName`, `MothersName`, `Dob`, `MobileNo`) VALUES
(1, 'ADIB  AKTHER    .A', 'Second', 'C', 2246, 1, 'AKBAR  ALI   .I', 'SALMA BANU .A', '2003-05-20', 123456789),
(2, 'R .AKASH', 'First', 'A', 947, 50, 'S. RAMAKRISHNAN', 'CHANDRA  PRABHA   .R', '2002-08-24', 123456790),
(43, 'dipu', 'third', 'D', 2378, 34, 'manoj', 'manju', '1990-06-15', 2147483647),
(4, 'M.K.ARJUN', 'Six', 'A', 1858, 4, 'C. MUTHUKUMARAN', 'M.K.LAKSHMI  KUMARI', '2002-11-11', 123456792),
(5, 'V. ARUNACHALAM', 'Third', 'A', 2731, 5, 'L. VENKATACHALAM', 'V. LAKSHMI', '2003-01-21', 123456793),
(6, 'G .HARISH    BABU', 'Six', 'A', 2351, 6, 'M. GANESAN', 'G. VIJAYALAKSHMI', '2002-07-11', 123456794),
(7, 'JAGAN.V', 'Six', 'A', 2553, 7, 'VIJAYAKUMAR .A', 'L.NIRMALA', '2003-03-27', 123456795),
(8, 'G.LOKESH', 'Six', 'A', 2106, 8, 'N.G.GOPINATH', 'G.REVATHY', '2002-07-05', 123456796),
(9, 'G.MANIKANDAN', 'Six', 'A', 1461, 9, 'S.GURU RAGAVENDHIRAN', 'G.MANJULA', '2002-10-26', 123456797),
(10, 'MOHAMED ASAN .M', 'Six', 'A', 1033, 10, 'J.MOHAMED RABEEK', 'M.SABUR NISHA', '2002-05-26', 123456798),
(11, 'S.A. PRAATHIK', 'Six', 'A', 1405, 11, 'S.SARAVANAN', 'R.SWAPNA', '2002-12-28', 123456799),
(12, 'PRAKASH    .R', 'Second', 'A', 2579, 12, 'RAJA PANDIAN .S', 'VAIRAM.R', '2002-06-08', 123456800),
(13, 'A .PRASANNA VEERA', 'Six', 'A', 2040, 13, 'K. AMARNATH', 'R.JEGATHEESWARI', '2003-02-26', 123456801),
(14, 'N .PRASANTH', 'Six', 'A', 1890, 14, 'B. NANDA KUMAR', 'N . GOMATHY', '2002-12-05', 123456802),
(15, 'S . RAKKESH', 'Six', 'A', 2475, 15, 'N. SARAVANAN', 'S. JAYANTHI', '2003-01-24', 123456803),
(16, 'G . RISHI', 'Six', 'A', 2708, 16, 'R.A . GOKUL', 'G .MAHESWARI', '2002-10-08', 123456804),
(17, 'J .K. SAKTHIVEL', 'Six', 'A', 2408, 17, 'KalaiMuthu', 'JAYALAKSHMI', '2002-10-20', 123456805),
(18, 'J .SAM IMMANUEL  LAZAR', 'Six', 'A', 2560, 18, 'JOSEPH DAUGLAS  . L', 'J .PUSHPARANI', '2002-11-18', 123456806),
(19, 'M .SUDARSHAN', 'Third', 'A', 1358, 19, 'K .MAHENDRAN', 'M .ANATHI', '2002-01-22', 123456807),
(20, 'S .SUNIEL  KUMAR', 'Six', 'A', 2442, 20, 'A. SENTHIL  KUMAR', 'M. SHAKILA', '2003-07-21', 123456808),
(21, 'TISYAN.P', 'Six', 'B', 2561, 1, 'PARTHASARATHY.T', 'VALARMATHI.S', '2002-08-25', 123456809),
(22, 'S.VISHAL', 'Six', 'B', 925, 2, 'S.SHIVA KUMAR', 'VALARMATHI.S', '2002-09-28', 123456810),
(23, 'R.VISHWANATH', 'Six', 'B', 1901, 3, 'V.RAJASEKAR', 'R.VIJAYALAKSHMI', '2003-05-17', 123456811),
(24, 'B.YUGESH', 'Six', 'B', 997, 4, 'K.BALA MURUGAN', 'G.SUGUNAVATHI', '2002-06-23', 123456812),
(25, 'S.AVANTHIKA', 'Five', 'B', 1031, 5, 'SRIRAM.S', 'LALITHA.A', '2002-09-23', 123456813),
(26, 'M .G .HARINI', 'Six', 'B', 2446, 6, 'M.K. GANESH BABU', 'K .K. USHAMAI', '2002-08-26', 123456814),
(27, 'S .HARINI', 'Five', 'B', 1416, 7, 'G .SIDHARTHAN', 'S .CHITRA KALA', '2002-06-27', 123456815),
(28, 'KALPANA SHREE  .S', 'Six', 'B', 993, 8, 'SOORIYA  PRAKASH   . K', 'SUJATHA   . S', '2002-06-29', 123456816),
(29, 'LAKSHANA   . N', 'Five', 'B', 945, 9, 'M .NATARAJAN', 'N . CHITRA', '2003-08-19', 123456817),
(30, 'A . MONISHA', 'Six', 'B', 941, 10, 'M .ALANGARAM', 'A .UMA MAHESWARI', '2003-08-29', 123456818),
(31, 'T .NISHIHA', 'Six', 'B', 2389, 11, 'S .THIYAGARAJAN', 'K . R . VASANTHA  KUMARI', '2003-01-27', 123456819),
(32, 'N . PREETHI', 'Five', 'B', 1889, 12, 'NANDA  KUMAR .B', 'N .GOMATHY', '2002-12-05', 123456820),
(33, 'RITHI RAJEEV', 'Six', 'B', 2462, 13, 'RAJEEV  .T', 'PRABHA RAJEEV', '2002-08-02', 123456821),
(34, 'G .SHARON  SWEETY', 'Six', 'B', 1906, 14, 'G .SESHU  BABU', 'G . BINDU MADHAVI', '2002-03-03', 123456822),
(35, 'J .SIVA SANKARI', 'Six', 'B', 2306, 15, 'N .JAWAHARLAL NEHRU', 'J .USHA RANI', '2002-11-17', 123456823),
(36, 'S .SIVA  SANKARI', 'Six', 'B', 1486, 16, 'S. SARAVANAN', 'S.PIRAMU', '2002-07-21', 123456824),
(37, 'M .SRI BARANIKA', 'Five', 'B', 2030, 17, 'S  . MOORTHY', 'M. ANANTHI', '2002-09-25', 123456825),
(38, 'SWEATHA   . S', 'Six', 'B', 1648, 18, 'E.STALIN', 'S .PONMATHI', '2002-12-02', 123456826),
(39, 'D.SWETHA', 'Five', 'B', 2621, 19, 'A. DHANA  SEKAR', 'D. VATCHALA', '2003-04-02', 123456827);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(10) NOT NULL,
  `UserEmail` varchar(60) NOT NULL,
  `UserDob` date NOT NULL,
  `UserPassword` varchar(60) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `UserRole` varchar(10) NOT NULL,
  `UserBalUnbal` varchar(20) NOT NULL,
  `UserAttempts` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserEmail`, `UserDob`, `UserPassword`, `UserName`, `UserRole`, `UserBalUnbal`, `UserAttempts`) VALUES
(3, 'test@gmail.com', '1990-06-15', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin', 'Balanced', 6),
(10, 'testing@gmail.comg', '1990-06-15', 'e10adc3949ba59abbe56e057f20f883e', 'mani', 'user', 'Balanced', 28),
(11, 'taini@gmail.com', '1990-06-15', 'e10adc3949ba59abbe56e057f20f883e', 'schoolcom', 'user', 'Unbalanced', 9),
(12, 'schoolme@gmail.com', '1990-06-15', 'e10adc3949ba59abbe56e057f20f883e', 'schoome', 'admin', '', 0),
(13, 'schoolmert@gmail.com', '1990-06-15', 'e10adc3949ba59abbe56e057f20f883e', 'shubhranshu', 'admin', 'Unbalanced', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `StudentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
