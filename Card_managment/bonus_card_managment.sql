-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 09 2017 г., 00:17
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `bonus_card_managment`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `cards_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(3) NOT NULL,
  `relise_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `summa` decimal(65,2) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `number` int(3) NOT NULL,
  `count_purchase` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cards_id`),
  UNIQUE KEY `cards_id_UNIQUE` (`cards_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=195 ;

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_purchase` datetime NOT NULL,
  `cost_purchase` decimal(65,2) NOT NULL,
  `card_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`),
  UNIQUE KEY `date_purchase_UNIQUE` (`date_purchase`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
