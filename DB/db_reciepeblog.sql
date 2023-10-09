-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 06:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reciepeblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(54) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_preprationdetails` varchar(500) NOT NULL,
  `blog_time` varchar(50) NOT NULL,
  `blog_ingredients` varchar(300) NOT NULL,
  `blog_photo` varchar(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `subcategory_id` int(54) NOT NULL,
  `blog_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `blog_preprationdetails`, `blog_time`, `blog_ingredients`, `blog_photo`, `user_id`, `subcategory_id`, `blog_date`) VALUES
(2, 'Ghee Rice', 'cook rice', '30 minutes', 'Rice', 'Screenshot (1).png', 1, 18, '01-10-2023'),
(3, 'chappati', 'boil', '10 min', 'wheat', 'dad0dfcbc9b00012180b35310e667525 (2).jpg', 1, 25, '06-10-2023'),
(4, 'vada', 'fry\r\n', '20 min', 'Urad dal', 'Screenshot (10).png', 1, 26, '06-10-2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(50) NOT NULL,
  `category_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Lunch'),
(2, 'dinner'),
(8, 'breakfast'),
(9, 'Evening tea');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(54) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_details` varchar(50) NOT NULL,
  `complaint_reply` varchar(20) NOT NULL DEFAULT 'Not Replied Yet',
  `complaint_status` varchar(20) NOT NULL DEFAULT '0',
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_date`, `complaint_title`, `complaint_details`, `complaint_reply`, `complaint_status`, `user_id`) VALUES
(1, '2023-10-06', 'Slow', 'Site slow', 'will fix', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(54) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `order_details` varchar(200) NOT NULL,
  `order_fordate` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT '0',
  `order_amount` varchar(200) NOT NULL DEFAULT '0',
  `payment_status` varchar(30) NOT NULL DEFAULT '0',
  `order_address` varchar(200) NOT NULL,
  `order_username` varchar(50) NOT NULL,
  `order_usercontact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_date`, `user_id`, `blog_id`, `order_details`, `order_fordate`, `order_status`, `order_amount`, `payment_status`, `order_address`, `order_username`, `order_usercontact`) VALUES
(1, '2023-10-05', 2, 2, 'Food for 20 people', '2023-10-15', '4', '1000', '1', 'Thodupuzha', 'Arsal', '86934768953'),
(2, '2023-10-06', 2, 2, 'ajfgua', '2023-10-17', '4', '1000', '1', 'sgs', 'sdnjs', '8281467320'),
(3, '2023-10-06', 2, 0, 'uytfwhufuw', '2023-10-17', '0', '0', '0', 'ksydfyfgrg', 'arsalll', '99999999999'),
(4, '2023-10-06', 2, 3, 'for 100 peoples 2 each', '2023-10-24', '4', '2000', '1', 'todupuzha\r\n', 'arsalll', '8281467320'),
(5, '2023-10-06', 2, 4, 'for 500 peoples', '2023-10-26', '2', '0', '0', 'todupuzha', 'arsalll', '8281467320'),
(6, '2023-10-07', 2, 3, 'fsfsgs', '2023-10-08', '0', '0', '0', 'sdgfsg', 'dfdss', '8846372910');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(54) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(50) NOT NULL,
  `user_id` int(20) NOT NULL,
  `blog_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `user_name`, `user_review`, `user_rating`, `user_id`, `blog_id`) VALUES
(1, '2023-10-06 09:36:52', 'Someone', 'Good Recipie ', '5', 2, 2),
(2, '2023-10-06 11:32:25', 'farookh', 'very delicious\n', '5', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(54) NOT NULL,
  `subcategory_name` varchar(500) NOT NULL,
  `category_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(4, '', 0),
(5, 'ghee rice', 0),
(6, 'ghee rice', 0),
(7, 'ghee rice', 0),
(18, 'ghee rice', 1),
(23, 'mattan', 1),
(24, 'appam', 3),
(25, 'chappati', 2),
(26, 'vada', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(54) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(54) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_password` varchar(54) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_photo`, `user_description`) VALUES
(1, 'Farookh', 'fasgtfksyu7654@gmail.com', '4756568568', 'farookh123', 'Screenshot (1).png', 'tfsgifsgtfd'),
(2, 'Arsal Naseer', 'arsal@gmail.com', '86064545', 'arsal12', 'Screenshot (1).png', 'dgshgsdfhd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
