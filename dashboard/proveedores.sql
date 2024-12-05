-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2019 a las 01:16:27
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `idpv` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `proveedores` (`id`,`idpv`, `nombre`, `correo`, `direccion`) VALUES
(1, 420, 'Jean Carvajal','Jean33091@gmail.com', 'CLL70 n25 30');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--

ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
