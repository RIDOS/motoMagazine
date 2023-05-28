-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 29 2023 г., 01:00
-- Версия сервера: 8.0.33-0ubuntu0.22.04.2
-- Версия PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_motomagazine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `title` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`) VALUES
(1, 0, 'Мотоциклы'),
(2, 0, 'Кофры'),
(3, 0, 'Мототюнинг'),
(4, 0, 'Мотоэкипировка'),
(5, 0, 'Расходники'),
(6, 0, 'Оборудование'),
(16, 2, 'боковые'),
(17, 2, 'задние'),
(18, 2, 'сумки на бак'),
(19, 2, 'туринговые'),
(20, 4, 'Городская мотоэкипировка'),
(21, 4, 'Туристическая мотоэкипировка'),
(22, 4, 'Кроссовая мотоэкипировка'),
(23, 1, 'Классика'),
(24, 1, 'Спортивные'),
(25, 1, 'Супербайк'),
(26, 1, 'Круизер'),
(27, 1, 'Дрэгстер'),
(28, 1, 'Мотард'),
(29, 1, 'Минибайк'),
(30, 1, 'Тяжёлые мотоциклы'),
(31, 1, 'Внедорожные'),
(33, 3, 'Новая подкатегория');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` char(60) NOT NULL,
  `about` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `id_category` int NOT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `about`, `img`, `price`, `status`, `id_category`, `date_create`) VALUES
(9, 'Мотоцикл Husqvarna VITPILEN 401 2022', ' Экстерьер\r\nОсновная идея мотоцикла состоит в том, чтобы отбросить все ненужные уловки и создать простую, прогрессивную смесь классического мышления и современного дизайна. Эта идея всегда была одной из основных в Husqvarna Motorcycles и сейчас сполна реализована в VITPILEN 401. Легкий и узкий корпус мотоцикла был разработан специально для комфортного маневрирования в перегруженной городской среде.\r\n17-ти дюймовые бронзовые анодированные диски с вкраплениями электрического желтого – это изюминка дизайна VITPILEN 401. Спицы придают мотоциклу особый шарм и являются данью временам классического мотоциклостроения.\r\n', '12401_1.png', '549900', 1, 23, '2023-05-21 07:14:05'),
(10, 'Мотоцикл Husqvarna Svartpilen 401 ABS B.D. 2022', 'Husqvarna Svartpilen 401 * – это прогрессивный, брутальный мотоцикл с вневременным дизайном и современным техническим оснащением. Мотоцикл, который подарит вам радость обладания чем-то уникальным и узнаваемым. Мотоцикл, с помощью которого будете каждый раз по-новому открывать уже привычную, казалось бы, городскую среду.', '2.png', '599900', 1, 23, '2023-05-21 07:14:05'),
(14, 'Мотоцикл Husqvarna Svartpilen 401 ABS B.D. 2023', 'Husqvarna Svartpilen 401* – это прогрессивный, брутальный мотоцикл с вневременным дизайном и современным техническим оснащением. Мотоцикл, который подарит вам радость обладания чем-то уникальным и узнаваемым. Мотоцикл, с помощью которого будете каждый раз по-новому открывать уже привычную, казалось бы, городскую среду.', '3.png', '343900', 1, 26, '2023-05-21 07:14:11'),
(15, 'Мотоцикл Husqvarna NORDEN 901 2023', 'Husqvarna Norden 901* - это выдающийся туристический мотоцикл. Он оснащён производительным, двухцилиндровым двигателем объемом 899 куб.см и мощностью 105 л.с., а так же обладает легкой стальной рамой. Norden 901 имеет всё необходимое для путешествий на дальние расстояния. Отличная подвеска справится с любым бездорожьем, а выверенная эргономика сделает путешествие приключением, а не испытанием. Исследуйте мир по-своему с новым Norden 901.', '4.png', '864900', 1, 30, '2023-05-21 07:14:11'),
(16, 'Мотоцикл Husqvarna Norden 901 Expedition', 'Революция свершилась: с Yamaha NIKEN самые крутые ', '5.png', '123900', 1, 27, '2023-05-21 07:14:11'),
(17, 'Мотоцикл Yamaha NIKEN MXT850 2021', 'Революция свершилась: с Yamaha NIKEN самые крутые повороты теперь – сплошное удовольствие. Впервые серийная модель мотоцикла с двухколесной передней подвеской гарантирует уверенность и ощущение безграничных возможностей в любую погоду и на любом покрытии. А мощный 3-цилиндровый двигатель объемом 847 куб.см. с комплектом вспомогательной электроники позволит райдеру любого уровня стать Мастером альпийских серпантинов. И никакого стресса при езде! ', '6.png', '540900', 1, 27, '2023-05-21 07:17:52'),
(18, 'ВЕПРЬ', 'Кроссовый мотоцик\n                        \n                        \n                        ', '18.png', '204000', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `sales_id` int NOT NULL,
  `prouct_id` int NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `count` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `sales_id`, `prouct_id`, `amount`, `count`) VALUES
