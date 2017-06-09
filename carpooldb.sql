-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2017 at 02:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `uid` varchar(30) NOT NULL,
  `jid` int(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`uid`, `jid`, `seats`) VALUES
('103776891363531291681', 15, 8),
('111145521507383630449', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `j_id` int(11) NOT NULL,
  `j_start` varchar(1024) NOT NULL,
  `j_finish` varchar(1024) NOT NULL,
  `j_date` date NOT NULL,
  `j_time` time NOT NULL,
  `j_fare` float NOT NULL,
  `j_desc` varchar(1024) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `v_id` int(11) NOT NULL,
  `sel` int(11) NOT NULL DEFAULT '1',
  `seats` int(11) NOT NULL,
  `rtrip` varchar(50) NOT NULL,
  `lug` varchar(50) NOT NULL,
  `depflex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`j_id`, `j_start`, `j_finish`, `j_date`, `j_time`, `j_fare`, `j_desc`, `uid`, `v_id`, `sel`, `seats`, `rtrip`, `lug`, `depflex`) VALUES
(4, 'Kasaragod, Kerala, India', 'Kochi, Kerala, India', '2017-07-05', '19:00:00', 954, 'No music or fun during ride', '111145521507383630449', 63, 1, 1, '', '', ''),
(15, 'Kasaragod, Kerala, India', 'Kannur, Kerala, India', '2017-07-05', '18:00:00', 300, 'Free traveller for everyone', '103776891363531291681', 27, 1, 2, '', '', ''),
(16, 'Kasaragod', 'Kannur', '2017-07-05', '19:00:00', 230, 'Free line bus today', '103776891363531291681', 76, 1, 60, '', '', ''),
(17, 'Kollam, Kerala, India', 'Pathanamthitta, Kerala, India', '2017-07-05', '18:00:00', 245, 'I have to take my dog with me.', '103776891363531291681', 27, 1, 4, '', '', ''),
(18, 'Kasaragod, Kerala, India', 'Kottayam, Kerala, India', '2017-07-05', '21:00:00', 120, 'I am pied piper', '111145521507383630449', 64, 1, 5, '', '', ''),
(19, 'Kottayam, Kerala, India', 'Kanjirappally, Kerala, India', '2017-07-05', '15:00:00', 120, 'Dont go gentle into that good night. Rave rave against the dying of the light.', '111145521507383630449', 64, 1, 6, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `pno` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `bio` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `u_image` blob NOT NULL,
  `u_image_name` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`, `pno`, `bdate`, `bio`, `u_image`, `u_image_name`) VALUES
