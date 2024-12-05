SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE reportes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  idreporte INT(11) NOT NULL,
  idusuario INT(11) NOT NULL,
  fecha_reporte DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  descripcion VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);


-- Inserta varios ejemplos de reportes en la tabla reportes
INSERT INTO reportes (id, idreporte, idusuario, fecha_reporte, descripcion) VALUES
(1, 1001, 1, NOW(), 'Reporte de sistema caído en la oficina central.'),
(2, 1002, 2, NOW(), 'Actualización de software pendiente en sucursal.'),
(3, 1003, 3, NOW(), 'Revisión de inventario requerida para auditar.'),
(4, 1004, 4, NOW(), 'Problemas de red en el departamento de IT.'),
(5, 1005, 1, NOW(), 'Solicitud de nuevos equipos para el departamento de ventas.'),
(6, 1006, 2, NOW(), 'El sistema de correo presenta intermitencias.'),
(7, 1007, 3, NOW(), 'Capacitación requerida para el uso de nuevo software.'),
(8, 1008, 4, NOW(), 'Reporte de error en el sistema de facturación.'),
(9, 1009, 1, NOW(), 'Solicitud de configuración de nuevos correos electrónicos.'),
(10, 1010, 2, NOW(), 'Revisión y reparación del aire acondicionado en el área de servidores.');

ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


COMMIT;
