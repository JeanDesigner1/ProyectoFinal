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

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lote` varchar(50) COLLATE utf8_spanish_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `productos` (`id`, `idproducto`, `idproveedor`,`nombre`, `descripcion`, `stock`, `price`, `categoria`, `lote`) VALUES
(1, 1, 420, 'Samsung Galaxy S23', 'Smartphone avanzado con cámara de alta calidad', 52, 799, 'Electrónica', 'Lote A'),
(2, 2, 480, 'iPhone 14', 'Última generación de iPhone con tecnología innovadora', 48, 999, 'Electrónica', 'Lote B'),
(3, 3, 420, 'Google Pixel 8', 'Teléfono con la mejor experiencia Android pura', 25, 749, 'Electrónica', 'Lote C'),
(4, 4, 420, 'OnePlus 11', 'Smartphone rápido con alta capacidad de carga', 35, 699, 'Electrónica', 'Lote D'),
(5, 5, 480, 'Xiaomi Mi 13', 'Dispositivo económico con buenas prestaciones', 28, 649, 'Electrónica', 'Lote E'),
(6, 6, 420, 'Sony Xperia 1 IV', 'Teléfono premium con enfoque en multimedia', 22, 1099, 'Electrónica', 'Lote F'),
(7, 7, 480, 'Motorola Edge 40', 'Smartphone equilibrado y elegante', 20, 599, 'Electrónica', 'Lote G'),
(8, 8, 420, 'Oppo Find X6', 'Teléfono con diseño innovador y gran cámara', 41, 849, 'Electrónica', 'Lote H'),
(9, 9, 420, 'Huawei P60 Pro', 'Smartphone de gama alta con tecnología avanzada', 30, 1099, 'Electrónica', 'Lote I'),
(10, 10, 480, 'Realme GT 2 Pro', 'Teléfono potente con buena relación calidad-precio', 19, 749, 'Electrónica', 'Lote J');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);
  



--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
