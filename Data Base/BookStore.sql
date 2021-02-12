-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 07:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Book`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) CHARACTER SET utf8 NOT NULL,
  `PASSWORD` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Book@admin.com', '5a45d7150c4576642949f25e0bb8098c');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `CATEGORY` text CHARACTER SET utf8 NOT NULL,
  `IMAGE` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `CATEGORY`, `IMAGE`) VALUES
(2, 'Camera', '../images/category/1540230047.jpg'),
(3, 'Gift', '../images/category/1540230160.jpg'),
(5, 'Girl', '../images/category/1540236649.jpg'),
(6, 'Jewellry', '../images/category/1541513225.jpg'),
(7, 'TeddyBear', '../images/category/1541513408.jpg'),
(8, 'Perfumes', '../images/category/1541513990.jpg'),
(9, 'Soap', '../images/category/1541514097.jpg'),
(10, 'Watches', '../images/category/1541514499.jpg'),
(11, 'Christmas', '../images/category/1544310777.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `ID` int(11) NOT NULL,
  `EMAIL` text NOT NULL,
  `PASSWORD` text NOT NULL,
  `NAME` text NOT NULL,
  `PHONE_NUMBER` text NOT NULL,
  `COUNTRY` text NOT NULL,
  `CITY` text NOT NULL,
  `ADDRESS` text NOT NULL,
  `ZIP_CODE` text NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `EMAIL`, `PASSWORD`, `NAME`, `PHONE_NUMBER`, `COUNTRY`, `CITY`, `ADDRESS`, `ZIP_CODE`, `STATUS`) VALUES
(1, 'company@gmail.com', '32e632bdd06655bd48db7ea2454a8247', 'company name', '07999999', 'Jordan', 'Amman', 'address ...', '11134', 'accepted'),
(2, 'asus@gmail.com', 'ef69724cc7dacbf6a4c7ac3de7216f03', 'asus', '07999999', 'United States', 'LA', 'address ...', '11134', 'pending'),
(4, 'user1@gmail.com', 'c6cc640daac367a4aa1b4d8545feff63', 'lina', '07999999', 'Bangladesh', 'Dubai', 'address ...', '11134', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `SUBJECT` text NOT NULL,
  `PHONE_NUMBER` text NOT NULL,
  `MESSAGE` text NOT NULL,
  `TIME` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `NAME`, `EMAIL`, `SUBJECT`, `PHONE_NUMBER`, `MESSAGE`, `TIME`) VALUES
(4, 'helo', 's@gmail.com', 'sdc', '23', 'Hello,\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-22-10 23:02:46'),
(5, 'jknc', 'Book@gmail.com', 'kjb', 'lkjn', 'Hi,\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\nThanks, \nJohn Doe', '2018-22-10 23:03'),
(6, 'First Last Name', 'email@example.com', 'Important Note!', '078989898', 'Hi,\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nThanks, \r\nJohn Doe', '2018-22-10 23:03');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `NEWS` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `NEWS`) VALUES
(1, 'j'),
(2, 'This is rubbish news. Dont even listen to this banner. You will waste your time. Im telling ya.');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `ID` int(11) NOT NULL,
  `EMAIL` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`ID`, `EMAIL`) VALUES
(4, 'hello'),
(5, 'email@gmail.com'),
(6, 'hello'),
(10, 'subscribe'),
(11, 'email@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `AMOUNT` text CHARACTER SET utf8 NOT NULL,
  `DISCOUNT_PERCENTAGE` int(11) NOT NULL,
  `TIME` text CHARACTER SET utf8 NOT NULL,
  `STATUS` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `ORDER_ID`, `USER_ID`, `PRODUCT_ID`, `QUANTITY`, `AMOUNT`, `DISCOUNT_PERCENTAGE`, `TIME`, `STATUS`) VALUES
(3, 2, 1, 13, 2, '20', 0, '2018-11-11 18:04', 'shipped'),
(4, 2, 1, 20, 1, '950', 0, '2018-11-11 18:04', 'pending'),
(6, 3, 2, 22, 1, '300', 0, '2018-11-11 21:42', 'rejected'),
(7, 3, 2, 20, 1, '950', 0, '2018-11-11 21:42', 'shipped'),
(8, 4, 1, 19, 1, '899.99', 0, '2019-18-02 23:15', 'pending'),
(9, 4, 1, 21, 1, '899.99', 0, '2019-18-02 23:15', 'delivered'),
(11, 5, 1, 21, 2, '1799.98', 0, '2019-22-02 15:00', 'delivered'),
(12, 6, 1, 21, 1, '899.99', 0, '2019-22-02 15:23', 'delivered'),
(13, 7, 1, 21, 1, '809.99', 10, '2019-23-02 19:10', 'pending'),
(14, 7, 1, 19, 2, '1619.98', 10, '2019-23-02 19:10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `CATEGORY` int(11) NOT NULL,
  `SUB_CATEGORY` int(11) NOT NULL,
  `COMPANY` int(11) NOT NULL,
  `NAME` text CHARACTER SET utf8 NOT NULL,
  `PRICE` text CHARACTER SET utf8 NOT NULL,
  `OLD_PRICE` text CHARACTER SET utf8 NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 NOT NULL,
  `STATUS` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `CATEGORY`, `SUB_CATEGORY`, `COMPANY`, `NAME`, `PRICE`, `OLD_PRICE`, `DESCRIPTION`, `STATUS`) VALUES
(13, 3, 5, 0, 'name', '10', '100', 'descknn', 'inactive'),
(17, 3, 6, 0, 'smartphone', '5', '9.99', 'oiuytrrtyuiuyt', 'active'),
(18, 3, 5, 0, 'wwwg', '1', '2', 'dcc', 'active'),
(19, 2, 1, 1, 'camera canon high quality', '899.99', '1000', 'For photographers who want to step up from a smartphone or compact point and shoot camera, Canon hopes that the new EOS M100 will fit the bill.\r\nFull model name:	Canon EOS M100\r\nResolution:	24.20 Megapixels\r\nSensor size:	APS-C\r\n(22.3mm x 14.9mm)\r\nKit Lens:	3.00x zoom \r\n15-45mm \r\n(24-72mm eq.)\r\nViewfinder:	No / LCD\r\nNative ISO:	100 - 25,600\r\nExtended ISO:	100 - 25,600\r\nShutter:	1/4000 - 30 sec\r\nMax Aperture:	3.5 (kit lens)\r\nDimensions:	4.3 x 2.6 x 1.4 in.\r\n(108 x 67 x 35 mm)\r\nWeight:	10.7 oz (302 g)\r\nAvailability:	10/2017\r\nManufacturer:	Canon\r\nFull specs:	Canon EOS M100 specifications', 'active'),
(20, 2, 1, 1, 'camera canon red high quality', '950', '1300', 'The Canon PowerShot SX170 IS Digital Camera is a compact, point-and-shoot featuring a 16 megapixel 1/2.3\" CCD sensor and DIGIC 4 image processor to produce high-resolution, well-detailed stills and HD', 'active'),
(21, 2, 1, 1, 'camera canon EOS 6D specs', '899.99', '1020', '', 'active'),
(22, 2, 3, 1, 'camera Pocket Photo LG PC389 ', '300', '450', 'Model PC389. Auto Flash. One Button Reprinting. Photo Paper is not included', 'active'),
(24, 2, 1, 1, 'a\'a', '1000', '10000', '<p>a.khb ev.kjbwv.k</p>\r\n\r\n<p>evjw&#39;.sdvm&nbsp;</p>\r\n', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `IMAGE` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`ID`, `PRODUCT_ID`, `IMAGE`) VALUES
(10, 13, '../images/products/1540823452.png'),
(11, 13, '../images/products/1540829978.png'),
(12, 13, '../images/products/1540829979.png'),
(27, 17, '../images/products/1540836251smartphone.jpg'),
(28, 17, '../images/products/1540836251smartphone.jpg'),
(29, 17, '../images/products/1540836252smartphone.jpg'),
(30, 17, '../images/products/1540836252smartphone.jpg'),
(31, 18, '../images/products/1540836576191735bd74ce02f814.jpg'),
(32, 18, '../images/products/1540836576229705bd74ce03c4f1.jpg'),
(33, 18, '../images/products/154083657642035bd74ce040400.jpg'),
(34, 18, '../images/products/1540836576183765bd74ce046a7b.jpg'),
(36, 18, '../images/products/1540836663281925bd74d375d5d9.jpg'),
(37, 18, '../images/products/1540836663214655bd74d3779dce.jpg'),
(38, 18, '../images/products/15408366634145bd74d37836ac.jpg'),
(39, 19, '../images/products/1541512474279895be19d1a55e16.jpg'),
(40, 19, '../images/products/154151247490665be19d1a6c278.jpg'),
(41, 19, '../images/products/154151247441875be19d1a77bd2.jpg'),
(42, 19, '../images/products/1541512474248245be19d1a80ddf.jpg'),
(43, 19, '../images/products/154151247425135be19d1a8c893.jpg'),
(44, 20, '../images/products/154151260131265be19d99d4dc7.jpg'),
(45, 20, '../images/products/1541512601223275be19d99e46e8.jpg'),
(46, 20, '../images/products/154151260152845be19d99eae06.jpg'),
(47, 20, '../images/products/1541512601291975be19d99f1c4f.jpg'),
(48, 21, '../images/products/1541512740137625be19e245f666.jpg'),
(49, 21, '../images/products/1541512740122435be19e246a7e3.jpg'),
(50, 21, '../images/products/1541512740222885be19e247012a.jpg'),
(51, 21, '../images/products/154151274087135be19e2475598.jpg'),
(52, 22, '../images/products/1541512879276625be19eaf9e9af.jpg'),
(53, 22, '../images/products/1541512879302555be19eafb62bc.jpg'),
(54, 22, '../images/products/1541512879215645be19eafbfb53.jpg'),
(55, 22, '../images/products/1541512879219575be19eafc544c.jpg'),
(59, 24, '../images/products/155104498714407814455c73117b1ad0c.JPG'),
(60, 24, '../images/products/155110266211471530155c73f2c68b361.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promocode`
--