(1, 3, 9, '549900', 3),
(2, 3, 10, '599900', 2),
(3, 4, 9, '549900', 6),
(4, 5, 10, '599900', 5),
(5, 5, 14, '343900', 3),
(6, 5, 15, '864900', 4),
(7, 5, 16, '123900', 1),
(8, 6, 10, '599900', 1),
(9, 7, 14, '343900', 1),
(10, 8, 9, '549900', 1),
(11, 9, 15, '864900', 1),
(12, 10, 17, '540900', 1),
(13, 11, 15, '864900', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `title` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'Пользователь'),
(2, 'Менеджер');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `date_create` datetime NOT NULL,
  `date_payment` timestamp NULL DEFAULT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `user_ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `date_create`, `date_payment`, `date_modification`, `status`, `comment`, `user_ip`) VALUES
(1, 8, '2023-05-28 11:16:00', NULL, '2023-05-28 06:16:00', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(2, 8, '2023-05-28 11:17:18', NULL, '2023-05-28 06:17:18', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(3, 8, '2023-05-28 11:36:18', NULL, '2023-05-28 06:36:18', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(4, 8, '2023-05-28 11:38:53', NULL, '2023-05-28 06:38:53', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(5, 8, '2023-05-28 14:20:04', NULL, '2023-05-28 09:20:04', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(6, 8, '2023-05-28 14:22:44', NULL, '2023-05-28 09:22:44', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(7, 8, '2023-05-28 14:23:32', NULL, '2023-05-28 09:23:32', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(8, 8, '2023-05-28 14:23:56', NULL, '2023-05-28 09:23:56', 0, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(9, 8, '2023-05-28 14:25:28', '2023-05-27 19:00:00', '2023-05-28 18:57:17', 1, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(10, 8, '2023-05-28 15:15:52', '2023-05-10 19:00:00', '2023-05-28 18:58:22', 1, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1'),
(11, 8, '2023-05-28 20:45:32', '2023-04-30 19:00:00', '2023-05-28 18:57:08', 1, 'id пользователя: 8\n\n                    Имя: Азат\n\n                    Тел: 9659390399\n\n                    Адрес: Уфа', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` char(50) NOT NULL,
  `pwd` char(50) NOT NULL,
  `name` char(50) NOT NULL,
  `phone` char(20) NOT NULL,
  `adress` mediumtext NOT NULL,
  `role_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `name`, `phone`, `adress`, `role_id`) VALUES
(4, 'guzairov99@bk.ru', '202cb962ac59075b964b07152d234b70', '0', '0', '0', 1),
(5, 'guza1@bk.ru', '202cb962ac59075b964b07152d234b70', '0', '0', '0', 1),
(6, 'guza2@bk.ru', '202cb962ac59075b964b07152d234b70', '0', '0', '0', 1),
(7, 'guza3@mail.ru', '202cb962ac59075b964b07152d234b70', '0', '0', '0', 1),
(8, 'ga@ge.ru', '202cb962ac59075b964b07152d234b70', 'Азат', '9659390399', 'Уфа', 1),
(9, 'ga1@ge.ru', '202cb962ac59075b964b07152d234b70', 'Менеджер', '88005553535', 'Уфа', 2),
(10, 'test', '202cb962ac59075b964b07152d234b70', 'tester', '8965930399', 'test', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_and_categories_fk` (`id_category`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchaises_product` (`prouct_id`),
  ADD KEY `purchaises_and_orderes` (`sales_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_and_user_fk` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_and_categories_fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchaises_and_orderes` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchaises_product` FOREIGN KEY (`prouct_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_and_users_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_and_users` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
