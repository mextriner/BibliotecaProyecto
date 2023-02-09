-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2022 a las 15:35:50
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id_alumno` int(11) NOT NULL,
  `primer_apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `examen_parcial` int(11) NOT NULL,
  `examen_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id_alumno`, `primer_apellido`, `segundo_apellido`, `nombre`, `examen_parcial`, `examen_final`) VALUES
(1, 'Gómez', 'Pelayo', 'Angel', 10, 10),
(2, 'Garcia', 'Martin', 'María', 7, 6),
(3, 'Rodriguez', 'Alvarez', 'Luis', 8, 9),
(4, 'Pérez', 'González', 'Elena', 10, 10),
(5, 'Castelbon', 'Reyes', 'Pedro', 7, 9),
(6, 'Martin', 'Fuentes', 'Fernando', 7, 6),
(7, 'Alonso', 'Garcia', 'Carmen', 7, 8),
(8, 'Fuentes', 'Oduardo', 'Rolando', 8, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
