-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 01:39 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incident_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incident_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `incident_type_id` int(11) NOT NULL,
  `incident_address` varchar(150) NOT NULL,
  `incident_time` datetime NOT NULL,
  `cor_longitude` varchar(50) NOT NULL,
  `cor_latitude` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  `date_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`incident_id`, `user_id`, `incident_type_id`, `incident_address`, `incident_time`, `cor_longitude`, `cor_latitude`, `status`, `date_seen`) VALUES
(1, 1, 3, 'Linamon - Zamboanga Rd, Iligan City, Lanao del Norte, Philippines', '2017-05-31 14:06:57', '124.179281', '8.191220', 'seen', '2017-10-16 10:05:28'),
(2, 1, 2, '5449 Andres Bonifacio Ave, Iligan City, 9200 Lanao del Norte, Philippines', '2017-06-08 13:27:50', '124.244585', '8.239283 ', 'seen', '2017-10-16 08:49:17'),
(3, 1, 3, 'Tambacan Bridge, Iligan City, Lanao del Norte, Philippines', '2017-06-26 16:56:20', '124.233201', '8.225356', 'seen', '2017-10-16 08:49:13'),
(4, 1, 2, '158 Macapagal Ave, Mahayahay, Iligan City, 9200 Lanao del Norte, Philippines', '2017-06-29 13:20:42', '124.241890', '8.218999', 'seen', '2017-10-16 08:49:09'),
(5, 1, 5, '89 Sabayle St, Poblacion, Iligan City, 9200 Lanao del Norte, Philippines', '2017-07-01 07:00:10', '124.235832', '8.231071', 'seen', '2017-10-18 08:13:59'),
(6, 1, 5, 'Tomas Cabili Ave, Iligan City, Lanao del Norte, Philippines', '2017-08-02 04:00:05', '124.236771', '8.235239', 'seen', '2017-10-23 12:36:18'),
(7, 1, 4, 'Aguinaldo St, Iligan City, Lanao del Norte, Philippines', '2017-07-15 06:40:20', '124.235280', '8.227567', 'seen', '2017-10-16 09:05:35'),
(8, 5, 2, 'Tipanoy', '2017-10-23 08:46:59', '124.2450361', '8.2072569', 'seen', '2017-10-23 13:39:12'),
(9, 5, 3, 'Baraas, Iligan City', '2017-10-23 09:16:49', '125.45534099999998', '7.190708', 'seen', '2017-10-23 17:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `incident_type`
--

CREATE TABLE `incident_type` (
  `incident_type_id` int(11) NOT NULL,
  `incident_type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_type`
--

INSERT INTO `incident_type` (`incident_type_id`, `incident_type`) VALUES
(2, 'Traffic Accident'),
(3, 'Natural Disaster (Flood, Landslide, Fire etc...)'),
(4, 'Emergencies (Health issues, Labor etc...)'),
(5, 'Crime Indicent (Stabbing, Kid Napping, Car Napping, Stealing,Shooting....)');

-- --------------------------------------------------------

--
-- Table structure for table `responders`
--

CREATE TABLE `responders` (
  `responder_id` int(11) NOT NULL,
  `responder_firstname` varchar(50) NOT NULL,
  `responder_middlename` varchar(50) NOT NULL,
  `responder_lastname` varchar(50) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `Team_Number` int(10) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `responders`
--

INSERT INTO `responders` (`responder_id`, `responder_firstname`, `responder_middlename`, `responder_lastname`, `position`, `Team_Number`, `username`, `password`, `date_log`) VALUES
(1, 'Patrick', 'S.', 'Ñunes', 'Admin', NULL, 'Admin', 'Patrick', '0000-00-00 00:00:00'),
(2, 'Hannah', 'C.', 'Hernandez', 'RN EMT', 1, 'Hannah', 'Hannah', '0000-00-00 00:00:00'),
(3, 'Genius', 'L.', 'Gabunada', 'RN EMT', 1, 'Genius', 'Genius', '0000-00-00 00:00:00'),
(4, 'Richard', 'L.', 'Candol', 'EMT', 1, 'richard', 'richard', '0000-00-00 00:00:00'),
(5, 'Eldran', 'D. ', 'Nacua', 'BSN, EMT', 1, 'eldran', 'eldran', '0000-00-00 00:00:00'),
(6, 'Leonardo', '', 'Perocho', '', 1, 'leonardo', 'leonardo', '0000-00-00 00:00:00'),
(7, 'Jannis Josephine', 'D.', 'Bucayon', 'BSN', 1, 'jannis', 'jannis', '0000-00-00 00:00:00'),
(8, 'Ronald', 'G.', 'Galeos', 'EMT', 1, 'ronald', 'ronald', '0000-00-00 00:00:00'),
(9, 'Julius', 'Q.', 'Bado', 'EMT', 1, 'julius', 'julius', '0000-00-00 00:00:00'),
(10, 'George', '', 'Amaron', '', 1, 'george', 'd9d4007bf64ef224d7bf', '0000-00-00 00:00:00'),
(11, 'Marlyndon', '', 'Roco', NULL, 1, 'marlyndon', 'marlyndon', '0000-00-00 00:00:00'),
(12, 'Jovie', 'L.', 'Cayran', 'T.O', 1, 'jovie', 'jovie', '0000-00-00 00:00:00'),
(13, 'Salvador', 'LI.', 'Arumpac', 'EMT, T.O', 1, 'salvador', '5a3b26725e9bcc107fd0', '0000-00-00 00:00:00'),
(14, 'Jerald', 'B.', 'Rosco', 'RN, EMT', 2, 'jerald', 'jerald', '0000-00-00 00:00:00'),
(15, 'David', 'E.', 'Alip', 'RN, EMT', 2, 'david', 'david', '0000-00-00 00:00:00'),
(16, 'Mary Ann', '', 'Ungab', NULL, 2, 'maryann', 'maryann', '0000-00-00 00:00:00'),
(17, 'Hamza', 'C.', 'DImatanday', 'EMT', 2, 'hamza', 'hamza', '0000-00-00 00:00:00'),
(18, 'Nathan Noel', '', 'Dalangpan', 'RN', 2, 'nathannoel', 'nathannoel', '0000-00-00 00:00:00'),
(19, 'Abegail Zyra', '', 'Permites', '', 2, 'abegailzyra', 'abegailzyra', '0000-00-00 00:00:00'),
(20, 'Earl', 'J.', 'Sabaduqia', 'EMT', 2, 'earl', 'earl', '0000-00-00 00:00:00'),
(21, 'Jason', '', 'Santos', 'RT', 2, 'jason', 'jason', '0000-00-00 00:00:00'),
(22, 'Ver', '', 'Varquez', NULL, 2, 'ver', 'ver', '0000-00-00 00:00:00'),
(23, 'Dax Nichole', '', 'Roco', NULL, 2, 'dax', 'dax', '0000-00-00 00:00:00'),
(24, 'Sunny', 'A.', 'Olandesca', 'T.O', 2, 'sunny', 'sunny', '0000-00-00 00:00:00'),
(25, 'John Vincent', '', 'Torres', 'T.O', 2, 'john', 'john', '0000-00-00 00:00:00'),
(26, 'Kyle Jon', 'S.', 'Malanog', 'RN, EMT', 3, 'kylejon', 'kylejon', '0000-00-00 00:00:00'),
(27, 'Diana Mary', 'B.', 'Margaja', 'RN', 3, 'dianamary', 'dianamary', '0000-00-00 00:00:00'),
(28, 'Rae Randy', '', 'Roxas', NULL, 3, 'raerandy', 'raerandy', '0000-00-00 00:00:00'),
(29, 'Eddie', '', 'Jumalon', NULL, 3, 'eddie', 'eddie', '0000-00-00 00:00:00'),
(30, 'Kim Gary', 'B.', 'Mara', 'RC', 3, 'kimgary', 'kimgary', '0000-00-00 00:00:00'),
(31, 'Kint John', 'B.', 'Sairot', 'EMT', 3, 'kintjohn', 'kintjohn', '0000-00-00 00:00:00'),
(32, 'Anthony', 'V.', 'Ombrog', 'RN, CNN', 3, 'anthony', 'anthony', '0000-00-00 00:00:00'),
(33, 'Sharmie Love', 'L.', 'Sabaduqia', 'EMT', 3, 'sharmielove', 'sharmielove', '0000-00-00 00:00:00'),
(34, 'Malcolm Shamron', '', 'Mejia', NULL, 3, 'malcolm', 'malcolm', '0000-00-00 00:00:00'),
(35, 'Andymher', 'F.', 'Bongosia', 'T.O', 3, 'andymher', 'andymher', '0000-00-00 00:00:00'),
(36, 'Shierwin', 'C.', 'Bado', 'T.O', 3, 'shierwin', 'shierwin', '0000-00-00 00:00:00'),
(37, 'Rory Jay', 'N.', 'Escarpe', 'RN, EMT', 4, 'roryjay', 'roryjay', '0000-00-00 00:00:00'),
(38, 'Archie Bonn', 'L.', 'Bahena', 'RN, EMT', 4, 'archiebonn', 'archiebonn', '0000-00-00 00:00:00'),
(39, 'Jan Michael', 'A.', 'Solidum', NULL, 4, 'janmichael', 'janmichael', '0000-00-00 00:00:00'),
(40, 'Princess', 'L.', 'Rojo', 'BSN, EMT', 4, 'princess', 'princess', '0000-00-00 00:00:00'),
(41, 'Ismael', '', 'Arumpac II', NULL, 4, 'ismael', 'ismael', '0000-00-00 00:00:00'),
(42, 'Dwight Chester', 'E.', 'Libre', 'BSN, EMT', 4, 'dwightchester', 'dwightchester', '0000-00-00 00:00:00'),
(43, 'Angelo', 'S.', 'Bertomen', 'EMT', 4, 'angelo', 'angelo', '0000-00-00 00:00:00'),
(44, 'Maria ', 'Basilisa', 'Maglasang', NULL, 4, 'maria', 'maria', '0000-00-00 00:00:00'),
(45, 'Giovanni', '', 'Capapas', NULL, 4, 'giovanni', 'giovanni', '0000-00-00 00:00:00'),
(46, 'Redentor', '', 'Bernabe', NULL, 4, 'redentor', 'redentor', '0000-00-00 00:00:00'),
(47, 'Amabello', 'S.', 'Estolloso', 'T.O', 4, 'amabello', 'amabello', '0000-00-00 00:00:00'),
(48, 'Hoberto', '', 'Ungab', 'T.O', 4, 'hoberto', 'hoberto', '0000-00-00 00:00:00'),
(49, 'Zack-Mio', 'Agustino', 'Sermon', 'Team Leader', 2, 'zack', 'c400e38a930ea4922dee', '0000-00-00 00:00:00'),
(50, 'Kharen', 'Gumahad', 'Tompong', 'Team Leader', 2, 'kharen', '22ddeb2b02adc1908cc0', '0000-00-00 00:00:00'),
(51, 'dfs', 'fsdf', 'dfs', 'sdf', 1, 'fsd', '47bce5c74f589f4867db', '0000-00-00 00:00:00'),
(52, '$res_fname', '$res_mname', '$res_lname', NULL, NULL, '', '', '0000-00-00 00:00:00'),
(53, '', '', '', '', 0, '', '', '0000-00-00 00:00:00'),
(54, 'kharen', 'hdj', 'hshsb', 'bsusb', 3, 'kharen', 'kharen', '0000-00-00 00:00:00'),
(55, '', '', '', '', 0, '', '', '0000-00-00 00:00:00'),
(56, '', '', '', '', 0, '', '', '0000-00-00 00:00:00'),
(57, '', '', '', '', 0, '', '', '0000-00-00 00:00:00'),
(58, '', '', '', '', 0, '', '', '0000-00-00 00:00:00'),
(59, 'dasdff', 'sdf', 'dsfd', 'fs', 1, 'dsfd', '111', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `responder_report`
--

CREATE TABLE `responder_report` (
  `responder_id` int(11) NOT NULL,
  `incident_id` int(11) NOT NULL,
  `final_report` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responder_report`
