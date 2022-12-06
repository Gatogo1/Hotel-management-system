-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2022 at 04:23 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thekambh_hotel_billing1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `role_id` int NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `role_id`, `delete_status`) VALUES
(1, 'admin', 'boyamg32@gmail.com', 'gatogo', 'Daniel', 'Gatogo', 'Male', '2011-05-02', '0987654321', 'Nashik', '6A139586-4CBD-4E1F-8C71-CF0E389BC02B.jpeg', '2018-04-30', 1, 0),
(2, 'user', 'disha@gmail.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'Disha', 'Patel', 'Female', '', '9090909090', '199 chennakeshava temple street chikkabanavara', '875623075e2eccc2bb979.png', '2020-09-21', 2, 1),
(3, 'user', 'info@hotel.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'Mayur', 'Joshi', 'Male', '', '9876543210', '199 chennakeshava temple street chikkabanavara\r\nsad', '875623075e2eccc2bb979.png', '2020-09-21', 4, 1),
(5, 'user', 'pierre@test.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'Pierre', 'Kandolo', 'Male', '', '2438325669', 'Kindu maniema', 'IMG-20201019-WA0039.jpg', '2020-10-19', 4, 1),
(6, 'user', 'theres@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Therese', 'Kandolo', 'Female', '', '2438523665', 'Kindu', '', '2020-10-21', 6, 1),
(7, 'user', 'teresa@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Ther', 'Teresa', 'Female', '', '2453668888', 'Kindu', '', '2020-10-21', 7, 1),
(8, 'user', 'amit@test.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'Amit', 'Kumar', 'Male', '', '1010101010', 'Nashik', '70520.png', '2020-10-29', 9, 1),
(9, 'user', 'akash@gmail.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'Akash', 'Ahire', 'Male', '', '1010101010', 'Indira nagar, Nashik.', '70520.png', '2020-10-29', 10, 1),
(10, 'user', 'tranhuuhoangminh@gmail.com', '355d7280fcfa33f1e9fa777c546501bb91140db41cb352526251e109a169d72d', 'minh Huu', 'Tran', 'Male', '', '4905281727', '356/19 NgÅ© HÃ nh sÆ¡n', '', '2021-03-30', 2, 1),
(11, 'user', 'roshan@gmail.com', '5da8b90937feb25976a4d85f57eac16d8959c0d95ff22b6b3d7b25bb8a44a100', 'roshan', 'bankar', 'Male', '', '9009090909', 'nashik', '', '2021-04-16', 11, 1),
(12, 'user', 'newuser@gmail.com', '6587dbec81b8bfce862a6591b93e17c2d9aa21e4f53db6ed0df463195002bc4f', 'newuser', 'newuser', 'Female', '', '1234567890', 'fkjefw', '', '2021-04-16', 14, 1),
(13, 'user', 'updateduser@gmail.com', '1a6d11781c4472d8fda0d72598aae6a5736bc54c273798cc893f3d6fe5df9929', 'updateduser', 'updateduser', 'Female', '', '1234567890', 'updateduser', '', '2021-04-16', 14, 1),
(14, 'user', 'newadminnew@gmail.com', '85bf0608436e667b79b9ac973aabb978e0e6fa2d44ed4b9e9cea3291977bc092', 'newadminnew', 'newadminnew', 'Female', '', '1234567890', 'newadminnew', '', '2021-04-16', 12, 1),
(15, 'user', 'updated@gmail.com', 'a4448b4b64f1c65e7e2a8ef767bc15b666833ba5b0c2b330428a9e64b9749682', 'updated', 'updated', 'Female', '', '1234567890', 'updated', '', '2021-04-16', 16, 1),
(16, 'user', 'newupdateduser@gmail.com', '9a87fce8a19a2e00f2960a7bece4259fa5284bca705fac511106ab23f7a85c50', 'newupdateduser', 'newupdateduser', 'Female', '', '1234567890', 'newupdateduser', '', '2021-04-17', 17, 1),
(17, 'user', 'newuser@gmail.com', '6587dbec81b8bfce862a6591b93e17c2d9aa21e4f53db6ed0df463195002bc4f', 'newuser', 'newuser', 'Female', '', '1234567890', 'newuser', '', '2021-04-21', 12, 1),
(18, 'user', 'etiennehaba1@gmail.com', 'dc94385b9a5edc752f02010d8a5203fdd0dcfeb76812f38a912a4faeb81038c7', 'etienne', 'habakubaho', 'Male', '', '9999999999', 'kigali/rwanda', '1466125.png', '2021-12-08', 13, 1),
(19, 'user', 'dsoftdipo@gmail.com', '86abb32d72a6612a716382b3c999a68b2664a31b1304cca6f22d5e8ff9420824', 'Oladipo', 'Ola', 'Male', '', '9423979339', 'lagos', '', '2021-12-14', 2, 1),
(20, 'user', 'ishwari@gmail.com', '819bd38e6d7b8642a800d8920e151fc0dfb83976675f6b33b52957b70ddfd425', 'ishwari', 's', 'Female', '', '9090909090', 'nashik', '', '2021-12-29', 15, 1),
(21, 'user', 'vrgup2000@gmail.com', '86abb32d72a6612a716382b3c999a68b2664a31b1304cca6f22d5e8ff9420824', 'test123', 'test', 'Male', '', '7988405385', '', '', '2022-03-09', 16, 1),
(22, 'user', 'admin@gmail.com', '2f8fac8938054205bfb3c590b394c2c0ec8bf863094cb6aad02f5367d435ce1d', 'Daniel', 'Gatogo', 'Male', '', '1111111111', 'accra new town', '20220623153301_IMG_3911.JPG', '2022-06-27', 2, 1),
(23, 'user', 'reception@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Princess', 'Adane', 'Female', '', '', 'Shashemene ', '', '2022-07-01', 2, 0),
(24, 'user', 'princessadane@gmail.com', 'b7f58c20cb66146056c150d7ed1fa2a341b906ad64da6b668c7765aeadf00eaa', 'Princess', 'Adane', 'Female', '', '2205935970', 'Awoshie Last Stop', '', '2022-10-20', 2, 0),
(25, 'user', 'imbhanubista@gmail.com', '86abb32d72a6612a716382b3c999a68b2664a31b1304cca6f22d5e8ff9420824', 'BhanuBhakta', 'Bista', 'Male', '', '9823583204', 'Kathmandu Nepal', 'IMG_20221006_084828.jpg', '2022-12-05', 9, 1),
(26, 'user', '', '241992a37c6a7a7044edca190836547108001676d2f586efa0f1923da5372454', '', '', '', '', '', '', '', '2022-12-05', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `category`, `item_name`, `price`, `description`, `status`, `delete_status`) VALUES
(1, 'Beer', 'Kingfisher beer', 200.00, 'A fully matured beer with an exceptional clarity, and has a pleasantly bitter taste.', 0, 0),
(2, 'Wine', 'Red wine', 10000.00, 'Red wine made from dark colored grapes varieties', 0, 0),
(3, 'COLD DRINK', 'Tusker lager', 600.00, 'tusker lager rtd', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drinks_invoice`
--

CREATE TABLE `drinks_invoice` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(150) NOT NULL,
  `cust_contact` varchar(15) NOT NULL,
  `cust_address` varchar(250) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drinks_invoice`
--

INSERT INTO `drinks_invoice` (`id`, `room_id`, `cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_address`, `total_amount`, `added_date`, `delete_status`) VALUES
(1, 1, 1, 'Kunal', 'kunal@test.com', '1231231231', 'Nashik, maharashtra', 200.00, '2020-10-29', 0),
(2, 2, 2, 'Ganesh', 'ganesh@test.com', '2020202020', 'M.G road Nashik', 1400.00, '2020-10-29', 0),
(3, 0, 0, 'haba', 'eetieh@gmail.com', '9090909090909', 'kigali', 5600.00, '2021-12-08', 0),
(4, 1, 1, 'Kunal', 'kunal@test.com', '1231231231', 'Nashik, maharashtra', 1000.00, '2022-01-22', 0),
(5, 3, 5, 'Giri', 'giri@gmail.com', '8891024365', 'ghvbk', 2000.00, '2022-01-22', 0),
(6, 1, 2, 'Ganesh', 'ganesh@test.com', '2020202020', 'M.G road Nashik', 2000.00, '2022-01-25', 0),
(7, 5, 8, 'Ø¬Ù‡Ø§Ø¯ ÙÙŠØµÙ„ Ø§Ù„Ø²ÙˆÙ‚Ø±ÙŠ', 'alnahariabdullah@gmail.com', '3333333333', 'sanaa', 1800.00, '2022-02-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drinks_invoice_items`
--

CREATE TABLE `drinks_invoice_items` (
  `id` int NOT NULL,
  `drinks_invoice_id` int NOT NULL,
  `drink_id` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `subtotal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drinks_invoice_items`
--

INSERT INTO `drinks_invoice_items` (`id`, `drinks_invoice_id`, `drink_id`, `price`, `qty`, `subtotal`) VALUES
(1, 1, 1, 200.00, '1', 200.00),
(2, 2, 1, 200.00, '2', 400.00),
(3, 2, 2, 1000.00, '1', 1000.00),
(4, 3, 2, 1000.00, '5', 5000.00),
(5, 3, 3, 600.00, '1', 600.00),
(6, 4, 2, 1000.00, '1', 1000.00),
(7, 5, 2, 1000.00, '2', 2000.00),
(8, 6, 1, 200.00, '5', 1000.00),
(9, 6, 2, 1000.00, '1', 1000.00),
(10, 7, 3, 600.00, '1', 600.00),
(11, 7, 2, 1000.00, '1', 1000.00),
(12, 7, 1, 200.00, '1', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `drinks_invoice_payments`
--

CREATE TABLE `drinks_invoice_payments` (
  `id` int NOT NULL,
  `drinks_invoice_id` int NOT NULL,
  `amount` double(10,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `note` varchar(300) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drinks_invoice_payments`
--

INSERT INTO `drinks_invoice_payments` (`id`, `drinks_invoice_id`, `amount`, `type`, `note`, `added_date`, `delete_status`) VALUES
(1, 1, 100.00, 'credit', 'drink payment', '2020-10-29', 0),
(2, 2, 1000.00, 'credit', 'Drinks Payment', '2020-10-29', 0),
(3, 3, 5000.00, 'credit', 'ok', '2021-12-08', 0),
(4, 1, 100.00, 'Cash', 'Bar', '2022-01-22', 0),
(5, 6, 2000.00, 'Cash', 'Bar', '2022-01-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL,
  `fax_no` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`id`, `hotel_name`, `address`, `logo`, `city`, `zip_code`, `phone_no`, `login_logo`, `invoice_logo`, `background_login_image`, `fax_no`, `email`) VALUES
(1, 'THE KAMB HOTEL', 'Accra Ghana awoshie', '', 'Ghana', '+233', '+233540948579', 'images.jpg', '', 'images.jpg', '9423979339', 'thekambhotel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `plats`
--

CREATE TABLE `plats` (
  `id` int NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `plats`
--

INSERT INTO `plats` (`id`, `category`, `item_name`, `price`, `description`, `status`, `delete_status`) VALUES
(1, 'Chinese food', 'Veg Haka Noodles', 90.00, 'Veg Haka noodles with dry fired noodles', 0, 0),
(2, 'Non-veg', 'Chicken Curry', 250.00, 'Chicken curry with bread and rice', 0, 0),
(3, 'Veg', 'Daal', 100.00, 'Arahar Daal', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plats_invoice`
--

CREATE TABLE `plats_invoice` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(150) NOT NULL,
  `cust_contact` varchar(15) NOT NULL,
  `cust_address` varchar(250) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plats_invoice`
--

INSERT INTO `plats_invoice` (`id`, `room_id`, `cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_address`, `total_amount`, `added_date`, `delete_status`) VALUES
(1, 1, 0, 'Kunal', 'kunal@test.com', '1010101010', 'Nashik, maharashtra', 520.00, '2020-10-29', 0),
(2, 2, 2, 'Ganesh', 'ganesh@test.com', '2020202020', 'M.G road Nashik', 340.00, '2020-10-29', 0),
(3, 1, 4, 'Joy roy', 'abcd@gmail.com', '1566666666', 'wqewqqwsd', 340.00, '2021-09-07', 0),
(4, 3, 5, 'Giri', 'giri@gmail.com', '8891024365', 'ghvbk', 90.00, '2021-09-07', 0),
(5, 1, 1, 'Kunal', 'kunal@test.com', '1231231231', 'Nashik, maharashtra', 250.00, '2022-01-22', 0),
(6, 1, 2, 'Ganesh', 'ganesh@test.com', '2020202020', 'M.G road Nashik', 90.00, '2022-01-25', 0),
(7, 6, 9, 'Vivek Gupta', 'vrgup2000@gmail.com', '7988405385', 'Lucknow', 470.00, '2022-03-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plats_invoice_items`
--

CREATE TABLE `plats_invoice_items` (
  `id` int NOT NULL,
  `plats_invoice_id` int NOT NULL,
  `plats_id` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `subtotal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plats_invoice_items`
--

INSERT INTO `plats_invoice_items` (`id`, `plats_invoice_id`, `plats_id`, `price`, `qty`, `subtotal`) VALUES
(2, 2, 1, 90.00, '1', 90.00),
(3, 2, 2, 250.00, '1', 250.00),
(4, 1, 1, 90.00, '3', 270.00),
(5, 1, 2, 250.00, '1', 250.00),
(6, 3, 1, 90.00, '1', 90.00),
(7, 3, 2, 250.00, '1', 250.00),
(8, 4, 1, 90.00, '1', 90.00),
(9, 5, 2, 250.00, '1', 250.00),
(10, 6, 1, 90.00, '1', 90.00),
(11, 7, 3, 100.00, '2', 200.00),
(12, 7, 1, 90.00, '3', 270.00);

-- --------------------------------------------------------

--
-- Table structure for table `plats_invoice_payments`
--

CREATE TABLE `plats_invoice_payments` (
  `id` int NOT NULL,
  `plats_invoice_id` int NOT NULL,
  `amount` double(10,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `note` varchar(300) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plats_invoice_payments`
--

INSERT INTO `plats_invoice_payments` (`id`, `plats_invoice_id`, `amount`, `type`, `note`, `added_date`, `delete_status`) VALUES
(1, 1, 180.00, 'credit', 'food payment', '2020-10-29', 0),
(2, 2, 340.00, 'credit', 'Food payment', '2020-10-29', 0),
(3, 5, 250.00, 'Cash', ' Food', '2022-01-22', 0),
(4, 1, 340.00, 'credit', 'full paymen', '2022-07-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pool`
--

CREATE TABLE `pool` (
  `id` int NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `item_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `pool`
--

INSERT INTO `pool` (`id`, `category`, `item_name`, `price`, `description`, `status`, `delete_status`) VALUES
(4, 'Gold', 'Pool 1', 350.00, 'for one hour use only', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pool_invoice`
--

CREATE TABLE `pool_invoice` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(150) NOT NULL,
  `cust_contact` varchar(15) NOT NULL,
  `cust_address` varchar(250) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pool_invoice`
--

INSERT INTO `pool_invoice` (`id`, `room_id`, `cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_address`, `total_amount`, `added_date`, `delete_status`) VALUES
(1, 1, 1, 'Mahesh', 'kunal@test.com', '1231231231', 'Nashik, maharashtra', 200.00, '2020-10-29', 0),
(2, 2, 2, 'Ganesh', 'ganesh@test.com', '2020202020', 'M.G road Nashik', 1400.00, '2020-10-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pool_invoice_items`
--

CREATE TABLE `pool_invoice_items` (
  `id` int NOT NULL,
  `pool_invoice_id` int NOT NULL,
  `drink_id` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `subtotal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pool_invoice_items`
--

INSERT INTO `pool_invoice_items` (`id`, `pool_invoice_id`, `drink_id`, `price`, `qty`, `subtotal`) VALUES
(1, 1, 1, 200.00, '1', 200.00),
(2, 2, 1, 200.00, '2', 400.00),
(3, 2, 2, 1000.00, '1', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pool_invoice_payments`
--

CREATE TABLE `pool_invoice_payments` (
  `id` int NOT NULL,
  `pool_invoice_id` int NOT NULL,
  `amount` double(10,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `note` varchar(300) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pool_invoice_payments`
--

INSERT INTO `pool_invoice_payments` (`id`, `pool_invoice_id`, `amount`, `type`, `note`, `added_date`, `delete_status`) VALUES
(1, 1, 100.00, 'credit', 'drink payment', '2020-10-29', 0),
(2, 2, 1000.00, 'credit', 'pool Payment', '2020-10-29', 0),
(3, 1, 100.00, 'credit', 'full paymen', '2022-07-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int NOT NULL,
  `name` varchar(500) NOT NULL,
  `roomname` varchar(500) NOT NULL,
  `kidno` int NOT NULL,
  `adultno` int NOT NULL,
  `fromdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  `taxamount` int NOT NULL,
  `totalamount` int NOT NULL,
  `paid` int NOT NULL,
  `created_date` date NOT NULL,
  `tax_id` int NOT NULL,
  `status` tinyint NOT NULL COMMENT '0:Occupy,1:Release'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `name`, `roomname`, `kidno`, `adultno`, `fromdate`, `todate`, `taxamount`, `totalamount`, `paid`, `created_date`, `tax_id`, `status`) VALUES
(41, '4', '7', 0, 2, '2022-07-12 00:00:00', '2022-07-13 00:00:00', 1370, 1000, 0, '2022-07-04', 1, 0),
(42, '10', '7', 0, 1, '2022-07-14 00:00:00', '2022-07-15 00:00:00', 685, 500, 0, '2022-07-04', 1, 0),
(43, '13', '8', 0, 1, '2022-10-09 00:00:00', '2022-10-09 00:00:00', 274, 200, 0, '2022-10-21', 1, 0),
(44, '14', '8', 0, 1, '2022-10-17 00:00:00', '2022-10-17 00:00:00', 274, 200, 0, '2022-10-21', 1, 0),
(45, '15', '8', 0, 2, '2022-10-15 00:00:00', '2022-10-15 00:00:00', 274, 200, 0, '2022-10-21', 1, 0),
(46, '16', '10', 0, 2, '2022-10-15 00:00:00', '2022-10-15 00:00:00', 411, 300, 0, '2022-10-21', 1, 0),
(48, '18', '14', 0, 1, '2022-10-02 00:00:00', '2022-10-02 00:00:00', 822, 600, 0, '2022-10-21', 1, 0),
(49, '19', '13', 0, 1, '2022-10-01 00:00:00', '2022-10-01 00:00:00', 411, 300, 0, '2022-10-21', 1, 0),
(50, '20', '13', 0, 1, '2022-10-06 00:00:00', '2022-10-06 00:00:00', 411, 300, 0, '2022-10-21', 1, 0),
(51, '21', '13', 0, 1, '2022-09-30 00:00:00', '2022-09-30 00:00:00', 411, 300, 0, '2022-10-21', 1, 0),
(52, '22', '8', 0, 1, '2022-09-30 00:00:00', '2022-09-30 00:00:00', 548, 400, 0, '2022-10-21', 1, 0),
(53, '23', '14', 0, 1, '2022-09-30 00:00:00', '2022-09-30 00:00:00', 822, 600, 0, '2022-10-21', 1, 0),
(54, '24', '20', 0, 1, '2022-10-05 00:00:00', '2022-10-07 00:00:00', 1439, 1050, 0, '2022-10-21', 1, 0),
(55, '25', '16', 0, 1, '2022-10-11 00:00:00', '2022-10-11 00:00:00', 822, 600, 0, '2022-10-21', 1, 0),
(56, '26', '16', 0, 1, '2022-11-04 00:00:00', '2022-11-04 00:00:00', 822, 600, 0, '2022-11-05', 1, 0),
(57, '27', '8', 0, 1, '2022-11-12 00:00:00', '2022-11-12 00:00:00', 548, 400, 0, '2022-11-12', 1, 0),
(58, '28', '13', 0, 1, '2022-11-12 00:00:00', '2022-11-12 00:00:00', 411, 300, 0, '2022-11-12', 1, 0),
(59, '29', '16', 0, 1, '2022-11-11 00:00:00', '2022-11-11 00:00:00', 822, 600, 0, '2022-11-12', 1, 0),
(60, '29', '8', 1, 1, '2022-12-10 00:00:00', '2022-12-10 00:00:00', 548, 400, 0, '2022-12-05', 1, 0),
(61, '26', '18', 3, 6, '2022-12-15 00:00:00', '2022-12-30 00:00:00', 13152, 9600, 0, '2022-12-05', 1, 0),
(62, '1', '11', 0, 2, '2022-12-05 00:00:00', '2022-12-07 00:00:00', 2466, 1800, 0, '2022-12-05', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_dates`
--

CREATE TABLE `tbl_booking_dates` (
  `id` int NOT NULL,
  `booking_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `roomname` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_booking_dates`
--

INSERT INTO `tbl_booking_dates` (`id`, `booking_id`, `booking_date`, `roomname`) VALUES
(28, 9, '2021-12-08', 1),
(29, 10, '2022-01-22', 1),
(30, 11, '2022-01-22', 2),
(31, 12, '2022-01-22', 3),
(33, 13, '2022-01-23', 3),
(36, 16, '2022-02-23', 4),
(40, 18, '2022-02-27', 5),
(41, 18, '2022-02-28', 5),
(42, 19, '2022-03-09', 6),
(43, 19, '2022-03-10', 6),
(44, 19, '2022-03-11', 6),
(200, 41, '2022-07-12', 7),
(201, 41, '2022-07-13', 7),
(202, 42, '2022-07-14', 7),
(203, 42, '2022-07-15', 7),
(204, 43, '2022-10-09', 8),
(205, 44, '2022-10-17', 8),
(206, 45, '2022-10-15', 8),
(207, 46, '2022-10-15', 10),
(209, 48, '2022-10-02', 14),
(210, 49, '2022-10-01', 13),
(211, 50, '2022-10-06', 13),
(212, 51, '2022-09-30', 13),
(213, 52, '2022-09-30', 8),
(214, 53, '2022-09-30', 14),
(215, 54, '2022-10-05', 20),
(216, 54, '2022-10-06', 20),
(217, 54, '2022-10-07', 20),
(218, 55, '2022-10-11', 16),
(219, 56, '2022-11-04', 16),
(220, 57, '2022-11-12', 8),
(221, 58, '2022-11-12', 13),
(222, 59, '2022-11-11', 16),
(223, 60, '2022-12-10', 8),
(224, 61, '2022-12-15', 18),
(225, 61, '2022-12-16', 18),
(226, 61, '2022-12-17', 18),
(227, 61, '2022-12-18', 18),
(228, 61, '2022-12-19', 18),
(229, 61, '2022-12-20', 18),
(230, 61, '2022-12-21', 18),
(231, 61, '2022-12-22', 18),
(232, 61, '2022-12-23', 18),
(233, 61, '2022-12-24', 18),
(234, 61, '2022-12-25', 18),
(235, 61, '2022-12-26', 18),
(236, 61, '2022-12-27', 18),
(237, 61, '2022-12-28', 18),
(238, 61, '2022-12-29', 18),
(239, 61, '2022-12-30', 18),
(240, 62, '2022-12-05', 11),
(241, 62, '2022-12-06', 11),
(242, 62, '2022-12-07', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check`
--

CREATE TABLE `tbl_check` (
  `id` int NOT NULL,
  `timein` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_check`
--

INSERT INTO `tbl_check` (`id`, `timein`) VALUES
(0, ''),
(1, '12:40'),
(41, '12:40'),
(42, '4:48am'),
(44, '10:02PM'),
(46, '9:39pm'),
(56, '10:15pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check1`
--

CREATE TABLE `tbl_check1` (
  `id` int NOT NULL,
  `timeout` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_check1`
--

INSERT INTO `tbl_check1` (`id`, `timeout`) VALUES
(42, '10:30pm'),
(44, '11:00am'),
(46, '8:48am'),
(56, '03:00am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `id` int NOT NULL,
  `currcode` varchar(50) NOT NULL,
  `currsymbol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`id`, `currcode`, `currsymbol`) VALUES
(4, 'AFN', 'Af'),
(8, 'CDF', 'FC'),
(9, 'Euro', 'Fr'),
(10, 'Ksh', 'ksh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `job` varchar(150) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `joint_name` varchar(100) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `nature_card` varchar(50) NOT NULL,
  `number_card` varchar(50) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `gender`, `birthdate`, `contact`, `address`, `job`, `telephone`, `birth_place`, `civil_status`, `joint_name`, `nationality`, `nature_card`, `number_card`, `contact_person`, `created_date`) VALUES
(1, 'Kunal', 'kunal@test.com', 'Male', '1993-03-03', '1231231231', 'Nashik, maharashtra', 'Teacher', '2020202020', 'Nashik', 'Married', '', 'India', '123456789123', '0102010201', '0303030303', '2020-10-29'),
(2, 'Ganesh', 'ganesh@test.com', 'Male', '1990-02-02', '2020202020', 'M.G road Nashik', 'Software engineer', '3030303030', 'Nashik', 'Married', 'Kirti', 'Indian', '1020102010', 'A5050505050', '5050505050', '2020-10-29'),
(3, 'minh Huu Hoang Tran', 'trinh@gmail.com', 'Male', '2021-03-26', '1913430229', '356/19 NgÅ© HÃ nh sÆ¡n', 'no', '90909090999', 'no', 'Single', 'a', 'no', '22222', '33333', 'no', '2021-03-31'),
(4, 'Joy roy', 'abcd@gmail.com', 'Male', '1988-07-14', '1566666666', 'wqewqqwsd', 'sleeping', '2432432432', 'india', 'Single', 'erfre', 'indian', '54545454545', '4324234234', 'rrrwqrwqr', '2021-07-21'),
(5, 'Giri', 'giri@gmail.com', 'Male', '2021-09-07', '8891024365', 'ghvbk', 'fhgb', '1234567891', 'kottayam ', 'Married', 'thgb', 'indin', '4y5ruyt', '46ti86', 'hth', '2021-09-07'),
(6, 'KAMANA', 'kamana@gmail.com', 'Male', '1994-12-08', '1234567890', 'GASABO', 'IT', '1234567890', '12/11/2019', 'Single', 'NO', '78779799989988', '8989889', '88777', 'ETIENNE', '2021-12-08'),
(9, 'Vivek Gupta', 'vrgup2000@gmail.com', 'Male', '1971-04-09', '7988405385', 'Lucknow', 'Salaried', '7988405385', 'Lucknow', 'Single', 'VG', 'Indian', '4444444444444444', 'abcde1234f', 'VG', '2022-03-09'),
(10, 'Daniel Gatogo', 'boyamg32@gmail.com', 'Male', '2022-06-14', '0540948579', 'accra new town', 'dede4d4d', '0540948579', 'kpedx', 'Single', 'ededede', 'GHANAIAN', '12334444', '4dedede', 'Daniel Gatogo', '2022-06-30'),
(11, 'Daniel ', 'boyamg32@gmail.com', 'Male', '2022-07-04', '0540948579', 'accra new town', 'dede4d4d', '0540948579', 'kpedx', 'Single', '', 'GHANAIAN', '12334444', 'Daniel Gatogo', 'Daniel Gatogo', '2022-07-03'),
(12, 'ERNEST NANA GYIMAH', 'gyiernest@gmail.com', 'Male', '1990-11-10', '0597181585', 'none', 'into media', '0597181585', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '8888888', '0551984771', 'SHAKIRATU SHAIBU', '2022-10-21'),
(13, 'ERNEST BERKO', 'ernestberko@gmail.com', 'Male', '1998-04-10', '0244197853', 'NONE', 'ENGINEER', '0244197853', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '999999', '0547250320', 'NAANA', '2022-10-21'),
(14, 'RICHIE IUCRE', 'richieiucre@1gmail.com', 'Male', '1996-05-10', '0916961643', 'osu accra', 'student', '0916961643', 'nigerian', 'Single', '', 'nigerian', '23345', '08133808833', 'francis iucre', '2022-10-21'),
(15, 'BERNICE AMISSAH', 'berniceamissah@gmail.com', 'Male', '2022-10-21', '0509717852', 'LASHIBI TEMA', 'TEACHER', '0509717852', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '333333', '0509717852', 'BERNICE', '2022-10-21'),
(16, 'FRANK FRIMPONG', 'frankfrimpong@gmail.com', 'Male', '2022-09-29', '0545892322', 'AWOSHIE', 'TRADER', '0545892322', 'ACCRA(GHANA)', 'Single', '', 'GHANAIAN', '2222', 'NONE', 'NONE', '2022-10-21'),
(17, 'Isaac Ayesu', 'ayesuisaac@gmail.com', 'Male', '1989-05-12', '0241324605', 'Accra', 'Event Organizer', '0241324605', 'Ghana', 'Married', '', 'GHANAIAN', '1897018141', '0242208742', 'Eric Sasu', '2022-10-21'),
(18, 'ASARE SANDRA ', 'asaresandra@gmail.com', 'Female', '1994-08-15', '0554752236', 'santa maira', 'fashion desginer', '0554752236', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '444444', '0554752236', 'DAVID COLEMAN', '2022-10-21'),
(19, 'ANARFI DERRICK', 'anarfi@gmail.com', 'Male', '1984-10-10', '0246571993', 'CP GBAWE', 'TRADER', '0246571993', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '777777', '0558446460', 'RICHMOND', '2022-10-21'),
(20, 'DAVID KYI', 'iamkoby22@gmail.com', 'Male', '1997-03-11', '0205251122', 'fanmilk Ablekuma', 'data analyst', '0205251122', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '456567', 'TOD KYS', '0205251122', '2022-10-21'),
(21, 'NANA YAW OWUSU', 'cookieslove30@gmail.com', 'Male', '1993-08-13', '0541486053', 'TAIFA', 'MASON', '0541486053', 'ACCRA(GHANA)', 'Single', '', 'GHANAIAN', '3333333', '0541486053', 'NANA', '2022-10-21'),
(22, 'OSEI FRIMPONG', 'oseifrimpong12@gmail.com', 'Male', '1998-01-24', '0540755615', 'A2345', 'TRADER', '0540755615', 'ACCRA(GHANA)', 'Divorce', '', 'GHANAIAN', '2222', '0264396780', 'DIANA FRIMPONG', '2022-10-21'),
(23, 'ALEX KWAKU', 'alex@gmail.com', 'Male', '1984-06-27', '0559525305', '48 Bronze Street, Accra', 'BUSINESS MAN', '0559525305', 'ACCRA(GHANA)', 'Divorce', '', 'GHANAIAN', '222445510114', '0244967685', 'JOE', '2022-10-21'),
(24, 'CATHY ADOMAKO', 'adomakofrema@outlook.com', 'Female', '1966-11-12', '0544559204', 'KUMASI', 'health manager', '0544559204', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '222445510114', '0201509696', 'lawyer marie simmons', '2022-10-21'),
(25, 'MOSES NII AWHRTEN BOYEFIO', 'mstudiog@gmail.com', 'Male', '1988-05-09', '0548384315', 'manhea', 'pastor', '0548384315', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '222445510114', '0541891515', 'timothy dadzie', '2022-10-21'),
(26, 'DAVID BROWN', 'david@intrial.com', 'Male', '1977-02-14', '0543888660', 'lizard land', 'BUSINESS MAN', '0543888660', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '222445510114', '0244611237', 'ADDEEY', '2022-11-05'),
(27, 'AFIA ABIGAIL', 'abigailaba@gmail.com', 'Female', '2001-09-02', '0540593716', 'ABLEKUMA', 'student', '0559634612', 'ACCRA ABLEKUMA', 'Single', '', 'GHANAIAN', '222445510114', '0559634612', 'BILLY JEEFE', '2022-11-12'),
(28, 'WILLAM YEBOAH', 'winnyxfairfox247@gmail.com', 'Male', '1989-04-16', '0545599729', 'L N A GBAWA', 'ENGINEER', '0501677278', 'ACCRA(GHANA)', 'Married', '', 'GHANAIAN', '222445510114', '0246261421', 'WINSONE JESSICA JACKSON', '2022-11-12'),
(29, 'BERNARD AMOATENY', 'bernardamoateny2k18@gmail.com', 'Male', '1996-07-01', '0241486184', 'GREENLE STRESS ACCRA', 'VTILITY MANAGER', '0241486184', 'OFORIKROM', 'Married', '', 'GHANAIAN', '222445510114', '024863 2129', 'LYDIA AMOATENY', '2022-11-12'),
(30, 'Aldrin', 'buang@gmail.com', 'Male', '2022-12-05', '0999999999', 'Hshsjs jduddjej', 'Full stack web developer', '2929293339', 'Basu', 'Single', '', 'Filipino', '92292939', '3939393', 'Sjdjjddj', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int NOT NULL,
  `discountname` varchar(50) NOT NULL,
  `percentage` int NOT NULL,
  `expirydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `e_id` int NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int NOT NULL,
  `bookingid` int NOT NULL,
  `amount` int NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `bookingid`, `amount`, `datee`) VALUES
(1, 1, 1040, '2020-10-29'),
(2, 2, 10000, '2020-10-29'),
(3, 4, 1050, '2021-07-21'),
(4, 5, 3000, '2021-09-03'),
(5, 5, 500, '2021-09-03'),
(6, 5, 2000, '2021-09-03'),
(7, 6, 2000, '2021-09-07'),
(8, 6, 12000, '2021-09-07'),
(9, 7, 3360, '2021-12-05'),
(10, 8, 2100, '2021-12-05'),
(11, 9, 300, '2021-12-08'),
(12, 9, 200, '2021-12-07'),
(13, 1, 4000, '2022-01-02'),
(14, 10, 1050, '2022-01-22'),
(15, 11, 648, '2022-01-22'),
(16, 12, 8640, '2022-01-22'),
(17, 13, 8000, '2022-01-22'),
(18, 14, 1000, '2022-01-25'),
(19, 15, 500, '2022-01-25'),
(20, 16, 24300, '2022-02-23'),
(21, 17, 45000, '2022-02-24'),
(22, 18, 162, '2022-02-27'),
(23, 18, 162, '2022-02-27'),
(24, 19, 5000, '2022-03-09'),
(25, 20, 525, '2022-06-27'),
(26, 20, 0, '2022-06-27'),
(27, 21, 510, '2022-06-27'),
(28, 21, 175, '2022-06-28'),
(29, 22, 685, '2022-07-01'),
(30, 23, 2398, '2022-07-01'),
(31, 24, 4795, '2022-07-01'),
(32, 25, 5, '2022-07-11'),
(33, 26, 2000, '2022-07-01'),
(34, 27, 60, '2022-07-08'),
(35, 28, 500, '2022-07-01'),
(36, 29, 400, '2022-07-01'),
(37, 30, 2345, '2022-07-01'),
(38, 32, 200, '2022-07-19'),
(39, 28, 3953, '2022-07-03'),
(40, 27, 625, '2022-07-03'),
(41, 37, 5, '2022-07-14'),
(42, 38, 4453, '2022-07-04'),
(43, 39, 5480, '2022-07-04'),
(44, 40, 10275, '2022-07-04'),
(45, 41, 1370, '2022-07-04'),
(46, 42, 685, '2022-07-04'),
(47, 43, 150, '2022-10-09'),
(48, 44, 150, '2022-10-17'),
(49, 45, 150, '2022-10-15'),
(50, 46, 250, '2022-10-15'),
(51, 48, 250, '2022-10-02'),
(52, 49, 250, '2022-10-01'),
(53, 50, 250, '2022-10-06'),
(54, 51, 250, '2022-09-30'),
(55, 52, 150, '2022-09-30'),
(56, 53, 250, '2022-09-30'),
(57, 54, 900, '2022-10-05'),
(58, 55, 250, '2022-10-11'),
(59, 56, 250, '2022-11-04'),
(60, 57, 150, '2022-11-12'),
(61, 58, 250, '2022-11-12'),
(62, 59, 250, '2022-11-11'),
(63, 61, 200, '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `operation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `name`, `display_name`, `operation`) VALUES
(1, 'users', 'Users', 'users'),
(2, 'create_user', 'Create User', 'create_user'),
(3, 'edit_user', 'Edit User', 'edit_user'),
(4, 'delete_user', 'Delete User', 'delete_user'),
(5, 'manage_roles', 'Manage Roles', 'manage_roles'),
(6, 'settings', 'Settings', 'settings'),
(8, 'customer', 'customer', 'customer'),
(9, 'rooms', 'rooms', 'rooms'),
(10, 'currency', 'currency', 'currency'),
(11, 'room_booking', 'room_booking', 'room_booking'),
(12, 'tax', 'tax', 'tax'),
(13, 'customer_report', 'customer report', 'customer report'),
(14, 'report_booking', 'report booking', 'report booking'),
(15, 'report_payment', 'report payment', 'report payment'),
(16, 'report_rooms', 'report Reserved rooms', 'report Reserved rooms'),
(17, 'report_invoice', 'report print invoice', 'report print invoice'),
(18, 'report_paid_unpaid', 'report paid unpaid', 'report paid unpaid'),
(19, 'add_customer', 'Add customer', ''),
(20, 'edit_customer', 'Edit customer', ''),
(21, 'delete_customer', 'Delete Customer', ''),
(22, 'add_room', 'Add Room', ''),
(23, 'edit_room', 'Edit Room', ''),
(24, 'delete_room', 'Delete Room', ''),
(25, 'add_booking', 'Add Booking', ''),
(26, 'edit_booking', 'Edit Booking', ''),
(27, 'delete_booking', 'Delete Booking', ''),
(28, 'booking_payment', 'Booking Payment', ''),
(29, 'booking_invoice', 'Booking Invoice', ''),
(30, 'drinks', 'drinks', ''),
(31, 'add_drink', 'Add Drink', ''),
(32, 'edit_drink', 'Edit Drink', ''),
(33, 'delete_drink', 'Delete Drink', ''),
(34, 'plats', 'Food', ''),
(35, 'add_plats', 'Add Food', ''),
(36, 'add_drink_payment', 'Add Drink Payment Invoice', ''),
(37, 'add_plat_payment', 'Food Payment Invoice', ''),
(38, 'edit_plats', 'Edit Food', ''),
(39, 'delete_plats', 'Delete Food', ''),
(40, 'drink_payment_invoice', 'Drink Payment Invoice', ''),
(41, 'edit_drink_payment', 'Edit Drink Payment Invoice', ''),
(42, 'delete_drink_payment', 'Delete Drink Payment Invoice', ''),
(43, 'report_drink_payment', 'Drink Report Payment', ''),
(44, 'food_payment_invoice', 'Food Payment Invoice', ''),
(45, 'edit_food_payment', 'Edit Food Payment Invoice', ''),
(46, 'delete_food_payment', 'Delete Food Payment Invoice', ''),
(47, 'report_food_payment', 'Food Report Payment', ''),
(48, 'pool', 'Pool', ''),
(49, 'add_pool', 'Add Pool', ''),
(50, 'add_pool_payment', 'Add Pool Payment', ''),
(51, 'edit_pool', 'Edit Pool', ''),
(52, 'delete_pool', 'Delete Pool', ''),
(53, 'pool_payment_invoice', 'Pool Payment Invoice', ''),
(54, 'edit_pool_payment', 'Edit Pool Payment', ''),
(55, 'delete_pool_payment', 'Delete Pool Payment', ''),
(56, 'report_pool_payment', 'Report Pool Payment', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission_role`
--

CREATE TABLE `tbl_permission_role` (
  `id` int NOT NULL,
  `permission_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission_role`
--

INSERT INTO `tbl_permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(266, 1, 3),
(267, 2, 3),
(268, 3, 3),
(269, 4, 3),
(270, 9, 3),
(271, 10, 3),
(272, 13, 3),
(273, 14, 3),
(274, 17, 3),
(275, 18, 3),
(276, 26, 3),
(277, 27, 3),
(278, 28, 3),
(279, 29, 3),
(280, 34, 3),
(281, 35, 3),
(282, 36, 3),
(283, 37, 3),
(284, 38, 3),
(285, 39, 3),
(286, 40, 3),
(287, 41, 3),
(288, 42, 3),
(289, 43, 3),
(290, 44, 3),
(305, 1, 5),
(306, 2, 5),
(307, 3, 5),
(308, 4, 5),
(309, 5, 5),
(310, 8, 5),
(311, 9, 5),
(312, 10, 5),
(313, 11, 5),
(314, 12, 5),
(315, 13, 5),
(316, 14, 5),
(317, 15, 5),
(318, 16, 5),
(319, 17, 5),
(320, 18, 5),
(321, 19, 5),
(322, 20, 5),
(323, 21, 5),
(324, 22, 5),
(325, 23, 5),
(326, 24, 5),
(327, 25, 5),
(328, 26, 5),
(329, 27, 5),
(330, 28, 5),
(331, 29, 5),
(369, 30, 1),
(370, 31, 1),
(371, 32, 1),
(372, 33, 1),
(373, 34, 1),
(374, 35, 1),
(375, 36, 1),
(376, 37, 1),
(377, 38, 1),
(378, 39, 1),
(383, 34, 8),
(384, 37, 8),
(388, 40, 1),
(389, 41, 1),
(390, 42, 1),
(391, 43, 1),
(392, 44, 1),
(393, 45, 1),
(394, 46, 1),
(395, 47, 1),
(413, 19, 10),
(414, 20, 10),
(415, 8, 10),
(416, 21, 10),
(417, 48, 1),
(418, 49, 1),
(419, 50, 1),
(420, 51, 1),
(421, 52, 1),
(422, 53, 1),
(423, 54, 1),
(424, 55, 1),
(425, 56, 1),
(439, 19, 16),
(440, 20, 16),
(441, 8, 16),
(442, 21, 16),
(443, 19, 17),
(444, 8, 17),
(445, 12, 4),
(446, 13, 4),
(447, 14, 4),
(448, 15, 4),
(449, 16, 4),
(450, 17, 4),
(451, 18, 4),
(452, 10, 4),
(453, 11, 4),
(454, 28, 4),
(455, 29, 4),
(456, 30, 6),
(457, 40, 6),
(458, 36, 6),
(459, 43, 6),
(460, 13, 9),
(461, 14, 9),
(462, 15, 9),
(463, 16, 9),
(464, 17, 9),
(465, 18, 9),
(466, 19, 11),
(467, 20, 11),
(468, 8, 11),
(469, 21, 11),
(470, 12, 11),
(471, 19, 12),
(472, 20, 12),
(473, 8, 12),
(474, 21, 12),
(475, 12, 12),
(476, 13, 12),
(477, 14, 12),
(478, 15, 12),
(479, 16, 12),
(480, 17, 12),
(481, 18, 12),
(482, 22, 12),
(483, 23, 12),
(484, 9, 12),
(485, 24, 12),
(486, 19, 13),
(487, 20, 13),
(488, 8, 13),
(489, 21, 13),
(496, 19, 14),
(497, 20, 14),
(498, 8, 14),
(499, 21, 14),
(500, 22, 14),
(501, 23, 14),
(502, 9, 14),
(503, 25, 14),
(504, 11, 14),
(505, 28, 14),
(506, 29, 14),
(517, 19, 16),
(518, 20, 16),
(519, 8, 16),
(520, 22, 16),
(521, 23, 16),
(522, 9, 16),
(523, 25, 16),
(524, 26, 16),
(525, 11, 16),
(526, 30, 16),
(527, 31, 16),
(528, 32, 16),
(529, 34, 16),
(530, 35, 16),
(531, 38, 16),
(563, 8, 15),
(564, 12, 15),
(565, 13, 15),
(566, 14, 15),
(567, 15, 15),
(568, 16, 15),
(569, 17, 15),
(570, 18, 15),
(571, 10, 15),
(572, 29, 15),
(573, 40, 15),
(574, 43, 15),
(575, 44, 15),
(576, 37, 15),
(577, 47, 15),
(595, 22, 7),
(596, 9, 7),
(597, 25, 7),
(598, 26, 7),
(599, 11, 7),
(600, 28, 7),
(601, 29, 7),
(617, 19, 2),
(618, 20, 2),
(619, 8, 2),
(620, 13, 2),
(621, 14, 2),
(622, 15, 2),
(623, 16, 2),
(624, 17, 2),
(625, 18, 2),
(626, 22, 2),
(627, 23, 2),
(628, 9, 2),
(629, 25, 2),
(630, 26, 2),
(631, 11, 2),
(632, 28, 2),
(633, 29, 2),
(634, 19, 17),
(635, 12, 17),
(636, 13, 17),
(637, 23, 17),
(638, 2, 17),
(639, 34, 17),
(640, 19, 18),
(641, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `delete_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_name`, `slug`, `delete_status`) VALUES
(1, 'Admin', 'admin', 0),
(2, 'Receptionist 1', 'receptionist 1', 0),
(3, 'Technicians', 'technicians', 1),
(4, 'Accounting', 'accounting', 1),
(5, 'Gerant', 'gerant', 1),
(6, 'Barman', 'barman', 0),
(7, 'Princess Adane', 'princess adane', 1),
(8, 'Restoman', 'restoman', 1),
(9, 'Manager', 'manager', 0),
(10, 'Customer manager', 'customer manager', 1),
(11, 'manager2', 'manager2', 1),
(12, 'newroleupdated', 'newroleupdated', 1),
(13, 'customer', 'customer', 1),
(14, 'dsoftdipo@gmail.com', 'dsoftdipo@gmail.com', 1),
(15, 'Accountant', 'accountant', 0),
(16, 'Reception', 'reception', 1),
(17, 'Jhjk', 'jhjk', 0),
(18, 'Bistaify', 'bistaify', 0),
(19, 'Bistaify', 'bistaify', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int NOT NULL,
  `floorno` int NOT NULL,
  `roomname` varchar(50) NOT NULL,
  `peradultprice` int NOT NULL,
  `perkidprice` int NOT NULL,
  `color` varchar(50) NOT NULL,
  `room_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `floorno`, `roomname`, `peradultprice`, `perkidprice`, `color`, `room_no`) VALUES
(11, 1, 'Double', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '103'),
(12, 1, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '104'),
(13, 1, 'Deluxe', 300, 0, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '102'),
(14, 1, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '107'),
(15, 1, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '106'),
(16, 2, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '202'),
(17, 2, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '203'),
(18, 2, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '204'),
(19, 2, 'Deluxe', 300, 300, 'AC/TEL./TOILET&BATH/TV/WIFI/BREAKFAST/POOL ', '205'),
(23, 6, 'Double', 0, 0, 'Samo', 'Hack'),
(24, 6, 'Deluxe', 1111, 2347, 'Food', '17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax`
--

CREATE TABLE `tbl_tax` (
  `id` int NOT NULL,
  `taxname` varchar(50) NOT NULL,
  `percentage` int NOT NULL,
  `shortcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tax`
--

INSERT INTO `tbl_tax` (`id`, `taxname`, `percentage`, `shortcode`) VALUES
(1, 'Getfund 2.5% / NHIL 2.5% /Covid 19.1% / VAT 12.5 %', 37, 'TAX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks_invoice`
--
ALTER TABLE `drinks_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks_invoice_items`
--
ALTER TABLE `drinks_invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks_invoice_payments`
--
ALTER TABLE `drinks_invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plats_invoice`
--
ALTER TABLE `plats_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plats_invoice_items`
--
ALTER TABLE `plats_invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plats_invoice_payments`
--
ALTER TABLE `plats_invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool_invoice`
--
ALTER TABLE `pool_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool_invoice_items`
--
ALTER TABLE `pool_invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool_invoice_payments`
--
ALTER TABLE `pool_invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking_dates`
--
ALTER TABLE `tbl_booking_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_check`
--
ALTER TABLE `tbl_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission_role`
--
ALTER TABLE `tbl_permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- Indexes for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drinks_invoice`
--
ALTER TABLE `drinks_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drinks_invoice_items`
--
ALTER TABLE `drinks_invoice_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drinks_invoice_payments`
--
ALTER TABLE `drinks_invoice_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plats_invoice`
--
ALTER TABLE `plats_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plats_invoice_items`
--
ALTER TABLE `plats_invoice_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plats_invoice_payments`
--
ALTER TABLE `plats_invoice_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pool`
--
ALTER TABLE `pool`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pool_invoice`
--
ALTER TABLE `pool_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pool_invoice_items`
--
ALTER TABLE `pool_invoice_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pool_invoice_payments`
--
ALTER TABLE `pool_invoice_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_booking_dates`
--
ALTER TABLE `tbl_booking_dates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `e_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_permission_role`
--
ALTER TABLE `tbl_permission_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
