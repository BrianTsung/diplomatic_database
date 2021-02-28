-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `diplomatic`
--

-- --------------------------------------------------------

--
-- 資料表結構 `country`
--

CREATE TABLE `country` (
  `country_code` varchar(6) NOT NULL,
  `country_name` varchar(14) NOT NULL,
  `continent_name` varchar(10) NOT NULL,
  `president_name` varchar(14) NOT NULL,
  `foreign_minister_name` varchar(14) NOT NULL,
  `contact_person_name` varchar(14) NOT NULL,
  `population` int(14) NOT NULL,
  `territory` int(14) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `diplomatic` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `country`
--

INSERT INTO `country` (`country_code`, `country_name`, `continent_name`, `president_name`, `foreign_minister_name`, `contact_person_name`, `population`, `territory`, `phone`, `diplomatic`, `status`) VALUES
('111', 'japan', 'asia', 'xxx', 'yyy', 'zzz', 5000000, 120000, '987654321', '1', '正常'),
('222', 'america', 'america', 'trump', 'melon', 'grape', 500, 200, '0922222222', '0', '正常'),
('333', 'Egypt', 'africa', 'abcde', 'egg', 'ccccc', 600, 70068, '033663366', '0', '正常'),
('444', 'germany', 'europe', 'zzzzz', 'dddddd', 'qqqqqq', 60000, 1000000, '0256885', '1', '正常');

-- --------------------------------------------------------

--
-- 資料表結構 `dependents`
--

CREATE TABLE `dependents` (
  `id` varchar(10) NOT NULL,
  `dependent_id` varchar(10) NOT NULL,
  `dependent_name` varchar(14) NOT NULL,
  `dependent_gender` char(1) NOT NULL,
  `relationship` varchar(6) NOT NULL,
  `dependent_birth` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `dependents`
--

INSERT INTO `dependents` (`id`, `dependent_id`, `dependent_name`, `dependent_gender`, `relationship`, `dependent_birth`, `status`) VALUES
('12321456', 'zccccc', 'ggg', '0', '夫妻', '1987-12-18', '正常'),
('2235', 'h75577557', '李四', '0', '母女', '1975-02-10', '正常'),
('2235', 'l5656522', 'xxxxx', '1', '夫妻', '1989-08-18', '正常'),
('a123456789', 'a55666655', 'rrrrr', '1', '夫妻', '1950-11-13', '離婚/被人收養');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `name` varchar(14) NOT NULL,
  `IDno` varchar(10) NOT NULL,
  `positions` varchar(10) NOT NULL,
  `Salary` int(8) NOT NULL,
  `Telephone` varchar(14) NOT NULL,
  `Gender` char(1) NOT NULL,
  `birth` date NOT NULL,
  `hiringdate` date NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Photo` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`name`, `IDno`, `positions`, `Salary`, `Telephone`, `Gender`, `birth`, `hiringdate`, `Address`, `Photo`, `status`) VALUES
('aaa', '12321456', '總經理', 30000, '09xxxxxxxx', '男', '1986-12-18', '2019-12-28', '321321321', './photo/12321456.png', '正常'),
('bbb', '2235', '職員', 565655, '9999999999999', '女', '1967-12-10', '2019-12-20', '', './photo/2235.png', '正常'),
('cccc', '65656', '屁孩', 100, '095959595', '男', '2018-12-03', '2018-12-13', '898989898', './photo/65656.png', '正常'),
('eee', 'a123456789', '老闆', 20000000, '09111111111', '女', '2019-06-07', '2019-12-24', '台北市信義區zzzzzzzz', '', '正常'),
('fff', 'b987654321', '一職等', 600, '0823562356', '女', '2019-06-14', '2020-02-08', '花蓮', './photo/b987654321.png', '刪除'),
('III', 'DSHHJHVJH', '十職等', 1212121, '4545', '男', '2019-12-06', '2019-12-20', 'XXXXXX', './photo/DSHHJHVJH.png', '正常'),
('hhh', 'v546465322', '十職等', 8500, '09753951', '女', '2019-05-31', '2019-12-28', '台中市asdfghjyt', './photo/v546465322.png', '正常'),
('ggg', 'z456654445', '三職等', 6000, '09258963147', '男', '2018-04-08', '2019-12-07', '新竹市ppppppp', './photo/z456654445.png', '正常'),
('ddd', 'z963258963', '掃地', 500, '089568742', '男', '2018-01-02', '2019-12-14', '高雄市aaaassx', './photo/z963258963.png', '正常');

-- --------------------------------------------------------

--
-- 資料表結構 `expatriate`
--

CREATE TABLE `expatriate` (
  `id` varchar(10) NOT NULL,
  `countrycode` varchar(6) NOT NULL,
  `name` varchar(14) NOT NULL,
  `appointment_date` date NOT NULL,
  `ambassador_name` varchar(14) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `expatriate`
--

INSERT INTO `expatriate` (`id`, `countrycode`, `name`, `appointment_date`, `ambassador_name`, `status`) VALUES
('12321456', '111', 'aaa', '2019-12-31', 'xdgh', '正常'),
('2235', '222', 'bbb', '2019-12-29', 'zzccvv', '離職'),
('65656', '111', 'cccc', '2019-12-28', 'ppll', '離職'),
('a123456789', '333', 'eee', '2020-04-18', 'jkl', '正常');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_code`);

--
-- 資料表索引 `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`id`,`dependent_id`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`IDno`,`name`) USING BTREE;

--
-- 資料表索引 `expatriate`
--
ALTER TABLE `expatriate`
  ADD PRIMARY KEY (`id`,`countrycode`,`name`) USING BTREE,
  ADD KEY `expatriate_ibfk_2` (`countrycode`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `dependents`
--
ALTER TABLE `dependents`
  ADD CONSTRAINT `dependents_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`IDno`);

--
-- 資料表的限制式 `expatriate`
--
ALTER TABLE `expatriate`
  ADD CONSTRAINT `expatriate_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`IDno`),
  ADD CONSTRAINT `expatriate_ibfk_2` FOREIGN KEY (`countrycode`) REFERENCES `country` (`country_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
