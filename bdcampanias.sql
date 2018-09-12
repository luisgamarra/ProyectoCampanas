-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2018 a las 19:40:55
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
(1, 'friaje', 'Las estadisticas son de miedo. Segun el Ministerio de Salud (Minsa), a la fecha, 604 personas han fallecido por neumonia, producto de las bajas temperaturas. De estas muertes, mas de 400 corresponden a adultos mayores y 72 a ninios menores de cinco anios.\r\n\r\nPor ello, el Indeci recomendo a las poblaciones de las jurisdicciones azotadas por las heladas usar ropa abrigadora, evitar cambios bruscos de temperatura, asi como cumplir con el cronograma de vacunacion de los mas pequenios y guarecer en cobertizos a las crias de los animales.', 'Puno', 20, '2018-09-01', '2018-09-14', 'campana1.jpg', 1, 1),
(2, 'Asilos', 'Se inició como un voluntariado y compromiso social dando apoyo a ancianos de escasos recursos y salud deteriorada, con ayuda en su mismo lugar de residencia, pero al ver que no era suficiente las visitas y apoyo semanal, las integrantes decidieron fundar SPLENDOR Casa Hogar para la Tercera Edad, y desde Diciembre del 2004 alquilamos una vivienda donde venimos brindando casa, alimentación, enfermería geriátrica y cuidados personales.', 'Lima', 20, '2018-08-29', '2018-09-15', 'campana2.jpg', 1, 1),
(3, 'Hospital', 'Según explicó el Ministerio de Salud (Minsa), administrador de estos centros médicos, la medida forma parte de la Política Nacional de Hospitales Seguros frente a los Desastres. Para esto firmaron un convenio con la Universidad Nacional de Ingeniería (UNI),  que elaborará los expedientes técnicos de las obras necesarias para mejorar la infraestructura de estos hospitales ante un sismo. La lista incluye al Dos de Mayo, Hipólito Unanue, Cayetano Heredia, Arzobispo Loayza y María Auxiliadora. La inversión sería de más de 4 millones de soles para financiar estos estudios en un plazo de 70 días.', 'Lima', 20, '2018-08-15', '2018-09-15', 'campana3.jpg', 1, 1),
(4, 'Orfanato', 'La aldea infantil Juan Pablo II, es una casa hogar para niños huérfanos y niños  Juan Pablo II - Voluntariado en Peru quienes han sido ubicados por las autoridades en este hogar para su cuidado. Tiene una población de 60 niños cuyas edades van de 0 a 18 años. Existen siete casas, en cada casa hay entre 8 y 9 niños viviendo con una “mama”. Las edades de los niños en las casas son mezclados, para simular una especie de situación de familia. Los niños de 3 años a más van a la escuela fuera del orfanato. El tiempo de enseñanza en la escuela es diferente, algunos van a la escuela por la mañana y otros por la tarde. ', 'Lima', 20, '2018-08-17', '2018-09-15', 'campana4.jpg', 1, 1),
(5, 'Inundaciones', 'Un nuevo desborde del río Rímac inundó ayer varias calles y zonas del distrito de San Juan de Lurigancho, el más grande y poblado de Lima con más de un millón de habitantes.\r\n\r\nLa región Lima ha registrado dos fallecidos y 2.739 damnificados por las inundaciones, y además tiene 9.550 personas afectadas por la emergencia climática, según el último reporte del Centro de Operaciones de Emergencia Nacional (Coen).\r\n\r\nA nivel nacional, las intensas lluvias e inundaciones han causado 64 muertos, más de 62.000 damnificados, 170 heridos, 7.974 casas colapsadas y 19 colegios derrumbados. \r\n\r\n', 'Tacna', 20, '2018-08-20', '2018-09-15', 'campana5.jpg', 1, 1),
(6, 'Sismo', 'El ‘Cinturón de fuego del Pacífico’ está conformado por todos los países que bordean el Océano Pacífico. Entre ellos está Filipinas, Papúa Nueva Guinea y el Perú. Esta zona es escenario de una intensa actividad sísmica y volcánica.\r\n\r\nPor eso, es indispensable que tengamos siempre lista en casa tu “mochila de emergencia” donde debes poner agua, alimentos no perecibles y artículos de primeros auxilios. \r\n', 'Piura', 20, '2018-08-25', '2018-09-15', 'campana6.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `foro_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `description`, `fecha`, `user_id`, `foro_id`, `estado`) VALUES
(1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-09-08', 3, 1, 1),
(2, ' aaaaaaaaaaaaaaaaaaaaaaaaaaa bbbbb', '2018-09-08', 4, 1, 1),
(3, 'que dijeron en la reunión', '2018-09-08', 5, 1, 1),
(4, 'Mas vacantes para la campaña friaje', '2018-09-08', 6, 1, 1),
(5, 'Apoyemos la teleton', '2018-09-08', 7, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_campaigns`
--

CREATE TABLE `details_campaigns` (
  `detail_campaign_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `details_campaigns`
--

INSERT INTO `details_campaigns` (`detail_campaign_id`, `campaign_id`, `user_id`, `estado`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 1, 4, 1),
(4, 1, 5, 1),
(5, 1, 6, 1),
(6, 2, 2, 0),
(7, 2, 3, 1),
(8, 2, 4, 1),
(9, 2, 5, 1),
(10, 2, 6, 1),
(11, 3, 2, 0),
(12, 3, 3, 1),
(13, 3, 4, 1),
(14, 3, 5, 0),
(40, 4, 2, 0),
(41, 5, 2, 0),
(42, 6, 2, 0);

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
(1, 'polo', 11, 2, 1, 1),
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
(15, 'desinflaman', 10, 6, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `foro_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha` date DEFAULT NULL,
  `respuestas` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`foro_id`, `title`, `fecha`, `respuestas`, `user_id`, `estado`) VALUES
(1, 'campañas para mascotas', '2018-09-08', 8, 2, 1),
(2, 'se creó una nueva campaña', '2018-09-08', 0, 2, 1),
(3, 'que dijeron en la reunión', '2018-09-08', 0, 3, 1),
(4, 'Mas vacantes para la campaña friaje', '2018-09-08', 0, 4, 1),
(5, 'Apoyemos la teleton', '2018-09-08', 0, 5, 1),
(6, 'Reuniones por venir', '2018-09-08', 0, 2, 1);

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
(1, 'falta donaciones', '2018-09-09', 1, 1, 1),
(2, 'segunda reunion', '2018-09-11', 1, 1, 1),
(3, 'tercera reunion', '2018-09-13', 1, 1, 1),
(4, 'cuarta reunion', '2018-09-15', 1, 1, 1),
(5, 'quinta reunion', '2018-09-18', 1, 1, 1),
(6, 'falta donaciones c2', '2018-08-08', 1, 2, 1),
(7, 'segunda reunion c2 ', '2018-08-08', 1, 2, 1),
(8, 'tercera reunion c2', '2018-08-08', 1, 2, 1),
(9, 'cuarta reunion c2', '2018-08-08', 1, 2, 1),
(10, 'quinta reunion c2', '2018-08-08', 1, 2, 0);

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
(1, 'Luis', 'Gamarra', 'luis.gam.94@gmail.com', '123456', 123456789, 'q.png', 1, 1),
(2, 'Erick', 'Rojas', 'zeek181@gmail.com', '111', 123456789, 'user.png', 2, 1),
(3, 'Pedro', 'Morales', 'pedro@gmail.com', '111', 123456789, 'user.png', 2, 1),
(4, 'Edwar', 'Aguilar', 'edwar@gmail.com', '111', 123456789, 'user.png', 2, 1),
(5, 'Angelina', 'Jolie', 'angelina@gmail.com', '111', 123456789, 'user.png', 2, 1),
(6, 'Juana', 'Lamo', 'juana@gmail.com', '111', 123456789, 'user.png', 2, 1),
(7, 'Gabriela', 'Zambrano', 'gabriela@gmail.com', '111', 123456789, 'user.png', 2, 1),
(8, 'Eduardo', 'Huarco', 'eduardo@gmail.com', '111', 123456789, 'user.png', 2, 1),
(9, 'Jeancarlo', 'Carnero', 'jeancarlo@gmail.com', '111', 123456789, 'user.png', 2, 1),
(10, 'David', 'Criollo', 'david@gmail.com', '111', 123456789, 'user.png', 2, 1),
(11, 'Juliana', 'Zevallos', 'juliana@gmail.com', '111', 123456789, 'user.png', 2, 1);

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
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `foro_id` (`foro_id`);

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
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`foro_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `details_campaigns`
--
ALTER TABLE `details_campaigns`
  MODIFY `detail_campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `foro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reunions`
--
ALTER TABLE `reunions`
  MODIFY `reunion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`foro_id`) REFERENCES `foro` (`foro_id`);

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
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
