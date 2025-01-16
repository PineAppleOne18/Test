-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2024 г., 14:33
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `insurance_company`
--

-- --------------------------------------------------------

--
-- Структура таблицы `insurance_client`
--

CREATE TABLE `insurance_client` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `insurance_client`
--

INSERT INTO `insurance_client` (`id`, `last_name`, `first_name`, `patronymic`) VALUES
(1, 'Леприконов', 'Демиург', 'Семёнович');

-- --------------------------------------------------------

--
-- Структура таблицы `insurance_issue`
--

CREATE TABLE `insurance_issue` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `insurance_issue`
--

INSERT INTO `insurance_issue` (`id`, `client_id`, `type_id`, `start_date`, `end_date`, `agent_id`) VALUES
(1, 1, 1, '2024-12-27', '2025-12-27', 6),
(2, 1, 1, '2024-11-20', '2024-11-21', 6),
(3, 1, 2, '2024-12-30', '2024-11-30', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `insurance_type`
--

CREATE TABLE `insurance_type` (
  `id` int(11) NOT NULL,
  `type_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `insurance_type`
--

INSERT INTO `insurance_type` (`id`, `type_title`) VALUES
(1, 'Медицинский'),
(2, 'Имущественный'),
(3, 'Средств наземного транспорта');

-- --------------------------------------------------------

--
-- Структура таблицы `insurance_user`
--

CREATE TABLE `insurance_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `insurance_user`
--

INSERT INTO `insurance_user` (`id`, `username`, `password`, `last_name`, `first_name`, `patronymic`) VALUES
(5, 'testy1', 'testy2Ф', 'Фамили', 'Имя', 'Отче'),
(6, 'ttt', 'ttt', 'ttt', 'tt', 'ttt');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `insurance_client`
--
ALTER TABLE `insurance_client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `insurance_issue`
--
ALTER TABLE `insurance_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `client_id_2` (`client_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Индексы таблицы `insurance_type`
--
ALTER TABLE `insurance_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `insurance_user`
--
ALTER TABLE `insurance_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `insurance_client`
--
ALTER TABLE `insurance_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `insurance_issue`
--
ALTER TABLE `insurance_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `insurance_type`
--
ALTER TABLE `insurance_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `insurance_user`
--
ALTER TABLE `insurance_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `insurance_issue`
--
ALTER TABLE `insurance_issue`
  ADD CONSTRAINT `insurance_issue_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `insurance_client` (`id`),
  ADD CONSTRAINT `insurance_issue_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `insurance_type` (`id`),
  ADD CONSTRAINT `insurance_issue_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `insurance_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
