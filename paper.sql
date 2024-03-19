-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-09 09:34:39
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `paper`
--

-- --------------------------------------------------------

--
-- 資料表結構 `投稿系統`
--

CREATE TABLE `投稿系統` (
  `文章編號` int(3) NOT NULL,
  `文章標題` varchar(20) NOT NULL,
  `文章類別` varchar(10) NOT NULL,
  `投稿日期` date NOT NULL,
  `投稿者` varchar(5) NOT NULL,
  `電子郵件` varchar(20) NOT NULL,
  `投稿狀態` varchar(5) NOT NULL,
  `論文檔案` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `投稿系統`
--

INSERT INTO `投稿系統` (`文章編號`, `文章標題`, `文章類別`, `投稿日期`, `投稿者`, `電子郵件`, `投稿狀態`, `論文檔案`) VALUES
(1, '(範例)', 'Review', '2024-03-09', '致理科技大', '@gmail', 'No', ' 論文.pdf');

-- --------------------------------------------------------

--
-- 資料表結構 `登入系統`
--

CREATE TABLE `登入系統` (
  `ID` varchar(10) NOT NULL,
  `密碼` int(12) NOT NULL,
  `姓名` varchar(10) NOT NULL,
  `聯繫方式` varchar(10) NOT NULL,
  `機構` varchar(10) NOT NULL,
  `地址` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
