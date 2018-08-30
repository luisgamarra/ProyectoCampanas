-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2018 a las 01:36:29
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcampanias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `place` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vacant` int(9) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `title`, `description`, `place`, `vacant`, `start_date`, `end_date`, `imagen`, `user_id`, `estado`) VALUES
(1, 'friaje', 'breve descripcion', 'lima', 23, '2018-08-01', '2018-08-01', 'campana1.jpg', 1, 1),
(2, 'Asilos', 'breve descripcion', 'Lima', 20, '2018-08-29', '2018-09-15', 'campana2.jpg', 1, 1),
(3, 'Hospital', 'breve descripcion', 'Lima', 20, '2018-08-15', '2018-09-15', 'campana3.jpg', 1, 1),
(4, 'Orfanato', 'breve descripcion', 'Lima', 20, '2018-08-17', '2018-09-15', 'campana4.jpg', 1, 1),
(5, 'Inundaciones', 'breve descripcion', 'Tacna', 20, '2018-08-20', '2018-09-15', 'campana5.jpg', 1, 1),
(6, 'Sismo', 'breve descripcion', 'Piura', 20, '2018-08-25', '2018-09-15', 'campana6.jpg', 1, 1),
(7, 'ggg', 'tyryr', ' sfsdsfsf', 34, '2018-08-25', '2018-09-25', 'q.png', 1, 0),
(8, 'hhh', 'hh', 'h', 56, '2018-08-26', '2018-08-30', 'q.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_campaigns`
--

CREATE TABLE `details_campaigns` (
  `detail_campaign_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `details_campaigns`
--

INSERT INTO `details_campaigns` (`detail_campaign_id`, `campaign_id`, `user_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 2, 5),
(10, 2, 6),
(11, 3, 2),
(12, 3, 3),
(13, 3, 4),
(14, 3, 5),
(15, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `description` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `quantility` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `donations`
--

INSERT INTO `donations` (`donation_id`, `description`, `quantility`, `user_id`, `campaign_id`, `estado`) VALUES
(1, 'polo', 10, 2, 1, 1),
(2, 'chompas', 10, 3, 1, 1),
(3, 'casacas', 10, 4, 1, 1),
(4, 'pantalones', 10, 5, 1, 1),
(5, 'chalinas', 10, 6, 1, 1),
(6, 'gorros', 10, 2, 2, 1),
(7, 'polo', 10, 3, 2, 1),
(8, 'almohadas', 10, 4, 2, 1),
(9, 'frazadas', 10, 5, 2, 1),
(10, 'colchones', 10, 6, 2, 1),
(11, 'antigripale', 10, 2, 3, 1),
(12, 'jeringas', 10, 3, 3, 1),
(13, 'alcoholes', 10, 4, 3, 1),
(14, 'agua oxigen', 10, 5, 3, 1),
(15, 'desinflaman', 10, 6, 3, 1),
(16, 'gh', 1, 2, 3, 1),
(18, 'rttttt', 79, 5, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunions`
--

CREATE TABLE `reunions` (
  `reunion_id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dates` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reunions`
--

INSERT INTO `reunions` (`reunion_id`, `topic`, `dates`, `user_id`, `campaign_id`, `estado`) VALUES
(1, 'falta donaciones', '2018-08-08', 1, 1, 1),
(2, 'segunda reunion', '2018-08-08', 1, 1, 1),
(3, 'tercera reunion', '2018-08-08', 1, 1, 1),
(4, 'cuarta reunion', '2018-08-08', 1, 1, 1),
(5, 'quinta reunion', '2018-08-08', 1, 1, 1),
(6, 'falta donaciones c2', '2018-08-08', 1, 2, 1),
(7, 'segunda reunion c2 ', '2018-08-08', 1, 2, 1),
(8, 'tercera reunion c2', '2018-08-08', 1, 2, 1),
(9, 'cuarta reunion c2', '2018-08-08', 1, 2, 1),
(10, 'quinta reunion c2', '2018-08-08', 1, 2, 1),
(11, 'falta donaciones', '2018-08-03', 1, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` int(9) NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `cellphone`, `photo`, `type_id`, `estado`) VALUES
(1, 'Luisg', 'Gamarra', 'luis.gam.94@gmail.com', '123456', 123456789, 'q.png', 1, 1),
(2, 'Erick', 'Rojas', 'zeek@gmail.com', '111', 123456789, 'user.png', 2, 1),
(3, 'Pedro', 'Morales', 'pedro@gmail.com', '111', 123456789, 'user.png', 2, 1),
(4, 'Edwar', 'Aguilar', 'edwar@gmail.com', '111', 123456789, 'user.png', 2, 1),
(5, 'Angelina', 'Jolie', 'angelina@gmail.com', '111', 123456789, 'user.png', 2, 1),
(6, 'Juana', 'Lamo', 'juana@gmail.com', '111', 123456789, 'user.png', 2, 1),
(7, 'Gabriela', 'Zambrano', 'gabriela@gmail.com', '111', 123456789, 'user.png', 2, 1),
(8, 'Eduardo', 'Huarco', 'eduardo@gmail.com', '111', 123456789, 'user.png', 2, 1),
(9, 'Jeancarlo', 'Carnero', 'jeancarlo@gmail.com', '111', 123456789, 'user.png', 2, 1),
(10, 'David', 'Criollo', 'david@gmail.com', '111', 123456789, 'user.png', 2, 1),
(11, 'Juliana', 'Zevallos', 'juliana@gmail.com', '111', 123456789, 'user.png', 2, 1),
(12, 'Luisg', 'gu', '12@ff445', '1234567', 123456789, 'user.png', 1, 1),
(13, 'bnbn', 'bnbn', '12@ff22255', '1234567', 123456789, 'user.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `type_id` int(11) NOT NULL,
  `usertype` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`type_id`, `usertype`) VALUES
(1, 'Organizador'),
(2, 'Voluntario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `details_campaigns`
--
ALTER TABLE `details_campaigns`
  ADD PRIMARY KEY (`detail_campaign_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indices de la tabla `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indices de la tabla `reunions`
--
ALTER TABLE `reunions`
  ADD PRIMARY KEY (`reunion_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `details_campaigns`
--
ALTER TABLE `details_campaigns`
  MODIFY `detail_campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reunions`
--
ALTER TABLE `reunions`
  MODIFY `reunion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `details_campaigns`
--
ALTER TABLE `details_campaigns`
  ADD CONSTRAINT `details_campaigns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `details_campaigns_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`);

--
-- Filtros para la tabla `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`);

--
-- Filtros para la tabla `reunions`
--
ALTER TABLE `reunions`
  ADD CONSTRAINT `reunions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reunions_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
