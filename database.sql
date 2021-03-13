-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for system1
CREATE DATABASE IF NOT EXISTS `system1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `system1`;

-- Dumping structure for table system1.customer_tbl
CREATE TABLE IF NOT EXISTS `customer_tbl` (
  `Customer_id` int(64) NOT NULL AUTO_INCREMENT,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Address` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL,
  PRIMARY KEY (`Customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table system1.customer_tbl: ~10 rows (approximately)
/*!40000 ALTER TABLE `customer_tbl` DISABLE KEYS */;
INSERT INTO `customer_tbl` (`Customer_id`, `Cust_Name`, `Cust_Address`, `Contact_Number`) VALUES
	(1, 'Shin', 'Beltran', '0977289832'),
	(2, 'Jessa Pagal', 'Carpenter Hill', '09445231667'),
	(3, 'Connor Davenport', 'Koronadal', '0972981235'),
	(4, 'Jayson Balolong', 'Koronadal City South Cotabato', '09669846229'),
	(5, 'Achiles D SSasdasd', 'Koronadal City', '09669846321'),
	(6, 'Charles Darwin', 'Koronadal', '09669812232'),
	(7, 'Charles KOkey', 'Koronadal', '0966981111'),
	(8, 'Charot Lang', 'Marbel', '12346123'),
	(9, 'Jose Bonifacio', 'Koronadal City South Cotabato PH', '09522462514'),
	(10, 'Caitlyn', 'San Jose', '091236123'),
	(11, 'Uzumaki Naruto', 'Kunaha', '0912312361');
/*!40000 ALTER TABLE `customer_tbl` ENABLE KEYS */;

-- Dumping structure for table system1.product_tbl
CREATE TABLE IF NOT EXISTS `product_tbl` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `Supplier_ID` int(10) NOT NULL,
  `Prod_Desc` varchar(50) NOT NULL,
  `Prod_Qty` int(25) NOT NULL,
  `Prod_Cost` decimal(7,2) NOT NULL,
  `Prod_Date` date NOT NULL,
  `Prod_Code` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `Supplier_ID` (`Supplier_ID`),
  CONSTRAINT `Supplier_ID` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_tbl` (`Supplier_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table system1.product_tbl: ~4 rows (approximately)
/*!40000 ALTER TABLE `product_tbl` DISABLE KEYS */;
INSERT INTO `product_tbl` (`product_id`, `Supplier_ID`, `Prod_Desc`, `Prod_Qty`, `Prod_Cost`, `Prod_Date`, `Prod_Code`) VALUES
	(1, 1, 'Kamatis', 5, 9.99, '2021-03-13', '56227'),
	(6, 1, 'NameProductEx', 1, 2.00, '2021-03-13', '62347'),
	(9, 1, 'tesg32food', 3, 14.00, '2021-03-25', '72348'),
	(10, 1, 'asdasd', 2, 61.00, '2021-03-13', '92341'),
	(14, 1, 'Hi Ho', 2, 6.00, '2021-03-11', '16123');
/*!40000 ALTER TABLE `product_tbl` ENABLE KEYS */;

-- Dumping structure for table system1.sales_tbl
CREATE TABLE IF NOT EXISTS `sales_tbl` (
  `Sales_ID` int(64) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Sold_Qty` int(11) NOT NULL,
  `Total_Sold` decimal(3,2) NOT NULL,
  `Sales_Date` date NOT NULL,
  PRIMARY KEY (`Sales_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  CONSTRAINT `Product_ID` FOREIGN KEY (`Product_ID`) REFERENCES `product_tbl` (`product_id`),
  CONSTRAINT `sales_tbl_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer_tbl` (`Customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table system1.sales_tbl: ~1 rows (approximately)
/*!40000 ALTER TABLE `sales_tbl` DISABLE KEYS */;
INSERT INTO `sales_tbl` (`Sales_ID`, `Product_ID`, `Customer_ID`, `Sold_Qty`, `Total_Sold`, `Sales_Date`) VALUES
	(2, 1, 1, 12, 3.00, '2021-03-13');
/*!40000 ALTER TABLE `sales_tbl` ENABLE KEYS */;

-- Dumping structure for table system1.supplier_tbl
CREATE TABLE IF NOT EXISTS `supplier_tbl` (
  `Supplier_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Supp_Company` varchar(50) NOT NULL,
  `Supp_Contact_No` varchar(50) NOT NULL,
  `Supp_address` varchar(50) NOT NULL,
  PRIMARY KEY (`Supplier_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table system1.supplier_tbl: ~4 rows (approximately)
/*!40000 ALTER TABLE `supplier_tbl` DISABLE KEYS */;
INSERT INTO `supplier_tbl` (`Supplier_ID`, `Supp_Company`, `Supp_Contact_No`, `Supp_address`) VALUES
	(1, 'Samsung', '09237512312', 'General Santos City'),
	(2, 'Kawasaki', '09303447974', 'Koronadal City'),
	(3, 'Jack n Jill', '0828321231', 'Tupi South Cotabato'),
	(4, 'Honada Socksargen', '09751236123', 'Koronadal City'),
	(5, 'Johnson', '0976123123', 'Surallah');
/*!40000 ALTER TABLE `supplier_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
