-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2017 a las 02:45:00
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lugares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `direccion`, `lat`, `lng`, `tipo`) VALUES
(1, 'PLAZA DE ARMAS', 'Ubicado en el centro de ciudad \r\nde Puno\r\n-Jiron Destua', -15.840590, -70.028008, 'plaza'),
(2, 'MIRADOR PUMA UTA', 'El mirador de Puma uta, \r\nse encuentra a 3 Km. \r\nal noroeste de Puno', -15.819839, -70.028931, 'mirador'),
(3, 'MIRADOR KUNTOR WASI', 'Mas conocido como mirador el condor ubicado a 2 Km.\r\ndel centro de Puno ', -15.847340, -70.030128, 'mirador'),
(4, 'CERRO DE AZOGUINI', 'Mas conocido como camino a Azoguini \r\ndonde se encuentra el \r\ncalvario de Puno', -15.832410, -70.034889, 'atractivo'),
(5, 'MUELLE LACUSTRE', 'Ubicado en la bahia de Puno', -15.836210, -70.014626, 'atractivo'),
(6, 'MALECON ECO TURISTICO', 'Ubicado a 3.815 metros de altura este dique artificial en la bahia de Puno', -15.832197, -70.016464, 'atractivo'),
(7, 'PLAZA DE FARO', 'Ubicado en la bahia de Puno e inicio del Malecon Eco Turistico de Puno', -15.835576, -70.015274, 'plaza'),
(8, 'ISLA ESTEVES', 'Ubicado a 2 km de Puno', -15.827358, -69.992470, 'isla'),
(9, 'ISLA FLOTANTE DE LOS UROS', 'Ubicado al oeste del lago Titicaca, y al noreste de Puno, a 7 km de la ciudad de Puno', -15.827358, -69.974350, 'isla'),
(10, 'LAGO TITICACA', 'Ubicado en el Altiplano andino en los Andes Centrales, dentro de la meseta del Collao una altitud promedio de 3812 msnm  de Bolivia y Peru', -15.837081, -70.008064, 'atractivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
