-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2019 a las 04:35:32
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mqfast`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id`, `clave`, `correo`, `clave_producto`) VALUES
(1, 'a1f2269392aaa9f998582119b8a752b4ab67fcb1', 'garysk894@gmail.com', '93c5b16216256e2d22910d1fe769745776d45071'),
(2, 'c044dd3ed0d6f6c0a2e663042fa6ebc021cdbc02', 'garysk894@gmail.com', '926264183890541e4bb49fd9ba514fe5892daf26'),
(3, '76cb0bce1deb111d0b62d4dc31e6d40977b19ab8', 'alexanderlleca@gmail.com', '9cef962d9692a5a1428da0805a25c7791cfc71bc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `clave_producto` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(10) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` decimal(8,0) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `clave`, `producto`, `cantidad`, `precio`, `categoria`, `descripcion`, `foto`) VALUES
(1, '9f1520d4006ae0321f93137d4364e297368a13ab', 'prdo', 1, '10', 'moda', 'des', 'foto_producto/producto_placeholder.png'),
(2, '93c5b16216256e2d22910d1fe769745776d45071', 'Xiaomi MI A2 ', 6, '750', 'moda', 'Lorem', 'foto_producto/93c5b16216256e2d22910d1fe769745776d45071.jpg'),
(3, '926264183890541e4bb49fd9ba514fe5892daf26', 'MI Band 4', 50, '34', 'electronica', 'Mi Band 3 recien salido casero caserita!! lleve lleve que esta que quema!', 'foto_producto/926264183890541e4bb49fd9ba514fe5892daf26.jpg'),
(4, '9cef962d9692a5a1428da0805a25c7791cfc71bc', 'Anvurgues', 50, '5', 'moda', 'La rica anvurguesa', 'foto_producto/9cef962d9692a5a1428da0805a25c7791cfc71bc.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `clave`, `nombre`, `correo`, `foto`) VALUES
(1, 'ee7eb49fb9a1cd1adc935b5ff7ea8bbcd40ee432', 'Gary Calle', 'garysk894@gmail.com', 'https://lh3.googleusercontent.com/-z4VWSac1AD0/AAAAAAAAAAI/AAAAAAAARh8/tfmlh39_eAo/photo.jpg'),
(2, 'e49f3f62904bf2b4fefe0fd88b685a4147fcf8e8', 'Alexander Calle', 'alexanderlleca@gmail.com', 'https://lh3.googleusercontent.com/-3zwhw0s4YMA/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfcmY98Dc-gmiOdyIM8dtNCg_3wSA/mo/photo.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
