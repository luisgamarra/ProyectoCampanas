-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2018 a las 17:33:54
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
  `categoria_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `title`, `description`, `place`, `vacant`, `start_date`, `end_date`, `imagen`, `user_id`, `categoria_id`, `estado`) VALUES
(1, 'Friaje', 'Las estadisticas son de miedo. Segun el Ministerio de Salud (Minsa), a la fecha, 604 personas han fallecido por neumonia, producto de las bajas temperaturas. De estas muertes, mas de 400 corresponden a adultos mayores y 72 a ninios menores de cinco anios.\r\n\r\nPor ello, el Indeci recomendo a las poblaciones de las jurisdicciones azotadas por las heladas usar ropa abrigadora, evitar cambios bruscos de temperatura, asi como cumplir con el cronograma de vacunacion de los mas pequenios y guarecer en cobertizos a las crias de los animales.', 'Puno', 21, '2018-12-07', '2019-01-23', 'campana1.jpg', 1, 3, 1),
(2, 'Asilos', 'Se inició como un voluntariado y compromiso social dando apoyo a ancianos de escasos recursos y salud deteriorada, con ayuda en su mismo lugar de residencia, pero al ver que no era suficiente las visitas y apoyo semanal, las integrantes decidieron fundar SPLENDOR Casa Hogar para la Tercera Edad, y desde Diciembre del 2004 alquilamos una vivienda donde venimos brindando casa, alimentación, enfermería geriátrica y cuidados personales.', 'Lima', 19, '2018-10-14', '2018-11-01', 'campana2.jpg', 1, 1, 1),
(3, 'Hospital', 'Según explicó el Ministerio de Salud (Minsa), administrador de estos centros médicos, la medida forma parte de la Política Nacional de Hospitales Seguros frente a los Desastres. Para esto firmaron un convenio con la Universidad Nacional de Ingeniería (UNI),  que elaborará los expedientes técnicos de las obras necesarias para mejorar la infraestructura de estos hospitales ante un sismo. La lista incluye al Dos de Mayo, Hipólito Unanue, Cayetano Heredia, Arzobispo Loayza y María Auxiliadora. La inversión sería de más de 4 millones de soles para financiar estos estudios en un plazo de 70 días.', 'Lima', 19, '2018-12-07', '2019-01-04', 'campana3.jpg', 1, 2, 1),
(4, 'Orfanato', 'La aldea infantil Juan Pablo II, es una casa hogar para niños huérfanos y niños  Juan Pablo II - Voluntariado en Peru quienes han sido ubicados por las autoridades en este hogar para su cuidado. Tiene una población de 60 niños cuyas edades van de 0 a 18 años. Existen siete casas, en cada casa hay entre 8 y 9 niños viviendo con una “mama”. Las edades de los niños en las casas son mezclados, para simular una especie de situación de familia. Los niños de 3 años a más van a la escuela fuera del orfanato. El tiempo de enseñanza en la escuela es diferente, algunos van a la escuela por la mañana y otros por la tarde. ', 'Lima', 20, '2018-10-16', '2018-11-03', 'campana4.jpg', 1, 2, 1),
(5, 'Inundaciones', 'Un nuevo desborde del río Rímac inundó ayer varias calles y zonas del distrito de San Juan de Lurigancho, el más grande y poblado de Lima con más de un millón de habitantes.\r\n\r\nLa región Lima ha registrado dos fallecidos y 2.739 damnificados por las inundaciones, y además tiene 9.550 personas afectadas por la emergencia climática, según el último reporte del Centro de Operaciones de Emergencia Nacional (Coen).\r\n\r\nA nivel nacional, las intensas lluvias e inundaciones han causado 64 muertos, más de 62.000 damnificados, 170 heridos, 7.974 casas colapsadas y 19 colegios derrumbados. \r\n\r\n', 'Tacna', 19, '2018-10-17', '2018-11-06', 'campana5.jpg', 1, 3, 1),
(6, 'Sismo', 'El ‘Cinturón de fuego del Pacífico’ está conformado por todos los países que bordean el Océano Pacífico. Entre ellos está Filipinas, Papúa Nueva Guinea y el Perú. Esta zona es escenario de una intensa actividad sísmica y volcánica.\r\n\r\nPor eso, es indispensable que tengamos siempre lista en casa tu “mochila de emergencia” donde debes poner agua, alimentos no perecibles y artículos de primeros auxilios. \r\n', 'Piura', 19, '2018-10-18', '2018-11-05', 'campana6.jpg', 1, 3, 1),
(7, 'Dona Sangre', 'breve descripcion', 'lima', 10, '2018-11-08', '2018-11-02', 'noviembre1.jpg', 1, 1, 1),
(8, 'fff', 'fff', 'ffff', 44, '2017-10-31', '2017-10-31', 'octubre012017.png', 1, 4, 1),
(12, 'enero1', 'breve descripcion', 'Piura', 20, '2018-01-25', '2018-01-30', 'enero1.jpg', 1, 1, 1),
(13, ' enero2', 'breve descripcion', 'Piura', 20, '2018-01-26', '2018-01-30', 'enero2.jpg', 1, 2, 1),
(14, ' enero3', 'breve descripcion', 'Piura', 20, '2018-01-26', '2018-01-30', 'enero3.jpg', 1, 3, 1),
(15, 'febrero1', 'breve descripcion', 'Piura', 20, '2018-02-25', '2018-02-28', 'febrero1.jpg', 1, 1, 1),
(16, ' febrero2', 'breve descripcion', 'Piura', 20, '2018-02-25', '2018-02-28', 'febrero2.jpg', 1, 2, 1),
(17, ' febrero3', 'breve descripcion', 'Piura', 20, '2018-02-25', '2018-02-28', 'febrero3.png', 1, 3, 1),
(18, ' febrero4', 'breve descripcion', 'Piura', 20, '2018-02-25', '2018-02-28', 'febrero4.jpg', 1, 4, 1),
(19, 'marzo1', 'breve descripcion', 'Piura', 20, '2018-03-25', '2018-03-30', 'marzo1.png', 1, 1, 1),
(20, ' marzo2', 'breve descripcion', 'Piura', 20, '2018-03-25', '2018-03-30', 'marzo2.png ', 1, 2, 1),
(21, 'marzo3', 'breve descripcion', 'Piura', 20, '2018-03-25', '2018-03-30', 'marzo3.png ', 1, 3, 1),
(22, ' marzo4', 'breve descripcion', 'Piura', 20, '2018-03-25', '2018-03-30', 'marzo4.png ', 1, 4, 1),
(23, 'marzo5', 'breve descripcion', 'Piura', 20, '2018-03-25', '2018-03-30', 'marzo5.png ', 1, 5, 1),
(24, 'abril1', 'breve descripcion', 'Piura', 20, '2018-04-25', '2018-04-30', 'abril1.jpg', 1, 1, 1),
(25, 'abril2', 'breve descripcion', 'Piura', 20, '2018-04-25', '2018-04-30', 'abril2.jpg', 1, 2, 1),
(26, 'mayo1', 'breve descripcion', 'Piura', 20, '2018-05-25', '2018-09-30', 'mayo1.gif', 1, 1, 1),
(27, 'mayo2', 'breve descripcion', 'Piura', 20, '2018-05-25', '2018-09-30', 'mayo2.png', 1, 2, 1),
(28, 'junio1', 'breve descripcion', 'Piura', 20, '2018-06-25', '2018-06-30', 'junio1.jpg', 1, 1, 1),
(29, 'junio2', 'breve descripcion', 'Piura', 20, '2018-06-25', '2017-09-30', 'junio2.jpg', 1, 2, 1),
(30, 'julio1', 'breve descripcion', 'Piura', 20, '2018-07-25', '2018-07-30', 'julio1.png', 1, 1, 1),
(31, 'agosto1', 'breve descripcion', 'Piura', 20, '2018-08-25', '2018-09-15', 'agosto1.jpg', 1, 1, 1),
(32, ' agosto2', 'breve descripcion', 'Piura', 20, '2018-08-25', '2018-09-15', 'agosto2.png', 1, 2, 1),
(33, ' agosto3', 'breve descripcion', 'Piura', 20, '2018-08-25', '2018-09-15', 'agosto3.png', 1, 3, 1),
(34, 'setiembre1', 'breve descripcion', 'Piura', 20, '2018-09-25', '2018-09-30', 'setiembre1.jpg', 1, 4, 1),
(35, 'setiembre2', 'breve descripcion', 'Piura', 20, '2018-09-25', '2018-09-30', 'setiembre2.jpg', 1, 4, 1),
(36, 'junio3', 'breve descripcion', 'Piura', 20, '2018-06-25', '2018-09-15', 'junio3.png', 1, 3, 1),
(37, 'ayudemos a los adultos', 'ola ', 'Lima', 500, '2018-11-28', '2018-11-30', 'puerto 80.png', 1, 1, 1),
(38, 'niñitos', 'abc ', 'Lima', 499, '2018-11-29', '2018-11-30', 'GHC.png', 1, 2, 1),
(39, 'terremotos en ica', ' apoyemos', 'Ica', 199, '2018-11-21', '2018-11-30', 'terre.jpg', 1, 3, 1),
(40, 'Capita de Ozono', 'ayudemos ', 'Lima', 100, '2018-11-20', '2018-11-30', 'capaozono.jpg', 1, 4, 1),
(41, 'ggg', ' ggg', 'ggg', 55, '2018-11-28', '2018-11-30', 'GHC.png', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `descripcion`, `user_id`, `estado`) VALUES
(1, ' Adultos Mayores', 1, 1),
(2, ' Niños', 1, 1),
(3, ' Damnificados', 1, 1),
(4, ' Medio Ambiente', 1, 1),
(5, ' Animales', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_donacion`
--

