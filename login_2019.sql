-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 00:50:55
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
-- Base de datos: `login_2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

-- Crear tabla `admins` con el campo `rol` incluido
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL UNIQUE,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(1) NOT NULL DEFAULT 2, -- Agregamos el campo rol con un valor por defecto de 2
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcado de datos para la tabla `admins`
INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1), -- Contraseña: 12345, rol: 1 (Administrador)
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 2); -- Contraseña: demo, rol: 2 (Usuario)

-- Modificar índice único existente
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `usuario` (`usuario`);




-- Modificar el campo `id` para que sea AUTO_INCREMENT
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

