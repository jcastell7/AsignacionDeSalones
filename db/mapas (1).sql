-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2018 a las 07:35:54
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mapas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idGrupo` int(255) NOT NULL,
  `periodo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `programa` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipoPrograma` text COLLATE utf8_spanish2_ci NOT NULL,
  `semestre` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `numEstudiantes` int(255) NOT NULL,
  `fechaFinalizacion` date NOT NULL,
  `info` varchar(1024) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `salonId` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `idSalon` int(255) NOT NULL,
  `numero` varchar(1024) COLLATE utf8_spanish2_ci NOT NULL,
  `capacidad` int(255) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `info` varchar(1024) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`),
  ADD KEY `salonId` (`salonId`),
  ADD KEY `salonId_2` (`salonId`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`idSalon`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`salonId`) REFERENCES `salones` (`idSalon`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
