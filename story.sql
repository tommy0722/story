-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-15 09:08:36
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `storys`
--

-- --------------------------------------------------------

--
-- 資料表結構 `story`
--

CREATE TABLE `story` (
  `id` tinyint(4) NOT NULL,
  `img` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `story` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `storyEn` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `page` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `story`
--

INSERT INTO `story` (`id`, `img`, `story`, `storyEn`, `page`) VALUES
(1, './picture01', '有一位投資者，在股票大賺一生都花不完的錢後，不知道要做什麼來打發時間，就去經營podcast，名叫”股癌”', '', 1),
(2, './picture02', '過了一段時間憑著優秀的口條以及不怕得罪人的心態，成為podcast 第一名，開啟了大投資時代，並創建了telegram讓大家加入一起討論投資', '', 2),
(3, '/picture03', '在裡面得知了一位頭貼是星之卡比，ID叫做Love GG的投資人，Love：最愛、GG：台積電，經歷了半年驗證，知道了他的特性”買什麼跌什麼”', '', 3),
(4, '/picture04', '從此成為了股癌telegram的神，許多人都在裡面聽神諭，也有許多ps大神在幫忙他做梗圖。', '', 4),
(5, '/picture05', '在過了半年，許多投資人在群組喊股票，經歷了一段時間的驗證，群內有以GG為首的四大天王。至於四大天王能不能帶領其他投資人避開危險的股市跳水行情呢?還需要一些時間的驗證', '', 5);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `story`
--
ALTER TABLE `story`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
