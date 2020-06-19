-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-12 10:39:10
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `invoice`
--

-- --------------------------------------------------------

--
-- 資料表結構 `invo_award_number`
--

CREATE TABLE `invo_award_number` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(4) NOT NULL,
  `period` tinyint(1) NOT NULL,
  `number` int(8) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `invo_award_number`
--

INSERT INTO `invo_award_number` (`id`, `year`, `period`, `number`, `type`) VALUES
(1, 2019, 6, 59647042, '1'),
(2, 2019, 6, 1260528, '2'),
(3, 2019, 6, 1616970, '3'),
(4, 2019, 6, 69921388, '3'),
(5, 2019, 6, 53451508, '3'),
(6, 2019, 6, 710, '4'),
(7, 2019, 6, 585, '4'),
(8, 2019, 6, 633, '4'),
(9, 2020, 1, 12620024, '1'),
(10, 2020, 1, 39793895, '2'),
(11, 2020, 1, 67913945, '3'),
(12, 2020, 1, 9954061, '3'),
(13, 2020, 1, 54574947, '3'),
(14, 2020, 1, 7, '4'),
(15, 2020, 1, 0, '4'),
(16, 2020, 1, 0, '4'),
(17, 2020, 2, 91911374, '1'),
(18, 2020, 2, 8501338, '2'),
(19, 2020, 2, 57161318, '3'),
(20, 2020, 2, 23570653, '3'),
(21, 2020, 2, 47332279, '3'),
(22, 2020, 2, 519, '4'),
(23, 2020, 2, 0, '4'),
(24, 2020, 2, 0, '4');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `invo_award_number`
--
ALTER TABLE `invo_award_number`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `invo_award_number`
--
ALTER TABLE `invo_award_number`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
