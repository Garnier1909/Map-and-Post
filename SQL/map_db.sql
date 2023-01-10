-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 12 月 16 日 10:03
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `map_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `map_tables`
--

CREATE TABLE `map_tables` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double(8,6) NOT NULL,
  `lon` double(9,6) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `p_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `p_col` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `map_tables`
--

INSERT INTO `map_tables` (`id`, `name`, `lat`, `lon`, `img`, `input_date`, `note`, `p_name`, `p_col`) VALUES
(1, '大覚寺', 35.028108, 135.678336, 'daikakuji.jpg', '2022-11-07 02:40:20', '鶯張りの廊下は興味深い', '太田', '#ff0000'),
(2, '北野天満宮', 35.031178, 135.735092, 'kitano.jpeg', '2022-11-07 11:52:03', '宝物が見られてめっちゃテンション上がった', '佐々木', '#00ff00'),
(3, '藤森神社', 34.951336, 135.771697, 'fujimori.jpeg', '2022-11-07 11:52:54', 'お参りしてきた！！', '中村', '#0000ff'),
(4, '伏見稲荷大社', 34.967131, 135.773286, 'fushimi_inari.jpeg', '2022-11-07 11:53:41', '鳥居のトンネルが幻想的でした！', '橘', '#ff147a'),
(5, '二条城', 35.014227, 135.747870, 'nijoujo.png', '2022-11-07 11:54:36', 'お堀が綺麗だった', '後藤', '#e8d502'),
(6, '京都国立博物館', 34.989956, 135.773125, 'kyouhaku.jpg', '2022-11-07 11:56:06', '特別展やってた！', '田中', '#ff00ff'),
(7, '市川屋珈琲', 34.993163, 135.774163, 'ichikawa.jpeg', '2022-11-07 11:58:14', '店内がコーヒーのいい香りで満ちていました。', '太田', '#ff0000'),
(8, '三条大橋', 35.009043, 135.771816, 'sanjou.jpeg', '2022-11-07 12:01:33', 'ちゃんと刀傷あった。時代を感じるな', '中村', '#0000ff'),
(9, '京都近代美術館', 35.012363, 135.782001, 'kyoutokindai.jpeg', '2022-11-07 12:02:32', '見たかった美術品がいっぱい！', '佐々木', '#00ff00'),
(10, '茶匠 清水一芳園', 34.987144, 135.773972, 'shimizuippouen.jpeg', '2022-11-07 12:04:42', '抹茶パフェ美味しい〜〜〜', '田中', '#ff00ff');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `map_tables`
--
ALTER TABLE `map_tables`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `map_tables`
--
ALTER TABLE `map_tables`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
