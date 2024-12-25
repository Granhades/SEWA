-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-12-2024 a las 15:32:10
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
-- Base de datos: `feedme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `recipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `experience_id`, `date`, `recipe`) VALUES
(1, 1, 23, '29/11/2024', '29/11/2024'),
(2, 2, 16, '29/11/2024', '29/11/2024'),
(3, 3, 11, '29/11/2024', '29/11/2024'),
(4, 4, 2, '29/11/2024', '29/11/2024'),
(5, 5, 9, '29/11/2024', '29/11/2024'),
(6, 1, 10, '29/11/2024', '29/11/2024'),
(7, 2, 28, '29/11/2024', '29/11/2024'),
(8, 3, 1, '29/11/2024', '29/11/2024'),
(9, 4, 8, '29/11/2024', '29/11/2024'),
(10, 5, 34, '29/11/2024', '29/11/2024'),
(11, 1, 6, '29/11/2024', '29/11/2024'),
(12, 2, 31, '29/11/2024', '29/11/2024'),
(13, 3, 20, '29/11/2024', '29/11/2024'),
(14, 4, 18, '29/11/2024', '29/11/2024'),
(15, 5, 29, '29/11/2024', '29/11/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `party_size` int(11) DEFAULT NULL,
  `available_from` varchar(255) DEFAULT NULL,
  `available_to` varchar(255) DEFAULT NULL,
  `allergens` int(11) DEFAULT NULL,
  `starters` int(11) DEFAULT NULL,
  `main_courses` int(11) DEFAULT NULL,
  `drinks` int(11) DEFAULT NULL,
  `deserts` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `experience`
--

INSERT INTO `experience` (`id`, `restaurant_id`, `price`, `party_size`, `available_from`, `available_to`, `allergens`, `starters`, `main_courses`, `drinks`, `deserts`, `duration`) VALUES
(1, 1, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(2, 1, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(3, 1, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(4, 2, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(5, 2, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(6, 2, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(7, 3, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(8, 3, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(9, 3, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(10, 4, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(11, 4, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(12, 4, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(13, 5, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(14, 5, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(15, 5, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(16, 6, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(17, 6, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(18, 6, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(19, 7, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(20, 7, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(21, 7, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(22, 8, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(23, 8, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(24, 8, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(25, 9, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(26, 9, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(27, 9, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(28, 10, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(29, 10, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(30, 10, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(31, 11, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(32, 11, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(33, 11, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(34, 12, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(35, 12, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(36, 12, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(37, 13, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(38, 13, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(39, 13, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(40, 14, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(41, 14, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(42, 14, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(43, 15, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(44, 15, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(45, 15, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60),
(46, 16, 15, 1, '29/11/24', '29/11/2025', 0, 0, 1, 0, 0, 60),
(47, 16, 20, 1, '29/11/24', '29/11/2025', 0, 1, 1, 1, 0, 60),
(48, 16, 30, 1, '29/11/24', '29/11/2025', 0, 2, 1, 2, 1, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cusine` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `cusine`, `rating`, `phone`, `website`, `image_link`, `zone`, `description`) VALUES
(1, 'Las Tapas de Lola', '12 Camden St, Dublin 2', 'Spanish', 5, '01-1234567', 'http://lastapasdelola.ie', 'images/spanish.jpg', 'D1 & D3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(2, 'Mamma Mia', '45 Georges St, Dublin 1', 'Italian', 5, '01-9876543', 'http://mammamia.ie', 'images/italian.jpg', 'D2 & D4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(3, 'Sushi Heaven', '78 Dawson St, Dublin 2', 'Japanese', 5, '01-5647382', 'http://sushiheaven.ie', 'images/japanese.jpg', 'D6 & D8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(4, 'Bunsen', '22 North Circular Rd, Dublin 7', 'American', 4, '01-3456789', 'http://burgerbliss.ie', 'images/burger.jpg', 'D5 & D7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(5, 'Indian Curry Club', '56 Rathmines Rd, Dublin 6', 'Indian', 5, '01-8765432', 'http://currypalace.ie', 'images/indian.jpg', 'D9 & D11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(6, 'La Maison', '9 St. Stephens Green, Dublin 2', 'French', 5, '01-1122334', 'https://lamaisondublin.com/', 'images/french.jpg', 'D10 & D12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(7, 'Shouk', '34 Aungier St, Dublin 2', 'Vegan', 4, '01-9988776', 'https://www.shouk.ie/', 'images/vegan.jpg', 'D13 & D15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(8, 'Acopulco', '88 Capel St, Dublin 1', 'Mexican', 4, '01-5566778', 'https://www.acapulco.ie/', 'images/mexican.jpg', 'D14 & D16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(9, 'Neon', '63 South Circular Rd, Dublin 8', 'Thai', 5, '01-7788990', 'https://www.neon17.ie/', 'images/thai.jpg', 'D17 & D19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(10, 'The Coffee Corner', '5 Dame St, Dublin 2', 'Cafe', 4, '01-4455667', 'https://cornercoffee.ie/', 'images/cafe.jpg', 'D18 & D20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(11, 'Sultans Grill', 'N Lotts, North City, Dublin 1, D01 K8N3', 'Turkish', 5, '089 212 1500', 'https://www.instagram.com/sultansdublin/', 'images/sultan.jpg', 'D9 & D11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(12, 'Da Mimmo', '148 N Strand Rd, North Wall, Dublin, D03 FK52', 'Italian', 5, '(01) 856 1714', 'https://www.damimmo.ie/', 'images/damimmo.jpg', 'D1 & D3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(13, 'Kennedys Fairview', '5 Fairview Strand, Fairview, Dublin 3, D03 W5H0', 'Cafe', 4, '(01) 805 4776', 'https://kennedysfoodstore.com/locations/fairview/', 'images/kennedy.jpg', 'D6 & D8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(14, 'The Woollen Mills', 'Entrance on, 42 Ormond Quay Lower, Liffey St. Lowe...', 'Irish', 4, '18280835', 'thewoollenmills.com', 'images/woollen.jpg', 'D1 & D3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(15, 'Fujiyama Izakaya', '11 OConnell Street Upper, North City, Dublin 1, D0...', 'Asian', 5, '18899975', 'https://fujiyamajapanese.ie', 'images/fujiyama.jpg', 'D5 & D7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la'),
(16, 'Drunken Fish', 'The Excise Building, Mayor Street Lower, North Wal...', 'Korean', 4, '(01) 672 0025', 'https://drunkenfish.ie/', 'images/drunken.jpg', 'D2 & D4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in la');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'Eduardo', 'Heras', 'eduardo@fake.com', 'paswordpasword', '29/11/2024'),
(2, 'cihan', 'Korkut', 'cihan@fake.com', 'paswordpasword', '30/11/2024'),
(3, 'Fern', 'Rody', 'fern@fake.com', 'paswordpasword', '01/12/2024'),
(4, 'Rudy', 'Andreas', 'rudy@fake.com', 'paswordpasword', '02/12/2024'),
(5, 'Andy', 'James', 'andy@fake.com', 'paswordpasword', '03/12/2024');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