CREATE TABLE `promocode` (
  `ID` int(11) NOT NULL,
  `PROMOCODE` text NOT NULL,
  `PERCENTAGE` int(11) NOT NULL,
  `TEXT` text NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promocode`
--

INSERT INTO `promocode` (`ID`, `PROMOCODE`, `PERCENTAGE`, `TEXT`, `STATUS`) VALUES
(1, 'GIFT2019', 10, 'Use promo code: GIFT2019  ;) And Get 10% OFF per item.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `USERNAME` text NOT NULL,
  `RATING` int(11) NOT NULL,
  `REVIEW` text NOT NULL,
  `TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `ORDER_ID`, `PRODUCT_ID`, `USER_ID`, `USERNAME`, `RATING`, `REVIEW`, `TIME`) VALUES
(1, 4, 21, 1, 'New User ', 3, 'What an amazing product! I like it so much.\r\nRecommended.\r\nI will buy more for sure!', '2019-02-22'),
(2, 5, 21, 1, 'New User ', 4, '', '2019-02-22'),
(3, 6, 21, 1, 'New User ', 5, 'Great !', '2019-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `ID` int(11) NOT NULL,
  `CATEGORY` int(11) NOT NULL,
  `SUB_CATEGORY` text CHARACTER SET utf8 NOT NULL,
  `IMAGE` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`ID`, `CATEGORY`, `SUB_CATEGORY`, `IMAGE`) VALUES
