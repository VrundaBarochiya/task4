-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 09:11 PM
-- Server version: 8.0.33
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesstype`
--

CREATE TABLE `accesstype` (
  `id` int NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accesstype`
--

INSERT INTO `accesstype` (`id`, `user_type`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `assignchap`
--

CREATE TABLE `assignchap` (
  `id` int NOT NULL,
  `chap_id` int NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assignchap`
--

INSERT INTO `assignchap` (`id`, `chap_id`, `subject_id`) VALUES
(1, 13, 1),
(2, 13, 2),
(3, 2, 1),
(4, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `assignstudent`
--

CREATE TABLE `assignstudent` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `standard_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assignstudent`
--

INSERT INTO `assignstudent` (`id`, `student_id`, `standard_id`) VALUES
(1, 4, 11),
(2, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `assignsub`
--

CREATE TABLE `assignsub` (
  `id` int NOT NULL,
  `standard_id` int NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assignsub`
--

INSERT INTO `assignsub` (`id`, `standard_id`, `subject_id`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int NOT NULL,
  `chapter_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapter_name`) VALUES
(1, 'Trigonometry'),
(2, 'Probability'),
(3, 'Sets'),
(4, 'Biology'),
(5, 'Physics'),
(6, 'Chemistry'),
(7, 'grammer'),
(8, 'supplymentry'),
(9, 'History'),
(10, 'Geography'),
(13, 'Introduction');

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `id` int NOT NULL,
  `standard_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`id`, `standard_name`) VALUES
(1, '1st'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`) VALUES
(1, 'Maths'),
(2, 'Science'),
(3, 'English'),
(4, 'Social Science'),
(7, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`user_id`, `name`, `username`, `email`, `password`, `image`) VALUES
(3, 'Vrunda Barochiya', 'vrunda', 'vrunda.barochiya@brainvire.com', '81dc9bdb52d04dc20036dbd8313ed055', 'vrunda.jpeg'),
(4, 'Aayushi Doshi', 'aayushi', 'aayushi.doshi@brainvire.com', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(6, 'Niyati Patel', 'niyati', 'niyati.patel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(7, 'mann shah', 'maan', 'mann123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `accesstype_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `user_id`, `accesstype_id`) VALUES
(1, 3, 1),
(2, 4, 3),
(4, 6, 2),
(5, 7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesstype`
--
ALTER TABLE `accesstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignchap`
--
ALTER TABLE `assignchap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_assignchapchapter` (`chap_id`),
  ADD KEY `FK_assignchapsubject` (`subject_id`);

--
-- Indexes for table `assignstudent`
--
ALTER TABLE `assignstudent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_assignstudentuserdata` (`student_id`),
  ADD KEY `FK_assignstudentstandard` (`standard_id`);

--
-- Indexes for table `assignsub`
--
ALTER TABLE `assignsub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_assignsubstandard` (`standard_id`),
  ADD KEY `FK_assignsubsubject` (`subject_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userdatatype` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesstype`
--
ALTER TABLE `accesstype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignchap`
--
ALTER TABLE `assignchap`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignstudent`
--
ALTER TABLE `assignstudent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignsub`
--
ALTER TABLE `assignsub`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignchap`
--
ALTER TABLE `assignchap`
  ADD CONSTRAINT `FK_assignchapchapter` FOREIGN KEY (`chap_id`) REFERENCES `chapter` (`id`),
  ADD CONSTRAINT `FK_assignchapsubject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Constraints for table `assignstudent`
--
ALTER TABLE `assignstudent`
  ADD CONSTRAINT `FK_assignstudentstandard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`),
  ADD CONSTRAINT `FK_assignstudentuserdata` FOREIGN KEY (`student_id`) REFERENCES `userdata` (`user_id`);

--
-- Constraints for table `assignsub`
--
ALTER TABLE `assignsub`
  ADD CONSTRAINT `FK_assignsubstandard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`),
  ADD CONSTRAINT `FK_assignsubsubject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `FK_userdatatype` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
