-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 01:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) DEFAULT NULL,
  `admin_id` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `course_id` varchar(100) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `assignment_id` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `due_time` datetime DEFAULT NULL,
  `start_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`course_id`, `instructor_id`, `assignment_id`, `description`, `file_path`, `due_time`, `start_time`) VALUES
('MA501', 5448, 1, 'This Is Demo Assignment Description', 'uploads/6193a5e60efc11.64105695.pdf', '2021-11-19 18:09:00', NULL),
('MA604', 5448, 2, 'Demo Assignment Description Linear Algebra', 'uploads/6193a673f1dd17.33123965.pdf', '2021-11-12 18:47:00', NULL),
('MA5925', 5448, 3, 'Basic Modern Algebra Assignment', 'uploads/6193fd5388b3d5.05501365.pdf', '2021-11-20 00:21:00', NULL),
('MA550', 5448, 4, 'Assignment today', 'uploads/619491cd4707a4.30750886.pdf', '2021-11-17 10:53:00', NULL),
('MA806', 5448, 5, 'Demo Assignment', 'uploads/61949cc1a9b914.76381487.pdf', '2021-11-27 11:40:00', NULL),
('ENG845', 99845, 6, 'New Assignment', 'uploads/61a5226f7913f6.15056103.pdf', '2021-11-27 00:31:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_duration` int(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `starting_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_duration`, `course_id`, `course_name`, `instructor_id`, `course_description`, `starting_time`) VALUES
(6, 'ENG845', 'English Literature', 99845, 'Elementary English Literatuere', '2021-11-23'),
(4, 'MA304', 'Modern Algebra', 6542, 'Basic Modern Algebra', '2021-11-03'),
(6, 'MA307', 'Probability', 5448, 'Advanced Probability', '2021-11-17'),
(6, 'MA407', 'Ring Theory', 6542, 'Basic Ring Theory', '2021-11-02'),
(6, 'MA501', 'Topology', 5448, 'New Topology Course', '2021-11-04'),
(4, 'MA550', 'DSA', 5448, 'Data Structure and Algorithms', '2021-11-12'),
(6, 'MA555', 'Mathematical Physics', 5448, 'No Description', '2021-11-17'),
(2, 'MA5925', 'Algebra', 5448, 'New Algebra Course', '2021-11-11'),
(4, 'MA604', 'Linear Algebra', 5448, 'basic linear algebra', '2021-11-04'),
(5, 'MA611', 'Real Analysis', 25959, 'Course of New Instructor', '2021-11-10'),
(6, 'MA806', 'Number Theory', 5448, 'basic', '2021-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `mark_obtained` int(11) DEFAULT NULL,
  `grade` char(10) DEFAULT NULL,
  `student_id` int(5) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `test_id` varchar(100) DEFAULT NULL,
  `feedback_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`mark_obtained`, `grade`, `student_id`, `course_id`, `test_id`, `feedback_id`) VALUES
(NULL, NULL, 1235, 'MA304', NULL, NULL),
(NULL, NULL, 1235, 'MA307', NULL, NULL),
(NULL, NULL, 1235, 'MA407', NULL, NULL),
(NULL, NULL, 1235, 'MA550', NULL, NULL),
(NULL, NULL, 3325, 'ENG845', NULL, NULL),
(NULL, NULL, 3325, 'MA304', NULL, NULL),
(NULL, NULL, 3325, 'MA407', NULL, NULL),
(NULL, NULL, 3325, 'MA501', NULL, NULL),
(NULL, NULL, 3325, 'MA550', NULL, NULL),
(NULL, NULL, 3325, 'MA555', NULL, NULL),
(NULL, NULL, 3325, 'MA5925', NULL, NULL),
(NULL, NULL, 3325, 'MA604', NULL, NULL),
(NULL, NULL, 3325, 'MA611', NULL, NULL),
(NULL, NULL, 3325, 'MA806', NULL, NULL),
(NULL, NULL, 24456, 'MA304', NULL, NULL),
(NULL, NULL, 24456, 'MA407', NULL, NULL),
(NULL, NULL, 24456, 'MA501', NULL, NULL),
(NULL, NULL, 24456, 'MA5925', NULL, NULL),
(NULL, NULL, 25247, 'MA407', NULL, NULL),
(NULL, NULL, 25247, 'MA5925', NULL, NULL),
(NULL, NULL, 25247, 'MA604', NULL, NULL),
(NULL, NULL, 1265874, 'MA407', NULL, NULL),
(NULL, NULL, 1265874, 'MA501', NULL, NULL),
(NULL, NULL, 1265874, 'MA5925', NULL, NULL),
(NULL, NULL, 1265874, 'MA604', NULL, NULL),
(NULL, NULL, 1265874, 'MA611', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `floating_time` int(11) DEFAULT NULL,
  `feedback_id` varchar(100) NOT NULL,
  `course_id` varchar(100) DEFAULT NULL,
  `instructor_id` int(11) NOT NULL,
  `ending_time` date DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`floating_time`, `feedback_id`, `course_id`, `instructor_id`, `ending_time`, `content`) VALUES
(NULL, 'newfeedback', 'ENG845', 99845, '2021-11-19', 'is it fine now ? '),
(NULL, 'newfeedback14', 'MA307', 5448, '2021-11-26', 'New feedback from new course .'),
(NULL, 'newfeedback2', 'ENG845', 99845, '2021-11-26', 'Working fine . Give some answers . ');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `contact_no` int(10) NOT NULL,
  `instructor_name` varchar(100) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`contact_no`, `instructor_name`, `instructor_id`, `email_id`, `password`) VALUES
(2147483647, 'Anit Ghosh', 55, 'ajay_kumar@iitg.ac.in', 'wdefg'),
(2147483647, 'Anit Ghosh', 5448, 'anit_ghosh@iitg.ac.in', '4wdw'),
(2147483647, 'Joseph', 6542, 'joseph@gmail.com', '12345'),
(2147483647, 'New Instructor', 25959, 'aaa@hfmf.com', '123456'),
(99847556, 'IITG Instructor', 99845, 'instructor@iitg.ac.in', '12345'),
(2546, 'Old Instructor', 698741, 'instructor@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `test_id` varchar(100) NOT NULL,
  `s_no` int(11) NOT NULL,
  `q_description` varchar(500) NOT NULL,
  `option_A` varchar(500) NOT NULL,
  `option_B` varchar(500) NOT NULL,
  `option_C` varchar(500) NOT NULL,
  `option_D` varchar(500) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(100) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `contactno`, `age`, `address`, `email_id`, `dob`, `password`, `gender`, `student_id`) VALUES
('ROKTIM', 2147483647, NULL, '68 MOTIGARH ,NORTH GHOSH PARA , BALLY, HOWRAH', 'mascharakroktim5599@gmail.com', '2021-11-29', '5998dwa%^@&@', 'Male', 544),
('New User', 22548, NULL, 'No address', 'new@gmail.com', '2021-11-18', '12345', 'Male', 1235),
('Omendra', 2147483647, NULL, 'No address', 'omendra@gmail.com', '2021-11-03', '12345', 'Male', 3325),
('Anit Ghosh', 2147483647, NULL, 'Nazira Para , Gorasthan Lane , Krishnagar , Nadia', 'mascharakroktim99@gmail.com', '2021-11-26', '123456', 'Male', 22541),
('Shyam Jana', 22456, NULL, 'vagabond', 'shyam@gmail.com', '2021-11-25', '12345', 'Male', 24456),
('Jon Snow', 665842, NULL, 'No address', 'jonsnow@gmail.xom', '2021-11-25', '12345', 'Male', 25247),
('Anit Ghosh', 2147483647, NULL, 'Nazira Para , Gorasthan Lane , Krishnagar , Nadia', 'd@gmail.com', '2021-11-09', '123456', 'Male', 1265874);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `student_id` int(11) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `q_no` int(11) NOT NULL,
  `answer` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submit_assignment`
--

CREATE TABLE `submit_assignment` (
  `student_id` int(11) NOT NULL,
  `course_id` varchar(100) DEFAULT NULL,
  `assignment_id` int(11) NOT NULL,
  `submit_file_path` varchar(200) DEFAULT NULL,
  `marks` int(11) DEFAULT 0,
  `if_returned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submit_assignment`
--

INSERT INTO `submit_assignment` (`student_id`, `course_id`, `assignment_id`, `submit_file_path`, `marks`, `if_returned`) VALUES
(1235, 'MA550', 4, 'uploads/6194960bcdc257.14777043.pdf', 35, 1),
(3325, 'MA501', 1, 'uploads/6193dcc0e640b2.78581269.pdf', 48, 1),
(3325, 'MA604', 2, 'uploads/619479dcca55b7.19842417.pdf', 20, 1),
(3325, 'MA806', 5, 'uploads/61949d2f49b7c3.44133371.pdf', 25, 1),
(3325, 'ENG845', 6, 'uploads/61a522c4b7bc11.72631476.pdf', 39, 1),
(24456, 'MA501', 1, 'uploads/6193fca30ff5c9.25888673.pdf', 24, 1),
(24456, 'MA5925', 3, 'uploads/6193fdd6a97690.27434342.pdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `takes_feedback`
--

CREATE TABLE `takes_feedback` (
  `answer` varchar(1000) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `feedback_id` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `feedback_given` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takes_feedback`
--

INSERT INTO `takes_feedback` (`answer`, `student_id`, `feedback_id`, `course_id`, `feedback_given`) VALUES
('feedback sent from new user', 1235, 'newfeedback14', 'MA307', 1),
('yes totally fine', 3325, 'newfeedback', 'ENG845', 1),
('yes works totally fine  , iama just checking the text size output', 3325, 'newfeedback2', 'ENG845', 1);

-- --------------------------------------------------------

--
-- Table structure for table `takes_test`
--

CREATE TABLE `takes_test` (
  `mark_obtained` int(100) DEFAULT NULL,
  `grade` char(10) DEFAULT NULL,
  `student_id` int(5) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `test_time` date NOT NULL,
  `marks` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`test_id`,`s_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD PRIMARY KEY (`student_id`,`test_id`,`q_no`),
  ADD KEY `test_id` (`test_id`,`q_no`);

--
-- Indexes for table `submit_assignment`
--
ALTER TABLE `submit_assignment`
  ADD PRIMARY KEY (`student_id`,`assignment_id`);

--
-- Indexes for table `takes_feedback`
--
ALTER TABLE `takes_feedback`
  ADD PRIMARY KEY (`student_id`,`feedback_id`,`course_id`),
  ADD KEY `feedback_id` (`feedback_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `takes_test`
--
ALTER TABLE `takes_test`
  ADD PRIMARY KEY (`student_id`,`test_id`,`course_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD CONSTRAINT `question_paper_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);

--
-- Constraints for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD CONSTRAINT `student_answer_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_answer_ibfk_2` FOREIGN KEY (`test_id`,`q_no`) REFERENCES `question_paper` (`test_id`, `s_no`);

--
-- Constraints for table `takes_feedback`
--
ALTER TABLE `takes_feedback`
  ADD CONSTRAINT `takes_feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takes_feedback_ibfk_2` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takes_feedback_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takes_test`
--
ALTER TABLE `takes_test`
  ADD CONSTRAINT `takes_test_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takes_test_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takes_test_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tests_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
