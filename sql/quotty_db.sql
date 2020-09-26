-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 26 2020 г., 13:17
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.10

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
-- Структура таблицы `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `collections`
--

INSERT INTO `collections` (`id`, `name`, `description`, `icon`, `user_id`, `creation_date`) VALUES
(2, 'Books', 'Quotes about books and reading', NULL, '4', 1),
(3, 'Success', '...', NULL, '4', 2),
(4, 'Friendship', 'Quotes about friends', NULL, '4', 3),
(5, 'Love', 'Quotes about relaionships', NULL, '4', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
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
(79, 30, 4),
(80, 32, 4),
(81, 27, 4),
(82, 23, 4),
(83, 22, 4),
(84, 19, 4),
(85, 20, 4),
(86, 17, 4),
(87, 13, 4),
(88, 35, 4),
(89, 35, 5),
(90, 29, 5),
(91, 30, 5),
(92, 33, 5),
(93, 26, 5),
(94, 28, 5),
(95, 30, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `quotes`
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
(13, 'So many books, so little time.', 'Frank Zappa', 4, 1, 1600524401),
(14, 'A room without books is like a body without a soul.', ' Marcus Tullius Cicero', 4, 0, 1600524433),
(15, 'You only live once, but if you do it right, once is enough.', 'Mae West', 4, 0, 1600524462),
(16, 'Be the change that you wish to see in the world.', 'Mahatma Gandhi', 4, 0, 1600524497),
(17, 'If you tell the truth, you don\'t have to remember anything.', 'Mark Twain', 4, 1, 1600524550),
(18, 'Always forgive your enemies; nothing annoys them so much.', 'Oscar Wilde', 4, 0, 1600524586),
(19, 'To live is the rarest thing in the world. Most people exist, that is all.', 'Oscar Wilde', 4, 1, 1600524602),
(20, 'Get busy living or get busy dying.', 'Stephen King', 4, 1, 1600524745),
(21, 'Those who dare to fail miserably can achieve greatly.', 'John F. Kennedy', 4, 0, 1600524774),
(22, 'I’m a success today because I had a friend who believed in me and I didn’t have the heart to let him down.', 'Abraham Lincoln', 4, 1, 1600524842),
(23, 'Love is a serious mental disease.', 'Plato', 4, 1, 1600524866),
(24, 'If you want to live a happy life, tie it to a goal, not to people or things.', 'Albert Einstein', 4, 0, 1600524908),
(25, 'Many of life’s failures are people who did not realize how close they were to success when they gave up.', 'Thomas A. Edison', 4, 0, 1600524925),
(26, 'If you want to be happy, be.', 'Leo Tolstoy', 4, 1, 1600524943),
(27, 'A friend is someone who gives you total freedom to be yourself.', 'Jim Morrison', 4, 1, 1600524971),
(28, 'Your time is limited, so don’t waste it living someone else’s life. Don’t be trapped by dogma – which is living with the results of other people’s thinking.', 'Steve Jobs', 4, 1, 1600524997),
(29, 'A man is a success if he gets up in the morning and gets to bed at night, and in between he does what he wants to do.', 'Bob Dylan', 4, 1, 1600525110),
(30, 'The whole secret of a successful life is to find out what is one’s destiny to do, and then do it.', 'Henry Ford', 4, 3, 1600525131),
(31, 'Success? I don’t know what that word means. I’m happy. But success, that goes back to what in somebody’s eyes success means. For me, success is inner peace. That’s a good day for me.', 'Denzel Washington', 4, 0, 1600525147),
(32, 'In order to write about life first you must live it.', 'Ernest Hemingway', 4, 1, 1600525166),
(33, 'We are what we repeatedly do; excellence, then, is not an act but a habit.', 'Aristotle', 4, 1, 1600525187),
(34, 'The big lesson in life, baby, is never be scared of anyone or anything.', 'Frank Sinatra', 4, 0, 1600525207),
(35, 'The person who reads too much and uses his brain too little will fall into lazy habits of thinking.', 'Albert Einstein', 4, 2, 1600525228);

-- --------------------------------------------------------

--
-- Структура таблицы `quote_collections`
--

CREATE TABLE `quote_collections` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quote_collections`
--

INSERT INTO `quote_collections` (`id`, `quote_id`, `collection_id`) VALUES
(2, 13, 2),
(3, 14, 2),
(4, 35, 2),
(5, 15, 3),
(6, 21, 3),
(7, 22, 3),
(8, 25, 3),
(9, 28, 3),
(10, 29, 3),
(11, 30, 3),
(12, 31, 3),
(13, 18, 4),
(14, 27, 4),
(15, 23, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `saves`
--

CREATE TABLE `saves` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `saves`
--

INSERT INTO `saves` (`id`, `quote_id`, `user_id`) VALUES
(18, 23, 4),
(19, 19, 4),
(20, 17, 4),
(21, 35, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
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
(4, 'vitaly.povstenko@gmail.com', '123', NULL, 'E0NIkRiU0fenTCsF5wo37xq4miMURl00pE2pet1htbxh3kWkqx52q9U3kDa45GNfu7yCakBTKv4q2mXH'),
(5, 'test@gmail.com', '123', NULL, 'fY4OrWXTA0hkZCiTAv3e2Ab85ov9ZcU0LDevr9ghgRCv7wq47srvtvr54i3LFc0VLJbEJBVoW6A2umc8'),
(6, 'test@test', '123', NULL, 'xqnBsi46ozKWX7T4zUVyjuKxfhwkF27pYq1kZTci9xWrQNsG6kmxXRpCsgFVBr85oqNqDmmprAfzZkM1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `quote_collections`
--
ALTER TABLE `quote_collections`
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
-- AUTO_INCREMENT для таблицы `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `quote_collections`
--
ALTER TABLE `quote_collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `saves`
--
ALTER TABLE `saves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
