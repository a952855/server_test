-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-12 15:06:19
-- 服务器版本： 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT 'id',
  `title` varchar(30) NOT NULL COMMENT '標題',
  `content` text NOT NULL COMMENT '內文',
  `create_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `create_date`, `modify_date`, `create_id`) VALUES
(3, '安安安你好ㄇ', '0.0', '2018-03-08 15:48:41', NULL, 2),
(4, 'asdadadad', 'qweqweqweqwe', '2018-03-08 16:16:53', NULL, 1),
(10, '123', '321', '2018-03-08 16:54:40', NULL, 1),
(11, '窩是qazwsx123', 'ㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏ ㄏ', '2018-03-19 09:58:10', NULL, 4);

-- --------------------------------------------------------

--
-- 表的结构 `asdadadad`
--

CREATE TABLE `asdadadad` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `asdadadad`
--

INSERT INTO `asdadadad` (`id`, `title`, `content`, `create_date`) VALUES
(1, 'asdadadad', 'qweqweqweqwe', '2018-03-08 16:16:53');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL COMMENT '帳號',
  `password` text NOT NULL COMMENT '密碼',
  `email` text NOT NULL COMMENT '信箱',
  `image` text COMMENT '大頭貼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `email`, `image`) VALUES
(1, 'a952855', '4a7d1ed414474e4033ac29ccb8653d9b', 'a952855@gmail.com', 'files/images/无标题.png'),
(2, 'qazwsx123', 'dd4b21e9ef71e1291183a46b913ae6f2', 'jane@smith.com', NULL),
(3, 'fsfdfsf', 'dcddb75469b4b4875094e14561e573d8', 'jane@smith.com', NULL),
(4, 'qazwsx123', 'dcddb75469b4b4875094e14561e573d8', 'jane@smith.com', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `安安安你好ㄇ`
--

CREATE TABLE `安安安你好ㄇ` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) NOT NULL COMMENT '使用者ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `安安安你好ㄇ`
--

INSERT INTO `安安安你好ㄇ` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, '安安安你好ㄇ', '0.0', '2018-03-08 15:48:41', 2),
(2, NULL, '1231321321', '2018-03-13 00:00:00', 1),
(3, NULL, ' ㄏㄏㄏㄏ', '2018-03-08 16:59:51', 1),
(4, NULL, '-.-', '2018-03-15 10:20:48', 1);

-- --------------------------------------------------------

--
-- 表的结构 `窩是qazwsx123`
--

CREATE TABLE `窩是qazwsx123` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `窩是qazwsx123`
--

INSERT INTO `窩是qazwsx123` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, '窩是qazwsx123', 'ㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏ ㄏ', '2018-03-19 09:58:10', 4),
(2, NULL, '0.0', '2018-03-20 09:31:58', 4),
(4, NULL, '0.0\n', '2018-03-20 11:10:58', 4),
(28, NULL, ' <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/watch?v=mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 16:59:51', 1),
(29, NULL, '<image src =\"http://www.webhek.com/wordpress/wp-content/uploads/2018/04/CSS_Selectors_650x3501-300x280.jpg\">', '2018-04-11 17:05:03', 1),
(30, NULL, '已刪除', '2018-04-11 17:06:02', 1),
(31, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/watch?v=mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 17:07:51', 1),
(32, NULL, '已刪除', '2018-04-11 17:09:23', 1),
(33, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/watch?v=mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 17:10:27', 1),
(34, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/watch?v=mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 17:13:39', 1),
(35, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/watch?v=mGeiABBB5f8\"></iframe>', '2018-04-11 17:14:14', 1),
(36, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 17:14:56', 1),
(37, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-12 09:37:59', 1),
(38, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe><iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-12 09:38:50', 1),
(39, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n我愛鄧子期', '2018-04-12 09:46:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asdadadad`
--
ALTER TABLE `asdadadad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `安安安你好ㄇ`
--
ALTER TABLE `安安安你好ㄇ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `窩是qazwsx123`
--
ALTER TABLE `窩是qazwsx123`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `asdadadad`
--
ALTER TABLE `asdadadad`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `安安安你好ㄇ`
--
ALTER TABLE `安安安你好ㄇ`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `窩是qazwsx123`
--
ALTER TABLE `窩是qazwsx123`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
