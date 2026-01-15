-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2026 a las 23:49:25
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `usuario_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(27, 2),
(21, 11),
(22, 11),
(23, 11),
(24, 11),
(25, 11),
(26, 11),
(28, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espectaculos`
--

CREATE TABLE `espectaculos` (
  `id_espectaculo` int(11) NOT NULL,
  `nombre` varchar(51) NOT NULL,
  `descripcion` varchar(51) NOT NULL,
  `disponibles` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `direccion` varchar(51) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `imagen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `espectaculos`
--

INSERT INTO `espectaculos` (`id_espectaculo`, `nombre`, `descripcion`, `disponibles`, `precio`, `direccion`, `fecha`, `hora`, `imagen`) VALUES
(20, 'maria becerra', 'la nena de argentina', 867, '77777.00', 'belgrano 4444', '2025-12-31', '22:11:00', '62df21eab7af8c186e82fddda3749853.jpg'),
(25, 'duki', 'el mejor del mundo', 8777, '55444.00', 'eva peron 333', '2026-01-22', '22:11:00', 'd94ab42aba3969511412a6dc0af180ea.jpg'),
(26, 'emilia mernes', 'la princesa del mundo', 2222, '33333.00', 'camin negro 3333', '2026-01-27', '21:12:00', '7da1571f450cb4591ca34fecefba8b5f.jpg'),
(27, 'nicky nicole', 'la rapera del mundo', 88888, '77777.00', 'lanus 22111', '2026-01-06', '22:13:00', '91d393c44ddc56c1d9fc4f5a4eb2e5c5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `espectaculo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `monto_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `usuario_id`, `espectaculo_id`, `cantidad`, `fecha_reserva`, `monto_total`) VALUES
(64, 1, 20, 3, '2026-01-12', 233331),
(65, 1, 20, 3, '2026-01-12', 233331),
(66, 1, 20, 4, '2026-01-12', 311108),
(67, 1, 20, 2, '2026-01-13', 155554);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombre_usuario` varchar(51) NOT NULL,
  `palabra_clave` varchar(51) NOT NULL,
  `nombre` varchar(51) NOT NULL,
  `apellido` varchar(51) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `nombre_usuario`, `palabra_clave`, `nombre`, `apellido`, `dni`, `telefono`) VALUES
(1, 1, 'ivaninfonet@gmail.com', '1234', 'ivan', 'tolaba', 34571058, '11-2310-6932'),
(2, 2, 'ivaninfosur@gmail.com', '1234', 'pablo', 'flores', 12618422, '11-4156-3813'),
(3, 2, 'ivaninfoeste@gmail.com', '1234', 'estiven', 'flores', 42589521, '11-4082-6777'),
(11, 1, 'ivaninfonorte@gmail.com', '1234', 'jorge', 'cirio', 11122224, '11-4448-6474'),
(12, 1, 'aaggttt@gmail.com', '1234', 'jorge', 'cirio', 584444, '11-4448-6474'),
(13, 1, 'alguien@hotmail.com', '1234', 'luciana', 'perez', 12348, '01140826777'),
(14, 1, 'ivaninfonet2@gmail.com', '1234', 'luci', 'lorent', 2451, '5421'),
(15, 1, 'alguien@gmail.com', '1234', 'de', 'ed', 33, '543'),
(21, 1, 'ffff@gmail.com', '$2y$10$Eqxpz3J8nvzUihrDsq3XBOiDT4Lo8GCB9EJk3ooRSHhx', 'hermosa', 'gauna', 0, ''),
(22, 1, 'nicolasvelez@gmail.com', '$2y$10$LI7fUuBHLAN6lDyqYgpuNewK09HN2b1JmPP6G1msJxCW', 'nicolas', 'perez', 333, '222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `espectaculo_id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `monto_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `usuario_id`, `espectaculo_id`, `fecha_venta`, `monto_total`) VALUES
(58, 1, 20, '2026-01-03', '0.08'),
(60, 1, 20, '2026-01-05', '155554.00'),
(61, 1, 20, '2026-01-05', '311108.00'),
(62, 1, 20, '2026-01-07', '233331.00'),
(63, 1, 20, '2026-01-12', '233331.00'),
(64, 1, 20, '2026-01-12', '233331.00'),
(65, 1, 20, '2026-01-12', '311108.00'),
(66, 1, 20, '2026-01-13', '155554.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `usuario` (`usuario_id`);

--
-- Indices de la tabla `espectaculos`
--
ALTER TABLE `espectaculos`
  ADD PRIMARY KEY (`id_espectaculo`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `espectaculos` (`espectaculo_id`),
  ADD KEY `usuarios` (`usuario_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol` (`rol_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `espectaculo` (`espectaculo_id`),
  ADD KEY `reserva` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `espectaculos`
--
ALTER TABLE `espectaculos`
  MODIFY `id_espectaculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `espectaculos` FOREIGN KEY (`espectaculo_id`) REFERENCES `espectaculos` (`id_espectaculo`),
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `espectaculo` FOREIGN KEY (`espectaculo_id`) REFERENCES `espectaculos` (`id_espectaculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
