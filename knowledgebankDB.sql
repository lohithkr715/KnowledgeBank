-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 06:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledgebank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(12, 'Management Studies'),
(13, 'Computer Science'),
(14, 'Science'),
(15, 'Social Science'),
(16, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(200) NOT NULL,
  `faculty_designation` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `faculty_status` int(2) NOT NULL,
  `faculty_reg_date` date NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `faculty_name`, `faculty_designation`, `password`, `mobile`, `faculty_status`, `faculty_reg_date`, `email`) VALUES
(2, 'Amitabh Singh', 'Assistant Professor', '11111', 2147483647, 1, '2020-04-17', 'Amitabh.Singh@gmail.com'),
(3, 'Amar Singh', 'Professor', '11111', 2147483647, 1, '2020-04-17', 'Amarsingh@yahoo.com'),
(4, 'Dr Ashish Kumar Gupta', 'Proffesor', '11111', 2147483647, 1, '2020-04-26', 'ashish@gmail.com'),
(5, 'Arvind Singh', 'Proffesor', '11111', 2147483647, 1, '2020-04-26', 'arvindsingh@gmail.com'),
(6, 'Anmol Jaiswal', 'Ad. Manager', '11111', 2147483647, 1, '2020-04-26', 'anmol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(4, 'Programming Language', 13),
(5, 'Software Engineering', 13),
(6, 'Computer Network', 13),
(7, 'Accounts', 12),
(8, 'Economics', 12),
(9, 'Principles of Management Studies', 12),
(10, 'Probability', 16),
(11, 'Integration', 16),
(12, 'Physics', 14),
(13, 'Chemistry', 14),
(14, 'Biology', 14),
(15, 'History', 15),
(16, 'Civics', 15),
(17, 'Geography', 15),
(18, 'Aptitude', 16),
(19, 'Reasoning', 16),
(20, 'Data Interpretation', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topic`
--

CREATE TABLE `tbl_topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(500) NOT NULL,
  `faculty_email` varchar(200) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `topic_upload_date` date NOT NULL,
  `topic_description` varchar(1000) NOT NULL,
  `topic_status` int(2) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_topic`
--

INSERT INTO `tbl_topic` (`topic_id`, `topic_name`, `faculty_email`, `file_name`, `topic_upload_date`, `topic_description`, `topic_status`, `subcategory_id`) VALUES
(10, 'OSILayer', 'Amitabh.Singh@gmail.com', '1487144906.png', '2020-04-17', '7 Layer of OSI Model', 1, 0),
(11, 'sd', 'Amitabh.Singh@gmail.com', '1972563273.png', '2020-04-17', 'adad', 1, 6),
(12, 'Ledger', 'Amarsingh@yahoo.com', '594650713.html', '2020-04-17', 'ledger is an imporatant Topiic', 1, 7),
(13, 'Testing', 'aditya@gmail.com', '1311053735.png', '2020-04-26', 'In computer hardware and software development, testing is used at key checkpoints in the overall process to determine whether objectives are being met. For example, in software development, product objectives are sometimes tested by product user representatives.', 1, 5),
(14, 'PHP', 'aditya@gmail.com', '1284120205.jpg', '2020-04-26', 'PHP is a popular general-purpose scripting language that is especially suited to web development. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group', 1, 4),
(15, 'SRS', 'aditya@gmail.com', '69534284.jpg', '2020-04-26', 'A software requirements specification is a description of a software system to be developed. It is modeled after business requirements specification, also known as a stakeholder requirements specification.', 1, 9),
(16, 'Java', 'rgg@gmail.com', '1382133577.jpg', '2020-04-26', 'Java is a general-purpose programming language that is class-based, object-oriented, and designed to have as few implementation dependencies as possible', 1, 4),
(17, 'HTML CSS', 'rgg@gmail.com', '1083587845.jpg', '2020-04-26', 'Search Results\r\nWeb results\r\n\r\nHTML CSS - W3Schoolswww.w3schools.com › html › html_css\r\nCSS stands for Cascading Style Sheets. CSS describes how HTML elements are to be displayed on screen, paper, or in other media. CSS saves a lot of work. It can control the layout of multiple web pages all at once. ... Inline - by using the style attribute in HTML elements.\r\n?HTML with inline CSS · ?Try it Yourself · ?HTML Links · ?The Exercise', 1, 4),
(18, 'Team Management', 'rgg@gmail.com', '281307494.jpg', '2020-04-26', 'Image result for team management\r\nImage result for team management\r\nImage result for team management\r\nImage result for team management\r\nImage result for team management\r\nImage result for team management\r\nView all\r\nTeam management is the ability of an individual or an organization to administer and coordinate a group of individuals to perform a task. Team management involves teamwork, communication, objective setting and performance appraisals.\r\n', 1, 9),
(19, 'Derivatives', 'ravikant@gmail.com', '1911110650.jpg', '2020-04-26', 'In mathematics, an integral assigns numbers to functions in a way that can describe displacement, area, volume, and other concepts that arise by combining infinitesimal data. Integration is one of the two main operations of calculus, with its inverse operation, differentiation, being the other.', 1, 11),
(20, 'Direction IQ', 'ravikant@gmail.com', '758466829.jpg', '2020-04-26', 'Direction Sense Preparation Test for MBA Entrance, Bank PO, SSC and Insurance Exams Practice', 1, 19),
(21, 'Bitcoin', 'ravikant@gmail.com', '1849315056.jpg', '2020-04-26', 'Bitcoin is a cryptocurrency. It is a decentralized digital currency without a central bank or single administrator that can be sent from user to user on the peer-to-peer bitcoin network without the need for intermediaries.', 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_topic`
--
ALTER TABLE `tbl_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_topic`
--
ALTER TABLE `tbl_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
