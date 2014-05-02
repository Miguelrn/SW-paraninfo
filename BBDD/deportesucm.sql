-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2014 a las 16:36:16
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `id_user`, `deporte`) VALUES
(5, 1, 'Futbol');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(12, 1, 'Rugby', '2014-04-30', 9, 'partido', 'suroeste');

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
(1, 'Piscina-seniora', '4.00', '1 banio'),
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
  `password` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(11) NOT NULL,
  `encuesta` tinyint(1) NOT NULL DEFAULT '0',
  `imagen` blob NOT NULL,
  PRIMARY KEY (`id`,`nombreuser`,`correo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `nombreuser`, `password`, `correo`, `provincia`, `fecha`, `tipo`, `encuesta`, `imagen`) VALUES
(1, 'Alberto', 'Chicote', 'Chicote', '1234', 'chicote@gmail.com', 'Madrid', '1997-01-06', 0, 1, ''),
(3, 'carla', 'aguero', 'asdfg', '1234', 'carlos@carlos.com', 'leon', '2015-01-01', 0, 0, ''),
(6, 'administrador', 'ruiz', 'admin', '1049', 'admin@admin.com', 'Madrid', '1985-10-06', 1, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
