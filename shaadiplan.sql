-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 01:03 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shaadiplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(15) NOT NULL,
  `pin` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pin`) VALUES
('prateeklndubey', '847719ad4f75f65281a7ba580118a988');

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `id` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bride` varchar(15) NOT NULL,
  `groom` varchar(15) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `occasion` date NOT NULL,
  `image` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`id`, `email`, `bride`, `groom`, `venue`, `occasion`, `image`) VALUES
('baadev2703', 'prateeklndubey@gmail.com', 'Devsena', 'Baahubali', 'Umaid Bhawan Palace, Circuit House Rd, Cantt Area, Jodhpur, Rajasthan 342006', '2018-03-27', '31041.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `vendor` varchar(30) DEFAULT NULL,
  `client` varchar(30) DEFAULT NULL,
  `over` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `vendor`, `client`, `over`) VALUES
(10, 'aaojikhaaoji@gmail.com', 'prateeklndubey@gmail.com', 0),
(11, 'aaojikhaaoji@gmail.com', 'aliabhatt@hotmail.com', 0),
(12, 'mitradipress@gmail.com', 'aliabhatt@hotmail.com', 0),
(13, 'letsnaacho@gmail.com', 'aliabhatt@hotmail.com', 0),
(14, 'aaojikhaaoji@gmail.com', 'rahulgandhi@inc.com', 0),
(15, 'aaojikhaaoji@gmail.com', 'salmankhan@beinghuman.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `sex` varchar(4) NOT NULL,
  `pin` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `city`, `phone`, `sex`, `pin`) VALUES
('Shaadi', 'Plan', 'admin@shaadiplan.com', 'Indore', '9202245058', 'Girl', '847719ad4f75f65281a7ba580118a988'),
('Alia', 'Bhat', 'aliabhatt@hotmail.com', 'Mumbai', '8819291101', 'Girl', '847719ad4f75f65281a7ba580118a988'),
('Prateek', 'Dubey', 'prateeklndubey@gmail.com', 'Indore', '8827393032', 'Boy', '847719ad4f75f65281a7ba580118a988'),
('Rahul', 'Gandhi', 'rahulgandhi@inc.com', 'Delhi', '77128391', 'Boy', '847719ad4f75f65281a7ba580118a988'),
('Salman', 'Khan', 'salmankhan@beinghuman.com', 'Mumbai', '7719292991', 'Boy', '847719ad4f75f65281a7ba580118a988');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `approve` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pin` varchar(35) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `city` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `intro` text NOT NULL,
  `experience` date NOT NULL,
  `projects` int(4) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` varchar(9) NOT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `price` int(6) NOT NULL,
  `booking` int(3) NOT NULL,
  `event` int(3) NOT NULL,
  `delivery` int(3) NOT NULL,
  `cancel` text NOT NULL,
  `travel` tinyint(1) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`approve`, `name`, `id`, `email`, `pin`, `phone`, `city`, `category`, `intro`, `experience`, `projects`, `owner`, `address`, `pincode`, `facebook`, `url`, `price`, `booking`, `event`, `delivery`, `cancel`, `travel`, `rating`) VALUES
