-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 05:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elib`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `picture` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ID`, `text`, `picture`) VALUES
(11, 'Deadline for Registration: November 10, 2023 (Friday) Look for Mr. Jp Chicano (College Department)', '/elibrary/pics-announcement/6564be9616da79.96513662.jpg'),
(12, 'Deadline for Registration: November 10, 2023 (Friday) Look for Mr. Jp Chicano (College Department)', '/elibrary/pics-announcement/6564bebf637f22.44192951.jpg'),
(13, 'Deadline for Registration: November 10, 2023 (Friday) Look for Mr. Jp Chicano (College Department)', '/elibrary/pics-announcement/6564bedc370151.19836326.jpg'),
(14, 'Greetings, IETIANS! 🔰 Our schedule for upcoming 1st-semester Midterm examinations is on November 6 to November 11, 2023.  Good luck, students! MAKE YOURSELF PROUD! ✨🤩 #IETISPCSL follow our page for more updates.', '/elibrary/pics-announcement/6564ca096b1682.93271067.jpg'),
(15, 'Greetings IETIANS ! 🔰 This is to inform everyone that this coming thursday, October 26, 2023 (11am-12nn), we will be having a Synchronized Meeting by Department. Room Assignments are to be announced on your respective group chats.  #IETISPCSL follow ', '/elibrary/pics-announcement/6564ca1a6a5495.80916359.jpg'),
(16, 'Greetings IETIANS ! 🔰 Due to the Nationwide Transport Strike, classes are Online today, October 16, 2023. #IETISPCSL follow our page for more updates.', '/elibrary/pics-announcement/6564ca3948a227.81784153.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(150) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `Author` varchar(150) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Category` varchar(150) NOT NULL,
  `Course` varchar(150) NOT NULL,
  `Year_lvl` varchar(150) NOT NULL,
  `img` varchar(150) NOT NULL,
  `file` mediumtext NOT NULL,
  `archive` int(250) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `Title`, `Author`, `Description`, `Category`, `Course`, `Year_lvl`, `img`, `file`, `archive`) VALUES
