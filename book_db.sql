-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 1 月 31 日 21:51
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bk_user_table`
--

CREATE TABLE IF NOT EXISTS `bk_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `bk_user_table`
--

INSERT INTO `bk_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'huty', 'huty', 'kkk', 0, 1),
(3, '田中', 'tanaka', 'fff', 1, 0),
(5, '大五郎', 'daigoro', '3333', 1, 0),
(6, '鈴木', 'suzuki', 'koko', 0, 0),
(7, '西田', 'nishida', '090911', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `book_bm_table`
--

CREATE TABLE IF NOT EXISTS `book_bm_table` (
`id` int(12) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookurl` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `book_bm_table`
--

INSERT INTO `book_bm_table` (`id`, `title`, `bookurl`, `comment`, `indate`) VALUES
(2, 'Bing Maps API ', 'https://www.amazon.co.jp/dp/B07J1RZ5HJ/ref=cm_sw_em_r_mt_dp_U_mhVqCbFBWBA6B', '山崎講師の Microsoft BingMaps APIの入門書です。今はbmapQueryの作成に取り組んでおられます。', '2019-01-19 19:01:58'),
(3, 'Amazon book', 'https//amazonbooks.com', 'hutyhutyhuty', '2019-01-19 19:05:25'),
(4, 'rakuten book', 'https//rakutenbooks.com', 'hutyhutyhuty', '2019-01-19 19:15:14'),
(5, 'microsoftbook', 'htttps://microsoftbooks.com', 'hutyhutyhuty', '2019-01-19 19:17:19'),
(6, 'gizmodo books', 'https://gizomodobooks.com', 'hutyhutyhuty', '2019-01-19 19:18:01'),
(7, 'books', 'https://books.com', 'hutyhutyhuty', '2019-01-19 19:19:15'),
(8, '書籍', 'url.com', 'こちらにはコメントを入れましょう！', '2019-01-20 17:56:40'),
(9, '777', '4444', '55555', '2019-01-26 16:39:58'),
(10, 'Bing Maps API 入門', 'https://www.amazon.co.jp/dp/B07J1RZ5HJ/ref=cm_sw_em_r_mt_dp_U_mhVqCbFBWBA6B', 'huty', '2019-01-26 18:45:32'),
(11, 'Bing Maps API 入門', 'huty', 'huty', '2019-01-27 19:08:17'),
(12, 'a', 'a', 'a', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bk_user_table`
--
ALTER TABLE `bk_user_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_bm_table`
--
ALTER TABLE `book_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bk_user_table`
--
ALTER TABLE `bk_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `book_bm_table`
--
ALTER TABLE `book_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
