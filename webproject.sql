-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 01:39 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds_item`
--

CREATE TABLE `adds_item` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(225) NOT NULL,
  `item_price` int(11) NOT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `item_id`, `item_name`, `item_price`, `use_id`) VALUES
(1, 3, 'Game Of Thrones', 550, 5);

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `order_history` BEFORE DELETE ON `cart` FOR EACH ROW INSERT INTO `history_cart`(`item_id`, `item_name`, `item_price`, `use_id`) VALUES (OLD.item_id,OLD.item_name,OLD.item_price,old.use_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `completes`
--

CREATE TABLE `completes` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `request_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `Requester_id` int(11) NOT NULL,
  `Donater_id` int(11) NOT NULL,
  `confirmation` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`request_id`, `item_id`, `Requester_id`, `Donater_id`, `confirmation`) VALUES
(1, 3, 5, 1, NULL),
(2, 3, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fills`
--

CREATE TABLE `fills` (
  `item_id` int(11) NOT NULL,
  `item_qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_cart`
--

CREATE TABLE `history_cart` (
  `history_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(225) NOT NULL,
  `item_price` int(11) NOT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_cart`
--

INSERT INTO `history_cart` (`history_id`, `item_id`, `item_name`, `item_price`, `use_id`) VALUES
(1, 2, 'Sensor', 120, 1),
(2, 9, 'Chisel Marker', 120, 8),
(3, 16, '', 120, 5),
(4, 2, 'Sensor', 120, 5),
(5, 15, '', 180, 5),
(6, 3, 'Game Of Thrones', 550, 5),
(7, 24, 'Rasberry PI', 999, 9),
(8, 8, 'Wood Chisel', 542, 9),
(9, 4, 'Stephan King', 660, 9),
(10, 2, 'Sensor', 120, 9),
(11, 23, '', 899, 9),
(12, 10, '', 20, 9);

-- --------------------------------------------------------

--
-- Table structure for table `history_item`
--

CREATE TABLE `history_item` (
  `history_count` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_img` text NOT NULL,
  `item_desc` varchar(50) NOT NULL,
  `item_price` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_item`
--

INSERT INTO `history_item` (`history_count`, `brand_name`, `item_name`, `item_img`, `item_desc`, `item_price`, `type`, `date`, `s_id`) VALUES
(1, 'Globtek', 'multimeter and powersupply', 'cc.jpeg', 'A power supply and a multimeter', 500, 'Engineering', '2019-11-21', 1),
(2, 'Rasberry PI', 'Rasberry PI', '79f578c2ef5c98c09bc85b69fac1e68e6c5a80aa_raspberry-pi-4-model-b.jpg', 'Good condition', 999, 'Electronics', '2019-11-24', 5),
(3, 'Stanley', 'Wood Chisel', '6-8-10-Wood-Rasp-Steel-File-Carving-Flat-Triangle-Round-Square-Semi-circular-Metal-File.jpg_q50.jpg', 'Good Quality ', 542, 'Stationary', '2019-11-24', 6),
(4, 'Macmillan Publishers', 'Stephan King', 'giphy.gif', 'Fallen in love with it.', 660, 'Books', '2019-11-24', 1),
(5, 'ADXL', 'Sensor', 'ADXL335 (1).png', 'uhdlif', 120, 'Electronics', '2019-11-24', 1),
(6, 'Ardiuno', 'Ardiuno UNO', '4622_large_arduino_uno_main_board.jpg', 'working, one port in not working', 899, 'Electronics', '2019-11-24', 5),
(7, 'SS', 'Scale', '61gmTzEdXdL._SX466_.jpg', 'Im not using it right now want to sell it', 20, 'Stationary', '2019-11-24', 6);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_id` int(10) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `Item_name` varchar(50) NOT NULL,
  `item_img` text NOT NULL,
  `Img_2` text DEFAULT NULL,
  `Img_3` text DEFAULT NULL,
  `Img_4` text DEFAULT NULL,
  `item_desc` varchar(50) NOT NULL,
  `Item_price` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_id`, `brand_name`, `Item_name`, `item_img`, `Img_2`, `Img_3`, `Img_4`, `item_desc`, `Item_price`, `type`, `date`, `s_id`) VALUES
(3, 'Wiley', 'Game Of Thrones', 'got_hc1.jpg', NULL, NULL, NULL, 'A good book must read it', 550, 'Books', '2019-11-22', 1),
(5, 'Macmillan Publishers', 'Spy in the house', 'spy-in-the-house.jpg', NULL, NULL, NULL, 'Must read this book, fallen in love ', 774, 'Books', '2019-11-22', 1),
(6, 'Macmillan Publishers', 'Moon Echoes', 'premade-fantasy-moon-e-book-cover-for-self-published-writers.jpg', NULL, NULL, NULL, 'Good Book', 452, 'Books', '2019-11-22', 5),
(7, 'Macmillan Publishers', 'Set For Life', 'Set For Life 2.jpg', NULL, NULL, NULL, 'Nice Book', 789, 'Books', '2019-11-22', 5),
(9, 'Luxur', 'Chisel Marker', '51K7ilo99YL._SY450_.jpg', NULL, NULL, NULL, 'Not Used', 120, 'Stationary', '2019-11-22', 6),
(11, 'Parker', 'Ink pens', '71OstMj9lnL._SX466_.jpg', NULL, NULL, NULL, 'Good Quality', 852, 'Stationary', '2019-11-22', 6),
(12, 'Varnier Calipers', 'Vernier Calipers', 'images.jpg', NULL, NULL, NULL, 'Not at all used, very good quality', 147, 'Stationary', '2019-11-22', 6),
(13, 'Stanley', 'Hammer', '71tTWyypTKL._SL1500_.jpg', NULL, NULL, NULL, 'Good Quality', 199, 'Tools', '2019-11-22', 6),
(14, 'Local', 'Chisel', '81WlbOttGaL._SL1500_.jpg', NULL, NULL, NULL, 'Very good quality ', 258, 'Tools', '2019-11-22', 6),
(15, 'Stanley', 'Saw', 'download (1).jpg', NULL, NULL, NULL, 'Sharp and good quality', 180, 'Tools', '2019-11-22', 6),
(16, 'Classmates', 'Detailed Knife', 'precision-knife-with-5-blades.jpg', NULL, NULL, NULL, 'Only one blade is used, others are unused', 120, 'Tools', '2019-11-22', 6),
(21, 'Boat', 'Headphone', '61xeIT6UHrL._SL1500_.jpg', NULL, NULL, NULL, 'Good Quality', 512, 'Electronics', '2019-11-22', 5),
(22, 'Sony', 'BT Speaker', '6338022cv11d.jpg', NULL, NULL, NULL, 'Very good sound quality, condition is also good.', 999, 'Electronics', '2019-11-22', 5);

--
-- Triggers `items`
--
DELIMITER $$
CREATE TRIGGER `history_sold_items` BEFORE DELETE ON `items` FOR EACH ROW INSERT INTO `history_item`(`brand_name`, `item_name`, `item_img`, `item_desc`, `item_price`, `type`, `date`, `s_id`) VALUES (OLD.brand_name,OLD.item_name,OLD.item_img,OLD.item_desc,OLD.item_price,OLD.type,CURRENT_DATE(),OLD.s_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` int(20) NOT NULL,
  `Payment_amt` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `Us_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Email` varchar(225) NOT NULL,
  `P_number` bigint(25) NOT NULL,
  `passsword` varchar(20) NOT NULL,
  `wallet` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Fname`, `Lname`, `Email`, `P_number`, `passsword`, `wallet`, `type`) VALUES
(1, 'Atul', 'Choudhary', 'csda@gma.com', 999999999, '@A12345678', 1000120, NULL),
(5, 'Abhinav', 'Singh', 'abhi@gmail.com', 7412589632, '@A12345678', 1899, NULL),
(6, 'jayant', 'choudhary', 'jayant@gmail.com', 7412589633, '@A12345678', 1020, NULL),
(9, 'Aditya', 'Sharma', 'aditya.sharma@avantika.edu.in', 6263276242, 'Aditya@123456', 998301, 'Admin'),
(10, 'Jayant', 'Choudhary', 'jayant.choudhary@avantika.edu.in', 6263633271, 'Jayant@123456', 1000000, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `User_cart` (`use_id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_user_id` (`Requester_id`),
  ADD KEY `donater_user_id` (`Donater_id`);

--
-- Indexes for table `history_cart`
--
ALTER TABLE `history_cart`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `history_item`
--
ALTER TABLE `history_item`
  ADD PRIMARY KEY (`history_count`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_id`),
  ADD KEY `user_foreign` (`s_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `payment_user_id` (`Us_id`),
  ADD KEY `fk_seller_id` (`seller_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `P_number` (`P_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history_cart`
--
ALTER TABLE `history_cart`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history_item`
--
ALTER TABLE `history_item`
  MODIFY `history_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `User_cart` FOREIGN KEY (`use_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `donate`
--
ALTER TABLE `donate`
  ADD CONSTRAINT `donater_user_id` FOREIGN KEY (`Donater_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_user_id` FOREIGN KEY (`Requester_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `user_foreign` FOREIGN KEY (`s_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_seller_id` FOREIGN KEY (`seller_id`) REFERENCES `items` (`s_id`),
  ADD CONSTRAINT `payment_user_id` FOREIGN KEY (`Us_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