(1, 2, 'Canon', '../images/sub_category/1540240865.jpg'),
(3, 2, 'LG', '../images/sub_category/1540402604.jpg'),
(4, 5, 'Baby', '../images/sub_category/1540402815.jpg'),
(5, 3, 'Laptop', '../images/sub_category/1540403584.jpg'),
(6, 3, 'Lenovo', '../images/sub_category/1540403719.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `ID` int(11) NOT NULL,
  `EMAIL` text CHARACTER SET utf8 NOT NULL,
  `PASSWORD` text CHARACTER SET utf8 NOT NULL,
  `NAME` text CHARACTER SET utf8 NOT NULL,
  `PHONE_NUMBER` varchar(20) CHARACTER SET utf8 NOT NULL,
  `GENDER` text CHARACTER SET utf8 NOT NULL,
  `COUNTRY` text CHARACTER SET utf8 NOT NULL,
  `CITY` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ADDRESS` text CHARACTER SET utf8 NOT NULL,
  `ZIP_CODE` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`ID`, `EMAIL`, `PASSWORD`, `NAME`, `PHONE_NUMBER`, `GENDER`, `COUNTRY`, `CITY`, `ADDRESS`, `ZIP_CODE`) VALUES
(1, 'user@Book.com', '5a45d7150c4576642949f25e0bb8098c', 'New User ', '078888888', 'Female', 'Jordan', 'Amman', 'Airport Rd, 25b', '11142'),
(2, 'user2@gmail.com', '5a45d7150c4576642949f25e0bb8098c', 'user2', '079999999', 'Male', 'Jordan', 'Amman', 'al-anbat, 14a', '11134');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`ID`, `USER_ID`, `PRODUCT_ID`, `QUANTITY`) VALUES
(3, 2, 2, 0),
(4, 3, 3, 3),
(5, 4, 4, 4),
(12, 1, 22, 1),
(13, 2, 22, 1),
(14, 2, 21, 1),
(15, 1, 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `promocode`
--
ALTER TABLE `promocode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `promocode`
--
ALTER TABLE `promocode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
