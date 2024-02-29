-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2024 a las 09:54:07
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
-- Base de datos: `mydb`
--
create database mydb;

use mydb;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitroa`
--

CREATE TABLE `arbitroa` (
  `nan` char(9) NOT NULL,
  `a_izena` varchar(45) NOT NULL,
  `a_abizena` varchar(45) NOT NULL,
  `adina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `arbitroa`
--

INSERT INTO `arbitroa` (`nan`, `a_izena`, `a_abizena`, `adina`) VALUES
('12345678P', 'Paco', 'Gimenez', 45),
('76154329C', 'Alberto', 'Castaño', 51),
('90876791J', 'Jose Luis', 'Sanchez', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jokalaria`
--

CREATE TABLE `jokalaria` (
  `nan` char(9) NOT NULL,
  `izena` varchar(45) NOT NULL,
  `abizena` varchar(45) NOT NULL,
  `herria` varchar(45) NOT NULL,
  `jaiotze_data` date NOT NULL,
  `tituluak` int(11) NOT NULL,
  `erabiltzailea` varchar(45) NOT NULL,
  `pasahitza` varchar(45) NOT NULL,
  `aktibo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jokalaria`
--

INSERT INTO `jokalaria` (`nan`, `izena`, `abizena`, `herria`, `jaiotze_data`, `tituluak`, `erabiltzailea`, `pasahitza`, `aktibo`) VALUES
('11112257J', 'Novak ', 'Djokovic', 'Serbia', '1982-07-03', 32, 'novakdjokovic', 'novakdjokovic', 1),
('12129898M', 'Daniil ', 'Medvedev', 'Rusia', '1996-07-25', 9, 'daniilmedvedev', 'daniilmedvedev', 1),
('12312312J', 'Julen', 'Garcia', 'Donosti', '2003-07-19', 0, 'julengarcia', 'julengarcia', 1),
('12345678H', 'Hodei', 'Urresti', 'Tolosa', '2001-06-26', 22, 'hodeiurresti', 'hodeiurresti', 1),
('12345678R', 'Rafa', 'Nadal', 'Barcelona', '1990-02-08', 44, 'rafanadal', 'rafanadal', 1),
('26473891J', 'Jurgi', 'Leunda', 'Sevilla', '1996-01-01', 1, 'jurgileunda', 'jurgileunda', 1),
('45112255Z', 'Alexander ', 'Zverev', 'Alemania', '1984-04-21', 5, 'alexanderzverev', 'alexanderzverev', 1),
('77664532C', 'Carlos', 'Alcaraz', 'Madrid', '1995-02-25', 16, 'carlosalcaraz', 'carlosalcaraz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jolastu`
--

CREATE TABLE `jolastu` (
  `jokalaria_nan` char(9) NOT NULL,
  `partidua_kodea` int(11) NOT NULL,
  `faltak` int(11) NOT NULL,
  `jokua_emaitza` varchar(10) NOT NULL,
  `iraupena` int(11) NOT NULL,
  `taldea` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jolastu`
--

INSERT INTO `jolastu` (`jokalaria_nan`, `partidua_kodea`, `faltak`, `jokua_emaitza`, `iraupena`, `taldea`) VALUES
('11112257J', 1, 1, '2-6-5', 120, 1),
('11112257J', 15, 4, '1-6-1', 120, 1),
('12129898M', 4, 2, '6-3-4', 226, 2),
('12312312J', 10, 6, '1-1', 49, 2),
('12312312J', 15, 6, '6-1-6', 120, 2),
('12345678H', 1, 4, '6-4-6', 120, 2),
('12345678H', 11, 0, '6-4-6', 99, 1),
('12345678H', 15, 1, '6-1-6', 120, 2),
('12345678R', 4, 6, '1-6-1', 226, 1),
('12345678R', 11, 6, '1-6-2', 99, 2),
('45112255Z', 12, 6, '6-6', 56, 2),
('45112255Z', 15, 1, '1-6-1', 120, 1),
('77664532C', 10, 1, '6-6', 49, 1),
('77664532C', 12, 5, '2-2', 56, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte_hartu`
--

CREATE TABLE `parte_hartu` (
  `jokalaria_nan` char(9) NOT NULL,
  `torneoa_t_kodea` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parte_hartu`
--

INSERT INTO `parte_hartu` (`jokalaria_nan`, `torneoa_t_kodea`) VALUES
('77664532C', '878RG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidua`
--

CREATE TABLE `partidua` (
  `p_kodea` int(11) NOT NULL,
  `data` date NOT NULL,
  `arbitroa_nan` char(9) NOT NULL,
  `torneoa_kodea` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partidua`
--

INSERT INTO `partidua` (`p_kodea`, `data`, `arbitroa_nan`, `torneoa_kodea`) VALUES
(1, '2023-11-03', '12345678P', '111AO'),
(2, '2023-08-19', '76154329C', '111AO'),
(3, '2023-10-14', '90876791J', '111AO'),
(4, '2024-02-02', '90876791J', '123US'),
(5, '2024-01-06', '12345678P', '123US'),
(6, '2023-06-30', '76154329C', '123US'),
(7, '2023-01-27', '76154329C', '555MM'),
(8, '2023-10-28', '90876791J', '555MM'),
(9, '2023-12-30', '12345678P', '555MM'),
(10, '2023-08-19', '12345678P', '878RG'),
(11, '2024-02-24', '76154329C', '878RG'),
(12, '2022-05-07', '90876791J', '878RG'),
(13, '2022-07-30', '90876791J', '8769W'),
(14, '2023-10-07', '12345678P', '8769W'),
(15, '2023-11-25', '76154329C', '8769W');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneoa`
--

CREATE TABLE `torneoa` (
  `t_kodea` char(5) NOT NULL,
  `t_izena` varchar(45) NOT NULL,
  `mota` varchar(45) NOT NULL,
  `lur_mota` varchar(20) NOT NULL,
  `hasiera_data` date NOT NULL,
  `amaiera_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `torneoa`
--

INSERT INTO `torneoa` (`t_kodea`, `t_izena`, `mota`, `lur_mota`, `hasiera_data`, `amaiera_data`) VALUES
('111AO', 'Australian Open', 'Banakakoa', 'Belarra', '2026-05-01', '2026-06-01'),
('123US', 'US Open', 'Banakakoa', 'Pista', '2024-12-01', '2024-12-21'),
('555MM', 'Mutua Madrid Open', 'Banakakoa', 'Pista', '2025-03-01', '2025-05-31'),
('8769W', 'Wimbledon', 'Binakakoa', 'Area', '2025-06-01', '2025-07-31'),
('878RG', 'Roland Garros', 'Banakakoa', 'Area', '2024-02-10', '2024-05-31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbitroa`
--
ALTER TABLE `arbitroa`
  ADD PRIMARY KEY (`nan`);

--
-- Indices de la tabla `jokalaria`
--
ALTER TABLE `jokalaria`
  ADD PRIMARY KEY (`nan`);

--
-- Indices de la tabla `jolastu`
--
ALTER TABLE `jolastu`
  ADD PRIMARY KEY (`jokalaria_nan`,`partidua_kodea`),
  ADD KEY `fk_jokalaria_has_partidua_partidua1_idx` (`partidua_kodea`),
  ADD KEY `fk_jokalaria_has_partidua_jokalaria1_idx` (`jokalaria_nan`);

--
-- Indices de la tabla `parte_hartu`
--
ALTER TABLE `parte_hartu`
  ADD PRIMARY KEY (`jokalaria_nan`,`torneoa_t_kodea`),
  ADD KEY `fk_jokalaria_has_torneoa_torneoa1_idx` (`torneoa_t_kodea`),
  ADD KEY `fk_jokalaria_has_torneoa_jokalaria1_idx` (`jokalaria_nan`);

--
-- Indices de la tabla `partidua`
--
ALTER TABLE `partidua`
  ADD PRIMARY KEY (`p_kodea`),
  ADD KEY `fk_partidua_arbitroa1_idx` (`arbitroa_nan`),
  ADD KEY `fk_partidua_torneoa1_idx` (`torneoa_kodea`);

--
-- Indices de la tabla `torneoa`
--
ALTER TABLE `torneoa`
  ADD PRIMARY KEY (`t_kodea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `partidua`
--
ALTER TABLE `partidua`
  MODIFY `p_kodea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jolastu`
--
ALTER TABLE `jolastu`
  ADD CONSTRAINT `fk_jokalaria_has_partidua_jokalaria1` FOREIGN KEY (`jokalaria_nan`) REFERENCES `jokalaria` (`nan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jokalaria_has_partidua_partidua1` FOREIGN KEY (`partidua_kodea`) REFERENCES `partidua` (`p_kodea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parte_hartu`
--
ALTER TABLE `parte_hartu`
  ADD CONSTRAINT `fk_jokalaria_has_torneoa_jokalaria1` FOREIGN KEY (`jokalaria_nan`) REFERENCES `jokalaria` (`nan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jokalaria_has_torneoa_torneoa1` FOREIGN KEY (`torneoa_t_kodea`) REFERENCES `torneoa` (`t_kodea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partidua`
--
ALTER TABLE `partidua`
  ADD CONSTRAINT `fk_partidua_arbitroa1` FOREIGN KEY (`arbitroa_nan`) REFERENCES `arbitroa` (`nan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partidua_torneoa1` FOREIGN KEY (`torneoa_kodea`) REFERENCES `torneoa` (`t_kodea`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
