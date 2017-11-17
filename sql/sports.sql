-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 05:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `venue` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `fromt` time NOT NULL,
  `tot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`venue`, `date1`, `fromt`, `tot`) VALUES
('', '2017-05-20', '03:01:00', '05:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `booked1`
--

CREATE TABLE `booked1` (
  `venue` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `fromt` time NOT NULL,
  `tot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booked2`
--

CREATE TABLE `booked2` (
  `venue` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `fromt` time NOT NULL,
  `tot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carousal`
--

CREATE TABLE `carousal` (
  `id` int(11) NOT NULL,
  `one` varchar(1000) NOT NULL,
  `one1` varchar(1000) NOT NULL,
  `two` varchar(1000) NOT NULL,
  `two2` varchar(1000) NOT NULL,
  `three` varchar(1000) NOT NULL,
  `three3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousal`
--

INSERT INTO `carousal` (`id`, `one`, `one1`, `two`, `two2`, `three`, `three3`) VALUES
(1, 'RCB VS delhi', 'MUMBAI VS DELHI', 'INDIA VS PAKISTAN', 'AUSTRI VS SPAIN', 'INDIA VS ENGLAND', 'ENGLAND VS USA');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `id1` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id1`, `count`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `latest`
--

CREATE TABLE `latest` (
  `id1` int(11) NOT NULL,
  `news` varchar(10000) NOT NULL,
  `rating` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest`
--

INSERT INTO `latest` (`id1`, `news`, `rating`) VALUES
(1, '                                                       - Vijay joins lengthy IPL injury bench, moohit declared fit\r\n      - Will buy into whatever Root wants from tam: Anderson\r\n      - Hales hopes to reviveer with middle-order move\r\n      - If I fail today, does not mean I am going to fail tomorrow: Stokes                                    ', '  RCB       ***** \r\n        KKR       ****  \r\n        MI        ***   \r\n        DD        ****  \r\n        RPS       ****                             ');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `matchcount`
--

CREATE TABLE `matchcount` (
  `tour` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `tname` varchar(100) NOT NULL,
  `matchno` varchar(100) NOT NULL,
  `team1` varchar(100) NOT NULL,
  `team2` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `fromt` time NOT NULL,
  `tot` time NOT NULL,
  `venue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`tname`, `matchno`, `team1`, `team2`, `date1`, `fromt`, `tot`, `venue`) VALUES
('IPL', 'MOO', 'MUMBAI', 'RCB', '2017-05-20', '03:01:00', '05:01:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `playercount`
--

CREATE TABLE `playercount` (
  `teamname` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playercount`
--

INSERT INTO `playercount` (`teamname`, `count`) VALUES
('korea', 1),
('MUMBAI', 2),
('RCB', 2);

-- --------------------------------------------------------

--
-- Table structure for table `player_details`
--

CREATE TABLE `player_details` (
  `tname` varchar(100) NOT NULL,
  `teamname` varchar(100) NOT NULL,
  `playerid` varchar(100) NOT NULL,
  `playername` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `skill` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_details`
--

INSERT INTO `player_details` (`tname`, `teamname`, `playerid`, `playername`, `country`, `skill`) VALUES
('IPL', 'MUMBAI', 'POO0', 'ROHIT', 'INDIA', 'BATTING'),
('IPL', 'MUMBAI', 'POO1', 'POLLARD', 'WEST', 'BATIINF'),
('IPL', 'RCB', 'POO0', 'KOHLI', 'INDIA', 'BATTING'),
('IPL', 'RCB', 'POO1', 'GAYLE', 'WEST', 'BATTING'),
('isl', 'korea', 'POO0', 'mohit', 'india', 'bat');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `name` varchar(30) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`name`, `TYPE`, `sdate`, `edate`) VALUES
('IPL', 'cricket', '2017-05-23', '2017-06-21'),
('isl', 'badmintion', '2017-05-18', '2017-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `to` time NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`to`, `time`) VALUES
('13:01:00', '17:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_details`
--

CREATE TABLE `t_details` (
  `tname` varchar(100) NOT NULL,
  `teamname` varchar(100) NOT NULL,
  `noplayers` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_details`
--

INSERT INTO `t_details` (`tname`, `teamname`, `noplayers`) VALUES
('IPL', 'MUMBAI', 0),
('IPL', 'RCB', 0),
('isl', 'korea', 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id1` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `seat` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id1`, `type`, `name`, `city`, `seat`, `image`) VALUES
('V00', 'cricket', 'CHINNA', 'BANGALORE', 25000, 'chin.jpg'),
('V01', 'tennisbadminton', 'TENNIS', 'ENGLAND', 25400, 'ten.jpg'),
('V02', 'cricket', 'CHINNA', 'bangalore', 25000, 'chin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `latest`
--
ALTER TABLE `latest`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `matchcount`
--
ALTER TABLE `matchcount`
  ADD PRIMARY KEY (`tour`);

--
-- Indexes for table `playercount`
--
ALTER TABLE `playercount`
  ADD PRIMARY KEY (`teamname`);

--
-- Indexes for table `player_details`
--
ALTER TABLE `player_details`
  ADD PRIMARY KEY (`tname`,`teamname`,`playerid`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `t_details`
--
ALTER TABLE `t_details`
  ADD PRIMARY KEY (`tname`,`teamname`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id1`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
