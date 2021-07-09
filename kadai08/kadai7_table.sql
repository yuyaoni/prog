-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 7 月 01 日 14:36
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `kadai7_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai7_table`
--

CREATE TABLE `kadai7_table` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `weight` int(11) NOT NULL,
  `kyori` int(11) NOT NULL,
  `syokuji` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `kadai7_table`
--

INSERT INTO `kadai7_table` (`id`, `date`, `weight`, `kyori`, `syokuji`) VALUES
(7, '2021-07-20', 77, 10, 'ご飯'),
(8, '2021-07-29', 77, 55, 'ee'),
(9, '2021-07-13', 55, 99, 'ss'),
(10, '2021-08-17', 11, 11, '11'),
(11, '2021-07-13', 55, 55, '55'),
(12, '2021-07-13', 55, 11, 'ああ'),
(13, '2021-07-13', 55, 10, 'pp\r\n');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai7_table`
--
ALTER TABLE `kadai7_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai7_table`
--
ALTER TABLE `kadai7_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
