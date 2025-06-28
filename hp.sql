-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 06:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hs`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(84, 'Cleaning'),
(85, 'Hair Services for Women'),
(86, 'Salon for Men'),
(87, 'Electricians'),
(88, 'Plumbers'),
(89, 'Carpenters');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(5) NOT NULL,
  `city_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Ahmedabad'),
(2, 'Pune'),
(3, 'Amravati'),
(4, 'Ratnagiri'),
(5, 'nagpur'),
(6, 'Mumbai'),
(7, 'jalgaon'),
(8, 'Thane'),
(9, 'Pimpri-chinchwad'),
(10, 'Nanded'),
(11, 'latur'),
(12, 'Paud'),
(13, 'Mulashi'),
(14, 'Deccan'),
(15, 'Pmc'),
(16, 'Mehsana'),
(17, 'Porbandar'),
(18, 'Palanpur'),
(19, 'Valsad'),
(20, 'Vapi'),
(21, 'Gondal'),
(22, 'Veraval'),
(23, 'Godhra'),
(24, 'Patan'),
(25, 'Kalol'),
(26, 'Dahod'),
(27, 'Botad'),
(28, 'Amreli'),
(29, 'Deesa'),
(30, 'Jetpur'),
(31, 'Gandhidham');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `login_id` int(5) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `city_id` int(5) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `login_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city_id`, `pincode`) VALUES
(6, 355, 'Shivam', 'Gabani', 'gabanishivam77@gmail.com', '8574587458', 'c-503, Ila society, India Colony, Bapunagar, Ahmedabad', 1, '589658'),
(7, 359, 'Harsh', 'Maniya', 'harshmaniya8@gmail.com', '9658741524', 'D-303, Blackberry apart, Adajan, surat', 2, '395225');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `name`, `date`) VALUES
(1, 'deep', '0000-00-00 00:00:00'),
(2, 'deep', '2023-02-26 03:33:40'),
(3, 'deep', '2023-02-26 03:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(5) NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `role_id`, `username`, `password`) VALUES
(333, 3, 'sahil', '$2y$10$hZDAvmYRcGnL48FWoHH37O0Ey99EnX..Ce9ETd2yWxAum30Knb9o.'),
(335, 1, 'admin', '$2y$10$cN3ZSgu544VbF0U/Xk/96eEHlf.txlokPij7Qn5oe/dBAh2DrUwvO'),
(344, 2, 'smit', '$2y$10$KDhIPRf5qIYTmFJY2pVfYe/XF.DX8Cypctp4Q.qJeXgNwiamfaNAm'),
(345, 2, 'karan', '$2y$10$V7DsxOd9.mDjp9AEkGEtteL3QLojStmFFwmqo.l1RmSDbRuph8Amq'),
(347, 2, 'nayan', '$2y$10$Mu7fItaeU.Q1aMWek1LvjOEEL1Q/rFXnjkTL//uXMoreKFXJoExSi'),
(351, 2, 'jay gabani', '$2y$10$Se74K2TO57ZGEN79HFNy4e7qUJ/v1ePImeRLj9/E5sgPSQs7uwG6m'),
(352, 3, 'amit', '$2y$10$LImF6t3d5pQMRTE8a3kyX.0XPqTK9L.8FTDIS4Z9BUwX75Hzss0DW'),
(354, 2, 'deep', '$2y$10$nQCTknPw7Y0ViSMNuWdwHORpdNcm5a9iLsIUyHDwGofxUG2p6.8mG'),
(355, 3, 'jay_gabani', '$2y$10$wXEeA6MNy13EsgQlF8G3w.fhZC4NCH2kEi0amMj9CdtTvU.ZiUsMO'),
(358, 2, 'jeel', '$2y$10$40EBg/w9DlFItbzn9X5a3uj44gZg8Xf2BTSeZD2YENvdRkeHzGxMO'),
(359, 3, 'harsh', '$2y$10$DWwYtA3iYk.aOGW2z9oVEOp6XNJXWLWQ2fUvHKYtfAwKzWmzAVkJO');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `total` int(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `due_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `customer_id`, `full_name`, `phone`, `address`, `pincode`, `pay_mode`, `total`, `order_date`, `due_date`) VALUES
(8, 6, 'Raj gabani', '1234567890', '23, swetapartk , pasodra, surat', '123468', 'COD', 1851, '2023-02-26 06:01:05', '2023-03-08 18:01:00'),
(23, 6, 'JAY GABANI', '1234567890', 'C, 393, SHIVADHARA SOCIETY, MOTAVARACHHA, SURAT, GUJARAT', '123456', 'COD', 7276, '2023-03-01 11:44:12', '2023-04-07 11:44:00'),
(24, 6, 'jay gabani', '8798767656', 'fndm', '123456', 'COD', 13604, '2023-03-01 01:32:50', '2023-03-03 13:32:00'),
(25, 6, 'Jay gabani', '8767675654', 'C-304, shivdhara camput, mahidharpura, ahmedabad.', '123456', 'COD', 748, '2023-03-28 12:25:02', '2023-04-07 12:25:00'),
(26, 7, 'Harsh Maniya', '9685748574', 'D-303, blackberry, apart. adajan, surat', '852741', 'COD', 5000, '2023-03-30 08:31:33', '2023-04-01 20:31:00'),
(27, 7, 'Harsh Maniya', '1234567890', 'd-303, blackberry ,aprt, surat', '123456', 'COD', 5000, '2023-03-30 08:33:29', '2023-04-07 20:33:00'),
(28, 7, 'harsh maniya', '1234567890', 'D-blackberry, apart, surat', '123456', 'COD', 5000, '2023-03-30 08:36:49', '2023-04-08 20:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(5) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'serviceprovider'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(5) NOT NULL,
  `category_id` int(5) DEFAULT NULL,
  `service_name` varchar(50) DEFAULT NULL,
  `service_availibility` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `category_id`, `service_name`, `service_availibility`) VALUES
(9, 87, 'Nal', 0),
(10, 86, 'Spice', 1),
(12, 84, 'Full Home Cleaning', 1),
(13, 84, 'Sofa & Carpet Cleaning', 1),
(14, 85, 'Trim & Style', 1),
(15, 85, 'Blowdry & Styling', 1),
(16, 85, 'Fashion Color', 1),
(18, 85, 'Cut & Style', 1),
(20, 86, 'Hair colour', 0),
(21, 86, 'Relaxing Head Massage', 1),
(22, 86, 'Beard Shaping & Styling', 0),
(23, 87, 'Switch & Socket', 0),
(25, 87, 'Fan repairing', 1),
(26, 89, 'Furniture', 1),
(27, 84, 'sofa cleaning', 1),
(28, 88, 'Basin & sink', 1),
(29, 88, 'Grouting', 1),
(30, 88, 'Bath fitting', 1),
(31, 88, 'Drainage pipes', 1),
(32, 88, 'Tap & Mixer', 1),
(33, 88, 'Water tank', 1),
(34, 88, 'Toilet', 1),
(35, 84, 'Funished apartment', 1),
(36, 84, 'Unfunished apartment', 1),
(37, 84, 'Mini Services', 1),
(38, 89, 'Table design', 1),
(39, 84, 'Room cleaning', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE `sp` (
  `sp_id` int(5) NOT NULL,
  `login_id` int(5) NOT NULL,
  `sp_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `city_id` int(5) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp`
--

INSERT INTO `sp` (`sp_id`, `login_id`, `sp_name`, `email`, `phone`, `city_id`, `pincode`, `status`) VALUES
(49, 344, 'Smit Dudhat', 'smit@gmail.com', '8574857474', 16, '857485', 'active'),
(50, 345, 'Karan Parmar', 'karan@gmail.com', '8574859655', 10, '523652', 'active'),
(52, 347, 'Nayan', 'nayan@gmail.com', '9685741425', 15, '541254', 'active'),
(56, 351, 'jay', 'gabanishivam77@gmail.com', '9023964267', 1, '382350', 'deactive'),
(57, 354, 'deep korat', 'deepkorat13@gmail.com', '9687480417', 2, '365006', 'active'),
(60, 358, 'jeel', 'jeel@gmail.com', '1234567890', 1, '123456', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `sp_service`
--

CREATE TABLE `sp_service` (
  `sp_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `service_title` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_service`
--

INSERT INTO `sp_service` (`sp_id`, `service_id`, `category_id`, `service_title`, `price`, `description`, `availability`) VALUES
(49, 21, 86, 'Body massage & Face detan', '600', 'I provide body massage and also i have co-opperative staff', 1),
(49, 29, 88, 'Kitchen type gap filling', '1000', '• Grouting or tile gap filling of 1 kitchen\r\n• Materials like epoxy and grouting powder will be procured at additional cost.\r\n', 1),
(50, 20, 86, 'Salon for men great', '2000', 'i provide salon for men with style ', 1),
(50, 28, 88, 'Basin - Quick & Reliable', '3000', 'A clogged or leaky basin or sink can be a major inconvenience, but not with our quick and reliable plumbing service! Our team of experienced plumbers is equipped with the latest tools and techniques to fix any basin or sink problem efficiently and effectively. From unclogging drains to fixing leaks, we offer a range of plumbing services that are tailored to meet your specific needs. With our prompt and affordable service, you can get back to your routine in no time. Book your Basin & Sink Fix se', 1),
(50, 30, 88, 'Balcony drain & blockage removal', '309', 'Cleaning of drain & floor trap to removal blockage', 1),
(50, 31, 88, 'Pipline', '699', 'pipline clean & remove stuff from pipe', 1),
(52, 12, 84, 'Kitching cleaning', '356', 'dsbkajcd', 1),
(52, 14, 85, 'Trim & Style - Glamorous Look', '350', 'we offer a range of hair services that cater to your needs. Our salon uses only the best hair care products and tools to ensure that you leave looking and feeling your best. Book your Trim & Style service today and get ready to rock a glamorous look!', 1),
(52, 18, 85, 'professional and stylish haircut', '250', 'Short title: \"Trim & Style - Glamorous Look\"\r\n\r\nGig description:\r\nLooking for a professional and stylish haircut? Look no further than our Trim & Style service! Our experienced hairstylists will work with you to create a customized look that complements your features and suits your style.', 1),
(52, 27, 84, 'dfvdf', '36', 'ergvfx', 1),
(52, 31, 88, 'pipeline solution ', '520', 'ill try if ii found any pipeline mistake then a solve it', 1),
(52, 35, 84, 'Bedroom Cleaning', '799', 'Floor cleaning with single disc machine & vacuuming of mattress and curtains.', 1),
(52, 37, 84, 'Occupied Kitchen cleaning', '1398', 'Tough oil & grease removal from tiles, stove, slab, sink, exhaust, window, etc.', 1),
(56, 12, 84, 'I Provide Full cleaning', '5000', 'I provide full home cleaning with fully gerrenty', 1),
(56, 23, 87, 'switch repairing', '150', 'dsih  jiuozkspsueofreivjkdsv ioniuhkdkfoavAEPISUVhnqwpoeqouf,mzxnpsjfew', 1),
(57, 12, 84, 'Complete Home Cleaning - Professional & Thorough', '2000', 'Looking for a reliable and professional cleaning service that can give your entire home a thorough cleaning? Look no further than our Complete Home Cleaning service! Our experienced and skilled cleaners will deep clean every room in your home, leaving it spotless and fresh-smelling. We use only the best cleaning products and equipment to ensure that your home is not only clean but also safe and healthy. Book your cleaning today and enjoy a clean and comfortable home!', 1),
(57, 13, 84, 'Fresh Home Cleaning', '1500', 'Say goodbye to dirt and stains on your sofas and carpets with our professional cleaning service! Our team of experienced cleaners is equipped with state-of-the-art equipment and eco-friendly cleaning solutions to give your furniture and carpets a deep and refreshing clean.', 1),
(57, 35, 84, 'Apartment Cleaning - Hassle-free', '5000', 'Keeping a furnished apartment clean can be a daunting task, but not with our hassle-free cleaning service! We offer a thorough cleaning of every corner of your furnished apartment, ensuring that it remains clean and inviting for your guests.', 1),
(57, 39, 84, 'Full Room cleaning', '900', 'I am offering professional room cleaning. Whether you need your bedroom, living room, kitchen, or any other room in your home cleaned, I am here to help. My services include dusting, vacuuming, mopping, wiping surfaces, and removing trash. I pay attention to detail and ensure that every nook and corner is thoroughly cleaned. With my services, you can have a sparkling clean room that will leave you feeling refreshed and satisfied. Contact me to book your cleaning appointment today!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `updatetry`
--

CREATE TABLE `updatetry` (
  `id` int(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updatetry`
--

INSERT INTO `updatetry` (`id`, `fname`, `lname`, `email`) VALUES
(1, 'Deep', 'Korat', 'deepkorat13@gmail.com'),
(2, 'jay', 'gabani', 'jaygabani@gmail.com'),
(3, 'sahil', 'patoliya', 'sahil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `sp_id` int(5) NOT NULL,
  `service_title` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `service_id`, `sp_id`, `service_title`, `price`, `qty`, `status`) VALUES
(8, 12, 52, 'Kitching cleaning', '356', 1, 'pending'),
(8, 23, 56, 'switch repairing', '150', 1, 'pending'),
(8, 27, 52, 'dfvdf', '36', 1, 'pending'),
(8, 29, 49, 'Kitchen type gap filling', '1000', 1, 'pending'),
(8, 30, 50, 'Balcony drain & blockage removal', '309', 1, 'completed'),
(23, 12, 52, 'Kitching cleaning', '356', 5, 'pending'),
(23, 12, 57, 'Complete Home Cleaning - Professional & Thorough', '2000', 1, 'completed'),
(23, 14, 52, 'Trim & Style - Glamorous Look', '350', 2, 'pending'),
(23, 37, 52, 'Occupied Kitchen cleaning', '1398', 2, 'pending'),
(24, 12, 52, 'Kitching cleaning', '356', 3, 'pending'),
(24, 12, 57, 'Complete Home Cleaning - Professional & Thorough', '2000', 3, 'completed'),
(24, 13, 57, 'Fresh Home Cleaning', '1500', 1, 'rejected'),
(24, 27, 52, 'dfvdf', '36', 1, 'pending'),
(25, 12, 52, 'Kitching cleaning', '356', 2, 'pending'),
(25, 27, 52, 'dfvdf', '36', 1, 'pending'),
(26, 35, 57, 'Apartment Cleaning - Hassle-free', '5000', 1, 'pending'),
(27, 35, 57, 'Apartment Cleaning - Hassle-free', '5000', 1, 'completed'),
(28, 35, 57, 'Apartment Cleaning - Hassle-free', '5000', 1, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`sp_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `sp_service`
--
ALTER TABLE `sp_service`
  ADD PRIMARY KEY (`sp_id`,`service_id`),
  ADD KEY `sevice_id` (`service_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `updatetry`
--
ALTER TABLE `updatetry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD UNIQUE KEY `order_id` (`order_id`,`service_id`,`sp_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `sp_id` (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sp`
--
ALTER TABLE `sp`
  MODIFY `sp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `updatetry`
--
ALTER TABLE `updatetry`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `sp_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`),
  ADD CONSTRAINT `sp_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `sp_service`
--
ALTER TABLE `sp_service`
  ADD CONSTRAINT `sp_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`),
  ADD CONSTRAINT `sp_service_ibfk_2` FOREIGN KEY (`sp_id`) REFERENCES `sp` (`sp_id`),
  ADD CONSTRAINT `sp_service_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`),
  ADD CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`),
  ADD CONSTRAINT `user_order_ibfk_3` FOREIGN KEY (`sp_id`) REFERENCES `sp` (`sp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
