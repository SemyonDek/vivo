-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 24 2024 г., 04:20
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vivo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `TEXT` text NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`ID`, `NAME`, `TEXT`, `SRC`) VALUES
(2, 'Triton', 'Triton - российский производитель мебели для ванных комнат и акриловых ванн, соответствующих европейскому уровню качества и стиля, сохраняющий при этом свою ценовую доступность. Вот уже более 10 лет компания Тритон радует нас продукцией высочайшего класса по доступной цене.\r\n\r\nДля производства акриловых и гидромассажных ванн Triton используется сырье и оборудование крупнейших мировых производителей. Эксклюзивный дизайн, высочайшее качество, широкий модельный ряд акриловых гидромассажных ванн непременно удовлетворит самый взыскательный вкус. А десятилетняя гарантия на акриловые ванны Тритон и годовая на гидромассажное оборудование непременно порадует Вас.\r\n\r\nКорпуса мебели изготавливаются из ламинированной плиты ДСТП класса Р-4, торцевые поверхности деталей облицованы специальным материалом с использованием влагостойкого клея. Фасады мебели для ванной Triton сделаны из плиты МДФ с применением качественной пленки ПВХ. Поверхность зеркал для ванной и зеркальных шкафов покрывается серебряной амальгамой, что значительно увеличивает их срок эксплуатации. Дверцы оснащаются системой бесшумного плавного закрывания. В зеркалах и зеркальных шкафах устанавливаются светильники класса защиты IP 44, что обеспечивает повышение безопасности в условиях повседневного использования.\r\nДизайн мебели для ванной комнаты Triton разрабатывается на основе современных перспективных направлений и мировых тенденций. В проектировании используется система автоматического трехмерного проектирования, позволяющая рассчитать эффективное использование ограниченного пространства ванной комнаты. Тонкостенные металлические каркасы, используемые в качестве корпусов для выдвижных ящиков, увеличивают свободное пространство.\r\nДля транспортировки мебели используется безопасная упаковка, состоящая из многослойного картона и дополнительного слоя пенопласта, которые обеспечат доставку продукции в целостности и сохранности.\r\n\r\nВсе изделия соответствуют гигиеническим, эксплуатационным, санитарно-эпидемиологическим нормам, а также ГОСТ Р 16371-93.', 'img/brand/65bd7df367a7a.jpg'),
(3, 'Vitra', 'В 1966 году бренд VitrA стал использоваться для обозначения керамической сантехники Eczacıbaşı. Название «VitrA» - это производное от глагола «vitrify» - «превращать в стекло, глазировать (керамику)» (англ.). В 1983 году бренд VitrA, к тому моменту уже признанный лидер в Турции, вышел на международный рынок. В настоящее время VitrA является ведущим мировым поставщиком всего спектра товаров для ванной комнаты. На фабриках VitrA ежегодно производят миллионы единиц керамической сантехники и не малую часть из этого являются унитазы напольные, унитазы подвесные, биде и раковины для ванной комнаты.На предприятии применяются ультрасовременные технологии, такие как литье под высоким давлением, литейные формы быстрой сушки, роботы для очистки отливок в формовочном цехе и контроль производственного процесса с помощью штрих-кода. Дизайн лежит в основе бренда VitrA. В своем стремлении вывести керамическое искусство и культуру ванной комнаты в Турции на качественно новый уровень в 21 веке, VitrA собрала команду дизайнеров, которые помогают задавать новые тенденции и направления. При этом акцент делается на построение долгосрочных взаимоотношений, партнерского сотрудничества, которое со временем развивается и крепнет. Благодаря такому подходу к работе с дизайнерами, компания VitrA получила мировую известность и признание за оригинальные идеи и концепции, реализованные различными авторами и отмеченные рядом престижных премий в области дизайна.', 'img/brand/65bd8316e23a2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`ID`, `NAME`) VALUES
(1, 'Мебель для ванной'),
(2, 'Душевые кабины'),
(3, 'Ванны'),
(20, 'Аксессуары для ванной');

-- --------------------------------------------------------

--
-- Структура таблицы `orderItem`
--

CREATE TABLE `orderItem` (
  `IDORDER` int NOT NULL,
  `IDPROD` int NOT NULL,
  `QUANTITY` int NOT NULL,
  `AMOUNT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orderItem`
--

INSERT INTO `orderItem` (`IDORDER`, `IDPROD`, `QUANTITY`, `AMOUNT`) VALUES
(8, 1, 1, 9990),
(9, 1, 1, 9990),
(10, 1, 1, 9990),
(11, 1, 1, 9990);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `IDUSER` int NOT NULL,
  `ONECLICK` int NOT NULL,
  `SUMM` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `COMM` text NOT NULL,
  `DELIVERY` int NOT NULL,
  `PAY` int NOT NULL,
  `STATUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `IDUSER`, `ONECLICK`, `SUMM`, `NAME`, `PHONE`, `EMAIL`, `COMM`, `DELIVERY`, `PAY`, `STATUS`) VALUES
(9, 1, 0, 9990, 'Иванов Иван', '89306547272', 'rrr@ff.com', 'Сколько стоит доставка?', 1, 1, 2),
(12, 0, 0, 9492, '', 'aasdf', '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `photosProd`
--

CREATE TABLE `photosProd` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photosProd`
--

INSERT INTO `photosProd` (`ID`, `IDPROD`, `SRC`) VALUES
(1, 1, 'img/product/65bda15f9ee01.jpg'),
(2, 1, 'img/product/65bda15f9fbaf.jpg'),
(3, 1, 'img/product/65bda15fa06e5.jpg'),
(56, 21, 'img/product/65c553f7ba293.jpeg'),
(57, 22, 'img/product/65c55420b18e8.jpeg'),
(58, 23, 'img/product/65c5544b83e4a.jpeg'),
(59, 24, 'img/product/65c554782b77a.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `CODE` varchar(255) NOT NULL,
  `IDCAT` int NOT NULL,
  `PRICE` int NOT NULL,
  `SALE` int NOT NULL,
  `IDBRAND` int NOT NULL,
  `SERIES` varchar(255) NOT NULL,
  `COUNTRY` varchar(255) NOT NULL,
  `WARRANTY` int NOT NULL,
  `MIRROR` varchar(255) NOT NULL,
  `XSIZE` int NOT NULL,
  `YSIZE` int NOT NULL,
  `ZSIZE` int NOT NULL,
  `COLOR` varchar(255) NOT NULL,
  `LIGHT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `NAME`, `CODE`, `IDCAT`, `PRICE`, `SALE`, `IDBRAND`, `SERIES`, `COUNTRY`, `WARRANTY`, `MIRROR`, `XSIZE`, `YSIZE`, `ZSIZE`, `COLOR`, `LIGHT`) VALUES
(1, 'Triton Акриловая ванна Стандарт 150x70', '4331', 3, 9990, 0, 2, 'Стандарт', 'Россия', 6, 'Нет', 70, 150, 56, 'Белый', 0),
(21, '123', '122', 2, 123, 123, 2, '123', '123', 1, '123', 123, 123, 123, '123', 1),
(22, '1231123', '123', 2, 123, 123, 2, '1232', '123', 4, '123', 123, 123, 123, '123', 1),
(23, '123', '123', 1, 123, 123, 2, '123', '123', 2, '123', 123, 123, 123, '123', 1),
(24, '123', '123', 20, 123, 123, 2, '123', '123', 2, '123', 123, 123, 123, '123', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `productsDay`
--

CREATE TABLE `productsDay` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `productsDay`
--

INSERT INTO `productsDay` (`ID`, `IDPROD`) VALUES
(10, 1),
(23, 21),
(24, 22),
(25, 23),
(26, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `productsSale`
--

CREATE TABLE `productsSale` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `productsSale`
--

INSERT INTO `productsSale` (`ID`, `IDPROD`) VALUES
(7, 1),
(20, 21),
(21, 22),
(22, 23),
(23, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL,
  `ESTIMATION` int NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `TEXT` text NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `PUBLICATION` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`ID`, `IDPROD`, `ESTIMATION`, `USERNAME`, `TEXT`, `DATE`, `PUBLICATION`) VALUES
(8, 1, 2, 'Иванов Иван', 'Плохой товар', '04.02.2024 г.', 1),
(9, 1, 5, 'Иванов Иван', 'Хороший', '04.02.2024 г.', 1),
(10, 1, 5, 'Иванов Иван', 'Отлично', '04.02.2024 г.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `ID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`ID`, `SRC`) VALUES
(5, 'img/slider/65bf40b220aee.jpg'),
(6, 'img/slider/65bf4187a5ad1.jpg'),
(7, 'img/slider/65bf418fac127.jpg'),
(8, 'img/slider/65bf4196bd112.jpg'),
(9, 'img/slider/65bf41a219b18.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `NUMBER`, `EMAIL`) VALUES
(1, 'user', 'u', 'Иванов Иван Иванович', '89306547272', 'rrr@ff.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `photosProd`
--
ALTER TABLE `photosProd`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `productsDay`
--
ALTER TABLE `productsDay`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `productsSale`
--
ALTER TABLE `productsSale`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `photosProd`
--
ALTER TABLE `photosProd`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `productsDay`
--
ALTER TABLE `productsDay`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `productsSale`
--
ALTER TABLE `productsSale`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
