-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2021 at 02:06 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13250376_quizappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `correct_answer`) VALUES
(1, 1, '4'),
(2, 2, 'James Gosling'),
(3, 3, 'x.length()'),
(4, 4, 'void'),
(5, 5, 'Error'),
(8, 6, 'x.charAt(1)'),
(9, 7, 'akdldm'),
(10, 8, 'Error'),
(12, 9, 'come'),
(13, 10, 'Error');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_detail` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_detail`, `option1`, `option2`, `option3`, `option4`) VALUES
(1, 'if int x = 3, what is the value of x after doing x ++?', '2', '4', '33', '1'),
(2, 'Who developed the JAVA programming language?', 'charles Babbage', 'Bill Gate', 'James Gosling', 'Steve Jobs'),
(3, 'if String x = \"Hello\", how can we get the length of x?', 'length(x)', 'x.toLength()', 'len(x)', 'x.length()'),
(4, 'Which of these is not an access specifier?', 'private', 'default', 'void', 'public'),
(5, '<p><strong>What would be the Output?</strong></p>\r\n<p><code>public class dad{</code><code></code><br /><code>&nbsp;&nbsp;&nbsp; int x = 14;</code><br /><code>&nbsp;&nbsp;&nbsp; public static void main(String[] args){</code><br /><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; show();</code></p>\r\n<p><code>&nbsp;&nbsp;&nbsp; }</code></p>\r\n<p><code>&nbsp;&nbsp;&nbsp; public static void show(){</code><br /><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System.out.println(x);</code><br /><code>&nbsp;&nbsp;&nbsp; }</code><br /><code>}</code></p>', '14', 'Error', '7', 'Null'),
(6, '<p><strong>How can we print out letter \'e\' from the String?</strong></p>\r\n<p><code>public class dad{</code><br /><code>&nbsp;&nbsp;&nbsp; public static void main(String[] args){</code><br /><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; String x = \"Hello\";</code><br /><code>&nbsp;&nbsp;&nbsp; }</code><br /><code>}</code></p>', 'x.index(1)', 'x[1]', 'x.charAt(1)', 'x(0)'),
(7, '<p>What would be the Output?\r\n\r\npublic class dad{\r\n    int x = 14;\r\n    public static void main(String[] args){\r\n        System.out.println(\"Hello\");\r\n            show();\r\n\r\n    }\r\n\r\n    public static void show(){\r\n        System.out.println(x);\r\n    }\r\n}</p>', 'kalda', 'ioajaod', 'aidaodija', 'adjiamdl'),
(8, 'What would be the Output?\r\n\r\npublic class dad{\r\n    int x = 14;\r\n    public static void main(String[] args){\r\n        System.out.println(\"Hello\");\r\n            show();\r\n\r\n    }\r\n\r\n    public static void show(){\r\n        System.out.println(x);\r\n    }\r\n}', '4', '3', '14', 'Error'),
(9, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit sed, laborum dolor in. <strong>Nostrum</strong> ipsam, iure ducimus dignissimos ex voluptatum. Enim nobis, vel quaerat doloribus <span style=\"color: #ff0000;\">repellendus</span>. Corrupti tenetur quis neque!</p>', 'dkal', 'kd', 'wdad', 'come'),
(10, '<p><strong>What would be the Output?</strong></p>\r\n<p><code>public class dad{</code><code></code><br /><code>&nbsp;&nbsp;&nbsp; int x = 14;</code><br /><code>&nbsp;&nbsp;&nbsp; public static void main(String[] args){</code><br /><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System.out.println(\"Hello\");</code><br /><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; show();</code></p>\r\n<p><code>&nbsp;&nbsp;&nbsp; }</code></p>\r\n<p><code>&nbsp;&nbsp;&nbsp; public static void show(){</code><br /><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System.out.println(x);</code><br /><code>&nbsp;&nbsp;&nbsp; }</code><br /><code>}</code></p>', 'jkd', 'kja', 'dd', 'Error');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`) VALUES
(1, 'Olumide'),
(2, 'James'),
(3, 'Donald'),
(4, 'Tobi');

-- --------------------------------------------------------

--
-- Table structure for table `user_result`
--

CREATE TABLE `user_result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_result`
--

INSERT INTO `user_result` (`id`, `user_id`, `question_id`, `user_answer`, `status`) VALUES
(1, 1, 1, '4', 1),
(2, 1, 2, 'Bill Gate', 0),
(3, 1, 3, 'x.length()', 1),
(4, 1, 4, 'void', 1),
(5, 1, 5, 'Error', 1),
(6, 1, 6, 'x(0)', 0),
(7, 1, 7, 'adjiamdl', 0),
(8, 1, 8, '3', 0),
(9, 1, 9, 'come', 1),
(10, 1, 10, 'kja', 0),
(11, 2, 1, '33', 0),
(12, 2, 2, 'Steve Jobs', 0),
(13, 2, 4, 'void', 1),
(14, 2, 5, '7', 0),
(15, 3, 1, '4', 1),
(16, 3, 2, 'Bill Gate', 0),
(17, 3, 3, 'x.length()', 1),
(18, 3, 5, 'Error', 1),
(19, 4, 1, '4', 1),
(20, 4, 2, 'James Gosling', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_result`
--
ALTER TABLE `user_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_result_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_result`
--
ALTER TABLE `user_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_result`
--
ALTER TABLE `user_result`
  ADD CONSTRAINT `user_result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_result_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