CREATE TABLE `categoria_donacion` (
  `catdon_id` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_donacion`
--

INSERT INTO `categoria_donacion` (`catdon_id`, `descripcion`, `user_id`, `estado`) VALUES
(1, 'PRENDAS', 1, 1),
(2, 'MEDICAMENTOS', 1, 1),
(3, 'ALIMENTOS', 1, 1),
(4, 'HIGIENTE PERSONAL', 1, 1),
(5, 'APORTE ECONOMICO', 1, 1),
(6, 'NAVIDEÑA', 1, 1);

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
(5, 'Apoyemos la teleton', '2018-09-08', 7, 1, 1),
(6, ' holaaaa ps aaa hxxxx', '2018-09-24', 2, 1, 1),
(7, 'xd xd xd xd a', '2018-09-24', 2, 1, 1),
(8, 'yupi', '2018-10-23', 2, 1, 0),
(9, 'yyy', '0000-00-00', 2, 1, 1),
(10, 'ggg', '2018-10-29', 2, 1, 1),
(11, 'fddfd', '2018-10-28', 2, 1, 1),
(12, 'ffff', '2018-10-28', 2, 1, 1),
(13, 'ddd', '2018-10-28', 2, 1, 1);

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
(6, 2, 2, 1),
(7, 2, 3, 1),
(8, 2, 4, 1),
(9, 2, 5, 1),
(10, 2, 6, 1),
(11, 3, 2, 1),
(12, 3, 3, 1),
(13, 3, 4, 1),
(14, 3, 5, 1),
(40, 4, 2, 0),
(41, 5, 2, 1),
(42, 6, 2, 1),
(43, 38, 2, 1),
(44, 37, 2, 0),
(45, 7, 2, 1),
(46, 39, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantility` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `catdon_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `donations`
--

INSERT INTO `donations` (`donation_id`, `description`, `quantility`, `user_id`, `campaign_id`, `catdon_id`, `fecha`, `estado`) VALUES
(1, 'polo', 10, 2, 2, 1, '2018-11-02', 1),
(2, 'chompas', 10, 2, 1, 1, '0000-00-00', 1),
(3, 'casacas', 10, 4, 1, 1, '0000-00-00', 1),
(4, 'pantalones', 10, 5, 1, 1, '0000-00-00', 1),
(5, 'chalinas', 10, 6, 1, 1, '0000-00-00', 1),
(6, 'gorros', 10, 3, 1, 1, '0000-00-00', 1),
(7, 'polo', 10, 3, 2, 1, '0000-00-00', 1),
(8, 'almohadas', 10, 4, 2, 1, '0000-00-00', 1),
(9, 'frazadas', 10, 5, 2, 1, '0000-00-00', 1),
(10, 'colchones', 10, 6, 2, 1, '0000-00-00', 1),
(11, 'antigripale', 10, 2, 3, 2, '0000-00-00', 1),
(12, 'jeringas', 10, 3, 3, 2, '0000-00-00', 1),
(13, 'alcoholes', 10, 4, 3, 2, '0000-00-00', 1),
(14, 'agua oxigen', 10, 5, 3, 2, '0000-00-00', 1),
(15, 'desinflaman', 10, 6, 3, 2, '0000-00-00', 1),
(27, 'Paypal', 3, 2, 1, 5, '0000-00-00', 1),
(28, 'Paypal', 12.5, 2, 1, 5, '0000-00-00', 1),
(29, 'Paypal', 12, 2, 1, 5, '0000-00-00', 1),
(30, 'casacas', 1111, 5, 3, 1, '0000-00-00', 1),
(31, 'Paypal', 11, 2, 3, 5, '0000-00-00', 1),
(32, 'Paypal', 11, 2, 3, 5, '0000-00-00', 1),
(33, 'Paypal', 11, 2, 1, 5, '0000-00-00', 1),
(34, 'politos', 100, 2, 1, 1, '0000-00-00', 1),
(35, 'Paypal', 105, 2, 3, 5, '0000-00-00', 1),
(36, 'Paypal', 13.25, 2, 1, 5, '0000-00-00', 1),
(37, 'Paypal', 100, 3, 3, 5, '0000-00-00', 1),
(38, 'Paypal', 10.6, 3, 1, 5, '0000-00-00', 1),
(39, 'Paypal', 100, 2, 1, 5, '2018-11-02', 1),
(40, 'Megacilina', 124, 5, 1, 2, '2018-11-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `foro_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `respuestas` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`foro_id`, `title`, `fecha`, `respuestas`, `user_id`, `estado`) VALUES
(1, 'campañas para mascotas', '2018-09-08', 12, 2, 1),
(2, 'se creó una nueva campañaa', '2018-09-08', 0, 2, 1),
(3, 'que dijeron en la reunión', '2018-09-08', 0, 3, 1),
(4, 'Mas vacantes para la campaña friaje', '2018-09-08', 0, 4, 1),
(5, 'Apoyemos la teleton', '2018-09-08', 0, 5, 1),
(6, 'Reuniones por venir', '2018-09-08', 0, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `type`, `user_id`, `comentario_id`) VALUES
(1, 1, 2, 7),
(9, 0, 3, 7),
(10, 0, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `notificacion_id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `fecha` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `visto` int(1) NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`notificacion_id`, `descripcion`, `fecha`, `user_id`, `para`, `visto`, `estado`) VALUES
(1, ' Erick Rojas ha hecho una donacion de S/.10.50', '2018-10-29 01:16:05', 2, 1, 1, 1),
(4, 'Erick Rojas ha hecho una donacion de S/.10.50', '2018-10-17 17:23:54', 2, 1, 1, 1),
(5, 'Erick Rojas ha hecho una donacion de S/.10.50 para la campaña Hospital', '2018-10-17 17:23:59', 2, 1, 1, 1),
(6, 'Erick Rojas ha hecho una donacion de S/.10.50 para la campaña friaje', '2018-10-17 17:24:05', 2, 1, 1, 1),
(7, 'fffff', '2018-10-22 15:38:34', 3, 1, 1, 1),
(8, ' Erick Rojas ha hecho una donacion de S/.105 para la campaña Hospital', '2018-10-29 02:10:00', 2, 1, 1, 1),
(9, 'asdad', '2018-10-29 02:21:58', 4, 1, 1, 1),
(10, ' Erick Rojas ha hecho una donacion de S/. 13.25 para la campaña friaje', '2018-11-02 16:21:54', 2, 1, 1, 1),
(11, ' Erick Rojas ha hecho una donacion de S/. 100 para la campaña friaje', '2018-11-03 01:05:12', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `points`
--

CREATE TABLE `points` (
  `point_id` int(11) NOT NULL,
  `direccion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cx` text COLLATE utf8_unicode_ci,
  `cy` text COLLATE utf8_unicode_ci,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `points`
--

INSERT INTO `points` (`point_id`, `direccion`, `cx`, `cy`, `campaign_id`, `user_id`, `estado`) VALUES
(1, 'La Victoria 15033', '-12.063914675907379', ' -77.02999591827393', 1, 1, 1),
(2, 'Cercado de Lima 15046', '-12.073972268062498', ' -77.03519228576658', 2, 1, 1),
(3, 'isidro alcibar 112', '-12.0255848', '-77.04876760000002', 3, 1, 0),
(4, 'Rímac 15093', '-12.027484359898887', ' -77.03295707702637', 4, 1, 0),
(12, 'Lima 15083', '-12.060137568764313', ' -77.0416259765625', 4, 1, 0),
(13, 'Lima 15083', '-12.0671129', '-77.03576190000001', 3, 1, 0),
(14, 'Paseo Colon 125', '-12.0604452', '-77.03699139999998', 3, 1, 0),
(16, 'Paseo Colon 125', '-12.0604452', '-77.03699139999998', 3, 1, 0),
(17, 'Avenida Alfonso Ugarte 848', '-12.049813204513864', ' -77.04299926757812', 4, 1, 1),
(18, 'Cercado de Lima 15001', '-12.0491263', '-77.03053899999998', 5, 1, 0),
(19, 'La Victoria 15033', '-12.0656394', '-77.02478099999996', 5, 1, 1),
(20, 'San Miguel 15088', '-12.0686147', '-77.08810340000002', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunions`
--

CREATE TABLE `reunions` (
  `reunion_id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dates` date DEFAULT NULL,
  `hours` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reunions`
--

INSERT INTO `reunions` (`reunion_id`, `topic`, `dates`, `hours`, `user_id`, `campaign_id`, `estado`) VALUES
(1, '1º Integracion', '2018-11-13', '7:30pm', 1, 1, 1),
(2, 'segunda reunion', '2018-11-14', '7:30pm', 1, 1, 1),
(3, 'tercera reunion', '2018-12-12', '7:30pm', 1, 1, 1),
(4, 'cuarta reunion', '2018-10-16', '9:00pm', 1, 1, 1),
(5, 'quinta reunion', '2018-11-16', '7:30pm', 1, 1, 1),
(6, 'falta donaciones c2', '2018-10-16', '7:30pm', 1, 2, 1),
(7, 'segunda reunion c2 ', '2018-11-17', '7:30pm', 1, 2, 1),
(8, 'tercera reunion c2', '2018-12-16', '7:30pm', 1, 2, 1),
(9, 'cuarta reunion c2', '2018-10-20', '7:30pm', 1, 2, 1),
(10, 'quinta reunion c2', '2018-11-15', '7:30pm', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `testimonio_id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`testimonio_id`, `descripcion`, `user_id`, `estado`) VALUES
(1, 'LLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500', 2, 1),
(2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,', 4, 1),
(3, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,', 3, 1),
(4, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,', 5, 1),
(5, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,', 6, 1),
(6, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,', 7, 1),
(7, 'buen campaña de navidad el de ayer', 2, 0);

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
(1, 'Luis', 'Gamarra', 'luis.gam.94@gmail.com', '123456', 123456789, 'user.png', 1, 1),
(2, 'Erick', 'Rojas', 'zeek181@gmail.com', '111', 123456789, 'persona1.jpg', 2, 1),
(3, 'Pedro', 'Morales', 'pedro@gmail.com', '111', 123456789, 'persona2.jpeg', 2, 1),
(4, 'Edwar', 'Aguilar', 'edwar@gmail.com', '111', 123456789, 'persona3.jpg', 2, 1),
(5, 'Angelina', 'Jolie', 'angelina@gmail.com', '111', 123456789, 'persona4.jpg', 2, 1),
(6, 'Juana', 'Lamo', 'juana@gmail.com', '111', 123456789, 'persona5.jpg', 2, 1),
(7, 'Gabriela', 'Zambrano', 'gabriela@gmail.com', '111', 123456789, 'persona6.jpg', 2, 1),
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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `categoria_donacion`
--
ALTER TABLE `categoria_donacion`
  ADD PRIMARY KEY (`catdon_id`),
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
  ADD KEY `campaign_id` (`campaign_id`),
  ADD KEY `catdon_id` (`catdon_id`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`foro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comentario_id` (`comentario_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`notificacion_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`point_id`),
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
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`testimonio_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria_donacion`
--
ALTER TABLE `categoria_donacion`
  MODIFY `catdon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `details_campaigns`
--
ALTER TABLE `details_campaigns`
  MODIFY `detail_campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `foro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `notificacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `points`
--
ALTER TABLE `points`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reunions`
--
ALTER TABLE `reunions`
  MODIFY `reunion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `testimonio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `categoria_donacion`
--
ALTER TABLE `categoria_donacion`
  ADD CONSTRAINT `categoria_donacion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
-- Filtros para la tabla `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD CONSTRAINT `like_unlike_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `like_unlike_ibfk_2` FOREIGN KEY (`comentario_id`) REFERENCES `comentarios` (`comentario_id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`);

--
-- Filtros para la tabla `reunions`
--
ALTER TABLE `reunions`
  ADD CONSTRAINT `reunions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reunions_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`);

--
-- Filtros para la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD CONSTRAINT `testimonios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
