-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2012 at 01:01 AM
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
  `deptartment_id` int(11) NOT NULL,
  `course_number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit` tinyint(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptartment_id` (`deptartment_id`),
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
