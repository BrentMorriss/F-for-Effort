-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2012 at 11:35 AM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `course_number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit` tinyint(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptartment_id` (`department_id`),
  KEY `course` (`course_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` VALUES(1, 1, 4410, 'Software Development I', 3, 'The software development process, requirements analysis, software design concepts and methodologies, structured programming, debugging and testing.');
INSERT INTO `courses` VALUES(2, 1, 1030, 'Computer Science I', 3, 'Introduction to Computer Science and Engineering, problem-solving techniques, algorithmic processes, software design and development.');
INSERT INTO `courses` VALUES(3, 1, 1040, 'Computer Science II', 3, 'Continuation of CSCE 1030. Software design, structured programming, object oriented design and programming.');
INSERT INTO `courses` VALUES(4, 1, 2050, 'Computer Science III', 3, 'Elementary data structures, practice in software design, implementation and testing with emphasis on creating and modifying larger programs. ');
INSERT INTO `courses` VALUES(5, 1, 3110, 'Data Structures and Algorithms', 3, 'Computer storage structures; storage allocation and management; data sorting and searching techniques; data structures in programming languages.');
INSERT INTO `courses` VALUES(6, 2, 1710, 'Calculus I', 4, 'Limits and continuity, derivatives and integrals; differentiation and integration of polynomial, rational, trigonometric, and algebraic functions; applications, including slope, velocity, extrema, area, volume and work.');
INSERT INTO `courses` VALUES(7, 2, 1720, 'Calculus II', 3, 'Differentiation and integration of exponential, logarithmic and transcendental functions; integration techniques; indeterminate forms; improper integrals; area and arc length in polar coordinates; infinite series; power series; Taylor’s theorem.');
INSERT INTO `courses` VALUES(8, 2, 2700, 'Linear Algebra and Vector Geometry', 3, 'Vector spaces over the real number field; applications to systems of linear equations and analytic geometry in En, linear transformations, matrices, determinants and eigenvalues.');
INSERT INTO `courses` VALUES(9, 2, 2730, 'Multivariable Calculus', 3, 'Vectors and analytic geometry in 3-space; partial and directional derivatives; extrema; double and triple integrals and applications; cylindrical and spherical coordinates.');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollment`
--

CREATE TABLE `course_enrollment` (
  `student_id` int(11) NOT NULL,
  `course_section_id` int(11) NOT NULL,
  KEY `student_id` (`student_id`,`course_section_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_enrollment`
--

INSERT INTO `course_enrollment` VALUES(1, 1);
INSERT INTO `course_enrollment` VALUES(1, 2);
INSERT INTO `course_enrollment` VALUES(1, 3);
INSERT INTO `course_enrollment` VALUES(2, 4);
INSERT INTO `course_enrollment` VALUES(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `course_prerequisites`
--

CREATE TABLE `course_prerequisites` (
  `course_id` int(11) NOT NULL,
  `prerequisite_course_id` int(11) NOT NULL,
  KEY `course_id` (`course_id`,`prerequisite_course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_prerequisites`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `course_time_id` int(11) NOT NULL,
  `enrolled` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `term_id` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`,`section`,`course_time_id`,`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` VALUES(1, 1, 1, 1, 0, 24, 1, 1);
INSERT INTO `course_sections` VALUES(2, 2, 1, 2, 0, 24, 0, 1);
INSERT INTO `course_sections` VALUES(3, 4, 1, 4, 0, 24, 0, 1);
INSERT INTO `course_sections` VALUES(4, 3, 1, 4, 0, 24, 0, 1);
INSERT INTO `course_sections` VALUES(5, 1, 2, 3, 0, 24, 0, 1);
INSERT INTO `course_sections` VALUES(6, 1, 3, 6, 0, 24, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_terms`
--

CREATE TABLE `course_terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `year` int(11) NOT NULL,
  `term` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `start_date` (`start_date`,`end_date`,`year`,`term`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `course_terms`
--

INSERT INTO `course_terms` VALUES(1, '2012-08-20', '2012-12-21', 2012, 'fall');

-- --------------------------------------------------------

--
-- Table structure for table `course_times`
--

CREATE TABLE `course_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` smallint(6) NOT NULL,
  `end_time` smallint(6) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `sunday` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semester` (`start_time`,`end_time`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`sunday`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course_times`
--

INSERT INTO `course_times` VALUES(1, 480, 530, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(2, 540, 590, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(3, 600, 650, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(4, 660, 710, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(5, 720, 770, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(6, 780, 830, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(7, 840, 890, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `course_times` VALUES(8, 900, 950, 1, 0, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticker` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` VALUES(1, 'CSCE', 'Computer Science and Engineering');
INSERT INTO `departments` VALUES(2, 'MATH', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `euid` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `euid` (`euid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'santiago', 'serrato', 'ss0515', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'santiagoserrato@gmail.com');
INSERT INTO `users` VALUES(2, 'brent', 'morris', 'bm1234', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bm1234@gmail.com');
