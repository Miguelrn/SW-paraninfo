-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2014 a las 11:19:59
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `deportesucm`
--
CREATE DATABASE IF NOT EXISTS `deportesucm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `deportesucm`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE IF NOT EXISTS `encuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `deporte` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logeos`
--

INSERT INTO `logeos` (`id_user`, `correo`, `fecha`) VALUES
(10, 'k@k.com', '2014-05-09 20:57:36'),
(1, 'chicote@gmail.com', '2014-05-09 21:08:11'),
(1, 'chicote@gmail.com', '2014-05-09 21:21:27'),
(1, 'chicote@gmail.com', '2014-05-09 21:23:35'),
(1, 'chicote@gmail.com', '2014-05-09 21:24:15'),
(1, 'chicote@gmail.com', '2014-05-09 21:33:19'),
(1, 'chicote@gmail.com', '2014-05-09 21:33:56'),
(1, 'chicote@gmail.com', '2014-05-10 08:08:48'),
(6, 'admin@admin.com', '2014-05-10 08:10:10'),
(9, 'm@m.com', '2014-05-10 08:11:06'),
(10, 'k@k.com', '2014-05-10 08:11:49'),
(1, 'chicote@gmail.com', '2014-05-10 08:30:14'),
(1, 'chicote@gmail.com', '2014-05-10 08:36:02'),
(1, 'chicote@gmail.com', '2014-05-10 08:36:16'),
(10, 'k@k.com', '2014-05-10 08:38:32'),
(6, 'admin@admin.com', '2014-05-10 08:40:35'),
(6, 'admin@admin.com', '2014-05-10 08:49:25'),
(6, 'admin@admin.com', '2014-05-10 08:51:21'),
(6, 'admin@admin.com', '2014-05-10 08:53:32'),
(11, '', '2014-05-10 08:58:15'),
(12, '', '2014-05-10 09:09:42'),
(12, '1@1.es', '2014-05-10 09:12:37'),
(12, '1@1.es', '2014-05-10 09:17:41'),
(12, '1@1.es', '2014-05-10 09:18:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre_pista` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` int(2) NOT NULL,
  `tipo_reserva` varchar(30) NOT NULL,
  `zona` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_user`, `nombre_pista`, `fecha`, `hora`, `tipo_reserva`, `zona`) VALUES
(1, 1, 'Polideportivo', '2014-04-30', 9, '1 hora', 'somosaguas'),
(2, 1, 'Piscina', '2014-04-29', 9, '1 calle', 'seniora'),
(3, 1, 'Rugby', '2014-04-28', 12, 'partido', 'suroeste'),
(7, 1, 'Futbol', '2014-04-30', 9, 'partido', 'norte'),
(10, 1, 'Atletismo', '2014-04-30', 9, '1 hora', 'sur'),
(11, 1, 'Piscina', '2014-04-30', 9, '1 calle', 'seniora'),
(12, 1, 'Rugby', '2014-04-30', 9, 'partido', 'suroeste'),
(14, 1, 'Baloncesto', '2014-05-31', 21, '1 hora', 'norte'),
(15, 1, 'Baloncesto', '2014-05-31', 10, '1 hora', 'norte'),
(16, 1, 'Baloncesto', '2014-05-31', 11, '1 hora', 'norte'),
(17, 1, 'Futbol', '2014-05-31', 20, 'partido', 'norte'),
(18, 1, 'Rugby', '2014-05-31', 9, 'partido', 'sur'),
(19, 1, 'Baloncesto', '2014-05-29', 19, '1 hora', 'norte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE IF NOT EXISTS `pistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `zona` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`id`, `nombre`, `zona`) VALUES
(1, 'Futbol', 'norte'),
(2, 'Futbol sala', 'norte'),
(3, 'Balonmano', 'norte'),
(4, 'Baloncesto', 'norte'),
(5, 'Rugby', 'norte'),
(6, 'Tenis', 'norte'),
(7, 'Piscina', 'seniora'),
(8, 'Polideportivo', 'somosaguas'),
(9, 'Atletismo', 'sur'),
(10, 'Balonmano', 'sur'),
(11, 'Baloncesto', 'sur'),
(12, 'Fronton', 'sur'),
(13, 'Futbol', 'sur'),
(14, 'Sala Multiple', 'sur'),
(15, 'Musculacion', 'sur'),
(16, 'Padel', 'sur'),
(17, 'Piscina', 'sur'),
(18, 'Rocodromo', 'sur'),
(19, 'Rugby', 'sur'),
(20, 'Tenis', 'sur'),
(21, 'Voleibol', 'sur'),
(22, 'Volley playa', 'sur'),
(23, 'Sala columnas', 'sur'),
(24, 'Rugby', 'suroeste');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `nombreuser`, `password`, `correo`, `provincia`, `fecha`, `fecha_registro`, `tipo`, `encuesta`, `imagen`) VALUES
(1, 'Alberto', 'Chicote', 'Chicote', 'f73aeb704e4b2ddd82c81aa52c4fb316b92ce76246b8f4c1e70c9773851a2701', 'chicote@gmail.com', 'Madrid', '1997-01-06', '2011-09-13 07:53:14', 0, 1, ''),
(6, 'administrador', 'ruiz', 'admin', '3384a5f1b1a18f4ffc70c13fd673d861e7a693d11d74888cab4022f2e87df8ff', 'admin@admin.com', 'Madrid', '1985-10-06', '2009-07-14 13:36:22', 1, 1, ''),
(9, 'carlos', 'martin', 'carlitodoso', 'b87341ff0c4091ae9f295366f77f01f9d6097d8ba788b83ea19ff5a73d8414c4', 'm@m.com', 'madrid', '1964-08-24', '2014-05-09 20:47:20', 0, 1, ''),
(10, 'salvador', 'moreno', 'trigor', '955a5d51359369838a437d5ab3923b2ae5a534cc16748ec1c68d9ef7a8670f02', 'k@k.com', 'madrid', '1986-12-25', '2014-05-09 20:56:26', 0, 1, ''),
(11, 'juan', 'pavon', 'pavito', 'd5814fa8a602340423bbba672f21575fd852a52596b8c69dc635a60884113877', 'pavon@p.com', 'leonidas', '1969-10-21', '2014-05-10 08:58:13', 0, 0, ''),
(12, '111', '222', '1212', 'd01fa956b1887c9a5eb429b071a9a239544d42c27ed606f526eccb75e01e7600', '1@1.es', 'madrid', '1988-02-12', '2014-05-10 09:09:39', 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
