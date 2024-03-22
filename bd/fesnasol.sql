-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2024 a las 19:06:38
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
-- Base de datos: `fesnasol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `festivales`
--

CREATE TABLE `festivales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `festivales`
--

INSERT INTO `festivales` (`id`, `nombre`, `pais`, `fecha_inicio`, `fecha_final`) VALUES
(1, 'festival de danza', 'Venezuela', '2024-03-15', '2024-03-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `n_telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_director` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_festivales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `pais`, `estado`, `n_telefono`, `correo`, `nombre_director`, `id_festivales`) VALUES
(1, '', 'Armenia', 'asdasdasd', '0412454587', 'asdasd@gmail.com', 'asdasd', 1),
(2, '', 'México', 'aragua', '0412454587', 'asdasd@gmail.com', 'asdasd', 1),
(3, 'guilleromo', 'Afganistán', 'asdasdasd', '04125447878', 'asdasd@gmail.com', 'asdasdasd', 1),
(4, 'adidas', 'Namibia', 'nanana', '0412455554', 'asdasd@gmail.com', 'asdasd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` enum('bailarina','acompañante','staff') COLLATE utf8_spanish_ci NOT NULL,
  `documento_identidad` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `talla_camisa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_comida` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_festivales` int(11) DEFAULT NULL,
  `pasaporte` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `llegada_aeropuerto` datetime DEFAULT NULL,
  `n_vuelo_llegada` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `salida_aeropuerto` datetime DEFAULT NULL,
  `n_vuelo_salida` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `festivales`
--
ALTER TABLE `festivales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restri_grupos` (`id_festivales`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restri_integrante` (`id_grupo`),
  ADD KEY `restri_festival` (`id_festivales`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `festivales`
--
ALTER TABLE `festivales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `restri_grupos` FOREIGN KEY (`id_festivales`) REFERENCES `festivales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `restri_festival` FOREIGN KEY (`id_festivales`) REFERENCES `festivales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restri_integrante` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
