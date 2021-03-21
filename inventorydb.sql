-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 11:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `Customer_id` int(64) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Address` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`Customer_id`, `Cust_Name`, `Cust_Address`, `Contact_Number`) VALUES
(1, 'ekek', 'koronadal City', '09090909'),
(2, 'JOSE', 'GALAXY', '09080808'),
(3, 'BON MALANOG', 'KORONADAL CITY', '982138201031');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `Barcode` int(11) NOT NULL,
  `Prod_Desc` varchar(50) NOT NULL,
  `Prod_Qty` int(25) NOT NULL,
  `Prod_Cost` decimal(7,2) NOT NULL,
  `Prod_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `supplier_id`, `Barcode`, `Prod_Desc`, `Prod_Qty`, `Prod_Cost`, `Prod_Date`) VALUES
(1, 5, 12345, 'FRESH LARGE EGG', 1000, '6.00', '2021-03-04'),
(2, 1, 67890, 'TOCINO 1KG/PACK', 100, '100.00', '2021-03-01'),
(4, 3, 13456, 'PIATOS CHEESE', 100, '9.99', '2021-03-07'),
(5, 7, 55555, 'MARINATED PIG', 100, '9.99', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `sales_tbl`
--

CREATE TABLE `sales_tbl` (
  `Sales_ID` int(64) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Sold_Qty` int(64) NOT NULL,
  `Total_Sold` decimal(7,2) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_tbl`
--

INSERT INTO `sales_tbl` (`Sales_ID`, `Product_ID`, `Customer_ID`, `Sold_Qty`, `Total_Sold`, `Date`) VALUES
(1, 5, 3, 2, '9.99', '2021-03-02'),
(2, 1, 3, 12, '72.00', '2021-03-02'),
(3, 4, 2, 2, '40.00', '0000-00-00'),
(4, 1, 3, 12, '72.00', '2021-03-02'),
(5, 4, 2, 2, '40.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `Supplier_ID` int(10) NOT NULL,
  `Supp_Company` varchar(50) NOT NULL,
  `Supp_Contact_No` varchar(50) NOT NULL,
  `Supp_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`Supplier_ID`, `Supp_Company`, `Supp_Contact_No`, `Supp_address`) VALUES
(1, 'ALOOT', '09121231231', 'Koronadal'),
(2, 'Uniliver', '09303447974', 'Koronadal'),
(3, 'JACK N JILL', '0980320', 'MANILA'),
(4, 'KCC', '028408249820942', 'DGDFGFD'),
(5, 'BIOTECH', '12312321', 'BANGA'),
(6, 'BOUNTY FRESH', '82348234982', 'GENSAN'),
(7, 'MONTERE', '13123123012', 'MANILA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Supplier_ID` (`supplier_id`);

--
-- Indexes for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  ADD PRIMARY KEY (`Sales_ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `Customer_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  MODIFY `Sales_ID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `Supplier_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD CONSTRAINT `Supplier_ID` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_tbl` (`Supplier_ID`);

--
-- Constraints for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  ADD CONSTRAINT `Product_ID` FOREIGN KEY (`Product_ID`) REFERENCES `product_tbl` (`product_id`),
  ADD CONSTRAINT `sales_tbl_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer_tbl` (`Customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
