-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2023 г., 10:44
-- Версия сервера: 10.6.7-MariaDB-log
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `params_value`
--

CREATE TABLE `params_value` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `param` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `params_value`
--

INSERT INTO `params_value` (`id`, `id_type`, `param`, `img`, `price`, `public`) VALUES
(1, 1, 'Красный', 'red', '100', 1),
(2, 1, 'Синий', 'blue', '200', 1),
(3, 1, 'Зеленый', 'green', '300', 1),
(4, 1, 'Желтый', 'yellow', '400', 1),
(5, 6, 'Правое', '', '500', 1),
(6, 6, 'Левое', '', '300', 1),
(7, 2, 'Красный', 'red', '100', 1),
(8, 2, 'Синий', 'blue', '200', 1),
(9, 2, 'Зеленый', 'green', '300', 1),
(10, 2, 'Желтый', 'yellow', '400', 1),
(11, 3, 'Красный', 'red', '100', 1),
(12, 3, 'Синий', 'blue', '200', 1),
(13, 3, 'Зеленый', 'green', '300', 1),
(14, 3, 'Желтый', 'yellow', '400', 1),
(15, 4, '90 см', '', '400', 1),
(16, 4, '100 см', '', '400', 1),
(17, 5, '200 см', '', '400', 1),
(18, 5, '210 см', '', '400', 1),
(19, 7, 'Глазок', '', '400', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type_params`
--

CREATE TABLE `type_params` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_params`
--

INSERT INTO `type_params` (`id`, `type`, `public`) VALUES
(1, 'Цвет покраски', 1),
(2, 'Цвет пленки', 1),
(3, 'Цвет ручки', 1),
(4, 'Ширина', 1),
(5, 'Высота', 1),
(6, 'Открывание', 1),
(7, 'Аксессуары', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_params`
--

CREATE TABLE `users_params` (
  `id` int(11) NOT NULL,
  `session` bigint(20) NOT NULL,
  `type_param` int(11) NOT NULL,
  `value_param` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `params_value`
--
ALTER TABLE `params_value`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_params`
--
ALTER TABLE `type_params`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_params`
--
ALTER TABLE `users_params`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `params_value`
--
ALTER TABLE `params_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `type_params`
--
ALTER TABLE `type_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users_params`
--
ALTER TABLE `users_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
