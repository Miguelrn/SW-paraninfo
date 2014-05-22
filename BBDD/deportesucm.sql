-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2014 a las 18:50:41
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE IF NOT EXISTS `encuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `deporte` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `id_user`, `deporte`) VALUES
(5, 1, 'Futbol'),
(6, 0, 'Futbol'),
(8, 8, 'Tenis'),
(9, 3, 'Tenis'),
(10, 9, 'Balonmano'),
(11, 9, 'Balonmano'),
(12, 10, 'Rugby');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logeos`
--

CREATE TABLE IF NOT EXISTS `logeos` (
  `id_user` int(11) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logeos`
--

INSERT INTO `logeos` (`id_user`, `correo`, `fecha`) VALUES
(10, 'k@k.com', '2014-05-09 20:57:36');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `txn_id` varchar(19) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre_pista` varchar(50) NOT NULL,
  `NumeroPistas` int(11) NOT NULL DEFAULT '1',
  `precio` decimal(6,2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` int(2) NOT NULL,
  `tipo_reserva` varchar(30) NOT NULL,
  `zona` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_user`, `txn_id`, `email`, `nombre_pista`, `NumeroPistas`, `precio`, `fecha`, `hora`, `tipo_reserva`, `zona`) VALUES
(22, 1, '', '', 'Futbol', 2, '0.00', '2014-05-31', 12, '1 hora', 'norte'),
(23, 1, '', '', 'Futbol', 1, '0.00', '2014-05-31', 15, '1 hora', 'norte'),
(20, 1, '', '', 'Futbol', 1, '0.00', '2014-05-31', 9, 'partido', 'norte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE IF NOT EXISTS `pistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `zona` varchar(30) NOT NULL,
  `NumeroPistas` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`id`, `nombre`, `zona`, `NumeroPistas`) VALUES
(1, 'Futbol', 'norte', 2),
(2, 'Futbol sala', 'norte', 1),
(3, 'Balonmano', 'norte', 1),
(4, 'Baloncesto', 'norte', 1),
(5, 'Rugby', 'norte', 1),
(6, 'Tenis', 'norte', 1),
(7, 'Piscina', 'seniora', 1),
(8, 'Polideportivo', 'somosaguas', 1),
(9, 'Atletismo', 'sur', 1),
(10, 'Balonmano', 'sur', 1),
(11, 'Baloncesto', 'sur', 1),
(12, 'Fronton', 'sur', 1),
(13, 'Futbol', 'sur', 1),
(14, 'Sala Multiple', 'sur', 1),
(15, 'Musculacion', 'sur', 1),
(16, 'Padel', 'sur', 1),
(17, 'Piscina', 'sur', 1),
(18, 'Rocodromo', 'sur', 1),
(19, 'Rugby', 'sur', 1),
(20, 'Tenis', 'sur', 1),
(21, 'Voleibol', 'sur', 1),
(22, 'Volley playa', 'sur', 1),
(23, 'Sala columnas', 'sur', 1),
(24, 'Rugby', 'suroeste', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `nombre`, `precio`, `tipo`) VALUES
(1, 'Piscina-seniora', '7.00', '1 banio'),
(2, 'Piscina-seniora', '25.00', '10 banios'),
(3, 'Piscina-seniora', '75.00', '1 calle'),
(4, 'Tenis', '3.00', 'antes 12'),
(5, 'Tenis', '5.00', 'despues 13'),
(6, 'Padel', '3.00', 'antes 12'),
(7, 'Padel', '5.00', 'despues 13'),
(8, 'Volley playa', '3.00', 'antes 12'),
(9, 'Volley playa', '5.00', 'despues 13'),
(10, 'Atletismo', '40.00', '1 hora'),
(11, 'Fronton', '7.00', '1 hora'),
(12, 'Baloncesto', '12.00', '1 hora'),
(13, 'Balonmano', '12.00', '1 hora'),
(15, 'Futbol sala', '12.00', '1 hora'),
(16, 'Voleibol', '12.00', '1 hora'),
(17, 'Rugby', '36.00', '1 hora'),
(18, 'Rugby', '51.00', 'partido'),
(23, 'Polideportivo', '100.00', '1 hora'),
(24, 'Futbol-norte', '85.00', '1 hora'),
(25, 'Futbol-norte', '123.00', 'partido'),
(26, 'Futbol-sur', '114.00', '1 hora'),
(27, 'Futbol-sur', '165.00', 'partido'),
(28, 'Musculacion', '10.00', '1 hora'),
(29, 'Rocodromo', '10.00', '1 hora'),
(30, 'Sala multiple', '0.00', '1 hora'),
(31, 'Piscina-sur', '0.00', '1 hora'),
(32, 'Sala columnas', '0.00', '1 hora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nombreuser` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` int(11) NOT NULL,
  `encuesta` tinyint(1) NOT NULL DEFAULT '0',
  `imagen` blob NOT NULL,
  PRIMARY KEY (`id`,`nombreuser`,`correo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `nombreuser`, `password`, `correo`, `provincia`, `fecha`, `fecha_registro`, `tipo`, `encuesta`, `imagen`) VALUES
(1, 'Alberto', 'Chicote', 'Chicote', 'f73aeb704e4b2ddd82c81aa52c4fb316b92ce76246b8f4c1e70c9773851a2701', 'chicote@gmail.com', 'Madrid', '1997-01-06', '2011-09-13 07:53:14', 0, 1, ''),
(6, 'administrador', 'ruiz', 'admin', '3384a5f1b1a18f4ffc70c13fd673d861e7a693d11d74888cab4022f2e87df8ff', 'admin@admin.com', 'Madrid', '1985-10-06', '2009-07-14 13:36:22', 1, 1, ''),
(9, 'carlos', 'martin', 'carlitodoso', 'df3fdca9854a472f6889118bd1458f2a4394355f55c9395d8b45e51ffd42daa8', 'm@m.com', 'madrid', '1964-08-24', '2014-05-09 20:47:20', 0, 1, ''),
(10, 'salvador', 'moreno', 'trigor', '955a5d51359369838a437d5ab3923b2ae5a534cc16748ec1c68d9ef7a8670f02', 'k@k.com', 'madrid', '1986-12-25', '2014-05-09 20:56:26', 0, 1, ''),
(11, 'juan', 'pavon', 'pavito', '38f315d49c7065909c8bd8aa9fc4cbc95d9adf17ed15cff7c285e9c308d625b2', 'pavon@p.com', 'leonidas', '1969-10-21', '2014-05-10 08:58:13', 0, 0, ''),
(23, 'alvaro', 'romancero', 'conchita', 'f5b454823f09545a842dff4a259098eab67be0a3fef1f621b6ca6ebc408d53dc', 'conchita@travelo.com', 'madrid', '1989-12-12', '2014-05-11 09:16:33', 0, 0, ''),
(24, 'Juan', 'Pavón', 'juan', 'a4dec393c6f91321ed240dbb87a0e39642b96af20fabda349b8e8564840756e4', 'adsf@alskdjf.com', 'Madrid', '2014-01-01', '2014-05-12 10:58:18', 0, 0, ''),
(25, 'hola', 'adios', 'hola', '0df7452fcf2584ea425a1bdea73661577ab813824cd0e34733952cfb3d79d60f', 'hola@gmail.com', 'Madrid', '2014-05-07', '2014-05-12 11:41:59', 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
