-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 02:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'overpoweryt', 'Alberttapang165@gmail.com', '$2y$10$wIypSSHYHrVOCzshp8jGX.VhvcSNfwAA1ozfGwhziky6fg3s2Qa4C'),
(4, 'overpowerytw', 'Alberttapang1625@gmail.com', '$2y$10$xDLizOYs2bIhHEj7sRv.aeDcZU/qBvW.dkFwoyt.lbxjNPP9U.BjG'),
(5, 'alberttapang2023', 'shiinanikoto@gmail.com', '$2y$10$A8C2QqOibBkiaCc2Z0ufzO86qJKs/kt2Br.6zc/8rpnrm/buBOKNK'),
(7, 'alberttapang2024', 'shiinanikotoz@gmail.com', '$2y$10$3ImwQQS8JXWCJguk8dLY4u0glwHv348WfMGLPGM.kXEd2ZcSxgj2e'),
(8, 'MaryJane', 'maryjane2003@cpu.edu.ph', '$2y$10$vLoOL0cEdNn9DAvilnrksOb5TO3QVHQVBxgjkc8B6iL0eTYijXLHO'),
(10, 'AnthonyVan', 'michelVan@cpu.edu.ph', '$2y$10$pMwbI7wg0L25gGRcruFZJuJFpZO7jEjALyLuW24CNddTXPWC3kYHa'),
(11, 'shaunlandar', 'shaunlandar@pornhub.com', '$2y$10$W7xtPd7ouTbZZog3nyM0EeXFPavsROu6tcIVsW6hE0Nv5G2tTz86u'),
(12, 'Hansolo2023', 'neliagula2023@gmail.com', '$2y$10$a0uj4L7jnQZHkSp0eN.XLepnkRYPStayL37S2M8VR7lCMGHY/l.Ia'),
(14, 'bsitgroup', 'bsitgroup2023@cpu.edu.ph', '$2y$10$hiGK2E0bglGrgVVtRVMDCuY1JJ1eoIded.IYaA6GoaanOFHckX80W'),
(15, 'bsitgroup01', 'bsitgroup12023@cpu.edu.ph', '$2y$10$j65/2yxKU2Y7kv/krVR0UelIYMnwexWMTZO2Myp/PoMQPDffHH19G'),
(16, 'admin2@edu,ph', 'admin2@gov.ph', '$2y$10$a0MB3Yei2R19Vm4IIylSneDpiULFo6cgSyAlZCghiPTfgVU6WebUa'),
(17, 'Passi@gov.ph', 'passigov@gov.com', '$2y$10$a1FEJBJtnYm3Y0DtICVh6Oq4YDtHVW0sQCaU7Sz/P0UmxjkhJ.a9u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
