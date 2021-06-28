
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(11, 'Tata Sampann Chana Dal', 'tata_chanadal', 113, './product-images/tata_chanadal.jpeg'),
(12, 'Tata Urad Dal', 'tata_uraddal', 88.00, './product-images/tata_uraddal.jpeg'),
(13, 'Colgate Total', 'colgate120', 99.00, './product-images/colgate_total.jpeg'),
(14, 'Aashirvaad atta', 'aashirvaad5kg', 220.00, './product-images/aashirvaad_atta.jpeg');
