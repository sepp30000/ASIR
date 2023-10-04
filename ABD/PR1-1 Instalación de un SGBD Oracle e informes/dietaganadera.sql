-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-02-2023 a las 13:03:21
-- Versión del servidor: 8.0.32-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dietaganadera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `nombre_alimento` varchar(20) NOT NULL,
  `tipo_alimento` varchar(20) NOT NULL,
  `coste` float(6,2) NOT NULL,
  `od_alimento` varchar(40) DEFAULT NULL,
  `calorias` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimento`
--

INSERT INTO `alimento` (`nombre_alimento`, `tipo_alimento`, `coste`, `od_alimento`, `calorias`) VALUES
('alfalfa', 'alfalfa deshidratada', 0.15, 'normativa de calidad', '500.00'),
('algodon', 'semillas de algodon', 0.15, 'alto contenido en fibra', '500.00'),
('cebada', 'grano', 0.40, 'grano triturado', '100.00'),
('maiz', 'grano', 0.15, 'grano machacado', '500.00'),
('pienso', 'pienso', 0.15, 'mezcla de granos', '500.00'),
('soja', 'grano', 0.50, 'grano entero', '250.00'),
('trigo', 'grano', 0.30, 'grano selecto', '300.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_dieta_toma`
--

CREATE TABLE `alimento_dieta_toma` (
  `cod_dieta` int NOT NULL,
  `nombre_alimento` varchar(20) NOT NULL,
  `cod_toma` int NOT NULL,
  `cantidad_toma` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimento_dieta_toma`
--

INSERT INTO `alimento_dieta_toma` (`cod_dieta`, `nombre_alimento`, `cod_toma`, `cantidad_toma`) VALUES
(1, 'cebada', 1, 200),
(1, 'cebada', 3, 100),
(1, 'cebada', 5, 150),
(1, 'soja', 1, 200),
(1, 'soja', 3, 100),
(1, 'soja', 5, 150),
(2, 'cebada', 1, 200),
(2, 'cebada', 3, 100),
(2, 'cebada', 5, 150),
(2, 'soja', 1, 200),
(2, 'soja', 3, 100),
(2, 'soja', 5, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `cod_animal` int NOT NULL,
  `tipo_animal` varchar(20) NOT NULL,
  `peso` float NOT NULL,
  `f_nacimiento` date NOT NULL,
  `utilidad_animal` varchar(20) DEFAULT NULL,
  `produccion_animal` varchar(20) DEFAULT NULL,
  `od_animal` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`cod_animal`, `tipo_animal`, `peso`, `f_nacimiento`, `utilidad_animal`, `produccion_animal`, `od_animal`) VALUES
(1, 'bovino', 900, '2012-03-02', 'carnica', 'carniceria', 'carne para carniceria'),
(2, 'bovino', 800, '2019-11-05', 'reproduccion', 'semental', 'toro reproductor'),
(3, 'bovino', 700, '2008-10-08', 'lactea', 'leche', 'leche entera'),
(5, 'bovino', 800, '2017-05-30', 'reproduccion', 'embarazo', 'vaca reproductora'),
(6, 'bovino', 800, '2012-09-21', 'lactea', 'queso', 'cabra para queso'),
(7, 'equido', 1000, '2015-02-11', 'carnica', 'carniceria', 'caballo para carne');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal_nutriente`
--

CREATE TABLE `animal_nutriente` (
  `cod_animal` int NOT NULL,
  `nombre_nutriente` varchar(30) NOT NULL,
  `cantidad_necesaria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal_nutriente`
--

INSERT INTO `animal_nutriente` (`cod_animal`, `nombre_nutriente`, `cantidad_necesaria`) VALUES
(1, 'fibra', 500),
(1, 'hierro', 300),
(1, 'potasio', 250),
(1, 'proteina', 200),
(1, 'zinc', 5),
(2, 'fibra', 500),
(2, 'hierro', 300),
(2, 'potasio', 250),
(2, 'proteina', 200),
(2, 'vitamina B1', 20),
(2, 'vitamina B5', 15),
(2, 'vitamina B9', 25),
(2, 'zinc', 5),
(3, 'fibra', 500),
(3, 'hierro', 300),
(3, 'potasio', 250),
(3, 'proteina', 200),
(3, 'vitamina B1', 20),
(3, 'vitamina B5', 15),
(3, 'vitamina B7', 25),
(3, 'vitamina B9', 25),
(5, 'calcio', 50),
(5, 'fibra', 500),
(5, 'hierro', 300),
(5, 'proteina', 200),
(5, 'vitamina B1', 20),
(5, 'vitamina B5', 50),
(5, 'vitamina B7', 250),
(5, 'vitamina B9', 30),
(6, 'calcio', 50),
(6, 'fibra', 500),
(6, 'hierro', 300),
(6, 'potasio', 30),
(6, 'proteina', 200),
(6, 'vitamina B1', 20),
(6, 'vitamina B5', 50),
(6, 'vitamina B7', 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dieta`
--

CREATE TABLE `dieta` (
  `cod_dieta` int NOT NULL,
  `finalidad` varchar(20) NOT NULL,
  `od_dieta` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dieta`
--

INSERT INTO `dieta` (`cod_dieta`, `finalidad`, `od_dieta`) VALUES
(1, 'engorde', 'cereales para engorde'),
(2, 'crecimiento', 'hormonas'),
(3, 'adelgazamiento', 'hierba'),
(4, 'mantenimiento', 'hierba con cerealies');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dieta_animal_fechainicio`
--

CREATE TABLE `dieta_animal_fechainicio` (
  `cod_animal` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `cod_dieta` int NOT NULL,
  `od_resultado` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dieta_animal_fechainicio`
--

INSERT INTO `dieta_animal_fechainicio` (`cod_animal`, `fecha_inicio`, `cod_dieta`, `od_resultado`) VALUES
(1, '2021-10-01', 1, NULL),
(2, '2021-01-09', 2, NULL),
(3, '2020-02-20', 2, NULL),
(3, '2020-08-12', 4, NULL),
(5, '2019-07-05', 1, NULL),
(6, '2020-05-01', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriente`
--

CREATE TABLE `nutriente` (
  `nombre_nutriente` varchar(30) NOT NULL,
  `magnitud_nutriente` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `od_nutriente` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriente`
--

INSERT INTO `nutriente` (`nombre_nutriente`, `magnitud_nutriente`, `estado`, `od_nutriente`) VALUES
('calcio', '5', 'desactivo', 'suplemento'),
('fibra', '15', 'activo', 'aporte del grano'),
('fosforo', '3', 'desactivo', 'suplemento'),
('hierro', '20', 'activo', 'aportación de la soja'),
('potasio', '5', 'activo', 'aportación de la soja'),
('proteina', '30', 'activo', 'origen vegetal'),
('vitamina B1', '1', 'activo', 'aporte del grano'),
('vitamina B5', '0.3', 'activo', 'aporte del grano'),
('vitamina B7', '0.1', 'activo', 'aporte del grano'),
('vitamina B9', '0.2', 'activo', 'aporte del grano'),
('vitamina E', '2', 'activo', 'aporte del grano'),
('zinc', '3', 'activo', 'aportación de la soja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriente_alimento`
--

CREATE TABLE `nutriente_alimento` (
  `nombre_nutriente` varchar(30) NOT NULL,
  `nombre_alimento` varchar(20) NOT NULL,
  `cantidad_contenida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriente_alimento`
--

INSERT INTO `nutriente_alimento` (`nombre_nutriente`, `nombre_alimento`, `cantidad_contenida`) VALUES
('fosforo', 'pienso', 30),
('potasio', 'alfalfa', 300),
('potasio', 'pienso', 30),
('vitamina B1', 'maiz', 50),
('vitamina B5', 'trigo', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `toma`
--

CREATE TABLE `toma` (
  `cod_toma` int NOT NULL,
  `nombre_toma` varchar(30) NOT NULL,
  `hora_inicio` int DEFAULT NULL,
  `hora_fin` int DEFAULT NULL,
  `od_toma` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `toma`
--

INSERT INTO `toma` (`cod_toma`, `nombre_toma`, `hora_inicio`, `hora_fin`, `od_toma`) VALUES
(1, 'matutina', 7, 8, NULL),
(2, 'mañana', 11, 12, NULL),
(3, 'mediodia', 13, 14, NULL),
(4, 'merienda', 17, 18, NULL),
(5, 'cena', 20, 21, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`nombre_alimento`);

--
-- Indices de la tabla `alimento_dieta_toma`
--
ALTER TABLE `alimento_dieta_toma`
  ADD PRIMARY KEY (`cod_dieta`,`nombre_alimento`,`cod_toma`),
  ADD KEY `nombre_alimento` (`nombre_alimento`),
  ADD KEY `cod_toma` (`cod_toma`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`cod_animal`);

--
-- Indices de la tabla `animal_nutriente`
--
ALTER TABLE `animal_nutriente`
  ADD PRIMARY KEY (`cod_animal`,`nombre_nutriente`),
  ADD KEY `Fk_animnutr_nutriente` (`nombre_nutriente`);

--
-- Indices de la tabla `dieta`
--
ALTER TABLE `dieta`
  ADD PRIMARY KEY (`cod_dieta`);

--
-- Indices de la tabla `dieta_animal_fechainicio`
--
ALTER TABLE `dieta_animal_fechainicio`
  ADD PRIMARY KEY (`cod_animal`,`fecha_inicio`),
  ADD KEY `Fk_dietaanimalfechainicio_dieta` (`cod_dieta`);

--
-- Indices de la tabla `nutriente`
--
ALTER TABLE `nutriente`
  ADD PRIMARY KEY (`nombre_nutriente`);

--
-- Indices de la tabla `nutriente_alimento`
--
ALTER TABLE `nutriente_alimento`
  ADD PRIMARY KEY (`nombre_nutriente`,`nombre_alimento`),
  ADD KEY `Fk_nutrientealimento_alimento` (`nombre_alimento`);

--
-- Indices de la tabla `toma`
--
ALTER TABLE `toma`
  ADD PRIMARY KEY (`cod_toma`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimento_dieta_toma`
--
ALTER TABLE `alimento_dieta_toma`
  ADD CONSTRAINT `alimento_dieta_toma_ibfk_1` FOREIGN KEY (`cod_dieta`) REFERENCES `dieta` (`cod_dieta`),
  ADD CONSTRAINT `alimento_dieta_toma_ibfk_2` FOREIGN KEY (`nombre_alimento`) REFERENCES `alimento` (`nombre_alimento`),
  ADD CONSTRAINT `alimento_dieta_toma_ibfk_3` FOREIGN KEY (`cod_toma`) REFERENCES `toma` (`cod_toma`);

--
-- Filtros para la tabla `animal_nutriente`
--
ALTER TABLE `animal_nutriente`
  ADD CONSTRAINT `Fk_animnutr_animal` FOREIGN KEY (`cod_animal`) REFERENCES `animal` (`cod_animal`),
  ADD CONSTRAINT `Fk_animnutr_nutriente` FOREIGN KEY (`nombre_nutriente`) REFERENCES `nutriente` (`nombre_nutriente`);

--
-- Filtros para la tabla `dieta_animal_fechainicio`
--
ALTER TABLE `dieta_animal_fechainicio`
  ADD CONSTRAINT `Fk_dietaanimalfechainicio_animal` FOREIGN KEY (`cod_animal`) REFERENCES `animal` (`cod_animal`),
  ADD CONSTRAINT `Fk_dietaanimalfechainicio_dieta` FOREIGN KEY (`cod_dieta`) REFERENCES `dieta` (`cod_dieta`);

--
-- Filtros para la tabla `nutriente_alimento`
--
ALTER TABLE `nutriente_alimento`
  ADD CONSTRAINT `Fk_nutrientealimento_alimento` FOREIGN KEY (`nombre_alimento`) REFERENCES `alimento` (`nombre_alimento`),
  ADD CONSTRAINT `Fk_nutrientealimento_nutriente` FOREIGN KEY (`nombre_nutriente`) REFERENCES `nutriente` (`nombre_nutriente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
