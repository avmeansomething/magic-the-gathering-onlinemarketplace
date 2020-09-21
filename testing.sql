-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2020 г., 12:16
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `mess` text NOT NULL,
  `id_trade` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `mess`, `id_trade`) VALUES
(34, 17, 'Очень интересное предложение. Готов предложить обмен на колоду Севера \"Машины\".', 1),
(35, 23, 'за сколько готов продать?', 3),
(36, 22, 'qweqweqwe', 4),
(40, 19, 'testtest', 6),
(41, 19, 'testtest', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `messengers`
--

CREATE TABLE `messengers` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title_mess` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `trades`
--

CREATE TABLE `trades` (
  `id_trade` int(11) NOT NULL,
  `type_trade` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trades`
--

INSERT INTO `trades` (`id_trade`, `type_trade`, `title`, `description`, `id_user`, `create_date`) VALUES
(1, 'Продажа', 'Сказочные Проходы', 'продам комплект Сказочных проходов', 17, '2020-05-25'),
(3, 'Продажа', 'Много дешевых карт', 'очень много интересных карт! (дешево)', 22, '2020-05-26'),
(4, 'Обмен', 'Сдаю старую коллекцию', 'меняю старую коллекцию карт', 22, '2020-05-26'),
(5, 'Продажа', 'Продам комплект фечей', 'Немного пожилые', 17, '2020-05-26'),
(6, 'Обмен', 'test', 'testtesttesttesttesttesttest', 19, '2020-06-02'),
(7, 'Обмен', 'test2', 'test2test2test2test2test2test2', 19, '2020-06-02');

-- --------------------------------------------------------

--
-- Структура таблицы `trade_photos`
--

CREATE TABLE `trade_photos` (
  `id_photo` int(11) NOT NULL,
  `id_trade` int(11) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `login`, `phone`) VALUES
(17, 'nikita', 'nsd@gmail.com', '123123', 'nsd', '+375447129016'),
(18, 'qwe', 'asd', 'rty', 'zxc', 'fgh'),
(19, 'Администратор', 'jakc98g@gmail.com', '123123', 'Admin', '+375331111111'),
(20, 'фыв', 'shelby@mail.ru', '123123', 'SergeyD', '+375447658812'),
(21, 'shelby', 'shelby@mail.ru', '123123', 'shelby123', '+375296655965'),
(22, 'qweqweqwe', 'qwe@qwe.qwe', 'qweqweqwe', 'qweqweqwe', 'qweqweqwe'),
(23, 'lerun', 'lercha@gmail.com', '123123', 'lercha', '+375449863256'),
(37, 'Евгений2', 'jakc98g@gmail.com', '123456', 'jakc9844', '+375447951245');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_trade` (`id_trade`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `messengers`
--
ALTER TABLE `messengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id_trade`),
  ADD KEY `user` (`id_user`);

--
-- Индексы таблицы `trade_photos`
--
ALTER TABLE `trade_photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_trade` (`id_trade`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `messengers`
--
ALTER TABLE `messengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `trades`
--
ALTER TABLE `trades`
  MODIFY `id_trade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `trade_photos`
--
ALTER TABLE `trade_photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_trade`) REFERENCES `trades` (`id_trade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `messengers`
--
ALTER TABLE `messengers`
  ADD CONSTRAINT `messengers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `trades`
--
ALTER TABLE `trades`
  ADD CONSTRAINT `trades_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `trade_photos`
--
ALTER TABLE `trade_photos`
  ADD CONSTRAINT `trade_photos_ibfk_1` FOREIGN KEY (`id_trade`) REFERENCES `trades` (`id_trade`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
