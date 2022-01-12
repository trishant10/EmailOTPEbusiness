-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 10:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_otp_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `otpstore`
--

CREATE TABLE `otpstore` (
  `otp` varchar(10) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `id` int(12) NOT NULL,
  `newid` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otpstore`
--

INSERT INTO `otpstore` (`otp`, `is_expired`, `create_at`, `id`, `newid`) VALUES
('ETH5X0', 1, '2020-12-22 08:31:39', 145, 0),
('FBL9XC', 1, '2020-12-22 08:32:06', 146, 0),
('6RMT50', 0, '2020-12-22 08:33:05', 147, 0),
('p1AGv2', 1, '2020-12-22 08:40:15', 148, 0),
('lXYgQu', 1, '2020-12-22 08:40:31', 149, 0),
('khmsMT', 1, '2020-12-22 08:41:26', 150, 0),
('PNMXCI', 1, '2020-12-22 08:41:38', 151, 0),
('oKae4s', 1, '2020-12-22 09:33:30', 152, 0),
('nEH5xj', 1, '2020-12-22 09:40:13', 153, 0),
('aOXcuh', 1, '2020-12-22 09:40:58', 154, 0),
('LcTD6a', 1, '2020-12-22 09:41:37', 155, 0),
('DycYug', 1, '2020-12-22 09:43:46', 156, 0),
('h38Nry', 1, '2020-12-22 09:50:21', 157, 0),
('GTMg3A', 1, '2020-12-22 09:51:04', 158, 0),
('5dhWbK', 1, '2020-12-22 09:52:30', 159, 0),
('Ij2nrf', 1, '2020-12-22 10:04:18', 160, 0),
('Ox7UPY', 1, '2020-12-22 10:10:16', 161, 0),
('p4zA1l', 1, '2020-12-22 10:13:16', 162, 0),
('RvH4bg', 1, '2020-12-22 10:14:41', 163, 0),
('eaMJVd', 1, '2020-12-22 10:15:34', 164, 0),
('SjVGIx', 1, '2020-12-22 12:10:44', 165, 0),
('c9aye3', 1, '2020-12-22 12:14:32', 166, 0),
('egAQWu', 1, '2020-12-22 12:19:00', 167, 0),
('8DzBK6', 1, '2020-12-22 12:19:57', 168, 0),
('MFIXqo', 1, '2020-12-22 12:21:32', 169, 0),
('x1HpYX', 1, '2020-12-22 12:22:14', 170, 0),
('xVB40j', 1, '2020-12-22 12:23:42', 171, 0),
('uj63HB', 1, '2020-12-22 12:53:09', 172, 0),
('NlfcGt', 1, '2020-12-22 13:00:44', 173, 0),
('0eon4b', 1, '2020-12-22 13:01:56', 174, 0),
('KpSLIl', 1, '2020-12-22 13:02:56', 175, 0),
('RbQJHL', 1, '2020-12-22 13:05:08', 176, 0),
('4PTbM8', 1, '2020-12-22 13:07:48', 177, 0),
('IUVTot', 1, '2020-12-22 13:13:50', 178, 0),
('loOYT2', 1, '2020-12-22 13:19:46', 179, 0),
('OoCNhJ', 1, '2020-12-22 13:48:28', 180, 0),
('lbIyR7', 1, '2020-12-22 13:50:06', 181, 0),
('mUQuGa', 1, '2020-12-22 13:51:27', 182, 0),
('1AaTod', 1, '2020-12-22 13:58:16', 183, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `register_user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_datetime`) VALUES
(59, 'Trishant', 'trishantsthapit10@gmail.com', '$2y$10$oR5YPXw4LtjadvLg07LNhu6lP4D6vKlpertQVQzBv3/TGOG7ur6BW', '2020-12-22 08:14:52'),
(84, 'Sabin Poudel', 'poudel_sabin@hotmail.com', '$2y$10$vnv4ndLzLsnBIhwKbXj9VeY8Xr6CB6qwqRlEtSIWiFDQABG3h8.pq', '2020-12-22 04:23:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otpstore`
--
ALTER TABLE `otpstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`register_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otpstore`
--
ALTER TABLE `otpstore`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
