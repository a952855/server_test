-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 05 月 28 日 12:23
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_web`
--

-- --------------------------------------------------------

--
-- 資料表結構 `123`
--

CREATE TABLE `123` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `123`
--

INSERT INTO `123` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, '123', '321', '2018-05-26 13:16:01', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `1233216541`
--

CREATE TABLE `1233216541` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `1233216541`
--

INSERT INTO `1233216541` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, '1233216541', 'rewrw32r1w63123613212310', '2018-05-27 18:41:13', 1),
(2, NULL, 'fdsf', '2018-05-27 19:22:30', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `2131654654`
--

CREATE TABLE `2131654654` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `article`
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
-- 資料表的匯出資料 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `create_date`, `modify_date`, `create_id`) VALUES
(3, '安安安你好ㄇ', '0.0', '2018-03-08 15:48:41', NULL, 2),
(4, 'asdadadad', 'qweqweqweqwe', '2018-03-08 16:16:53', NULL, 1),
(11, '窩是qazwsx123', 'ㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏ ㄏ', '2018-03-19 09:58:10', NULL, 4),
(12, 'asdasdasd', 'asasasas', '2018-04-15 10:32:31', NULL, 5),
(13, '123', '321', '2018-05-26 13:16:01', NULL, 1),
(16, 'test', 'test', '2018-05-26 19:29:18', NULL, 1),
(17, '1233216541', 'rewrw32r1w631', '2018-05-27 18:41:13', NULL, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `asdadadad`
--

CREATE TABLE `asdadadad` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `asdadadad`
--

INSERT INTO `asdadadad` (`id`, `title`, `content`, `create_date`) VALUES
(1, 'asdadadad', 'qweqweqweqwe', '2018-03-08 16:16:53');

-- --------------------------------------------------------

--
-- 資料表結構 `asdasdasd`
--

CREATE TABLE `asdasdasd` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `asdasdasd`
--

INSERT INTO `asdasdasd` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, 'asdasdasd', 'asasasas', '2018-04-15 10:32:31', 5),
(2, NULL, 'asdasdasdasd', '2018-04-15 10:32:50', 5),
(3, NULL, '<image src =\"https://www.google.com.tw/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png\">\nㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏ<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/790ngBtm6PY\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n-.--.-.--.-.-.-', '2018-04-15 10:34:58', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `test`
--

INSERT INTO `test` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, 'test', 'test', '2018-05-26 19:29:18', 1),
(2, NULL, 'test2', '2018-05-26 20:08:29', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL COMMENT '帳號',
  `password` text NOT NULL COMMENT '密碼',
  `email` text NOT NULL COMMENT '信箱',
  `gender` int(10) NOT NULL DEFAULT '1' COMMENT '性別(1:男 0:女)',
  `birthday` text NOT NULL COMMENT '生日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `email`, `gender`, `birthday`) VALUES
(1, 'a952855', '4a7d1ed414474e4033ac29ccb8653d9b', 'a952855@gmail.com', 1, '1993-02-06'),
(2, 'qazwsx123', 'dd4b21e9ef71e1291183a46b913ae6f2', 'jane@smith.com', 1, '2018-05-01'),
(3, 'fsfdfsf', 'dcddb75469b4b4875094e14561e573d8', 'jane@smith.com', 1, '0000-00-00'),
(4, 'qazwsx123', 'dcddb75469b4b4875094e14561e573d8', 'jane@smith.com', 1, '0000-00-00'),
(5, 'qqq', '827ccb0eea8a706c4c34a16891f84e7b', 'janes@mith.com', 1, '0000-00-00'),
(6, 'qaz123', 'dcddb75469b4b4875094e14561e573d8', 'jane@smith.com', 1, '0000-00-00'),
(7, 'a123456', 'e10adc3949ba59abbe56e057f20f883e', 'a952855@gmail.com', 1, '0000-00-00'),
(8, 'a132148469', 'dd4b21e9ef71e1291183a46b913ae6f2', 'a952855@gmail.com', 0, '0000-00-00'),
(9, 'qaz321', 'dd4b21e9ef71e1291183a46b913ae6f2', 'a952855@gmail.com', 0, '2018-05-11'),
(11, 'zxc123', '4a7d1ed414474e4033ac29ccb8653d9b', 'zxc123@gmail.com', 0, '2000-07-03'),
(13, 'qaz111', 'dcddb75469b4b4875094e14561e573d8', 'a952855@gmail.com', 1, '2018-05-31'),
(14, 'sfafasf', 'c3b618cd61cbf4ae85203c4d13a28a16', 'a952855@gmail.com', 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `安安安你好ㄇ`
--

CREATE TABLE `安安安你好ㄇ` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) NOT NULL COMMENT '使用者ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `安安安你好ㄇ`
--

INSERT INTO `安安安你好ㄇ` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, '安安安你好ㄇ', '0.0', '2018-03-08 15:48:41', 2),
(2, NULL, '1231321321', '2018-03-13 00:00:00', 1),
(3, NULL, ' ㄏㄏㄏㄏ', '2018-03-08 16:59:51', 1),
(4, NULL, '-.-', '2018-03-15 10:20:48', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `窩是qazwsx123`
--

CREATE TABLE `窩是qazwsx123` (
  `id` int(5) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `窩是qazwsx123`
--

INSERT INTO `窩是qazwsx123` (`id`, `title`, `content`, `create_date`, `user_id`) VALUES
(1, '窩是qazwsx123', 'ㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏㄏ ㄏ', '2018-03-19 09:58:10', 4),
(2, NULL, '0.0', '2018-03-20 09:31:58', 4),
(4, NULL, '0.0\n', '2018-03-20 11:10:58', 4),
(28, NULL, '已刪除', '2018-04-11 16:59:51', 1),
(29, NULL, '<image src =\"http://www.webhek.com/wordpress/wp-content/uploads/2018/04/CSS_Selectors_650x3501-300x280.jpg\">', '2018-04-11 17:05:03', 1),
(30, NULL, '已刪除', '2018-04-11 17:06:02', 1),
(31, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/watch?v=mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 17:07:51', 1),
(32, NULL, '已刪除', '2018-04-11 17:09:23', 1),
(33, NULL, '已刪除', '2018-04-11 17:10:27', 1),
(34, NULL, '已刪除', '2018-04-11 17:13:39', 1),
(35, NULL, '已刪除', '2018-04-11 17:14:14', 1),
(36, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-11 17:14:56', 1),
(37, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-12 09:37:59', 1),
(38, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe><iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-04-12 09:38:50', 1),
(39, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/mGeiABBB5f8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n我愛鄧子期', '2018-04-12 09:46:46', 1),
(40, NULL, '已刪除', '2018-05-26 13:27:21', 1),
(41, NULL, '<iframe width=\"560\" height=\"315\" src=\" https://www.youtube.com/embed/MDAfxyfDGSc\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-05-26 13:31:17', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `123`
--
ALTER TABLE `123`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `1233216541`
--
ALTER TABLE `1233216541`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `2131654654`
--
ALTER TABLE `2131654654`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `asdadadad`
--
ALTER TABLE `asdadadad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `asdasdasd`
--
ALTER TABLE `asdasdasd`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `安安安你好ㄇ`
--
ALTER TABLE `安安安你好ㄇ`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `窩是qazwsx123`
--
ALTER TABLE `窩是qazwsx123`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `123`
--
ALTER TABLE `123`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `1233216541`
--
ALTER TABLE `1233216541`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `2131654654`
--
ALTER TABLE `2131654654`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=18;

--
-- 使用資料表 AUTO_INCREMENT `asdadadad`
--
ALTER TABLE `asdadadad`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `asdasdasd`
--
ALTER TABLE `asdasdasd`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表 AUTO_INCREMENT `安安安你好ㄇ`
--
ALTER TABLE `安安安你好ㄇ`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `窩是qazwsx123`
--
ALTER TABLE `窩是qazwsx123`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
