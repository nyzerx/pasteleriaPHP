-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2023 a las 00:25:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasteleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria`, `cantidad`, `imagen`) VALUES
(1, 'Pastel de Chocolate', 'Delicioso pastel de chocolate con glaseado suave', 25.99, 'Pasteles', 10, 'img/pastel_chocolate.jpg'),
(2, 'Galletas de Avena y Pasas', 'Galletas crujientes de avena con pasas jugosas', 8.99, 'Galletas', 20, 'img/galletas_avena.jpg'),
(3, 'Tarta de Frutas', 'Tarta fresca con una mezcla de frutas de temporada', 32.50, 'Tartas', 5, 'img/tarta_frutas.jpg'),
(4, 'Cupcake de Fresa', 'Delicioso cupcake de fresa con frosting de crema', 4.50, 'Cupcakes', 8, 'img/cupcake_fresa.jpg'),
(5, 'Berlin', 'Clásico berlin relleno de crema pastelera y cubierto de azúcar glas', 4.99, 'Panes Dulces', 12, 'img/berlin.jpg'),
(6, 'Pastel de Vainilla', 'Suave pastel de vainilla con decoración de crema', 22.99, 'Pasteles', 15, 'img/pastel_vainilla.jpg'),
(7, 'Pastel de Fresa', 'Delicioso pastel de fresa con decoración de crema', 29.99, 'Pasteles', 10, 'img/pastel_fresa.jpg'),
(8, 'Galletas de Mantequilla', 'Deliciosas galletas de mantequilla con un toque de vainilla', 9.99, 'Galletas', 25, 'img/galletas_mantequilla.jpg'),
(9, 'Galletas de chocolate', 'Deliciosas galletas de chocolate', 2.99, 'Galletas', 10, 'img/galletas_choco.jpg'),
(10, 'Pastel de Zanahoria', 'Delicioso pastel de zanahoria con crema de queso', 27.99, 'Pasteles', 8, 'img/pastel_zanahoria.jpg'),
(11, 'Galletas de Chocolate Blanco', 'Galletas crujientes con trozos de chocolate blanco', 8.99, 'Galletas', 18, 'img/galletas_chocolate_blanco.jpg'),
(12, 'Rosquillas de Canela', 'Rosquillas esponjosas con sabor a canela y cubiertas de azúcar', 3.99, 'Panes Dulces', 20, 'img/rosquillas_canela.jpg'),
(13, 'Cupcake de Vainilla', 'Delicioso cupcake de vainilla con frosting de buttercream', 4.50, 'Cupcakes', 10, 'img/cupcake_vainilla.jpg'),
(14, 'Tarta de Manzana', 'Tarta clásica de manzana con crujiente de canela', 29.50, 'Tartas', 5, 'img/tarta_manzana.jpg'),
(15, 'Galletas de M&M', 'Galletas repletas de coloridos M&M para los amantes del chocolate', 9.99, 'Galletas', 22, 'img/galletas_mm.jpg'),
(16, 'Pan de Plátano', 'Pan esponjoso con sabor a plátano y nueces troceadas', 7.99, 'Panes Dulces', 15, 'img/pan_platano.jpg'),
(17, 'Pan de Canela', 'Pan dulce de canela con un glaseado dulce por encima', 6.50, 'Panes Dulces', 10, 'img/pan_canela.jpg'),
(18, 'Cupcake de Chocolate', 'Irresistible cupcake de chocolate con ganache de chocolate', 5.50, 'Cupcakes', 12, 'img/cupcake_chocolate.jpg');

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `actualiza_disponibilidad` AFTER INSERT ON `productos` FOR EACH ROW BEGIN
  IF NEW.cantidad = 0 THEN
    UPDATE productos
    SET disponibilidad = false
    WHERE id = NEW.id;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', NULL, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
