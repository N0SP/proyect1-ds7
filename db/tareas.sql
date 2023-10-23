-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 11:51:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareas`
--
CREATE DATABASE IF NOT EXISTS `tareas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tareas`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_agregar_tarea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_tarea` (IN `p_titulo` VARCHAR(255), IN `p_descripcion` TEXT, IN `p_fecha_compromiso` DATE, IN `p_editada` VARCHAR(3), IN `p_responsable` VARCHAR(255), IN `p_tipo_tarea` VARCHAR(255), IN `p_estado` VARCHAR(255))   BEGIN
    INSERT INTO tareas (titulo, descripcion, fecha_compromiso, editada, responsable, tipo_tarea, estado)
    VALUES (p_titulo, p_descripcion, p_fecha_compromiso, p_editada, p_responsable, p_tipo_tarea, p_estado);
END$$

DROP PROCEDURE IF EXISTS `sp_eliminar_tarea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_tarea` (IN `tarea_id` INT)   BEGIN
    DELETE FROM tareas WHERE id = tarea_id;
END$$

DROP PROCEDURE IF EXISTS `sp_todos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_todos` ()   BEGIN
    SELECT * FROM tareas;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_compromiso` date DEFAULT NULL,
  `editada` enum('si','no') DEFAULT 'no',
  `responsable` varchar(255) DEFAULT NULL,
  `tipo_tarea` enum('hogar','trabajo','escuela') NOT NULL,
  `estado` enum('pendiente','en_proceso','completa') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `titulo`, `descripcion`, `fecha_compromiso`, `editada`, `responsable`, `tipo_tarea`, `estado`) VALUES
(1, 'Tarea 1', 'Descripción tarea 1', '2023-10-18', 'no', 'Juan', 'hogar', 'pendiente'),
(2, 'Tarea 2', 'Descripción tarea 2', '2023-10-19', 'si', 'María', 'trabajo', 'en_proceso'),
(3, 'Tarea 3', 'Descripción tarea 3', '2023-10-20', 'no', 'Pedro', 'escuela', 'completa'),
(10, 'd', 's', '2023-10-04', 'no', 'd', 'hogar', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
