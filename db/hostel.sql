-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 04:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin123@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `allocated`
--

CREATE TABLE `allocated` (
  `ra_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `bed_no` int(6) NOT NULL,
  `room_id` int(6) NOT NULL,
  `ldate` date NOT NULL,
  `sdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_tbl`
--

INSERT INTO `feedback_tbl` (`id`, `name`, `email`, `subject`, `feedback`, `date`) VALUES
(1, 'kenil', 'kenilsoni@gmail.com', 'review', 'you provide a best service and facilities with low cost of leaving', '2020-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `imgaes`
--

CREATE TABLE `imgaes` (
  `img_id` int(6) NOT NULL,
  `img` varchar(100) NOT NULL,
  `pg_hostel_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imgaes`
--

INSERT INTO `imgaes` (`img_id`, `img`, `pg_hostel_id`) VALUES
(1, '5f01a76ccd7a10f45853ea673ca8f65b.png', 1),
(2, 'hostels.jpg', 2),
(3, 'bee-urban-hostel-room-photo.jpg', 3),
(4, 'bee-urban-hostel-room-photo.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp_id` int(11) NOT NULL,
  `opt` varchar(40) NOT NULL,
  `is_exp` int(11) NOT NULL DEFAULT '0',
  `c_at` datetime NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`otp_id`, `opt`, `is_exp`, `c_at`, `user_id`) VALUES
(1, '2e897ef816e444c7dbc29807dc1e2fe3', 0, '2020-10-29 21:44:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `pg_id` int(6) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mob_no` bigint(12) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `city` varchar(15) NOT NULL,
  `email_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`pg_id`, `email`, `password`, `mob_no`, `Fname`, `Lname`, `city`, `email_status`) VALUES
(2, 'soniparth598@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 9624201726, 'MADHAV', 'SONI', 'BHAVNAGAR', 1),
(3, 'ravalharsh006@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 8734808287, 'HARSH', 'RAVAL', 'BHAVNAGAR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pg_hostel`
--

CREATE TABLE `pg_hostel` (
  `pg_hostel_id` int(6) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(20) NOT NULL,
  `area` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `fees` int(6) NOT NULL,
  `pg_id` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `pg_type` varchar(11) NOT NULL,
  `staus` varchar(10) NOT NULL,
  `about` varchar(100) NOT NULL,
  `rdate` date NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `road` varchar(60) NOT NULL,
  `food` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_hostel`
--

INSERT INTO `pg_hostel` (`pg_hostel_id`, `name`, `address`, `area`, `city`, `fees`, `pg_id`, `type`, `pg_type`, `staus`, `about`, `rdate`, `mobile`, `road`, `food`) VALUES
(1, 'BEDS FRIENDS', 'BLOCK-1 23', 'NAVARANGPURA', 'AHMEDABAD', 2000, 2, 'PG', 'Boys', 'Approved', 'WE PROVIDE A BEST SERVICE AT LOW COST AND ALSO PROVIDE A SECURITY', '2020-10-29', 7878315282, 'SWASTIK CHAR RASTA', 'no'),
(2, 'HOME CARE', 'G-34', 'MANINAGAR', 'AHMEDABAD', 3000, 2, 'Hostel', 'Boys', 'Approved', 'HOME CARE HOSTEL IS A BEST HOSTEL IN AHMEDABAD AND WE PROVIDE A HOSTEL SERVICE AS LIKE HOME', '2020-10-29', 9624201726, 'KHOKHARA CIRCLE', 'yes'),
(4, 'THE PASSENGER HOSTEL', '304', 'VIJAYRAJ NAGAR', 'BHAVNAGAR', 4000, 3, 'Hostel', 'Girls', 'Approved', 'WE PROVIDE A BEST SERVICE IN BHAVNAGAR', '2020-10-30', 8989675655, 'SHASHTINAGAR CIRCLE', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(6) NOT NULL,
  `pg_hostel_id` int(6) NOT NULL,
  `room_no` int(6) NOT NULL,
  `bed` int(6) NOT NULL,
  `fees` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `pg_hostel_id`, `room_no`, `bed`, `fees`) VALUES
(1, 1, 101, 3, 0),
(2, 1, 102, 3, 0),
(3, 1, 103, 2, 0),
(4, 1, 104, 4, 0),
(5, 1, 105, 3, 0),
(6, 2, 101, 3, 0),
(7, 2, 102, 2, 0),
(8, 2, 103, 4, 0),
(9, 2, 104, 5, 0),
(11, 4, 103, 2, 0),
(12, 4, 101, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` char(1) NOT NULL DEFAULT 'M',
  `bod` date NOT NULL,
  `fname` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `gender`, `bod`, `fname`, `city`, `mobile`, `status`) VALUES
(1, 'madhavsoni598@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '1998-11-13', 'PARTH SONI', 'BHAVNAGAR', 9624201726, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocated`
--
ALTER TABLE `allocated`
  ADD PRIMARY KEY (`ra_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgaes`
--
ALTER TABLE `imgaes`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `pg_hostel`
--
ALTER TABLE `pg_hostel`
  ADD PRIMARY KEY (`pg_hostel_id`),
  ADD KEY `pg_id` (`pg_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `pg_hostel_id` (`pg_hostel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allocated`
--
ALTER TABLE `allocated`
  MODIFY `ra_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imgaes`
--
ALTER TABLE `imgaes`
  MODIFY `img_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `pg_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pg_hostel`
--
ALTER TABLE `pg_hostel`
  MODIFY `pg_hostel_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocated`
--
ALTER TABLE `allocated`
  ADD CONSTRAINT `allocated_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pg_hostel`
--
ALTER TABLE `pg_hostel`
  ADD CONSTRAINT `pg_hostel_ibfk_1` FOREIGN KEY (`pg_id`) REFERENCES `owner` (`pg_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`pg_hostel_id`) REFERENCES `pg_hostel` (`pg_hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
