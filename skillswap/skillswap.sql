-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 09:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`, `category`, `level`, `rate`, `image`, `date_added`) VALUES
(1, 'Beginner Guitar Lessons', 'Learn basic chords, strumming patterns and simple songs in your first month.', 'Music', 'Beginner', 30.00, '1.png', '2025-10-03 13:34:04'),
(2, 'Intermediate Fingerstyle', 'Master complex fingerstyle techniques and arrangements for acoustic guitar.', 'Music', 'Intermediate', 45.00, '2.png', '2025-10-03 13:34:04'),
(3, 'Artisan Bread Baking', 'Learn the art of sourdough, fermentation, and shaping beautiful, crusty loaves.', 'Cooking', 'Beginner', 25.00, '3.png', '2025-10-03 13:34:04'),
(4, 'French Pastry Making', 'Discover the secrets behind classic French pastries like croissants, macarons, and éclairs.', 'Cooking', 'Expert', 50.00, '4.png', '2025-10-03 13:34:04'),
(5, 'Watercolor Basics', 'Explore fundamental watercolor techniques, color mixing, and composition.', 'Art', 'Beginner', 20.00, '5.png', '2025-10-03 13:34:04'),
(6, 'Digital Illustration with Procreate', 'Create stunning digital art on your iPad with this comprehensive Procreate course.', 'Art', 'Intermediate', 40.00, '6.png', '2025-10-03 13:34:04'),
(7, 'Morning Vinyasa Flow', 'Start your day with an energizing yoga sequence designed to build strength and flexibility.', 'Wellness', 'Intermediate', 35.00, '7.png', '2025-10-03 13:34:04'),
(8, 'Intro to PHP & MySQL', 'Build dynamic, database-driven websites with the fundamentals of PHP and MySQL.', 'Programming', 'Expert', 55.00, '8.png', '2025-10-03 13:34:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