(2, 'google', '117650126136277748527', 'Gitto', 'Tomy', 'gittokpr6@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/117650126136277748527', '2017-04-17 08:13:36', '2017-04-17 11:30:06', 0, '0000-00-00', '', '', ''),
(3, 'google', '116276119365408780463', 'Reenu', 'Kurian', 'kurian.reenu9@gmail.com', '', 'en', 'https://lh6.googleusercontent.com/-EK0-Dkdn1Gc/AAAAAAAAAAI/AAAAAAAACpU/eg0k3brs5jw/photo.jpg', 'https://plus.google.com/116276119365408780463', '2017-04-17 11:34:54', '2017-04-17 11:34:54', 0, '0000-00-00', '', '', ''),
(4, 'google', '104533504205545318323', 'tom mathew', 'thomas', 'tommthomas6@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-_RMJ4MPHtLc/AAAAAAAAAAI/AAAAAAAAACM/RcE6j2xcK7M/photo.jpg', 'https://plus.google.com/104533504205545318323', '2017-04-17 11:36:22', '2017-04-17 11:36:23', 0, '0000-00-00', '', '', ''),
(5, 'google', '108163561987885784224', 'Nivya', 'Elsa Babu', 'nivyaelsa100@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/108163561987885784224', '2017-04-17 11:39:58', '2017-04-17 11:39:59', 0, '0000-00-00', '', '', ''),
(10, 'google', '111145521507383630449', 'Clegane', 'Gregor', 'gregorclegane505@gmail.com', 'Male', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-06-02 06:08:42', '2017-06-09 02:22:39', 2147483647, '2016-06-05', 'I am a big fat guy\r\n', '', '876954e6ff99f212b36e6fea4a92e7c9.jpg'),
(21, 'google', '103776891363531291681', 'gintu', 'tom', 'gintutom@gmail.com', '', 'en', 'https://lh6.googleusercontent.com/-Xgs97A3xtPY/AAAAAAAAAAI/AAAAAAAARQQ/DX3XUtFJHOw/photo.jpg', '', '2017-06-08 20:45:30', '2017-06-08 20:50:13', 0, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL,
  `v_model` varchar(1024) NOT NULL,
  `v_rno` varchar(1024) NOT NULL,
  `v_desc` varchar(1024) NOT NULL,
  `v_seat` int(11) NOT NULL,
  `v_image` blob NOT NULL,
  `v_image_name` varchar(1024) NOT NULL,
  `uid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_model`, `v_rno`, `v_desc`, `v_seat`, `v_image`, `v_image_name`, `uid`) VALUES
(27, 'Pajero Sport', 'KL 05 b 1415', 'With extra customisations', 5, '', '', '103776891363531291681'),
(28, 'dsfkj', '12313', 'dwldjnalsdfkn\r\n', 0, '', '', '0'),
(29, 'ASDASD', '12313', 'FHKJGNHKB SKSN DLSFK', 0, '', '', '0'),
(30, '', '', '', 3, '', '', '0'),
(31, 'rolls', 'kl 5', 'hello im gintu', 5, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '2'),
(32, '', '', '', 0, '', '', '0'),
(33, '', '', '', 0, '', '', '0'),
(34, '', '', '', 0, '', '', '0'),
(35, '', '', '', 0, '', '', '0'),
(36, 'dfsk', '3323df', 'erere', 4, '', '', '0'),
(37, '', '', '', 0, '', '', '0'),
(38, '', '', '', 0, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '0'),
(39, '', '', '', 0, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '0'),
(40, '', '', '', 0, '', '', '0'),
(41, '', '', '', 0, '', '', '0'),
(42, '', '', '', 0, '', '', '0'),
(43, '', '', '', 0, '', '', '0'),
(44, '', '', '', 0, '', '', '0'),
(45, '', '', '', 0, '', '', '0'),
(46, '', '', '', 0, '', '', '0'),
(47, '', '', '', 0, '', '', '0'),
(48, '', '', '', 0, '', '', '0'),
(49, '', '', '', 0, '', '', '0'),
(50, '', '', '', 0, '', '', '0'),
(51, '', '', '', 0, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '0'),
(52, '', '', '', 0, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '0'),
(53, '', '', '', 0, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '0'),
(54, '', '', '', 0, 0x47757070792d4d616c6179616c616d2d4d6f7669652d506f73746572732d5374696c6c732d496d616765732d50686f746f732d546f76696e6f2d54686f6d61732d5f2d43696e656d6144616464792d312e6a7067, '', '0'),
(55, '', '', '', 0, 0x32303136313232375f3131303434372e6a7067, '', '0'),
(56, '', '', '', 0, 0x32303136313232375f3131303434372e6a7067, '', '0'),
(57, '', '', '', 0, 0x32303136313232375f3131303434372e6a7067, '', '0'),
(58, '', '', '', 0, '', 'Guppy-Malayalam-Movie-Posters-Stills-Images-Photos-Tovino-Thomas-_-CinemaDaddy-1.jpg', '0'),
(59, 'ambui', '2323', 'fdsfkdslfjdf', 2, '', 'karthik.jpg', '0'),
(60, 'rolllambui', '2323', 'fdsfkdslfjdf', 2, '', 'IMAG1821.jpg', '0'),
(61, '', '', '', 0, '', '', '0'),
(62, '', '', '', 0, '', '', '2147483647'),
(63, 'Jaguar FX', 'KL 14 B 1213', 'Beast on the road.!!!', 6, '', 'jaguarfx.jpg', '111145521507383630449'),
(64, 'Premier Padmini', 'KL 14 F 567', 'Short description about my vehicle.', 2, '', 'padmini.jpg', '111145521507383630449'),
(76, 'LeyLand Bus', 'KL 05 G 1214', 'This is a great vehicle. Has lots of seats. JBL Audio system. ', 60, '', 'leyland.jpg', '111145521507383630449'),
(77, 'Jaguar Beast', 'KL 14 F 1414', 'The silent killer for all others on the road..', 4, '', 'jaguarfs.jpg', '111145521507383630449');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
