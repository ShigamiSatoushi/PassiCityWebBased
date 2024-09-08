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
-- Database: `userbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`) VALUES
(9, 'PASSI CITY ANNOUNCMENTS', 'Welcome to the Passi City Online Tourism Portal! We\'re thrilled to announce the first test launch of PCOTP v0.1, marking a significant milestone in enhancing your experience of exploring Passi City. This latest update brings a wealth of new features and improvements designed to make your visit more enjoyable and informative.\n\nWith the updated portal, you can now easily check out all the latest events happening around Passi City. Whether you\'re interested in cultural festivals, local markets, or community gatherings, our event calendar will keep you informed and help you plan your activities. The announcements section ensures you stay updated with important news and developments within the city, from municipal updates to special events.\n\nDiscover the best spots in Passi City with our comprehensive guides. The portal showcases a wide range of attractions, from historical landmarks and museums to scenic parks and bustling marketplaces. Our detailed descriptions and high-quality images provide you with a virtual preview, helping you choose the must-visit locations during your stay.\n\nOne of the standout features of this update is the new user review system. Now, you can share your experiences and insights about various locations, services, and highlights in Passi City. Whether you had an unforgettable meal at a local restaurant, enjoyed a serene walk in a park, or were impressed by the city\'s historical sites, your reviews will help fellow visitors make informed decisions.', '2024-07-03 23:37:01'),
(10, 'New Update!', 'New Update! We are excited to announce the first test launch of the Passi City Online Tourism Portal (PCOTP) v0.1. This latest update brings a host of new features to enhance your experience and make exploring Passi City easier and more enjoyable. The updated portal now shows all the available spots in the city, allowing you to discover and plan visits to various attractions. Additionally, you can explore new events happening around the city and even apply to participate in them through the portal.\n\nOur new user review feature lets you share your thoughts and read others\' experiences about specific locations, services, and highlights in Passi City. Whether you want to praise a fantastic restaurant, comment on a historical site, or provide feedback on a local event, your insights will help others make informed decisions. We believe these updates will significantly enhance your interaction with our city’s tourism offerings, making your visits more enjoyable and engaging.', '2024-07-03 23:39:20'),
(11, 'Passi City Online Tourism Portal Update', 'We are thrilled to announce an exciting update to the Passi City Online Tourism Portal! This update introduces a range of new features designed to enhance your experience and provide comprehensive information about our beautiful city. Explore Passi City like never before with interactive maps that make it easy to locate attractions, restaurants, and historical sites. Stay informed with our new event calendar, which keeps you updated on local festivals and events. Experience the city’s highlights through virtual tours, offering immersive 360-degree views. Our enhanced photo galleries showcase high-resolution images of Passi City’s natural beauty and vibrant culture. Additionally, a new user review system allows you to share and read reviews on attractions and accommodations. We\'ve also made significant improvements to the portal, including faster load times for a smoother browsing experience, a mobile-friendly design for easy navigation on any device, and better accessibility features to ensure everyone can enjoy our content. We invite you to explore these new features and enhancements on the Passi City Online Tourism Portal and experience all that our city has to offer.', '2024-07-03 23:42:06'),
(12, 'Special Announcement by The Mayor', 'Warm Welcome to the Admins of Passi City Tourism Online Portal Dear Passi City Tourism Online Portal Admin Team, Greetings and a hearty welcome to each of you! It brings us immense joy to have such a dedicated and skilled group of individuals steering the ship of the Passi City Online Portal. Your commitment to enhancing the online experience for our community is truly commendable. \nAs administrators, you play a crucial role in ensuring that our portal remains a reliable and user-friendly platform for residents and visitors alike. Your efforts contribute significantly to fostering connectivity, efficiency, and convenience in our community. We believe that your expertise and enthusiasm will lead to continuous improvements, making the portal an even more valuable resource for everyone. We are confident that, with your leadership, the Passi City Tourism Online Portal will continue to evolve into a hub of information, services, and engagement. Your collaborative spirit and dedication to innovation will undoubtedly pave the way for a more connected and empowered community. Once again, welcome aboard! We are excited about the journey ahead and look forward to achieving new milestones together.', '2024-07-03 23:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `currentevents`
--

CREATE TABLE `currentevents` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `event_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currentevents`
--

INSERT INTO `currentevents` (`id`, `event_name`, `event_date`, `event_description`, `event_photo`, `created_at`, `updated_at`) VALUES
(5, 'weet', '2024-06-20', '2q3q23', '', '2024-06-06 08:50:15', '2024-06-06 08:50:15'),
(6, 'Suntukan', '2024-06-07', 'Suntukan 1v1 ', '', '2024-06-11 05:26:54', '2024-06-11 05:26:54'),
(7, 'Passi City Application Day', '2024-07-20', 'Join us for Passi Application Day—an annual event showcasing educational, career, and community opportunities in Passi City. Whether you\'re a student, job seeker, or aspiring entrepreneur, this event connects you with local institutions, businesses, and community leaders. Explore educational programs, career pathways, and job openings, and participate in workshops to enhance your skills in resume building, entrepreneurship, and leadership.', '', '2024-07-04 01:21:41', '2024-07-04 01:21:41'),
(8, 'SPORTS FEST PASSI', '2024-07-27', 'Sportfest sa passi', '', '2024-07-04 06:50:30', '2024-07-04 06:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `event_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place_reviews`
--

CREATE TABLE `place_reviews` (
  `id` int(11) NOT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_reviews`
--

INSERT INTO `place_reviews` (`id`, `place_name`, `user_name`, `rating`, `review_text`, `photo_path`, `created_at`, `location`) VALUES
(9, 'PASSI CITY COLESIUM', 'wrwerq', 5, 'qweewqe', '', '2024-06-06 04:08:56', NULL),
(11, 'PASSI CITY COLESIUMw', 'qwewqe', 2, 'weewq', '', '2024-06-06 05:13:30', NULL),
(12, 'PASSI CITY COLESIUM', 'Albert Tapang', 4, 'TWG', '', '2024-06-06 05:14:18', NULL),
(13, 'PASSI CITY COLESIUM', 'qwewqe', 5, 'Loved this place', '', '2024-06-09 21:28:23', NULL),
(14, 'PASSI CITY COLESIUMdafww', 'wqeqe', 1, 'wqewee', '', '2024-06-09 21:28:38', NULL),
(15, 'tdgfg', 'weqe', 1, 'weqewe', '', '2024-06-09 21:29:00', NULL),
(16, 'wqeweqw', 'ewqeqw', 1, 'qweqweqw', '', '2024-06-09 21:31:34', NULL),
(17, 'PASSI CITY COLESIUM', 'qwewq', 5, 'qweeqe', '', '2024-06-09 21:37:41', NULL),
(18, 'Lanag', 'DErek', 5, 'Nami ah', '', '2024-06-11 05:33:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `status` enum('pending','approved','disapproved') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `event_name`, `event_description`, `status`) VALUES
(1, 'wqeqwqweqwe', 'qewweqe', 'approved'),
(2, 'weet', 'wqeqe', 'disapproved'),
(3, 'DTCF PASSI EVENT ', 'ASSESING THE PROPOSAL OF THIS EVENT\r\n', 'disapproved'),
(4, 'POLITCAL DEBATE', 'TO BE ALLOWED SOON\r\n', 'approved'),
(5, 'Wasakan sa Passi', 'Wasakan sa passi is an Internal Event Conducted by the Department of Public Works and Highways comemorating it\'s 15th Constructive Anniversary. In the Admission of Hon.Vincent Devinagracia.', 'approved'),
(6, 'weqewqe', 'estaeedaf', 'approved'),
(7, '1v1 sparring ', '1v1 suntukan', 'approved'),
(8, 'Suntukan', '1v1 Suntukan', 'approved'),
(9, 'UploadQ?', 'Okayy ah', 'pending'),
(10, 'e[orksgpkprek', 'dfpkbpk', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `event_name`, `event_date`) VALUES
(1, 'Pintados', '2024-07-05'),
(2, 'Pintados', '2024-06-12'),
(3, 'Pintados', '2024-06-12'),
(4, 'Pintados', '2024-06-19'),
(5, 'Pintados', '2024-06-19'),
(6, 'Pintados', '2024-06-19'),
(7, 'Pintados', '2024-06-19'),
(8, 'Pintados', '2024-06-19'),
(9, 'Pintados', '2024-06-19'),
(10, 'Pintados', '2024-06-19'),
(11, 'Pintados', '2024-06-19'),
(12, 'Pintados', '2024-06-19'),
(13, 'Pintados', '2024-06-19'),
(14, 'Pintados', '2024-06-19'),
(15, 'Pintados', '2024-06-19'),
(16, 'Pintados', '2024-06-19'),
(17, 'Pintados', '2024-06-19'),
(18, 'Pintados', '2024-06-19'),
(19, 'Pintados', '2024-06-19'),
(20, 'Pintados', '2024-06-19'),
(21, 'Suntukan sa Passi (1V1)', '2024-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`, `isAdmin`) VALUES
(4, 'admin2', 'admin2@edu,ph', 22, 'admin2', 1),
(5, 'Passi1', 'Passi@gov.ph', 29, 'passi1', 0),
(6, 'PassiAdmin', 'PassiAdmin@gov.ph', 26, 'admin', 1),
(8, 'michapretty', 'michaelafabrigar@gmail.com', 18, 'michaela', 1),
(9, 'derek', 'derek', 21, 'derek', 0),
(10, 'LennonPajarIT', 'LennonPajarIT@gmail.com', 47, 'ITPAJAR2024', 0),
(11, 'admin01', 'admin01@gmail.com', 20, 'admin01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentevents`
--
ALTER TABLE `currentevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_reviews`
--
ALTER TABLE `place_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `currentevents`
--
ALTER TABLE `currentevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_reviews`
--
ALTER TABLE `place_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
