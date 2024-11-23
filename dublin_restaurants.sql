-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2024 a las 17:42:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dublin_restaurants`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `reservation_name` varchar(100) DEFAULT NULL,
  `reservation_email` varchar(100) DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `party_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filters`
--

CREATE TABLE `filters` (
  `filter_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `party_size` int(11) DEFAULT NULL,
  `filter_date` date DEFAULT NULL,
  `zone` varchar(10) DEFAULT NULL,
  `allergen_info` varchar(255) DEFAULT NULL,
  `price_filter` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `filters`
--

INSERT INTO `filters` (`filter_id`, `user_id`, `party_size`, `filter_date`, `zone`, `allergen_info`, `price_filter`) VALUES
(6, 1, 9, '2024-11-20', 'D13 & D15', 'nuts', '20'),
(7, 1, 8, '2024-11-20', 'D13 & D15', 'nuts', '20'),
(8, 1, 9, '2024-11-12', 'D10 & D12', 'gluten', '15'),
(9, 1, 8, '2024-11-27', 'D14 & D16', 'nuts', '20'),
(10, 1, 10, '2024-11-26', 'D14 & D16', 'none', '20'),
(11, 1, 9, '2024-11-20', 'D13 & D15', 'none', '20'),
(12, 1, 8, '2024-11-20', 'D13 & D15', 'nuts', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cuisine` varchar(100) NOT NULL,
  `rating` float DEFAULT NULL CHECK (`rating` >= 1.0 and `rating` <= 5.0),
  `price_range` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `zone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `cuisine`, `rating`, `price_range`, `phone`, `website`, `image`, `zone`) VALUES
(1, 'Las Tapas de Lola', '12 Camden St, Dublin 2', 'Spanish', 4.8, '15', '01-1234567', 'http://lastapasdelola.ie', 'images/spanish.jpg', 'D2 & D4'),
(2, 'Mamma Mia', '45 George\'s St, Dublin 1', 'Italian', 4.5, '20', '01-9876543', 'http://mammamia.ie', 'images/italian.jpg', 'D2 & D4'),
(3, 'Sushi Heaven', '78 Dawson St, Dublin 2', 'Japanese', 4.9, '30', '01-5647382', 'http://sushiheaven.ie', 'images/japanese.jpg', 'D1 & D3'),
(4, 'Burger Bliss', '22 North Circular Rd, Dublin 7', 'American', 4.3, '10', '01-3456789', 'http://burgerbliss.ie', 'images/burger.jpg', 'D1 & D3'),
(5, 'Curry Palace', '56 Rathmines Rd, Dublin 6', 'Indian', 4.7, '25', '01-8765432', 'http://currypalace.ie', 'images/indian.jpg', 'D5 & D7'),
(6, 'Le Gourmet', '9 St. Stephen\'s Green, Dublin 2', 'French', 4.6, '30', '01-1122334', 'http://legourmet.ie', 'images/french.jpg', 'D6 & D8'),
(7, 'Vegan Delights', '34 Aungier St, Dublin 2', 'Vegan', 4.4, '15', '01-9988776', 'http://vegandelights.ie', 'images/vegan.jpg', 'D2 & D4'),
(8, 'Taco Fiesta', '88 Capel St, Dublin 1', 'Mexican', 4.2, '20', '01-5566778', 'http://tacofiesta.ie', 'images/mexican.jpg', 'D9 & D11'),
(9, 'The Thai Table', '63 South Circular Rd, Dublin 8', 'Thai', 4.8, '25', '01-7788990', 'http://thethaitable.ie', 'images/thai.jpg', 'D6 & D8'),
(10, 'The Coffee Corner', '5 Dame St, Dublin 2', 'Cafe', 4.1, '10', '01-4455667', 'http://coffeecorner.ie', 'images/cafe.jpg', 'D1 & D3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Guest', 'User', 'guest@example.com', 'guestpassword');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`filter_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `filters`
--
ALTER TABLE `filters`
  MODIFY `filter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `filters`
--
ALTER TABLE `filters`
  ADD CONSTRAINT `filters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
