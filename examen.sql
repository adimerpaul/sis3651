-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2019 a las 14:12:45
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idciudad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `poblacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `nombre`, `poblacion`, `created_at`) VALUES
(1, 'ORURO', 538, '2019-07-31 01:31:57'),
(2, 'LA PAZ', 1538, '2019-07-31 01:31:57'),
(5, 'COCHABAMBA', 15452, '2019-07-31 03:08:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `cinit` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'ACTIVO',
  `celular` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `cinit`, `nombre`, `estado`, `celular`) VALUES
(1, '1010', 'CLIENTE1', 'ACTIVO', '69603027'),
(2, '2020', 'CLIENTE2', 'ACTIVO', '69603027'),
(4, '3030', 'JOSE JOSE', 'ACTIVO', '69603027');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idpaquete` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estado` enum('RECIBIDO','ENVIADO','ENTREGADO','DEVUELTO','BODEGA') NOT NULL DEFAULT 'RECIBIDO',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idciudad` int(11) NOT NULL,
  `idrecibe` int(11) NOT NULL,
  `idenvia` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `tipo` enum('RECIBO','FACTURA','','') NOT NULL,
  `correspondencia` enum('CARTA','PAQUETE','','') NOT NULL,
  `peso` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idpaquete`, `descripcion`, `estado`, `fecha`, `idciudad`, `idrecibe`, `idenvia`, `idusuario`, `monto`, `tipo`, `correspondencia`, `peso`) VALUES
(3, 'una carta', 'ENTREGADO', '2019-07-31 03:49:17', 5, 4, 2, 2, 10, 'FACTURA', 'CARTA', '66.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `tipo` enum('ADMIN','VENDEDOR','','') NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `ci`, `nombre`, `apellido`, `usuario`, `clave`, `tipo`, `estado`) VALUES
(1, '1111', 'ADMIN', 'ADMIN', 'ADMIN', '202cb962ac59075b964b07152d234b70', 'ADMIN', 'ACTIVO'),
(2, '2222', 'ANA', 'BANANA', 'ana', '202cb962ac59075b964b07152d234b70', 'VENDEDOR', 'ACTIVO'),
(3, '3333', 'romy', 'zurita', 'romy', '202cb962ac59075b964b07152d234b70', 'ADMIN', 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idciudad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idpaquete`),
  ADD KEY `idciudad` (`idciudad`),
  ADD KEY `identrega` (`idenvia`),
  ADD KEY `idrecibe` (`idrecibe`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idpaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `paquete_ibfk_1` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paquete_ibfk_2` FOREIGN KEY (`idenvia`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paquete_ibfk_3` FOREIGN KEY (`idrecibe`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paquete_ibfk_4` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