(95, 'Python Programming. Python Programming for Beginners, Python Programming for Intermediates', 'Adam Stewart', 'Python Programming Language', 'Programming', 'DIT', '1st Year', '/elibrary/Uploads/655f62933e17b9.74049941.jpg', '/elibrary/FileUploads/655f62933e3b25.83157877.pdf', 0),
(96, 'Programming with Microsoft Visual Basic 2017', 'Diane Zak', 'Microsoft Visual Basic 2017', 'Programming', 'BSIT', '3rd Year', '/elibrary/Uploads/655f62f50486e5.56565893.jpg', '/elibrary/FileUploads/655f62f504f493.26448705.pdf', 0),
(97, 'Head First JavaScript Programming A Brain-Friendly Guide ', 'Elisabeth Robson, Eric T. Freeman', 'JavaScript Programming', 'Programming', 'BSIT', '4th Year', '/elibrary/Uploads/655f63b72face8.95223810.jpg', '/elibrary/FileUploads/655f63b72fe0e5.25016033.pdf', 1),
(98, 'Cliffs Study Solver English Grammar', 'Jeff Coghill, Stacy Magedanz', 'English Grammar', 'English', 'BEED', '1st Year', '/elibrary/Uploads/6561ec0333bc36.83639478.jpg', '/elibrary/FileUploads/6561ec0333ea53.56377031.pdf', 1),
(99, 'English Sentence Structure', 'University of Michigan Press', 'English', 'English', 'BEED', '2nd Year', '/elibrary/Uploads/6561ed58c883e9.31386880.jpg', '/elibrary/FileUploads/6561ed58c8a4c0.13098727.pdf', 1),
(100, 'Special Education Elementary Teachers Perceptions of Daily Living Skills Instruction for Students ', 'D. Walden University', 'Education', 'Education', 'BEED', '3rd Year', '/elibrary/Uploads/6561edefdcc0e0.01891579.jpg', '/elibrary/FileUploads/6561edefdcfa58.83883016.pdf', 1),
(102, 'Wonders of Numbers Adventures in Mathematics, Mind, and Meaning', 'Clifford A. Pickover', 'Mathematics', 'Mathematics', 'BEED', '1st Year', '/elibrary/Uploads/6561eeff46d8f2.90312288.jpg', '/elibrary/FileUploads/6561eeff471d52.18085255.pdf', 1),
(103, 'Business Communication', 'Peter Hartley and Clive G. Bruck mann ', 'Business Communication', 'Business Communication', 'BSBA', '1st Year', '/elibrary/Uploads/6561efe5507bf8.01076465.jpg', '/elibrary/FileUploads/6561efe550a788.26084158.pdf', 1),
(104, 'Basic Microeconomics', 'A. Koutsoyiannis', 'MicroEconomics', 'MicroEconomics', 'BSBA', '2nd Year', '/elibrary/Uploads/6561f03edd11d4.10923400.jpg', '/elibrary/FileUploads/6561f03edd3bb9.12070577.pdf', 1),
(105, ' Principles of Management ', 'Open Stax', 'Management', 'Management', 'BSBA', '3rd Year', '/elibrary/Uploads/6561f07bb0da16.21993801.jpg', '/elibrary/FileUploads/6561f07bb106a0.83899920.pdf', 1),
(106, 'Total Quality Management', 'S. Uthanu Mallayan, Lecturer M. Pugazh, Lecturer (SS)', 'Management', 'Management', 'BSBA', '1st Year', '/elibrary/Uploads/6561f1153cf5b6.26505570.jpg', '/elibrary/FileUploads/6561f1153d2244.42343161.pdf', 1),
(107, 'Customs Tariff 2012', 'The Director of Customs  Icelandic', 'Customs', 'Customs', 'BSCA', '1st Year', '/elibrary/Uploads/6561fa38d94779.98210608.jpg', '/elibrary/FileUploads/6561fa38d97252.68081805.pdf', 1),
(108, 'Dimensions of Human Behavior Person and Environment ', 'Elizabeth D. Hutchison', 'Human Behavior', 'Customs', 'BSCA', '2nd Year', '/elibrary/Uploads/6561fa75390833.32222725.jpg', '/elibrary/FileUploads/6561fa753934e0.03358912.pdf', 1),
(109, 'TRANSFORMATION OF LOGISTICS AND SUPPLY  CHAIN MANAGEMENT IN CONTEXT OF  DELOPING ADDITIVE MANUFACTURING', 'Kuznetsova Elizaveta Vadimovna', 'Logistics and Supply Chain', 'Customs', 'BSCA', '4th Year', '/elibrary/Uploads/6561fabf0f7ba2.73932928.jpg', '/elibrary/FileUploads/6561fabf0fa746.51133373.pdf', 1),
(110, 'Data Structure and Algorithmic Thinking with Python Data Structure and Algorithmic Puzzles', 'Narasimha Karumanchi', 'Data Structure and Algorithmic', 'Data Structure ', 'BSCPE', '3rd Year', '/elibrary/Uploads/6561fbd6d3cd98.14140740.jpg', '/elibrary/FileUploads/6561fbd6d41885.68549811.pdf', 1),
(111, 'Digital Communication System', 'Simon Haykin', 'Digital Communication', 'Communication', 'BSCPE', '1st Year', '/elibrary/Uploads/6561fc2c264a85.37669401.jpg', '/elibrary/FileUploads/6561fc2c268a57.67105129.pdf', 1),
(112, 'Digital Logic Circuit Analysis and Design', 'Victor P. Nelson H. Troy Nagle  Bill D. Caroll  J. David Irwin', 'Logic Circuit', 'Circuit', 'BSCPE', '4th Year', '/elibrary/Uploads/6561fc7113a510.56012964.jpg', '/elibrary/FileUploads/6561fc7113d4d9.42040045.pdf', 1),
(117, 'Operating Systems', 'D. Dhamdhere', 'DIT', 'OS', 'DIT', '2nd Year', '/elibrary/Uploads/65622e37dd6b12.32892685.jpg', '/elibrary/FileUploads/65622e37e07be0.83192140.pdf', 1),
(119, 'Catering Management, 3rd Edition', 'Nancy Loman Scanlon', 'Catering Management', 'Management', 'BSHRM', '1st Year', '/elibrary/Uploads/6563accca0aef0.53534794.jpg', '/elibrary/FileUploads/6563accca16523.74590800.pdf', 1),
(120, 'Food, Cuisine, and Cultural Competency for Culinary, Hospitality, and Nutrition Professionals', 'Sari Edelstein, PhD, RD', 'Culinary', 'Management', 'BSHRM', '1st Year', '/elibrary/Uploads/6563adfa3b78a6.68423476.jpg', '/elibrary/FileUploads/6563adfa3bcfc4.69619235.pdf', 1),
(121, 'Strategic Supply Chain Management', 'Shoshanah Cohen, Joseph Roussel', 'Strategic Supply Chain Management', 'Management', 'BSHRM', '1st Year', '/elibrary/Uploads/6563ae59b8e823.43269226.jpg', '/elibrary/FileUploads/6563ae59b92838.01119147.pdf', 1),
(122, 'Transformative Professional Development', 'Christopher Stewart Keyes ', 'Transformative Professional Development', 'Transformative Professional Development', 'BSHRM', '3rd Year', '/elibrary/Uploads/6563aea020d755.93481998.jpg', '/elibrary/FileUploads/6563aea0217936.19005058.pdf', 1),
(123, 'Wildlife Tourism (Aspects of Tourism)', 'David Newsome, Ross K. Dowling, Susan A. Moore', 'A landmark contribution to the field', 'Wildlife Tourism', 'BSHRM', '4th Year', '/elibrary/Uploads/6563aefc746480.06437497.jpg', '/elibrary/FileUploads/6563aefc74b4e0.48386555.pdf', 1),
(129, 'aw', 'aw', 'aw', 'aw', 'BSIT', '1st Year', '/elibrary/Uploads/6569daed76f271.35221893.jpg', '/elibrary/FileUploads/6569daed78af34.14207989.jpg', 1),
(130, 'awwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'aw', 'aw', 'we', 'BSIT', '1st Year', '/elibrary/Uploads/6569e00024d847.26275828.jpg', '/elibrary/FileUploads/6569e000252049.21085775.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(150) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Course_Yrlevel` varchar(150) NOT NULL,
  `ID_Number` varchar(255) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Account_type` varchar(150) NOT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Course_Yrlevel`, `ID_Number`, `Email`, `Password`, `Account_type`, `verified`) VALUES
(18, 'ADMIN', 'N/A', '0', '123', '123', 'admin', 1),
(33, 'Jarod Ong', 'BSIT 4th Year', '1234', 'jarodpeterong55@gmail.com', 'bbb', 'admin', 1),
(34, 'JJ Sorila', 'BSIT 4th Year', '123456789', '1234@gmail.com', '29', 'student', 1),
(42, 'Kick Buttowski', 'BSCPE', '896534', 'ggg', 'ggg', 'student', 1),
(43, 'Jeff Garcia', 'BSHRM', '5467457', 'jeff@gmail.com', 'jeff', 'admin', 1),
(49, 'aw', 'aw', '0', 'aw', 'aw', 'student', 1),
(50, 'Mikee Quintos', 'BSBA MM', '2147483647', 'mikeeqguisihan@gmail.com', '12345678', 'student', 1),
(59, 'Mikee', 'Mikee', '09063134710', 'ss', 'ss', 'admin', 1),
(71, 'niña angela U. Torrente', 'BSIT', '12345678', 'nina', 'nina', 'student', NULL),
(72, 'dw', 'wd', 'wd', 'dddd', 'dddd', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `active_user` int(250) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`active_user`) VALUES
(1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