--

INSERT INTO `responder_report` (`responder_id`, `incident_id`, `final_report`) VALUES
(11, 1, 'Nalumos ang bata sa 16th feet na pool pero ok na siya na dala ra sa CPR.'),
(4, 2, 'Nag Bangga ang truck ug ang jeep ug 5 ka pasahero ang samaran ug didto sila gi dala sa Sanitarium Hospital'),
(20, 3, 'Nahulog ang tigulang sa hagdan ug dili ka tindog, among gi dala sa Mercy Hospital'),
(19, 4, 'Nag Bangga ang Jeep ug ang motor ug nakabatong ug major injury ang driver sa motor ug gi dala sa Mercy Hospital'),
(35, 5, 'Gi pusil ang usa ka mechaniko'),
(44, 6, 'Gi dunggab ang usa ka 30 anyos nga lalake sa kilid '),
(46, 7, 'Ok na');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_middlename` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_number` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_middlename`, `user_lastname`, `gender`, `address`, `contact_number`, `email`, `username`, `password`, `date_log`) VALUES
(1, 'Zack-Mio', 'Agustino', 'Sermon', 'Male', 'DMS Iligan City', 9152700309, 'sermonzack@gmail.com', 'zackmio', 'zack123', '2017-10-23 13:54:51'),
(2, 'Kharen', 'Gumahad', 'Tompong', 'Female', 'Pala-o', 9173232914, 'kharen.silver@gmail.com', 'kharen', '22ddeb2b02adc1908cc0', '2017-10-23 13:54:51'),
(3, 'Lourile', 'Gumahad', 'Gonzaga', 'Female', 'Pala-o', 9134536578, 'lourile@yahoo.com', 'lourie', '79a648c301ad3b0c3097', '2017-10-23 13:54:51'),
(4, 'sdfsd', 'sdfss', 'dfsdsd', 'fsd', 'sdsf', 0, 'sad@com', 'asd', '123', '2017-10-23 13:54:51'),
(5, 'Kharen', 'Gumahad', 'Tompong', 'female', 'pala-o', 7655, 'kharen_silver@yahoo.com', 'khai', 'khai', '2017-10-23 13:54:51'),
(6, 'sdas', 'dsad', 'asd', 'Male', 'asdsadas', 0, 'asdd@com', 'ty', 'ty', '2017-10-23 13:54:51'),
(7, 'khshsv', 'bsjsb', 'bsjsb', 'Female', 'Pala-o', 8373, 'kja@bsjs.com', 'khai1', 'khai', '2017-10-23 13:54:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incident_id`),
  ADD KEY `incident_type_id` (`incident_type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `incident_type`
--
ALTER TABLE `incident_type`
  ADD PRIMARY KEY (`incident_type_id`);

--
-- Indexes for table `responders`
--
ALTER TABLE `responders`
  ADD PRIMARY KEY (`responder_id`);

--
-- Indexes for table `responder_report`
--
ALTER TABLE `responder_report`
  ADD KEY `responder_id` (`responder_id`),
  ADD KEY `incident_id` (`incident_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `incident_type`
--
ALTER TABLE `incident_type`
  MODIFY `incident_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `responders`
--
ALTER TABLE `responders`
  MODIFY `responder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `incident`
--
ALTER TABLE `incident`
  ADD CONSTRAINT `incident_ibfk_1` FOREIGN KEY (`incident_type_id`) REFERENCES `incident_type` (`incident_type_id`),
  ADD CONSTRAINT `incident_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `responder_report`
--
ALTER TABLE `responder_report`
  ADD CONSTRAINT `responder_report_ibfk_1` FOREIGN KEY (`responder_id`) REFERENCES `responders` (`responder_id`),
  ADD CONSTRAINT `responder_report_ibfk_2` FOREIGN KEY (`incident_id`) REFERENCES `incident` (`incident_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
