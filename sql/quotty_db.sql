-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 12 2020 г., 10:35
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `quotty_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--
-- Создание: Сен 10 2020 г., 21:05
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `quote_id`, `user_id`) VALUES
(6, 9, 1),
(7, 9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `quotes`
--
-- Создание: Сен 11 2020 г., 07:54
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `creation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quotes`
--

INSERT INTO `quotes` (`id`, `text`, `author`, `user_id`, `likes`, `creation_date`) VALUES
(1, 'quote1', 'author', 4, 0, 1599753442),
(2, 'quote2', 'me', 4, 0, 1599756021),
(3, 'test', 'test', 4, 0, 1599770376),
(4, '1', 'test', 4, 0, 1599770385),
(5, 'quote', 'admin', 4, 0, 1599770397),
(6, 'test', 'admin', 4, 0, 1599770407),
(7, 'create', 'admin', 4, 0, 1599770416),
(8, '2', 'tester', 4, 0, 1599770457),
(9, '3', 'teser', 4, 2, 1599770467),
(10, '4', 'tester', 4, 0, 1599770480),
(11, '5', 'tester', 4, 0, 1599770517);

-- --------------------------------------------------------

--
-- Структура таблицы `saves`
--
-- Создание: Сен 11 2020 г., 17:27
--

CREATE TABLE `saves` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Сен 08 2020 г., 18:52
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `is_admin`, `token`) VALUES
(4, 'vitaly.povstenko@gmail.com', '123', NULL, 'E0NIkRiU0fenTCsF5wo37xq4miMURl00pE2pet1htbxh3kWkqx52q9U3kDa45GNfu7yCakBTKv4q2mXH');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `saves`
--
ALTER TABLE `saves`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `saves`
--
ALTER TABLE `saves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;