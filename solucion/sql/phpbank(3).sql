-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 18-04-2023 a las 19:59:17
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpbank`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `DNI_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `DNI_cliente` (`DNI_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla de clientes de PHPBank';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `DNI_cliente`) VALUES
(1, 'John Wick', '12345678Q'),
(2, 'Pepito Grillo', '78945612Q'),
(3, 'Diana', '74185296W'),
(4, 'Aria Stark', '78541236T'),
(6, 'Juanca', '12345678R'),
(7, 'Juan Carlos Bohorquez', '12345678K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_clientes`
--

DROP TABLE IF EXISTS `cuentas_clientes`;
CREATE TABLE IF NOT EXISTS `cuentas_clientes` (
  `numero_cuenta` bigint(11) UNSIGNED NOT NULL,
  `tipo_cuenta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `saldo_minimo` decimal(10,2) DEFAULT '0.00',
  `interes_anual` tinyint(3) UNSIGNED NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`numero_cuenta`),
  KEY `tipo_cuenta_FK` (`tipo_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla de cuentas de clientes de PHPBank';

--
-- Volcado de datos para la tabla `cuentas_clientes`
--

INSERT INTO `cuentas_clientes` (`numero_cuenta`, `tipo_cuenta`, `saldo`, `saldo_minimo`, `interes_anual`, `id_cliente`) VALUES
(4, 'Cuenta Corriente', '4.00', NULL, 4, 7),
(5, 'Cuenta Corriente', '5.00', NULL, 5, 7),
(6, 'Cuenta Corriente', '6.00', '0.00', 6, 1),
(8, 'Cuenta Ahorro', '8.00', '0.00', 8, 1),
(9, 'Cuenta Corriente', '9.00', '0.00', 9, 1),
(10, 'Cuenta Corriente', '17.00', '0.00', 10, 1),
(11, 'Cuenta Corriente', '11.00', NULL, 11, 2),
(54, 'Cuenta Corriente', '325.00', '0.00', 4, 1),
(113, 'Cuenta Corriente', '100.00', NULL, 1, 3),
(114, 'Cuenta Corriente', '100.00', NULL, 1, 3),
(115, 'Cuenta Ahorro', '440.00', '50.00', 10, 3),
(222, 'Cuenta Corriente', '2.00', NULL, 2, 7),
(234, 'Cuenta Corriente', '23.00', '0.00', 23, 1),
(1111, 'Cuenta Corriente', '1.00', NULL, 1, 7),
(1244, 'Cuenta Corriente', '11.00', NULL, 11, 2),
(23423, 'Cuenta Corriente', '23.00', '0.00', 2, 1),
(95184, 'Cuenta Ahorro', '1100.00', '100.00', 10, 4),
(234234, 'Cuenta Ahorro', '30381.00', '0.00', 123, 1),
(456789, 'Cuenta Corriente', '1.00', '0.00', 5, 6),
(555555, 'Cuenta Ahorro', '123.00', '0.00', 123, 1),
(4325543, 'Cuenta Corriente', '234.00', '0.00', 23, 1),
(12312312, 'Cuenta Corriente', '123.00', '0.00', 123, 2),
(23423432, 'Cuenta Ahorro', '123.00', '0.00', 123, 3),
(123123121, 'Cuenta Corriente', '123.00', '0.00', 123, 3),
(123123123, 'Cuenta Corriente', '12.00', NULL, 10, 4),
(222222222, 'Cuenta Ahorro', '200.00', '0.00', 1, 4),
(987456321, 'Cuenta Corriente', '1010.00', NULL, 22, 4),
(1231212121212, 'Cuenta Ahorro', '1212.00', '0.00', 1, 2),
(1234567890123, 'Cuenta Ahorro', '270.00', '0.00', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

DROP TABLE IF EXISTS `tipo_cuenta`;
CREATE TABLE IF NOT EXISTS `tipo_cuenta` (
  `id_tipo_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cuenta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_cuenta`),
  UNIQUE KEY `tipo_cuenta` (`tipo_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cuenta`
--

INSERT INTO `tipo_cuenta` (`id_tipo_cuenta`, `tipo_cuenta`) VALUES
(2, 'Cuenta Ahorro'),
(1, 'Cuenta Corriente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas_clientes`
--
ALTER TABLE `cuentas_clientes`
  ADD CONSTRAINT `tipo_cuenta_FK` FOREIGN KEY (`tipo_cuenta`) REFERENCES `tipo_cuenta` (`tipo_cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
