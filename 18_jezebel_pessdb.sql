-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 09:12 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `18_jezebel_pessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `incidentid` int(11) NOT NULL,
  `patrolcarid` varchar(10) NOT NULL,
  `timeDispatched` datetime NOT NULL,
  `timeArrived` datetime NOT NULL,
  `timeCompleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incidentid` int(11) NOT NULL,
  `callerName` varchar(30) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `incidentTypeid` varchar(3) NOT NULL,
  `incidentLocation` varchar(50) NOT NULL,
  `incidentDesc` varchar(100) NOT NULL,
  `incidentStatusid` varchar(1) NOT NULL,
  `timeCalled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`incidentid`, `callerName`, `phoneNumber`, `incidentTypeid`, `incidentLocation`, `incidentDesc`, `incidentStatusid`, `timeCalled`) VALUES
(26, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:21:24'),
(27, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:21:52'),
(28, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:22:09'),
(29, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:22:25'),
(30, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:24:17'),
(31, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:25:02'),
(32, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:25:16'),
(33, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:25:32'),
(34, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:25:40'),
(35, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:25:46'),
(36, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:26:04'),
(37, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:26:15'),
(38, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:26:44'),
(39, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:26:52'),
(40, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:26:58'),
(41, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:27:06'),
(42, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:27:24'),
(43, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:27:34'),
(44, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:27:54'),
(45, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:30:50'),
(46, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:31:16'),
(47, 'kais', '9956784', '030', 'Lakeside', 'Tall chinese guy', '1', '2019-02-26 01:31:20'),
(48, 'Nat', '99364541', '020', 'Novena', 'Helps', '1', '2019-02-26 01:31:56'),
(49, 'Nat', '99364541', '020', 'Novena', 'Helps', '1', '2019-02-26 01:32:08'),
(50, 'Nat', '99364541', '020', 'Novena', 'Helps', '1', '2019-02-26 01:37:18'),
(51, 'Nat', '99364541', '020', 'Novena', 'Helps', '1', '2019-02-26 01:39:17'),
(52, 'Nat', '99364541', '020', 'Novena', 'Helps', '1', '2019-02-26 01:41:50'),
(53, 'Nat', '99364541', '020', 'Novena', 'Helps', '1', '2019-02-26 01:42:11'),
(54, 'Nat', '97735798', '050', 'cck', 'hibih', '1', '2019-02-26 01:53:02'),
(55, '', '', '', '', '', '2', '2019-02-26 01:53:05'),
(56, '', '', '', '', '', '2', '2019-02-26 02:00:32'),
(57, '', '', '', '', '', '2', '2019-02-26 02:00:44'),
(58, '', '', '', '', '', '2', '2019-02-26 02:01:45'),
(59, '', '', '', '', '', '2', '2019-02-26 02:04:08'),
(60, '', '', '', '', '', '2', '2019-02-26 02:11:58'),
(61, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '1', '2019-02-26 02:12:50'),
(62, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '2', '2019-02-26 02:13:04'),
(63, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '2', '2019-02-26 02:15:48'),
(64, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '2', '2019-02-26 02:16:03'),
(65, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '2', '2019-02-26 02:16:52'),
(66, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '2', '2019-02-26 02:24:49'),
(67, 'Nat', '97735798', '050', 'htgtrfgbhtr4efg', 'hibih', '2', '2019-02-26 02:24:54'),
(68, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '1', '2019-02-26 02:25:37'),
(69, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:25:41'),
(70, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:25:50'),
(71, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:26:56'),
(72, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:27:30'),
(73, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:27:53'),
(74, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:28:08'),
(75, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:28:20'),
(76, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:29:21'),
(77, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:29:40'),
(78, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:29:57'),
(79, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:30:05'),
(80, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:30:11'),
(81, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:30:17'),
(82, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:30:22'),
(83, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:30:42'),
(84, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:32:17'),
(85, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:32:37'),
(86, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:32:45'),
(87, 'Neyo', '99354421', '010', 'Boon Lay', 'dils', '2', '2019-02-26 02:33:11'),
(88, 'Aloy', '99235421', '040', 'Changi', 'vfdfsbhgf', '1', '2019-02-27 06:34:36'),
(89, 'Aloy', '99235421', '040', 'Changi', 'vfdfsbhgf', '2', '2019-02-27 06:34:40'),
(90, 'Aloy', '99235421', '040', 'Changi', 'vfdfsbhgf', '2', '2019-02-27 06:34:49'),
(91, '', '', '', '', '', '1', '2019-03-04 01:12:48'),
(92, '', '', '', '', '', '1', '2019-03-04 01:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `incidenttype`
--

CREATE TABLE `incidenttype` (
  `incidentTypeid` varchar(3) NOT NULL,
  `incidentTypeDesc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidenttype`
--

INSERT INTO `incidenttype` (`incidentTypeid`, `incidentTypeDesc`) VALUES
('010', 'Fire'),
('020', 'Riot'),
('030', 'Bulglary'),
('040', 'Domestic Violent'),
('050', 'Fallen Tree'),
('060', 'Traffic Accident'),
('070', 'Loan Shark'),
('999', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `incident_status`
--

CREATE TABLE `incident_status` (
  `statusid` varchar(1) NOT NULL,
  `statusDesc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_status`
--

INSERT INTO `incident_status` (`statusid`, `statusDesc`) VALUES
('1', 'Pending'),
('2', 'Dispatched'),
('3', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(11) NOT NULL,
  `loginUsername` varchar(1000) NOT NULL,
  `loginPassword` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `loginUsername`, `loginPassword`) VALUES
(14, 'Julian ', 'HoolianHillion'),
(15, 'Kai', 'is Wong'),
(17, 'SirBel', 'isautistic'),
(18, 'bob', '123');

-- --------------------------------------------------------

--
-- Table structure for table `patrolcar`
--

CREATE TABLE `patrolcar` (
  `patrolcarid` varchar(10) NOT NULL,
  `patrolStatusid` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patrolcar`
--

INSERT INTO `patrolcar` (`patrolcarid`, `patrolStatusid`) VALUES
('QX1234A ', '2'),
('QX3456B', '4'),
('QX1111J', '1'),
('QX2222K', '1'),
('QX5555D', '1'),
('QX2288D', '1'),
('QX8769P', '4'),
('QX1342G', '1'),
('QX8723W', '2'),
('QX8923T', '1');

-- --------------------------------------------------------

--
-- Table structure for table `patrolcar_status`
--

CREATE TABLE `patrolcar_status` (
  `statusid` varchar(1) NOT NULL,
  `statusDesc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patrolcar_status`
--

INSERT INTO `patrolcar_status` (`statusid`, `statusDesc`) VALUES
('1', 'Dispatched'),
('2', 'Patrol'),
('3', 'Free'),
('4', 'Arrived');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`incidentid`,`patrolcarid`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incidentid`);

--
-- Indexes for table `incidenttype`
--
ALTER TABLE `incidenttype`
  ADD PRIMARY KEY (`incidentTypeid`);

--
-- Indexes for table `incident_status`
--
ALTER TABLE `incident_status`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incidentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
