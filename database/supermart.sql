-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 10:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$dRpsR8YwOavE5.dT5AD.P.focQ6vT4xV0YNVkp1ofyzF90MTdGptq');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `service_rating` enum('-1','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `recommend` enum('-1','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `suggestion` varchar(500) NOT NULL,
  `received_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `service_rating`, `recommend`, `suggestion`, `received_at`) VALUES
(1, 'check@feedback.com', '10', '10', 'test', '2021-06-26 13:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `message` varchar(500) NOT NULL,
  `received_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `email`, `message`, `received_at`) VALUES
(1, 'check@contact.com', 'test message', '2021-06-26 13:12:51'),
(2, 'user@gmail.com', 'mkl;gcxx', '2021-06-27 13:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'Parle Hide&Seek', 'parlreplatina201', 30.00, './product-images/hide&seek.jpeg'),
(2, 'Amul Butter', 'amul100g', 48.00, './product-images/amul_butter100mg.jpeg'),
(3, 'kelloggs Chocos', 'chocos125g', 55.00, './product-images/chocos125.jpeg'),
(4, 'Kelloggs Pringles', 'pringles001', 99.00, './product-images/pringles.jpeg'),
(5, 'Everest Pav Bhaji Masla', 'everest_pavbhaji', 40.00, './product-images/everest_pavbhaji.jpeg'),
(6, 'Everest Kitchen King Masla', 'everest_kitchenking', 67.00, './product-images/everest_kitchenking.jpeg'),
(7, 'Everest Garam Masla', 'everest_garammasala', 40.00, './product-images/everest_garammasala.jpeg'),
(8, 'Everest Shahi Paneer Masla', 'everest_shahipaneer', 40.00, './product-images/everest_shahipaneer.jpeg'),
(9, 'Tata Sampann Chili Powder', 'tata_chilipowder', 79.00, './product-images/tata_chilipowder.jpeg'),
(10, 'Tata Sampann Toor Dal', 'tata_toordal1kg', 169.00, './product-images/tata_toordal.jpeg'),
(11, 'Tata Sampann Chana Dal', 'tata_chanadal', 113.00, './product-images/tata_chanadal.jpeg'),
(12, 'Tata Urad Dal', 'tata_uraddal', 88.00, './product-images/tata_uraddal.jpeg'),
(13, 'Colgate Total', 'colgate120', 99.00, './product-images/colgate_total.jpeg'),
(14, 'Aashirvaad atta', 'aashirvaad5kg', 220.00, './product-images/aashirvaad_atta.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(110) NOT NULL,
  `state` enum('-1','Andhra Pradesh','Andaman and Nicobar Islands','Arunachal Pradesh','Assam','Bihar','Chandigarh','Chhattisgarh','Dadar and Nagar Haveli','Daman and Diu','Delhi','Lakshadweep','Puducherry','Goa','Gujarat','Haryana','Himachal Pradesh','Jammu and Kashmir','Jharkhand','Karnataka','Kerala','Madhya Pradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Odisha','Punjab','Rajasthan','Sikkim','Tamil Nadu','Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal') NOT NULL,
  `city` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `birth_date`, `phone`, `address`, `state`, `city`, `created_at`) VALUES
(1, 'Varad Kulkarni', 'user@gmail.com', '$2y$10$J/opnUTUKWm7wg/H1reQLerBvdWquWl4qFJVPXEgdAVMVvQBOYb/W', '2001-01-01', '9420345678', '32,Juhu west', 'Maharashtra', 'Mumbai', '2021-06-28 13:31:21'),
(2, 'Jerry Warner', 'jerry@gmail.com', '$2y$10$yG0CL8cdY5dKCKuidBbzrulWWec5ytVgJmr3IDcFcqmU6WgkCldBu', '2002-02-02', '8387887887', '12,Malhad', 'Maharashtra', 'Mumbai', '2021-06-28 13:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
