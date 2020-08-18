-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2018 at 09:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avcproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address_line` tinytext,
  `street` tinytext,
  `city` tinytext,
  `post_code` int(10) DEFAULT NULL,
  `state` tinytext,
  `country` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address_line`, `street`, `city`, `post_code`, `state`, `country`) VALUES
(1, '19', 'Empress Street', 'Sydney', 2220, 'NSW', 'Australia'),
(2, '97', 'Regent Street', 'Kogarah', 2217, 'New South Wales', 'Australia'),
(3, '11', 'Regent Street', 'Kogarah', 2217, 'New South Wales', 'Australia'),
(4, '11', 'Luis', 'Kogarah', 2217, 'New South Wales', 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Sabin Shrestha', 'sabin15', 'sabin15');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_number` bigint(17) NOT NULL,
  `name_on_card` varchar(50) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `cvv` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_number`, `name_on_card`, `expiry_date`, `cvv`) VALUES
(1111111111, 'Prashant Pokhrel', '2018-12-15', 552),
(1234123412341234, 'Joseph Lexendra', '2018-12-01', NULL),
(5674236812431876, 'Harry Chaulagain', '2022-01-01', NULL),
(1111222233334444, 'Killer Clown', '2021-06-02', NULL),
(1234345612345678, 'Manish Pandey', '2020-05-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customer_id`, `item_id`, `quantity`) VALUES
(15, 1, 2),
(15, 3, 1),
(16, 1, 1),
(16, 3, 2),
(17, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `card_number` bigint(16) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `f_name`, `l_name`, `password`, `email`, `mobile`, `address_id`, `card_number`, `gender`) VALUES
(1, 'Prashant', 'Pokhrel', '$5$rounds=5000$blaster$ZJJONno.Bav.ejSMvcU6meTf91Qsyt6ZmEzIbmVx8h0', 'prashant@gmail.com', '0401234567', 1, 1234345612345678, 'male'),
(2, 'Ahmed', 'Sahed', '$5$rounds=5000$blaster$U6LvFHJK3FUAlLsS3aevRgjyVT2JfgUVnDPc2ABDGM5', 'ahmed@gmail.com', '0425874652', 1, 1111111111, 'male'),
(3, 'Sabin', 'Shrestha', '$5$rounds=5000$blaster$U6LvFHJK3FUAlLsS3aevRgjyVT2JfgUVnDPc2ABDGM5', 'sabin15@gmail.com', '9802875461', 1, 1111111111, 'male'),
(4, '', '', '$5$rounds=5000$blaster$N3T4C2o3DxZYmvaNYyRaU4GWvT/3ey2hUjAd0pv74K9', 'prashantpokhrel15@outlook.com', '8611434', NULL, NULL, ''),
(5, 'Bivek', 'Koju', '$5$rounds=5000$blaster$uLOTS1eBIB5gdSATAJD3AxiLZ8c8dFiU2z4jfhBCkZD', 'kojubivek@gmail.com', '0406231331', NULL, NULL, ''),
(6, 'Nischal', 'Maharjan', '$5$rounds=5000$blaster$uLOTS1eBIB5gdSATAJD3AxiLZ8c8dFiU2z4jfhBCkZD', 'nischal15@yahoo.com', '0450364321', NULL, NULL, ''),
(7, 'Tina', 'Hulay', '$5$rounds=5000$blaster$uLOTS1eBIB5gdSATAJD3AxiLZ8c8dFiU2z4jfhBCkZD', 'tina@gmail.com', '0405845745', NULL, NULL, NULL),
(8, 'Meena', 'Shrestha', '$5$rounds=5000$blaster$uLOTS1eBIB5gdSATAJD3AxiLZ8c8dFiU2z4jfhBCkZD', 'meena@gmail.com', '0458745695', NULL, NULL, NULL),
(9, 'Harry', 'Korean', '$5$rounds=5000$blaster$Q0qZ8bc3k2nPAFk646PCiJXcFXaePlCU.QkS4U6NRX3', 'hari@yahoo.com', '0425874215', NULL, NULL, 'male'),
(10, 'Bivek', 'Koju', '$5$rounds=5000$blaster$ZJJONno.Bav.ejSMvcU6meTf91Qsyt6ZmEzIbmVx8h0', 'kojubivek@gmail.com', '0406231331', NULL, NULL, 'male'),
(11, 'Prashant', 'Puri', '$5$rounds=5000$blaster$54L.pQ8oMw7mly7Nb7N.DYdmSlYdry9uT2uBABwegRC', 'prashantpuri@gmail.com', '0487515524', NULL, NULL, 'male'),
(12, 'Rohan', 'Prajapati', '$5$rounds=5000$blaster$lNx2jXQqEBYbhchs9XpTd51i8rDitwEcaGtdliDInh7', 'rohanps@gmail.com', '0452155169', NULL, NULL, 'male'),
(13, 'Daniela', 'Romero', '$5$rounds=5000$blaster$OESf/w/3vy6mhLJa7kOFwlel0v.H4QdkrMD3bnP/ax0', 'romedaniela@gmail.com', '0416455216', NULL, NULL, 'female'),
(14, 'Asif', 'Islam', '$5$rounds=5000$blaster$ZJJONno.Bav.ejSMvcU6meTf91Qsyt6ZmEzIbmVx8h0', 'asif@yahoo.com', '0465138334', NULL, NULL, 'male'),
(15, 'Sabin', 'Shrestha', '$5$rounds=5000$blaster$YaFcSusucfCr9Y8AZLxhgz7x5oM5gx2N91QkWGtq/jB', 'sabinshrestha15@gmail.com', '9843585010', 4, NULL, 'male'),
(16, 'sabin', 'Shrestha', '$5$rounds=5000$blaster$YaFcSusucfCr9Y8AZLxhgz7x5oM5gx2N91QkWGtq/jB', 'sabinshrestha5010@outlook.com', '123456456', NULL, NULL, 'male'),
(17, 'Alex', 'Phillips', '$5$rounds=5000$blaster$4P8Z0NlZxb5kdn7sJAkxVBzXCzC2HFICm50phZy.wj2', 'alex@gmail.com', '9843585010', NULL, NULL, 'male'),
(18, 'Laxman', 'Shrestha', '$5$rounds=5000$blaster$ZJJONno.Bav.ejSMvcU6meTf91Qsyt6ZmEzIbmVx8h0', 'lax@gmail.com', '0408877662', NULL, NULL, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `id` int(11) NOT NULL,
  `approved_id` int(11) DEFAULT NULL,
  `d_status` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_status`
--

INSERT INTO `delivery_status` (`id`, `approved_id`, `d_status`) VALUES
(1, 9, 'SHIPPED');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`customer_id`, `item_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `description`) VALUES
(1, 'leather_jacket', '55.55', 'leather jacket with pocket'),
(3, 'Cotton Pant', '50.50', 'Cool summer cotton pant'),
(4, 'North Face Jacket', '66.00', 'Don\'t fear the rain, revel in the deluge in this weatherproof rain jacket that features a breathable mesh lining and adjustable hood that stows inside the collar.'),
(5, 'Mens Half Pant', '25.00', 'will cotton fabric. Perfect for many occasions such as: camping, hiking, fishing, hunting, travelling, outdoor work, daily casual wear, etc. Premium apparel and goods right to your doorstep.'),
(7, 'Samsung J2', '120.00', 'Very good mobile');

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `receipt_number` text,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`id`, `customer_id`, `item_id`, `quantity`, `receipt_number`, `status`) VALUES
(7, 1, 1, 1, 'SACAS', 'PENDING'),
(8, 1, 3, 3, 'SACAS', 'PENDING'),
(9, 1, 3, 1, 'asklnjfasnklfklasfk', 'APPROVED'),
(10, 1, 3, 1, 'SACAS', 'PENDING'),
(11, 1, 3, 2, 'asklnjfasnklfklasfk', 'PENDING'),
(12, 1, 1, 1, 'jaskjsaklas124345f', 'PENDING'),
(13, 1, 4, 1, 'jaskjsaklas124345f', 'PENDING'),
(14, 1, 1, 8, 'GFGFHJKGJVGHCKJ', 'APPROVED'),
(15, 1, 3, 2, 'GFGFHJKGJVGHCKJ', 'APPROVED'),
(16, 1, 5, 2, 'GFGFHJKGJVGHCKJ', 'APPROVED'),
(17, 1, 3, 1, 'R187YT5R', 'APPROVED'),
(18, 18, 3, 1, 'receiptnu', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `item_id`, `quantity`, `email`) VALUES
(1, 1, 5, 'pras@gmail.com'),
(2, 1, 8, 'prashantpokhrel15@outlook.com'),
(3, 1, 800, 'ramesh@gmail.com'),
(4, 1, 50, 'prashant@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`email`) VALUES
(''),
('harrypotter1@gmail.com'),
('harrypotter@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_number`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`customer_id`,`item_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`customer_id`,`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `delivery_status`
--
ALTER TABLE `delivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
