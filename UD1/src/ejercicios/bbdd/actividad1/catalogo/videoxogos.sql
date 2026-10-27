-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 21-10-2026 a las 09:03:39
-- Versión del servidor: 11.8.9-MariaDB-ubu2404
-- Versión de PHP: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoxogos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido_1` varchar(100) NOT NULL,
  `apellido_2` varchar(100) DEFAULT NULL,
  `nic_usuario` varchar(30) NOT NULL,
  `correo_electronico` varchar(320) NOT NULL,
  `contrasena_hash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido_1`, `apellido_2`, `nic_usuario`, `correo_electronico`, `contrasena_hash`) VALUES
(1, 'Carlos', 'Gómez', 'Pérez', 'cgomez', 'carlos.gomez@example.com', 'c46ea938a8abac26b9cfd66a792050022d73869e34a95cb13a3a2353755c65f4'),
(2, 'María', 'Rodríguez', 'Silva', 'mrodriguez', 'maria.rodriguez@example.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(3, 'Juan', 'Fernández', NULL, 'jfernandez', 'juan.fernandez@example.com', '78d0daaacb01cbeeb1dc51c7683ef7667d97ba888269276cf55debb233c34c3a'),
(4, 'Ana Belén', 'López', 'Martín', 'alopez', 'ana.lopez@example.com', 'df8f3cc37663927b6d2ad9a5cea35c57999830a093a3eb6ce9f4db52e1d3d59e'),
(8, 'gabi', 'gabi', 'gabi', 'ggabi', 'gabi@gmail.com', '$2y$12$wJ2BEcPl7lr8tVT47B724O.nyrWqKI.48IyY8315NGIgbS.DOKbMy'),
(12, 'gabi', 'hola', NULL, 'ghola', 'hola@gmail.com', '$2y$12$0aC/69lta7LpwmRnbtjpROZ2M.TDEY94XiilkCfZ/HxF7KjINsXXC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `anio_lanzamiento` int(11) NOT NULL,
  `genero` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `nombre`, `plataforma`, `anio_lanzamiento`, `genero`) VALUES
(1, 'The Legend of Zelda: Breath of the Wild', 'Nintendo Switch', 2017, 'Aventura'),
(2, 'God of War', 'PlayStation 4', 2018, 'Acción'),
(3, 'Red Dead Redemption 2', 'Xbox One', 2018, 'Aventura'),
(4, 'Minecraft', 'PC', 2011, 'Sandbox'),
(5, 'Fortnite', 'PC', 2017, 'Battle Royale'),
(6, 'The Witcher 3: Wild Hunt', 'PC', 2015, 'RPG'),
(7, 'Horizon Zero Dawn', 'PlayStation 4', 2017, 'Aventura'),
(8, 'Among Us', 'PC', 2018, 'Multijugador'),
(9, 'Super Mario Odyssey', 'Nintendo Switch', 2017, 'Plataformas'),
(10, 'Apex Legends', 'PC', 2019, 'Battle Royale'),
(11, 'Cyberpunk 2077', 'PC', 2020, 'RPG'),
(12, 'Call of Duty: Warzone', 'PC', 2020, 'Shooter'),
(13, 'Final Fantasy VII Remake', 'PlayStation 4', 2020, 'RPG'),
(14, 'Ghost of Tsushima', 'PlayStation 4', 2020, 'Acción'),
(15, 'Genshin Impact', 'PC', 2020, 'RPG'),
(16, 'Animal Crossing: New Horizons', 'Nintendo Switch', 2020, 'Simulación'),
(17, 'Assassin’s Creed Valhalla', 'Xbox Series X', 2020, 'Aventura'),
(18, 'FIFA 21', 'PlayStation 4', 2020, 'Deportes'),
(19, 'NBA 2K21', 'PlayStation 4', 2020, 'Deportes'),
(20, 'Resident Evil Village', 'PC', 2021, 'Terror'),
(21, 'Far Cry 6', 'PC', 2021, 'Acción'),
(22, 'Ratchet & Clank: Rift Apart', 'PlayStation 5', 2021, 'Plataformas'),
(23, 'Halo Infinite', 'Xbox Series X', 2021, 'Shooter'),
(24, 'It Takes Two', 'PC', 2021, 'Multijugador'),
(25, 'Returnal', 'PlayStation 5', 2021, 'Acción'),
(26, 'Forza Horizon 5', 'Xbox Series X', 2021, 'Carreras'),
(27, 'Deathloop', 'PlayStation 5', 2021, 'Acción'),
(28, 'Metroid Dread', 'Nintendo Switch', 2021, 'Aventura'),
(29, 'Tales of Arise', 'PC', 2021, 'RPG'),
(30, 'Battlefield 2042', 'PC', 2021, 'Shooter');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nic_usuario` (`nic_usuario`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
