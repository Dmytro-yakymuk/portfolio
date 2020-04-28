-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2020 г., 15:22
-- Версия сервера: 10.3.22-MariaDB-54+deb10u1-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yakimuk_dmyto123`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `about_me`
--

INSERT INTO `about_me` (`id`, `name`, `text`) VALUES
(1, 'main', '<p>I am a 3rd year student of NUBiP specialty Software Engineering. I am 19 years old, live in Kiev. I have basic knowledge in Front end: HTML (Bootstrap), CSS, JS (jQuery, Ajax, Vue). I&#39;m more interested in Back end development in PHP (Laravel). I understand the principles of OOP, MVC. I use github and bitbucket. Usable MySQL DBMS.</p>\n'),
(2, 'about me', '<p>I am a 3rd year student of NUBiP specialty Software Engineering. I am 19 years old, live in Kiev. I have basic knowledge in Front end: HTML (Bootstrap), CSS, JS (jQuery, Ajax, Vue). I understand the principles of OOP, MVC. I use github and bitbucket. Usable MySQL DBMS.</p>\n\n<p>I&#39;m more interested in Back end development in PHP (Laravel):</p>\n\n<ul>\n	<li>Blade template</li>\n	<li>Migrate and seeder</li>\n	<li>CRUD operations</li>\n	<li>Links</li>\n	<li>Queries like join, leftJoin, rightJoin, union, where, whereNull, whereIn, orderBy, etc.</li>\n	<li>Validation</li>\n	<li>Rights and roles of users (policy)</li>\n	<li>Email newsletter</li>\n	<li>Queue Queues</li>\n</ul>\n\n<p>And much more.</p>\n\n<p>Also plugged in various plugins:</p>\n\n<ul>\n	<li>Cropping photos</li>\n	<li>Currency change</li>\n	<li>Multilingualism</li>\n	<li>Payment for Stripe and Liqpay</li>\n</ul>\n\n<p>My portfolio consists of:</p>\n\n<ul>\n	<li>several works locally (blogs, online stores, travel agencies)</li>\n	<li>on the hosting there is a stock exchange for performers of holidays&nbsp;<a href=\"http://svato.kl.com.ua/en\">http://svato.kl.com.ua/en</a></li>\n	<li>edited the blog&nbsp;<a href=\"http://climat-ukraine.com/\">http://climat-ukraine.com</a></li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `name`, `email`, `text`) VALUES
(1, 'Дмитро', 'dmytroyakimuk@gmail.com', '<p>write</p>\n');

-- --------------------------------------------------------

--
-- Структура таблицы `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `skills`
--

INSERT INTO `skills` (`id`, `name`, `parent_id`, `icon`) VALUES
(1, 'Linux Basics', 0, 'fa-gem'),
(2, 'Configure Ubuntu', 1, NULL),
(3, 'Server and desktop versions', 1, NULL),
(4, 'Linux base commands', 1, NULL),
(5, 'Installation of the Nginx web server', 1, NULL),
(6, 'Installing PHP', 1, NULL),
(7, 'Installing MySQL', 1, NULL),
(8, 'The Symfony application demo on DigitalOcean', 1, NULL),
(9, 'OOP', 0, 'fa-desktop'),
(10, 'Encapsulation', 9, NULL),
(11, 'Inheritance', 9, NULL),
(12, 'Polymorphism', 9, NULL),
(13, 'Classes and Objects', 9, NULL),
(14, 'Abstract classes and Interfaces', 9, NULL),
(15, 'Class and Static methods', 9, NULL),
(16, 'Constants', 9, NULL),
(17, 'Shake', 9, NULL),
(18, 'Exceptions', 9, NULL),
(19, 'NameSpace', 9, NULL),
(20, 'Auto Backup', 9, NULL),
(21, 'DBMS MySQL', 0, 'fa-rocket'),
(22, 'Combining tables', 21, NULL),
(23, 'Indexes', 21, NULL),
(24, 'Query optimization and EXPLAIN command', 21, NULL),
(25, 'Transactions', 21, NULL),
(26, 'Triggers and stored procedures', 21, NULL),
(27, 'Security in PHP', 0, 'fa-signal'),
(28, 'The main types of attacks', 27, NULL),
(29, 'Encryption', 27, NULL),
(30, 'Hashing', 27, NULL),
(31, 'Web application security standard practices', 27, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES
(1, 'admin', 'dmytroyakimuk@dmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT для таблицы `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
