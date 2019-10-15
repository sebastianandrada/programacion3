-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2019 a las 02:07:23
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clase07`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(20) NOT NULL,
  `nombre` varchar(45) COLLATE utf16_spanish2_ci NOT NULL,
  `legajo` int(30) NOT NULL,
  `foto` varchar(100) COLLATE utf16_spanish2_ci DEFAULT NULL,
  `materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `legajo`, `foto`, `materia`) VALUES
(1, 'sebast', 1212, 'foto.jpg', 1),
(2, 'Narnia', 2334, 'otraFtp.jpg', 2),
(3, 'maria', 1234, 'fotom.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_materias`
--

CREATE TABLE `alumno_materias` (
  `id_alumno` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno_materias`
--

INSERT INTO `alumno_materias` (`id_alumno`, `id_materia`, `anio`) VALUES
(1, 2, 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(20) NOT NULL,
  `nombre` varchar(30) COLLATE utf16_spanish2_ci NOT NULL,
  `cuatrimestre` int(5) NOT NULL,
  `cupos` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `cuatrimestre`, `cupos`) VALUES
(1, 'geografia', 2, 32),
(2, 'quimica', 1, 40),
(3, 'matematicas', 2, 29),
(4, 'Educasion ficica', 1, 34),
(5, 'psicologia', 2, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno_materias`
--
ALTER TABLE `alumno_materias`
  ADD PRIMARY KEY (`id_alumno`,`id_materia`),
  ADD UNIQUE KEY `id_alumno` (`id_alumno`,`id_materia`),
  ADD KEY `id_alumno_2` (`id_alumno`,`id_materia`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
