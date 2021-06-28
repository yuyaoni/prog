-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 6 月 28 日 14:55
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `kadai6_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai6_table`
--

CREATE TABLE `kadai6_table` (
  `Id` int(12) NOT NULL,
  `name` text NOT NULL,
  `kana` text NOT NULL,
  `reason` text NOT NULL,
  `email` text NOT NULL,
  `detail` text NOT NULL,
  `kind` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `kadai6_table`
--

INSERT INTO `kadai6_table` (`Id`, `name`, `kana`, `reason`, `email`, `detail`, `kind`) VALUES
(13, '大西勇也', 'onishi', 'google検索', 'test@me.com', 'テスト', ''),
(14, '大西勇也', 'オオニシ', 'SNS', 'test@me.com', 'aaaaaaaa', ''),
(15, '大西勇也', 'onishi', 'google検索', 'test@me.com', 'あああああ', ''),
(17, '大西勇也', 'onishi', 'google検索', 'test@me.com', '２２２２', ''),
(19, '大西勇也', 'オオニシ', 'google検索', 'test@me.com', 'eee', '起業をしたい、チーズの教養を身につけたい');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai6_table`
--
ALTER TABLE `kadai6_table`
  ADD PRIMARY KEY (`Id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai6_table`
--
ALTER TABLE `kadai6_table`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
