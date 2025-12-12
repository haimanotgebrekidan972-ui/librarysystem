-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2025 at 10:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_code` varchar(45) NOT NULL,
  `author_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_code`, `author_name`) VALUES
('401', 'tesfu beley'),
('402', 'seyfe beyene'),
('403', 'mulu kasa'),
('404', 'mututs beruhu'),
('405', 'ayale abebe'),
('406', 'tekeste nru');

-- --------------------------------------------------------

--
-- Table structure for table `authorcontact`
--

CREATE TABLE `authorcontact` (
  `author_code` varchar(45) NOT NULL,
  `contact_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorcontact`
--

INSERT INTO `authorcontact` (`author_code`, `contact_no`) VALUES
('401', '0976343565'),
('402', '0975666553545'),
('401', '0976968764'),
('403', '09775535425'),
('404', '0973543227'),
('405', '09857659866'),
('406', '09763485545'),
('406', '097745654233'),
('403', '097676554');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_code` varchar(45) NOT NULL,
  `author_code` varchar(45) DEFAULT NULL,
  `library_code` varchar(25) DEFAULT NULL,
  `publisher_cod` varchar(30) DEFAULT NULL,
  `publish_date` varchar(50) DEFAULT NULL,
  `book_price` decimal(8,2) DEFAULT NULL,
  `book_status` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_code`, `author_code`, `library_code`, `publisher_cod`, `publish_date`, `book_price`, `book_status`) VALUES
('11', '401', 'mit-104', '201', '2008', 150.23, 'social science'),
('22', '402', 'mit-102', '202', '2009', 405.76, 'natural science'),
('33', '403', 'mit-103', '203', '2002', 202.54, 'maths science'),
('44', '404', 'mit-104', '204', '2003', 654.63, 'natural science'),
('55', '405', 'mit-102', '205', '2010', 25923.00, 'social science'),
('66', '406', 'mit-103', '206', '2011', 645.23, 'psychology');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `book_code` varchar(45) DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `due_date` varchar(25) DEFAULT NULL,
  `return_date` varchar(25) DEFAULT NULL,
  `issue` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`book_code`, `user_id`, `due_date`, `return_date`, `issue`) VALUES
('11', '301', '01-12-2025', '15-12-2025', 'for reading'),
('22', '302', '02-12-2025', '16-12-2025', 'for teaching'),
('33', '303', '03-12-2025', '17-12-2025', 'for homework'),
('44', '304', '04-12-2025', '18-12-2025', 'for reading'),
('55', '305', '05-12-2025', '19-12-2025', 'for reading');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `librarian_code` varchar(30) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `library_code` varchar(30) DEFAULT NULL,
  `contact_no` varchar(60) DEFAULT NULL,
  `designation` varchar(120) DEFAULT NULL,
  `date_of_birth` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`librarian_code`, `fname`, `mname`, `lname`, `library_code`, `contact_no`, `designation`, `date_of_birth`, `password`) VALUES
('A001', 'mengesha', 'meresa', 'negash', 'mit-102', '09645323556', 'manager', '29-08-2009', '2121'),
('AY001', 'ksanet', 'megersa', 'mekonen', 'mit-103', '0976845332', 'manager', '06-05-1985', '2121'),
('M001', 'kidane', 'mebrahtu', 'negash', 'mit-104', '0956365414', 'manager', '19-05-1999', '2121');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `library_code` varchar(25) NOT NULL,
  `library_address` varchar(50) DEFAULT NULL,
  `contact_no` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`library_code`, `library_address`, `contact_no`) VALUES
('mit-102', 'arid campus', 'aridlibrary@gmail.com'),
('mit-103', 'ayder campus', 'ayderlibrary@gmail.com'),
('mit-104', 'mitcampus', 'mitlibrary@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `membercontact`
--

CREATE TABLE `membercontact` (
  `user_id` varchar(30) NOT NULL,
  `contact_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membercontact`
--

INSERT INTO `membercontact` (`user_id`, `contact_no`) VALUES
('301', '0974653232'),
('302', '09755642473'),
('301', '09788743'),
('302', '0974653232'),
('301', '065382990'),
('303', '0974321635'),
('304', '098754346'),
('305', '0954635346'),
('301', '09746534432'),
('306', '097645465456'),
('307', '0938199781');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` varchar(30) NOT NULL,
  `m_fname` varchar(50) DEFAULT NULL,
  `m_mname` varchar(50) DEFAULT NULL,
  `m_lname` varchar(50) DEFAULT NULL,
  `m_address` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `m_fname`, `m_mname`, `m_lname`, `m_address`, `password`) VALUES
('301', 'mesel', 'nega', 'girmay', 'aynalem campus', '2121'),
('302', 'mebrat', 'teklu', 'girmay', 'aynalem campus', '2121'),
('303', 'temesgen', 'mulu', 'welu', 'ayder campus', '2121'),
('304', 'meresa', 'nega', 'tsehaye', 'arid campus', '2121'),
('305', 'abebe', 'mola', 'girmay', 'arid campus', '2121'),
('306', 'teklit', 'welu', 'guesh', 'ayder campus', '2121'),
('307', 'Haymanot', 'Gebrekidan', 'Bahta', 'mit campuse', '2127');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_cod` varchar(30) NOT NULL,
  `publisher_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_cod`, `publisher_name`, `address`) VALUES
('201', 'd.r ankle norge', 'USA'),
('202', 'mamo noh', 'addis abeba'),
('203', 'sbhat g/heir', 'mekelle'),
('204', 'd.r kudus belay', 'bahrdar'),
('205', 'taka abebe', 'axum'),
('206', 'samrawit mulu', 'wdawa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_code`);

--
-- Indexes for table `authorcontact`
--
ALTER TABLE `authorcontact`
  ADD KEY `author_code` (`author_code`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_code`),
  ADD KEY `author_code` (`author_code`),
  ADD KEY `library_code` (`library_code`),
  ADD KEY `publisher_cod` (`publisher_cod`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `book_code` (`book_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`librarian_code`),
  ADD KEY `library_code` (`library_code`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`library_code`);

--
-- Indexes for table `membercontact`
--
ALTER TABLE `membercontact`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_cod`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorcontact`
--
ALTER TABLE `authorcontact`
  ADD CONSTRAINT `authorcontact_ibfk_1` FOREIGN KEY (`author_code`) REFERENCES `author` (`author_code`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_code`) REFERENCES `author` (`author_code`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`library_code`) REFERENCES `library` (`library_code`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`publisher_cod`) REFERENCES `publisher` (`publisher_cod`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_code`) REFERENCES `books` (`book_code`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`);

--
-- Constraints for table `librarian`
--
ALTER TABLE `librarian`
  ADD CONSTRAINT `librarian_ibfk_1` FOREIGN KEY (`library_code`) REFERENCES `library` (`library_code`);

--
-- Constraints for table `membercontact`
--
ALTER TABLE `membercontact`
  ADD CONSTRAINT `membercontact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
