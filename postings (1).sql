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
-- Database: `postings`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `created_at`, `user_id`) VALUES
(8, '📢 **Attention CPU Students!**', '📢 **Attention CPU Students!**\r\n\r\nExciting news! 🎉 There\'s an awesome event happening tomorrow at Central Philippines University! Join us for a day filled with [brief description of the event]. Be sure to come prepared:\r\n\r\n👗 Dress comfortably.\r\n📝 Bring any necessary materials.\r\n⏰ Arrive on time to kick off the festivities.\r\n\r\nLet\'s make it a day to remember! 🚀 See you there!\r\n\r\nBest,\r\nCPU Event Team', 'Beige Blue Minimalist Summer Photo Collage Facebook Cover (Facebook Post (Landscape)) (820 × 312 px).png', '2023-11-10 18:51:07', 1),
(11, '🎉 **Excitement Overload!** 🎉', '🎉 **Excitement Overload!** 🎉\r\n\r\nHey fellow CPU Tigers! 🐯✨ Just wanted to share my amazing experience at the recent event held at Central Philippine University! 🎊 Honestly, I didn\'t know what to expect at first, but it turned out to be an absolute blast!\r\n\r\nThe organizers did an incredible job setting up everything. From the lively decorations to the engaging activities, every detail was on point. It was evident that a lot of hard work and dedication went into making this event a success.\r\n\r\nOne thing that stood out to me was the sense of unity and camaraderie among the students. We all came together to celebrate, have fun, and create memories that will last a lifetime. 🥳\r\n\r\nThe performances were top-notch, showcasing the incredible talents we have within our university. I was blown away by the talent pool here at CPU! 🌟\r\n\r\nMoreover, the event provided a great opportunity to meet new people and make lasting connections. Whether you were dancing to the music, indulging in delicious food, or simply enjoying the vibrant atmosphere, there was something for everyone.\r\n\r\nKudos to the organizers, volunteers, and everyone who contributed to making this event a spectacular one. 🙌 Can\'t wait for the next gathering and more unforgettable moments at CPU! 💙💛 #CPUExperience #MemorableMoments', '278796359_5454603867919001_5863208136624815306_n.jpg', '2023-11-10 19:14:17', 8),
(19, 'Announcement', 'aweawawew', 'ovs2.png', '2023-11-10 19:36:08', 1),
(21, 'Good Morning', 'Vietnam', '396562159_865870461587806_3908826059525205356_n.jpg', '2023-11-10 19:37:04', 8),
(22, 'RNFTC ', '\"What a truly remarkable event it was! The atmosphere was filled with excitement, joy, and a sense of unity that made the occasion truly unforgettable. The collaboration among participants was exceptional, showcasing the power of teamwork and collective effort.\r\n\r\nEvery moment was a testament to the dedication and passion of everyone involved. From the inspiring talks to the interactive sessions, the event provided a platform for sharing ideas, fostering connections, and creating lasting memories.\r\n\r\nThe spirit of collaboration was evident in every aspect, from the engaging discussions to the seamless coordination of activities. It\'s moments like these that remind us of the incredible things that can be achieved when people come together with a shared purpose.\r\n\r\nKudos to everyone who played a part in making this event a success! The impact of this collaboration will undoubtedly ripple through our community, leaving a positive legacy for future endeavors. Looking forward to more opportunities to come together and create something extraordinary.\"', '396562159_865870461587806_3908826059525205356_n.jpg', '2023-11-10 19:38:38', 1),
(24, '**Important Announcement: Changes to Posting Permissions**', '**Important Announcement: Changes to Posting Permissions**\r\n\r\nDear Guimaras Community,\r\n\r\nWe hope this announcement finds you well. As part of our commitment to ensuring a secure and high-quality user experience, we are implementing a significant update to our posting policies.\r\n\r\nStarting Today, only administrators will have the ability to create new posts on the platform. This decision has been made to enhance content control, minimize spam, and fortify the overall security of our community.\r\n\r\nWe understand the importance of community engagement and value the contributions of each member. While regular users will no longer be able to create posts directly, we encourage you to actively participate in discussions through comments and other interactive features. Should you have content or ideas that you wish to share with the community, our administrators will be more than happy to assist you in posting.\r\n\r\nWe appreciate your understanding and cooperation during this transition. Our goal is to create a secure, efficient, and enjoyable environment for all users. If you have any questions or concerns regarding this change, please feel free to reach out to our support team.\r\n\r\nThank you for being a vital part of the LGU Guimaras tourism community.\r\n\r\nBest regards,\r\n\r\nadministration Team', 'DSCF4089.jpg', '2023-11-10 19:43:34', 1),
(30, 'HORROR??', 'sheesh;', '654e90ae5d5e7_DSCF4019.jpg', '2023-11-10 20:21:02', 1),
(31, 'wqeewqe', 'weeweqw', '654e90c10551d_1697380664180.png', '2023-11-10 20:21:21', 8),
(32, 'REVELATION!', 'The website will be having it\\\'s soft launch as well we\\\'ll going to have a trial with selected audience and hopefully the final release of it as soon as everything is done well. \\r\\n\\r\\nStay Tuned!\\r\\nLGU Guimaras Main', '6556359155681_Email Logo.png', '2023-11-16 15:30:25', 1),
(34, 'LOK', 'AEWEWAEAW', '6556383a6c80a_Notfound.png', '2023-11-16 15:41:46', 10),
(35, 'Fuck you', 'qewwqeq', '65747e586841e_iPHONE15.jpg', '2023-12-09 14:48:56', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'overpoweryt', 'Alberttapang165@gmail.com', '$2y$10$wIypSSHYHrVOCzshp8jGX.VhvcSNfwAA1ozfGwhziky6fg3s2Qa4C', '2023-11-10 19:11:14'),
(2, 'overpowerytw', 'Alberttapang1625@gmail.com', '$2y$10$xDLizOYs2bIhHEj7sRv.aeDcZU/qBvW.dkFwoyt.lbxjNPP9U.BjG', '2023-11-10 19:11:14'),
(3, 'alberttapang2023', 'shiinanikoto@gmail.com', '$2y$10$A8C2QqOibBkiaCc2Z0ufzO86qJKs/kt2Br.6zc/8rpnrm/buBOKNK', '2023-11-10 19:11:14'),
(4, 'alberttapang2024', 'shiinanikotoz@gmail.com', '$2y$10$3ImwQQS8JXWCJguk8dLY4u0glwHv348WfMGLPGM.kXEd2ZcSxgj2e', '2023-11-10 19:11:14'),
(5, 'MaryJane', 'maryjane2003@cpu.edu.ph', '$2y$10$vLoOL0cEdNn9DAvilnrksOb5TO3QVHQVBxgjkc8B6iL0eTYijXLHO', '2023-11-10 19:11:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
