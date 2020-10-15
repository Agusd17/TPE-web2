-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2020 a las 20:46:16
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Departamento'),
(3, 'Casa'),
(5, 'Terreno'),
(6, 'Galpón'),
(7, 'Local comercial'),
(8, 'Oficina'),
(9, 'Garage/cochera'),
(11, 'Quinta'),
(15, 'Cabaña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `direccion` varchar(64) NOT NULL,
  `metros_cuadrados` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `venta` tinyint(1) NOT NULL,
  `alquiler` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id`, `id_categoria`, `titulo`, `descripcion`, `direccion`, `metros_cuadrados`, `precio`, `venta`, `alquiler`) VALUES
(12, 3, 'Casa 2', 'asd', 'noexiste 556', 123, 125463, 1, 1),
(13, 3, 'Casita junto al lago', 'Muy buena ubicación. Recomendable. Vistas excelentes al lago.', 'Lago 5432', 100, 155000, 1, 0),
(14, 1, 'Depto monoambiente para estudiante', 'Es pequeño pero funcional para un estudiante. Verlo es comprarlo', 'Av. Irreal 225', 31, 85000, 1, 0),
(15, 5, 'Gran terreno apto edificios', 'Terreno bien ubicdo, céntrico. Ideal para proyectos grandes.', 'Av. céntrica 54', 480, 400000, 1, 0),
(16, 11, 'Casa quinta', 'Casa de campo ideal para retirarse a la naturaleza. Posee 2 habitaciones, 1 baño, cocina-comedor, sala de estar con fogón, lavadero y garage.', 'Las charcas 4670', 24000, 420000, 1, 0),
(17, 7, 'Local pequeño para negocio de ropa o similar', 'Céntrico. Se alquila.', 'Av. céntrica 226', 36, 85, 0, 1),
(18, 6, 'Galpón apto maquinaria agrícola', 'Amplio galpón cerrado, ideal para guardar maquinaria agrícola por sus dimensiones. Buena ubicación de fácil acceso. Precio negociable', 'Av. circunvalación 2262', 5000, 120000, 1, 0),
(20, 15, 'Cabaña de madera', 'Para esos días en que necesitas irte de la ciudad. Respira el aire natural en el campo. Reservar con anticipación.', 'Camino rural km 32', 50, 25, 0, 1),
(21, 1, 'Depto 1 hab. A estrenar', 'En frente a la universidad. 2do piso. Expensas $2500. Precio charlable', 'Calle universitaria 96', 45, 60000, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `passwd` varchar(60) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `passwd`, `role`) VALUES
(1, 'agus.dllano@gmail.com', '$2y$10$Sph4M2VvAaC2vzpxydnE5Ok2zD.kvQJidjohRepVDHo9FpcIMDUuG', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_categoria` (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `inmueble_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
