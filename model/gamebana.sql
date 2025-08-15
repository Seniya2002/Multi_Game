-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 11:47 PM
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
-- Database: `gamebana`
--

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `multiplication_score` int(11) DEFAULT 0,
  `banana_score` int(11) DEFAULT 0,
  `total_score` int(11) DEFAULT 0,
  `attempts` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `multiplication_score`, `banana_score`, `total_score`, `attempts`, `created_at`) VALUES
(13, 1, 20, 20, 40, 3, '2025-03-22 10:38:28'),
(14, 17, 10, 10, 20, 3, '2025-03-22 16:03:53'),
(21, 25, 10, 50, 60, 2, '2025-04-01 19:45:10'),
(22, 26, 30, 40, 70, 2, '2025-04-01 20:00:58'),
(23, 27, 0, 10, 10, 1, '2025-04-03 20:53:41'),
(24, 2, 10, 0, 10, 0, '2025-04-03 21:00:25'),
(25, 29, 20, 0, 20, 0, '2025-04-03 21:16:41'),
(26, 30, 0, 10, 10, 1, '2025-04-03 21:28:54');

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
(1, 'seni', 'seni@gmail.com', '$2y$10$9fl7jOvC.WPqLwfDJQJD4.dI8VpwfG4x3MjBEInvp6UfvmersTA36'),
(2, 'sara', 'sara@gmail.com', '$2y$10$sdBbaW52/woe6iW4nXY1Fe46J.30kCBL6qkTMLdGqkahBkLSj0Qcm'),
(5, 'test', 'test@gmail.com', '$2y$10$QMxQTzAxwabIRz7rgWR5feufyJ7o90FEvPcLTwRZP5QfWsW0oICrS'),
(6, 'qwer', 'qwer@gmail.com', '$2y$10$5GoGHULsmcA.gTRIfDyF3OI6ZWxjqdbrdMLjRfiSL4ABWhTau7q3i'),
(7, 'sani', 'sani@gmail.com', '$2y$10$Wz6N6QJhfaCPgce4ABd2jeNgW3dTQzC2.BeCIUY9cGyzruIfqZZre'),
(9, 'kml', 'kml@gmail.com', '$2y$10$dze5B.wbQPjjMB5uuMwQQuvFXObZgJqceH6akno6wwr54T6pDj0Ju'),
(11, 'themi', 'themi@gmail.com', '$2y$10$YXMv2rcSUAHRJtPVsZvscub7CTIzKdoNRflaxGC02ohKSrR6cnaW6'),
(12, 'chamo', 'chamo@gmail.com', '$2y$10$oUBlH4axtLoFn2LUhN0Mi.jXQ771MBRW1VYAOR550qxIJlgc/Lybm'),
(15, 'sss', 'sss@gmail.com', '$2y$10$2Q/sSyHu9fslFq7jAJqqbeokS0.ILj5P3oB2PDbv3JJ7Q.K5FeZsS'),
(16, 'aaa', 'aaa@gmail.com', '$2y$10$pqfL0bEaJcQClkPJhSy8Dup5dlVsGbpv915STqMksZshX5KpFPnxa'),
(17, 'jason', 'jason@gmail.com', '$2y$10$dy.WDjseRhDLEVlnfrMmlOyxdTiFu6TjRGm/xwI4WSWVpaEdf4Za2'),
(18, 'hhh', 'hhh@gmai.com', '$2y$10$ZgmGEuf1aeW2sgB3I6fp1uLXXoe05o8AsFicIpxnYyQWbCLGNHrAy'),
(20, 'lll', 'lll@gmail.com', '$2y$10$iJP5qOOGqb9JgeM1LcVC1eIrof2m9rhZj4IqDU9K/uHc4oRUItLxm'),
(21, 'sarath', 'sarath@gmail.com', '$2y$10$rTtIGRblVDH4p4odrraDUuDO4i2dCSgrZhQud1.CGLRmUZwR.xaea'),
(24, 'mmm', 'mmm@gmail.com', '$2y$10$NDDJ5KJjGCJD3t6kpjIASeJfNsGs2YRwKfPrcJc4OJYe5lt7uHxh6'),
(25, 'nnn', 'nnn@gmail.com', '$2y$10$DHvQVerMgCSnNvsFkFe/weogKJF2lgPxy0xEP9LGgjYUJ/3vuSrm2'),
(26, 'bbb', 'bbb@gmail.com', '$2y$10$Prm2.oz73Jb9XSqfQhO.seSqQnVFB754S1ktvyzNM4AGhxRBxI6Ye'),
(27, 'seniya', 'seniya@gmail.com', '$2y$10$oCMzaJCgRCY2t/ztAd1d3uImoKRBMML6OlF1KQVzjT/VoJJVn/C6O'),
(28, 'jone', 'jone@gmail.com', '$2y$10$KZAaGRZwh0iL94nEEJzB7OWqDD3vvoLZ9dNylDfVXjzAqYg3TX56W'),
(29, 'jon', 'jon@gmail.com', '$2y$10$mkHZBjk454nzffOXWW6.lOFuQED8k.gkLKoD9JsG2wf6tUhAieD7m'),
(30, 'jeni', 'jeni@gmail.com', '$2y$10$qqNkDoR2aP8QCCMjXjBDKeJWdJFinkTY4H9IyGxUMJDphMoNTzrTy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