(1, 'Aaoji Khaaoji', 'aaojikhaaoji', 'aaojikhaaoji@gmail.com', '847719ad4f75f65281a7ba580118a988', '23392020', 'Delhi', 'Catering', 'We make people smile through food.', '2011-03-29', 192, 'Arvind Kejriwal', '3rd level, Delhi Secretariat, I.P. Estate', '110002', '', '', 300, 10, 40, 50, 'Before 2 weeks, return = 100%\r\nWithin 2 weeks, return = 80%\r\nWithin 1 week, return = 60%', 0, 2),
(2, 'Shaadiplan', '', 'admin@shaadiplan.com', '847719AD4F75F65281A7BA580118A988', '9202245058', 'Indore', 'Manager', 'We make your wedding day the biggest day of your life.', '1997-09-08', 132, 'Prateek Dubey', '124, Sagar Vihar Colony MR-10 Sq., Sukhliya', '452010', 'shaadiplan', 'https://www.shaadiplan.co', 100000, 10, 40, 50, 'Before 2 weeks, return = 100%\r\nWithin 2 weeks, return = 80%\r\nwithin 1 week, return = 50%', 1, 5),
(1, 'Ek Sau Tikka', 'eksautikka', 'eksautikka@hotmail.com', '847719ad4f75f65281a7ba580118a988', '23491127', 'Delhi', 'Catering', 'Galons of calories just for you.', '2013-04-21', 141, 'Sonia Gandhi', '10, Janpath,New Delhi', '110011', '', '', 800, 20, 70, 10, 'Before 2 weeks, return = 100%\r\nWithin 2 weeks, return = 70%\r\nWithin 1 week, return = 50%', 0, 4),
(1, 'Khana Khazana', 'khanakhazana', 'khanakhazana@hotmail.com', '847719ad4f75f65281a7ba580118a988', '23491127', 'Delhi', 'Catering', 'Galons of calories just for you.', '2014-08-16', 127, 'Sonia Gandhi', '10, Janpath,New Delhi', '110011', '', '', 1000, 20, 70, 10, 'Before 2 weeks, return = 100%\r\nWithin 2 weeks, return = 70%\r\nWithin 1 week, return = 50%', 1, 3),
(1, 'Lets Naacho', 'letsnaacho', 'letsnaacho@gmail.com', '847719ad4f75f65281a7ba580118a988', '9811399777', 'Patiala', 'Choreography', 'We make people laugh out loud (LOLZZZ) through the magic of dance.', '2015-10-14', 111, 'Amarinder Singh', 'H. No. 1669, New Moti Bagh Colony', '147001', 'letsnaacho', '', 900, 10, 50, 40, 'Before 2 weeks return = 100%\r\nWithin 2 weeks return = 50%', 0, 4),
(1, 'Mitra Di Press', 'mitradipress', 'mitradipress@gmail.com', '847719ad4f75f65281a7ba580118a988', '23012312', 'Delhi', 'Invitation', 'We write our hearts out in the love of our clients.', '2014-05-16', 384, 'Narendra Modi', '7, Lok Kalyan Marg', '110006', 'mitradipress', '', 560, 10, 40, 50, 'Return will be 50% if cancelled ', 1, 5),
(1, 'Oh Dekho!', 'ohdekho', 'ohdekho@hotmail.com', '847719ad4f75f65281a7ba580118a988', '22145555', 'Kolkata', 'Photography', 'We capture the beautiful moments of your life.', '2005-06-14', 193, 'Mamata Banerjee', 'NABANNA (14th Floor) 325, Sarat Chatterjee Road, Shibpur, Howrah', '711102', '', '', 500, 20, 50, 30, 'return 100% before 2 weeks,\r\nreturn 90% within 2 weeks,\r\nreturn 60%  within 1 week', 1, 1),
(1, 'Yum Raj', 'yumraj', 'yumraj@gmail.com', '847719ad4f75f65281a7ba580118a988', '23491127', 'Delhi', 'Catering', 'Galons of calories just for you.', '2016-11-19', 83, 'Sonia Gandhi', '10, Janpath,New Delhi', '110011', '', '', 600, 20, 70, 10, 'Before 2 weeks, return = 100%\r\nWithin 2 weeks, return = 70%\r\nWithin 1 week, return = 50%', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vimage`
--

CREATE TABLE `vimage` (
  `image` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vimage`
--

INSERT INTO `vimage` (`image`, `email`) VALUES
('10486.jpg', 'ohdekho@hotmail.com'),
('10762.jpg', 'aaojikhaaoji@gmail.com'),
('11247.jpg', 'letsnaacho@yahoo.com'),
('11605.jpg', 'mitradipress@gmail.com'),
('12643.jpg', 'letsnaacho@gmail.com'),
('14076.jpg', 'letsnaacho@yahoo.com'),
('17869.jpeg', 'ohdekho@hotmail.com'),
('19454.jpg', 'aaojikhaaoji@gmail.com'),
('20571.jpg', 'mitradipress@gmail.com'),
('24194.jpg', 'ohdekho@hotmail.com'),
('24420.jpeg', 'ohdekho@hotmail.com'),
('24782.jpg', 'letsnaacho@yahoo.com'),
('24928.jpg', 'letsnaacho@gmail.com'),
('24965.jpg', 'letsnaacho@yahoo.com'),
('25450.jpg', 'mitradipress@gmail.com'),
('26137.jpg', 'letsnaacho@gmail.com'),
('27253.jpg', 'aaojikhaaoji@gmail.com'),
('28511.jpg', 'aaojikhaaoji@gmail.com'),
('32575.jpg', 'mitradipress@gmail.com'),
('3500.jpg', 'aaojikhaaoji@gmail.com'),
('4108.jpg', 'mitradipress@gmail.com'),
('5367.jpeg', 'ohdekho@hotmail.com'),
('5405.jpg', 'letsnaacho@gmail.com'),
('6644.jpg', 'letsnaacho@gmail.com'),
('8440.jpg', 'mitradipress@gmail.com'),
('8593.jpg', 'ohdekho@hotmail.com'),
('8827.jpg', 'aaojikhaaoji@gmail.com'),
('914.jpg', 'letsnaacho@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `vimage`
--
ALTER TABLE `vimage`
  ADD PRIMARY KEY (`image`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
