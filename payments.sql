-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 08 2015 г., 19:50
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `payments`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_reg`
--

CREATE TABLE IF NOT EXISTS `admin_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `view_orders` int(11) NOT NULL DEFAULT '0',
  `accept_orders` int(11) NOT NULL DEFAULT '0',
  `delete_orders` int(11) NOT NULL DEFAULT '0',
  `view_clients` int(11) NOT NULL DEFAULT '0',
  `delete_clients` int(11) NOT NULL DEFAULT '0',
  `view_admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin_reg`
--

INSERT INTO `admin_reg` (`id`, `login`, `password`, `fio`, `role`, `email`, `phone`, `view_orders`, `accept_orders`, `delete_orders`, `view_clients`, `delete_clients`, `view_admin`) VALUES
(1, 'admin', '123', '', 'Администратор', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_number` int(5) NOT NULL,
  `division_UFC` varchar(1000) NOT NULL,
  `details_of_payment` varchar(1000) NOT NULL,
  `kbk` varchar(100) NOT NULL,
  `summ` float NOT NULL,
  `payer_status` varchar(20) NOT NULL,
  `type_of_payment` varchar(1000) NOT NULL,
  `payer_type` varchar(20) NOT NULL,
  `document_type` varchar(1000) NOT NULL,
  `number` int(4) NOT NULL,
  `seria_passport` int(6) NOT NULL,
  `note` text NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `application_number`, `division_UFC`, `details_of_payment`, `kbk`, `summ`, `payer_status`, `type_of_payment`, `payer_type`, `document_type`, `number`, `seria_passport`, `note`, `time`) VALUES
(14, 1, 'test', 'test', '12345678901234567890', 1, 'test', '1', '1', '1', 123456, 1234, '1', '2015-06-07'),
(15, 2, '2', 'test', '12345678901234567890', 1, '1', '1', '1', '11', 123456, 1234, '', '2015-06-07');

-- --------------------------------------------------------

--
-- Структура таблицы `number`
--

CREATE TABLE IF NOT EXISTS `number` (
  `id` int(255) NOT NULL DEFAULT '0',
  `inn` varchar(1000) DEFAULT NULL,
  `kpp` varchar(1000) DEFAULT NULL,
  `ogrn` varchar(1000) DEFAULT NULL,
  `oktmo` varchar(1000) DEFAULT NULL,
  `office` varchar(1000) NOT NULL,
  `rol` varchar(1000) NOT NULL,
  `kod` varchar(1000) NOT NULL,
  `osn` varchar(1000) NOT NULL,
  `tax_period` varchar(1000) NOT NULL,
  `number_doc` int(6) NOT NULL,
  `date_doc` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `number`
--

INSERT INTO `number` (`id`, `inn`, `kpp`, `ogrn`, `oktmo`, `office`, `rol`, `kod`, `osn`, `tax_period`, `number_doc`, `date_doc`) VALUES
(0, '6165114477', '616500001', '6100001234121', '61650011', '', '', '', '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE IF NOT EXISTS `reg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`id`, `login`, `password`, `surname`, `name`, `patronymic`, `email`, `phone`, `datetime`, `ip`) VALUES
(1, '123-456-789 01', '1234', 'Патрикеев', 'Сергей', 'Витальевич', '1', '1', '2015-03-03 00:00:00', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
